<?php

namespace App\Services;

/**
 * InternalLinkService (Phase #20)
 *
 * Single source of truth for:
 *  1. Deterministic related-content lookups used by public pages
 *     (service silos, location silos, blog clusters, industry hubs).
 *  2. The internal link graph audit (inbound/outbound counts, click depth,
 *     orphan detection, broken links, redirect targets, recommendations).
 *
 * All queries only surface published content. Draft/noindex content is
 * never suggested for public linking.
 */
class InternalLinkService
{
    /**
     * Public (mock-routed) service slug => services table slug.
     * The public /services/seo page exists while the DB row uses seo-services.
     */
    public const SERVICE_SLUG_ALIASES = [
        'seo' => 'seo-services',
    ];

    /** Cache key / TTL for the audit report. */
    private const AUDIT_CACHE_KEY = 'internal_link_audit_v1';
    private const AUDIT_CACHE_TTL = 3600;

    /** Core commercial pages reachable from the primary navigation. */
    public const CORE_SERVICE_SLUGS = [
        'web-development',
        'software-development',
        'app-development',
        'seo',
        'social-media-management',
    ];

    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        helper('internal_link');
    }

    // ------------------------------------------------------------------
    // Entity resolution
    // ------------------------------------------------------------------

    /**
     * Resolve a services table row from the public service slug.
     */
    public function findServiceByPublicSlug(string $slug): ?array
    {
        $dbSlug = self::SERVICE_SLUG_ALIASES[$slug] ?? $slug;

        $row = $this->db->table('services')
            ->where('slug', $dbSlug)
            ->where('status', 'published')
            ->get()
            ->getRowArray();

        return $row ?: null;
    }

    /**
     * Build the ordered slug path for a location (country/region/city).
     *
     * @return list<string> e.g. ['united-states', 'california', 'los-angeles']
     */
    public function locationPath(array $location): array
    {
        $path    = [$location['slug']];
        $current = $location;

        while (! empty($current['parent_id'])) {
            $parent = $this->db->table('locations')
                ->where('id', $current['parent_id'])
                ->get()
                ->getRowArray();

            if (! $parent) {
                break;
            }

            array_unshift($path, $parent['slug']);
            $current = $parent;
        }

        return $path;
    }

    // ------------------------------------------------------------------
    // Related content (deterministic, relationship-driven)
    // ------------------------------------------------------------------

    /** Published case studies linked to a service (via case_study_services). */
    public function relatedCaseStudiesForService(int $serviceId, int $limit = 3): array
    {
        return $this->db->table('case_studies cs')
            ->select('cs.id, cs.title, cs.slug, cs.excerpt, cs.featured_image')
            ->join('case_study_services css', 'css.case_study_id = cs.id')
            ->where('css.service_id', $serviceId)
            ->where('cs.status', 'published')
            ->orderBy('cs.featured', 'DESC')
            ->orderBy('cs.published_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /** Published guides linked to a service (via blog_post_services). */
    public function relatedGuidesForService(int $serviceId, int $limit = 3): array
    {
        return $this->db->table('blog_posts bp')
            ->select('bp.id, bp.title, bp.slug, bp.excerpt')
            ->join('blog_post_services bps', 'bps.post_id = bp.id')
            ->where('bps.service_id', $serviceId)
            ->where('bp.status', 'published')
            ->where('(bp.scheduled_at IS NULL OR bp.scheduled_at <= NOW())')
            ->orderBy('bp.published_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /** Published industries linked to a service (via service_industries). */
    public function relatedIndustriesForService(int $serviceId, int $limit = 6): array
    {
        return $this->db->table('industries i')
            ->select('i.id, i.name, i.slug, i.short_description')
            ->join('service_industries si', 'si.industry_id = i.id')
            ->where('si.service_id', $serviceId)
            ->where('i.status', 'published')
            ->orderBy('i.sort_order', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /**
     * Published, indexable service+city pages for a service.
     * Limited count — priority locations only, never giant lists.
     */
    public function priorityLocationsForService(int $serviceId, int $limit = 6): array
    {
        $rows = $this->db->table('location_services ls')
            ->select('ls.id, ls.location_id, ls.service_id, l.name AS city_name, l.slug AS city_slug, l.parent_id')
            ->join('locations l', 'l.id = ls.location_id')
            ->where('ls.service_id', $serviceId)
            ->where('ls.status', 'published')
            ->where('ls.is_indexable', 1)
            ->where('l.status', 'published')
            ->orderBy('ls.id', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();

        $result = [];
        foreach ($rows as $row) {
            $path = $this->locationPath([
                'id'        => $row['location_id'],
                'parent_id' => $row['parent_id'],
                'slug'      => $row['city_slug'],
            ]);

            if (count($path) !== 3) {
                continue; // Only expose complete country/region/city hierarchies.
            }

            $result[] = [
                'name' => $row['city_name'],
                'url'  => internal_url('location_service', ['path' => $path, 'service_slug' => $this->servicePublicSlug($serviceId)]),
                'path' => $path,
            ];
        }

        return $result;
    }

    /** Published services linked to an industry (via service_industries). */
    public function relatedServicesForIndustry(int $industryId, int $limit = 5): array
    {
        return $this->db->table('services s')
            ->select('s.id, s.name, s.slug, s.short_description')
            ->join('service_industries si', 'si.service_id = s.id')
            ->where('si.industry_id', $industryId)
            ->where('s.status', 'published')
            ->orderBy('s.sort_order', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /** Published case studies linked to an industry (via case_study_industries). */
    public function relatedCaseStudiesForIndustry(int $industryId, int $limit = 3): array
    {
        return $this->db->table('case_studies cs')
            ->select('cs.id, cs.title, cs.slug, cs.excerpt, cs.featured_image')
            ->join('case_study_industries csi', 'csi.case_study_id = cs.id')
            ->where('csi.industry_id', $industryId)
            ->where('cs.status', 'published')
            ->orderBy('cs.featured', 'DESC')
            ->orderBy('cs.published_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /** Published guides linked to an industry (via blog_post_industries). */
    public function relatedGuidesForIndustry(int $industryId, int $limit = 3): array
    {
        return $this->db->table('blog_posts bp')
            ->select('bp.id, bp.title, bp.slug, bp.excerpt')
            ->join('blog_post_industries bpi', 'bpi.post_id = bp.id')
            ->where('bpi.industry_id', $industryId)
            ->where('bp.status', 'published')
            ->where('(bp.scheduled_at IS NULL OR bp.scheduled_at <= NOW())')
            ->orderBy('bp.published_at', 'DESC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /** Published services linked to a blog post (via blog_post_services). */
    public function relatedServicesForBlogPost(int $postId, int $limit = 2): array
    {
        return $this->db->table('services s')
            ->select('s.id, s.name, s.slug, s.short_description')
            ->join('blog_post_services bps', 'bps.service_id = s.id')
            ->where('bps.post_id', $postId)
            ->where('s.status', 'published')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /** Published industries linked to a blog post (via blog_post_industries). */
    public function relatedIndustriesForBlogPost(int $postId, int $limit = 3): array
    {
        return $this->db->table('industries i')
            ->select('i.id, i.name, i.slug')
            ->join('blog_post_industries bpi', 'bpi.industry_id = i.id')
            ->where('bpi.post_id', $postId)
            ->where('i.status', 'published')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /**
     * Small set of sibling cities in the same region (related locations).
     * Deliberately capped — related locations must stay a short list.
     */
    public function siblingCitiesForCity(int $cityId, ?int $regionId, int $limit = 4): array
    {
        if (! $regionId) {
            return [];
        }

        return $this->db->table('locations')
            ->select('id, name, slug')
            ->where('parent_id', $regionId)
            ->where('location_type', 'city')
            ->where('status', 'published')
            ->where('id !=', $cityId)
            ->orderBy('name', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /**
     * Distinct published services offered anywhere inside a country
     * (through published location_services on its cities).
     */
    public function servicesInCountry(int $countryId, int $limit = 5): array
    {
        return $this->db->table('services s')
            ->select('s.id, s.name, s.slug')
            ->join('location_services ls', 'ls.service_id = s.id')
            ->join('locations city', 'city.id = ls.location_id')
            ->join('locations region', 'region.id = city.parent_id', 'left')
            ->where('ls.status', 'published')
            ->where('city.status', 'published')
            ->groupStart()
                ->where('city.parent_id', $countryId)
                ->orWhere('region.parent_id', $countryId)
            ->groupEnd()
            ->groupBy('s.id')
            ->orderBy('s.sort_order', 'ASC')
            ->limit($limit)
            ->get()
            ->getResultArray();
    }

    /**
     * Map a services.id back to the public page slug.
     */
    public function servicePublicSlug(int $serviceId): ?string
    {
        static $map = null;

        if ($map === null) {
            $map = [];
            $rows = $this->db->table('services')->select('id, slug')->get()->getResultArray();
            $flippedAliases = array_flip(self::SERVICE_SLUG_ALIASES);

            foreach ($rows as $row) {
                $map[(int) $row['id']] = $flippedAliases[$row['slug']] ?? $row['slug'];
            }
        }

        return $map[$serviceId] ?? null;
    }

    /**
     * Convert a services-table slug to the canonical public page slug.
     * Example: seo-services => seo.
     */
    public function publicSlugFromDbSlug(string $dbSlug): string
    {
        $flipped = array_flip(self::SERVICE_SLUG_ALIASES);

        return $flipped[$dbSlug] ?? $dbSlug;
    }

    // ------------------------------------------------------------------
    // Internal link audit
    // ------------------------------------------------------------------

    /**
     * Return the cached audit, running it first when missing.
     */
    public function getAudit(bool $force = false): array
    {
        $cache = service('cache');

        if (! $force) {
            try {
                $cached = $cache->get(self::AUDIT_CACHE_KEY);
                if (is_array($cached)) {
                    return $cached;
                }
            } catch (\Throwable $e) {
                // Cache unavailable — fall through and compute.
            }
        }

        $audit = $this->runAudit();

        try {
            $cache->save(self::AUDIT_CACHE_KEY, $audit, self::AUDIT_CACHE_TTL);
        } catch (\Throwable $e) {
            // Non-fatal: the report still works without caching.
        }

        return $audit;
    }

    public function clearAuditCache(): void
    {
        try {
            service('cache')->delete(self::AUDIT_CACHE_KEY);
        } catch (\Throwable $e) {
            // Ignore cache failures.
        }
    }

    /**
     * Build the full internal link report.
     */
    public function runAudit(): array
    {
        $inventory = $this->buildInventory();
        $edges     = $this->buildEdges($inventory);

        $inbound  = [];
        $outbound = [];

        foreach ($edges as $from => $targets) {
            $uniqueTargets = array_values(array_unique($targets));
            $outbound[$from] = count($uniqueTargets);

            foreach ($uniqueTargets as $to) {
                $inbound[$to] = ($inbound[$to] ?? 0) + 1;
            }
        }

        $depths = $this->computeDepths($edges);

        // Broken + redirect detection over content links.
        $brokenLinks     = [];
        $redirectedLinks = [];
        $redirectMap     = $this->getRedirectMap();

        foreach ($edges as $from => $targets) {
            foreach (array_unique($targets) as $to) {
                if (! isset($inventory[$to])) {
                    $brokenLinks[] = [
                        'source' => $from,
                        'target' => $to,
                        'suggestion' => $this->suggestReplacement($to, $inventory),
                    ];
                } elseif (isset($redirectMap[$to])) {
                    $redirectedLinks[] = [
                        'source' => $from,
                        'target' => $to,
                        'final'  => $redirectMap[$to],
                    ];
                }
            }
        }

        $priorities = $this->getPriorityOverrides();
        $pages      = [];

        foreach ($inventory as $path => $page) {
            $priority = $priorities[$page['entity_type'] . ':' . $page['entity_id']] ?? $page['priority'];
            $depth    = $depths[$path] ?? null;
            $inCount  = $inbound[$path] ?? 0;

            $status = 'healthy';
            if ($inCount === 0) {
                $status = $priority === 'priority' ? 'critical' : ($priority === 'low' ? 'healthy' : 'warning');
            } elseif ($priority === 'priority' && $depth !== null && $depth >= 4) {
                $status = 'warning';
            }

            $pages[] = [
                'url'          => $path,
                'title'        => $page['title'],
                'type'         => $page['type'],
                'silo'         => $page['silo'],
                'parent'       => $page['parent'],
                'entity_type'  => $page['entity_type'],
                'entity_id'    => $page['entity_id'],
                'indexable'    => $page['indexable'],
                'priority'     => $priority,
                'inbound'      => $inCount,
                'outbound'     => $outbound[$path] ?? 0,
                'depth'        => $depth,
                'status'       => $inCount === 0 ? 'orphan' : $status,
            ];
        }

        usort($pages, static function (array $a, array $b): int {
            return [$a['inbound'], $b['priority'] === 'priority' ? 1 : 0]
                <=> [$b['inbound'], $a['priority'] === 'priority' ? 1 : 0];
        });

        $orphans = array_values(array_filter($pages, static fn (array $p): bool => $p['status'] === 'orphan'));
        $deepPages = array_values(array_filter(
            $pages,
            static fn (array $p): bool => $p['priority'] === 'priority' && $p['depth'] !== null && $p['depth'] >= 4
        ));

        $siloCoverage = [];
        foreach ($pages as $page) {
            $siloCoverage[$page['silo']] = ($siloCoverage[$page['silo']] ?? 0) + 1;
        }
        ksort($siloCoverage);

        $audit = [
            'generated_at'     => date('Y-m-d H:i:s'),
            'totals'           => [
                'pages'           => count($pages),
                'links'           => array_sum($outbound),
                'broken'          => count($brokenLinks),
                'redirected'      => count($redirectedLinks),
                'orphans'         => count($orphans),
                'critical'        => count(array_filter($pages, static fn (array $p): bool => $p['status'] === 'critical')),
                'warnings'        => count(array_filter($pages, static fn (array $p): bool => $p['status'] === 'warning')),
                'priority_pages'  => count(array_filter($pages, static fn (array $p): bool => $p['priority'] === 'priority')),
            ],
            'pages'            => $pages,
            'broken_links'     => $brokenLinks,
            'redirected_links' => $redirectedLinks,
            'orphan_pages'     => $orphans,
            'deep_pages'       => $deepPages,
            'silo_coverage'    => $siloCoverage,
            'recommendations'  => $this->buildRecommendations($pages, $brokenLinks, $redirectedLinks),
        ];

        return $audit;
    }

    // ------------------------------------------------------------------
    // Inventory
    // ------------------------------------------------------------------

    /**
     * Registry of every legitimate internal destination.
     * Keyed by normalized path.
     *
     * @return array<string, array<string, mixed>>
     */
    private function buildInventory(): array
    {
        $inventory = [];

        $add = function (string $path, string $title, string $type, string $silo, ?string $parent, string $entityType, int $entityId, bool $indexable = true, string $priority = 'normal') use (&$inventory): void {
            $inventory[$path] = [
                'title'       => $title,
                'type'        => $type,
                'silo'        => $silo,
                'parent'      => $parent,
                'entity_type' => $entityType,
                'entity_id'   => $entityId,
                'indexable'   => $indexable,
                'priority'    => $priority,
            ];
        };

        // Structural hubs and fixed pages.
        $add('/', 'Home', 'home', 'core', null, 'page', 1, true, 'priority');
        $add('/about', 'About Us', 'page', 'core', '/', 'page', 2);
        $add('/contact', 'Contact', 'page', 'conversion', '/', 'page', 3, true, 'priority');
        $add('/faq', 'FAQ', 'page', 'core', '/', 'page', 4);
        $add('/search', 'Search', 'page', 'utility', '/', 'page', 5, false, 'low');
        $add('/privacy', 'Privacy Policy', 'page', 'legal', '/', 'page', 6, true, 'low');
        $add('/terms', 'Terms of Service', 'page', 'legal', '/', 'page', 7, true, 'low');

        $add('/services', 'Services', 'hub', 'services', '/', 'page', 10);
        foreach (self::CORE_SERVICE_SLUGS as $slug) {
            $add('/services/' . $slug, ucwords(str_replace('-', ' ', $slug)) . ' (Service Page)', 'service', $slug, '/services', 'service', 0, true, 'priority');
        }

        $add('/industries', 'Industries', 'hub', 'industries', '/', 'page', 11);
        $add('/blog', 'Blog & Insights', 'hub', 'blog', '/', 'page', 12);
        $add('/case-studies', 'Case Studies', 'hub', 'case-studies', '/', 'page', 13, true, 'priority');
        $add('/portfolio', 'Portfolio', 'hub', 'portfolio', '/', 'page', 14);
        $add('/locations', 'Locations', 'hub', 'locations', '/', 'page', 15);

        // DB-driven services extend the service silos (same public URLs).
        $services = $this->db->table('services')->where('status', 'published')->get()->getResultArray();
        $serviceById = [];
        foreach ($services as $service) {
            $serviceById[(int) $service['id']] = $service;
            $publicSlug = $this->servicePublicSlug((int) $service['id']);
            $path = '/services/' . $publicSlug;
            if (! isset($inventory[$path])) {
                $add($path, $service['name'], 'service', $publicSlug, '/services', 'service', (int) $service['id'], true, 'priority');
            } else {
                $inventory[$path]['entity_id'] = (int) $service['id'];
                $inventory[$path]['title']     = $service['name'];
            }
        }

        // Industries.
        foreach ($this->db->table('industries')->where('status', 'published')->get()->getResultArray() as $industry) {
            $add('/industries/' . $industry['slug'], $industry['name'], 'industry', 'industries', '/industries', 'industry', (int) $industry['id']);
        }

        // Blog: hub, categories, published posts.
        foreach ($this->db->table('blog_categories')->get()->getResultArray() as $category) {
            $add('/blog/category/' . $category['slug'], $category['name'] . ' (Category)', 'blog_category', 'blog', '/blog', 'blog_category', (int) $category['id'], true, 'low');
        }

        $posts = $this->db->table('blog_posts')
            ->where('status', 'published')
            ->where('(scheduled_at IS NULL OR scheduled_at <= NOW())')
            ->get()
            ->getResultArray();

        foreach ($posts as $post) {
            $add('/blog/' . $post['slug'], $post['title'], 'blog_post', 'blog', '/blog', 'blog_post', (int) $post['id'], (bool) $post['indexable']);
        }

        // Case studies.
        foreach ($this->db->table('case_studies')->where('status', 'published')->get()->getResultArray() as $cs) {
            $add('/case-studies/' . $cs['slug'], $cs['title'], 'case_study', 'case-studies', '/case-studies', 'case_study', (int) $cs['id'], (bool) $cs['indexable'], $cs['featured'] ? 'priority' : 'normal');
        }

        // Portfolio.
        foreach ($this->db->table('portfolio_projects')->where('status', 'published')->get()->getResultArray() as $project) {
            $add('/portfolio/' . $project['slug'], $project['title'], 'portfolio', 'portfolio', '/portfolio', 'portfolio', (int) $project['id']);
        }

        // Location hierarchy + service-location pages.
        $locations = $this->db->table('locations')->where('status', 'published')->get()->getResultArray();
        $locationById = [];
        foreach ($locations as $location) {
            $locationById[(int) $location['id']] = $location;
        }

        foreach ($locations as $location) {
            $path = '/locations/' . implode('/', $this->locationPath($location));
            $priority = ($location['is_indexable'] && ($location['tier'] ?? 2) === 1) ? 'priority' : 'normal';

            $parentPath = null;
            if (! empty($location['parent_id']) && isset($locationById[(int) $location['parent_id']])) {
                $parentPath = '/locations/' . implode('/', $this->locationPath($locationById[(int) $location['parent_id']]));
            } else {
                $parentPath = '/locations';
            }

            $add($path, $location['name'] . ' (' . ucfirst($location['location_type']) . ')', 'location_' . $location['location_type'], 'locations', $parentPath, 'location', (int) $location['id'], (bool) $location['is_indexable'], $priority);
        }

        $locationServices = $this->db->table('location_services ls')
            ->select('ls.*, l.id AS loc_id, l.name AS city_name, l.slug AS city_slug, l.parent_id AS city_parent, s.name AS service_name, s.slug AS service_slug')
            ->join('locations l', 'l.id = ls.location_id')
            ->join('services s', 's.id = ls.service_id')
            ->where('ls.status', 'published')
            ->where('l.status', 'published')
            ->get()
            ->getResultArray();

        foreach ($locationServices as $ls) {
            $cityPath = $this->locationPath([
                'id'        => (int) $ls['loc_id'],
                'parent_id' => $ls['city_parent'],
                'slug'      => $ls['city_slug'],
            ]);

            if (count($cityPath) !== 3) {
                continue;
            }

            $publicServiceSlug = $this->servicePublicSlug((int) $ls['service_id']) ?? $ls['service_slug'];
            $path = '/locations/' . implode('/', $cityPath) . '/' . $publicServiceSlug;

            $add(
                $path,
                $ls['service_name'] . ' in ' . $ls['city_name'],
                'location_service',
                $publicServiceSlug,
                '/locations/' . implode('/', $cityPath),
                'location_service',
                (int) $ls['id'],
                (bool) $ls['is_indexable']
            );
        }

        return $inventory;
    }

    // ------------------------------------------------------------------
    // Edges
    // ------------------------------------------------------------------

    /**
     * Build outbound internal link edges (path => list of target paths).
     *
     * Combines structural navigation, relationship blocks rendered by the
     * templates, and hrefs extracted from stored CMS content.
     *
     * @param array<string, array<string, mixed>> $inventory
     *
     * @return array<string, list<string>>
     */
    private function buildEdges(array $inventory): array
    {
        $edges = [];

        $link = function (string $from, ?string $to) use (&$edges): void {
            if ($to === null || $to === $from) {
                return; // No self links.
            }
            $edges[$from][] = $to;
        };

        $servicePaths = [];
        foreach (self::CORE_SERVICE_SLUGS as $slug) {
            $servicePaths[$slug] = '/services/' . $slug;
        }

        // --- Header navigation (present on every public page).
        $headerTargets = array_merge(
            ['/'],
            ['/about'],
            ['/services'],
            array_values($servicePaths),
            ['/industries'],
            ['/portfolio'],
            ['/case-studies'],
            ['/blog'],
            ['/contact']
        );

        // Every indexed page receives header/footer links outbound;
        // the header links themselves count as inbound to their targets.
        // Model header/footer as emanating from the home page graph root.
        foreach ($headerTargets as $target) {
            $link('/', $target);
        }

        // Footer links.
        foreach (['/privacy', '/terms', '/locations', '/faq'] as $target) {
            $link('/', $target);
        }

        // Featured countries linked from the footer (published countries only).
        foreach ($this->db->table('locations')
            ->where('location_type', 'country')
            ->where('status', 'published')
            ->orderBy('name', 'ASC')
            ->limit(5)
            ->get()->getResultArray() as $country) {
            $link('/', '/locations/' . $country['slug']);
        }

        // --- Home content sections.
        foreach ($this->db->table('industries')->where('status', 'published')->get()->getResultArray() as $industry) {
            $link('/', '/industries/' . $industry['slug']);
        }
        foreach ($this->db->table('case_studies')->where('status', 'published')->where('featured', 1)->limit(3)->get()->getResultArray() as $cs) {
            $link('/', '/case-studies/' . $cs['slug']);
        }
        foreach ($this->db->table('blog_posts')
            ->where('status', 'published')
            ->where('(scheduled_at IS NULL OR scheduled_at <= NOW())')
            ->orderBy('published_at', 'DESC')
            ->limit(3)
            ->get()->getResultArray() as $post) {
            $link('/', '/blog/' . $post['slug']);
        }

        // --- Location hierarchy edges.
        $locations = $this->db->table('locations')->where('status', 'published')->get()->getResultArray();
        $locationById = [];
        foreach ($locations as $location) {
            $locationById[(int) $location['id']] = $location;
        }

        foreach ($locations as $location) {
            $path = '/locations/' . implode('/', $this->locationPath($location));

            if ($location['location_type'] === 'country') {
                $link('/locations', $path);
            }

            if (! empty($location['parent_id']) && isset($locationById[(int) $location['parent_id']])) {
                $parentPath = '/locations/' . implode('/', $this->locationPath($locationById[(int) $location['parent_id']]));
                $link($parentPath, $path);
            }
        }

        // --- Service relationships (rendered blocks on service pages).
        $services = $this->db->table('services')->where('status', 'published')->get()->getResultArray();

        foreach ($services as $service) {
            $serviceId   = (int) $service['id'];
            $servicePath = '/services/' . $this->servicePublicSlug($serviceId);

            foreach ($this->relatedCaseStudiesForService($serviceId, 3) as $cs) {
                $link($servicePath, '/case-studies/' . $cs['slug']);
            }
            foreach ($this->relatedGuidesForService($serviceId, 3) as $guide) {
                $link($servicePath, '/blog/' . $guide['slug']);
            }
            foreach ($this->relatedIndustriesForService($serviceId, 6) as $industry) {
                $link($servicePath, '/industries/' . $industry['slug']);
            }
            foreach ($this->priorityLocationsForService($serviceId, 6) as $loc) {
                $link($servicePath, $loc['url'] ? normalize_internal_url($loc['url']) : null);
            }
            $link($servicePath, '/contact');
        }

        // --- Industry pages.
        foreach ($this->db->table('industries')->where('status', 'published')->get()->getResultArray() as $industry) {
            $industryId = (int) $industry['id'];
            $industryPath = '/industries/' . $industry['slug'];

            foreach ($this->relatedServicesForIndustry($industryId, 5) as $service) {
                $link($industryPath, '/services/' . $this->servicePublicSlug((int) $service['id']));
            }
            foreach ($this->relatedCaseStudiesForIndustry($industryId, 3) as $cs) {
                $link($industryPath, '/case-studies/' . $cs['slug']);
            }
            foreach ($this->relatedGuidesForIndustry($industryId, 3) as $guide) {
                $link($industryPath, '/blog/' . $guide['slug']);
            }
            $link($industryPath, '/contact');
        }

        // --- Blog posts.
        $posts = $this->db->table('blog_posts')
            ->where('status', 'published')
            ->where('(scheduled_at IS NULL OR scheduled_at <= NOW())')
            ->get()->getResultArray();

        $categorySlugs = [];
        foreach ($this->db->table('blog_categories')->get()->getResultArray() as $category) {
            $categorySlugs[(int) $category['id']] = $category['slug'];
        }

        foreach ($posts as $post) {
            $postId   = (int) $post['id'];
            $postPath = '/blog/' . $post['slug'];

            if (! empty($post['category_id']) && isset($categorySlugs[(int) $post['category_id']])) {
                $link($postPath, '/blog/category/' . $categorySlugs[(int) $post['category_id']]);
            }

            foreach ($this->relatedServicesForBlogPost($postId, 2) as $service) {
                $link($postPath, '/services/' . $this->servicePublicSlug((int) $service['id']));
            }
            foreach ($this->relatedIndustriesForBlogPost($postId, 3) as $industry) {
                $link($postPath, '/industries/' . $industry['slug']);
            }

            // Explicit article relationships.
            $relatedIds = $this->db->table('article_relationships')
                ->select('parent_article_id, child_article_id')
                ->groupStart()
                    ->where('parent_article_id', $postId)
                    ->orWhere('child_article_id', $postId)
                ->groupEnd()
                ->get()->getResultArray();

            foreach ($relatedIds as $rel) {
                $otherId = (int) $rel['parent_article_id'] === $postId
                    ? (int) $rel['child_article_id']
                    : (int) $rel['parent_article_id'];

                foreach ($posts as $candidate) {
                    if ((int) $candidate['id'] === $otherId) {
                        $link($postPath, '/blog/' . $candidate['slug']);
                        break;
                    }
                }
            }

            // In-content links.
            foreach (extract_internal_links($post['content'] ?? '') as $href) {
                $link($postPath, $href);
            }
        }

        // Blog hub links to published posts.
        foreach ($posts as $post) {
            $link('/blog', '/blog/' . $post['slug']);
        }

        // --- Case studies.
        $caseStudies = $this->db->table('case_studies')->where('status', 'published')->get()->getResultArray();

        foreach ($caseStudies as $cs) {
            $csId   = (int) $cs['id'];
            $csPath = '/case-studies/' . $cs['slug'];

            $link('/case-studies', $csPath);

            $csServices = $this->db->table('services s')
                ->select('s.id')
                ->join('case_study_services css', 'css.service_id = s.id')
                ->where('css.case_study_id', $csId)
                ->where('s.status', 'published')
                ->get()->getResultArray();

            foreach ($csServices as $row) {
                $link($csPath, '/services/' . $this->servicePublicSlug((int) $row['id']));
            }

            $csIndustries = $this->db->table('industries i')
                ->select('i.slug')
                ->join('case_study_industries csi', 'csi.industry_id = i.id')
                ->where('csi.case_study_id', $csId)
                ->where('i.status', 'published')
                ->get()->getResultArray();

            foreach ($csIndustries as $row) {
                $link($csPath, '/industries/' . $row['slug']);
            }

            foreach (extract_internal_links(($cs['description'] ?? '') . ($cs['solution'] ?? '')) as $href) {
                $link($csPath, $href);
            }

            $link($csPath, '/contact');
        }

        // --- Portfolio projects.
        foreach ($this->db->table('portfolio_projects')->where('status', 'published')->get()->getResultArray() as $project) {
            $link('/portfolio', '/portfolio/' . $project['slug']);
        }

        // --- Location service pages.
        foreach ($this->db->table('location_services ls')
            ->select('ls.id, ls.location_id, ls.service_id, ls.content, l.name AS city_name, l.slug AS city_slug, l.parent_id AS city_parent, s.slug AS service_slug')
            ->join('locations l', 'l.id = ls.location_id')
            ->join('services s', 's.id = ls.service_id')
            ->where('ls.status', 'published')
            ->where('l.status', 'published')
            ->get()->getResultArray() as $ls) {
            $cityPath = $this->locationPath([
                'id'        => (int) $ls['location_id'],
                'parent_id' => $ls['city_parent'],
                'slug'      => $ls['city_slug'],
            ]);

            if (count($cityPath) !== 3) {
                continue;
            }

            $publicServiceSlug = $this->servicePublicSlug((int) $ls['service_id']) ?? $ls['service_slug'];
            $path = '/locations/' . implode('/', $cityPath) . '/' . $publicServiceSlug;

            // Parent links: city page, main service page.
            $link($path, '/locations/' . implode('/', $cityPath));
            $link($path, '/services/' . $publicServiceSlug);

            // Related services rendered on the page.
            foreach ($this->db->table('services')
                ->select('id, slug')
                ->where('status', 'published')
                ->where('id !=', $ls['service_id'])
                ->limit(4)
                ->get()->getResultArray() as $related) {
                $link($path, '/services/' . $this->servicePublicSlug((int) $related['id']));
            }

            // Related guides (via blog_post_services pivot).
            foreach ($this->relatedGuidesForService((int) $ls['service_id'], 3) as $guide) {
                $link($path, '/blog/' . $guide['slug']);
            }

            foreach (extract_internal_links($ls['content'] ?? '') as $href) {
                $link($path, $href);
            }

            $link($path, '/contact');
        }

        // City pages link out to their published service pages.
        foreach ($this->db->table('location_services ls')
            ->select('ls.location_id, ls.service_id, l.slug AS city_slug, l.parent_id AS city_parent')
            ->join('locations l', 'l.id = ls.location_id')
            ->where('ls.status', 'published')
            ->where('l.status', 'published')
            ->get()->getResultArray() as $ls) {
            $cityPath = $this->locationPath([
                'id'        => (int) $ls['location_id'],
                'parent_id' => $ls['city_parent'],
                'slug'      => $ls['city_slug'],
            ]);

            if (count($cityPath) !== 3) {
                continue;
            }

            $link(
                '/locations/' . implode('/', $cityPath),
                '/locations/' . implode('/', $cityPath) . '/' . $this->servicePublicSlug((int) $ls['service_id'])
            );
        }

        return $edges;
    }

    /**
     * Breadth-first click depth from the home page.
     *
     * @param array<string, list<string>> $edges
     *
     * @return array<string, int>
     */
    private function computeDepths(array $edges): array
    {
        $depths = ['/' => 0];
        $queue  = ['/'];

        while ($queue !== []) {
            $current = array_shift($queue);

            foreach (array_unique($edges[$current] ?? []) as $target) {
                if (isset($depths[$target])) {
                    continue;
                }

                $depths[$target] = $depths[$current] + 1;
                $queue[] = $target;
            }
        }

        return $depths;
    }

    /**
     * Active redirects keyed by normalized source path.
     *
     * @return array<string, string>
     */
    private function getRedirectMap(): array
    {
        $map = [];

        foreach ($this->db->table('redirects')->where('status', 'active')->get()->getResultArray() as $redirect) {
            $source = normalize_internal_url($redirect['old_url']);
            if ($source !== null) {
                $map[$source] = $redirect['new_url'];
            }
        }

        return $map;
    }

    /**
     * Editorial priority overrides from page_link_meta.
     *
     * @return array<string, string> keyed by "entity_type:entity_id"
     */
    private function getPriorityOverrides(): array
    {
        $overrides = [];

        if (! $this->db->tableExists('page_link_meta')) {
            return $overrides;
        }

        foreach ($this->db->table('page_link_meta')->get()->getResultArray() as $row) {
            $overrides[$row['entity_type'] . ':' . $row['entity_id']] = $row['priority'];
        }

        return $overrides;
    }

    /**
     * Suggest a replacement for a broken target based on its last segment.
     *
     * @param array<string, array<string, mixed>> $inventory
     */
    private function suggestReplacement(string $brokenPath, array $inventory): ?string
    {
        $segment = basename($brokenPath);
        if ($segment === '') {
            return null;
        }

        foreach ($inventory as $path => $page) {
            if (basename($path) === $segment) {
                return $path;
            }
        }

        return null;
    }

    /**
     * Practical, relationship-based recommendations. No automatic changes.
     */
    private function buildRecommendations(array $pages, array $brokenLinks, array $redirectedLinks): array
    {
        $recommendations = [];

        foreach ($brokenLinks as $broken) {
            $message = "Fix broken internal link on {$broken['source']} → {$broken['target']}.";
            if (! empty($broken['suggestion'])) {
                $message .= " Likely destination: {$broken['suggestion']}";
            }
            $recommendations[] = ['severity' => 'critical', 'message' => $message];
        }

        foreach ($redirectedLinks as $redirected) {
            $recommendations[] = [
                'severity' => 'warning',
                'message'  => "Update link on {$redirected['source']}: it points to {$redirected['target']}, which redirects to {$redirected['final']}. Link to the final URL instead.",
            ];
        }

        foreach ($pages as $page) {
            if ($page['status'] === 'orphan') {
                $suggestion = $page['parent']
                    ? " Add a link from {$page['parent']} or another relevant hub."
                    : ' Add a link from a relevant hub page.';

                $recommendations[] = [
                    'severity' => $page['priority'] === 'priority' ? 'critical' : 'warning',
                    'message'  => "Orphan page: {$page['url']} ({$page['title']}) has no inbound internal links." . $suggestion,
                ];
            }

            if ($page['priority'] === 'priority' && $page['depth'] !== null && $page['depth'] >= 4) {
                $recommendations[] = [
                    'severity' => 'warning',
                    'message'  => "Priority page {$page['url']} is {$page['depth']} clicks from Home. Consider linking it from a major hub.",
                ];
            }
        }

        // Posts linked to a service via pivot but without any outbound link to it.
        $pageByPath = [];
        foreach ($pages as $page) {
            $pageByPath[$page['url']] = $page;
        }

        return $recommendations;
    }
}
