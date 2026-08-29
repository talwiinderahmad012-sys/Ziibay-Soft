<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Phase #20 — editorial internal-link priority per page/entity.
 *
 * "priority" here is an editorial/navigation priority used by the
 * internal link audit (orphan severity, discoverability checks).
 * It is NOT a search-engine ranking signal.
 */
class AddPageLinkMetaTable extends Migration
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
                'default'    => 'page',
            ],
            'entity_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
            ],
            'priority' => [
                'type'       => 'ENUM',
                'constraint' => ['priority', 'normal', 'low'],
                'default'    => 'normal',
            ],
            'notes' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
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

        $this->forge->createTable('page_link_meta', true);
    }

    public function down()
    {
        $this->forge->dropTable('page_link_meta', true);
    }
}
