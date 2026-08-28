<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $data = [
            'title' => 'About Us | Ziibay Soft',
            'meta_description' => 'Ziibay Soft is a digital solutions and software development company. Learn about our approach, engineering principles, and how we build digital products.',
            'canonical_url' => base_url('about')
        ];
        return view('pages/about', $data);
    }
    
    // Placeholder for future pages
    public function portfolio()
    {
        return view('pages/placeholder', ['title' => 'Portfolio']);
    }

    public function caseStudies()
    {
        return view('pages/placeholder', ['title' => 'Case Studies']);
    }
}
