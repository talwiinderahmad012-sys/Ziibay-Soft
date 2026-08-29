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
        $publishedServices = $db->table('services')
                                ->where('status', 'published')
                                ->groupStart()
                                   ->where('robots NOT LIKE', '%noindex%')
                                   ->orWhere('robots IS NULL')
                                   ->orWhere('robots', '')
                                ->groupEnd()
                                ->orderBy('created_at', 'DESC')
                                ->get()
                                ->getResultArray();

        // Fetch published indexable locations (Country, Region, City)
        $locations = $db->table('locations')
                        ->where('status', 'published')
                        ->where('is_indexable', 1)
                        ->get()
                        ->getResultArray();
        
        // Let's resolve their full slugs
        $locationUrls = [];
        foreach($locations as $loc) {
            $path = [$loc['slug']];
            $current = $loc;
            while($current['parent_id']) {
                $parent = $db->table('locations')->where('id', $current['parent_id'])->first();
                if(!$parent) break;
                array_unshift($path, $parent->slug);
                $current = (array)$parent;
            }
            $locationUrls[] = [
                'url' => base_url('locations/' . implode('/', $path)),
                'updated_at' => $loc['updated_at']
            ];
        }

        // Fetch published indexable location services
        $locationServices = $db->table('location_services ls')
                               ->select('ls.updated_at, c.slug as city_slug, r.slug as region_slug, co.slug as country_slug, s.slug as service_slug')
                               ->join('locations c', 'c.id = ls.location_id')
                               ->join('locations r', 'r.id = c.parent_id', 'left')
                               ->join('locations co', 'co.id = r.parent_id', 'left')
                               ->join('services s', 's.id = ls.service_id')
                               ->where('ls.status', 'published')
                               ->where('ls.is_indexable', 1)
                               ->get()
                               ->getResultArray();

        $locationServiceUrls = [];
        foreach($locationServices as $ls) {
            if($ls['country_slug'] && $ls['region_slug'] && $ls['city_slug'] && $ls['service_slug']) {
                $locationServiceUrls[] = [
                    'url' => base_url('locations/' . $ls['country_slug'] . '/' . $ls['region_slug'] . '/' . $ls['city_slug'] . '/' . $ls['service_slug']),
                    'updated_at' => $ls['updated_at']
                ];
            }
        }

        $data = [
            'services'    => $publishedServices,
            'industries'  => $industries,
            'projects'    => $projects,
            'caseStudies' => $caseStudies,
            'blogPosts'   => $blogPosts,
            'locationUrls'=> $locationUrls,
            'locationServiceUrls' => $locationServiceUrls
        ];

        $this->response->setContentType('text/xml');
        return view('sitemap/index', $data);
    }
}
