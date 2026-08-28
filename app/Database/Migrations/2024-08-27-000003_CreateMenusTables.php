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