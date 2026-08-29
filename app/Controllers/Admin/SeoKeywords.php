<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\SeoKeywordModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class SeoKeywords extends BaseController
{
    protected $keywordModel;

    public function __construct()
    {
        $this->keywordModel = new SeoKeywordModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $intent = $this->request->getGet('intent');
        $type = $this->request->getGet('type');
        $status = $this->request->getGet('status');

        $builder = $this->keywordModel->orderBy('priority', 'ASC')->orderBy('updated_at', 'DESC');

        if ($search) {
            $builder->like('keyword', $search);
        }
        if ($intent) {
            $builder->where('intent', $intent);
        }
        if ($type) {
            $builder->where('keyword_type', $type);
        }
        if ($status) {
            $builder->where('status', $status);
        }

        $keywords = $builder->paginate(20);
        
        // Compute cannibalization warnings directly for the view
        foreach ($keywords as &$k) {
            $k['cannibalization_warning'] = false;
            if ($k['keyword_type'] === 'primary' && $k['status'] === 'active' && $k['target_url']) {
                $k['cannibalization_warning'] = $this->keywordModel->hasCannibalizationWarning($k['normalized_keyword'], $k['target_url'], $k['id']);
            }
        }

        $data = [
            'title' => 'SEO Keywords',
            'keywords' => $keywords,
            'pager' => $this->keywordModel->pager,
            'search' => $search,
            'intent' => $intent,
            'type' => $type,
            'status' => $status
        ];

        return view('admin/seo_keywords/index', $data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        $data = [
            'title' => 'Add SEO Keyword',
            'services' => $db->table('services')->orderBy('name')->get()->getResultArray(),
            'locations' => $db->table('locations')->orderBy('name')->get()->getResultArray(),
            'industries' => $db->table('industries')->orderBy('name')->get()->getResultArray(),
        ];
        return view('admin/seo_keywords/create', $data);
    }

    public function store()
    {
        $rules = [
            'keyword' => 'required',
            'intent' => 'required|in_list[commercial,transactional,informational,navigational,local_commercial,local_transactional]',
            'keyword_type' => 'required|in_list[primary,secondary,semantic,long_tail,question]',
            'priority' => 'required|in_list[high,medium,low]',
            'status' => 'required|in_list[draft,active,archived]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $saveData = [
            'keyword' => $this->request->getPost('keyword'),
            'intent' => $this->request->getPost('intent'),
            'keyword_type' => $this->request->getPost('keyword_type'),
            'service_id' => $this->request->getPost('service_id') ?: null,
            'location_id' => $this->request->getPost('location_id') ?: null,
            'industry_id' => $this->request->getPost('industry_id') ?: null,
            'target_url' => $this->request->getPost('target_url') ?: null,
            'priority' => $this->request->getPost('priority'),
            'status' => $this->request->getPost('status'),
            'notes' => $this->request->getPost('notes')
        ];

        try {
            $this->keywordModel->insert($saveData);
            return redirect()->to('admin/seo-keywords')->with('message', 'Keyword added successfully');
        } catch (DatabaseException $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to save keyword. Check constraints.');
        }
    }

    public function edit($id)
    {
        $keyword = $this->keywordModel->find($id);
        if (!$keyword) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $db = \Config\Database::connect();
        $data = [
            'title' => 'Edit SEO Keyword',
            'keyword' => $keyword,
            'services' => $db->table('services')->orderBy('name')->get()->getResultArray(),
            'locations' => $db->table('locations')->orderBy('name')->get()->getResultArray(),
            'industries' => $db->table('industries')->orderBy('name')->get()->getResultArray(),
        ];
        return view('admin/seo_keywords/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'keyword' => 'required',
            'intent' => 'required|in_list[commercial,transactional,informational,navigational,local_commercial,local_transactional]',
            'keyword_type' => 'required|in_list[primary,secondary,semantic,long_tail,question]',
            'priority' => 'required|in_list[high,medium,low]',
            'status' => 'required|in_list[draft,active,archived]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'keyword' => $this->request->getPost('keyword'),
            'intent' => $this->request->getPost('intent'),
            'keyword_type' => $this->request->getPost('keyword_type'),
            'service_id' => $this->request->getPost('service_id') ?: null,
            'location_id' => $this->request->getPost('location_id') ?: null,
            'industry_id' => $this->request->getPost('industry_id') ?: null,
            'target_url' => $this->request->getPost('target_url') ?: null,
            'priority' => $this->request->getPost('priority'),
            'status' => $this->request->getPost('status'),
            'notes' => $this->request->getPost('notes')
        ];

        $this->keywordModel->update($id, $updateData);
        return redirect()->to('admin/seo-keywords')->with('message', 'Keyword updated successfully');
    }

    /**
     * View Content Brief for a Target URL
     */
    public function brief()
    {
        $targetUrl = $this->request->getGet('url');
        if (!$targetUrl) {
            return redirect()->to('admin/seo-keywords')->with('error', 'No Target URL provided for brief.');
        }

        $keywords = $this->keywordModel->where('target_url', $targetUrl)->where('status', 'active')->findAll();

        $primary = [];
        $secondary = [];
        $semantic = [];
        $questions = [];

        foreach ($keywords as $k) {
            switch ($k['keyword_type']) {
                case 'primary': $primary[] = $k; break;
                case 'secondary': 
                case 'long_tail': 
                    $secondary[] = $k; break;
                case 'semantic': $semantic[] = $k; break;
                case 'question': $questions[] = $k; break;
            }
        }

        $data = [
            'title' => 'Content Brief: ' . $targetUrl,
            'targetUrl' => $targetUrl,
            'primary' => $primary,
            'secondary' => $secondary,
            'semantic' => $semantic,
            'questions' => $questions
        ];

        return view('admin/seo_keywords/brief', $data);
    }
}
