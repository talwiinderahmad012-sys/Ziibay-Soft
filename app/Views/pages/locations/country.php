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

        <h1 class="text-4xl md:text-5xl font-bold text-text mb-6">Services in <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary"><?= esc($location['name']) ?></span></h1>
        
        <?php if($location['description']): ?>
            <div class="text-xl text-text-muted max-w-3xl mx-auto prose dark:prose-invert">
                <?= $location['description'] ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="py-16 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-text mb-10 text-center">Regions & States</h2>
        <?php if (empty($regions)): ?>
            <p class="text-center text-text-muted">Regional pages for <?= esc($location['name']) ?> are being prepared.</p>
        <?php else: ?>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($regions as $region): ?>
            <a href="<?= base_url('locations/' . $location['slug'] . '/' . $region['slug']) ?>" class="group block relative rounded-2xl overflow-hidden shadow-lg border border-border bg-surface-secondary hover:border-brand-primary/50 transition-all duration-300 p-6">
                <h3 class="text-xl font-bold text-text group-hover:text-brand-primary transition-colors"><?= esc($region['name']) ?></h3>
            </a>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php if (! empty($countryServices ?? [])): ?>
<!-- Services offered in this country through published location pages -->
<section class="py-16 transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-text mb-3 text-center">Services Available in <?= esc($location['name']) ?></h2>
        <p class="text-text-muted text-center mb-10 max-w-2xl mx-auto">Delivered remotely by our international team, with dedicated local pages where available.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <?php foreach ($countryServices as $cs): ?>
            <a href="<?= base_url('services/' . esc($cs['slug'])) ?>" class="px-6 py-3 rounded-xl border border-border bg-surface text-text font-medium hover:border-primary hover:text-primary transition-colors">
                <?= esc($cs['name']) ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Conversion path -->
<section class="py-16 bg-surface transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4 text-center max-w-3xl">
        <h2 class="text-3xl font-bold text-text mb-4">Working with businesses in <?= esc($location['name']) ?></h2>
        <p class="text-text-muted mb-8">Tell us about your project and we will suggest the right approach, timeline, and budget.</p>
        <a href="<?= base_url('contact') ?>" class="inline-flex items-center px-8 py-4 rounded-xl font-bold text-text-onprimary bg-primary hover:bg-primary-hover transition-colors">
            Get a Free Consultation
            <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
    </div>
</section>

<?= $this->endSection() ?>
