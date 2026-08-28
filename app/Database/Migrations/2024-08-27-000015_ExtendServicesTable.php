<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class ExtendServicesTable extends Migration {
    public function up() {
        /*
        $fields = [
            'seo_title' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'sort_order'
            ],
            'meta_description' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'seo_title'
            ],
            'canonical_url' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'meta_description'
            ]
        ];
        $this->forge->addColumn('services', $fields);
        */
    }
    public function down() {
        $this->forge->dropColumn('services', 'seo_title');
        $this->forge->dropColumn('services', 'meta_description');
        $this->forge->dropColumn('services', 'canonical_url');
    }
}
