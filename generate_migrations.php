<?php

$dir = 'app/Database/Migrations';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

$migrations = [
    '2024-08-27-000001_CreateUsersTables.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateUsersTables extends Migration {
    public function up() {
        // Roles
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 50],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('roles', true);

        // Users
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'role_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255],
            'password_hash' => ['type' => 'VARCHAR', 'constraint' => 255],
            'status' => ['type' => 'ENUM', 'constraint' => ['active', 'inactive', 'banned'], 'default' => 'active'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('email');
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'RESTRICT', 'RESTRICT');
        $this->forge->createTable('users', true);
    }
    public function down() {
        $this->forge->dropTable('users', true);
        $this->forge->dropTable('roles', true);
    }
}
EOT,

    '2024-08-27-000002_CreateSettingsTable.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateSettingsTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'setting_key' => ['type' => 'VARCHAR', 'constraint' => 100], // changed from 'key' as it's reserved
            'setting_value' => ['type' => 'TEXT', 'null' => true],
            'type' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'string'],
            'setting_group' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'general'], // changed from 'group'
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('setting_key');
        $this->forge->createTable('settings', true);
    }
    public function down() {
        $this->forge->dropTable('settings', true);
    }
}
EOT,

    '2024-08-27-000003_CreateMenusTables.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateMenusTables extends Migration {
    public function up() {
        // Menus
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100],
            'location' => ['type' => 'VARCHAR', 'constraint' => 50, 'unique' => true], // e.g. primary, footer
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('menus', true);

        // Menu Items
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'menu_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'parent_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 100],
            'url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'target' => ['type' => 'VARCHAR', 'constraint' => 20, 'default' => '_self'],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft'], 'default' => 'published'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('menu_id', 'menus', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('parent_id', 'menu_items', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('menu_items', true);
    }
    public function down() {
        $this->forge->dropTable('menu_items', true);
        $this->forge->dropTable('menus', true);
    }
}
EOT,

    '2024-08-27-000004_CreateServicesTables.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateServicesTables extends Migration {
    public function up() {
        // Service Categories
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('service_categories', true);

        // Services
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'category_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 200],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 200, 'unique' => true],
            'short_description' => ['type' => 'VARCHAR', 'constraint' => 500, 'null' => true],
            'description' => ['type' => 'LONGTEXT', 'null' => true],
            'icon' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
            'deleted_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('category_id', 'service_categories', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('services', true);
    }
    public function down() {
        $this->forge->dropTable('services', true);
        $this->forge->dropTable('service_categories', true);
    }
}
EOT,

    '2024-08-27-000005_CreateLocationsTables.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateLocationsTables extends Migration {
    public function up() {
        // Countries
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'iso_code' => ['type' => 'VARCHAR', 'constraint' => 2, 'unique' => true],
            'continent' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'currency_code' => ['type' => 'VARCHAR', 'constraint' => 3, 'null' => true],
            'language_code' => ['type' => 'VARCHAR', 'constraint' => 5, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'seo_description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('countries', true);

        // Regions (States, Provinces, etc)
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'country_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150],
            'region_type' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'state'], // state, province, county
            'code' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'seo_description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['country_id', 'slug']);
        $this->forge->addForeignKey('country_id', 'countries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('regions', true);

        // Cities
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'country_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'region_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true], // Region might be null in some countries
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150],
            'latitude' => ['type' => 'DECIMAL', 'constraint' => '10,8', 'null' => true],
            'longitude' => ['type' => 'DECIMAL', 'constraint' => '11,8', 'null' => true],
            'timezone' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'population' => ['type' => 'INT', 'constraint' => 11, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'seo_description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['country_id', 'region_id', 'slug']);
        $this->forge->addForeignKey('country_id', 'countries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('region_id', 'regions', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('cities', true);

        // Location Service Pages
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'service_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'country_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'region_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'city_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255], // the full URL path stub e.g. web-development/usa/california/los-angeles
            'h1' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'intro' => ['type' => 'TEXT', 'null' => true],
            'content' => ['type' => 'LONGTEXT', 'null' => true],
            'benefits' => ['type' => 'TEXT', 'null' => true],
            'local_context' => ['type' => 'TEXT', 'null' => true],
            'industries_content' => ['type' => 'TEXT', 'null' => true],
            'process_content' => ['type' => 'TEXT', 'null' => true],
            'faq_content' => ['type' => 'TEXT', 'null' => true], // JSON array of faqs specific to this page
            'primary_keyword' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'secondary_keywords' => ['type' => 'TEXT', 'null' => true],
            'search_intent' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'meta_description' => ['type' => 'TEXT', 'null' => true],
            'canonical_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'robots' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'index, follow'],
            'indexable' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 1],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'content_score' => ['type' => 'INT', 'constraint' => 3, 'null' => true],
            'seo_score' => ['type' => 'INT', 'constraint' => 3, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['service_id', 'city_id']); // Cannot have 2 pages for the same service + city combo
        $this->forge->addUniqueKey('slug');
        $this->forge->addForeignKey('service_id', 'services', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('country_id', 'countries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('region_id', 'regions', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('city_id', 'cities', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('location_service_pages', true);
    }
    public function down() {
        $this->forge->dropTable('location_service_pages', true);
        $this->forge->dropTable('cities', true);
        $this->forge->dropTable('regions', true);
        $this->forge->dropTable('countries', true);
    }
}
EOT,

    '2024-08-27-000006_CreateIndustriesTables.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateIndustriesTables extends Migration {
    public function up() {
        // Industries
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'short_description' => ['type' => 'TEXT', 'null' => true],
            'description' => ['type' => 'LONGTEXT', 'null' => true],
            'icon' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'seo_description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('industries', true);

        // Service Industries pivot
        $this->forge->addField([
            'service_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'industry_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['service_id', 'industry_id'], true);
        $this->forge->addForeignKey('service_id', 'services', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('industry_id', 'industries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('service_industries', true);
    }
    public function down() {
        $this->forge->dropTable('service_industries', true);
        $this->forge->dropTable('industries', true);
    }
}
EOT,

    '2024-08-27-000007_CreateTeamTable.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateTeamTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'role' => ['type' => 'VARCHAR', 'constraint' => 150],
            'short_bio' => ['type' => 'TEXT', 'null' => true],
            'bio' => ['type' => 'LONGTEXT', 'null' => true],
            'photo' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'skills' => ['type' => 'TEXT', 'null' => true], // Storing as JSON array of strings
            'experience' => ['type' => 'TEXT', 'null' => true],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'linkedin_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'website_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('team_members', true);
    }
    public function down() {
        $this->forge->dropTable('team_members', true);
    }
}
EOT,

    '2024-08-27-000008_CreatePortfolioTables.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreatePortfolioTables extends Migration {
    public function up() {
        // Portfolio Projects
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'client_name' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'short_description' => ['type' => 'TEXT', 'null' => true],
            'description' => ['type' => 'LONGTEXT', 'null' => true],
            'challenge' => ['type' => 'LONGTEXT', 'null' => true],
            'solution' => ['type' => 'LONGTEXT', 'null' => true],
            'results' => ['type' => 'LONGTEXT', 'null' => true],
            'featured_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'project_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'completion_date' => ['type' => 'DATE', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'seo_description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('portfolio_projects', true);

        // Case Studies
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'portfolio_project_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'overview' => ['type' => 'LONGTEXT', 'null' => true],
            'challenge' => ['type' => 'LONGTEXT', 'null' => true],
            'strategy' => ['type' => 'LONGTEXT', 'null' => true],
            'solution' => ['type' => 'LONGTEXT', 'null' => true],
            'implementation' => ['type' => 'LONGTEXT', 'null' => true],
            'results' => ['type' => 'LONGTEXT', 'null' => true],
            'testimonial' => ['type' => 'TEXT', 'null' => true],
            'featured_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'seo_description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('portfolio_project_id'); // One case study per project
        $this->forge->addForeignKey('portfolio_project_id', 'portfolio_projects', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('case_studies', true);

        // Technologies
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'category' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'icon' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'website_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('technologies', true);

        // Portfolio Services Pivot
        $this->forge->addField([
            'portfolio_project_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'service_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['portfolio_project_id', 'service_id'], true);
        $this->forge->addForeignKey('portfolio_project_id', 'portfolio_projects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('service_id', 'services', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('portfolio_services', true);

        // Portfolio Industries Pivot
        $this->forge->addField([
            'portfolio_project_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'industry_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['portfolio_project_id', 'industry_id'], true);
        $this->forge->addForeignKey('portfolio_project_id', 'portfolio_projects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('industry_id', 'industries', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('portfolio_industries', true);

        // Portfolio Technologies Pivot
        $this->forge->addField([
            'portfolio_project_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'technology_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['portfolio_project_id', 'technology_id'], true);
        $this->forge->addForeignKey('portfolio_project_id', 'portfolio_projects', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('technology_id', 'technologies', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('portfolio_technologies', true);
    }
    public function down() {
        $this->forge->dropTable('portfolio_technologies', true);
        $this->forge->dropTable('portfolio_industries', true);
        $this->forge->dropTable('portfolio_services', true);
        $this->forge->dropTable('technologies', true);
        $this->forge->dropTable('case_studies', true);
        $this->forge->dropTable('portfolio_projects', true);
    }
}
EOT,

    '2024-08-27-000009_CreateBlogTables.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateBlogTables extends Migration {
    public function up() {
        // Blog Categories
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blog_categories', true);

        // Blog Tags
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blog_tags', true);

        // Blog Posts
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'excerpt' => ['type' => 'TEXT', 'null' => true],
            'content' => ['type' => 'LONGTEXT', 'null' => true],
            'featured_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'author_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'category_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'draft'],
            'published_at' => ['type' => 'DATETIME', 'null' => true],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'meta_description' => ['type' => 'TEXT', 'null' => true],
            'canonical_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'robots' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'index, follow'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'blog_categories', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('blog_posts', true);

        // Blog Post Tags Pivot
        $this->forge->addField([
            'post_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tag_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['post_id', 'tag_id'], true);
        $this->forge->addForeignKey('post_id', 'blog_posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'blog_tags', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('blog_post_tags', true);
    }
    public function down() {
        $this->forge->dropTable('blog_post_tags', true);
        $this->forge->dropTable('blog_posts', true);
        $this->forge->dropTable('blog_tags', true);
        $this->forge->dropTable('blog_categories', true);
    }
}
EOT,

    '2024-08-27-000010_CreateFaqsTable.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateFaqsTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'question' => ['type' => 'VARCHAR', 'constraint' => 500],
            'answer' => ['type' => 'TEXT'],
            'context_type' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true], // e.g. service, location_page
            'context_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addKey(['context_type', 'context_id']); // index for polymorphic relationship
        $this->forge->createTable('faqs', true);
    }
    public function down() {
        $this->forge->dropTable('faqs', true);
    }
}
EOT,

    '2024-08-27-000011_CreateTestimonialsTable.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateTestimonialsTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'client_name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'company_name' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'role' => ['type' => 'VARCHAR', 'constraint' => 150, 'null' => true],
            'testimonial' => ['type' => 'TEXT'],
            'client_photo' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'company_logo' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'rating' => ['type' => 'DECIMAL', 'constraint' => '3,1', 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'published'],
            'featured' => ['type' => 'TINYINT', 'constraint' => 1, 'default' => 0],
            'sort_order' => ['type' => 'INT', 'constraint' => 5, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('testimonials', true);
    }
    public function down() {
        $this->forge->dropTable('testimonials', true);
    }
}
EOT,

    '2024-08-27-000012_CreateSeoTables.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateSeoTables extends Migration {
    public function up() {
        // SEO Meta
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'entity_type' => ['type' => 'VARCHAR', 'constraint' => 100],
            'entity_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'meta_description' => ['type' => 'TEXT', 'null' => true],
            'canonical_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'robots' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'og_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'og_description' => ['type' => 'TEXT', 'null' => true],
            'og_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'twitter_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'twitter_description' => ['type' => 'TEXT', 'null' => true],
            'twitter_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'schema_type' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'schema_json' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['entity_type', 'entity_id']);
        $this->forge->createTable('seo_meta', true);

        // Redirects
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'source_url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'destination_url' => ['type' => 'VARCHAR', 'constraint' => 255],
            'redirect_type' => ['type' => 'INT', 'constraint' => 3, 'default' => 301], // 301, 302, 307, 308
            'status' => ['type' => 'ENUM', 'constraint' => ['active', 'inactive'], 'default' => 'active'],
            'hit_count' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'default' => 0],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey('source_url');
        $this->forge->createTable('redirects', true);
    }
    public function down() {
        $this->forge->dropTable('redirects', true);
        $this->forge->dropTable('seo_meta', true);
    }
}
EOT,

    '2024-08-27-000013_CreateLeadsTable.php' => <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateLeadsTable extends Migration {
    public function up() {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'email' => ['type' => 'VARCHAR', 'constraint' => 255],
            'phone' => ['type' => 'VARCHAR', 'constraint' => 50, 'null' => true],
            'country' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'city' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'service_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'budget' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'message' => ['type' => 'TEXT', 'null' => true],
            'source' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['new', 'contacted', 'qualified', 'proposal', 'won', 'lost'], 'default' => 'new'],
            'assigned_to' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true], // User ID
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('service_id', 'services', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('assigned_to', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('contact_leads', true);
    }
    public function down() {
        $this->forge->dropTable('contact_leads', true);
    }
}
EOT,
];

foreach ($migrations as $file => $content) {
    file_put_contents($dir . '/' . $file, $content);
}
echo "Migrations generated successfully.";
