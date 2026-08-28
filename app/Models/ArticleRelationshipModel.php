<?php
namespace App\Models;
use CodeIgniter\Model;

class ArticleRelationshipModel extends Model
{
    protected $table            = 'article_relationships';
    protected $primaryKey       = 'parent_article_id'; // Doesn't have a single primary key, composite key
    protected $useAutoIncrement = false;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['parent_article_id', 'child_article_id', 'relationship_type'];

    // No dates for pivot tables normally
    protected $useTimestamps = false;
}
