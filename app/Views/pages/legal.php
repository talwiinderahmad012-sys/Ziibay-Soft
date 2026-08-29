<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Breadcrumb -->
<div class="bg-surface border-b border-border py-4">
    <div class="container mx-auto">
        <nav aria-label="Breadcrumb" class="text-sm text-text-muted flex items-center space-x-2">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span>/</span>
            <span class="text-text font-medium" aria-current="page"><?= esc($title) ?></span>
        </nav>
    </div>
</div>

<section class="py-20">
    <div class="container mx-auto max-w-3xl">
        <h1 class="h2 text-text mb-4"><?= esc($title) ?></h1>
        <p class="text-caption mb-10">Last updated: <?= esc($legal_updated ?? date('F Y')) ?></p>

        <div class="space-y-8 text-text-muted leading-relaxed">
            <?php foreach ($legal_sections as $section): ?>
                <div>
                    <h2 class="h4 text-text mb-3"><?= esc($section['heading']) ?></h2>
                    <p class="text-sm md:text-base"><?= esc($section['body']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-12 glass-panel rounded-2xl border border-border p-8">
            <h2 class="h4 text-text mb-3">Questions?</h2>
            <p class="text-small mb-6">If you have questions about this page, contact us and we will respond promptly.</p>
            <a href="<?= url_to('contact') ?>" class="btn-primary">Contact Us</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
