<?php

namespace App\Controllers;

use App\Models\LocationModel;
use App\Models\LocationServiceModel;
use App\Services\InternalLinkService;

class Locations extends BaseController
{
    protected $locationModel;
    protected $lsModel;
    protected InternalLinkService $internalLinks;

    public function __construct()
    {
        $this->locationModel = new LocationModel();
        $this->lsModel = new LocationServiceModel();
        $this->internalLinks = new InternalLinkService();
        helper('internal_link');
    }

    public function index()
    {
        $countries = $this->locationModel
                          ->where('location_type', 'country')
                          ->where('status', 'published')
                          ->orderBy('name', 'ASC')
                          ->findAll();
                          
        $data = [
            'locale' => null,
            'title' => 'Global Service Locations | Ziibay Soft',
            'meta_description' => 'Explore Ziibay Soft\'s international service locations. We provide web development, software engineering, and digital solutions globally.',
            'countries' => $countries,
            'robots' => 'index, follow'
        ];

        return view('pages/locations/index', $data);
    }

    public function country($countrySlug)
    {
        $country = $this->locationModel->where('slug', $countrySlug)->where('location_type', 'country')->first();
        if (!$country) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        
        $robots = ($country['status'] === 'published' && $country['is_indexable']) ? 'index, follow' : 'noindex, follow';

        $regions = $this->locationModel
                        ->where('parent_id', $country['id'])
                        ->where('status', 'published')
                        ->orderBy('name', 'ASC')
                        ->findAll();

        // Services actually offered inside this country (via published
        // location pages) — never a static every-service list.
        $countryServices = $this->internalLinks->servicesInCountry((int) $country['id'], 5);
        foreach ($countryServices as &$cs) {
            $cs['slug'] = $this->internalLinks->publicSlugFromDbSlug($cs['slug']);
        }
        unset($cs);

        $data = [
            'locale' => $country['locale'] ?? null,
            'title' => $country['seo_title'] ?: "{$country['name']} Service Locations | Ziibay Soft",
            'meta_description' => $country['seo_description'] ?: "Digital solutions and development services in {$country['name']}.",
            'canonical_url' => $country['canonical_url'] ?: base_url("locations/{$countrySlug}"),
            'hreflangs' => [
                ($country['locale'] ?: 'en') => base_url("locations/{$countrySlug}")
            ],
            'robots' => $robots,
            'location' => $country,
            'regions' => $regions,
            'countryServices' => $countryServices,
            'breadcrumbs' => [
                ['name' => 'Locations', 'url' => base_url('locations')],
                ['name' => $country['name'], 'url' => '']
            ]
        ];

        return view('pages/locations/country', $data);
    }

    public function region($countrySlug, $regionSlug)
    {
        $country = $this->locationModel->where('slug', $countrySlug)->where('location_type', 'country')->first();
        if (!$country) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $region = $this->locationModel
                       ->where('slug', $regionSlug)
                       ->where('parent_id', $country['id'])
                       ->where('location_type', 'region')
                       ->first();
        if (!$region) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        
        $robots = ($region['status'] === 'published' && $region['is_indexable']) ? 'index, follow' : 'noindex, follow';

        $cities = $this->locationModel
                       ->where('parent_id', $region['id'])
                       ->where('status', 'published')
                       ->orderBy('name', 'ASC')
                       ->findAll();

        // Services offered in this region through published location pages.
        $regionServices = $this->internalLinks->servicesInCountry((int) $country['id'], 5);
        foreach ($regionServices as &$rs) {
            $rs['slug'] = $this->internalLinks->publicSlugFromDbSlug($rs['slug']);
        }
        unset($rs);

        $data = [
            'locale' => $country['locale'] ?? null,
            'title' => $region['seo_title'] ?: "Services in {$region['name']}, {$country['name']} | Ziibay Soft",
            'meta_description' => $region['seo_description'] ?: "Digital solutions and development services in {$region['name']}.",
            'canonical_url' => $region['canonical_url'] ?: base_url("locations/{$countrySlug}/{$regionSlug}"),
            'hreflangs' => [
                ($country['locale'] ?: 'en') => base_url("locations/{$countrySlug}/{$regionSlug}")
            ],
            'robots' => $robots,
            'country' => $country,
            'location' => $region,
            'cities' => $cities,
            'countryServices' => $regionServices,
            'breadcrumbs' => [
                ['name' => 'Locations', 'url' => base_url('locations')],
                ['name' => $country['name'], 'url' => base_url("locations/{$country['slug']}")],
                ['name' => $region['name'], 'url' => '']
            ]
        ];

        return view('pages/locations/region', $data);
    }

