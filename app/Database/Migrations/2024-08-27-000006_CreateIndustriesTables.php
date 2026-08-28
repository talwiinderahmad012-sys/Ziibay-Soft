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