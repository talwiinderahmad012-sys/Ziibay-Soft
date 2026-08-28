<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class Faqs extends BaseController
{
    public function index()
    {
        $faqModel = new FaqModel();
        
        $search = $this->request->getGet('search');
        if ($search) {
            $faqModel->groupStart()
                     ->like('question', $search)
                     ->orLike('answer', $search)
                     ->groupEnd();
        }

        $faqModel->orderBy('sort_order', 'ASC')->orderBy('created_at', 'DESC');
        
        $data = [
            'title' => 'FAQ Management | Admin',
            'faqs' => $faqModel->paginate(20),
            'pager' => $faqModel->pager,
            'search' => $search
        ];

        return view('admin/faqs/index', $data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        
        $data = [
            'title' => 'Create FAQ | Admin',
            'services' => $db->table('services')->get()->getResultArray(),
            'industries' => $db->table('industries')->get()->getResultArray(),
            'articles' => $db->table('blog_posts')->select('id, title')->get()->getResultArray(),
            'case_studies' => $db->table('case_studies')->select('id, title')->get()->getResultArray()
        ];
        return view('admin/faqs/create', $data);
    }

    public function store()
    {
        $rules = [
            'question' => 'required|max_length[255]',
            'answer' => 'required|max_length[5000]',
            'status' => 'required|in_list[active,inactive]',
            'sort_order' => 'permit_empty|is_natural'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $faqModel = new FaqModel();
        $db = \Config\Database::connect();

        $db->transStart();

        $faqId = $faqModel->insert([
            'question' => strip_tags($this->request->getPost('question')),
            'answer' => $this->request->getPost('answer'), // Admin trusted, but we can purify on display
            'status' => $this->request->getPost('status'),
            'sort_order' => $this->request->getPost('sort_order') ?: 0
        ]);

        $this->syncRelationships($faqId, $this->request);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to create FAQ.');
        }

        return redirect()->to('admin/faqs')->with('success', 'FAQ created successfully.');
    }

    public function edit($id)
    {
        $faqModel = new FaqModel();
        $faq = $faqModel->find($id);

        if (!$faq) {
            return redirect()->to('admin/faqs')->with('error', 'FAQ not found.');
        }

        $db = \Config\Database::connect();
        
        $faq['services'] = array_column($db->table('faq_services')->where('faq_id', $id)->get()->getResultArray(), 'service_id');
        $faq['industries'] = array_column($db->table('faq_industries')->where('faq_id', $id)->get()->getResultArray(), 'industry_id');
        $faq['articles'] = array_column($db->table('faq_articles')->where('faq_id', $id)->get()->getResultArray(), 'article_id');
        $faq['case_studies'] = array_column($db->table('faq_case_studies')->where('faq_id', $id)->get()->getResultArray(), 'case_study_id');

        $data = [
            'title' => 'Edit FAQ | Admin',
            'faq' => $faq,
            'services' => $db->table('services')->get()->getResultArray(),
            'industries' => $db->table('industries')->get()->getResultArray(),
            'articles' => $db->table('blog_posts')->select('id, title')->get()->getResultArray(),
            'case_studies' => $db->table('case_studies')->select('id, title')->get()->getResultArray()
        ];
        return view('admin/faqs/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'question' => 'required|max_length[255]',
            'answer' => 'required|max_length[5000]',
            'status' => 'required|in_list[active,inactive]',
            'sort_order' => 'permit_empty|is_natural'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $faqModel = new FaqModel();
        $db = \Config\Database::connect();

        $db->transStart();

        $faqModel->update($id, [
            'question' => strip_tags($this->request->getPost('question')),
            'answer' => $this->request->getPost('answer'),
            'status' => $this->request->getPost('status'),
            'sort_order' => $this->request->getPost('sort_order') ?: 0
        ]);

        $this->syncRelationships($id, $this->request);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->withInput()->with('error', 'Failed to update FAQ.');
        }

        return redirect()->to('admin/faqs')->with('success', 'FAQ updated successfully.');
    }

    public function delete($id)
    {
        $faqModel = new FaqModel();
        if ($faqModel->delete($id)) {
            return redirect()->to('admin/faqs')->with('success', 'FAQ deleted successfully.');
        }
        return redirect()->to('admin/faqs')->with('error', 'Failed to delete FAQ.');
    }
    
    public function toggleStatus($id)
    {
        $faqModel = new FaqModel();
        $faq = $faqModel->find($id);
        if ($faq) {
            $newStatus = $faq['status'] === 'active' ? 'inactive' : 'active';
            $faqModel->update($id, ['status' => $newStatus]);
        }
        return redirect()->back()->with('success', 'Status toggled.');
    }

    private function syncRelationships($faqId, $request)
    {
        $db = \Config\Database::connect();

        // Services
        $db->table('faq_services')->where('faq_id', $faqId)->delete();
        $services = $request->getPost('services');
        if (!empty($services) && is_array($services)) {
            $data = [];
            foreach ($services as $srvId) {
                $data[] = ['faq_id' => $faqId, 'service_id' => (int)$srvId];
            }
            $db->table('faq_services')->insertBatch($data);
        }

        // Industries
        $db->table('faq_industries')->where('faq_id', $faqId)->delete();
        $industries = $request->getPost('industries');
        if (!empty($industries) && is_array($industries)) {
            $data = [];
            foreach ($industries as $indId) {
                $data[] = ['faq_id' => $faqId, 'industry_id' => (int)$indId];
            }
            $db->table('faq_industries')->insertBatch($data);
        }

        // Articles
        $db->table('faq_articles')->where('faq_id', $faqId)->delete();
        $articles = $request->getPost('articles');
        if (!empty($articles) && is_array($articles)) {
            $data = [];
            foreach ($articles as $artId) {
                $data[] = ['faq_id' => $faqId, 'article_id' => (int)$artId];
            }
            $db->table('faq_articles')->insertBatch($data);
        }

        // Case Studies
        $db->table('faq_case_studies')->where('faq_id', $faqId)->delete();
        $case_studies = $request->getPost('case_studies');
        if (!empty($case_studies) && is_array($case_studies)) {
            $data = [];
            foreach ($case_studies as $csId) {
                $data[] = ['faq_id' => $faqId, 'case_study_id' => (int)$csId];
            }
            $db->table('faq_case_studies')->insertBatch($data);
        }
    }
}
