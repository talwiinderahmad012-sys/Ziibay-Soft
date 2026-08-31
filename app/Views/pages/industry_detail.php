<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "<?= base_url() ?>"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "Industries",
    "item": "<?= base_url('industries') ?>"
  },{
    "@type": "ListItem",
    "position": 3,
    "name": "<?= esc($industry['name']) ?>"
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
            <a href="<?= url_to('industries') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Industries</a>
            <span class="text-text-dim">/</span>
            <span class="text-text font-semibold" aria-current="page"><?= esc($industry['name']) ?></span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-24 pb-20 overflow-hidden bg-surface/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="text-caption text-primary mb-3">SECTOR SPECIFICATION</div>
            <h1 class="h1 text-text mb-6">Software Solutions for <?= esc($industry['name']) ?></h1>
            <p class="text-body text-lg mb-10 leading-relaxed text-text-muted max-w-3xl mx-auto">
                <?= esc($industry['description']) ?>
            </p>
        </div>
    </div>
</section>

<!-- 3. Challenges & Solutions -->
<section class="py-24 bg-surface/50 border-y border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <div class="text-caption text-danger mb-3">PROBLEM SURFACE</div>
                <h2 class="h2 text-text mb-6">Common Digital Challenges</h2>
                <div class="tech-panel p-8 rounded-xl border-l-2 border-l-danger">
                    <ul class="space-y-4">
                        <?php 
                        $challenges = array_filter(array_map('trim', explode("\n", $industry['challenges'] ?? '')));
                        if (!empty($challenges)):
                            foreach($challenges as $challenge): ?>
                            <li class="flex items-start">
                                <span class="w-1.5 h-1.5 rounded-full bg-danger mr-3 mt-2 shrink-0"></span>
                                <span class="text-small text-text-muted leading-relaxed"><?= esc($challenge) ?></span>
                            </li>
                            <?php endforeach; 
                        else: ?>
                            <p class="text-small text-text-muted leading-relaxed"><?= esc($industry['description']) ?></p>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <div>
                <div class="text-caption text-primary mb-3">ENGINEERING RESPONSE</div>
                <h2 class="h2 text-text mb-6">How Ziibay Soft Can Help</h2>
                <ul class="space-y-4">
                    <?php 
                    $solutions = json_decode($industry['solutions'] ?? '[]', true);
                    if (!empty($solutions)):
                        foreach($solutions as $solution): ?>
                        <li class="tech-card p-6 rounded-xl flex items-center">
                            <span class="w-1.5 h-1.5 rounded-full bg-primary mr-4 shrink-0 shadow-[0_0_5px_var(--primary-glow)]"></span>
                            <span class="text-text font-medium text-sm"><?= esc($solution) ?></span>
                        </li>
                        <?php endforeach; 
                    else: ?>
                        <li class="tech-card p-6 rounded-xl flex items-center">
                            <span class="text-text font-medium text-sm">Custom digital solutions tailored for your business needs.</span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- 4. Delivery Process -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 max-w-3xl mx-auto">
            <div class="text-caption text-primary mb-3">DELIVERY TIMELINE</div>
            <h2 class="h2 text-text mb-4">Our Delivery Process</h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="tech-card p-6 rounded-xl">
                <div class="text-caption text-primary font-mono mb-4">01 // STEP</div>
                <h3 class="text-base font-semibold text-text mb-2">Discovery</h3>
                <p class="text-xs text-text-muted leading-relaxed">Analyzing your <?= esc($industry['name']) ?> business workflows, technical constraints, and digital objectives.</p>
            </div>
            <div class="tech-card p-6 rounded-xl">
                <div class="text-caption text-accent-blue font-mono mb-4">02 // STEP</div>
                <h3 class="text-base font-semibold text-text mb-2">Design & Architecture</h3>
                <p class="text-xs text-text-muted leading-relaxed">Architecting scalable software infrastructure tailored to your sector's regulatory and performance needs.</p>
            </div>
            <div class="tech-card p-6 rounded-xl">
                <div class="text-caption text-primary font-mono mb-4">03 // STEP</div>
                <h3 class="text-base font-semibold text-text mb-2">Development</h3>
                <p class="text-xs text-text-muted leading-relaxed">Executing robust engineering using modern stacks, maintaining strict QA, and continuous integration.</p>
            </div>
            <div class="tech-card p-6 rounded-xl">
                <div class="text-caption text-accent-teal font-mono mb-4">04 // STEP</div>
                <h3 class="text-base font-semibold text-text mb-2">Launch & Scale</h3>
                <p class="text-xs text-text-muted leading-relaxed">Deploying the solution with zero-downtime strategies, followed by ongoing monitoring and iteration.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. Related Services -->
<section class="py-24 bg-surface/50 border-y border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="text-caption text-primary mb-3">DEPLOYABLE CAPABILITIES</div>
        <h2 class="h2 text-text mb-4">Relevant Services</h2>
        <p class="text-body max-w-2xl mx-auto mb-10 text-text-muted">Core capabilities we deploy for the <?= esc($industry['name']) ?> sector.</p>
        
        <div class="flex flex-wrap justify-center gap-3">
            <?php if (!empty($related_services)): foreach($related_services as $rel): ?>
            <a href="<?= url_to('service-detail', $rel['slug']) ?>" class="btn-secondary text-xs !py-3 !px-6">
                <?= esc($rel['name']) ?> &rarr;
            </a>
            <?php endforeach; else: ?>
                <p class="text-text-muted text-sm">Services being updated.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (! empty($related_case_studies)): ?>
<!-- Real case studies in this industry -->
<?= $this->include('components/related_content', [
    'related_title'   => $industry['name'] . ' Case Studies',
    'related_items'   => $related_case_studies,
    'related_columns' => 'md:grid-cols-3',
]) ?>
<?php endif; ?>

<?php if (! empty($related_guides)): ?>
<!-- Educational resources relevant to this industry -->
<?= $this->include('components/related_content', [
    'related_title'   => 'Guides for the ' . $industry['name'] . ' Sector',
    'related_items'   => $related_guides,
    'related_columns' => 'md:grid-cols-3',
]) ?>
<?php endif; ?>

<!-- 5. Final CTA -->
<section class="py-24 relative overflow-hidden bg-surface/50 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="h2 text-text mb-4">Discuss Your Industry's Needs</h2>
        <p class="text-body max-w-2xl mx-auto mb-8 text-text-muted">
            Let's engineer a solution that fits your precise operational workflows.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-3.5 px-8 text-sm">
                Start Your Project
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
