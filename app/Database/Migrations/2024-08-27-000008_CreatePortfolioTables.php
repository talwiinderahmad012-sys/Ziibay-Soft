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