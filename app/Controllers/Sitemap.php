<?php

namespace App\Controllers;

class Sitemap extends BaseController
{
    public function index()
    {
        // Mock data fetching, matching future DB
        $db = \Config\Database::connect();
        
        // Fetch published industries
        $industries = $db->table('industries')
                         ->where('status', 'published')
                         ->orderBy('created_at', 'DESC')
                         ->get()
                         ->getResultArray();

        // Fetch published portfolio projects
        $projects = $db->table('portfolio_projects')
                         ->where('status', 'published')
                         ->orderBy('created_at', 'DESC')
                         ->get()
                         ->getResultArray();

        // Fetch published case studies
        $caseStudies = $db->table('case_studies')
                         ->where('status', 'published')
                         ->where('indexable', 1)
                         ->orderBy('created_at', 'DESC')
                         ->get()
                         ->getResultArray();

        // Fetch published blog posts
        $blogPosts = $db->table('blog_posts')
                         ->where('status', 'published')
                         ->where('indexable', 1)
                         ->where('(scheduled_at IS NULL OR scheduled_at <= NOW())')
                         ->orderBy('published_at', 'DESC')
                         ->get()
                         ->getResultArray();
                         
        // Fetch services
        $servicesData = $this->getMockServices();
        $publishedServices = array_filter($servicesData, function($service) {
            return !isset($service['status']) || $service['status'] === 'published';
        });

        $data = [
            'services'    => $publishedServices,
            'industries'  => $industries,
            'projects'    => $projects,
            'caseStudies' => $caseStudies,
            'blogPosts'   => $blogPosts
        ];

        $this->response->setContentType('text/xml');
        return view('sitemap/index', $data);
    }

    private function getMockServices(): array
    {
        // For sitemap generation we can instantiate Services controller to re-use mock, 
        // or duplicate. Re-using here to keep it DRY.
        $servicesController = new Services();
        
        // Use reflection to access the private method since we are simulating a DB layer
        $reflection = new \ReflectionClass($servicesController);
        $method = $reflection->getMethod('getMockServices');
        $method->setAccessible(true);
        return $method->invoke($servicesController);
    }
}
