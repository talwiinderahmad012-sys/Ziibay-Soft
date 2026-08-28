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