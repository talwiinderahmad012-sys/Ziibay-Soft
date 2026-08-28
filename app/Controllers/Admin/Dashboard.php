<?php
namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // For foundation phase, we'll just pass placeholder stats
        $data = [
            'title' => 'Dashboard',
            'stats' => [
                'total_services' => 0,
                'published_services' => 0,
                'team_members' => 0,
                'portfolio_projects' => 0,
                'blog_posts' => 0,
                'leads' => 0
            ]
        ];
        return view('admin/dashboard/index', $data);
    }
}