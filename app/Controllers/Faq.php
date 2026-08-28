<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FaqModel;

class Faq extends BaseController
{
    public function index()
    {
        $faqModel = new FaqModel();
        
        $search = $this->request->getGet('q');
        
        $faqModel->where('status', 'active');
        
        if ($search) {
            $faqModel->groupStart()
                     ->like('question', $search)
                     ->orLike('answer', $search)
                     ->groupEnd();
        }

        $faqs = $faqModel->orderBy('sort_order', 'ASC')->orderBy('created_at', 'DESC')->findAll();

        $data = [
            'title' => 'Frequently Asked Questions | Ziibay Soft',
            'meta_description' => 'Find answers to common questions about our web development, software, and SEO services.',
            'canonical_url' => base_url('faq'),
            'faqs' => $faqs,
            'search' => $search
        ];

        return view('pages/faq', $data);
    }
}
