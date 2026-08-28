<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'Ziibay Soft | Premium Web & Software Development Agency',
            'meta_description' => 'Ziibay Soft builds scalable, secure, and modern digital platforms for ambitious international brands. Specializing in Web, Software, and App development.',
            'canonical_url' => base_url()
        ];
        
        return view('pages/home', $data);
    }
}
