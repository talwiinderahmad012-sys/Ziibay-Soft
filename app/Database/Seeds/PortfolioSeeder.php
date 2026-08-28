<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        
        // 1. Seed Technologies
        $technologies = [
            ['name' => 'CodeIgniter 4', 'slug' => 'codeigniter-4', 'category' => 'Backend', 'icon' => 'fa-brands fa-php', 'status' => 'active'],
            ['name' => 'PHP', 'slug' => 'php', 'category' => 'Language', 'icon' => 'fa-brands fa-php', 'status' => 'active'],
            ['name' => 'MySQL', 'slug' => 'mysql', 'category' => 'Database', 'icon' => 'fa-solid fa-database', 'status' => 'active'],
            ['name' => 'JavaScript', 'slug' => 'javascript', 'category' => 'Language', 'icon' => 'fa-brands fa-js', 'status' => 'active'],
            ['name' => 'HTML5', 'slug' => 'html5', 'category' => 'Frontend', 'icon' => 'fa-brands fa-html5', 'status' => 'active'],
            ['name' => 'CSS3', 'slug' => 'css3', 'category' => 'Frontend', 'icon' => 'fa-brands fa-css3-alt', 'status' => 'active'],
            ['name' => 'Tailwind CSS', 'slug' => 'tailwind-css', 'category' => 'Frontend', 'icon' => 'fa-brands fa-css3', 'status' => 'active'],
            ['name' => 'React', 'slug' => 'react', 'category' => 'Frontend', 'icon' => 'fa-brands fa-react', 'status' => 'active'],
            ['name' => 'Flutter', 'slug' => 'flutter', 'category' => 'Mobile', 'icon' => 'fa-solid fa-mobile-screen', 'status' => 'active'],
            ['name' => 'Laravel', 'slug' => 'laravel', 'category' => 'Backend', 'icon' => 'fa-brands fa-laravel', 'status' => 'active'],
            ['name' => 'Node.js', 'slug' => 'nodejs', 'category' => 'Backend', 'icon' => 'fa-brands fa-node-js', 'status' => 'active'],
        ];

        $db->query('SET FOREIGN_KEY_CHECKS=0');
        $db->table('technologies')->truncate();
        $db->query('SET FOREIGN_KEY_CHECKS=1');
        $db->table('technologies')->insertBatch($technologies);

        // Fetch technology IDs
        $techRecords = $db->table('technologies')->get()->getResultArray();
        $techMap = [];
        foreach ($techRecords as $t) {
            $techMap[$t['slug']] = $t['id'];
        }

        // Fetch services and industries
        $services = $db->table('services')->get()->getResultArray();
        $serviceMap = [];
        foreach ($services as $s) {
            $serviceMap[$s['slug']] = $s['id'];
        }

        $industries = $db->table('industries')->get()->getResultArray();
        $industryMap = [];
        foreach ($industries as $i) {
            $industryMap[$i['slug']] = $i['id'];
        }

        // 2. Seed Projects
        $projects = [
            [
                'title' => 'Global E-commerce Platform',
                'slug' => 'global-ecommerce-platform',
                'client_name' => 'Confidential Client',
                'project_type' => 'E-commerce',
                'short_description' => 'A scalable, headless e-commerce architecture designed to handle thousands of concurrent transactions.',
                'description' => 'We engineered a high-performance headless e-commerce platform that separates the frontend presentation layer from the robust backend inventory management system. This architecture ensures lightning-fast page loads and unparalleled flexibility for future feature expansions.',
                'challenge' => 'The client was experiencing severe cart abandonment rates due to slow load times during peak traffic periods, and their legacy inventory system could not synchronize across multiple sales channels in real-time.',
                'solution' => 'By implementing a headless architecture with CodeIgniter 4 and React, we delivered a sub-second page load experience. We integrated a custom API gateway to synchronize inventory across all sales channels seamlessly.',
                'key_features' => json_encode(['Headless Architecture', 'Real-time Inventory Sync', 'Custom Payment Gateway API', 'Dynamic Pricing Engine', 'Automated Order Fulfillment']),
                'results' => "45% reduction in cart abandonment\n200% improvement in mobile page load speed\nZero downtime during Black Friday sales",
                'featured_image' => 'assets/images/portfolio/ecommerce-featured.jpg',
                'gallery' => json_encode(['assets/images/portfolio/ecommerce-1.jpg', 'assets/images/portfolio/ecommerce-2.jpg']),
                'status' => 'published',
                'featured' => 1,
                'sort_order' => 1,
                'seo_title' => 'Global E-commerce Platform Portfolio | Ziibay Soft',
                'seo_description' => 'Explore how Ziibay Soft engineered a high-performance headless e-commerce architecture to solve cart abandonment and inventory sync challenges.',
                'canonical_url' => base_url('portfolio/global-ecommerce-platform')
            ],
            [
                'title' => 'Healthcare Patient Portal',
                'slug' => 'healthcare-patient-portal',
                'client_name' => 'Regional Health Network',
                'project_type' => 'Custom Platforms',
                'short_description' => 'A secure, HIPAA-compliant patient dashboard streamlining appointment scheduling and telehealth access.',
                'description' => 'This comprehensive patient portal modernized the way patients interact with their healthcare providers, offering secure messaging, prescription renewals, and virtual consultation integrations.',
                'challenge' => 'The healthcare network was overwhelmed with phone inquiries and relied on disparate legacy systems that frustrated patients trying to access their health records.',
                'solution' => 'We architected a unified, compliant dashboard using Laravel and Vue.js. The system integrates securely with existing Electronic Health Records (EHR) via standard HL7/FHIR protocols.',
                'key_features' => json_encode(['HIPAA-compliant Architecture', 'EHR Integration', 'Telehealth Video Consultations', 'Secure Messaging System', 'Automated Appointment Reminders']),
                'results' => "60% reduction in administrative phone calls\n85% patient adoption rate in the first 6 months\nStreamlined prescription renewal process",
                'featured_image' => 'assets/images/portfolio/healthcare-featured.jpg',
                'gallery' => json_encode(['assets/images/portfolio/healthcare-1.jpg']),
                'status' => 'published',
                'featured' => 1,
                'sort_order' => 2,
                'seo_title' => 'Healthcare Patient Portal Development | Ziibay Soft Portfolio',
                'seo_description' => 'Discover our HIPAA-compliant healthcare patient portal development featuring EHR integration and telehealth capabilities.',
                'canonical_url' => base_url('portfolio/healthcare-patient-portal')
            ],
            [
                'title' => 'Real Estate CRM & Listing Sync',
                'slug' => 'real-estate-crm',
                'client_name' => 'Prime Properties Ltd.',
                'project_type' => 'Software Development',
                'short_description' => 'Automated property listing synchronization across multiple MLS networks with an integrated agent CRM.',
                'description' => 'We developed a custom CRM specifically for high-volume real estate agencies, featuring real-time MLS data synchronization and automated lead scoring.',
                'challenge' => 'Agents were wasting hours manually updating property listings across multiple platforms and losing track of high-value leads in complex spreadsheets.',
                'solution' => 'A centralized CodeIgniter 4 application that pulls from standard RETS/WebAPI feeds and automatically distributes listings. The integrated CRM tracks lead interaction with property alerts.',
                'key_features' => json_encode(['RETS/WebAPI MLS Integration', 'Automated Lead Scoring', 'Interactive Property Maps', 'Agent Performance Dashboards', 'Automated Property Alerts']),
                'results' => "Saved agents an average of 12 hours per week\nIncreased lead conversion by 28%\nCentralized data management",
                'featured_image' => 'assets/images/portfolio/real-estate-featured.jpg',
                'gallery' => json_encode([]),
                'status' => 'published',
                'featured' => 0,
                'sort_order' => 3,
                'seo_title' => 'Real Estate CRM Software Case Study | Ziibay Soft',
                'seo_description' => 'A custom real estate CRM with MLS integration and automated lead scoring developed by Ziibay Soft.',
                'canonical_url' => base_url('portfolio/real-estate-crm')
            ],
        ];

        $db->query('SET FOREIGN_KEY_CHECKS=0');
        $db->table('portfolio_projects')->truncate();
        $db->table('portfolio_services')->truncate();
        $db->table('portfolio_industries')->truncate();
        $db->table('portfolio_technologies')->truncate();
        $db->query('SET FOREIGN_KEY_CHECKS=1');

        $db->table('portfolio_projects')->insertBatch($projects);

        // Fetch inserted project IDs
        $insertedProjects = $db->table('portfolio_projects')->get()->getResultArray();
        $projectMap = [];
        foreach ($insertedProjects as $p) {
            $projectMap[$p['slug']] = $p['id'];
        }

        // Define Pivot Relationships
        $projectServices = [
            'global-ecommerce-platform' => ['web-development', 'seo'],
            'healthcare-patient-portal' => ['software-development', 'app-development'],
            'real-estate-crm' => ['software-development', 'web-development'],
        ];

        $projectIndustries = [
            'global-ecommerce-platform' => ['ecommerce'],
            'healthcare-patient-portal' => ['healthcare'],
            'real-estate-crm' => ['real-estate'],
        ];

        $projectTech = [
            'global-ecommerce-platform' => ['codeigniter-4', 'php', 'react', 'mysql', 'tailwind-css'],
            'healthcare-patient-portal' => ['laravel', 'php', 'javascript', 'mysql'],
            'real-estate-crm' => ['codeigniter-4', 'php', 'mysql', 'javascript', 'html5', 'css3'],
        ];

        // Insert Pivots
        $psData = [];
        foreach ($projectServices as $pSlug => $sSlugs) {
            if (!isset($projectMap[$pSlug])) continue;
            foreach ($sSlugs as $sSlug) {
                if (isset($serviceMap[$sSlug])) {
                    $psData[] = ['portfolio_id' => $projectMap[$pSlug], 'service_id' => $serviceMap[$sSlug]];
                }
            }
        }
        if (!empty($psData)) $db->table('portfolio_services')->ignore(true)->insertBatch($psData);

        $piData = [];
        foreach ($projectIndustries as $pSlug => $iSlugs) {
            if (!isset($projectMap[$pSlug])) continue;
            foreach ($iSlugs as $iSlug) {
                if (isset($industryMap[$iSlug])) {
                    $piData[] = ['portfolio_project_id' => $projectMap[$pSlug], 'industry_id' => $industryMap[$iSlug]];
                }
            }
        }
        if (!empty($piData)) $db->table('portfolio_industries')->ignore(true)->insertBatch($piData);

        $ptData = [];
        foreach ($projectTech as $pSlug => $tSlugs) {
            if (!isset($projectMap[$pSlug])) continue;
            foreach ($tSlugs as $tSlug) {
                if (isset($techMap[$tSlug])) {
                    $ptData[] = ['portfolio_id' => $projectMap[$pSlug], 'technology_id' => $techMap[$tSlug]];
                }
            }
        }
        if (!empty($ptData)) $db->table('portfolio_technologies')->ignore(true)->insertBatch($ptData);

    }
}
