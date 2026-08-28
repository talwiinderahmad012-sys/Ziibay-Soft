<?php
namespace App\Models;
use CodeIgniter\Model;

class RedirectModel extends Model
{
    protected $table            = 'redirects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['source_url', 'destination_url', 'redirect_type', 'status', 'hit_count'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules could be added here later.
}