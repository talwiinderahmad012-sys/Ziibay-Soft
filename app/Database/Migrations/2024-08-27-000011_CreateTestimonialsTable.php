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