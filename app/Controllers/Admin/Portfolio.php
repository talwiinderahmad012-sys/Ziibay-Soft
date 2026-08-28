<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PortfolioProjectModel;

class Portfolio extends BaseController
{
    public function index()
    {
        $portfolioModel = new PortfolioProjectModel();
        
        $search = $this->request->getGet('search');
        if ($search) {
            $portfolioModel->groupStart()
                           ->like('title', $search)
                           ->orLike('client_name', $search)
                           ->groupEnd();
        }

        $status = $this->request->getGet('status');
        if ($status) {
            $portfolioModel->where('status', $status);
        }

        $portfolioModel->orderBy('sort_order', 'ASC')->orderBy('created_at', 'DESC');
        
        $data = [
            'title' => 'Portfolio Management | Admin',
            'projects' => $portfolioModel->paginate(20),
            'pager' => $portfolioModel->pager,
            'search' => $search,
            'statusFilter' => $status
        ];

        return view('admin/portfolio/index', $data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        
        $data = [
            'title' => 'Create Portfolio Project | Admin',
            'services' => $db->table('services')->get()->getResultArray(),
            'industries' => $db->table('industries')->get()->getResultArray(),
            'technologies' => $db->table('technologies')->get()->getResultArray()
        ];
        return view('admin/portfolio/create', $data);
    }

    public function store()
    {
        $rules = [
            'title' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]|is_unique[portfolio_projects.slug]',
            'project_type' => 'required',
            'status' => 'required|in_list[draft,published,archived]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $portfolioModel = new PortfolioProjectModel();
        $db = \Config\Database::connect();

        $db->transStart();

        $data = $this->request->getPost([
            'title', 'slug', 'client_name', 'project_type', 'short_description', 
            'description', 'project_url', 'completion_date', 'status', 'featured', 
            'sort_order', 'seo_title', 'seo_description', 'canonical_url'
        ]);
        
        $data['featured'] = $this->request->getPost('featured') ? 1 : 0;
        if ($data['status'] === 'published') {
            $data['published_at'] = date('Y-m-d H:i:s');
        }

        $projectId = $portfolioModel->insert($data);

        $this->syncRelationships($projectId, $this->request);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to create project.');
        }

        return redirect()->to('admin/portfolio')->with('success', 'Project created successfully.');
    }

    public function edit($id)
    {
        $portfolioModel = new PortfolioProjectModel();
        $project = $portfolioModel->find($id);

        if (!$project) {
            return redirect()->to('admin/portfolio')->with('error', 'Project not found.');
        }

        $db = \Config\Database::connect();
        
        $project['services'] = array_column($db->table('portfolio_services')->where('portfolio_id', $id)->get()->getResultArray(), 'service_id');
        $project['industries'] = array_column($db->table('portfolio_industries')->where('portfolio_project_id', $id)->get()->getResultArray(), 'industry_id');
        $project['technologies'] = array_column($db->table('portfolio_technologies')->where('portfolio_id', $id)->get()->getResultArray(), 'technology_id');

        $data = [
            'title' => 'Edit Portfolio Project | Admin',
            'project' => $project,
            'services' => $db->table('services')->get()->getResultArray(),
            'industries' => $db->table('industries')->get()->getResultArray(),
            'technologies' => $db->table('technologies')->get()->getResultArray()
        ];
        return view('admin/portfolio/edit', $data);
    }

    public function update($id)
    {
        $portfolioModel = new PortfolioProjectModel();
        $project = $portfolioModel->find($id);
        
        $rules = [
            'title' => 'required|max_length[255]',
            'slug' => "required|max_length[255]|is_unique[portfolio_projects.slug,id,{$id}]",
            'project_type' => 'required',
            'status' => 'required|in_list[draft,published,archived]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $db = \Config\Database::connect();
        $db->transStart();

        $data = $this->request->getPost([
            'title', 'slug', 'client_name', 'project_type', 'short_description', 
            'description', 'project_url', 'completion_date', 'status', 'sort_order', 
            'seo_title', 'seo_description', 'canonical_url'
        ]);
        
        $data['featured'] = $this->request->getPost('featured') ? 1 : 0;
        
        if ($data['status'] === 'published' && empty($project['published_at'])) {
            $data['published_at'] = date('Y-m-d H:i:s');
        }

        $portfolioModel->update($id, $data);
        $this->syncRelationships($id, $this->request);
        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to update project.');
        }

        return redirect()->to('admin/portfolio')->with('success', 'Project updated successfully.');
    }

    public function delete($id)
    {
        $portfolioModel = new PortfolioProjectModel();
        $db = \Config\Database::connect();
        
        $db->transStart();
        // Delete relationships
        $db->table('portfolio_services')->where('portfolio_id', $id)->delete();
        $db->table('portfolio_industries')->where('portfolio_project_id', $id)->delete();
        $db->table('portfolio_technologies')->where('portfolio_id', $id)->delete();
        $portfolioModel->delete($id);
        $db->transComplete();

        return redirect()->to('admin/portfolio')->with('success', 'Project deleted successfully.');
    }
    
    public function toggleStatus($id)
    {
        $portfolioModel = new PortfolioProjectModel();
        $project = $portfolioModel->find($id);
        if ($project) {
            $newStatus = $project['status'] === 'published' ? 'draft' : 'published';
            $portfolioModel->update($id, ['status' => $newStatus]);
        }
        return redirect()->back()->with('success', 'Status toggled.');
    }
    
    public function toggleFeatured($id)
    {
        $portfolioModel = new PortfolioProjectModel();
        $project = $portfolioModel->find($id);
        if ($project) {
            $newFeatured = $project['featured'] ? 0 : 1;
            $portfolioModel->update($id, ['featured' => $newFeatured]);
        }
        return redirect()->back()->with('success', 'Featured toggled.');
    }

    private function syncRelationships($projectId, $request)
    {
        $db = \Config\Database::connect();

        // Services
        $db->table('portfolio_services')->where('portfolio_id', $projectId)->delete();
        $services = $request->getPost('services');
        if (!empty($services) && is_array($services)) {
            $data = [];
            foreach ($services as $srvId) {
                $data[] = ['portfolio_id' => $projectId, 'service_id' => (int)$srvId];
            }
            $db->table('portfolio_services')->insertBatch($data);
        }

        // Industries
        $db->table('portfolio_industries')->where('portfolio_project_id', $projectId)->delete();
        $industries = $request->getPost('industries');
        if (!empty($industries) && is_array($industries)) {
            $data = [];
            foreach ($industries as $indId) {
                $data[] = ['portfolio_project_id' => $projectId, 'industry_id' => (int)$indId];
            }
            $db->table('portfolio_industries')->insertBatch($data);
        }

        // Technologies
        $db->table('portfolio_technologies')->where('portfolio_id', $projectId)->delete();
        $technologies = $request->getPost('technologies');
        if (!empty($technologies) && is_array($technologies)) {
            $data = [];
            foreach ($technologies as $techId) {
                $data[] = ['portfolio_id' => $projectId, 'technology_id' => (int)$techId];
            }
            $db->table('portfolio_technologies')->insertBatch($data);
        }
    }
}
