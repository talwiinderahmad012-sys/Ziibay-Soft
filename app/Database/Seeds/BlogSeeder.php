<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run()
    {
        $this->db->query('SET FOREIGN_KEY_CHECKS=0');
        $this->db->table('blog_posts')->truncate();
        $this->db->table('blog_categories')->truncate();
        $this->db->table('blog_tags')->truncate();
        $this->db->table('blog_post_tags')->truncate();
        $this->db->table('blog_post_services')->truncate();
        $this->db->table('blog_post_industries')->truncate();
        $this->db->table('blog_post_technologies')->truncate();
        $this->db->table('blog_post_related')->truncate();
        // Don't truncate team_members, just insert one if none exist.
        $this->db->query('SET FOREIGN_KEY_CHECKS=1');

        // 1. Author
        $authorId = 1;
        $author = $this->db->table('team_members')->where('id', $authorId)->get()->getRowArray();
        if (!$author) {
            $this->db->table('team_members')->insert([
                'id' => $authorId,
                'name' => 'Jane Doe',
                'slug' => 'jane-doe',
                'role_title' => 'Senior Technical Writer',
                'short_bio' => 'Technical content specialist with 8 years of experience in web architecture.',
                'status' => 'published',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        // 2. Categories
        $categories = [
            [
                'id' => 1,
                'name' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'Guides, best practices, and insights on modern web development architecture.',
                'status' => 'published',
                'seo_title' => 'Web Development Articles | Ziibay Soft',
                'meta_description' => 'Expert articles on modern web development, headless architecture, and frontend performance.',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => 2,
                'name' => 'SEO',
                'slug' => 'seo',
                'description' => 'Technical SEO strategies for enterprise and scalable applications.',
                'status' => 'published',
                'seo_title' => 'Technical SEO Insights | Ziibay Soft',
                'meta_description' => 'Read our latest insights on technical SEO, site architecture, and search visibility.',
                'created_at' => date('Y-m-d H:i:s'),
            ]
        ];
        $this->db->table('blog_categories')->insertBatch($categories);

        // 3. Tags
        $tags = [
            ['id' => 1, 'name' => 'CodeIgniter', 'slug' => 'codeigniter', 'indexable' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'Performance', 'slug' => 'performance', 'indexable' => 1, 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 3, 'name' => 'Architecture', 'slug' => 'architecture', 'indexable' => 0, 'created_at' => date('Y-m-d H:i:s')],
        ];
        $this->db->table('blog_tags')->insertBatch($tags);

        // 4. Services (Mock Check)
        $serviceId = 1;
        $service = $this->db->table('services')->where('slug', 'web-development')->get()->getRowArray();
        if ($service) {
            $serviceId = $service['id'];
        }

        // 5. Industries (Mock Check)
        $industryId = 1;
        $industry = $this->db->table('industries')->where('slug', 'ecommerce')->get()->getRowArray();
        if ($industry) {
            $industryId = $industry['id'];
        }

        // 6. Posts
        $posts = [
            [
                'id' => 1,
                'category_id' => 1,
                'author_id' => $authorId,
                'title' => 'How to Plan a Business Website Before Development',
                'slug' => 'how-to-plan-a-business-website',
                'excerpt' => 'Planning a business website requires more than just choosing a CMS. Discover our architecture checklist for scalable business applications.',
                'content' => '<p>Building a successful business website requires a solid architectural foundation. Before writing a single line of code, technical leaders must establish clear requirements for hosting, data models, and API integrations.</p><h2>1. Define Your Architecture</h2><p>Choosing between a monolithic architecture (like traditional WordPress) and a decoupled headless approach (like Next.js + CodeIgniter API) determines your scalability limit.</p><blockquote>"The cost of fixing an architectural mistake in production is 100x higher than fixing it during the planning phase."</blockquote><h2>2. Code Example</h2><pre><code class="language-php">class ArchitecturePlanner {
    public function evaluate(Project $project) {
        if ($project->expectedTraffic > 100000) {
            return new HeadlessArchitecture();
        }
        return new MonolithArchitecture();
    }
}</code></pre><p>This simple logic highlights that traffic expectations should heavily influence your technical stack.</p>',
                'featured_image' => 'assets/images/blog/planning-website.jpg',
                'status' => 'published',
                'featured' => 1,
                'indexable' => 1,
                'published_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'seo_title' => 'How to Plan a Business Website | Ziibay Soft',
                'meta_description' => 'A complete guide to planning a business website architecture for performance and scalability.',
                'canonical_url' => base_url('blog/how-to-plan-a-business-website')
            ],
            [
                'id' => 2,
                'category_id' => 2,
                'author_id' => $authorId,
                'title' => 'Technical SEO Checklist for New Websites',
                'slug' => 'technical-seo-checklist-new-websites',
                'excerpt' => 'Ensure your new web application is fully optimized for search engines with our comprehensive technical SEO checklist.',
                'content' => '<p>Technical SEO is the foundation of digital growth. If search engines cannot efficiently crawl, render, and index your application, the highest quality content will not perform.</p><h2>1. Canonicalization</h2><p>Every page must have a single canonical URL. This prevents duplicate content issues from query parameters and trailing slashes.</p><h2>2. Core Web Vitals</h2><p>Performance is a ranking factor. Focus on LCP (Largest Contentful Paint), FID (First Input Delay), and CLS (Cumulative Layout Shift).</p>',
                'featured_image' => 'assets/images/blog/seo-checklist.jpg',
                'status' => 'published',
                'featured' => 0,
                'indexable' => 1,
                'published_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'seo_title' => 'Technical SEO Checklist 2026 | Ziibay Soft',
                'meta_description' => 'The ultimate technical SEO checklist for launching a new website or web application.',
                'canonical_url' => base_url('blog/technical-seo-checklist-new-websites')
            ]
        ];
        $this->db->table('blog_posts')->insertBatch($posts);

        // 7. Relationships
        $this->db->table('blog_post_tags')->insertBatch([
            ['post_id' => 1, 'tag_id' => 3],
            ['post_id' => 2, 'tag_id' => 2],
        ]);

        if ($serviceId) {
            $this->db->table('blog_post_services')->insertBatch([
                ['post_id' => 1, 'service_id' => $serviceId],
            ]);
        }

        if ($industryId) {
            $this->db->table('blog_post_industries')->insertBatch([
                ['post_id' => 1, 'industry_id' => $industryId],
            ]);
        }

        $this->db->table('blog_post_related')->insertBatch([
            ['post_id' => 1, 'related_post_id' => 2],
            ['post_id' => 2, 'related_post_id' => 1],
        ]);
    }
}
