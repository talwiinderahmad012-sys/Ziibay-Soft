<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddBlogContentTypeAndRelationships extends Migration
{
    public function up()
    {
        // Add content_type to blog_posts
        $fields = [
            'content_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'default' => 'Article',
                'after' => 'category_id'
            ]
        ];
        $this->forge->addColumn('blog_posts', $fields);

        // Create article_relationships table
        $this->forge->addField([
            'parent_article_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'child_article_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
            ],
            'relationship_type' => [
                'type'           => 'VARCHAR',
                'constraint'     => 50,
                'default'       => 'related', // pillar, cluster, related
            ],
        ]);
        $this->forge->addKey(['parent_article_id', 'child_article_id', 'relationship_type'], true);
        $this->forge->addForeignKey('parent_article_id', 'blog_posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('child_article_id', 'blog_posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('article_relationships');
    }

    public function down()
    {
        $this->forge->dropTable('article_relationships');
        $this->forge->dropColumn('blog_posts', 'content_type');
    }
}
