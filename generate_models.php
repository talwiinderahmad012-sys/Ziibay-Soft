<?php

$dir = 'app/Models';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$models = [
    'RoleModel.php' => ['table' => 'roles', 'allowedFields' => ['name', 'description']],
    'UserModel.php' => ['table' => 'users', 'allowedFields' => ['role_id', 'name', 'email', 'password_hash', 'status', 'deleted_at'], 'useSoftDeletes' => true],
    'SettingModel.php' => ['table' => 'settings', 'allowedFields' => ['setting_key', 'setting_value', 'type', 'setting_group', 'description']],
    'MenuModel.php' => ['table' => 'menus', 'allowedFields' => ['name', 'location']],
    'MenuItemModel.php' => ['table' => 'menu_items', 'allowedFields' => ['menu_id', 'parent_id', 'title', 'url', 'target', 'sort_order', 'status']],
    
    'ServiceCategoryModel.php' => ['table' => 'service_categories', 'allowedFields' => ['name', 'slug', 'description', 'status', 'sort_order']],
    'ServiceModel.php' => ['table' => 'services', 'allowedFields' => ['category_id', 'name', 'slug', 'short_description', 'description', 'icon', 'featured', 'status', 'sort_order', 'deleted_at'], 'useSoftDeletes' => true],
    
    'CountryModel.php' => ['table' => 'countries', 'allowedFields' => ['name', 'slug', 'iso_code', 'continent', 'currency_code', 'language_code', 'status', 'featured', 'sort_order', 'seo_title', 'seo_description']],
    'RegionModel.php' => ['table' => 'regions', 'allowedFields' => ['country_id', 'name', 'slug', 'region_type', 'code', 'status', 'seo_title', 'seo_description']],
    'CityModel.php' => ['table' => 'cities', 'allowedFields' => ['country_id', 'region_id', 'name', 'slug', 'latitude', 'longitude', 'timezone', 'population', 'status', 'featured', 'seo_title', 'seo_description']],
    'LocationServicePageModel.php' => ['table' => 'location_service_pages', 'allowedFields' => ['service_id', 'country_id', 'region_id', 'city_id', 'slug', 'h1', 'intro', 'content', 'benefits', 'local_context', 'industries_content', 'process_content', 'faq_content', 'primary_keyword', 'secondary_keywords', 'search_intent', 'seo_title', 'meta_description', 'canonical_url', 'robots', 'indexable', 'featured', 'status', 'content_score', 'seo_score']],

    'IndustryModel.php' => ['table' => 'industries', 'allowedFields' => ['name', 'slug', 'short_description', 'description', 'icon', 'status', 'featured', 'sort_order', 'seo_title', 'seo_description']],
    'TeamMemberModel.php' => ['table' => 'team_members', 'allowedFields' => ['name', 'slug', 'role', 'short_bio', 'bio', 'photo', 'skills', 'experience', 'email', 'linkedin_url', 'website_url', 'status', 'featured', 'sort_order']],
    
    'PortfolioProjectModel.php' => ['table' => 'portfolio_projects', 'allowedFields' => ['title', 'slug', 'client_name', 'short_description', 'description', 'challenge', 'solution', 'results', 'featured_image', 'project_url', 'completion_date', 'status', 'featured', 'seo_title', 'seo_description']],
    'CaseStudyModel.php' => ['table' => 'case_studies', 'allowedFields' => ['portfolio_project_id', 'title', 'slug', 'overview', 'challenge', 'strategy', 'solution', 'implementation', 'results', 'testimonial', 'featured_image', 'status', 'featured', 'seo_title', 'seo_description']],
    'TechnologyModel.php' => ['table' => 'technologies', 'allowedFields' => ['name', 'slug', 'category', 'icon', 'website_url', 'status', 'sort_order']],
    
    'BlogCategoryModel.php' => ['table' => 'blog_categories', 'allowedFields' => ['name', 'slug', 'description']],
    'BlogTagModel.php' => ['table' => 'blog_tags', 'allowedFields' => ['name', 'slug']],
    'BlogPostModel.php' => ['table' => 'blog_posts', 'allowedFields' => ['title', 'slug', 'excerpt', 'content', 'featured_image', 'author_id', 'category_id', 'status', 'published_at', 'seo_title', 'meta_description', 'canonical_url', 'robots']],
    
    'FaqModel.php' => ['table' => 'faqs', 'allowedFields' => ['question', 'answer', 'context_type', 'context_id', 'status', 'sort_order']],
    'TestimonialModel.php' => ['table' => 'testimonials', 'allowedFields' => ['client_name', 'company_name', 'role', 'testimonial', 'client_photo', 'company_logo', 'rating', 'status', 'featured', 'sort_order']],
    
    'SeoMetaModel.php' => ['table' => 'seo_meta', 'allowedFields' => ['entity_type', 'entity_id', 'seo_title', 'meta_description', 'canonical_url', 'robots', 'og_title', 'og_description', 'og_image', 'twitter_title', 'twitter_description', 'twitter_image', 'schema_type', 'schema_json']],
    'RedirectModel.php' => ['table' => 'redirects', 'allowedFields' => ['source_url', 'destination_url', 'redirect_type', 'status', 'hit_count']],
    'ContactLeadModel.php' => ['table' => 'contact_leads', 'allowedFields' => ['name', 'email', 'phone', 'country', 'city', 'service_id', 'budget', 'message', 'source', 'status', 'assigned_to']]
];

foreach ($models as $filename => $config) {
    $className = str_replace('.php', '', $filename);
    $table = $config['table'];
    $allowedFields = implode("', '", $config['allowedFields']);
    $useSoftDeletes = isset($config['useSoftDeletes']) && $config['useSoftDeletes'] ? 'true' : 'false';
    
    $content = <<<EOT
<?php
namespace App\Models;
use CodeIgniter\Model;

class {$className} extends Model
{
    protected \$table            = '{$table}';
    protected \$primaryKey       = 'id';
    protected \$useAutoIncrement = true;
    protected \$returnType       = 'array';
    protected \$useSoftDeletes   = {$useSoftDeletes};
    protected \$protectFields    = true;
    protected \$allowedFields    = ['{$allowedFields}'];

    // Dates
    protected \$useTimestamps = true;
    protected \$dateFormat    = 'datetime';
    protected \$createdField  = 'created_at';
    protected \$updatedField  = 'updated_at';
    protected \$deletedField  = 'deleted_at';

    // Validation rules could be added here later.
}
EOT;

    file_put_contents($dir . '/' . $filename, $content);
}

echo "Models generated successfully.";
