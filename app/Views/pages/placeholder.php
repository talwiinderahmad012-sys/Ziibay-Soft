<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<section class="py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-text mb-6"><?= esc($page_title ?? 'Page Title') ?></h1>
        <p class="text-xl text-text-muted max-w-2xl mx-auto mb-12">
            This section is currently under development as part of the Ziibay Soft foundation phase.
        </p>
        <a href="<?= base_url() ?>" class="text-accent-500 hover:text-text transition-colors">&larr; Back to Home</a>
    </div>
</section>

<?= $this->endSection() ?>
