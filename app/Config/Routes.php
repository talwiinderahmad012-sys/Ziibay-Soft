<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);

// Main Pages
$routes->get('about', 'Pages::about', ['as' => 'about']);
$routes->get('privacy', 'Pages::privacy', ['as' => 'privacy']);
$routes->get('terms', 'Pages::terms', ['as' => 'terms']);
$routes->get('contact', 'Contact::index', ['as' => 'contact']);
$routes->post('contact', 'Contact::submit');

$routes->get('search', 'Search::index');
$routes->get('faq', 'Faq::index', ['as' => 'faq']);
// Portfolio
$routes->get('portfolio', 'Portfolio::index', ['as' => 'portfolio']);
$routes->get('portfolio/(:segment)', 'Portfolio::show/$1', ['as' => 'portfolio-detail']);
$routes->get('case-studies', 'CaseStudies::index', ['as' => 'case-studies']);
$routes->get('case-studies/(:segment)', 'CaseStudies::show/$1', ['as' => 'case-study-detail']);
// Blog
$routes->get('blog', 'Blog::index', ['as' => 'blog']);
$routes->get('blog/category/(:segment)', 'Blog::category/$1');
$routes->get('blog/tag/(:segment)', 'Blog::tag/$1');
$routes->get('authors/(:segment)', 'Blog::author/$1');
$routes->get('blog/(:segment)', 'Blog::show/$1', ['as' => 'blog-detail']);

$routes->get('sitemap.xml', 'Sitemap::index', ['as' => 'sitemap']);
$routes->get('robots.txt', 'Robots::index');

// Industries
$routes->get('industries', 'Industries::index', ['as' => 'industries']);
$routes->get('industries/(:segment)', 'Industries::show/$1', ['as' => 'industry-detail']);

// Services
$routes->group('services', static function ($routes) {
    $routes->get('/', 'Services::index', ['as' => 'services']);
    $routes->get('(:segment)', 'Services::show/$1', ['as' => 'service-detail']);
});

// Location SEO Engine Routing (Programmatic)
// Public Location Routes
$routes->get('locations', 'Locations::index', ['as' => 'locations']);
$routes->get('locations/(:segment)', 'Locations::country/$1', ['as' => 'location-country']);
$routes->get('locations/(:segment)/(:segment)', 'Locations::region/$1/$2', ['as' => 'location-region']);
$routes->get('locations/(:segment)/(:segment)/(:segment)', 'Locations::city/$1/$2/$3', ['as' => 'location-city']);
$routes->get('locations/(:segment)/(:segment)/(:segment)/(:segment)', 'Locations::service/$1/$2/$3/$4', ['as' => 'location-service']);

