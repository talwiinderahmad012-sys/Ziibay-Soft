<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddInternationalFieldsToLocations extends Migration
{
    public function up()
    {
        $this->forge->addColumn('locations', [
            'locale' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
                'null' => true,
                'after' => 'country_code',
                'comment' => 'e.g., en-US, en-GB'
            ],
            'currency' => [
                'type' => 'VARCHAR',
                'constraint' => 3,
                'null' => true,
                'after' => 'locale',
                'comment' => 'e.g., USD, GBP'
            ],
            'timezone' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
                'after' => 'currency',
            ],
            'region_label' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
                'after' => 'timezone',
                'comment' => 'e.g., State, Province, Territory'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('locations', 'locale');
        $this->forge->dropColumn('locations', 'currency');
        $this->forge->dropColumn('locations', 'timezone');
        $this->forge->dropColumn('locations', 'region_label');
    }
}
