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
<div class="bg-surface border-b border-border py-4">
    <div class="container mx-auto">
        <nav aria-label="Breadcrumb" class="text-sm text-text-muted flex items-center space-x-2">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span>/</span>
            <a href="<?= url_to('industries') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Industries</a>
            <span>/</span>
            <span class="text-text font-medium" aria-current="page"><?= esc($industry['name']) ?></span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-20 pb-24 overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/5 to-transparent pointer-events-none"></div>
    <div class="container mx-auto relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-primary/30 bg-primary/10 text-primary text-sm font-semibold mb-6">
                Industry Solutions
            </div>
            <h1 class="h1 text-text mb-6">Software Solutions for <?= esc($industry['name']) ?></h1>
            <p class="text-body text-xl mb-10 leading-relaxed text-text-muted">
                <?= esc($industry['description']) ?>
            </p>
        </div>
    </div>
</section>

<!-- 3. Challenges & Solutions -->
<section class="py-24 bg-surface/50 border-y border-border">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <h2 class="h2 text-text mb-6">Common Digital Challenges</h2>
                <div class="glass-panel p-8 rounded-2xl border-l-4 border-l-secondary">
                    <ul class="space-y-4">
                        <?php 
                        $challenges = array_filter(array_map('trim', explode("\n", $industry['challenges'] ?? '')));
                        if (!empty($challenges)):
                            foreach($challenges as $challenge): ?>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-danger mr-3 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" /></svg>
                                <span class="text-body leading-relaxed"><?= esc($challenge) ?></span>
                            </li>
                            <?php endforeach; 
                        else: ?>
                            <p class="text-body leading-relaxed"><?= esc($industry['description']) ?></p>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
            <div>
                <h2 class="h2 text-text mb-6">How Ziibay Soft Can Help</h2>
                <ul class="space-y-4">
                    <?php 
                    $solutions = json_decode($industry['solutions'] ?? '[]', true);
                    if (!empty($solutions)):
                        foreach($solutions as $solution): ?>
                        <li class="glass-panel p-6 rounded-xl flex items-center">
                            <svg class="w-6 h-6 text-primary mr-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="text-text font-medium"><?= esc($solution) ?></span>
                        </li>
                        <?php endforeach; 
                    else: ?>
                        <li class="glass-panel p-6 rounded-xl flex items-center">
                            <span class="text-text font-medium">Custom digital solutions tailored for your business needs.</span>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- 4. Delivery Process -->
<section class="py-24 bg-surface border-b border-border">
    <div class="container mx-auto">
        <h2 class="h2 text-text mb-12 text-center">Our Delivery Process</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="glass-panel p-6 rounded-2xl relative">
                <div class="text-5xl font-bold text-primary/10 absolute top-4 right-4 pointer-events-none">01</div>
                <h3 class="text-xl font-semibold text-text mb-3">Discovery</h3>
                <p class="text-sm text-text-muted">Analyzing your <?= esc($industry['name']) ?> business workflows, technical constraints, and digital objectives.</p>
            </div>
            <div class="glass-panel p-6 rounded-2xl relative">
                <div class="text-5xl font-bold text-primary/10 absolute top-4 right-4 pointer-events-none">02</div>
                <h3 class="text-xl font-semibold text-text mb-3">Design & Architecture</h3>
                <p class="text-sm text-text-muted">Architecting scalable software infrastructure tailored to your sector's regulatory and performance needs.</p>
            </div>
            <div class="glass-panel p-6 rounded-2xl relative">
                <div class="text-5xl font-bold text-primary/10 absolute top-4 right-4 pointer-events-none">03</div>
                <h3 class="text-xl font-semibold text-text mb-3">Development</h3>
                <p class="text-sm text-text-muted">Executing robust engineering using modern stacks, maintaining strict QA, and continuous integration.</p>
            </div>
            <div class="glass-panel p-6 rounded-2xl relative">
                <div class="text-5xl font-bold text-primary/10 absolute top-4 right-4 pointer-events-none">04</div>
                <h3 class="text-xl font-semibold text-text mb-3">Launch & Scale</h3>
                <p class="text-sm text-text-muted">Deploying the solution with zero-downtime strategies, followed by ongoing monitoring and iteration.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. Related Services -->
<section class="py-24">
    <div class="container mx-auto text-center">
        <h2 class="h2 text-text mb-4">Relevant Services</h2>
        <p class="text-body max-w-2xl mx-auto mb-12">Core capabilities we deploy for the <?= esc($industry['name']) ?> sector.</p>
        
        <div class="flex flex-wrap justify-center gap-4">
            <?php if (!empty($related_services)): foreach($related_services as $rel): ?>
            <a href="<?= url_to('service-detail', $rel['slug']) ?>" class="px-8 py-4 bg-surface border border-border rounded-xl text-text text-lg hover:border-primary/50 transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                <?= esc($rel['name']) ?> &rarr;
            </a>
            <?php endforeach; else: ?>
                <p class="text-text-muted">Services being updated.</p>
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
<section class="py-24 relative overflow-hidden bg-primary/10 border-t border-primary/20">
    <div class="container mx-auto relative z-10 text-center">
        <h2 class="h2 text-text mb-6">Discuss Your Industry's Needs</h2>
        <p class="text-body max-w-2xl mx-auto mb-10 text-text-muted">
            Let's engineer a solution that fits your precise operational workflows.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-lg glow-primary">
                Start Your Project
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
