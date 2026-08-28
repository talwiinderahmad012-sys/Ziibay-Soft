<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= url_to('home') ?></loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?= url_to('about') ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= url_to('services') ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>
    <url>
        <loc><?= url_to('industries') ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?= url_to('contact') ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>

    <?php foreach($services as $service): ?>
    <url>
        <loc><?= url_to('service-detail', $service['slug']) ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.9</priority>
    </url>
    <?php endforeach; ?>

    <?php if(isset($industries)): foreach($industries as $industry): ?>
    <url>
        <loc><?= url_to('industry-detail', $industry['slug']) ?></loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; endif; ?>

    <?php if (isset($projects)): ?>
    <!-- Portfolio -->
    <url>
        <loc><?= base_url('portfolio') ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php foreach ($projects as $project): ?>
        <url>
            <loc><?= base_url('portfolio/' . esc($project['slug'])) ?></loc>
            <lastmod><?= date('c', strtotime($project['updated_at'] ?? $project['created_at'])) ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    <?php endforeach; ?>
    <?php endif; ?>

    <?php if (isset($caseStudies)): ?>
    <!-- Case Studies -->
    <url>
        <loc><?= base_url('case-studies') ?></loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php foreach ($caseStudies as $cs): ?>
        <url>
            <loc><?= base_url('case-studies/' . esc($cs['slug'])) ?></loc>
            <lastmod><?= date('c', strtotime($cs['updated_at'] ?? $cs['created_at'])) ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    <?php endforeach; ?>
    <?php endif; ?>

    <?php if (isset($blogPosts)): ?>
    <!-- Blog Posts -->
    <url>
        <loc><?= base_url('blog') ?></loc>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    <?php foreach ($blogPosts as $bp): ?>
        <url>
            <loc><?= base_url('blog/' . esc($bp['slug'])) ?></loc>
            <lastmod><?= date('c', strtotime($bp['updated_at'] ?? $bp['published_at'])) ?></lastmod>
            <changefreq>monthly</changefreq>
            <priority>0.7</priority>
        </url>
    <?php endforeach; ?>
    <?php endif; ?>

</urlset>
