<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\LeadModel;
use App\Models\LeadNotesModel;
use App\Models\LeadActivityLogModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Leads extends BaseController
{
    public function index()
    {
        $leadModel = new LeadModel();
        
        // Handle Search and Filter
        $search = $this->request->getGet('search');
        $statusFilter = $this->request->getGet('status');

        if ($search) {
            $leadModel->groupStart()
                      ->like('name', $search)
                      ->orLike('email', $search)
                      ->orLike('company', $search)
                      ->groupEnd();
        }
        
        if ($statusFilter) {
            $leadModel->where('status', $statusFilter);
        }

        $leadModel->orderBy('created_at', 'DESC');
        
        $perPage = 15;
        $leads = $leadModel->paginate($perPage);
        $pager = $leadModel->pager;

        // Aggregate statistics
        $db = \Config\Database::connect();
        $stats = [
            'new' => $db->table('leads')->where('status', 'New')->countAllResults(),
            'contacted' => $db->table('leads')->where('status', 'Contacted')->countAllResults(),
            'qualified' => $db->table('leads')->where('status', 'Qualified')->countAllResults(),
            'won' => $db->table('leads')->where('status', 'Won')->countAllResults(),
            'lost' => $db->table('leads')->where('status', 'Lost')->countAllResults(),
        ];

        $data = [
            'title' => 'Lead Management | Admin',
            'leads' => $leads,
            'pager' => $pager,
            'search' => $search,
            'statusFilter' => $statusFilter,
            'stats' => $stats
        ];

        return view('admin/leads/index', $data);
    }

    public function show($id)
    {
        $leadModel = new LeadModel();
        $lead = $leadModel->find($id);

        if (!$lead) {
            throw PageNotFoundException::forPageNotFound('Lead not found.');
        }

        $db = \Config\Database::connect();

        // Get services requested
        $services = $db->table('services s')
                       ->join('lead_services ls', 'ls.service_id = s.id')
                       ->where('ls.lead_id', $id)
                       ->get()->getResultArray();

        // Get internal notes
        $notes = $db->table('lead_notes ln')
                    ->select('ln.*, u.name as user_name')
                    ->join('users u', 'u.id = ln.user_id', 'left')
                    ->where('ln.lead_id', $id)
                    ->orderBy('ln.created_at', 'DESC')
                    ->get()->getResultArray();

        // Get activity log
        $activities = $db->table('lead_activity_log la')
                         ->select('la.*, u.name as user_name')
                         ->join('users u', 'u.id = la.user_id', 'left')
                         ->where('la.lead_id', $id)
                         ->orderBy('la.created_at', 'DESC')
                         ->get()->getResultArray();

        // Get users for assignment
        $teamMembers = $db->table('users')->select('id, name')->where('status', 'active')->get()->getResultArray();
        
        $assignedUser = null;
        if ($lead['assigned_user_id']) {
            $assignedUser = $db->table('users')->select('name')->where('id', $lead['assigned_user_id'])->get()->getRowArray();
        }

        $data = [
            'title' => 'Lead Detail | Admin',
            'lead' => $lead,
            'services' => $services,
            'notes' => $notes,
            'activities' => $activities,
            'teamMembers' => $teamMembers,
            'assignedUser' => $assignedUser
        ];

        return view('admin/leads/show', $data);
    }

    public function updateStatus($id)
    {
        $leadModel = new LeadModel();
        $lead = $leadModel->find($id);

        if (!$lead) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        $status = $this->request->getPost('status');
        
        if (in_array($status, ['New', 'Contacted', 'Qualified', 'Proposal', 'Won', 'Lost', 'Spam', 'Archived'])) {
            $leadModel->update($id, ['status' => $status]);
            
            // Log activity
            $activityModel = new LeadActivityLogModel();
            $activityModel->insert([
                'lead_id' => $id,
                // Ideally user_id would be session()->get('user_id')
                'user_id' => 1, 
                'action' => 'Status changed',
                'old_value' => $lead['status'],
                'new_value' => $status,
                'details' => "Status changed from {$lead['status']} to {$status}."
            ]);
        }

        return redirect()->to("admin/leads/{$id}")->with('success', 'Status updated.');
    }

    public function assign($id)
    {
        $leadModel = new LeadModel();
        if (!$leadModel->find($id)) {
            return redirect()->back()->with('error', 'Lead not found.');
        }

        $userId = $this->request->getPost('assigned_user_id');
        $leadModel->update($id, ['assigned_user_id' => $userId]);

        // Log activity
        $activityModel = new LeadActivityLogModel();
        $activityModel->insert([
            'lead_id' => $id,
            'user_id' => 1, 
            'action' => 'Lead assigned',
            'new_value' => $userId,
            'details' => "Lead assigned to user ID {$userId}."
        ]);

        return redirect()->to("admin/leads/{$id}")->with('success', 'Lead assigned.');
    }

    public function addNote($id)
    {
        $noteText = strip_tags($this->request->getPost('note'));
        
        if (empty($noteText)) {
            return redirect()->back()->with('error', 'Note cannot be empty.');
        }

        $noteModel = new LeadNotesModel();
        $noteModel->insert([
            'lead_id' => $id,
            'user_id' => 1, // session()->get('user_id')
            'note' => $noteText
        ]);

        // Log activity
        $activityModel = new LeadActivityLogModel();
        $activityModel->insert([
            'lead_id' => $id,
            'user_id' => 1,
            'action' => 'Note added',
            'details' => 'An internal note was added.'
        ]);

        return redirect()->to("admin/leads/{$id}")->with('success', 'Note added.');
    }
}
