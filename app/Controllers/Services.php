<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;

class Services extends BaseController
{
    public function index()
    {
        $servicesData = $this->getMockServices();
        
        // Group services into categories
        $categories = [
            'Core Development' => [],
            'Digital Growth' => []
        ];

        foreach ($servicesData as $service) {
            $cat = $service['category_name'];
            if (isset($categories[$cat])) {
                $categories[$cat][] = $service;
            }
        }

        $data = [
            'title' => 'Digital Services & Solutions | Ziibay Soft',
            'meta_description' => 'Explore Ziibay Soft\'s digital services. We offer custom Web Development, Software Development, App Development, SEO Services, and Social Media Management.',
            'canonical_url' => url_to('services'),
            'categories' => $categories
        ];

        return view('pages/services_hub', $data);
    }

    public function show($slug)
    {
        $servicesData = $this->getMockServices();

        if (!array_key_exists($slug, $servicesData)) {
            throw PageNotFoundException::forPageNotFound("Service not found: $slug");
        }

        $service = $servicesData[$slug];

        $data = [
            'title' => $service['seo_title'],
            'meta_description' => $service['seo_description'],
            'canonical_url' => url_to('service-detail', $slug),
            'whatsapp_message' => $service['whatsapp_message'],
            'service' => $service,
        ];

        return view('pages/service_detail', $data);
    }

