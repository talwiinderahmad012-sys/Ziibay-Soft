<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class SeoAudit extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        // Count Indexable Pages
        $indexableBlogs = $db->table('blog_posts')->where('status', 'published')->where('indexable', 1)->countAllResults();
        $indexableServices = $db->table('services')->where('status', 'published')
                                 ->groupStart()
                                   ->where('robots NOT LIKE', '%noindex%')
                                   ->orWhere('robots IS NULL')
                                   ->orWhere('robots', '')
                                 ->groupEnd()
                                 ->countAllResults();
        $indexableLocations = $db->table('locations')->where('status', 'published')->where('is_indexable', 1)->countAllResults();
        $indexableLocationServices = $db->table('location_services')->where('status', 'published')->where('is_indexable', 1)->countAllResults();
        
        $totalIndexable = $indexableBlogs + $indexableServices + $indexableLocations + $indexableLocationServices;

        // Count NOINDEX Pages
        $noindexBlogs = $db->table('blog_posts')->where('status', 'published')->where('indexable', 0)->countAllResults();
        $noindexServices = $db->table('services')->where('status', 'published')->where('robots LIKE', '%noindex%')->countAllResults();
        $noindexLocations = $db->table('locations')->where('status', 'published')->where('is_indexable', 0)->countAllResults();
        $noindexLocationServices = $db->table('location_services')->where('status', 'published')->where('is_indexable', 0)->countAllResults();
        
        $totalNoIndex = $noindexBlogs + $noindexServices + $noindexLocations + $noindexLocationServices;

        // Detect missing canonical URLs for published indexable pages
        $missingCanonicalBlogs = $db->table('blog_posts')
                                    ->where('status', 'published')
                                    ->where('indexable', 1)
                                    ->groupStart()->where('canonical_url', null)->orWhere('canonical_url', '')->groupEnd()
                                    ->countAllResults();
        $missingCanonicalServices = $db->table('services')
                                       ->where('status', 'published')
                                       ->groupStart()
                                           ->where('robots NOT LIKE', '%noindex%')
                                           ->orWhere('robots IS NULL')
                                           ->orWhere('robots', '')
                                       ->groupEnd()
                                       ->groupStart()->where('canonical_url', null)->orWhere('canonical_url', '')->groupEnd()
                                       ->countAllResults();

        // 404 Links check via Internal Links table (if status column exists in internal links, otherwise we just count them from our crawler, but we can mock finding some)
        $brokenLinks = 0; // In a real scenario, this would involve async crawling
        
        // Count Redirects
        $activeRedirects = $db->table('redirects')->where('status', 'active')->countAllResults();

        // Thin Content Warnings (Location Services < 200 words)
        $thinLocations = $db->table('location_services')
                            ->where('status', 'published')
                            ->where('is_indexable', 1)
                            ->get()->getResultArray();
                            
        $thinContentCount = 0;
        $contentHashes = [];
        $doorwayWarnings = 0;
        
        foreach($thinLocations as $loc) {
            $words = str_word_count(strip_tags((string)$loc['content']));
            if ($words < 200 && $words > 0) {
                $thinContentCount++;
            }
            if ($words > 0) {
                $hash = md5(strip_tags((string)$loc['content']));
                if (!isset($contentHashes[$hash])) {
                    $contentHashes[$hash] = 1;
                } else {
                    $contentHashes[$hash]++;
                }
            }
        }
        
        foreach ($contentHashes as $hash => $count) {
            if ($count > 3) {
                $doorwayWarnings += $count;
            }
        }
        
        // Find duplicate slugs in same parent for locations
        $duplicateLocations = $db->query("SELECT parent_id, slug, COUNT(*) as c FROM locations GROUP BY parent_id, slug HAVING c > 1")->getResultArray();

        $data = [
            'title' => 'Technical SEO Audit Dashboard',
            'totalIndexable' => $totalIndexable,
            'totalNoIndex' => $totalNoIndex,
            'missingCanonical' => $missingCanonicalBlogs + $missingCanonicalServices,
            'activeRedirects' => $activeRedirects,
            'brokenLinks' => $brokenLinks,
            'thinContentCount' => $thinContentCount,
            'doorwayWarnings' => $doorwayWarnings,
            'duplicateLocations' => count($duplicateLocations)
        ];

        return view('admin/seo_audit/index', $data);
    }
}

