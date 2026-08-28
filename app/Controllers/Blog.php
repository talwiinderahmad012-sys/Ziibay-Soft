<?php
namespace App\Controllers;

use App\Models\BlogPostModel;
use App\Models\BlogCategoryModel;
use App\Models\BlogTagModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Blog extends BaseController
{
    protected $postModel;
    protected $categoryModel;
    protected $tagModel;
    protected $db;

    public function __construct()
    {
        $this->postModel = new BlogPostModel();
        $this->categoryModel = new BlogCategoryModel();
        $this->tagModel = new BlogTagModel();
        $this->db = \Config\Database::connect();
        helper('toc');
    }

    public function index()
    {
        return $this->renderBlogList();
    }

    public function category($slug)
    {
        $category = $this->categoryModel->where('slug', $slug)->first();
        if (!$category) throw PageNotFoundException::forPageNotFound();
        return $this->renderBlogList(['category' => $category]);
    }

    public function tag($slug)
    {
        $tag = $this->tagModel->where('slug', $slug)->first();
        if (!$tag) throw PageNotFoundException::forPageNotFound();
        return $this->renderBlogList(['tag' => $tag]);
    }
    
    public function author($slug)
    {
        $author = $this->db->table('team_members')->where('slug', $slug)->where('status', 'published')->get()->getRowArray();
        if (!$author) throw PageNotFoundException::forPageNotFound();
        return $this->renderBlogList(['author' => $author]);
    }

    private function renderBlogList($filters = [])
    {
        $pager = \Config\Services::pager();
        
        $builder = $this->db->table('blog_posts p')
            ->select('p.*, c.name as category_name, c.slug as category_slug, tm.name as author_name')
            ->join('blog_categories c', 'c.id = p.category_id', 'left')
            ->join('team_members tm', 'tm.id = p.team_member_id', 'left')
            ->where('p.status', 'published')
            ->where('(p.scheduled_at IS NULL OR p.scheduled_at <= NOW())')
            ->orderBy('p.published_at', 'DESC');

        // Page metadata
        $title = 'Blog & Insights | Ziibay Soft';
        $metaDesc = 'Discover the latest insights, strategies, and guides on web development, software engineering, and digital growth from the experts at Ziibay Soft.';
        $canonical = base_url('blog');
        $robots = 'index, follow';
        $featuredPost = null;

        if (isset($filters['category'])) {
            $builder->where('p.category_id', $filters['category']['id']);
            $title = $filters['category']['name'] . ' | Blog';
            $metaDesc = $filters['category']['description'] ?? "Read the latest articles about {$filters['category']['name']} from Ziibay Soft.";
            $canonical = base_url('blog/category/' . $filters['category']['slug']);
        } elseif (isset($filters['tag'])) {
            $builder->join('blog_post_tags pt', 'pt.post_id = p.id')->where('pt.tag_id', $filters['tag']['id']);
            $title = 'Posts tagged with ' . $filters['tag']['name'];
            $canonical = base_url('blog/tag/' . $filters['tag']['slug']);
            // By prompt rule: "Only make tag pages indexable if they contain substantial useful content."
            // We'll set them to noindex for safety to avoid thin content issues, unless they are very popular, but let's default to noindex for tags.
            $robots = 'noindex, follow';
        } elseif (isset($filters['author'])) {
            $builder->where('p.team_member_id', $filters['author']['id']);
            $title = 'Articles by ' . $filters['author']['name'];
            $canonical = base_url('authors/' . $filters['author']['slug']);
        } else {
            // Only extract featured on the main index
            $featuredPost = $this->db->table('blog_posts p')
                ->select('p.*, c.name as category_name, c.slug as category_slug, tm.name as author_name')
                ->join('blog_categories c', 'c.id = p.category_id', 'left')
                ->join('team_members tm', 'tm.id = p.team_member_id', 'left')
                ->where('p.status', 'published')
                ->where('p.featured', 1)
                ->where('(p.scheduled_at IS NULL OR p.scheduled_at <= NOW())')
                ->orderBy('p.published_at', 'DESC')
                ->get()->getRowArray();

            if ($featuredPost) {
                $builder->where('p.id !=', $featuredPost['id']);
            }
        }

        $perPage = 9;
        $page = $this->request->getVar('page') ?? 1;
        
        $total = $builder->countAllResults(false);
        $posts = $builder->limit($perPage, ($page - 1) * $perPage)->get()->getResultArray();

        $categories = $this->categoryModel->findAll();

        $data = [
            'title' => $title,
            'meta_description' => $metaDesc,
            'canonical_url' => $canonical . ($page > 1 ? '?page=' . $page : ''),
            'robots' => $robots,
            'featuredPost' => $featuredPost,
            'posts' => $posts,
            'categories' => $categories,
            'pager' => $pager->makeLinks($page, $perPage, $total, 'default_full'),
            'filters' => $filters
        ];

        return view('pages/blog_hub', $data);
    }

    public function show($slug)
    {
        $post = $this->postModel->where('slug', $slug)
            ->where('status', 'published')
            ->where('(scheduled_at IS NULL OR scheduled_at <= NOW())')
            ->first();

        if (!$post) {
            throw PageNotFoundException::forPageNotFound("Article not found: " . $slug);
        }

        $category = null;
        if ($post['category_id']) {
            $category = $this->categoryModel->find($post['category_id']);
        }

        $author = null;
        if ($post['team_member_id']) {
            $author = $this->db->table('team_members')->where('id', $post['team_member_id'])->get()->getRowArray();
        }

        $tags = $this->db->table('blog_tags t')
            ->join('blog_post_tags pt', 'pt.tag_id = t.id')
            ->where('pt.post_id', $post['id'])
            ->get()->getResultArray();

        // FAQs
        $faqs = $this->db->table('faqs f')
            ->join('faq_articles fa', 'fa.faq_id = f.id')
            ->where('fa.article_id', $post['id'])
            ->where('f.status', 'active')
            ->get()->getResultArray();

        // Related Articles (from relationships table)
        $relatedPosts = $this->db->table('blog_posts p')
            ->select('p.*, c.name as category_name, c.slug as category_slug')
            ->join('article_relationships ar', 'ar.child_article_id = p.id OR ar.parent_article_id = p.id')
            ->join('blog_categories c', 'c.id = p.category_id', 'left')
            ->where('(ar.parent_article_id = ' . $post['id'] . ' OR ar.child_article_id = ' . $post['id'] . ')')
            ->where('p.id !=', $post['id'])
            ->where('p.status', 'published')
            ->where('(p.scheduled_at IS NULL OR p.scheduled_at <= NOW())')
            ->groupBy('p.id')
            ->limit(3)
            ->get()->getResultArray();

        // Fallback for related posts
        if (empty($relatedPosts) && $post['category_id']) {
            $relatedPosts = $this->db->table('blog_posts p')
                ->select('p.*, c.name as category_name, c.slug as category_slug')
                ->join('blog_categories c', 'c.id = p.category_id', 'left')
                ->where('p.category_id', $post['category_id'])
                ->where('p.id !=', $post['id'])
                ->where('p.status', 'published')
                ->where('(p.scheduled_at IS NULL OR p.scheduled_at <= NOW())')
                ->orderBy('p.published_at', 'DESC')
                ->limit(3)
                ->get()->getResultArray();
        }

        // Generate TOC and reading time
        $htmlContent = $post['content'] ?? '';
        $toc = generate_toc_and_add_ids($htmlContent);
        $post['content'] = $htmlContent;
        $readingTime = calculate_reading_time($htmlContent);

        $data = [
            'post' => $post,
            'category' => $category,
            'author' => $author,
            'tags' => $tags,
            'faqs' => $faqs,
            'toc' => $toc,
            'readingTime' => $readingTime,
            'relatedPosts' => $relatedPosts,
            
            // Empty placeholders for legacy view compatibility just in case
            'services' => [],
            'industries' => [],

            'title' => $post['seo_title'] ?: $post['title'],
            'meta_description' => $post['meta_description'] ?: strip_tags($post['excerpt']),
            'canonical_url' => $post['canonical_url'] ?: base_url("blog/" . $post['slug']),
            'og_title' => $post['og_title'] ?: $post['title'],
            'og_description' => $post['og_description'] ?: strip_tags($post['excerpt']),
            'og_image' => $post['og_image'] ?: ($post['featured_image'] ? base_url($post['featured_image']) : null),
            'robots' => $post['indexable'] ? 'index, follow' : 'noindex, follow',
        ];

        return view('pages/blog_article', $data);
    }
}
