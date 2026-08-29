<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $db = \Config\Database::connect();

        // Real published industries (no hardcoded slugs that could 404).
        $industries = $db->table('industries')
            ->where('status', 'published')
            ->orderBy('sort_order', 'ASC')
            ->limit(8)
            ->get()
            ->getResultArray();

        // Selected real case studies for the home page.
        $featuredCaseStudies = $db->table('case_studies')
            ->where('status', 'published')
            ->where('indexable', 1)
            ->orderBy('featured', 'DESC')
            ->orderBy('published_at', 'DESC')
            ->limit(3)
            ->get()
            ->getResultArray();

        // Latest published guides.
        $latestGuides = $db->table('blog_posts')
            ->where('status', 'published')
            ->where('(scheduled_at IS NULL OR scheduled_at <= NOW())')
            ->orderBy('published_at', 'DESC')
            ->limit(3)
            ->get()
            ->getResultArray();

        // Featured countries for a compact locations block.
        $featuredCountries = $db->table('locations')
            ->where('location_type', 'country')
            ->where('status', 'published')
            ->orderBy('name', 'ASC')
            ->limit(4)
            ->get()
            ->getResultArray();

        $schema = new \App\Libraries\SchemaGenerator();
        $schema->loadOverride('page', 0); // 0 for home
        $schema->addOrganization()
               ->addWebSite()
               ->addWebPage('Ziibay Soft | Premium Web & Software Development Agency', base_url(), 'Ziibay Soft builds scalable, secure, and modern digital platforms for ambitious international brands. Specializing in Web, Software, and App development.');

        $data = [
            'title' => 'Ziibay Soft | Premium Web & Software Development Agency',
            'meta_description' => 'Ziibay Soft builds scalable, secure, and modern digital platforms for ambitious international brands. Specializing in Web, Software, and App development.',
            'canonical_url' => base_url(),
            'homeIndustries' => $industries,
            'featuredCaseStudies' => $featuredCaseStudies,
            'latestGuides' => $latestGuides,
            'featuredCountries' => $featuredCountries,
            'schema_json' => $schema->render(),
        ];

        return view('pages/home', $data);
    }
}
