<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LocationModel;
use App\Models\LocationServiceModel;

class LocationServices extends BaseController
{
    protected $lsModel;
    protected $locationModel;

    public function __construct()
    {
        $this->lsModel = new LocationServiceModel();
        $this->locationModel = new LocationModel();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        
        $locationId = $this->request->getGet('location_id');
        $query = $db->table('location_services ls')
                    ->select('ls.*, l.name as location_name, s.name as service_name')
                    ->join('locations l', 'l.id = ls.location_id')
                    ->join('services s', 's.id = ls.service_id');
                    
        if ($locationId) {
            $query->where('ls.location_id', $locationId);
        }
        
        $locationServices = $query->orderBy('l.name', 'ASC')->get()->getResultArray();

        $data = [
            'title' => 'Service Locations | Admin',
            'locationServices' => $locationServices,
            'location' => $locationId ? $this->locationModel->find($locationId) : null
        ];

        return view('admin/location_services/index', $data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        $data = [
            'title' => 'Create Service Location | Admin',
            'locations' => $this->locationModel->where('location_type', 'city')->orderBy('name', 'ASC')->findAll(),
            'services' => $db->table('services')->orderBy('name', 'ASC')->get()->getResultArray(),
            'preselected_location' => $this->request->getGet('location_id'),
            'preselected_service' => $this->request->getGet('service_id')
        ];
        return view('admin/location_services/create', $data);
    }

    private function calculateSeoReadiness($data)
    {
        if (empty($data['content']) || empty($data['intro']) || empty($data['seo_title'])) {
            return 0; // Not ready
        }
        // Very basic length check to avoid thin content
        if (strlen($data['content']) < 300) {
            return 0;
        }
        return 1;
    }

    public function store()
    {
        $rules = [
            'location_id' => 'required|is_natural_no_zero',
            'service_id' => 'required|is_natural_no_zero',
            'status' => 'required|in_list[draft,published,archived]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $locationId = $this->request->getPost('location_id');
        $serviceId = $this->request->getPost('service_id');
        
        $content = $this->request->getPost('content');

        // Check for duplicate service link
        $existing = $this->lsModel->where('location_id', $locationId)
                                  ->where('service_id', $serviceId)
                                  ->first();
        if ($existing) {
            return redirect()->back()->withInput()->with('error', 'This Service is already linked to this Location.');
        }
        
        // Prevent doorway page generation by detecting highly similar content
        if ($content && $this->request->getPost('status') === 'published') {
            $similar = $this->lsModel->findSimilarContent($serviceId, $content);
            if ($similar) {
                // Return them to the form, forcing a draft or fix
                return redirect()->back()->withInput()->with('error', 'Critical: This content is too similar to another city page for this service (Mass generation protection). Please make the content unique or save as Draft.');
            }
        }

        $saveData = [
            'location_id' => $locationId,
            'service_id' => $serviceId,
            'status' => $this->request->getPost('status'),
            'is_indexable' => $this->request->getPost('is_indexable') ? 1 : 0,
            'intro' => $this->request->getPost('intro'),
            'content' => $content,
            'local_business_needs' => $this->request->getPost('local_business_needs'),
            'local_faqs' => $this->request->getPost('local_faqs'),
            'market_notes' => $this->request->getPost('market_notes'),
            'seo_title' => $this->request->getPost('seo_title'),
            'seo_description' => $this->request->getPost('seo_description'),
            'canonical_url' => $this->request->getPost('canonical_url'),
            'featured_image_id' => $this->request->getPost('featured_image_id') ?: null,
        ];
        
        $saveData['seo_readiness'] = $this->calculateSeoReadiness($saveData);

        $this->lsModel->insert($saveData);

        return redirect()->to('admin/location-services?location_id='.$locationId)->with('success', 'Service Location created successfully.');
    }

    public function edit($id)
    {
        $ls = $this->lsModel->find($id);
        if (!$ls) return redirect()->to('admin/location-services');

        $db = \Config\Database::connect();
        
        // Compute live warnings
        $warnings = [];
        $wordCount = str_word_count(strip_tags($ls['content'] ?? ''));
        if ($wordCount < 200) {
            $warnings[] = "Thin Content Warning: Page has only {$wordCount} words. Needs at least 200 for good SEO.";
        }
        if (empty($ls['seo_title'])) {
            $warnings[] = "Missing SEO Title: Essential for targeting local search intent.";
        }
        if (empty($ls['canonical_url']) && $ls['is_indexable']) {
            $warnings[] = "Missing Canonical: Indexable pages should typically have a self-canonical URL set.";
        }
        
        $similar = $this->lsModel->findSimilarContent($ls['service_id'], $ls['content'], $ls['id']);
        if ($similar) {
            $warnings[] = "Duplicate Content Warning: Very similar to another published city page.";
        }

        if (!empty($ls['seo_title'])) {
            $cannibalizing = $db->table('location_services')
                                ->where('seo_title', $ls['seo_title'])
                                ->where('id !=', $ls['id'])
                                ->where('status', 'published')
                                ->countAllResults();
            if ($cannibalizing > 0) {
                $warnings[] = "Keyword Cannibalization Warning: Another published location page is targeting the exact same SEO Title.";
            }
        }
        
        // Fetch keyword mapping if any
        $location = $this->locationModel->find($ls['location_id']);
        $service = $db->table('services')->where('id', $ls['service_id'])->get()->getRowArray();
        
        // Calculate the public URL for keyword matching
        $targetUrl = 'locations/TODO_calculate_url'; // In real app, we use hierarchical path
        
        $data = [
            'title' => 'Edit Service Location | Admin',
            'ls' => $ls,
            'location' => $location,
            'service' => $service,
            'warnings' => $warnings
        ];
        return view('admin/location_services/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'status' => 'required|in_list[draft,published,archived]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $ls = $this->lsModel->find($id);
        $content = $this->request->getPost('content');
        
        if ($content && $this->request->getPost('status') === 'published') {
            $similar = $this->lsModel->findSimilarContent($ls['service_id'], $content, $id);
            if ($similar) {
                return redirect()->back()->withInput()->with('error', 'Critical: This content is too similar to another city page for this service (Mass generation protection). Please make the content unique or save as Draft.');
            }
        }

        $saveData = [
            'status' => $this->request->getPost('status'),
            'is_indexable' => $this->request->getPost('is_indexable') ? 1 : 0,
            'intro' => $this->request->getPost('intro'),
            'content' => $content,
            'local_business_needs' => $this->request->getPost('local_business_needs'),
            'local_faqs' => $this->request->getPost('local_faqs'),
            'market_notes' => $this->request->getPost('market_notes'),
            'seo_title' => $this->request->getPost('seo_title'),
            'seo_description' => $this->request->getPost('seo_description'),
            'canonical_url' => $this->request->getPost('canonical_url'),
            'featured_image_id' => $this->request->getPost('featured_image_id') ?: null,
        ];
        
        $saveData['seo_readiness'] = $this->calculateSeoReadiness($saveData);

        $this->lsModel->update($id, $saveData);

        return redirect()->to('admin/location-services?location_id='.$ls['location_id'])->with('success', 'Service Location updated successfully.');
    }

    public function toggleStatus($id)
    {
        $ls = $this->lsModel->find($id);
        if ($ls) {
            $newStatus = $ls['status'] === 'published' ? 'draft' : 'published';
            $this->lsModel->update($id, ['status' => $newStatus]);
        }
        return redirect()->back()->with('success', 'Status updated.');
    }
}
