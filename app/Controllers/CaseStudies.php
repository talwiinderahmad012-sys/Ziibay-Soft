<?php

namespace App\Controllers;

use App\Models\CaseStudyModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class CaseStudies extends BaseController
{
    protected $db;
    protected $caseStudyModel;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->caseStudyModel = new CaseStudyModel();
    }

    public function index()
    {
        $serviceFilter = $this->request->getGet('service');
        $industryFilter = $this->request->getGet('industry');
        $techFilter = $this->request->getGet('technology');

        $builder = $this->db->table('case_studies cs')
            ->select('cs.*')
            ->where('cs.status', 'published')
            ->orderBy('cs.sort_order', 'ASC')
            ->orderBy('cs.created_at', 'DESC');

        if ($serviceFilter) {
            $builder->join('case_study_services css', 'css.case_study_id = cs.id')
                    ->join('services s', 's.id = css.service_id')
                    ->where('s.slug', $serviceFilter);
        }

        if ($industryFilter) {
            $builder->join('case_study_industries csi', 'csi.case_study_id = cs.id')
                    ->join('industries i', 'i.id = csi.industry_id')
                    ->where('i.slug', $industryFilter);
        }

        if ($techFilter) {
            $builder->join('case_study_technologies cst', 'cst.case_study_id = cs.id')
                    ->join('technologies t', 't.id = cst.technology_id')
                    ->where('t.slug', $techFilter);
        }

        $rawStudies = $builder->get()->getResultArray();
        
        $caseStudies = [];
        foreach ($rawStudies as $cs) {
            $caseStudies[$cs['id']] = $cs;
        }
        $caseStudies = array_values($caseStudies);

        // Featured case studies
        $featuredBuilder = $this->db->table('case_studies')
                                    ->where('status', 'published')
                                    ->where('featured', 1)
                                    ->orderBy('sort_order', 'ASC')
                                    ->limit(3);
        $featuredCaseStudies = $featuredBuilder->get()->getResultArray();

        $data = [
            'title' => 'Case Studies | Ziibay Soft',
            'caseStudies' => $caseStudies,
            'featuredCaseStudies' => $featuredCaseStudies,
            'serviceFilter' => $serviceFilter,
            'industryFilter' => $industryFilter,
            'techFilter' => $techFilter,
        ];

        return view('pages/case_studies', $data);
    }

    public function show($slug)
    {
        $caseStudy = $this->caseStudyModel->where('slug', $slug)->where('status', 'published')->first();

        if (!$caseStudy) {
            throw PageNotFoundException::forPageNotFound("Case study not found: " . $slug);
        }

        // Fetch Portfolio Project if linked
        $portfolioProject = null;
        $projectId = $caseStudy['portfolio_project_id'];
        
        if (!empty($projectId)) {
            $portfolioProject = $this->db->table('portfolio_projects')
                ->select('id, title, slug')
                ->where('id', $projectId)
                ->where('status', 'published')
                ->get()->getRowArray();
        }

        // Fetch related services (from case study or fallback to project)
        $services = $this->db->table('services s')
            ->select('s.id, s.name, s.slug')
            ->join('case_study_services css', 'css.service_id = s.id')
            ->where('css.case_study_id', $caseStudy['id'])
            ->where('s.status', 'published')
            ->get()->getResultArray();

        if (empty($services) && $projectId) {
            $services = $this->db->table('services s')
                ->select('s.id, s.name, s.slug')
                ->join('portfolio_services ps', 'ps.service_id = s.id')
                ->where('ps.portfolio_id', $projectId)
                ->where('s.status', 'published')
                ->get()->getResultArray();
        }

        // Fetch related industries
        $industries = $this->db->table('industries i')
            ->select('i.id, i.name, i.slug')
            ->join('case_study_industries csi', 'csi.industry_id = i.id')
            ->where('csi.case_study_id', $caseStudy['id'])
            ->where('i.status', 'published')
            ->get()->getResultArray();
            
        if (empty($industries) && $projectId) {
            $industries = $this->db->table('industries i')
                ->select('i.id, i.name, i.slug')
                ->join('portfolio_industries pi', 'pi.industry_id = i.id')
                ->where('pi.portfolio_project_id', $projectId)
                ->where('i.status', 'published')
                ->get()->getResultArray();
        }

        // Fetch related technologies
        $technologies = $this->db->table('technologies t')
            ->select('t.id, t.name, t.slug, t.icon, t.category')
            ->join('case_study_technologies cst', 'cst.technology_id = t.id')
            ->where('cst.case_study_id', $caseStudy['id'])
            ->where('t.status', 'active')
            ->get()->getResultArray();
            
        if (empty($technologies) && $projectId) {
            $technologies = $this->db->table('technologies t')
                ->select('t.id, t.name, t.slug, t.icon, t.category')
                ->join('portfolio_technologies pt', 'pt.technology_id = t.id')
                ->where('pt.portfolio_id', $projectId)
                ->where('t.status', 'active')
                ->get()->getResultArray();
        }

        // Fetch up to 3 related case studies based on matching industries
        $relatedCaseStudies = [];
        if (!empty($industries)) {
            $industryIds = array_column($industries, 'id');
            if (count($industryIds) > 0) {
                // Not ideal to use ID directly since we didn't fetch ID in industries query above, let's just get matching case studies by subquery or a simpler join.
                $relatedCaseStudies = $this->db->table('case_studies cs')
                    ->select('cs.*')
                    ->join('case_study_industries csi', 'csi.case_study_id = cs.id')
                    ->join('industries i', 'i.id = csi.industry_id')
                    ->whereIn('i.slug', array_column($industries, 'slug'))
                    ->where('cs.id !=', $caseStudy['id'])
                    ->where('cs.status', 'published')
                    ->limit(3)
                    ->get()->getResultArray();
            }
        }
        
        $uniqueRelated = [];
        foreach ($relatedCaseStudies as $rcs) {
            $uniqueRelated[$rcs['id']] = $rcs;
        }
        $relatedCaseStudies = array_values($uniqueRelated);

        // Fetch FAQs
        $faqs = $this->db->table('faqs f')
            ->select('f.question, f.answer')
            ->join('faq_case_studies fcs', 'fcs.faq_id = f.id')
            ->where('fcs.case_study_id', $caseStudy['id'])
            ->where('f.status', 'active')
            ->orderBy('f.sort_order', 'ASC')
            ->get()->getResultArray();

        // Pre-fill WhatsApp message
        $whatsappMessage = "Hello Ziibay Soft, I saw the '" . $caseStudy['title'] . "' case study and would like to discuss a similar project.";

        $data = [
            'caseStudy' => $caseStudy,
            'services' => $services,
            'industries' => $industries,
            'technologies' => $technologies,
            'portfolioProject' => $portfolioProject,
            'relatedCaseStudies' => $relatedCaseStudies,
            'faqs' => $faqs,
            'whatsappMessage' => $whatsappMessage,
            'title' => $caseStudy['seo_title'] ?? $caseStudy['title'],
            'meta_description' => $caseStudy['seo_description'] ?? $caseStudy['excerpt'],
            'canonical_url' => $caseStudy['canonical_url'] ?? base_url("case-studies/" . $caseStudy['slug']),
            'og_image' => $caseStudy['og_image'] ?? ($caseStudy['featured_image'] ? base_url($caseStudy['featured_image']) : null),
        ];

        return view('pages/case_study_detail', $data);
    }
}
