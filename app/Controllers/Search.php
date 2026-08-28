<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Search extends BaseController
{
    public function index()
    {
        $query = trim(strip_tags($this->request->getGet('q') ?? ''));
        $typeFilter = $this->request->getGet('type'); // Optional filter

        if (strlen($query) > 100) {
            $query = substr($query, 0, 100);
        }

        $results = [];

        if (!empty($query)) {
            $db = \Config\Database::connect();
            
            // 1. Services
            if (!$typeFilter || $typeFilter === 'service') {
                $services = $db->table('services')
                               ->select('id, name as title, short_description as excerpt, slug')
                               ->where('status', 'published')
                               ->groupStart()
                                   ->like('name', $query)
                                   ->orLike('short_description', $query)
                               ->groupEnd()
                               ->get()->getResultArray();
                               
                foreach ($services as $s) {
                    $results[] = [
                        'type' => 'Service',
                        'title' => $s['title'],
                        'excerpt' => $s['excerpt'],
                        'url' => base_url('services/' . $s['slug']),
                        'relevance' => (stripos($s['title'], $query) !== false) ? 100 : 50
                    ];
                }
            }
            
            // 2. Industries
            if (!$typeFilter || $typeFilter === 'industry') {
                $industries = $db->table('industries')
                                 ->select('id, name as title, short_description as excerpt, slug')
                                 ->where('status', 'published')
                                 ->groupStart()
                                     ->like('name', $query)
                                     ->orLike('short_description', $query)
                                 ->groupEnd()
                                 ->get()->getResultArray();
                                 
                foreach ($industries as $i) {
                    $results[] = [
                        'type' => 'Industry',
                        'title' => $i['title'],
                        'excerpt' => $i['excerpt'],
                        'url' => base_url('industries/' . $i['slug']),
                        'relevance' => (stripos($i['title'], $query) !== false) ? 90 : 45
                    ];
                }
            }
            
            // 3. Blog Articles
            if (!$typeFilter || $typeFilter === 'article') {
                $articles = $db->table('blog_posts')
                               ->select('id, title, excerpt, slug')
                               ->where('status', 'published')
                               ->where('(scheduled_at IS NULL OR scheduled_at <= NOW())')
                               ->groupStart()
                                   ->like('title', $query)
                                   ->orLike('excerpt', $query)
                                   ->orLike('content', $query)
                               ->groupEnd()
                               ->get()->getResultArray();
                               
                foreach ($articles as $a) {
                    $results[] = [
                        'type' => 'Article',
                        'title' => $a['title'],
                        'excerpt' => $a['excerpt'],
                        'url' => base_url('blog/' . $a['slug']),
                        'relevance' => (stripos($a['title'], $query) !== false) ? 80 : 40
                    ];
                }
            }
            
            // 4. Portfolio Projects
            if (!$typeFilter || $typeFilter === 'portfolio') {
                $portfolio = $db->table('portfolio_projects')
                                ->select('id, title, short_description as excerpt, slug')
                                ->where('status', 'published')
                                ->groupStart()
                                    ->like('title', $query)
                                    ->orLike('short_description', $query)
                                ->groupEnd()
                                ->get()->getResultArray();
                                
                foreach ($portfolio as $p) {
                    $results[] = [
                        'type' => 'Portfolio',
                        'title' => $p['title'],
                        'excerpt' => $p['excerpt'],
                        'url' => base_url('portfolio/' . $p['slug']),
                        'relevance' => (stripos($p['title'], $query) !== false) ? 88 : 44
                    ];
                }
            }

            // 5. Case Studies
            if (!$typeFilter || $typeFilter === 'case_study') {
                $caseStudies = $db->table('case_studies')
                                  ->select('id, title, short_description as excerpt, slug')
                                  ->where('status', 'published')
                                  ->groupStart()
                                      ->like('title', $query)
                                      ->orLike('short_description', $query)
                                  ->groupEnd()
                                  ->get()->getResultArray();
                                  
                foreach ($caseStudies as $c) {
                    $results[] = [
                        'type' => 'Case Study',
                        'title' => $c['title'],
                        'excerpt' => $c['excerpt'],
                        'url' => base_url('case-studies/' . $c['slug']),
                        'relevance' => (stripos($c['title'], $query) !== false) ? 85 : 42
                    ];
                }
            }
            
            // 5. FAQs
            if (!$typeFilter || $typeFilter === 'faq') {
                $faqs = $db->table('faqs')
                           ->select('id, question as title, answer as excerpt')
                           ->where('status', 'active')
                           ->groupStart()
                               ->like('question', $query)
                               ->orLike('answer', $query)
                           ->groupEnd()
                           ->get()->getResultArray();
                           
                foreach ($faqs as $f) {
                    $results[] = [
                        'type' => 'FAQ',
                        'title' => $f['title'],
                        'excerpt' => mb_strimwidth(strip_tags($f['excerpt']), 0, 150, '...'),
                        'url' => base_url('faq'), // Global FAQ page or specific anchors
                        'relevance' => (stripos($f['title'], $query) !== false) ? 70 : 35
                    ];
                }
            }

            // Sort by relevance (descending)
            usort($results, function ($a, $b) {
                return $b['relevance'] <=> $a['relevance'];
            });
        }

        // Basic Array Pagination
        $perPage = 10;
        $page = (int)($this->request->getGet('page') ?? 1);
        $page = $page > 0 ? $page : 1;
        $total = count($results);
        $totalPages = ceil($total / $perPage);
        $pagedResults = array_slice($results, ($page - 1) * $perPage, $perPage);

        $data = [
            'title' => $query ? 'Search Results for "' . esc($query) . '"' : 'Search Ziibay Soft',
            'query' => $query,
            'typeFilter' => $typeFilter,
            'results' => $pagedResults,
            'total' => $total,
            'page' => $page,
            'totalPages' => $totalPages,
            // Search pages should generally not be indexed
            'robots' => 'noindex, follow'
        ];

        return view('pages/search', $data);
    }
}
