<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RefactorFaqsTable extends Migration
{
    public function up()
    {
        // Remove old polymorphic columns if they exist
        $fields = $this->db->getFieldData('faqs');
        $hasEntityType = false;
        $hasEntityId = false;
        foreach ($fields as $field) {
            if ($field->name === 'entity_type') $hasEntityType = true;
            if ($field->name === 'entity_id') $hasEntityId = true;
        }

        if ($hasEntityType) {
            $this->forge->dropColumn('faqs', 'entity_type');
        }
        if ($hasEntityId) {
            $this->forge->dropColumn('faqs', 'entity_id');
        }

        // Pivot: faq_services
        $this->forge->addField([
            'faq_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'service_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['faq_id', 'service_id'], true);
        $this->forge->createTable('faq_services', true);

        // Pivot: faq_industries
        $this->forge->addField([
            'faq_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'industry_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['faq_id', 'industry_id'], true);
        $this->forge->createTable('faq_industries', true);

        // Pivot: faq_articles (blog_posts)
        $this->forge->addField([
            'faq_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'article_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['faq_id', 'article_id'], true);
        $this->forge->createTable('faq_articles', true);

        // Pivot: faq_case_studies
        $this->forge->addField([
            'faq_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'case_study_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['faq_id', 'case_study_id'], true);
        $this->forge->createTable('faq_case_studies', true);
    }

    public function down()
    {
        $this->forge->dropTable('faq_services', true);
        $this->forge->dropTable('faq_industries', true);
        $this->forge->dropTable('faq_articles', true);
        $this->forge->dropTable('faq_case_studies', true);
    }
}
