<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CaseStudySeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();
        
        // Ensure we have a portfolio project to link to
        $project = $db->table('portfolio_projects')->where('slug', 'global-ecommerce-platform')->get()->getRowArray();
        
        $caseStudies = [
            [
                'portfolio_project_id' => $project ? $project['id'] : null,
                'title' => 'E-commerce Platform Transformation',
                'slug' => 'ecommerce-platform-transformation',
                'excerpt' => 'How we engineered a high-performance headless e-commerce architecture to solve cart abandonment and inventory sync challenges.',
                'client_name' => 'Confidential Client',
                'description' => 'Our client, a major international retailer, was experiencing critical bottlenecks during high-traffic events like Black Friday. We architected a headless e-commerce platform that separated their frontend presentation from their complex inventory backend, resulting in a dramatic performance increase.',
                'goals' => json_encode(['Improve page load times under heavy traffic', 'Centralize inventory management across 4 global regions', 'Create a scalable headless architecture', 'Reduce cart abandonment rates']),
                'challenge' => 'The legacy monolithic platform was tightly coupled. Any update to the product catalog required clearing the entire application cache, causing 5-10 second page loads during peak hours. Furthermore, inventory was managed in three different legacy databases, leading to overselling and canceled orders.',
                'discovery' => 'During our 4-week discovery phase, we mapped out the data flow between the client\'s ERP, their warehousing partners, and the frontend. We found that 60% of database queries on the homepage were entirely redundant.',
                'strategy' => 'We proposed migrating to a headless architecture using a Next.js frontend communicating with a CodeIgniter 4 API gateway. This allowed us to cache the frontend extensively at the edge (CDN) while keeping inventory checks strictly isolated to the checkout flow.',
                'solution' => 'By implementing a microservices-inspired architecture, we isolated the product catalog, user authentication, and order processing. CodeIgniter 4 was used to build a lightning-fast RESTful API that aggregates data from their legacy systems and caches it using Redis.',
                'implementation' => 'The frontend was built with React/Next.js and styled with Tailwind CSS. The backend utilizes PHP 8 and CodeIgniter 4, interacting with a master MySQL database. We implemented RabbitMQ to handle order processing asynchronously, meaning the user never has to wait for the ERP to respond to complete their checkout.',
                'key_features' => json_encode([
                    'Headless React Frontend',
                    'Asynchronous Order Queue (RabbitMQ)',
                    'Edge Caching (Cloudflare)',
                    'Real-time Inventory Sync API',
                    'Custom JWT Authentication'
                ]),
                'results' => "Load time decreased from 4.8s to 0.9s\nCart abandonment reduced by 45%\nZero overselling incidents during Black Friday\n200% improvement in mobile conversion rate",
                'lessons' => 'The biggest challenge was migrating legacy user passwords without requiring a mandatory password reset. We solved this by implementing a dual-hashing strategy that silently upgrades hashes upon user login.',
                'testimonial' => json_encode([
                    'quote' => 'Ziibay Soft completely transformed our digital infrastructure. For the first time in 5 years, our site didn\'t crash on Black Friday.',
                    'client_name' => 'John Doe',
                    'client_role' => 'CTO',
                    'company' => 'Global Retailer'
                ]),
                'featured_image' => 'assets/images/case-studies/ecommerce-hero.jpg',
                'gallery' => json_encode(['assets/images/case-studies/arch-diagram.jpg']),
                'status' => 'published',
                'featured' => 1,
                'indexable' => 1,
                'sort_order' => 1,
                'seo_title' => 'E-commerce Platform Case Study | Ziibay Soft',
                'seo_description' => 'Read our detailed case study on how we built a scalable headless e-commerce architecture to reduce load times and cart abandonment.',
                'canonical_url' => base_url('case-studies/ecommerce-platform-transformation'),
                'published_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $db->query('SET FOREIGN_KEY_CHECKS=0');
        $db->table('case_studies')->truncate();
        $db->table('case_study_services')->truncate();
        $db->table('case_study_industries')->truncate();
        $db->table('case_study_technologies')->truncate();
        $db->query('SET FOREIGN_KEY_CHECKS=1');

        $db->table('case_studies')->insertBatch($caseStudies);

        // Fetch inserted case study
        $cs = $db->table('case_studies')->where('slug', 'ecommerce-platform-transformation')->get()->getRowArray();
        
        if ($cs) {
            // Map Services (Web Development, SEO)
            $services = $db->table('services')->whereIn('slug', ['web-development', 'seo'])->get()->getResultArray();
            $csServices = [];
            foreach ($services as $s) {
                $csServices[] = ['case_study_id' => $cs['id'], 'service_id' => $s['id']];
            }
            if ($csServices) $db->table('case_study_services')->insertBatch($csServices);

            // Map Industries (E-commerce)
            $industries = $db->table('industries')->whereIn('slug', ['ecommerce'])->get()->getResultArray();
            $csIndustries = [];
            foreach ($industries as $i) {
                $csIndustries[] = ['case_study_id' => $cs['id'], 'industry_id' => $i['id']];
            }
            if ($csIndustries) $db->table('case_study_industries')->insertBatch($csIndustries);

            // Map Technologies (CodeIgniter 4, PHP, React)
            $technologies = $db->table('technologies')->whereIn('slug', ['codeigniter-4', 'php', 'react', 'mysql'])->get()->getResultArray();
            $csTech = [];
            foreach ($technologies as $t) {
                $csTech[] = ['case_study_id' => $cs['id'], 'technology_id' => $t['id']];
            }
            if ($csTech) $db->table('case_study_technologies')->insertBatch($csTech);
        }
    }
}
