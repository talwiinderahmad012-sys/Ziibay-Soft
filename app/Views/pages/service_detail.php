<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "<?= esc($service['name']) ?>",
  "provider": {
    "@type": "Organization",
    "name": "Ziibay Soft"
  },
  "description": "<?= esc($meta_description) ?>"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "<?= url_to('home') ?>"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "Services",
    "item": "<?= url_to('services') ?>"
  },{
    "@type": "ListItem",
    "position": 3,
    "name": "<?= esc($service['name']) ?>"
  }]
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. Breadcrumb -->
<div class="bg-surface border-b border-border py-4">
    <div class="container mx-auto">
        <nav aria-label="Breadcrumb" class="text-sm text-text-muted flex items-center space-x-2">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span>/</span>
            <a href="<?= url_to('services') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Services</a>
            <span>/</span>
            <span class="text-text font-medium" aria-current="page"><?= esc($service['name']) ?></span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-20 pb-24 overflow-hidden">
    <!-- Abstract Glow Background -->
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/10 to-transparent pointer-events-none"></div>
    <div class="container mx-auto relative z-10">
        <div class="max-w-3xl">
            <h1 class="h1 text-text mb-6"><?= esc($service['hero_headline']) ?></h1>
            <p class="text-body text-xl mb-10 leading-relaxed text-text-muted">
                <?= esc($service['hero_subheadline']) ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="<?= base_url('contact?service=' . esc($service['slug'])) ?>" class="btn-primary py-4 px-8 text-base glow-primary">Get a Free Consultation</a>
                <a href="#process" class="btn-secondary py-4 px-8 text-base">Explore Our Process</a>
            </div>
        </div>
    </div>
</section>

<!-- 3. Service Overview & Problem -->
<section class="py-24 bg-surface/50 border-y border-border">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="h2 text-text mb-6">Overview</h2>
                <p class="text-body mb-6 leading-relaxed">
                    <?= esc($service['overview']) ?>
                </p>
            </div>
            <div class="glass-panel p-8 rounded-2xl border-l-4 border-l-primary">
                <h3 class="h4 text-text mb-4">The Challenge</h3>
                <p class="text-small leading-relaxed">
                    <?= esc($service['problem_statement']) ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 4. What We Build (Capabilities) -->
