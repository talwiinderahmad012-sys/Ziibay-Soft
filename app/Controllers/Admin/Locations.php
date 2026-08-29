<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LocationModel;

class Locations extends BaseController
{
    protected $locationModel;

    public function __construct()
    {
        $this->locationModel = new LocationModel();
    }

    public function index()
    {
        $type = $this->request->getGet('type') ?? 'country';
        $parentId = $this->request->getGet('parent_id');
        $search = $this->request->getGet('search');
        $status = $this->request->getGet('status');
        
        $query = $this->locationModel->where('location_type', $type);

        if ($parentId) {
            $query->where('parent_id', $parentId);
        }
        
        if ($search) {
            $query->groupStart()
                  ->like('name', $search)
                  ->orLike('slug', $search)
                  ->orLike('country_code', $search)
                  ->groupEnd();
        }
        
        if ($status) {
            $query->where('status', $status);
        }

        $locations = $query->orderBy('name', 'ASC')->paginate(50);

        $parent = null;
        if ($parentId) {
            $parent = $this->locationModel->find($parentId);
        }

        $data = [
            'title' => 'Manage Locations | Admin',
            'locations' => $locations,
            'pager' => $this->locationModel->pager,
            'type' => $type,
            'parent' => $parent,
            'coverage' => [
                'countries' => $this->locationModel->where('location_type', 'country')->countAllResults(),
                'regions' => $this->locationModel->where('location_type', 'region')->countAllResults(),
                'cities' => $this->locationModel->where('location_type', 'city')->countAllResults(),
                'published' => $this->locationModel->where('status', 'published')->countAllResults(),
                'draft' => $this->locationModel->where('status', 'draft')->countAllResults(),
            ]
        ];

        return view('admin/locations/index', $data);
    }

    public function create()
    {
        $type = $this->request->getGet('type') ?? 'country';
        $parentId = $this->request->getGet('parent_id');
        
        $data = [
            'title' => 'Create Location | Admin',
            'type' => $type,
            'parentId' => $parentId,
            'parents' => $this->getAvailableParents($type)
        ];
        return view('admin/locations/create', $data);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]',
            'location_type' => 'required|in_list[country,region,city]',
            'status' => 'required|in_list[draft,published,archived]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $parentId = $this->request->getPost('parent_id') ?: null;
        
        // Ensure slug is unique under the same parent
        $existing = $this->locationModel->where('slug', $this->request->getPost('slug'))
                                        ->where('parent_id', $parentId)
                                        ->first();
        if ($existing) {
            return redirect()->back()->withInput()->with('error', 'A location with this slug already exists under the selected parent.');
        }

        $this->locationModel->insert([
            'parent_id' => $parentId,
            'name' => $this->request->getPost('name'),
            'slug' => $this->request->getPost('slug'),
            'location_type' => $this->request->getPost('location_type'),
            'country_code' => $this->request->getPost('country_code'),
            'locale' => $this->request->getPost('locale'),
            'currency' => $this->request->getPost('currency'),
            'timezone' => $this->request->getPost('timezone'),
            'region_label' => $this->request->getPost('region_label'),
            'status' => $this->request->getPost('status'),
            'is_indexable' => $this->request->getPost('is_indexable') ? 1 : 0,
            'description' => $this->request->getPost('description'),
            'seo_title' => $this->request->getPost('seo_title'),
            'seo_description' => $this->request->getPost('seo_description'),
            'canonical_url' => $this->request->getPost('canonical_url'),
        ]);

        return redirect()->to('admin/locations?type=' . $this->request->getPost('location_type') . ($parentId ? '&parent_id=' . $parentId : ''))->with('success', 'Location created successfully.');
    }

    public function edit($id)
    {
        $location = $this->locationModel->find($id);
        if (!$location) return redirect()->to('admin/locations');

        $data = [
            'title' => 'Edit Location | Admin',
            'location' => $location,
            'parents' => $this->getAvailableParents($location['location_type'])
        ];
        return view('admin/locations/edit', $data);
    }

    public function update($id)
    {
        $location = $this->locationModel->find($id);
        
        $rules = [
            'name' => 'required|max_length[255]',
            'slug' => 'required|max_length[255]',
            'status' => 'required|in_list[draft,published,archived]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $parentId = $this->request->getPost('parent_id') ?: null;

        // Check uniqueness
        $existing = $this->locationModel->where('slug', $this->request->getPost('slug'))
                                        ->where('parent_id', $parentId)
                                        ->where('id !=', $id)
                                        ->first();
        if ($existing) {
            return redirect()->back()->withInput()->with('error', 'A location with this slug already exists under the selected parent.');
        }

        $this->locationModel->update($id, [
            'parent_id' => $parentId,
            'name' => $this->request->getPost('name'),
            'slug' => $this->request->getPost('slug'),
            'country_code' => $this->request->getPost('country_code'),
            'locale' => $this->request->getPost('locale'),
            'currency' => $this->request->getPost('currency'),
            'timezone' => $this->request->getPost('timezone'),
            'region_label' => $this->request->getPost('region_label'),
            'status' => $this->request->getPost('status'),
            'is_indexable' => $this->request->getPost('is_indexable') ? 1 : 0,
            'description' => $this->request->getPost('description'),
            'seo_title' => $this->request->getPost('seo_title'),
            'seo_description' => $this->request->getPost('seo_description'),
            'canonical_url' => $this->request->getPost('canonical_url'),
        ]);

        return redirect()->to('admin/locations?type=' . $location['location_type'] . ($parentId ? '&parent_id=' . $parentId : ''))->with('success', 'Location updated successfully.');
    }

    public function toggleStatus($id)
    {
        $loc = $this->locationModel->find($id);
        if ($loc) {
            $newStatus = $loc['status'] === 'published' ? 'draft' : 'published';
            $this->locationModel->update($id, ['status' => $newStatus]);
        }
        return redirect()->back()->with('success', 'Status updated.');
    }

    private function getAvailableParents($type)
    {
        if ($type === 'country') return [];
        
        $parentType = $type === 'region' ? 'country' : 'region';
        return $this->locationModel->where('location_type', $parentType)->orderBy('name', 'ASC')->findAll();
    }
}
