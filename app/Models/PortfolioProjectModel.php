<?php
namespace App\Models;
use CodeIgniter\Model;

class PortfolioProjectModel extends Model
{
    protected $table            = 'portfolio_projects';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'slug', 'client_name', 'project_type', 'short_description', 'description', 'challenge', 'solution', 'key_features', 'results', 'featured_image', 'gallery', 'project_url', 'completion_date', 'status', 'featured', 'sort_order', 'seo_title', 'seo_description', 'canonical_url', 'published_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules could be added here later.
}