    public function city($countrySlug, $regionSlug, $citySlug)
    {
        $country = $this->locationModel->where('slug', $countrySlug)->where('location_type', 'country')->first();
        if (!$country) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $region = $this->locationModel->where('slug', $regionSlug)->where('parent_id', $country['id'])->where('location_type', 'region')->first();
        if (!$region) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $city = $this->locationModel->where('slug', $citySlug)->where('parent_id', $region['id'])->where('location_type', 'city')->first();
        if (!$city) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $robots = ($city['status'] === 'published' && $city['is_indexable']) ? 'index, follow' : 'noindex, follow';

        $db = \Config\Database::connect();
        // Only fetch published, indexable services — no thin/draft pages exposed here
        $services = $db->table('location_services ls')
                       ->select('ls.id, ls.intro, ls.seo_readiness, s.name, s.slug as service_slug, s.short_description')
                       ->join('services s', 's.id = ls.service_id')
                       ->where('ls.location_id', $city['id'])
                       ->where('ls.status', 'published')
                       ->where('s.status', 'published')
                       ->orderBy('s.name', 'ASC')
                       ->get()->getResultArray();

        // Link to canonical public service-location URLs.
        foreach ($services as &$s) {
            $s['service_slug'] = $this->internalLinks->publicSlugFromDbSlug($s['service_slug']);
        }
        unset($s);

        // Small set of nearby cities in the same region (related locations).
        $nearbyCities = $this->internalLinks->siblingCitiesForCity((int) $city['id'], $city['parent_id'] ? (int) $city['parent_id'] : null, 4);

        $data = [
            'locale' => $country['locale'] ?? null,
            'title' => $city['seo_title'] ?: "Digital Services in {$city['name']}, {$region['name']} | Ziibay Soft",
            'meta_description' => $city['seo_description'] ?: "Explore Ziibay Soft's available digital services and solutions in {$city['name']}.",
            'canonical_url' => $city['canonical_url'] ?: base_url("locations/{$countrySlug}/{$regionSlug}/{$citySlug}"),
            'hreflangs' => [
                ($country['locale'] ?: 'en') => base_url("locations/{$countrySlug}/{$regionSlug}/{$citySlug}")
            ],
            'robots' => $robots,
            'country' => $country,
            'region' => $region,
            'location' => $city,
            'services' => $services,
            'nearbyCities' => $nearbyCities,
            'countrySlug' => $countrySlug,
            'regionSlug' => $regionSlug,
            'breadcrumbs' => [
                ['name' => 'Locations', 'url' => base_url('locations')],
                ['name' => $country['name'], 'url' => base_url("locations/{$country['slug']}")],
                ['name' => $region['name'], 'url' => base_url("locations/{$country['slug']}/{$region['slug']}")],
                ['name' => $city['name'], 'url' => '']
            ]
        ];

        return view('pages/locations/city', $data);
    }

