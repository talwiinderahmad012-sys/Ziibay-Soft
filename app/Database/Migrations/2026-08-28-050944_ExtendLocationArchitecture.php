<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExtendLocationArchitecture extends Migration
{
    public function up()
    {
        // Assume 'tier' was already added to locations in a failed migration attempt.


        // Add content extensions to location_services
        $this->forge->addColumn('location_services', [
            'local_business_needs' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'content'
            ],
            'local_faqs' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'local_business_needs'
            ],
            'market_notes' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'local_faqs'
            ],
            'seo_readiness' => [
                'type' => 'INT',
                'constraint' => 1,
                'default' => 0,
                'after' => 'status'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('locations', 'tier');
        $this->forge->dropColumn('location_services', ['local_business_needs', 'local_faqs', 'market_notes', 'seo_readiness']);
    }
}
