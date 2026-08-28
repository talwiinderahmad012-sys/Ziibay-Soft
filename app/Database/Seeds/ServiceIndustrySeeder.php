<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ServiceIndustrySeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        $industries = $db->table('industries')->get()->getResultArray();
        $services = $db->table('services')->get()->getResultArray();
        
        $industryMap = [];
        foreach ($industries as $i) {
            $industryMap[$i['slug']] = $i['id'];
        }
        
        $serviceMap = [];
        foreach ($services as $s) {
            $serviceMap[$s['slug']] = $s['id'];
        }

        $links = [
            'ecommerce' => ['web-development', 'app-development', 'seo', 'social-media-management', 'software-development'],
            'healthcare' => ['software-development', 'web-development', 'app-development'],
            'education' => ['web-development', 'software-development', 'app-development', 'seo'],
            'real-estate' => ['web-development', 'software-development', 'seo'],
            'finance' => ['software-development', 'web-development'],
            'saas' => ['software-development', 'web-development', 'seo']
        ];

        $insertData = [];
        foreach ($links as $industrySlug => $serviceSlugs) {
            if (!isset($industryMap[$industrySlug])) continue;
            
            foreach ($serviceSlugs as $serviceSlug) {
                if (!isset($serviceMap[$serviceSlug])) continue;
                
                $insertData[] = [
                    'industry_id' => $industryMap[$industrySlug],
                    'service_id' => $serviceMap[$serviceSlug]
                ];
            }
        }

        if (!empty($insertData)) {
            $db->table('service_industries')->ignore(true)->insertBatch($insertData);
        }
    }
}
