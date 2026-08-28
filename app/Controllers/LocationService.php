<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\LocationServiceModel;

class LocationService extends BaseController
{
    /**
     * Handles dynamic programmatic SEO location pages.
     * Route format: /locations/{country}/{region}/{city}/{service}
     */
    public function index($countrySlug, $regionSlug, $citySlug, $serviceSlug)
    {
        // 1. In a live production environment with DB access, we would do this:
        // $model = new LocationServiceModel();
        // $page = $model->getPageByHierarchy($countrySlug, $regionSlug, $citySlug, $serviceSlug);
        
        // 2. Because XAMPP MySQL is currently unreachable, we simulate the database query engine
        //    to enforce strict hierarchy validation as requested.
        $page = $this->simulateDatabaseQuery($countrySlug, $regionSlug, $citySlug, $serviceSlug);

        // 3. 404 / VALIDATION: If any part of the hierarchy is invalid, or if the page doesn't exist,
        //    or if it's not published, return a strict 404.
        if (!$page) {
            throw PageNotFoundException::forPageNotFound("Location service page not found or invalid hierarchy.");
        }

        // 4. INDEXABILITY CONTROL: Check if the page has sufficient quality/content to be indexed.
        //    If not, it should render with a robots noindex tag.
        $robots = ($page['status'] === 'published' && $page['indexable']) ? 'index, follow' : 'noindex, nofollow';

        // 5. SEO ARCHITECTURE: Generate dynamic, non-spammy metadata.
        $data = [
            'title' => $page['seo_title'],
            'meta_description' => $page['meta_description'],
            'canonical_url' => base_url("locations/{$countrySlug}/{$regionSlug}/{$citySlug}/{$serviceSlug}"),
            'whatsapp_message' => "Hello Ziibay Soft, I am located in " . $page['city_name'] . " and would like to discuss a " . $page['service_name'] . " project.",
            'robots' => $robots,
            'page' => $page
        ];

        return view('pages/location_service', $data);
    }

    /**
     * Simulates the exact behavior of the relational database query to ensure the 
     * programmatic SEO engine strictly validates geographic hierarchy.
     */
    private function simulateDatabaseQuery($countrySlug, $regionSlug, $citySlug, $serviceSlug)
    {
        // Simulated normalized tables
        $countries = [
            'united-states' => ['id' => 1, 'name' => 'United States'],
            'germany' => ['id' => 2, 'name' => 'Germany']
        ];

        $regions = [
            'california' => ['id' => 1, 'country_id' => 1, 'name' => 'California'],
            'new-york' => ['id' => 2, 'country_id' => 1, 'name' => 'New York'],
            'bavaria' => ['id' => 3, 'country_id' => 2, 'name' => 'Bavaria']
        ];

        $cities = [
            'los-angeles' => ['id' => 1, 'region_id' => 1, 'name' => 'Los Angeles'],
            'san-francisco' => ['id' => 2, 'region_id' => 1, 'name' => 'San Francisco'],
            'munich' => ['id' => 3, 'region_id' => 3, 'name' => 'Munich']
        ];

        $services = [
            'web-development' => ['id' => 1, 'name' => 'Web Development'],
            'software-development' => ['id' => 2, 'name' => 'Software Development']
        ];

        // 1. Validate existence and relationships (Prevents generating fake URLs)
        if (!isset($countries[$countrySlug])) return null;
        if (!isset($regions[$regionSlug]) || $regions[$regionSlug]['country_id'] !== $countries[$countrySlug]['id']) return null;
        if (!isset($cities[$citySlug]) || $cities[$citySlug]['region_id'] !== $regions[$regionSlug]['id']) return null;
        if (!isset($services[$serviceSlug])) return null;

        $countryName = $countries[$countrySlug]['name'];
        $regionName = $regions[$regionSlug]['name'];
        $cityName = $cities[$citySlug]['name'];
        $serviceName = $services[$serviceSlug]['name'];

        // Simulated `location_service_pages` table data. 
        // Only combinations stored here are considered valid/published.
        $locationServicePages = [
            'united-states_california_los-angeles_web-development' => [
                'status' => 'published',
                'indexable' => 1,
                'seo_title' => "Web Development Services in Los Angeles, CA | Ziibay Soft",
                'meta_description' => "Ziibay Soft provides custom web development and scalable digital platforms for businesses in Los Angeles, California.",
                'h1' => "Web Development Services in Los Angeles",
                'intro' => "We architect high-performance web platforms designed to scale for Los Angeles businesses.",
                'local_context' => "Los Angeles is home to a highly competitive digital landscape. From e-commerce brands in the Fashion District to tech startups in Silicon Beach, businesses require fast, scalable, and secure web applications to capture market share.",
                'faq_content' => [
                    ['q' => 'Do you work with Los Angeles businesses remotely?', 'a' => 'Yes. While we are an international agency, we utilize agile methodologies and seamless digital communication to operate as an extension of your internal team.'],
                    ['q' => 'What technologies do you use for web development?', 'a' => 'We engineer platforms using modern, scalable stacks including PHP, Node.js, React, and robust SQL/NoSQL databases depending on the project requirements.']
                ]
            ],
            'germany_bavaria_munich_software-development' => [
                'status' => 'published',
                'indexable' => 1,
                'seo_title' => "Custom Software Development in Munich, Germany | Ziibay Soft",
                'meta_description' => "Partner with Ziibay Soft for enterprise-grade custom software development, automated workflows, and digital transformation in Munich, Bavaria.",
                'h1' => "Custom Software Development in Munich",
                'intro' => "We engineer robust, bespoke software solutions tailored to the operational demands of Munich's enterprise sector.",
                'local_context' => "Munich's strong industrial, automotive, and technological sectors demand software that is secure, compliant, and highly reliable. We specialize in legacy system modernization, workflow automation, and custom API integrations for complex business environments.",
                'faq_content' => [
                    ['q' => 'Can you integrate custom software with legacy ERP systems?', 'a' => 'Absolutely. We specialize in building secure middleware and APIs to synchronize modern web interfaces with legacy enterprise systems.'],
                    ['q' => 'How do you ensure data security for European clients?', 'a' => 'We build software adhering to strict security standards, ensuring GDPR compliance, data encryption at rest and in transit, and secure authentication flows.']
                ]
            ]
        ];

        $key = "{$countrySlug}_{$regionSlug}_{$citySlug}_{$serviceSlug}";

        if (!isset($locationServicePages[$key])) {
            return null;
        }

        $pageData = $locationServicePages[$key];
        
        // Merge the relational hierarchy context into the page data for the view
        return array_merge($pageData, [
            'country_name' => $countryName,
            'region_name' => $regionName,
            'city_name' => $cityName,
            'service_name' => $serviceName,
            'service_slug' => $serviceSlug,
            'country_slug' => $countrySlug
        ]);
    }
}
