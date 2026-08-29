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

    public function privacy()
    {
        $data = [
            'title' => 'Privacy Policy',
            'meta_description' => 'Read the Ziibay Soft privacy policy to understand how we collect, use, and protect your personal information.',
            'canonical_url' => base_url('privacy'),
            'robots' => 'index, follow',
            'legal_updated' => 'August 2026',
            'legal_sections' => [
                [
                    'heading' => 'Information We Collect',
                    'body' => 'When you use our website or contact us, we may collect the information you provide directly, such as your name, email address, phone number, and project details submitted through our forms. We also collect standard technical information such as IP address, browser type, and pages visited, which helps us operate and secure the website.',
                ],
                [
                    'heading' => 'How We Use Your Information',
                    'body' => 'We use your information to respond to inquiries, prepare proposals, deliver our services, and improve our website. We do not sell personal information to third parties. Information is only shared with processors who help us operate our business under appropriate safeguards.',
                ],
                [
                    'heading' => 'Cookies',
                    'body' => 'Our website may use cookies or similar technologies to remember preferences such as your display theme. You can control cookies through your browser settings.',
                ],
                [
                    'heading' => 'Data Retention',
                    'body' => 'We keep personal information only as long as needed to fulfil the purposes described in this policy, comply with legal obligations, and resolve disputes.',
                ],
                [
                    'heading' => 'Your Rights',
                    'body' => 'Depending on your location, you may have the right to access, correct, or request deletion of your personal information. To exercise these rights, contact us using the details on our contact page.',
                ],
                [
                    'heading' => 'Changes to This Policy',
                    'body' => 'We may update this policy from time to time. The latest version will always be available on this page.',
                ],
            ],
        ];

        return view('pages/legal', $data);
    }

    public function terms()
    {
        $data = [
            'title' => 'Terms of Service',
            'meta_description' => 'Review the terms and conditions that govern your use of the Ziibay Soft website and services.',
            'canonical_url' => base_url('terms'),
            'robots' => 'index, follow',
            'legal_updated' => 'August 2026',
            'legal_sections' => [
                [
                    'heading' => 'Acceptance of Terms',
                    'body' => 'By accessing or using this website, you agree to these terms. If you do not agree, please do not use the website.',
                ],
                [
                    'heading' => 'Our Services',
                    'body' => 'Ziibay Soft provides web development, software development, app development, SEO, and social media management services. Specific deliverables, timelines, and fees for any engagement are confirmed in a written agreement before work begins.',
                ],
                [
                    'heading' => 'Use of This Website',
                    'body' => 'You agree to use this website only for lawful purposes. You must not attempt to interfere with the operation of the website, access data that is not intended for you, or submit false or misleading information.',
                ],
                [
                    'heading' => 'Intellectual Property',
                    'body' => 'The content on this website, including text, graphics, and code, is owned by Ziibay Soft or its licensors and is protected by applicable intellectual property laws. You may not copy or distribute it without permission.',
                ],
                [
                    'heading' => 'Limitation of Liability',
                    'body' => 'The website and its content are provided on an "as is" basis. To the maximum extent permitted by law, Ziibay Soft is not liable for indirect or consequential losses arising from use of this website.',
                ],
                [
                    'heading' => 'Changes to These Terms',
                    'body' => 'We may revise these terms from time to time. Continued use of the website after changes are posted constitutes acceptance of the revised terms.',
                ],
            ],
        ];

        return view('pages/legal', $data);
    }
}
