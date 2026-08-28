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