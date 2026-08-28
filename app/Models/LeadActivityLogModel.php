<?php

namespace App\Models;

use CodeIgniter\Model;

class LeadActivityLogModel extends Model
{
    protected $table            = 'lead_activity_log';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['lead_id', 'user_id', 'action', 'old_value', 'new_value', 'details'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
}
