<?php
namespace App\Models;
use CodeIgniter\Model;

class LocationServicePageModel extends Model
{
    protected $table            = 'location_service_pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['service_id', 'country_id', 'region_id', 'city_id', 'slug', 'h1', 'intro', 'content', 'benefits', 'local_context', 'industries_content', 'process_content', 'faq_content', 'primary_keyword', 'secondary_keywords', 'search_intent', 'seo_title', 'meta_description', 'canonical_url', 'robots', 'indexable', 'featured', 'status', 'content_score', 'seo_score'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules could be added here later.
}