// Admin Routes
$routes->group('admin', static function ($routes) {
    // Auth
    $routes->get('login', 'Admin\Auth::login');
    $routes->post('login', 'Admin\Auth::attemptLogin');
    $routes->get('logout', 'Admin\Auth::logout');

    // Protected Routes
    $routes->group('', ['filter' => 'auth'], static function ($routes) {
        $routes->get('/', 'Admin\Dashboard::index');
        $routes->get('dashboard', 'Admin\Dashboard::index');
        
        // Services Management
        $routes->get('services', 'Admin\Services::index');
        $routes->get('services/create', 'Admin\Services::create');
        $routes->post('services', 'Admin\Services::store');
        $routes->get('services/edit/(:num)', 'Admin\Services::edit/$1');
        $routes->post('services/update/(:num)', 'Admin\Services::update/$1');
        $routes->post('services/toggle-status/(:num)', 'Admin\Services::toggleStatus/$1');

        // Locations Management
        $routes->get('locations', 'Admin\Locations::index');
        $routes->get('locations/create', 'Admin\Locations::create');
        $routes->post('locations', 'Admin\Locations::store');
        $routes->get('locations/edit/(:num)', 'Admin\Locations::edit/$1');
        $routes->post('locations/update/(:num)', 'Admin\Locations::update/$1');
        $routes->post('locations/toggle-status/(:num)', 'Admin\Locations::toggleStatus/$1');
        
        $routes->get('location-services', 'Admin\LocationServices::index');
        $routes->get('location-services/create', 'Admin\LocationServices::create');
        $routes->post('location-services', 'Admin\LocationServices::store');
        $routes->get('location-services/edit/(:num)', 'Admin\LocationServices::edit/$1');
        $routes->post('location-services/update/(:num)', 'Admin\LocationServices::update/$1');
        $routes->post('location-services/toggle-status/(:num)', 'Admin\LocationServices::toggleStatus/$1');

        // Location Matrix Dashboard
        $routes->get('location-matrix', 'Admin\LocationMatrix::index');

        // Internal Link Audit (Phase #20)
        $routes->get('internal-links', 'Admin\InternalLinks::index');
        $routes->post('internal-links/set-priority', 'Admin\InternalLinks::setPriority');

        // SEO & Schema Settings (Phase #21)
        $routes->get('seo-settings', 'Admin\SeoSettings::index');
        $routes->post('seo-settings/update', 'Admin\SeoSettings::update');
        $routes->post('seo-settings/override', 'Admin\SeoSettings::overrideSchema');

        // Industries Management
        $routes->get('industries', 'Admin\Industries::index');
        $routes->get('industries/create', 'Admin\Industries::create');
        $routes->post('industries', 'Admin\Industries::store');
        $routes->get('industries/edit/(:num)', 'Admin\Industries::edit/$1');
        $routes->post('industries/update/(:num)', 'Admin\Industries::update/$1');
        $routes->post('industries/toggle-status/(:num)', 'Admin\Industries::toggleStatus/$1');
        // Portfolio Management
        $routes->get('portfolio', 'Admin\Portfolio::index');
        $routes->get('portfolio/create', 'Admin\Portfolio::create');
        $routes->post('portfolio', 'Admin\Portfolio::store');
        $routes->get('portfolio/edit/(:num)', 'Admin\Portfolio::edit/$1');
        $routes->post('portfolio/update/(:num)', 'Admin\Portfolio::update/$1');
        $routes->post('portfolio/toggle-status/(:num)', 'Admin\Portfolio::toggleStatus/$1');
        $routes->post('portfolio/toggle-featured/(:num)', 'Admin\Portfolio::toggleFeatured/$1');

        // Case Studies Management
        $routes->get('case-studies', 'Admin\CaseStudies::index');
        $routes->get('case-studies/create', 'Admin\CaseStudies::create');
        $routes->post('case-studies', 'Admin\CaseStudies::store');
        $routes->get('case-studies/edit/(:num)', 'Admin\CaseStudies::edit/$1');
        $routes->post('case-studies/update/(:num)', 'Admin\CaseStudies::update/$1');
        $routes->post('case-studies/toggle-status/(:num)', 'Admin\CaseStudies::toggleStatus/$1');
        $routes->post('case-studies/toggle-featured/(:num)', 'Admin\CaseStudies::toggleFeatured/$1');

        // Blog Management
        $routes->get('blog', 'Admin\Blog::index');
        $routes->get('blog/create', 'Admin\Blog::create');
        $routes->post('blog', 'Admin\Blog::store');
        $routes->get('blog/edit/(:num)', 'Admin\Blog::edit/$1');
        $routes->post('blog/update/(:num)', 'Admin\Blog::update/$1');
        $routes->post('blog/toggle-status/(:num)', 'Admin\Blog::toggleStatus/$1');
        $routes->post('blog/toggle-featured/(:num)', 'Admin\Blog::toggleFeatured/$1');

        // FAQ Management
        $routes->get('faq', 'Admin\Faq::index');
        $routes->get('faq/create', 'Admin\Faq::create');
        $routes->post('faq', 'Admin\Faq::store');
        $routes->get('faq/edit/(:num)', 'Admin\Faq::edit/$1');
        $routes->post('faq/update/(:num)', 'Admin\Faq::update/$1');
        $routes->post('faq/toggle-status/(:num)', 'Admin\Faq::toggleStatus/$1');

        // SEO: Content Architecture Dashboard (Phase #23)
        $routes->get('content-dashboard', 'Admin\ContentDashboard::index');
    
    // Technical SEO Audit
    $routes->get('seo-audit', 'Admin\SeoAudit::index');

        // SEO Keywords
        $routes->get('seo-keywords', 'Admin\SeoKeywords::index');
        $routes->get('seo-keywords/create', 'Admin\SeoKeywords::create');
        $routes->post('seo-keywords', 'Admin\SeoKeywords::store');
        
        // Settings
        $routes->get('settings', 'Admin\Settings::index');
        $routes->post('settings/update', 'Admin\Settings::update');
        
        // Team Members
        $routes->get('team', 'Admin\TeamMembers::index');
        $routes->get('team/create', 'Admin\TeamMembers::create');
        $routes->post('team', 'Admin\TeamMembers::store');
        $routes->get('team/edit/(:num)', 'Admin\TeamMembers::edit/$1');
        $routes->post('team/update/(:num)', 'Admin\TeamMembers::update/$1');
        $routes->post('team/toggle-status/(:num)', 'Admin\TeamMembers::toggleStatus/$1');
        $routes->get('seo-keywords/edit/(:num)', 'Admin\SeoKeywords::edit/$1');
        $routes->post('seo-keywords/update/(:num)', 'Admin\SeoKeywords::update/$1');
        $routes->get('seo-keywords/brief', 'Admin\SeoKeywords::brief');

        // SEO: Internal Links (Phase #20 audit, no duplicate dashboard)
        $routes->get('internal-links', 'Admin\InternalLinks::index');
        $routes->post('internal-links/run', 'Admin\InternalLinks::run');
        $routes->post('internal-links/priority', 'Admin\InternalLinks::updatePriority');

        // Blog Categories
        $routes->get('blog-categories', 'Admin\BlogCategories::index');
        $routes->get('blog-categories/create', 'Admin\BlogCategories::create');
        $routes->post('blog-categories', 'Admin\BlogCategories::store');
        $routes->get('blog-categories/edit/(:num)', 'Admin\BlogCategories::edit/$1');
        $routes->post('blog-categories/update/(:num)', 'Admin\BlogCategories::update/$1');
        $routes->post('blog-categories/delete/(:num)', 'Admin\BlogCategories::delete/$1');

        // Blog Tags
        $routes->get('blog-tags', 'Admin\BlogTags::index');
        $routes->get('blog-tags/create', 'Admin\BlogTags::create');
        $routes->post('blog-tags', 'Admin\BlogTags::store');
        $routes->get('blog-tags/edit/(:num)', 'Admin\BlogTags::edit/$1');
        $routes->post('blog-tags/update/(:num)', 'Admin\BlogTags::update/$1');
        $routes->post('blog-tags/delete/(:num)', 'Admin\BlogTags::delete/$1');

        // Lead Management
        $routes->get('leads', 'Admin\Leads::index');
        $routes->get('leads/(:num)', 'Admin\Leads::show/$1');
        $routes->post('leads/update-status/(:num)', 'Admin\Leads::updateStatus/$1');
        $routes->post('leads/assign/(:num)', 'Admin\Leads::assign/$1');
        $routes->post('leads/add-note/(:num)', 'Admin\Leads::addNote/$1');

        // FAQ Management
        $routes->get('faqs', 'Admin\Faqs::index');
        $routes->get('faqs/create', 'Admin\Faqs::create');
        $routes->post('faqs', 'Admin\Faqs::store');
        $routes->get('faqs/edit/(:num)', 'Admin\Faqs::edit/$1');
        $routes->post('faqs/update/(:num)', 'Admin\Faqs::update/$1');
        $routes->post('faqs/delete/(:num)', 'Admin\Faqs::delete/$1');
        $routes->post('faqs/toggle-status/(:num)', 'Admin\Faqs::toggleStatus/$1');
    });
});
