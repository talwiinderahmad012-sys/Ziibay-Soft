<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExtendCaseStudiesTable extends Migration
{
    public function up()
    {
        // 1. Add fields to case_studies
        $fields = [
            'portfolio_project_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true
            ],
            'excerpt' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'overview' => [
                'type' => 'LONGTEXT',
                'null' => true
            ],
            'goals' => [
                'type' => 'JSON',
                'null' => true
            ],
            'challenge' => [
                'type' => 'LONGTEXT',
                'null' => true
            ],
            'discovery' => [
                'type' => 'LONGTEXT',
                'null' => true
            ],
            'strategy' => [
                'type' => 'LONGTEXT',
                'null' => true
            ],
            'solution' => [
                'type' => 'LONGTEXT',
                'null' => true
            ],
            'implementation' => [
                'type' => 'LONGTEXT',
                'null' => true
            ],
            'results' => [
                'type' => 'LONGTEXT',
                'null' => true
            ],
            'lessons' => [
                'type' => 'LONGTEXT',
                'null' => true
            ],
            'key_features' => [
                'type' => 'JSON',
                'null' => true
            ],
            'gallery' => [
                'type' => 'JSON',
                'null' => true
            ],
            'testimonial' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'indexable' => [
                'type' => 'TINYINT',
                'constraint' => 1,
                'default' => 1
            ],
            'sort_order' => [
                'type' => 'INT',
                'constraint' => 5,
                'default' => 0
            ],
            'seo_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'seo_description' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'canonical_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ],
            'og_image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true
            ]
        ];

        try {
            $this->forge->addColumn('case_studies', $fields);
        } catch (\Exception $e) {
            // Ignore if columns already exist
        }

        // 2. Pivot Tables
        // case_study_services
        $this->forge->addField([
            'case_study_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'service_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['case_study_id', 'service_id'], true);
        try {
            $this->forge->createTable('case_study_services', true);
        } catch (\Exception $e) {}

        // case_study_industries
        $this->forge->addField([
            'case_study_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'industry_id'   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['case_study_id', 'industry_id'], true);
        try {
            $this->forge->createTable('case_study_industries', true);
        } catch (\Exception $e) {}

        // case_study_technologies
        $this->forge->addField([
            'case_study_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'technology_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['case_study_id', 'technology_id'], true);
        try {
            $this->forge->createTable('case_study_technologies', true);
        } catch (\Exception $e) {}
    }

    public function down()
    {
        $this->forge->dropTable('case_study_technologies', true);
        $this->forge->dropTable('case_study_industries', true);
        $this->forge->dropTable('case_study_services', true);
        
        $cols = ['excerpt', 'client_name', 'goals', 'discovery', 'lessons', 'key_features', 'gallery', 'indexable', 'sort_order', 'canonical_url', 'og_image', 'published_at'];
        foreach ($cols as $col) {
            try {
                $this->forge->dropColumn('case_studies', $col);
            } catch (\Exception $e) {}
        }
    }
}
