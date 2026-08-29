<?php

namespace App\Controllers;

use App\Services\InternalLinkService;
use CodeIgniter\Exceptions\PageNotFoundException;

class Industries extends BaseController
{
    protected InternalLinkService $internalLinks;

    public function __construct()
    {
        $this->internalLinks = new InternalLinkService();
        helper('internal_link');
    }

    public function index()
    {
        $industryModel = new \App\Models\IndustryModel();
        // Only load published industries
        $industries = $industryModel->where('status', 'published')->orderBy('sort_order', 'ASC')->findAll();

        $schema = new \App\Libraries\SchemaGenerator();
        $schema->loadOverride('page', 0); // Placeholder for route
        $schema->addWebPage('Industries We Serve | Ziibay Soft', base_url('industries'), 'Discover the diverse sectors Ziibay Soft can build digital solutions for, including E-commerce, Healthcare, Finance, Education, and more.')
               ->addBreadcrumbs([
                   ['name' => 'Home', 'url' => base_url()],
                   ['name' => 'Industries', 'url' => base_url('industries')]
               ]);

        $data = [
            'title' => 'Industries We Serve | Ziibay Soft',
            'meta_description' => 'Discover the diverse sectors Ziibay Soft can build digital solutions for, including E-commerce, Healthcare, Finance, Education, and more.',
            'canonical_url' => base_url('industries'),
            'industries' => $industries,
            'schema_json' => $schema->render(),
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

        // Map DB service slugs to canonical public slugs (seo-services => seo).
        foreach ($related_services as &$rel) {
            $rel['slug'] = $this->internalLinks->publicSlugFromDbSlug($rel['slug']);
        }
        unset($rel);

        // Real case studies and guides for this industry (Phase #20).
        $related_case_studies = array_map(
            static fn (array $cs): array => [
                'url'     => internal_url('case_study', ['slug' => $cs['slug']]),
                'title'   => $cs['title'],
                'excerpt' => $cs['excerpt'],
                'badge'   => 'Case Study',
                'cta'     => 'View the project',
            ],
            $this->internalLinks->relatedCaseStudiesForIndustry((int) $industry['id'], 3)
        );

        $related_guides = array_map(
            static fn (array $guide): array => [
                'url'     => internal_url('blog_post', ['slug' => $guide['slug']]),
                'title'   => $guide['title'],
                'excerpt' => $guide['excerpt'],
                'badge'   => 'Guide',
                'cta'     => 'Read the guide',
            ],
            $this->internalLinks->relatedGuidesForIndustry((int) $industry['id'], 3)
        );

        $canonicalUrl = base_url('industries/' . $slug);

        $schema = new \App\Libraries\SchemaGenerator();
        $schema->loadOverride('industry', $industry['id']);
        $schema->addWebPage($industry['seo_title'] ?: ($industry['name'] . ' Software Solutions | Ziibay Soft'), $canonicalUrl, $industry['seo_description'] ?: ('Custom digital solutions designed for the ' . $industry['name'] . ' sector by Ziibay Soft. Explore potential applications and workflows.'))
               ->addBreadcrumbs([
                   ['name' => 'Home', 'url' => base_url()],
                   ['name' => 'Industries', 'url' => base_url('industries')],
                   ['name' => $industry['name'], 'url' => $canonicalUrl]
               ]);

        $data = [
            'title' => $industry['seo_title'] ?: ($industry['name'] . ' Software Solutions | Ziibay Soft'),
            'meta_description' => $industry['seo_description'] ?: ('Custom digital solutions designed for the ' . $industry['name'] . ' sector by Ziibay Soft. Explore potential applications and workflows.'),
            'canonical_url' => $canonicalUrl,
            'industry' => $industry,
            'related_services' => $related_services,
            'related_case_studies' => $related_case_studies,
            'related_guides' => $related_guides,
            'whatsapp_message' => 'Hello Ziibay Soft, I would like to discuss a solution for my ' . $industry['name'] . ' business.',
            'schema_json' => $schema->render(),
        ];

        return view('pages/industry_detail', $data);
    }
}
