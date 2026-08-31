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
<div class="bg-surface/80 border-b border-border/70 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav aria-label="Breadcrumb" class="text-xs font-mono text-text-muted flex items-center space-x-2">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span class="text-text-dim">/</span>
            <a href="<?= url_to('services') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Services</a>
            <span class="text-text-dim">/</span>
            <span class="text-text font-semibold" aria-current="page"><?= esc($service['name']) ?></span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-24 pb-20 overflow-hidden bg-surface/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="max-w-3xl">
            <div class="text-caption text-primary mb-3">CAPABILITY SPECIFICATION</div>
            <h1 class="h1 text-text mb-6"><?= esc($service['hero_headline']) ?></h1>
            <p class="text-body text-lg mb-10 leading-relaxed text-text-muted">
                <?= esc($service['hero_subheadline']) ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="<?= base_url('contact?service=' . esc($service['slug'])) ?>" class="btn-primary py-3.5 px-8 text-sm shadow-tech">Get a Free Consultation</a>
                <a href="#process" class="btn-secondary py-3.5 px-8 text-sm">Explore Our Process</a>
            </div>
        </div>
    </div>
</section>

<!-- 3. Service Overview & Problem -->
<section class="py-24 bg-surface/50 border-y border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="text-caption text-primary mb-3">SYSTEM SCOPE</div>
                <h2 class="h2 text-text mb-6">Overview</h2>
                <p class="text-body mb-6 leading-relaxed text-text-muted">
                    <?= esc($service['overview']) ?>
                </p>
            </div>
            <div class="tech-panel p-8 rounded-xl border-l-2 border-l-primary">
                <div class="text-caption text-primary mb-2">CHALLENGE ANALYSIS</div>
                <h3 class="h4 text-text mb-4">The Challenge</h3>
                <p class="text-small text-text-muted leading-relaxed">
                    <?= esc($service['problem_statement']) ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 4. What We Build (Capabilities) -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="text-caption text-primary mb-3">TECHNICAL DELIVERABLES</div>
            <h2 class="h2 text-text mb-4">Core Capabilities</h2>
            <p class="text-body max-w-2xl mx-auto text-text-muted">Specific solutions engineered under our <?= esc(strtolower($service['name'])) ?> practice.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <?php foreach($service['capabilities'] as $cap): ?>
            <div class="tech-card p-8 rounded-xl">
                <h3 class="text-base font-bold text-text mb-3 flex items-center">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary mr-3 shadow-[0_0_5px_var(--primary-glow)]"></span>
                    <?= esc($cap['title']) ?>
                </h3>
                <p class="text-small text-text-muted pl-4 leading-relaxed"><?= esc($cap['desc']) ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 5. Service Comparison (Global Block) -->
<section class="py-24 bg-surface/50 border-y border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="text-caption text-primary mb-3">SYSTEM SELECTION</div>
            <h2 class="h2 text-text mb-4">Choosing the Right Solution</h2>
            <p class="text-body max-w-2xl mx-auto text-text-muted">Understanding the distinction between our core service pillars.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="tech-card p-6 rounded-xl <?= $service['slug'] === 'web-development' ? '!border-primary !bg-primary/5' : '' ?>">
                <h4 class="text-base font-bold text-text mb-2">Web Development</h4>
                <p class="text-xs text-text-muted leading-relaxed">Best for public-facing websites, corporate portals, e-commerce, and browser-based experiences designed to capture leads or drive online sales.</p>
            </div>
            <div class="tech-card p-6 rounded-xl <?= $service['slug'] === 'software-development' ? '!border-accent-blue !bg-accent-blue/5' : '' ?>">
                <h4 class="text-base font-bold text-text mb-2">Software Development</h4>
                <p class="text-xs text-text-muted leading-relaxed">Best for complex internal business systems, automated workflows, SaaS platforms, and custom data management tools.</p>
            </div>
            <div class="tech-card p-6 rounded-xl <?= $service['slug'] === 'app-development' ? '!border-accent-teal !bg-accent-teal/5' : '' ?>">
                <h4 class="text-base font-bold text-text mb-2">App Development</h4>
                <p class="text-xs text-text-muted leading-relaxed">Best for mobile-first experiences targeting smartphones and tablets, requiring native hardware access, offline capabilities, or push notifications.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Development Approach (Process) -->
