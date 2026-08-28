<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<!-- Indexability Control -->
<?php if (isset($robots)): ?>
<meta name="robots" content="<?= esc($robots) ?>">
<?php endif; ?>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "<?= esc($page['service_name']) ?> in <?= esc($page['city_name']) ?>",
  "provider": {
    "@type": "Organization",
    "name": "Ziibay Soft"
  },
  "areaServed": {
    "@type": "City",
    "name": "<?= esc($page['city_name']) ?>",
    "containedInPlace": {
        "@type": "State",
        "name": "<?= esc($page['region_name']) ?>"
    }
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
    "item": "<?= base_url() ?>"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "Services",
    "item": "<?= base_url('services') ?>"
  },{
    "@type": "ListItem",
    "position": 3,
    "name": "<?= esc($page['service_name']) ?>",
    "item": "<?= base_url('services/' . $page['service_slug']) ?>"
  },{
    "@type": "ListItem",
    "position": 4,
    "name": "<?= esc($page['city_name']) ?>"
  }]
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. Breadcrumb -->
<div class="bg-surface border-b border-border py-4">
    <div class="container mx-auto">
        <nav aria-label="Breadcrumb" class="text-sm text-text-muted flex items-center space-x-2 whitespace-nowrap overflow-x-auto pb-1 md:pb-0">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span>/</span>
            <a href="<?= url_to('services') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Services</a>
            <span>/</span>
            <a href="<?= url_to('service-detail', $page['service_slug']) ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded"><?= esc($page['service_name']) ?></a>
            <span>/</span>
            <span class="text-text-muted"><?= esc($page['country_name']) ?></span>
            <span>/</span>
            <span class="text-text font-medium" aria-current="page"><?= esc($page['city_name']) ?></span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-20 pb-24 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-primary/5 to-transparent pointer-events-none"></div>
    <div class="container mx-auto relative z-10">
        <div class="max-w-4xl">
            <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-primary/30 bg-primary/10 text-primary text-sm font-semibold mb-6">
                Serving <?= esc($page['city_name']) ?>, <?= esc($page['region_name']) ?>
            </div>
            <h1 class="h1 text-text mb-6"><?= esc($page['h1']) ?></h1>
            <p class="text-body text-xl mb-10 leading-relaxed text-text-muted">
                <?= esc($page['intro']) ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-base glow-primary">Discuss Your Project</a>
                <a href="<?= url_to('service-detail', $page['service_slug']) ?>" class="btn-secondary py-4 px-8 text-base">View Global Service Capabilities</a>
            </div>
        </div>
    </div>
</section>

<!-- 3. Local Business Context -->
<section class="py-24 bg-surface border-y border-border">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="h2 text-text mb-6">Digital Solutions for <?= esc($page['city_name']) ?> Businesses</h2>
                <p class="text-body leading-relaxed mb-6">
                    <?= esc($page['local_context']) ?>
                </p>
                <p class="text-small text-text-muted">
                    * Ziibay Soft is a global digital agency. We partner with organizations in <?= esc($page['city_name']) ?> via remote, agile methodologies to architect custom software without the overhead of localized agencies.
                </p>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <!-- Abstract UI blocks representing scalable architecture rather than fake local photos -->
                <div class="glass-panel p-6 rounded-2xl border-t-4 border-t-primary aspect-square flex flex-col justify-center">
                    <svg class="w-8 h-8 text-primary mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                    <span class="text-text font-medium">Scalable Architecture</span>
                </div>
                <div class="glass-panel p-6 rounded-2xl border-t-4 border-t-secondary aspect-square flex flex-col justify-center mt-8">
                    <svg class="w-8 h-8 text-secondary mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                    <span class="text-text font-medium">High Performance</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. FAQ Section (Local context) -->
<?php if (!empty($page['faq_content'])): ?>
<section class="py-24">
    <div class="container mx-auto max-w-4xl">
        <div class="text-center mb-16">
            <h2 class="h2 text-text mb-4">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4" x-data="{ active: null }">
            <?php foreach($page['faq_content'] as $index => $faq): ?>
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
<?php endif; ?>

<!-- 5. Final CTA -->
<section class="py-24 relative overflow-hidden bg-primary/10 border-t border-primary/20">
    <div class="container mx-auto relative z-10 text-center">
        <h2 class="h2 text-text mb-6">Ready to upgrade your digital infrastructure?</h2>
        <p class="text-body max-w-2xl mx-auto mb-10 text-text-muted">
            Contact our engineering team to discuss how we can build secure, scalable solutions for your organization.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-lg glow-primary">
                Contact Our Team
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
