<?php
namespace App\Models;
use CodeIgniter\Model;

class SeoMetaModel extends Model
{
    protected $table            = 'seo_meta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['entity_type', 'entity_id', 'seo_title', 'meta_description', 'canonical_url', 'robots', 'og_title', 'og_description', 'og_image', 'twitter_title', 'twitter_description', 'twitter_image', 'schema_type', 'schema_json'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation rules could be added here later.
}