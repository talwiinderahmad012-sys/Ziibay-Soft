<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationModel extends Model
{
    protected $table = 'locations';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'parent_id', 'name', 'slug', 'location_type', 'tier', 'country_code',
        'locale', 'currency', 'timezone', 'region_label',
        'status', 'is_indexable', 'description', 'seo_title',
        'seo_description', 'canonical_url'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Retrieve hierarchy helper
    public function getHierarchy($locationId)
    {
        $hierarchy = [];
        $current = $this->find($locationId);
        
        while ($current) {
            array_unshift($hierarchy, $current); // Add to beginning
            if ($current['parent_id']) {
                $current = $this->find($current['parent_id']);
            } else {
                $current = null;
            }
        }
        
        return $hierarchy;
    }
}
