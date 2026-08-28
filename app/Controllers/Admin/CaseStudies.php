<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CaseStudyModel;
use App\Models\PortfolioProjectModel;

class CaseStudies extends BaseController
{
    public function index()
    {
        $caseStudyModel = new CaseStudyModel();
        
        $search = $this->request->getGet('search');
        if ($search) {
            $caseStudyModel->like('title', $search)->orLike('client_name', $search);
        }

        $status = $this->request->getGet('status');
        if ($status) {
            $caseStudyModel->where('status', $status);
        }

        $caseStudyModel->orderBy('sort_order', 'ASC')->orderBy('created_at', 'DESC');
        
        $data = [
            'title' => 'Case Studies Management | Admin',
            'case_studies' => $caseStudyModel->paginate(20),
            'pager' => $caseStudyModel->pager,
            'search' => $search,
            'statusFilter' => $status
        ];

        return view('admin/case_studies/index', $data);
    }

    public function create()
    {
        $portfolioModel = new PortfolioProjectModel();
        $db = \Config\Database::connect();
        
        $data = [
            'title' => 'Create Case Study | Admin',
            'projects' => $portfolioModel->select('id, title')->get()->getResultArray()
        ];
        return view('admin/case_studies/create', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]|is_unique[case_studies.slug]',
            'status' => 'required|in_list[draft,published,archived]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $caseStudyModel = new CaseStudyModel();

        $data = $this->request->getPost([
            'portfolio_project_id', 'title', 'slug', 'excerpt', 'client_name',
            'short_description', 'description', 'goals', 'challenge', 'discovery',
            'strategy', 'solution', 'implementation', 'key_features', 'results',
            'lessons', 'status', 'featured', 'sort_order', 'seo_title', 
            'seo_description', 'canonical_url'
        ]);
        
        $data['featured'] = $this->request->getPost('featured') ? 1 : 0;
        if ($data['status'] === 'published') {
            $data['published_at'] = date('Y-m-d H:i:s');
        }
        
        $data['portfolio_project_id'] = $data['portfolio_project_id'] ?: null;

        if ($caseStudyModel->insert($data)) {
            return redirect()->to('admin/case-studies')->with('success', 'Case study created successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to create case study.');
    }

    public function edit($id)
    {
        $caseStudyModel = new CaseStudyModel();
        $caseStudy = $caseStudyModel->find($id);

        if (!$caseStudy) {
            return redirect()->to('admin/case-studies')->with('error', 'Case study not found.');
        }

        $portfolioModel = new PortfolioProjectModel();
        $data = [
            'title' => 'Edit Case Study | Admin',
            'caseStudy' => $caseStudy,
            'projects' => $portfolioModel->select('id, title')->get()->getResultArray()
        ];
        return view('admin/case_studies/edit', $data);
    }

    public function update($id)
    {
        $caseStudyModel = new CaseStudyModel();
        $caseStudy = $caseStudyModel->find($id);
        
        $rules = [
            'title' => 'required|max_length[255]',
            'slug' => "required|max_length[255]|is_unique[case_studies.slug,id,{$id}]",
            'status' => 'required|in_list[draft,published,archived]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost([
            'portfolio_project_id', 'title', 'slug', 'excerpt', 'client_name',
            'short_description', 'description', 'goals', 'challenge', 'discovery',
            'strategy', 'solution', 'implementation', 'key_features', 'results',
            'lessons', 'status', 'sort_order', 'seo_title', 
            'seo_description', 'canonical_url'
        ]);
        
        $data['featured'] = $this->request->getPost('featured') ? 1 : 0;
        if ($data['status'] === 'published' && empty($caseStudy['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }

        $data['portfolio_project_id'] = $data['portfolio_project_id'] ?: null;

        if ($caseStudyModel->update($id, $data)) {
            return redirect()->to('admin/case-studies')->with('success', 'Case study updated successfully.');
        }

        return redirect()->back()->withInput()->with('error', 'Failed to update case study.');
    }

    public function toggleStatus($id)
    {
        $caseStudyModel = new CaseStudyModel();
        $cs = $caseStudyModel->find($id);
        if ($cs) {
            $newStatus = $cs['status'] === 'published' ? 'draft' : 'published';
            $caseStudyModel->update($id, ['status' => $newStatus]);
        }
        return redirect()->back()->with('success', 'Status toggled.');
    }
    
    public function toggleFeatured($id)
    {
        $caseStudyModel = new CaseStudyModel();
        $cs = $caseStudyModel->find($id);
        if ($cs) {
            $newFeatured = $cs['featured'] ? 0 : 1;
            $caseStudyModel->update($id, ['featured' => $newFeatured]);
        }
        return redirect()->back()->with('success', 'Featured toggled.');
    }
}
