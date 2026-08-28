<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="mb-8">
    <h1 class="text-2xl font-bold text-text mb-2">Dashboard</h1>
    <p class="text-text-muted text-sm">System overview and quick statistics.</p>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-surface border border-border rounded-xl p-6">
        <h3 class="text-text-muted text-sm font-medium mb-2">Total Services</h3>
        <p class="text-3xl font-bold text-text"><?= $stats['total_services'] ?></p>
    </div>
    <div class="bg-surface border border-border rounded-xl p-6">
        <h3 class="text-text-muted text-sm font-medium mb-2">Published Services</h3>
        <p class="text-3xl font-bold text-text"><?= $stats['published_services'] ?></p>
    </div>
    <div class="bg-surface border border-border rounded-xl p-6">
        <h3 class="text-text-muted text-sm font-medium mb-2">Team Members</h3>
        <p class="text-3xl font-bold text-text"><?= $stats['team_members'] ?></p>
    </div>
    <div class="bg-surface border border-border rounded-xl p-6">
        <h3 class="text-text-muted text-sm font-medium mb-2">Portfolio Projects</h3>
        <p class="text-3xl font-bold text-text"><?= $stats['portfolio_projects'] ?></p>
    </div>
    <div class="bg-surface border border-border rounded-xl p-6">
        <h3 class="text-text-muted text-sm font-medium mb-2">Blog Posts</h3>
        <p class="text-3xl font-bold text-text"><?= $stats['blog_posts'] ?></p>
    </div>
    <div class="bg-surface border border-border rounded-xl p-6">
        <h3 class="text-text-muted text-sm font-medium mb-2">Leads</h3>
        <p class="text-3xl font-bold text-text"><?= $stats['leads'] ?></p>
    </div>
</div>
<?= $this->endSection() ?>
