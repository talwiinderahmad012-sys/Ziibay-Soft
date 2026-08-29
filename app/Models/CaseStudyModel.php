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
    
    protected $beforeUpdate = ['checkSlugChange'];

    protected function checkSlugChange(array $data)
    {
        if (isset($data['data']['slug']) && isset($data['id'][0])) {
            $id = $data['id'][0];
            $oldRecord = $this->find($id);
            if ($oldRecord && $oldRecord['slug'] !== $data['data']['slug']) {
                $db = \Config\Database::connect();
                $db->table('redirects')->insert([
                    'old_url' => 'case-studies/' . $oldRecord['slug'],
                    'new_url' => 'case-studies/' . $data['data']['slug'],
                    'redirect_type' => 301,
                    'status' => 'active',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }
        return $data;
    }

    // Validation rules could be added here later.
}