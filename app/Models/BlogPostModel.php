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

    // Validation rules could be added here later.
}