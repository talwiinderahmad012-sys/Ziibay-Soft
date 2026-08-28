<?php
namespace App\Models;
use CodeIgniter\Model;

class ContactLeadModel extends Model
{
    protected $table            = 'contact_leads';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'email', 'phone', 'country', 'city', 'service_id', 'budget', 'message', 'source', 'status', 'assigned_to'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules could be added here later.
}