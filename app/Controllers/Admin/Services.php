<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
// use App\Models\ServiceModel; // To be created/used when DB is online

class Services extends BaseController
{
    /**
     * Display a listing of the services.
     */
    public function index()
    {
        // $model = new ServiceModel();
        // $services = $model->orderBy('sort_order', 'ASC')->findAll();
        
        $data = [
            'title' => 'Manage Services - Admin Panel'
            // 'services' => $services
        ];
        
        return view('admin/placeholder', $data); // Uses a generic placeholder for now
    }

    /**
     * Show the form for creating a new service.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Service - Admin Panel'
        ];
        
        return view('admin/placeholder', $data);
    }

    /**
     * Store a newly created service in storage.
     */
    public function store()
    {
        // Validation logic for creating service
        // Rules: name (required), slug (required, unique, alpha_dash), category_id (required), status (in_list[draft,published])
        // $model->insert($data);
        return redirect()->to('admin/services')->with('success', 'Service created successfully.');
    }

    /**
     * Show the form for editing the specified service.
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Service - Admin Panel',
            'id' => $id
        ];
        
        return view('admin/placeholder', $data);
    }

    /**
     * Update the specified service in storage.
     */
    public function update($id)
    {
        // Validation and update logic
        // $model->update($id, $data);
        return redirect()->to('admin/services')->with('success', 'Service updated successfully.');
    }

    /**
     * Publish/Unpublish a service (Toggle Status).
     */
    public function toggleStatus($id)
    {
        // $model->update($id, ['status' => $this->request->getPost('status')]);
        return redirect()->to('admin/services')->with('success', 'Service status updated.');
    }
}
