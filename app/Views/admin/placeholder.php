<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-3xl font-bold text-text mb-6"><?= esc($title ?? 'Admin Page') ?></h1>
        <p class="text-lg text-text-muted max-w-2xl mx-auto mb-12">
            This administrative section is currently being architected as part of the Phase 8 framework integration.
        </p>
        <a href="<?= url_to('admin/dashboard') ?? '#' ?>" class="text-primary hover:text-primary-dark transition-colors">&larr; Back to Dashboard</a>
    </div>
</div>

<?= $this->endSection() ?>
