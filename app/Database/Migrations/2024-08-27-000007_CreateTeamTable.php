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