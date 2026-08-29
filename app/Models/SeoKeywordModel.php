<?php

namespace App\Models;

use CodeIgniter\Model;

class SeoKeywordModel extends Model
{
    protected $table            = 'seo_keywords';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    
    protected $allowedFields    = [
        'keyword', 'normalized_keyword', 'intent', 'keyword_type', 
        'service_id', 'location_id', 'industry_id', 'target_url', 
        'priority', 'status', 'notes'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Normalize keyword before insert/update
    protected $beforeInsert = ['normalizeKeyword'];
    protected $beforeUpdate = ['normalizeKeyword'];

    protected function normalizeKeyword(array $data)
    {
        if (isset($data['data']['keyword'])) {
            $data['data']['normalized_keyword'] = strtolower(trim(preg_replace('/\s+/', ' ', $data['data']['keyword'])));
        }
        return $data;
    }

    /**
     * Check for cannibalization issues:
     * Returns true if there is another ACTIVE PRIMARY keyword 
     * with the same normalized text but a different target URL.
     */
    public function hasCannibalizationWarning($normalizedKeyword, $targetUrl, $currentId = null)
    {
        if (!$targetUrl) return false;
        
        $builder = $this->where('normalized_keyword', $normalizedKeyword)
                        ->where('keyword_type', 'primary')
                        ->where('status', 'active')
                        ->where('target_url !=', $targetUrl);
                        
        if ($currentId) {
            $builder->where('id !=', $currentId);
        }
        
        return $builder->countAllResults() > 0;
    }
}
