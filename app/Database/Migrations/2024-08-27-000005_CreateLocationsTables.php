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