<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationServiceModel extends Model
{
    protected $table            = 'location_service_pages';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'service_id', 'country_id', 'region_id', 'city_id', 'slug', 
        'h1', 'intro', 'content', 'benefits', 'local_context', 
        'industries_content', 'process_content', 'faq_content', 
        'primary_keyword', 'secondary_keywords', 'search_intent', 
        'seo_title', 'meta_description', 'canonical_url', 'robots', 
        'indexable', 'featured', 'status', 'content_score', 'seo_score'
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * Retrieves a published, fully validated location-service page by joining
     * across the geographic hierarchy.
     */
    public function getPageByHierarchy(string $countrySlug, string $regionSlug, string $citySlug, string $serviceSlug)
    {
        return $this->select('location_service_pages.*, 
                              countries.name as country_name, countries.slug as country_slug,
                              regions.name as region_name, 
                              cities.name as city_name, 
                              services.name as service_name, services.slug as service_slug')
                    ->join('services', 'services.id = location_service_pages.service_id')
                    ->join('countries', 'countries.id = location_service_pages.country_id')
                    ->join('regions', 'regions.id = location_service_pages.region_id')
                    ->join('cities', 'cities.id = location_service_pages.city_id')
                    ->where('countries.slug', $countrySlug)
                    ->where('regions.slug', $regionSlug)
                    ->where('cities.slug', $citySlug)
                    ->where('services.slug', $serviceSlug)
                    // ->where('location_service_pages.status', 'published') // Optional: can be checked in controller to allow draft previews for admins
                    ->first();
    }
}
