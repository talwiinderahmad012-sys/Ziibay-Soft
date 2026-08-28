<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExtendBlogTables extends Migration
{
    public function up()
    {
        // 1. Add fields to blog_posts
        $this->forge->addColumn('blog_posts', [
            'scheduled_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'seo_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'meta_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'canonical_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'og_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'og_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'og_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'indexable' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1
            ],
        ]);

        // 2. Add fields to blog_categories
        $this->forge->addColumn('blog_categories', [
            'seo_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'meta_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
        ]);

        // 3. Add fields to blog_tags
        $this->forge->addColumn('blog_tags', [
            'indexable' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 0
            ],
        ]);

        // 4. Create pivot tables
        $this->forge->addField([
            'post_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'service_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey(['post_id', 'service_id'], true);
        $this->forge->createTable('blog_post_services', true);

        $this->forge->addField([
            'post_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'industry_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey(['post_id', 'industry_id'], true);
        $this->forge->createTable('blog_post_industries', true);

        $this->forge->addField([
            'post_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'technology_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey(['post_id', 'technology_id'], true);
        $this->forge->createTable('blog_post_technologies', true);

        $this->forge->addField([
            'post_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
            'related_post_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
            ],
        ]);
        $this->forge->addKey(['post_id', 'related_post_id'], true);
        $this->forge->createTable('blog_post_related', true);
    }

    public function down()
    {
        $this->forge->dropTable('blog_post_related', true);
        $this->forge->dropTable('blog_post_technologies', true);
        $this->forge->dropTable('blog_post_industries', true);
        $this->forge->dropTable('blog_post_services', true);
        $this->forge->dropColumn('blog_tags', 'indexable');
        $this->forge->dropColumn('blog_categories', ['seo_title', 'meta_description']);
        $this->forge->dropColumn('blog_posts', ['scheduled_at', 'seo_title', 'meta_description', 'canonical_url', 'og_title', 'og_description', 'og_image', 'indexable']);
    }
}
