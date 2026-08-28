<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Exceptions\PageNotFoundException;

class PermissionFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        helper('auth');

        // $arguments contains the required permission(s)
        if (empty($arguments)) {
            return;
        }

        $hasAccess = false;
        foreach ($arguments as $permission) {
            if (has_permission($permission)) {
                $hasAccess = true;
                break;
            }
        }

        if (!$hasAccess) {
            // If they don't have permission, return 403 Forbidden
            return \Config\Services::response()->setStatusCode(403)->setBody(view('errors/html/error_403', ['message' => 'You do not have permission to access this resource.']));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
