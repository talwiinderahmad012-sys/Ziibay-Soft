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