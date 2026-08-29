<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= isset($canonical_url) ? $this->section('canonical') . esc($canonical_url) . $this->endSection() : '' ?>

<?= $this->section('content') ?>

<section class="pt-32 pb-16 bg-surface transition-colors duration-300 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-brand-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <!-- Breadcrumbs -->
        <nav class="flex justify-center text-sm text-text-muted mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <?php foreach($breadcrumbs as $index => $crumb): ?>
                    <li class="inline-flex items-center">
                        <?php if($index > 0): ?>
                            <svg class="w-3 h-3 text-text-muted mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                        <?php endif; ?>
                        <?php if($crumb['url']): ?>
                            <a href="<?= $crumb['url'] ?>" class="hover:text-brand-primary transition-colors"><?= esc($crumb['name']) ?></a>
                        <?php else: ?>
                            <span class="text-text font-medium"><?= esc($crumb['name']) ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>

        <h1 class="text-4xl md:text-5xl font-bold text-text mb-6">Digital Solutions in <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary"><?= esc($location['name']) ?></span></h1>
        
        <?php if($location['description']): ?>
            <div class="text-xl text-text-muted max-w-3xl mx-auto prose dark:prose-invert">
                <?= $location['description'] ?>
            </div>
        <?php else: ?>
            <p class="text-xl text-text-muted max-w-3xl mx-auto">
                Discover our range of digital services tailored for businesses in <?= esc($location['name']) ?>.
            </p>
        <?php endif; ?>
    </div>
</section>

<section class="py-16 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-text mb-10 text-center">Our Services in <?= esc($location['name']) ?></h2>
        
        <?php if(empty($services)): ?>
            <div class="text-center text-text-muted py-10 border border-dashed border-border rounded-xl">
                No dedicated service pages are published for this location yet.
                <a href="<?= base_url('services') ?>" class="text-primary hover:underline font-medium">Browse all services</a> instead.
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach($services as $s): ?>
                <a href="<?= base_url('locations/' . $country['slug'] . '/' . $region['slug'] . '/' . $location['slug'] . '/' . $s['service_slug']) ?>" class="group block relative rounded-2xl overflow-hidden shadow-xl border border-border bg-surface hover:border-brand-primary/50 transition-all duration-300 h-full flex flex-col">
                    <div class="p-8 flex-grow">
                        <h3 class="text-2xl font-bold text-text mb-4 group-hover:text-brand-primary transition-colors"><?= esc($s['name']) ?></h3>
                        <p class="text-text-muted line-clamp-3">
                            <?= esc($s['intro'] ?: $s['short_description']) ?>
                        </p>
                    </div>
                    <div class="px-8 pb-8 mt-auto">
                        <span class="inline-flex items-center font-semibold text-brand-primary group-hover:text-brand-secondary transition-colors">
                            Learn more
                            <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                        </span>
                    </div>
                </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if (! empty($nearbyCities ?? [])): ?>
<!-- Related locations: a small set of cities in the same region -->
<section class="py-12 transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-text mb-6">Other Cities in <?= esc($region['name']) ?></h2>
        <div class="flex flex-wrap gap-3">
            <?php foreach ($nearbyCities as $nearby): ?>
            <a href="<?= base_url('locations/' . $country['slug'] . '/' . $region['slug'] . '/' . $nearby['slug']) ?>"
               class="px-5 py-2.5 rounded-xl border border-border bg-surface text-text text-sm font-medium hover:border-primary hover:text-primary transition-colors">
                <?= esc($nearby['name']) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Clear routes back up the location hierarchy -->
<section class="py-12 bg-surface transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <nav class="flex flex-wrap gap-3 text-sm" aria-label="Location navigation">
            <a href="<?= base_url('locations/' . $country['slug'] . '/' . $region['slug']) ?>" class="inline-flex items-center text-text-muted hover:text-primary transition-colors font-medium">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                <?= esc($region['name']) ?>
            </a>
            <a href="<?= base_url('locations/' . $country['slug']) ?>" class="inline-flex items-center text-text-muted hover:text-primary transition-colors font-medium">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                <?= esc($country['name']) ?>
            </a>
            <a href="<?= base_url('locations') ?>" class="inline-flex items-center text-primary hover:underline font-semibold">
                All Locations
                <svg class="w-4 h-4 ml-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </nav>
        <a href="<?= base_url('contact') ?>" class="inline-flex items-center px-6 py-3 rounded-xl font-bold text-text-onprimary bg-primary hover:bg-primary-hover transition-colors">
            Discuss a Project in <?= esc($location['name']) ?>
        </a>
    </div>
</section>

<?= $this->endSection() ?>
