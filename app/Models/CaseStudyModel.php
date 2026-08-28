<?php
namespace App\Models;
use CodeIgniter\Model;

class CaseStudyModel extends Model
{
    protected $table            = 'case_studies';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['portfolio_project_id', 'title', 'slug', 'excerpt', 'client_name', 'short_description', 'description', 'goals', 'challenge', 'discovery', 'strategy', 'solution', 'implementation', 'key_features', 'results', 'lessons', 'testimonial', 'featured_image', 'gallery', 'status', 'featured', 'indexable', 'sort_order', 'seo_title', 'seo_description', 'canonical_url', 'og_image', 'published_at'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules could be added here later.
}