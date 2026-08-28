<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Industries extends BaseController
{
    /**
     * Display a listing of the industries.
     */
    public function index()
    {
        $data = [
            'title' => 'Manage Industries - Admin Panel'
        ];
        
        return view('admin/placeholder', $data);
    }

    /**
     * Show the form for creating a new industry.
     */
    public function create()
    {
        $data = [
            'title' => 'Create Industry - Admin Panel'
        ];
        
        return view('admin/placeholder', $data);
    }

    /**
     * Store a newly created industry in storage.
     */
    public function store()
    {
        return redirect()->to('admin/industries')->with('success', 'Industry created successfully.');
    }

    /**
     * Show the form for editing the specified industry.
     */
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Industry - Admin Panel',
            'id' => $id
        ];
        
        return view('admin/placeholder', $data);
    }

    /**
     * Update the specified industry in storage.
     */
    public function update($id)
    {
        return redirect()->to('admin/industries')->with('success', 'Industry updated successfully.');
    }

    /**
     * Publish/Unpublish an industry (Toggle Status).
     */
    public function toggleStatus($id)
    {
        return redirect()->to('admin/industries')->with('success', 'Industry status updated.');
    }
}
