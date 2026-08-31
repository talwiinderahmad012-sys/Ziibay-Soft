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
    "name": "Industries"
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
            <span class="text-text font-semibold" aria-current="page">Industries</span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-24 pb-20 overflow-hidden bg-surface/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="text-caption text-primary mb-3">SECTORS DIRECTORY</div>
            <h1 class="h1 text-text mb-6">Digital Solutions Across Sectors</h1>
            <p class="text-body text-lg mb-10 leading-relaxed text-text-muted max-w-3xl mx-auto">
                We engineer technology solutions designed to solve the unique operational, regulatory, and growth challenges of diverse business sectors.
            </p>
        </div>
    </div>
</section>

<!-- 3. Industries Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($industries as $industry): ?>
            <a href="<?= url_to('industry-detail', $industry['slug']) ?>" class="tech-card p-8 rounded-xl group flex flex-col h-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                <div class="w-12 h-12 bg-surface rounded-lg flex items-center justify-center mb-6 text-primary border border-border group-hover:border-primary/50 transition-colors">
                    <?php if (!empty($industry['icon'])): ?>
                        <i class="<?= esc($industry['icon']) ?> text-xl"></i>
                    <?php else: ?>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    <?php endif; ?>
                </div>
                <h3 class="text-xl font-bold text-text mb-3 group-hover:text-primary transition-colors"><?= esc($industry['name']) ?></h3>
                <p class="text-small text-text-muted mb-6 flex-grow leading-relaxed"><?= esc($industry['short_description']) ?></p>
                <div class="mt-auto inline-flex items-center text-xs font-mono uppercase tracking-wider text-primary group-hover:text-primary-light">
                    Explore Solutions <svg class="w-3.5 h-3.5 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 4. Final CTA -->
<section class="py-24 relative overflow-hidden bg-surface/50 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="h2 text-text mb-4">Don't see your sector?</h2>
        <p class="text-body max-w-2xl mx-auto mb-8 text-text-muted">
            Technology problems are universal. Reach out to discuss your specific industry challenges and we'll architect a custom solution.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-3.5 px-8 text-sm">
                Discuss Your Industry's Needs
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
