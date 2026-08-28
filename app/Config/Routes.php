<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['as' => 'home']);

// Main Pages
$routes->get('about', 'Pages::about', ['as' => 'about']);
$routes->get('contact', 'Contact::index', ['as' => 'contact']);
$routes->post('contact', 'Contact::submit');

$routes->get('search', 'Search::index');
$routes->get('faq', 'Faq::index');
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

// Industries
$routes->get('industries', 'Industries::index', ['as' => 'industries']);
$routes->get('industries/(:segment)', 'Industries::show/$1', ['as' => 'industry-detail']);

// Services
$routes->group('services', static function ($routes) {
    $routes->get('/', 'Services::index', ['as' => 'services']);
    $routes->get('(:segment)', 'Services::show/$1', ['as' => 'service-detail']);
});

// Location SEO Engine Routing (Programmatic)
// URL pattern: /locations/{country}/{region}/{city}/{service}
$routes->get('locations/(:segment)/(:segment)/(:segment)/(:segment)', 'LocationService::index/$1/$2/$3/$4');

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
