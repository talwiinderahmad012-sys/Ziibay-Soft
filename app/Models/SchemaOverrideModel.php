<?php

namespace App\Models;

use CodeIgniter\Model;

class SchemaOverrideModel extends Model
{
    protected $table            = 'seo_schema_overrides';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['entity_type', 'entity_id', 'is_enabled', 'manual_json_ld', 'warnings'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    /**
     * Get the override for a specific entity
     */
    public function getOverride(string $entityType, int $entityId)
    {
        return $this->where('entity_type', $entityType)
                    ->where('entity_id', $entityId)
                    ->first();
    }
}
