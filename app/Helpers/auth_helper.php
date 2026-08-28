<?php

if (!function_exists('has_permission')) {
    function has_permission(string $permissionName): bool
    {
        $session = session();
        if (!$session->get('isLoggedIn')) {
            return false;
        }

        $roleId = $session->get('role_id');
        if (!$roleId) {
            return false;
        }

        $db = \Config\Database::connect();
        $builder = $db->table('role_permissions');
        $builder->select('permissions.name');
        $builder->join('permissions', 'permissions.id = role_permissions.permission_id');
        $builder->where('role_permissions.role_id', $roleId);
        $builder->where('permissions.name', $permissionName);
        
        return $builder->countAllResults() > 0;
    }
}
