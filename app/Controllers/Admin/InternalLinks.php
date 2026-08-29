<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

/**
 * Phase #20 — Internal Link Audit Dashboard
 *
 * Provides editorial diagnostics:
 *  - Orphan detection  (pages with no meaningful inbound internal links)
 *  - Click depth from Home
 *  - Priority classification management
 *
 * IMPORTANT: This dashboard reports on discoverability and site structure.
 * It does NOT claim to predict or guarantee search-engine rankings.
 * The word "authority" is intentionally avoided in all output.
 * Terminology used: Discoverability, Inbound Links, Priority.
 */
class InternalLinks extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    // ------------------------------------------------------------------
    // MAIN AUDIT DASHBOARD
    // ------------------------------------------------------------------

    public function index()
    {
        $pages = $this->buildPageInventory();

        $stats = [
            'total'         => count($pages),
            'priority'      => count(array_filter($pages, fn($p) => $p['priority'] === 'priority')),
            'orphan_critical' => count(array_filter($pages, fn($p) => $p['status'] === 'orphan' && $p['priority'] === 'priority')),
            'orphan_warning'  => count(array_filter($pages, fn($p) => $p['status'] === 'orphan' && $p['priority'] !== 'priority')),
            'deep_warning'    => count(array_filter($pages, fn($p) => ($p['depth'] ?? 0) > 3 && $p['priority'] === 'priority')),
        ];

        $data = [
            'title'  => 'Internal Link Audit | Admin',
            'pages'  => $pages,
            'stats'  => $stats,
        ];

        return view('admin/internal_links/index', $data);
    }

    // ------------------------------------------------------------------
    // PRIORITY MANAGEMENT (save page priority via POST)
    // ------------------------------------------------------------------

    public function setPriority()
    {
        $entityType = $this->request->getPost('entity_type');
        $entityId   = (int)$this->request->getPost('entity_id');
        $priority   = $this->request->getPost('priority');

        $allowed = ['priority', 'normal', 'low'];
        $types   = ['page', 'service', 'industry', 'blog_post', 'blog_category', 'case_study', 'portfolio', 'location', 'location_service'];

        if (! in_array($priority, $allowed) || ! in_array($entityType, $types) || $entityId <= 0) {
            return redirect()->back()->with('error', 'Invalid priority data.');
        }

        // Upsert
        $existing = $this->db->table('page_link_meta')
                             ->where('entity_type', $entityType)
                             ->where('entity_id', $entityId)
                             ->get()->getRowArray();

        if ($existing) {
            $this->db->table('page_link_meta')->where('id', $existing['id'])->update(['priority' => $priority, 'updated_at' => date('Y-m-d H:i:s')]);
        } else {
            $this->db->table('page_link_meta')->insert([
                'entity_type' => $entityType,
                'entity_id'   => $entityId,
                'priority'    => $priority,
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()->to('admin/internal-links')->with('success', 'Priority updated.');
    }

    // ------------------------------------------------------------------
    // PRIVATE: Build the page inventory with depth + inbound link counts
    // ------------------------------------------------------------------

    private function buildPageInventory(): array
    {
        $pages = [];

        // ---- 1. Static hub pages ----
        $hubs = [
            ['url' => '/',            'title' => 'Home',         'type' => 'hub',      'depth' => 0],
            ['url' => '/services',    'title' => 'Services Hub',  'type' => 'hub',      'depth' => 1],
            ['url' => '/industries',  'title' => 'Industries',    'type' => 'hub',      'depth' => 1],
            ['url' => '/locations',   'title' => 'Locations Hub', 'type' => 'hub',      'depth' => 1],
            ['url' => '/blog',        'title' => 'Blog',          'type' => 'hub',      'depth' => 1],
            ['url' => '/case-studies','title' => 'Case Studies',  'type' => 'hub',      'depth' => 1],
            ['url' => '/portfolio',   'title' => 'Portfolio',     'type' => 'hub',      'depth' => 1],
            ['url' => '/contact',     'title' => 'Contact',       'type' => 'hub',      'depth' => 1],
            ['url' => '/about',       'title' => 'About',         'type' => 'hub',      'depth' => 1],
            ['url' => '/faq',         'title' => 'FAQ',           'type' => 'hub',      'depth' => 1],
        ];

        foreach ($hubs as $hub) {
            $hub['priority'] = 'priority';
            $hub['inbound_estimate'] = 99; // Linked from header/footer
            $hub['status'] = 'healthy';
            $hub['entity_type'] = 'page';
            $hub['entity_id']   = 0;
            $hub['silo'] = 'Core';
            $pages[] = $hub;
        }

        // ---- 2. Services (Depth 2 — Services Hub → Service) ----
        $services = $this->db->table('services')->where('status', 'published')->get()->getResultArray();
        $priorityMeta = $this->getPriorityMeta('service');

        foreach ($services as $s) {
            $inbound = $this->estimateServiceInbound($s['id']);
            $pages[] = [
                'url'             => '/services/' . $s['slug'],
                'title'           => $s['name'],
                'type'            => 'service',
                'depth'           => 2,
                'priority'        => $priorityMeta[$s['id']] ?? 'priority', // Services default to priority
                'inbound_estimate'=> $inbound,
                'status'          => $inbound > 0 ? 'healthy' : 'orphan',
                'entity_type'     => 'service',
                'entity_id'       => $s['id'],
                'silo'            => $s['name'],
            ];
        }

        // ---- 3. Industries (Depth 2) ----
        $industries = $this->db->table('industries')->where('status', 'published')->get()->getResultArray();
        $priorityMeta = $this->getPriorityMeta('industry');

        foreach ($industries as $ind) {
            $inbound = $this->estimateIndustryInbound($ind['id']);
            $pages[] = [
                'url'             => '/industries/' . $ind['slug'],
                'title'           => $ind['name'],
                'type'            => 'industry',
                'depth'           => 2,
                'priority'        => $priorityMeta[$ind['id']] ?? 'normal',
                'inbound_estimate'=> $inbound,
                'status'          => $inbound > 0 ? 'healthy' : 'orphan',
                'entity_type'     => 'industry',
                'entity_id'       => $ind['id'],
                'silo'            => 'Industries',
            ];
        }

        // ---- 4. Blog Posts (Depth 3 — Blog → Category → Post or Blog → Post) ----
        $posts = $this->db->table('blog_posts')->where('status', 'published')->select('id, title, slug, category_id, service_id')->get()->getResultArray();
        $priorityMeta = $this->getPriorityMeta('blog_post');

        foreach ($posts as $post) {
            $inbound = 1; // Listed on /blog and category page
            if ($post['service_id']) {
                $inbound++; // Linked from service page if service_id set
            }
            $depth = 3;
            $pages[] = [
                'url'             => '/blog/' . $post['slug'],
                'title'           => $post['title'],
                'type'            => 'blog_post',
                'depth'           => $depth,
                'priority'        => $priorityMeta[$post['id']] ?? 'normal',
                'inbound_estimate'=> $inbound,
                'status'          => 'healthy',
                'entity_type'     => 'blog_post',
                'entity_id'       => $post['id'],
                'silo'            => 'Blog',
                'note'            => $post['service_id'] ? 'Linked to service' : '⚠ No service link',
            ];
        }

        // ---- 5. Case Studies (Depth 2) ----
        $caseStudies = $this->db->table('case_studies')->where('status', 'published')->select('id, title, slug')->get()->getResultArray();
        $priorityMeta = $this->getPriorityMeta('case_study');

        foreach ($caseStudies as $cs) {
            $inbound = $this->estimateCaseStudyInbound($cs['id']);
            $pages[] = [
                'url'             => '/case-studies/' . $cs['slug'],
                'title'           => $cs['title'],
                'type'            => 'case_study',
                'depth'           => 2,
                'priority'        => $priorityMeta[$cs['id']] ?? 'normal',
                'inbound_estimate'=> $inbound,
                'status'          => $inbound > 0 ? 'healthy' : 'orphan',
                'entity_type'     => 'case_study',
                'entity_id'       => $cs['id'],
                'silo'            => 'Case Studies',
            ];
        }

        // ---- 6. Locations (country depth=2, region=3, city=4) ----
        $locations = $this->db->table('locations')->where('status', 'published')->select('id, name, slug, location_type, parent_id, is_indexable')->get()->getResultArray();
        $priorityMeta = $this->getPriorityMeta('location');

        $locationIndex = [];
        foreach ($locations as $loc) {
            $locationIndex[$loc['id']] = $loc;
        }

        foreach ($locations as $loc) {
            $depth = match($loc['location_type']) {
                'country' => 2,
                'region'  => 3,
                'city'    => 4,
                default   => 5,
            };
            $robots = $loc['is_indexable'] ? 'index' : 'noindex';
            $pages[] = [
                'url'             => '/locations/...' . $loc['slug'],
                'title'           => $loc['name'] . ' (' . $loc['location_type'] . ')',
                'type'            => 'location',
                'depth'           => $depth,
                'priority'        => $priorityMeta[$loc['id']] ?? 'normal',
                'inbound_estimate'=> $depth <= 3 ? 2 : 1, // Countries linked from Locations Hub
                'status'          => 'healthy',
                'entity_type'     => 'location',
                'entity_id'       => $loc['id'],
                'silo'            => 'Locations',
                'note'            => $robots === 'noindex' ? 'noindex' : '',
            ];
        }

        // ---- 7. Location-Service pages (depth=5) ----
        $lsPages = $this->db->table('location_services ls')
                            ->select('ls.id, ls.status, ls.is_indexable, ls.seo_readiness, s.name as service_name, l.name as city_name, l.slug as city_slug')
                            ->join('services s', 's.id = ls.service_id')
                            ->join('locations l', 'l.id = ls.location_id')
                            ->where('ls.status', 'published')
                            ->get()->getResultArray();
        $priorityMeta = $this->getPriorityMeta('location_service');

        foreach ($lsPages as $ls) {
            $inbound = $ls['seo_readiness'] ? 2 : 1; // Linked from city page if indexed
            $note = '';
            if (!$ls['is_indexable']) {
                $note = 'noindex';
            } elseif (!$ls['seo_readiness']) {
                $note = '⚠ Low content';
            }
            $pages[] = [
                'url'             => '/locations/.../' . $ls['city_slug'] . '/' . '...',
                'title'           => $ls['service_name'] . ' in ' . $ls['city_name'],
                'type'            => 'location_service',
                'depth'           => 5,
                'priority'        => $priorityMeta[$ls['id']] ?? 'normal',
                'inbound_estimate'=> $inbound,
                'status'          => $inbound > 0 ? 'healthy' : 'orphan',
                'entity_type'     => 'location_service',
                'entity_id'       => $ls['id'],
                'silo'            => 'Location SEO',
                'note'            => $note,
            ];
        }

        return $pages;
    }

    // ------------------------------------------------------------------
    // Inbound link estimators — counts content-relationship links
    // ------------------------------------------------------------------

    private function estimateServiceInbound(int $serviceId): int
    {
        // From: header (nav), services hub, related on case studies, industries, blog
        $count = 3; // header + footer + services hub
        $count += $this->db->table('case_study_services')->where('service_id', $serviceId)->countAllResults();
        $count += $this->db->table('industry_services')->where('service_id', $serviceId)->countAllResults();
        $count += $this->db->table('blog_posts')->where('service_id', $serviceId)->where('status', 'published')->countAllResults();
        return $count;
    }

    private function estimateIndustryInbound(int $industryId): int
    {
        $count = 1; // industries hub
        $count += $this->db->table('case_study_industries')->where('industry_id', $industryId)->countAllResults();
        $count += $this->db->table('industry_services')->where('industry_id', $industryId)->countAllResults();
        return $count;
    }

    private function estimateCaseStudyInbound(int $csId): int
    {
        $count = 1; // case studies hub
        $count += $this->db->table('case_study_services')->where('case_study_id', $csId)->countAllResults();
        return $count;
    }

    private function getPriorityMeta(string $entityType): array
    {
        $rows = $this->db->table('page_link_meta')
                         ->where('entity_type', $entityType)
                         ->get()->getResultArray();
        $map = [];
        foreach ($rows as $row) {
            $map[$row['entity_id']] = $row['priority'];
        }
        return $map;
    }
}
