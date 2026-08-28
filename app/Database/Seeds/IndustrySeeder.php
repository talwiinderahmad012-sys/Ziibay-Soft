<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class IndustrySeeder extends Seeder
{
    public function run()
    {
        $industries = [
            [
                'name'              => 'E-commerce',
                'slug'              => 'ecommerce',
                'short_description' => 'Robust, high-performance digital platforms designed for the retail landscape to handle high transaction volumes and sensitive data.',
                'description'       => 'The retail landscape requires robust, scalable, and secure platforms to handle high transaction volumes and sensitive customer data.',
                'challenges'        => "Managing inventory across multiple channels\nPreventing cart abandonment due to slow load times\nEnsuring PCI compliance during checkout\nMobile shopping experiences\nIntegrations with third-party logistics",
                'solutions'         => json_encode(['Headless e-commerce platforms', 'Custom product configuration portals', 'Inventory management integrations', 'Secure payment gateway APIs']),
                'status'            => 'published',
                'icon'              => 'fa-solid fa-cart-shopping',
                'sort_order'        => 1,
                'seo_title'         => 'E-commerce Web & Software Solutions | Ziibay Soft',
                'seo_description'   => 'Custom digital solutions designed for the E-commerce sector by Ziibay Soft. Explore headless commerce, integrations, and mobile shopping solutions.',
            ],
            [
                'name'              => 'Healthcare',
                'slug'              => 'healthcare',
                'short_description' => 'Uncompromising security, strict compliance, and intuitive interfaces for healthcare practitioners and patients.',
                'description'       => 'Healthcare technology demands uncompromising security, strict compliance, and intuitive interfaces for both practitioners and patients.',
                'challenges'        => "Privacy-aware systems and compliance\nAppointment workflows\nPatient-facing experiences\nSecure software architecture\nAccessibility\nMobile experiences",
                'solutions'         => json_encode(['Telehealth application development', 'Secure patient portals', 'Electronic Health Record (EHR) integrations', 'Appointment scheduling systems']),
                'status'            => 'published',
                'icon'              => 'fa-solid fa-heart-pulse',
                'sort_order'        => 2,
                'seo_title'         => 'Healthcare Software & Web Development | Ziibay Soft',
                'seo_description'   => 'Secure software architecture and digital workflows for the healthcare industry. Discover patient-facing experiences and modern infrastructure solutions.',
            ],
            [
                'name'              => 'Education & E-learning',
                'slug'              => 'education',
                'short_description' => 'Accessible digital learning environments, student management systems, and virtual classrooms.',
                'description'       => 'Modern education relies heavily on accessible digital learning environments, student management systems, and virtual classrooms.',
                'challenges'        => "Learning platforms accessibility\nStudent portals and engagement\nCourse systems and video scaling\nDashboards for grading\nMobile learning",
                'solutions'         => json_encode(['Learning Management Systems (LMS)', 'Student portals and dashboards', 'Virtual classroom integrations', 'Automated grading workflows']),
                'status'            => 'published',
                'icon'              => 'fa-solid fa-graduation-cap',
                'sort_order'        => 3,
                'seo_title'         => 'Education Software Development & E-learning | Ziibay Soft',
                'seo_description'   => 'Custom e-learning platforms, student portals, and educational software development for modern educational institutions.',
            ],
            [
                'name'              => 'Real Estate',
                'slug'              => 'real-estate',
                'short_description' => 'Data-accurate platforms with rich media presentation and seamless agent-buyer communication workflows.',
                'description'       => 'The real estate sector thrives on data accuracy, rich media presentation, and seamless communication between agents and buyers.',
                'challenges'        => "Property listings management\nLead capture\nSearch and filtering capabilities\nLocation-based discovery\nCRM integrations",
                'solutions'         => json_encode(['Property listing platforms', 'Custom CRM software for agents', 'MLS API integrations', 'Virtual tour web applications']),
                'status'            => 'published',
                'icon'              => 'fa-solid fa-building',
                'sort_order'        => 4,
                'seo_title'         => 'Real Estate Web & Software Development | Ziibay Soft',
                'seo_description'   => 'Digital solutions for real estate companies. Discover property listing platforms, CRM integrations, and lead capture websites.',
            ],
            [
                'name'              => 'Finance & FinTech',
                'slug'              => 'finance',
                'short_description' => 'High-performance, secure digital platforms tailored for financial institutions and innovative FinTech startups.',
                'description'       => 'Financial technology requires absolute data integrity, fault-tolerant infrastructure, and real-time processing capabilities.',
                'challenges'        => "Strict regulatory compliance\nLegacy core banking system integrations\nMitigating cyber threats\nData integrity and fault tolerance",
                'solutions'         => json_encode(['Secure financial portals', 'Payment processing gateways', 'Automated trading dashboards', 'Compliance-ready infrastructure']),
                'status'            => 'published',
                'icon'              => 'fa-solid fa-chart-line',
                'sort_order'        => 5,
                'seo_title'         => 'FinTech Software Development | Ziibay Soft',
                'seo_description'   => 'Secure, scalable software engineering for financial services and FinTech startups by Ziibay Soft.',
            ],
            [
                'name'              => 'SaaS & Technology',
                'slug'              => 'saas',
                'short_description' => 'Custom SaaS platforms and engineering support for technology-first organizations.',
                'description'       => 'Software as a Service (SaaS) products require highly optimized onboarding flows, robust multi-tenant architectures, and reliable API endpoints.',
                'challenges'        => "Marketing websites that convert\nDashboards and data visualization\nOnboarding friction\nAPIs and integrations\nProduct experiences",
                'solutions'         => json_encode(['Marketing websites', 'Robust admin dashboards', 'API development', 'Complete product engineering']),
                'status'            => 'published',
                'icon'              => 'fa-solid fa-cloud',
                'sort_order'        => 6,
                'seo_title'         => 'SaaS Product Development & Web Services | Ziibay Soft',
                'seo_description'   => 'End-to-end product development and digital marketing solutions for SaaS and technology companies.',
            ]
        ];

        // Delete existing industries first to replace them cleanly
        // Disable foreign key checks, truncate, enable
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $this->db->table('industries')->truncate();
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');
        
        $this->db->table('industries')->insertBatch($industries);
    }
}