    private function getMockServices(): array
    {
        return [
            'web-development' => [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'category_name' => 'Core Development',
                'category_id' => 1,
                'seo_title' => 'Web Development Services | Ziibay Soft',
                'seo_description' => 'Ziibay Soft provides custom web development services. We build responsive business websites, web applications, and scalable e-commerce platforms.',
                'hero_headline' => 'Custom Web Development',
                'hero_subheadline' => 'Ziibay Soft builds modern, responsive, scalable websites and web applications tailored to business goals.',
                'overview' => 'We engineer high-performance web platforms designed for speed, security, and scalability. From corporate websites to complex e-commerce architectures, we focus on clean code and robust backends.',
                'problem_statement' => 'Off-the-shelf templates and generic builders often result in slow, inflexible websites that fail to rank on search engines or convert users. We build custom solutions free from technological debt.',
                'capabilities' => [
                    ['title' => 'Custom Web Applications', 'desc' => 'Complex business logic transformed into intuitive web-based software.'],
                    ['title' => 'Corporate Websites', 'desc' => 'High-end, performance-optimized marketing sites built to establish trust and generate leads.'],
                    ['title' => 'E-commerce Platforms', 'desc' => 'Scalable storefront architectures capable of handling high traffic and complex product relationships.'],
                    ['title' => 'Frontend Engineering', 'desc' => 'Responsive, accessible, and highly interactive user interfaces using modern JavaScript frameworks.']
                ],
                'tech_tags' => ['PHP', 'React', 'Vue', 'Node.js', 'PostgreSQL', 'Tailwind CSS'],
                'related_services' => [
                    ['name' => 'Software Development', 'slug' => 'software-development'],
                    ['name' => 'SEO Services', 'slug' => 'seo']
                ],
                'faqs' => [
                    ['q' => 'What is custom web development?', 'a' => 'Custom web development involves building a website or web application from the ground up, tailored exactly to your business logic, rather than relying on restrictive pre-built themes.'],
                    ['q' => 'How long does a website project take?', 'a' => 'Timelines depend heavily on scope. A corporate marketing site might take 4-8 weeks, while a complex web application with custom integrations can take 3-6 months. We map this out during the discovery phase.'],
                    ['q' => 'Can a website be redesigned without losing SEO?', 'a' => 'Yes. A critical part of our redesign process is implementing 301 redirect mapping, preserving URL structures where possible, and improving core web vitals to actually boost SEO.'],
                    ['q' => 'Can you integrate APIs?', 'a' => 'Absolutely. We regularly integrate third-party APIs (payment gateways, CRMs, ERPs) into custom web platforms to streamline business operations.']
                ],
                'whatsapp_message' => 'Hello Ziibay Soft, I would like to discuss a web development project.'
            ],

            'software-development' => [
                'name' => 'Software Development',
                'slug' => 'software-development',
                'category_name' => 'Core Development',
                'category_id' => 1,
                'seo_title' => 'Custom Software Development | Ziibay Soft',
                'seo_description' => 'Custom software development for businesses. Ziibay Soft architects SaaS platforms, business management systems, and workflow automation tools.',
                'hero_headline' => 'Custom Software Development',
                'hero_subheadline' => 'Ziibay Soft designs and develops software around real business processes, users, data, and operational requirements.',
                'overview' => 'We bridge the gap between complex business logic and intuitive digital experiences. Our custom software solutions are designed to automate repetitive tasks, centralize scattered data, and scale alongside your business growth.',
                'problem_statement' => 'Businesses often struggle with disconnected tools, manual data entry, and inefficient processes because off-the-shelf software doesn\'t fit their specific workflows. Custom software bridges these gaps, providing a unified system tailored exactly to how you operate.',
                'capabilities' => [
                    ['title' => 'Business Management Systems', 'desc' => 'Internal platforms, CRM/ERP-style systems, and portals designed to streamline operations and centralize reporting.'],
                    ['title' => 'SaaS Platforms', 'desc' => 'Scalable, multi-tenant software-as-a-service architectures built for high availability and secure data segregation.'],
                    ['title' => 'API & Integrations', 'desc' => 'Custom middleware and API development to connect disparate systems and enable seamless data synchronization.'],
                    ['title' => 'Legacy Modernization', 'desc' => 'Upgrading outdated internal systems to cloud-ready architecture without disrupting daily business operations.']
                ],
                'tech_tags' => ['Python', 'PHP', 'Go', 'MySQL', 'Docker', 'AWS'],
                'related_services' => [
                    ['name' => 'Web Development', 'slug' => 'web-development'],
                    ['name' => 'App Development', 'slug' => 'app-development']
                ],
                'faqs' => [
                    ['q' => 'When should a business consider custom software?', 'a' => 'When off-the-shelf solutions require too many workarounds, fail to integrate with existing tools, or become cost-prohibitive as your user base scales.'],
                    ['q' => 'Can existing systems be integrated?', 'a' => 'Yes. We can architect middleware and custom APIs to synchronize data between your new custom software and your existing legacy systems.'],
                    ['q' => 'How is custom software planned?', 'a' => 'We start with a thorough discovery phase, mapping out database schemas, user stories, and wireframes before writing any code.'],
                    ['q' => 'Can software be expanded later?', 'a' => 'Absolutely. We build using modular architecture and clear design patterns, ensuring the software can evolve as your business requirements change.']
                ],
                'whatsapp_message' => 'Hello Ziibay Soft, I would like to discuss a custom software project.'
            ],

            'app-development' => [
                'name' => 'App Development',
                'slug' => 'app-development',
                'category_name' => 'Core Development',
                'category_id' => 1,
                'seo_title' => 'Custom App Development | Ziibay Soft',
                'seo_description' => 'Custom mobile applications for iOS and Android. We build business apps, customer-facing mobile apps, and robust API backends.',
                'hero_headline' => 'Custom App Development',
                'hero_subheadline' => 'Build mobile experiences that connect users, services, and business workflows through thoughtfully designed applications.',
                'overview' => 'We engineer high-performance mobile applications that deliver native-like experiences. From consumer-facing iOS apps to internal workforce Android tools, we focus on responsive UI, secure data handling, and seamless backend integration.',
                'problem_statement' => 'A poorly optimized mobile experience leads to user frustration and high abandonment rates. We ensure your app is built with optimal performance, intuitive navigation, and reliable offline capabilities where necessary.',
                'capabilities' => [
                    ['title' => 'iOS & Android Development', 'desc' => 'Engineering robust mobile applications tailored specifically for the Apple and Google ecosystems.'],
                    ['title' => 'Cross-Platform Solutions', 'desc' => 'Utilizing modern frameworks to deploy to multiple platforms from a single codebase without sacrificing performance.'],
                    ['title' => 'Backend & API Integration', 'desc' => 'Architecting secure server-side infrastructure to handle authentication, data synchronization, and business logic.'],
                    ['title' => 'Mobile UI/UX Design', 'desc' => 'Crafting intuitive touch-interfaces adhering strictly to platform-specific human interface guidelines.']
                ],
                'tech_tags' => ['React Native', 'Flutter', 'Swift', 'Kotlin', 'Firebase'],
                'related_services' => [
                    ['name' => 'Software Development', 'slug' => 'software-development'],
                    ['name' => 'Web Development', 'slug' => 'web-development']
                ],
                'faqs' => [
                    ['q' => 'Should a business build iOS and Android apps?', 'a' => 'It depends on your target audience. However, using cross-platform frameworks often allows us to deploy to both platforms simultaneously, optimizing your budget.'],
                    ['q' => 'Can a mobile app connect to an existing backend?', 'a' => 'Yes. If your backend exposes a secure API (REST or GraphQL), our mobile applications can interface with it perfectly.'],
                    ['q' => 'What happens after launch?', 'a' => 'We offer ongoing maintenance contracts to handle OS updates, security patches, and iterative feature development.'],
                    ['q' => 'How should an app be planned?', 'a' => 'App planning requires deep focus on user journeys. We start with wireframing and prototyping to ensure the UI is intuitive before development begins.']
                ],
                'whatsapp_message' => 'Hello Ziibay Soft, I would like to discuss an app development project.'
            ],

            'seo' => [
                'name' => 'SEO Services',
                'slug' => 'seo',
                'category_name' => 'Digital Growth',
                'category_id' => 2,
                'seo_title' => 'SEO Services | Technical, On-Page & International SEO | Ziibay Soft',
                'seo_description' => 'Professional SEO services focusing on technical foundation, on-page optimization, content strategy, and structural site architecture for genuine search visibility.',
                'hero_headline' => 'SEO Services for Search-Friendly, High-Quality Websites',
                'hero_subheadline' => 'Ziibay Soft approaches SEO from both technical and content perspectives, helping websites build a strong foundation for search visibility.',
                'overview' => 'We focus on building search engine optimization into the core architecture of your digital presence. Rather than relying on superficial tricks, we ensure your technical infrastructure is flawless, your site architecture is logical, and your content accurately serves user search intent.',
                'problem_statement' => 'Many businesses struggle to gain organic visibility because their websites suffer from fundamental technical flaws, poor crawlability, or content that misaligns with what users actually search for. A beautiful website is ineffective if search engines cannot understand it.',
                'capabilities' => [
                    ['title' => 'Technical SEO', 'desc' => 'Optimizing crawlability, indexability, XML sitemaps, structured data (JSON-LD), URL architecture, HTTP status codes, and Core Web Vitals.'],
                    ['title' => 'On-Page SEO', 'desc' => 'Strategic implementation of title tags, meta descriptions, semantic heading structures, and contextually rich internal linking.'],
                    ['title' => 'Keyword & Search Intent Research', 'desc' => 'Identifying queries based on business value, geographic intent, and topical relationships rather than just search volume.'],
                    ['title' => 'International & Local SEO', 'desc' => 'Architecting hreflang implementations for global reach, and optimizing local search signals for regional visibility.']
                ],
                'tech_tags' => ['Technical Audits', 'Schema.org', 'Core Web Vitals', 'Search Intent', 'Internal Linking'],
                'related_services' => [
                    ['name' => 'Web Development', 'slug' => 'web-development'],
                    ['name' => 'Social Media Management', 'slug' => 'social-media-management']
                ],
                'faqs' => [
                    ['q' => 'What is technical SEO?', 'a' => 'Technical SEO involves optimizing your website\'s infrastructure so search engines can easily crawl and index your content. It includes fixing broken links, improving site speed, managing redirects, and implementing structured data.'],
                    ['q' => 'Can SEO guarantee Google rankings?', 'a' => 'No reputable agency can guarantee #1 rankings. Search algorithms are complex and dynamic. We guarantee adherence to search engine guidelines, technical excellence, and data-driven strategies.'],
                    ['q' => 'What is an SEO audit?', 'a' => 'An SEO audit is a comprehensive evaluation of a website\'s technical health, on-page elements, content quality, and backlink profile to identify issues preventing organic visibility.'],
                    ['q' => 'How long does SEO take?', 'a' => 'Results vary heavily based on your site\'s history, existing authority, competition, and the quality of implementation. Foundational technical fixes can show results in weeks, while competitive content strategies often take 3-6 months to gain momentum.']
                ],
                'whatsapp_message' => 'Hello Ziibay Soft, I would like to discuss SEO services.'
            ],

            'social-media-management' => [
                'name' => 'Social Media Management',
                'slug' => 'social-media-management',
                'category_name' => 'Digital Growth',
                'category_id' => 2,
                'seo_title' => 'Social Media Management | Ziibay Soft',
                'seo_description' => 'Professional social media management services. Strategic content planning, community engagement, and brand consistency across core platforms.',
                'hero_headline' => 'Social Media Management for Consistent, Strategic Brand Growth',
                'hero_subheadline' => 'Build and manage your brand presence with strategic planning, disciplined content calendars, and active community engagement.',
                'overview' => 'We help businesses maintain a professional, consistent, and engaging presence across key social networks. Our management focuses on aligning social output with your core business objectives, ensuring brand consistency, and fostering genuine community relationships.',
                'problem_statement' => 'Inconsistent posting, lack of strategy, and poor engagement can dilute a brand\'s professional image. Companies often lack the internal bandwidth to plan, create, and monitor social content effectively.',
                'capabilities' => [
                    ['title' => 'Social Media Strategy', 'desc' => 'Aligning platform selection, audience research, and content pillars with your overarching business objectives.'],
                    ['title' => 'Content Planning & Publishing', 'desc' => 'Developing disciplined content calendars and managing the logistics of multi-platform distribution.'],
                    ['title' => 'Community Management', 'desc' => 'Monitoring interactions, responding to engagement, and fostering a positive brand reputation.'],
                    ['title' => 'Performance Analytics', 'desc' => 'Tracking meaningful metrics like reach, engagement rates, and website traffic to continuously refine strategy.']
                ],
                'tech_tags' => ['Content Strategy', 'Brand Consistency', 'LinkedIn', 'Instagram', 'Analytics'],
                'related_services' => [
                    ['name' => 'SEO Services', 'slug' => 'seo'],
                    ['name' => 'Web Development', 'slug' => 'web-development']
                ],
                'faqs' => [
                    ['q' => 'What does social media management include?', 'a' => 'It typically includes strategy development, content calendar creation, publishing, community monitoring, and performance reporting. It ensures your brand remains active and professional.'],
                    ['q' => 'Which platforms can be managed?', 'a' => 'We tailor platform selection to your audience. We commonly manage LinkedIn for B2B, and Instagram, Facebook, or X for broader consumer engagement.'],
                    ['q' => 'How is a content strategy developed?', 'a' => 'We start with brand discovery and audience research, defining content pillars that balance educational, promotional, and engaging formats.'],
                    ['q' => 'Do you guarantee follower growth?', 'a' => 'We do not promise artificial viral growth or guaranteed follower counts. We focus on consistent, high-quality content designed to attract a genuine and relevant audience over time.']
                ],
                'whatsapp_message' => 'Hello Ziibay Soft, I would like to discuss social media management.'
            ]
        ];
    }
}
