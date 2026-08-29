<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class ContentDashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // 1. Overview Metrics
        $totalServices = $db->table('services')->where('status', 'published')->countAllResults();
        $totalBlogs = $db->table('blog_posts')->where('status', 'published')->countAllResults();
        $totalKeywords = $db->table('seo_keywords')->where('status', 'active')->countAllResults();
        $mappedKeywords = $db->table('seo_keywords')->where('status', 'active')->where('target_url != ', null)->countAllResults();

        // 2. Content Gaps (Keywords without targets)
        $unmappedKeywords = $db->table('seo_keywords')
                               ->where('status', 'active')
                               ->groupStart()
                               ->where('target_url', null)
                               ->orWhere('target_url', '')
                               ->groupEnd()
                               ->get()->getResultArray();

        // Services without associated blog posts or case studies
        // (Assuming we check related content via keyword mapping or explicit linking)
        // We will just do a simplistic check: services with 0 primary keywords
        $servicesWithoutKeywords = $db->table('services s')
            ->select('s.id, s.name')
            ->join('seo_keywords k', 'k.service_id = s.id', 'left')
            ->where('s.status', 'published')
            ->groupBy('s.id')
            ->having('COUNT(k.id)', 0)
            ->get()->getResultArray();

        // 3. Cannibalization (Duplicate SEO titles)
        $duplicateLocationTitles = $db->query("
            SELECT seo_title, COUNT(*) as count, GROUP_CONCAT(id) as ids 
            FROM location_services 
            WHERE status = 'published' AND seo_title != '' AND seo_title IS NOT NULL
            GROUP BY seo_title 
            HAVING COUNT(*) > 1
        ")->getResultArray();

        $duplicateServiceTitles = $db->query("
            SELECT seo_title, COUNT(*) as count, GROUP_CONCAT(id) as ids 
            FROM services 
            WHERE status = 'published' AND seo_title != '' AND seo_title IS NOT NULL
            GROUP BY seo_title 
            HAVING COUNT(*) > 1
        ")->getResultArray();

        $duplicateBlogTitles = $db->query("
            SELECT seo_title, COUNT(*) as count, GROUP_CONCAT(id) as ids 
            FROM blog_posts 
            WHERE status = 'published' AND seo_title != '' AND seo_title IS NOT NULL
            GROUP BY seo_title 
            HAVING COUNT(*) > 1
        ")->getResultArray();

        // 4. Orphan pages (Services/Blogs that have 0 internal links pointing to them)
        // Simplified check: Get published services slugs and check if they exist in target_url
        $orphanServices = [];
        $services = $db->table('services')->where('status', 'published')->get()->getResultArray();
        foreach ($services as $s) {
            $url = 'services/' . $s['slug'];
            $linkCount = $db->table('internal_links')->where('target_url', $url)->orWhere('target_url', '/' . $url)->countAllResults();
            if ($linkCount === 0) {
                $orphanServices[] = $s;
            }
        }

        $data = [
            'title' => 'Content Architecture Dashboard',
            'totalServices' => $totalServices,
            'totalBlogs' => $totalBlogs,
            'totalKeywords' => $totalKeywords,
            'mappedKeywords' => $mappedKeywords,
            'unmappedKeywords' => $unmappedKeywords,
            'servicesWithoutKeywords' => $servicesWithoutKeywords,
            'duplicateLocationTitles' => $duplicateLocationTitles,
            'duplicateServiceTitles' => $duplicateServiceTitles,
            'duplicateBlogTitles' => $duplicateBlogTitles,
            'orphanServices' => $orphanServices
        ];

        return view('admin/content_dashboard/index', $data);
    }
}