    public function service($countrySlug, $regionSlug, $citySlug, $serviceSlug)
    {
        // Validate full hierarchy strictly — no dynamic page generation for invalid combos
        $country = $this->locationModel->where('slug', $countrySlug)->where('location_type', 'country')->first();
        if (!$country || $country['status'] !== 'published') throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $region = $this->locationModel->where('slug', $regionSlug)->where('parent_id', $country['id'])->where('location_type', 'region')->first();
        if (!$region || $region['status'] !== 'published') throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $city = $this->locationModel->where('slug', $citySlug)->where('parent_id', $region['id'])->where('location_type', 'city')->first();
        if (!$city || $city['status'] !== 'published') throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        $db = \Config\Database::connect();
        
        $service = $db->table('services')->where('slug', $serviceSlug)->where('status', 'published')->get()->getRowArray();
        if (!$service) throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

        // Find the specific location-service record
        $ls = $db->table('location_services ls')
                 ->select('ls.*')
                 ->where('ls.location_id', $city['id'])
                 ->where('ls.service_id', $service['id'])
                 ->where('ls.status', 'published')
                 ->get()->getRowArray();
                 
        // Must exist as explicitly published record — no implicit page generation
        if (!$ls) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        // Canonical: use explicit override or self-reference
        $selfUrl = base_url("locations/{$countrySlug}/{$regionSlug}/{$citySlug}/{$serviceSlug}");
        $canonicalUrl = (!empty($ls['canonical_url'])) ? $ls['canonical_url'] : $selfUrl;
        
        // Indexability: only if page, city, and country are all published+indexable
        $isIndexable = ($ls['is_indexable'] && $city['is_indexable'] && $region['is_indexable'] && $country['is_indexable']);
        $robots = $isIndexable ? 'index, follow' : 'noindex, follow';

        // Sitemap conflict check (silently enforce in robots — sitemap controller also handles this)
        // If noindex but somehow in sitemap, robots tag still prevents indexing
        
        $title = !empty($ls['seo_title']) ? $ls['seo_title'] : "{$service['name']} Company in {$city['name']} | Ziibay Soft";
        $description = !empty($ls['seo_description']) ? $ls['seo_description'] : "Ziibay Soft provides professional {$service['name']} to businesses in {$city['name']}. Work with us remotely to grow your digital presence.";

        // Related services for internal linking (exclude current service).
        // Slugs are mapped to the canonical public service pages.
        $relatedServices = $db->table('services')
                              ->where('status', 'published')
                              ->where('id !=', $service['id'])
                              ->limit(4)
                              ->get()->getResultArray();

        foreach ($relatedServices as &$rs) {
            $rs['slug'] = $this->internalLinks->publicSlugFromDbSlug($rs['slug']);
        }
        unset($rs);

        // Related guides for the service (via blog_post_services pivot).
        $relatedPosts = $this->internalLinks->relatedGuidesForService((int) $service['id'], 3);

        // BreadcrumbList schema data
        $breadcrumbs = [
            ['name' => 'Home', 'url' => base_url('/')],
            ['name' => 'Locations', 'url' => base_url('locations')],
            ['name' => $country['name'], 'url' => base_url("locations/{$country['slug']}")],
            ['name' => $region['name'], 'url' => base_url("locations/{$country['slug']}/{$region['slug']}")],
            ['name' => $city['name'], 'url' => base_url("locations/{$country['slug']}/{$region['slug']}/{$city['slug']}")],
            ['name' => $service['name'], 'url' => '']
        ];

        $schema = new \App\Libraries\SchemaGenerator();
        $schema->loadOverride('location_service', $ls['id']);
        
        $fullUrl = base_url("locations/{$country['slug']}/{$region['slug']}/{$city['slug']}/{$service['slug']}");
        $schema->addWebPage($title, $canonicalUrl, $description)
               ->addBreadcrumbs($breadcrumbs)
               ->addService($service['name'], $description, $canonicalUrl, [['type' => 'City', 'name' => $city['name']]]);

        if (!empty($ls['local_faqs'])) {
            $faqs = json_decode($ls['local_faqs'], true);
            if (is_array($faqs)) {
                $schema->addFAQ($faqs);
            }
        }

        $data = [
            'locale' => $country['locale'] ?? null,
            'title' => $title,
            'meta_description' => $description,
            'canonical_url' => $canonicalUrl,
            'hreflangs' => [
                ($country['locale'] ?: 'en') => base_url("locations/{$countrySlug}/{$regionSlug}/{$citySlug}/{$serviceSlug}")
            ],
            'robots' => $robots,
            'country' => $country,
            'region' => $region,
            'city' => $city,
            'service' => $service,
            'ls' => $ls,
            'relatedServices' => $relatedServices,
            'relatedPosts' => $relatedPosts,
            'countrySlug' => $countrySlug,
            'regionSlug' => $regionSlug,
            'breadcrumbs' => $breadcrumbs,
            'schema_json' => $schema->render(),
        ];

        return view('pages/locations/service', $data);
    }
}

