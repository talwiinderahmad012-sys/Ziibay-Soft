<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container py-20 text-center">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-8xl font-bold text-primary mb-6">404</h1>
        <h2 class="text-3xl font-semibold mb-4 text-[var(--text-color)]">Page Not Found</h2>
        <p class="text-lg text-[var(--text-muted)] mb-8">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-10">
            <a href="<?= site_url('services') ?>" class="block p-6 rounded-xl border border-[var(--border-color)] bg-[var(--card-bg)] hover:border-primary transition shadow-sm text-left">
                <h3 class="text-lg font-semibold text-[var(--text-color)] mb-2"><i class="bi bi-gear text-primary"></i> Our Services</h3>
                <p class="text-sm text-[var(--text-muted)]">Explore our web, software, and app development solutions.</p>
            </a>
            <a href="<?= site_url('blog') ?>" class="block p-6 rounded-xl border border-[var(--border-color)] bg-[var(--card-bg)] hover:border-primary transition shadow-sm text-left">
                <h3 class="text-lg font-semibold text-[var(--text-color)] mb-2"><i class="bi bi-journal-text text-primary"></i> Read our Blog</h3>
                <p class="text-sm text-[var(--text-muted)]">Insights and guides on technology and digital growth.</p>
            </a>
        </div>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= site_url() ?>" class="px-6 py-3 bg-[var(--text-color)] text-[var(--bg-color)] rounded-lg font-medium hover:opacity-90 transition">
                <i class="bi bi-house-door"></i> Back to Home
            </a>
            <a href="<?= site_url('contact') ?>" class="px-6 py-3 border border-[var(--text-color)] text-[var(--text-color)] rounded-lg font-medium hover:bg-[var(--text-color)] hover:text-[var(--bg-color)] transition">
                Contact Support
            </a>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