<section id="process" class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-16 text-center max-w-3xl mx-auto">
            <div class="text-caption text-primary mb-3">EXECUTION PIPELINE</div>
            <h2 class="h2 text-text mb-4">Development Process</h2>
            <p class="text-body text-text-muted">How we execute <?= esc(strtolower($service['name'])) ?> projects.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="tech-card p-6 rounded-xl">
                <div class="text-caption text-primary font-mono mb-4">01 // STEP</div>
                <h4 class="text-text font-bold text-base mb-2">Discovery & Requirements</h4>
                <p class="text-xs text-text-muted leading-relaxed">We analyze your business objectives, target audience, and technical constraints to define the project scope accurately.</p>
            </div>
            <div class="tech-card p-6 rounded-xl">
                <div class="text-caption text-accent-blue font-mono mb-4">02 // STEP</div>
                <h4 class="text-text font-bold text-base mb-2">Architecture & UX Planning</h4>
                <p class="text-xs text-text-muted leading-relaxed">Mapping out the database schema, system architecture, API endpoints, and user interface wireframes.</p>
            </div>
            <div class="tech-card p-6 rounded-xl">
                <div class="text-caption text-primary font-mono mb-4">03 // STEP</div>
                <h4 class="text-text font-bold text-base mb-2">Development & Integration</h4>
                <p class="text-xs text-text-muted leading-relaxed">Agile development sprints utilizing modern frameworks, writing clean code, and integrating necessary third-party systems.</p>
            </div>
            <div class="tech-card p-6 rounded-xl">
                <div class="text-caption text-accent-teal font-mono mb-4">04 // STEP</div>
                <h4 class="text-text font-bold text-base mb-2">Testing, Deployment & Support</h4>
                <p class="text-xs text-text-muted leading-relaxed">Rigorous QA testing, secure deployment to production servers, and ongoing maintenance SLAs to ensure long-term stability.</p>
            </div>
        </div>
    </div>
</section>

<!-- 7. Technology Stack -->
<section class="py-24 bg-surface/50 border-y border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <div class="text-caption text-primary mb-2">SYSTEM COMPATIBILITY</div>
            <h2 class="h3 text-text">Technologies Utilized</h2>
        </div>
        <div class="flex flex-wrap justify-center gap-3 max-w-3xl mx-auto">
            <?php foreach($service['tech_tags'] as $tag): ?>
            <span class="px-3.5 py-1.5 tech-badge text-xs">
                <?= esc($tag) ?>
            </span>
            <?php endforeach; ?>
        </div>
        <p class="text-center text-[10px] font-mono text-text-dim mt-6 uppercase tracking-wider">Architecture tailored per project specification</p>
    </div>
</section>

<!-- 8. FAQ Section (Accessible Accordion with Alpine) -->
<section class="py-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="text-caption text-primary mb-3">FAQ PROTOCOL</div>
            <h2 class="h2 text-text mb-4">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-3" x-data="{ active: null }">
            <?php foreach($service['faqs'] as $index => $faq): ?>
            <div class="tech-card rounded-xl overflow-hidden">
                <button @click="active === <?= $index ?> ? active = null : active = <?= $index ?>" 
                        class="w-full text-left px-6 py-5 flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                        :aria-expanded="active === <?= $index ?>">
                    <span class="font-semibold text-text pr-4 text-sm md:text-base"><?= esc($faq['q']) ?></span>
                    <svg class="w-4 h-4 text-primary transform transition-transform duration-200 shrink-0" 
                         :class="{'rotate-180': active === <?= $index ?>}" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="active === <?= $index ?>" 
                     x-collapse 
                     x-transition.duration.250ms
                     class="px-6 pb-5 text-text-muted text-sm border-t border-border/40 pt-3 leading-relaxed">
                    <?= esc($faq['a']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 9. Related Services -->
<section class="py-16 bg-surface/50 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h3 class="text-caption text-text-dim mb-6">RELATED CAPABILITIES</h3>
        <div class="flex flex-wrap justify-center gap-3">
            <?php foreach($service['related_services'] as $rel): ?>
            <a href="<?= url_to('service-detail', $rel['slug']) ?>" class="btn-secondary text-xs !py-2.5 !px-5">
                <?= esc($rel['name']) ?> &rarr;
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php if (! empty($related_guides)): ?>
<!-- Supporting Guides -->
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
<section class="py-16 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
            <div>
                <h2 class="h3 text-text mb-1"><?= esc($service['name']) ?> by Location</h2>
                <p class="text-small text-text-muted">Selected markets where we deliver this service remotely.</p>
            </div>
            <a href="<?= base_url('locations') ?>" class="tech-link text-xs uppercase font-mono tracking-wider">
                All locations &rarr;
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach ($priority_locations as $loc): ?>
            <a href="<?= esc($loc['url']) ?>" class="tech-card p-4 rounded-xl text-center group">
                <span class="block text-text font-semibold text-xs group-hover:text-primary transition-colors"><?= esc($loc['name']) ?></span>
                <span class="block text-[10px] font-mono text-text-dim mt-1"><?= esc(str_replace('-', ' ', $loc['path'][0])) ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- 10. Final CTA -->
<section class="py-24 relative overflow-hidden bg-surface/50 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="h2 text-text mb-4">Discuss Your Requirements</h2>
        <p class="text-body max-w-2xl mx-auto mb-8 text-text-muted">
            Partner with Ziibay Soft to architect and launch your <?= esc(strtolower($service['name'])) ?> project.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= base_url('contact?service=' . esc($service['slug'])) ?>" class="btn-primary py-3.5 px-8 text-sm">
                Discuss Your <?= esc($service['name']) ?> Project
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
