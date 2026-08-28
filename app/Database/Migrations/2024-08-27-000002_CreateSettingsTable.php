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