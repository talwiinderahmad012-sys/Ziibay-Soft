<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadModel extends Model
{
    protected $table            = 'leads';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'name', 'email', 'phone', 'preferred_contact_method', 'company', 
        'budget', 'timeline', 'project_type', 'country', 'country_id', 
        'city', 'service_id', 'message', 'source_url', 'source_type', 
        'landing_page', 'first_landing_page', 'first_source', 'utm_source', 
        'utm_medium', 'utm_campaign', 'utm_term', 'utm_content', 'locale', 
        'status', 'priority', 'assigned_user_id', 'next_followup_at', 
        'followup_note', 'notes'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
}
