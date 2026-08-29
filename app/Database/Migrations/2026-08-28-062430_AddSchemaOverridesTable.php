<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSchemaOverridesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'entity_type' => [
                'type'       => 'ENUM',
                'constraint' => ['page', 'service', 'industry', 'blog_post', 'blog_category', 'case_study', 'portfolio', 'location', 'location_service'],
            ],
            'entity_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'is_enabled' => [
                'type'       => 'TINYINT',
                'constraint' => 1,
                'default'    => 1, // 1 = generate schema, 0 = no schema
            ],
            'manual_json_ld' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'warnings' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addUniqueKey(['entity_type', 'entity_id']);
        
        $this->forge->createTable('seo_schema_overrides');
    }

    public function down()
    {
        $this->forge->dropTable('seo_schema_overrides');
    }
}
