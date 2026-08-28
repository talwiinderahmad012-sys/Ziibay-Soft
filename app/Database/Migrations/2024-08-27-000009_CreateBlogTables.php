<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;
class CreateBlogTables extends Migration {
    public function up() {
        // Blog Categories
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'description' => ['type' => 'TEXT', 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blog_categories', true);

        // Blog Tags
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 150],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 150, 'unique' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('blog_tags', true);

        // Blog Posts
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'title' => ['type' => 'VARCHAR', 'constraint' => 255],
            'slug' => ['type' => 'VARCHAR', 'constraint' => 255, 'unique' => true],
            'excerpt' => ['type' => 'TEXT', 'null' => true],
            'content' => ['type' => 'LONGTEXT', 'null' => true],
            'featured_image' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'author_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'category_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'status' => ['type' => 'ENUM', 'constraint' => ['published', 'draft', 'archived'], 'default' => 'draft'],
            'published_at' => ['type' => 'DATETIME', 'null' => true],
            'seo_title' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'meta_description' => ['type' => 'TEXT', 'null' => true],
            'canonical_url' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'robots' => ['type' => 'VARCHAR', 'constraint' => 50, 'default' => 'index, follow'],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->addForeignKey('category_id', 'blog_categories', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('blog_posts', true);

        // Blog Post Tags Pivot
        $this->forge->addField([
            'post_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'tag_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['post_id', 'tag_id'], true);
        $this->forge->addForeignKey('post_id', 'blog_posts', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('tag_id', 'blog_tags', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('blog_post_tags', true);
    }
    public function down() {
        $this->forge->dropTable('blog_post_tags', true);
        $this->forge->dropTable('blog_posts', true);
        $this->forge->dropTable('blog_tags', true);
        $this->forge->dropTable('blog_categories', true);
    }
}