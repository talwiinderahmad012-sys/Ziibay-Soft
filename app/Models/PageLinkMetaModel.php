<?php

namespace App\Models;

use CodeIgniter\Model;

class PageLinkMetaModel extends Model
{
    protected $table            = 'page_link_meta';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['entity_type', 'entity_id', 'priority', 'notes'];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
