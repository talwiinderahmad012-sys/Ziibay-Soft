<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\BlogPostModel;

class Blog extends BaseController
{
    public function index()
    {
        $postModel = new BlogPostModel();
        
        $search = $this->request->getGet('search');
        if ($search) {
            $postModel->groupStart()
                      ->like('title', $search)
                      ->orLike('excerpt', $search)
                      ->groupEnd();
        }

        $status = $this->request->getGet('status');
        if ($status) {
            $postModel->where('status', $status);
        }

        $postModel->orderBy('created_at', 'DESC');
        
        $data = [
            'title' => 'Blog Management | Admin',
            'posts' => $postModel->paginate(20),
            'pager' => $postModel->pager,
            'search' => $search,
            'statusFilter' => $status
        ];
        return view('admin/blog/index', $data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        
        $data = [
            'title' => 'Create Blog Post | Admin',
            'categories' => $db->table('blog_categories')->get()->getResultArray(),
            'tags' => $db->table('blog_tags')->get()->getResultArray(),
            'authors' => $db->table('team_members')->where('status', 'published')->get()->getResultArray(),
            'posts' => $db->table('blog_posts')->select('id, title, status')->get()->getResultArray(),
            'faqs' => $db->table('faqs')->select('id, question')->where('status', 'active')->get()->getResultArray(),
        ];
        return view('admin/blog/create', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]|is_unique[blog_posts.slug]',
            'status' => 'required|in_list[draft,published,archived,scheduled]',
            'content_type' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $postModel = new BlogPostModel();
        $db = \Config\Database::connect();
        $db->transStart();

        $data = $this->request->getPost([
            'title', 'slug', 'excerpt', 'content', 'featured_image', 'team_member_id', 
            'category_id', 'content_type', 'status', 'featured', 
            'seo_title', 'meta_description', 'canonical_url', 'og_title', 'og_description', 'og_image'
        ]);
        
        $data['featured'] = $this->request->getPost('featured') ? 1 : 0;
        $data['indexable'] = $this->request->getPost('indexable') ? 1 : 0;
        
        if ($data['status'] === 'published') {
            $data['published_at'] = date('Y-m-d H:i:s');
        } elseif ($data['status'] === 'scheduled') {
            $data['scheduled_at'] = $this->request->getPost('scheduled_at');
        }
        
        $data['team_member_id'] = empty($data['team_member_id']) ? null : $data['team_member_id'];
        $data['category_id'] = empty($data['category_id']) ? null : $data['category_id'];

        $postId = $postModel->insert($data);

        $this->syncRelationships($postId, $this->request);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to create blog post.');
        }

        return redirect()->to('admin/blog')->with('success', 'Blog post created successfully.');
    }

    public function edit($id)
    {
        $postModel = new BlogPostModel();
        $post = $postModel->find($id);

        if (!$post) {
            return redirect()->to('admin/blog')->with('error', 'Post not found.');
        }

        $db = \Config\Database::connect();
        
        $post['tags'] = array_column($db->table('blog_post_tags')->where('post_id', $id)->get()->getResultArray(), 'tag_id');
        $post['faqs'] = array_column($db->table('faq_articles')->where('article_id', $id)->get()->getResultArray(), 'faq_id');
        
        $post['pillars'] = array_column($db->table('article_relationships')->where('child_article_id', $id)->where('relationship_type', 'cluster')->get()->getResultArray(), 'parent_article_id');
        $post['related'] = array_column($db->table('article_relationships')->where('parent_article_id', $id)->where('relationship_type', 'related')->get()->getResultArray(), 'child_article_id');

        $data = [
            'title' => 'Edit Blog Post | Admin',
            'post' => $post,
            'categories' => $db->table('blog_categories')->get()->getResultArray(),
            'tags' => $db->table('blog_tags')->get()->getResultArray(),
            'authors' => $db->table('team_members')->where('status', 'published')->get()->getResultArray(),
            'posts' => $db->table('blog_posts')->select('id, title, status')->where('id !=', $id)->get()->getResultArray(),
            'faqs' => $db->table('faqs')->select('id, question')->where('status', 'active')->get()->getResultArray(),
        ];
        return view('admin/blog/edit', $data);
    }

