<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class BlogTags extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $tags = $db->table('blog_tags')->get()->getResultArray();
        return view('admin/blog_tags/index', ['title' => 'Blog Tags', 'tags' => $tags]);
    }

    public function create()
    {
        return view('admin/blog_tags/create', ['title' => 'Create Tag']);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|max_length[150]',
            'slug' => 'required|max_length[150]|is_unique[blog_tags.slug]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->table('blog_tags')->insert([
            'name' => $this->request->getPost('name'),
            'slug' => $this->request->getPost('slug'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/blog-tags')->with('success', 'Tag created successfully.');
    }

    public function edit($id)
    {
        $db = \Config\Database::connect();
        $tag = $db->table('blog_tags')->where('id', $id)->get()->getRowArray();
        if (!$tag) return redirect()->to('admin/blog-tags');

        return view('admin/blog_tags/edit', ['title' => 'Edit Tag', 'tag' => $tag]);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|max_length[150]',
            'slug' => "required|max_length[150]|is_unique[blog_tags.slug,id,{$id}]"
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->table('blog_tags')->where('id', $id)->update([
            'name' => $this->request->getPost('name'),
            'slug' => $this->request->getPost('slug'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/blog-tags')->with('success', 'Tag updated successfully.');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->table('blog_tags')->where('id', $id)->delete();
        return redirect()->to('admin/blog-tags')->with('success', 'Tag deleted successfully.');
    }
}
