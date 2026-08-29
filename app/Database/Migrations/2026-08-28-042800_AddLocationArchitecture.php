<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddLocationArchitecture extends Migration
{
    public function up()
    {
        // 1. Locations Table
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'parent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'location_type' => [
                'type' => 'ENUM',
                'constraint' => ['country', 'region', 'city'],
                'default' => 'city',
            ],
            'country_code' => [
                'type' => 'VARCHAR',
                'constraint' => 2,
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'published', 'archived'],
                'default' => 'draft',
            ],
            'is_indexable' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'seo_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seo_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'canonical_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
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
        $this->forge->addKey('parent_id');
        $this->forge->addKey('slug');
        $this->forge->createTable('locations');

        // 2. Location Services Relationship
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'location_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'service_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['draft', 'published', 'archived'],
                'default' => 'draft',
            ],
            'is_indexable' => [
                'type' => 'BOOLEAN',
                'default' => 0,
            ],
            'intro' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'content' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'seo_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'seo_description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'canonical_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'featured_image_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
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
        $this->forge->addKey('location_id');
        $this->forge->addKey('service_id');
        $this->forge->addUniqueKey(['location_id', 'service_id']);
        $this->forge->createTable('location_services');
    }

    public function down()
    {
        $this->forge->dropTable('location_services');
        $this->forge->dropTable('locations');
    }
}
