<?php

namespace App\Controllers;

use App\Models\PortfolioProjectModel;
use App\Models\ServiceModel;
use App\Models\IndustryModel;
use App\Models\TechnologyModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Portfolio extends BaseController
{
    protected $portfolioModel;
    protected $db;

    public function __construct()
    {
        $this->portfolioModel = new PortfolioProjectModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        // Handle basic filtering by service or industry slug
        $serviceFilter = $this->request->getGet('service');
        $industryFilter = $this->request->getGet('industry');

        $builder = $this->db->table('portfolio_projects p')
                            ->select('p.*')
                            ->where('p.status', 'published')
                            ->orderBy('p.sort_order', 'ASC')
                            ->orderBy('p.created_at', 'DESC');

        if ($serviceFilter) {
            $builder->join('portfolio_services ps', 'ps.portfolio_id = p.id')
                    ->join('services s', 's.id = ps.service_id')
                    ->where('s.slug', $serviceFilter);
        }

        if ($industryFilter) {
            $builder->join('portfolio_industries pi', 'pi.portfolio_project_id = p.id')
                    ->join('industries i', 'i.id = pi.industry_id')
                    ->where('i.slug', $industryFilter);
        }

        $projects = $builder->get()->getResultArray();
        
        // Ensure unique projects if multiple joins happen
        $uniqueProjects = [];
        foreach ($projects as $p) {
            $uniqueProjects[$p['id']] = $p;
        }
        $projects = array_values($uniqueProjects);

        // Fetch categories dynamically based on project_type in published projects
        $categories = $this->db->table('portfolio_projects')
                                ->select('project_type')
                                ->where('status', 'published')
                                ->where('project_type IS NOT NULL')
                                ->groupBy('project_type')
                                ->get()->getResultArray();

        $data = [
            'title' => 'Our Portfolio | Ziibay Soft',
            'projects' => $projects,
            'categories' => array_column($categories, 'project_type'),
            'serviceFilter' => $serviceFilter,
            'industryFilter' => $industryFilter,
        ];

        return view('pages/portfolio', $data);
    }

    public function show($slug)
    {
        $project = $this->portfolioModel->where('slug', $slug)->where('status', 'published')->first();

        if (!$project) {
            throw PageNotFoundException::forPageNotFound("Project not found: " . $slug);
        }

        // Fetch related services
        $services = $this->db->table('services s')
            ->select('s.name, s.slug')
            ->join('portfolio_services ps', 'ps.service_id = s.id')
            ->where('ps.portfolio_id', $project['id'])
            ->where('s.status', 'published')
            ->get()->getResultArray();

        // Fetch related industries
        $industries = $this->db->table('industries i')
            ->select('i.name, i.slug')
            ->join('portfolio_industries pi', 'pi.industry_id = i.id')
            ->where('pi.portfolio_project_id', $project['id'])
            ->where('i.status', 'published')
            ->get()->getResultArray();

        // Fetch related technologies
        $technologies = $this->db->table('technologies t')
            ->select('t.name, t.slug, t.icon, t.category')
            ->join('portfolio_technologies pt', 'pt.technology_id = t.id')
            ->where('pt.portfolio_id', $project['id'])
            ->where('t.status', 'active')
            ->get()->getResultArray();

        // Fetch up to 3 related projects (based on similar project_type, excluding current)
        $relatedProjects = $this->db->table('portfolio_projects')
            ->where('status', 'published')
            ->where('id !=', $project['id'])
            ->groupStart()
                ->where('project_type', $project['project_type'])
            ->groupEnd()
            ->limit(3)
            ->get()->getResultArray();

        // If not enough related by type, just get random published
        if (count($relatedProjects) < 3) {
            $moreProjects = $this->db->table('portfolio_projects')
                ->where('status', 'published')
                ->where('id !=', $project['id'])
                ->limit(3 - count($relatedProjects))
                ->get()->getResultArray();
            $relatedProjects = array_merge($relatedProjects, $moreProjects);
        }
        
        // Remove duplicates if any
        $uniqueRelated = [];
        foreach ($relatedProjects as $rp) {
            $uniqueRelated[$rp['id']] = $rp;
        }
        $relatedProjects = array_values($uniqueRelated);

        // Pre-fill WhatsApp message
        $whatsappMessage = "Hello Ziibay Soft, I saw your '" . $project['title'] . "' portfolio project and would like to discuss a similar project.";

        // Fetch associated Case Study
        $caseStudy = $this->db->table('case_studies')
            ->select('slug')
            ->where('portfolio_project_id', $project['id'])
            ->where('status', 'published')
            ->get()->getRowArray();

        $data = [
            'project' => $project,
            'services' => $services,
            'industries' => $industries,
            'technologies' => $technologies,
            'relatedProjects' => $relatedProjects,
            'caseStudySlug' => $caseStudy ? $caseStudy['slug'] : null,
            'whatsappMessage' => $whatsappMessage,
            'title' => $project['seo_title'] ?? $project['title'],
            'meta_description' => $project['seo_description'] ?? $project['short_description'],
            'canonical_url' => $project['canonical_url'] ?? base_url("portfolio/" . $project['slug']),
            'og_image' => $project['featured_image'] ? base_url($project['featured_image']) : null,
        ];

        return view('pages/portfolio_detail', $data);
    }
}
