<?php
namespace App\Models;
use CodeIgniter\Model;

class ServiceModel extends Model
{
    protected $table            = 'services';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['category_id', 'name', 'slug', 'short_description', 'description', 'icon', 'featured', 'status', 'sort_order', 'deleted_at'];

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
                    'old_url' => 'services/' . $oldRecord['slug'],
                    'new_url' => 'services/' . $data['data']['slug'],
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