<section class="py-24">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="h2 text-text mb-4">Core Capabilities</h2>
            <p class="text-body max-w-2xl mx-auto">Specific solutions engineered under our <?= esc(strtolower($service['name'])) ?> practice.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <?php foreach($service['capabilities'] as $cap): ?>
            <div class="glass-panel p-8 rounded-2xl hover:-translate-y-1 transition-transform duration-300">
                <h3 class="text-xl font-bold text-text mb-3 flex items-center">
                    <svg class="w-5 h-5 text-primary mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                    <?= esc($cap['title']) ?>
                </h3>
                <p class="text-small pl-8"><?= esc($cap['desc']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 5. Service Comparison (Global Block) -->
<section class="py-24 bg-surface border-y border-border">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="h2 text-text mb-4">Choosing the Right Solution</h2>
            <p class="text-body max-w-2xl mx-auto">Understanding the distinction between our core service pillars.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-xl border <?= $service['slug'] === 'web-development' ? 'border-primary bg-primary/5' : 'border-border bg-surface' ?>">
                <h4 class="text-lg font-bold text-text mb-2">Web Development</h4>
                <p class="text-sm text-text-muted">Best for public-facing websites, corporate portals, e-commerce, and browser-based experiences designed to capture leads or drive online sales.</p>
            </div>
            <div class="p-6 rounded-xl border <?= $service['slug'] === 'software-development' ? 'border-primary bg-primary/5' : 'border-border bg-surface' ?>">
                <h4 class="text-lg font-bold text-text mb-2">Software Development</h4>
                <p class="text-sm text-text-muted">Best for complex internal business systems, automated workflows, SaaS platforms, and custom data management tools.</p>
            </div>
            <div class="p-6 rounded-xl border <?= $service['slug'] === 'app-development' ? 'border-primary bg-primary/5' : 'border-border bg-surface' ?>">
                <h4 class="text-lg font-bold text-text mb-2">App Development</h4>
                <p class="text-sm text-text-muted">Best for mobile-first experiences targeting smartphones and tablets, requiring native hardware access, offline capabilities, or push notifications.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Development Approach (Process) -->
<section id="process" class="py-24">
    <div class="container mx-auto">
        <div class="mb-16">
            <h2 class="h2 text-text mb-4">Development Process</h2>
            <p class="text-body max-w-2xl">How we execute <?= esc(strtolower($service['name'])) ?> projects.</p>
        </div>

        <div class="space-y-6">
            <!-- Process Steps -->
            <div class="flex flex-col md:flex-row gap-6 items-start">
                <div class="w-12 h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold shrink-0 border border-primary/30">01</div>
                <div class="glass-panel p-6 rounded-xl flex-grow">
                    <h4 class="text-text font-bold mb-2">Discovery & Requirements</h4>
                    <p class="text-small">We analyze your business objectives, target audience, and technical constraints to define the project scope accurately.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-6 items-start">
                <div class="w-12 h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold shrink-0 border border-primary/30">02</div>
                <div class="glass-panel p-6 rounded-xl flex-grow">
                    <h4 class="text-text font-bold mb-2">Architecture & UX Planning</h4>
                    <p class="text-small">Mapping out the database schema, system architecture, API endpoints, and user interface wireframes.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-6 items-start">
                <div class="w-12 h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold shrink-0 border border-primary/30">03</div>
                <div class="glass-panel p-6 rounded-xl flex-grow">
                    <h4 class="text-text font-bold mb-2">Development & Integration</h4>
                    <p class="text-small">Agile development sprints utilizing modern frameworks, writing clean code, and integrating necessary third-party systems.</p>
                </div>
            </div>
            <div class="flex flex-col md:flex-row gap-6 items-start">
                <div class="w-12 h-12 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold shrink-0 border border-primary/30">04</div>
                <div class="glass-panel p-6 rounded-xl flex-grow">
                    <h4 class="text-text font-bold mb-2">Testing, Deployment & Support</h4>
                    <p class="text-small">Rigorous QA testing, secure deployment to production servers, and ongoing maintenance SLAs to ensure long-term stability.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 7. Technology Stack -->
<section class="py-24 bg-surface/50 border-y border-border">
    <div class="container mx-auto">
        <h2 class="h3 text-text mb-8 text-center">Technologies Utilized</h2>
        <div class="flex flex-wrap justify-center gap-4 max-w-3xl mx-auto">
            <?php foreach($service['tech_tags'] as $tag): ?>
            <span class="px-4 py-2 bg-surface border border-border rounded-lg text-sm text-text-muted hover:text-text hover:border-primary/50 transition-colors">
                <?= esc($tag) ?>
            </span>
            <?php endforeach; ?>
        </div>
        <p class="text-center text-xs text-text-muted mt-6 uppercase tracking-widest">Architecture tailored per project</p>
    </div>
</section>

<!-- 8. FAQ Section (Accessible Accordion with Alpine) -->
<section class="py-24">
    <div class="container mx-auto max-w-4xl">
        <div class="text-center mb-16">
            <h2 class="h2 text-text mb-4">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4" x-data="{ active: null }">
            <?php foreach($service['faqs'] as $index => $faq): ?>
            <div class="glass-panel rounded-xl overflow-hidden">
                <button @click="active === <?= $index ?> ? active = null : active = <?= $index ?>" 
                        class="w-full text-left px-6 py-5 flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                        :aria-expanded="active === <?= $index ?>">
                    <span class="font-semibold text-text pr-4"><?= esc($faq['q']) ?></span>
                    <svg class="w-5 h-5 text-primary transform transition-transform duration-200 shrink-0" 
                         :class="{'rotate-180': active === <?= $index ?>}" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="active === <?= $index ?>" 
                     x-collapse 
                     x-transition.duration.300ms
                     class="px-6 pb-5 text-text-muted text-sm border-t border-white/5 pt-4">
                    <?= esc($faq['a']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 9. Related Services -->
<section class="py-16 bg-surface border-t border-border">
    <div class="container mx-auto text-center">
        <h3 class="text-lg text-text-muted mb-6">Related Services</h3>
        <div class="flex flex-wrap justify-center gap-4">
            <?php foreach($service['related_services'] as $rel): ?>
            <a href="<?= url_to('service-detail', $rel['slug']) ?>" class="px-6 py-3 bg-surface border border-border rounded-xl text-text hover:border-primary/50 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                <?= esc($rel['name']) ?> &rarr;
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if (! empty($related_guides)): ?>
<!-- Supporting Guides (educational cluster for this service silo) -->
<?= $this->include('components/related_content', [
    'related_title'   => 'Guides & Resources',
    'related_items'   => $related_guides,
    'related_columns' => 'md:grid-cols-3',
]) ?>
<?php endif; ?>

<?php if (! empty($related_case_studies)): ?>
<!-- Relevant case studies for this service -->
<?= $this->include('components/related_content', [
    'related_title'   => 'Related ' . $service['name'] . ' Case Studies',
    'related_items'   => $related_case_studies,
    'related_columns' => 'md:grid-cols-3',
]) ?>
<?php endif; ?>

<?php if (! empty($related_industries)): ?>
<!-- Industries where this service is commonly applied -->
<?= $this->include('components/related_content', [
    'related_title'   => 'Industries We Serve with ' . $service['name'],
    'related_items'   => $related_industries,
    'related_columns' => 'md:grid-cols-3',
]) ?>
<?php endif; ?>

<?php if (! empty($priority_locations)): ?>
<!-- Selected priority locations for this service -->
<section class="py-16 border-t border-border">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
            <div>
                <h2 class="h3 text-text mb-2"><?= esc($service['name']) ?> by Location</h2>
                <p class="text-body">Selected markets where we deliver this service remotely.</p>
            </div>
            <a href="<?= base_url('locations') ?>" class="inline-flex items-center text-primary font-semibold hover:text-primary-light transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">
                All locations
                <svg class="w-4 h-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($priority_locations as $loc): ?>
            <a href="<?= esc($loc['url']) ?>" class="glass-panel rounded-xl border border-border p-5 text-center hover:border-primary/50 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                <span class="block text-text font-semibold group-hover:text-primary"><?= esc($loc['name']) ?></span>
                <span class="block text-caption mt-1"><?= esc(str_replace('-', ' ', $loc['path'][0])) ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- 10. Final CTA -->
<section class="py-24 relative overflow-hidden bg-primary/10 border-t border-primary/20">
    <div class="container mx-auto relative z-10 text-center">
        <h2 class="h2 text-text mb-6">Discuss Your Requirements</h2>
        <p class="text-body max-w-2xl mx-auto mb-10 text-text-muted">
            Partner with Ziibay Soft to architect and launch your <?= esc(strtolower($service['name'])) ?> project.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= base_url('contact?service=' . esc($service['slug'])) ?>" class="btn-primary py-4 px-8 text-lg glow-primary">
                Discuss Your <?= esc($service['name']) ?> Project
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
