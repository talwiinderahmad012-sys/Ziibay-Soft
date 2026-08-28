<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class AddTeamMemberToBlogPosts extends Migration
{
    public function up()
    {
        $fields = [
            'team_member_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'null' => true,
                'after' => 'author_id'
            ]
        ];
        $this->forge->addColumn('blog_posts', $fields);
        // Add foreign key manually because addColumn doesn't support it directly in older CI4, 
        // but we can just let it be a standard integer column and manage relations in model.
        // Actually CI4 supports addForeignKey on existing tables by using processForeignKey
        $this->db->query("ALTER TABLE `blog_posts` ADD CONSTRAINT `blog_posts_team_member_id_foreign` FOREIGN KEY (`team_member_id`) REFERENCES `team_members`(`id`) ON DELETE SET NULL ON UPDATE CASCADE");
    }

    public function down()
    {
        $this->db->query("ALTER TABLE `blog_posts` DROP FOREIGN KEY `blog_posts_team_member_id_foreign`");
        $this->forge->dropColumn('blog_posts', 'team_member_id');
    }
}
