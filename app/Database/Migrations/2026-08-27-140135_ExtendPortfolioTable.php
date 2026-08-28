<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExtendPortfolioTable extends Migration
{
    public function up()
    {
        $fields = [
            'project_type' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'client_name'
            ],
            'gallery' => [
                'type' => 'JSON',
                'null' => true,
                'after' => 'featured_image'
            ],
            'key_features' => [
                'type' => 'JSON',
                'null' => true,
                'after' => 'solution'
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 5,
                'default' => 0,
                'after' => 'featured'
            ],
            'canonical_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'seo_description'
            ],
            'published_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'updated_at'
            ],
            // Since we already have seo_description, we won't add meta_description to avoid duplicate intent.
        ];
        $this->forge->addColumn('portfolio_projects', $fields);

        // Also fix technologies table if it's missing fields
        $techFields = [
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'slug'
            ],
            'website_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'icon'
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['active', 'inactive'],
                'default' => 'active',
                'after' => 'website_url'
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 5,
                'default' => 0,
                'after' => 'status'
            ]
        ];
        // We might want to use a try-catch in case they exist, or just rely on it passing
        try {
            $this->forge->addColumn('technologies', $techFields);
        } catch (\Exception $e) {
            // Ignore if columns already exist
        }
    }

    public function down()
    {
        $this->forge->dropColumn('portfolio_projects', 'project_type');
        $this->forge->dropColumn('portfolio_projects', 'gallery');
        $this->forge->dropColumn('portfolio_projects', 'key_features');
        $this->forge->dropColumn('portfolio_projects', 'sort_order');
        $this->forge->dropColumn('portfolio_projects', 'canonical_url');
        $this->forge->dropColumn('portfolio_projects', 'published_at');
    }
}
