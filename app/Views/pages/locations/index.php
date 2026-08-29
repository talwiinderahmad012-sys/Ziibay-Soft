<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= isset($canonical_url) ? $this->section('canonical') . esc($canonical_url) . $this->endSection() : '' ?>

<?= $this->section('content') ?>

<section class="pt-32 pb-16 bg-surface transition-colors duration-300 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-brand-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">Global <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary">Locations</span></h1>
        <p class="text-xl text-text-muted max-w-3xl mx-auto">
            Discover our strategic service hubs worldwide. We deliver premium digital solutions to businesses across these regions.
        </p>
    </div>
</section>

<section class="py-16 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach($countries as $country): ?>
            <a href="<?= base_url('locations/' . $country['slug']) ?>" class="group block relative rounded-2xl overflow-hidden shadow-xl border border-border bg-surface hover:border-brand-primary/50 transition-all duration-300 p-8 text-center">
                <h2 class="text-2xl font-bold text-text mb-2 group-hover:text-brand-primary transition-colors"><?= esc($country['name']) ?></h2>
                <p class="text-text-muted">View Regions & Cities</p>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
