<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\Database\Exceptions\DatabaseException;

class LocationMatrix extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        $tier = $this->request->getGet('tier') ?: 'all';
        
        // Fetch Services
        $services = $db->table('services')->orderBy('name', 'ASC')->get()->getResultArray();
        
        // Fetch Priority Locations (cities)
        $locBuilder = $db->table('locations')
                         ->where('location_type', 'city')
                         ->orderBy('name', 'ASC');
                         
        if ($tier !== 'all') {
            $locBuilder->where('tier', (int)$tier);
        }
        
        $locations = $locBuilder->get()->getResultArray();
        
        // Fetch Location-Services maps
        $maps = $db->table('location_services')->get()->getResultArray();
        
        // Build Matrix: matrix[location_id][service_id] = map_data
        $matrix = [];
        foreach ($maps as $m) {
            $matrix[$m['location_id']][$m['service_id']] = $m;
        }
        
        $data = [
            'title' => 'Service Location Matrix',
            'services' => $services,
            'locations' => $locations,
            'matrix' => $matrix,
            'tier' => $tier
        ];
        
        return view('admin/location_matrix/index', $data);
    }
}
