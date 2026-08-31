<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<div class="bg-surface/80 border-b border-border/70 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav aria-label="Breadcrumb" class="text-xs font-mono text-text-muted flex items-center space-x-2">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span class="text-text-dim">/</span>
            <span class="text-text font-semibold" aria-current="page"><?= esc($title) ?></span>
        </nav>
    </div>
</div>

<section class="py-20">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-caption text-primary mb-2">COMPLIANCE & TERMS</div>
        <h1 class="h2 text-text mb-2"><?= esc($title) ?></h1>
        <p class="text-caption text-text-dim mb-10">Last updated: <?= esc($legal_updated ?? date('F Y')) ?></p>

        <div class="space-y-8 text-text-muted leading-relaxed">
            <?php foreach ($legal_sections as $section): ?>
                <div class="tech-panel p-6 sm:p-8 rounded-xl">
                    <h2 class="text-base font-bold text-text mb-3"><?= esc($section['heading']) ?></h2>
                    <p class="text-small text-text-muted leading-relaxed"><?= esc($section['body']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 tech-panel rounded-xl p-8 border-l-2 border-l-primary">
            <h2 class="text-base font-bold text-text mb-2">Questions?</h2>
            <p class="text-small text-text-muted mb-6">If you have questions about this page, contact us and we will respond promptly.</p>
            <a href="<?= url_to('contact') ?>" class="btn-primary py-2.5 px-6 text-xs">Contact Us</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
