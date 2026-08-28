<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class BlogCategories extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $categories = $db->table('blog_categories')->get()->getResultArray();
        return view('admin/blog_categories/index', ['title' => 'Blog Categories', 'categories' => $categories]);
    }

    public function create()
    {
        return view('admin/blog_categories/create', ['title' => 'Create Category']);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|max_length[150]',
            'slug' => 'required|max_length[150]|is_unique[blog_categories.slug]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->table('blog_categories')->insert([
            'name' => $this->request->getPost('name'),
            'slug' => $this->request->getPost('slug'),
            'description' => $this->request->getPost('description'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/blog-categories')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $db = \Config\Database::connect();
        $category = $db->table('blog_categories')->where('id', $id)->get()->getRowArray();
        if (!$category) return redirect()->to('admin/blog-categories');

        return view('admin/blog_categories/edit', ['title' => 'Edit Category', 'category' => $category]);
    }

    public function update($id)
    {
        $rules = [
            'name' => 'required|max_length[150]',
            'slug' => "required|max_length[150]|is_unique[blog_categories.slug,id,{$id}]"
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->table('blog_categories')->where('id', $id)->update([
            'name' => $this->request->getPost('name'),
            'slug' => $this->request->getPost('slug'),
            'description' => $this->request->getPost('description'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('admin/blog-categories')->with('success', 'Category updated successfully.');
    }

    public function delete($id)
    {
        $db = \Config\Database::connect();
        $db->table('blog_categories')->where('id', $id)->delete();
        return redirect()->to('admin/blog-categories')->with('success', 'Category deleted successfully.');
    }
}
