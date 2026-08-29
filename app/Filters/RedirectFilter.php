<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\RedirectModel;

class RedirectFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $uri = $request->getUri()->getPath();
        if (empty($uri)) {
            $uri = '/';
        } else {
            $uri = '/' . ltrim($uri, '/');
        }

        $db = \Config\Database::connect();
        
        // We handle old_url / new_url based on DB schema which has old_url, new_url
        $builder = $db->table('redirects')
                      ->where('old_url', $uri)
                      ->orWhere('old_url', ltrim($uri, '/'))
                      ->where('status', 'active');
                      
        $redirect = $builder->get()->getRowArray();

        if ($redirect) {
            $redirectType = isset($redirect['redirect_type']) ? (int)$redirect['redirect_type'] : 301;
            $newUrl = $redirect['new_url'];
            
            // Increment hit count if column exists
            if ($db->fieldExists('hit_count', 'redirects')) {
                $db->table('redirects')->where('id', $redirect['id'])->set('hit_count', 'hit_count+1', false)->update();
            }

            return redirect()->to($newUrl)->withCookies()->setStatusCode($redirectType);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing
    }
}

