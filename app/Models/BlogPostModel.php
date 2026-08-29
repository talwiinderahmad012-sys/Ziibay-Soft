<?php
namespace App\Models;
use CodeIgniter\Model;

class BlogPostModel extends Model
{
    protected $table            = 'blog_posts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['title', 'slug', 'excerpt', 'content', 'featured_image', 'author_id', 'team_member_id', 'category_id', 'content_type', 'status', 'featured', 'published_at', 'scheduled_at', 'seo_title', 'meta_description', 'canonical_url', 'og_title', 'og_description', 'og_image', 'indexable', 'robots'];

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
                    'old_url' => 'blog/' . $oldRecord['slug'],
                    'new_url' => 'blog/' . $data['data']['slug'],
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