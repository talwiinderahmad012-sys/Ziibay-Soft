<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExtendLeadsTables extends Migration
{
    public function up()
    {
        // 1. Create lead_services table
        $this->forge->addField([
            'lead_id' => [
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
        $this->forge->addKey(['lead_id', 'service_id'], true);
        $this->forge->createTable('lead_services', true);
    }

    public function down()
    {
        $this->forge->dropTable('lead_services', true);
    }
}