    public function update($id)
    {
        $postModel = new BlogPostModel();
        $post = $postModel->find($id);
        
        $rules = [
            'title' => 'required|max_length[255]',
            'slug' => "required|max_length[255]|is_unique[blog_posts.slug,id,{$id}]",
            'status' => 'required|in_list[draft,published,archived,scheduled]',
            'content_type' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->transStart();

        $data = $this->request->getPost([
            'title', 'slug', 'excerpt', 'content', 'featured_image', 'team_member_id', 
            'category_id', 'content_type', 'status', 'seo_title', 'meta_description', 
            'canonical_url', 'og_title', 'og_description', 'og_image'
        ]);
        
        $data['featured'] = $this->request->getPost('featured') ? 1 : 0;
        $data['indexable'] = $this->request->getPost('indexable') ? 1 : 0;
        
        if ($data['status'] === 'published' && empty($post['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        } elseif ($data['status'] === 'scheduled') {
            $data['scheduled_at'] = $this->request->getPost('scheduled_at');
        }
        
        $data['team_member_id'] = empty($data['team_member_id']) ? null : $data['team_member_id'];
        $data['category_id'] = empty($data['category_id']) ? null : $data['category_id'];

        $postModel->update($id, $data);
        $this->syncRelationships($id, $this->request);
        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to update post.');
        }

        return redirect()->to('admin/blog')->with('success', 'Blog post updated successfully.');
    }

    public function toggleStatus($id)
    {
        $postModel = new BlogPostModel();
        $post = $postModel->find($id);
        if ($post) {
            $newStatus = $post['status'] === 'published' ? 'draft' : 'published';
            $postModel->update($id, ['status' => $newStatus]);
        }
        return redirect()->back()->with('success', 'Status toggled.');
    }
    
    public function toggleFeatured($id)
    {
        $postModel = new BlogPostModel();
        $post = $postModel->find($id);
        if ($post) {
            $newFeatured = $post['featured'] ? 0 : 1;
            $postModel->update($id, ['featured' => $newFeatured]);
        }
        return redirect()->back()->with('success', 'Featured toggled.');
    }

    private function syncRelationships($postId, $request)
    {
        $db = \Config\Database::connect();

        // Tags
        $db->table('blog_post_tags')->where('post_id', $postId)->delete();
        $tags = $request->getPost('tags');
        if (!empty($tags) && is_array($tags)) {
            $data = [];
            foreach ($tags as $tid) {
                $data[] = ['post_id' => $postId, 'tag_id' => (int)$tid];
            }
            $db->table('blog_post_tags')->insertBatch($data);
        }

        // FAQs
        $db->table('faq_articles')->where('article_id', $postId)->delete();
        $faqs = $request->getPost('faqs');
        if (!empty($faqs) && is_array($faqs)) {
            $data = [];
            foreach ($faqs as $fid) {
                $data[] = ['article_id' => $postId, 'faq_id' => (int)$fid];
            }
            $db->table('faq_articles')->insertBatch($data);
        }
        
        // Pillar/Cluster and Related
        $db->table('article_relationships')->where('child_article_id', $postId)->orWhere('parent_article_id', $postId)->delete();
        
        $pillars = $request->getPost('pillars'); // if this post is a cluster of some pillar(s)
        if (!empty($pillars) && is_array($pillars)) {
            $data = [];
            foreach ($pillars as $pid) {
                $data[] = ['parent_article_id' => (int)$pid, 'child_article_id' => $postId, 'relationship_type' => 'cluster'];
            }
            $db->table('article_relationships')->insertBatch($data);
        }
        
        $related = $request->getPost('related');
        if (!empty($related) && is_array($related)) {
            $data = [];
            foreach ($related as $rid) {
                $data[] = ['parent_article_id' => $postId, 'child_article_id' => (int)$rid, 'relationship_type' => 'related'];
            }
            $db->table('article_relationships')->insertBatch($data);
        }
    }
}
