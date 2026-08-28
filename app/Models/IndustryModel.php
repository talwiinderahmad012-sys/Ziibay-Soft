<?php
namespace App\Models;
use CodeIgniter\Model;

class IndustryModel extends Model
{
    protected $table            = 'industries';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name', 'slug', 'short_description', 'description', 'challenges', 'solutions', 'icon', 'status', 'featured', 'sort_order', 'seo_title', 'seo_description'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules could be added here later.
}