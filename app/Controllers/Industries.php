<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Industries extends BaseController
{
    public function index()
    {
        $industryModel = new \App\Models\IndustryModel();
        // Only load published industries
        $industries = $industryModel->where('status', 'published')->orderBy('sort_order', 'ASC')->findAll();

        $data = [
            'title' => 'Industries We Serve | Ziibay Soft',
            'meta_description' => 'Discover the diverse sectors Ziibay Soft can build digital solutions for, including E-commerce, Healthcare, Finance, Education, and more.',
            'canonical_url' => base_url('industries'),
            'industries' => $industries
        ];
        
        return view('pages/industries', $data);
    }

    public function show($slug)
    {
        $industryModel = new \App\Models\IndustryModel();
        
        $industry = $industryModel->where('slug', $slug)->where('status', 'published')->first();

        if (!$industry) {
            throw PageNotFoundException::forPageNotFound("Industry not found: $slug");
        }

        // Fetch related services via pivot table
        $db = \Config\Database::connect();
        $builder = $db->table('services');
        $builder->select('services.*');
        $builder->join('service_industries', 'service_industries.service_id = services.id');
        $builder->where('service_industries.industry_id', $industry['id']);
        $builder->where('services.status', 'published');
        $builder->orderBy('services.sort_order', 'ASC');
        
        $related_services = $builder->get()->getResultArray();

        $data = [
            'title' => $industry['seo_title'] ?: ($industry['name'] . ' Software Solutions | Ziibay Soft'),
            'meta_description' => $industry['seo_description'] ?: ('Custom digital solutions designed for the ' . $industry['name'] . ' sector by Ziibay Soft. Explore potential applications and workflows.'),
            'canonical_url' => base_url('industries/' . $slug),
            'industry' => $industry,
            'related_services' => $related_services,
            'whatsapp_message' => 'Hello Ziibay Soft, I would like to discuss a solution for my ' . $industry['name'] . ' business.'
        ];

        return view('pages/industry_detail', $data);
    }
}
