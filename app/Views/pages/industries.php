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
<div class="bg-surface border-b border-border py-4">
    <div class="container mx-auto">
        <nav aria-label="Breadcrumb" class="text-sm text-text-muted flex items-center space-x-2">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span>/</span>
            <span class="text-text font-medium" aria-current="page">Industries</span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-20 pb-24 overflow-hidden">
    <div class="container mx-auto relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="h1 text-text mb-6">Digital Solutions Across Sectors</h1>
            <p class="text-body text-xl mb-10 leading-relaxed text-text-muted">
                We engineer technology solutions designed to solve the unique operational, regulatory, and growth challenges of diverse business sectors.
            </p>
        </div>
    </div>
</section>

<!-- 3. Industries Grid -->
<section class="py-16">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($industries as $industry): ?>
            <a href="<?= url_to('industry-detail', $industry['slug']) ?>" class="glass-panel p-8 rounded-2xl group hover:-translate-y-2 transition-transform duration-300 flex flex-col h-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                <div class="w-12 h-12 bg-surface rounded-xl flex items-center justify-center mb-6 text-primary border border-border group-hover:border-primary/50 transition-colors">
                    <?php if (!empty($industry['icon'])): ?>
                        <i class="<?= esc($industry['icon']) ?> text-2xl"></i>
                    <?php else: ?>
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" /></svg>
                    <?php endif; ?>
                </div>
                <h3 class="text-2xl font-bold text-text mb-3 group-hover:text-primary transition-colors"><?= esc($industry['name']) ?></h3>
                <p class="text-small mb-6 flex-grow"><?= esc($industry['short_description']) ?></p>
                <div class="mt-auto inline-flex items-center text-primary font-semibold text-sm">
                    Explore Solutions <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 4. Final CTA -->
<section class="py-24 relative overflow-hidden bg-surface border-t border-border">
    <div class="container mx-auto relative z-10 text-center">
        <h2 class="h2 text-text mb-6">Don't see your sector?</h2>
        <p class="text-body max-w-2xl mx-auto mb-10 text-text-muted">
            Technology problems are universal. Reach out to discuss your specific industry challenges and we'll architect a custom solution.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-lg glow-primary">
                Discuss Your Industry's Needs
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
