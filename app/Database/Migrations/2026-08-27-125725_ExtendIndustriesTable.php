<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ExtendIndustriesTable extends Migration
{
    public function up()
    {
        $fields = [
            'challenges' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'description'
            ],
            'solutions' => [
                'type' => 'JSON',
                'null' => true,
                'after' => 'challenges'
            ]
        ];
        $this->forge->addColumn('industries', $fields);
    }

    public function down()
    {
        $this->forge->dropColumn('industries', 'challenges');
        $this->forge->dropColumn('industries', 'solutions');
    }
}
