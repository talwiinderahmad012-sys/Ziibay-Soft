<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Files\File;

class TeamMembers extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $members = $db->table('team_members')->orderBy('display_order', 'ASC')->get()->getResultArray();

        $data = [
            'title' => 'Team Members',
            'members' => $members
        ];

        return view('admin/team/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create Team Member',
        ];
        return view('admin/team/create', $data);
    }

    public function store()
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost(['name', 'role_title', 'bio', 'status', 'linkedin_url', 'display_order']);
        
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/team', $newName);
            $data['image_path'] = 'uploads/team/' . $newName;
        }

        $db->table('team_members')->insert($data);

        return redirect()->to('admin/team')->with('success', 'Team member created successfully.');
    }

    public function edit($id)
    {
        $db = \Config\Database::connect();
        $member = $db->table('team_members')->where('id', $id)->get()->getRowArray();
        
        if (!$member) {
            return redirect()->to('admin/team')->with('error', 'Member not found.');
        }

        $data = [
            'title' => 'Edit Team Member',
            'member' => $member
        ];

        return view('admin/team/edit', $data);
    }

    public function update($id)
    {
        $db = \Config\Database::connect();
        $data = $this->request->getPost(['name', 'role_title', 'bio', 'status', 'linkedin_url', 'display_order']);
        
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(FCPATH . 'uploads/team', $newName);
            $data['image_path'] = 'uploads/team/' . $newName;
        }

        $db->table('team_members')->where('id', $id)->update($data);

        return redirect()->to('admin/team')->with('success', 'Team member updated successfully.');
    }
    
    public function toggleStatus($id)
    {
        $db = \Config\Database::connect();
        $member = $db->table('team_members')->where('id', $id)->get()->getRowArray();
        if ($member) {
            $newStatus = $member['status'] === 'published' ? 'draft' : 'published';
            $db->table('team_members')->where('id', $id)->update(['status' => $newStatus]);
        }
        return redirect()->back()->with('success', 'Status toggled successfully.');
    }
}
