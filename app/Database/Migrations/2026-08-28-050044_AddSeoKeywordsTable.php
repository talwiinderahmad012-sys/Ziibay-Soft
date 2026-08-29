<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddSeoKeywordsTable extends Migration
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
            'keyword' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'normalized_keyword' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'intent' => [
                'type'       => 'ENUM',
                'constraint' => ['commercial', 'transactional', 'informational', 'navigational', 'local_commercial', 'local_transactional'],
                'default'    => 'informational',
            ],
            'keyword_type' => [
                'type'       => 'ENUM',
                'constraint' => ['primary', 'secondary', 'semantic', 'long_tail', 'question'],
                'default'    => 'secondary',
            ],
            'service_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'location_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'industry_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'target_url' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'priority' => [
                'type'       => 'ENUM',
                'constraint' => ['high', 'medium', 'low'],
                'default'    => 'medium',
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['draft', 'active', 'archived'],
                'default'    => 'draft',
            ],
            'notes' => [
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
        $this->forge->addKey('normalized_keyword');
        $this->forge->addKey('target_url');
        $this->forge->addKey('keyword_type');
        $this->forge->addKey('intent');
        $this->forge->addKey('service_id');
        
        $this->forge->addForeignKey('service_id', 'services', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('location_id', 'locations', 'id', 'CASCADE', 'SET NULL');
        $this->forge->addForeignKey('industry_id', 'industries', 'id', 'CASCADE', 'SET NULL');

        $this->forge->createTable('seo_keywords');
    }

    public function down()
    {
        $this->forge->dropTable('seo_keywords');
    }
}
