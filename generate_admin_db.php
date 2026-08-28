<?php

$dir = 'app/Database/Migrations';
$file = '2024-08-27-000014_CreatePermissionsAndAuditTables.php';

$content = <<<'EOT'
<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreatePermissionsAndAuditTables extends Migration {
    public function up() {
        // Permissions
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'description' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
            'updated_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('permissions', true);

        // Role Permissions
        $this->forge->addField([
            'role_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'permission_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
        ]);
        $this->forge->addKey(['role_id', 'permission_id'], true);
        $this->forge->addForeignKey('role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('permission_id', 'permissions', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('role_permissions', true);

        // Audit Logs
        $this->forge->addField([
            'id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'action' => ['type' => 'VARCHAR', 'constraint' => 255],
            'entity_type' => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'entity_id' => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'old_values' => ['type' => 'TEXT', 'null' => true],
            'new_values' => ['type' => 'TEXT', 'null' => true],
            'ip_address' => ['type' => 'VARCHAR', 'constraint' => 45, 'null' => true],
            'user_agent' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('audit_logs', true);
    }

    public function down() {
        $this->forge->dropTable('audit_logs', true);
        $this->forge->dropTable('role_permissions', true);
        $this->forge->dropTable('permissions', true);
    }
}
EOT;

file_put_contents($dir . '/' . $file, $content);

// Generate Models
$modelsDir = 'app/Models';
$models = [
    'PermissionModel.php' => ['table' => 'permissions', 'allowedFields' => ['name', 'description']],
    'RolePermissionModel.php' => ['table' => 'role_permissions', 'allowedFields' => ['role_id', 'permission_id'], 'useTimestamps' => false],
    'AuditLogModel.php' => ['table' => 'audit_logs', 'allowedFields' => ['user_id', 'action', 'entity_type', 'entity_id', 'old_values', 'new_values', 'ip_address', 'user_agent'], 'useTimestamps' => false, 'createdField' => 'created_at']
];

foreach ($models as $filename => $config) {
    $className = str_replace('.php', '', $filename);
    $table = $config['table'];
    $allowedFields = implode("', '", $config['allowedFields']);
    $useTimestamps = isset($config['useTimestamps']) && !$config['useTimestamps'] ? 'false' : 'true';
    $createdField = isset($config['createdField']) ? $config['createdField'] : 'created_at';
    
    $mContent = <<<EOT
<?php
namespace App\Models;
use CodeIgniter\Model;

class {$className} extends Model
{
    protected \$table            = '{$table}';
    protected \$primaryKey       = 'id';
    protected \$useAutoIncrement = true;
    protected \$returnType       = 'array';
    protected \$protectFields    = true;
    protected \$allowedFields    = ['{$allowedFields}'];

    protected \$useTimestamps = {$useTimestamps};
    protected \$dateFormat    = 'datetime';
    protected \$createdField  = '{$createdField}';
}
EOT;

    file_put_contents($modelsDir . '/' . $filename, $mContent);
}

echo "Done.";
