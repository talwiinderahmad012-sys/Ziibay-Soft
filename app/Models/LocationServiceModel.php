<?php

namespace App\Models;

use CodeIgniter\Model;

class LocationServiceModel extends Model
{
    protected $table = 'location_services';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'location_id', 'service_id', 'status', 'is_indexable',
        'intro', 'content', 'seo_title', 'seo_description',
        'canonical_url', 'featured_image_id',
        'local_business_needs', 'local_faqs', 'market_notes', 'seo_readiness'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Checks if there's another location-service record for the SAME service
     * that has extremely similar content (to prevent mass city-swap spam).
     */
    public function findSimilarContent($serviceId, $content, $excludeId = null)
    {
        if (empty($content)) return false;
        
        $builder = $this->where('service_id', $serviceId)
                        ->where('content !=', '')
                        ->where('content IS NOT NULL');
                        
        if ($excludeId) {
            $builder->where('id !=', $excludeId);
        }
        
        $peers = $builder->findAll();
        
        // Very basic similarity check. In production, consider robust cosine similarity.
        $contentLen = strlen($content);
        foreach ($peers as $p) {
            $peerLen = strlen($p['content']);
            if (abs($contentLen - $peerLen) < 50) {
                similar_text($content, $p['content'], $percent);
                if ($percent > 85) { // 85% similar means it's likely a duplicate
                    return $p;
                }
            }
        }
        return false;
    }
}
