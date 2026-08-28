<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-text mb-2">Case Studies</h1>
            <p class="text-text-muted">Manage your detailed case studies.</p>
        </div>
        <a href="<?= base_url('admin/case-studies/create') ?>" class="px-4 py-2 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary transition-colors">
            <i class="fa-solid fa-plus mr-2"></i> New Case Study
        </a>
    </div>

    <!-- Toolbar -->
    <div class="bg-surface p-4 rounded-xl border border-border shadow-sm mb-6 flex flex-col md:flex-row gap-4 items-center justify-between">
        <form action="<?= base_url('admin/case-studies') ?>" method="GET" class="flex-grow max-w-lg flex items-center">
            <div class="relative w-full">
                <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Search case studies..." class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-brand-primary">
            </div>
            <select name="status" class="ml-4 px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none">
                <option value="">All Statuses</option>
                <option value="published" <?= $statusFilter === 'published' ? 'selected' : '' ?>>Published</option>
                <option value="draft" <?= $statusFilter === 'draft' ? 'selected' : '' ?>>Draft</option>
                <option value="archived" <?= $statusFilter === 'archived' ? 'selected' : '' ?>>Archived</option>
            </select>
            <button type="submit" class="ml-4 px-6 py-2 bg-surface-secondary border border-border text-text font-bold rounded-lg hover:bg-surface-hover transition-colors">
                Filter
            </button>
        </form>
    </div>

    <div class="bg-surface border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead>
                    <tr class="bg-surface-secondary text-text-muted text-xs uppercase font-bold border-b border-border">
                        <th class="px-6 py-4">Title</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Featured</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border text-sm">
                    <?php if (empty($case_studies)): ?>
                        <tr><td colspan="4" class="px-6 py-12 text-center text-text-muted">No case studies found.</td></tr>
                    <?php else: ?>
                        <?php foreach ($case_studies as $cs): ?>
                            <tr class="hover:bg-surface-secondary/50">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-text"><?= esc($cs['title']) ?></div>
                                    <div class="text-xs text-text-muted"><?= esc($cs['slug']) ?></div>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="<?= base_url('admin/case-studies/toggleStatus/' . $cs['id']) ?>">
                                        <span class="px-3 py-1 rounded-full text-xs font-bold <?= $cs['status'] === 'published' ? 'bg-green-500/10 text-green-500' : ($cs['status'] === 'draft' ? 'bg-yellow-500/10 text-yellow-500' : 'bg-red-500/10 text-red-500') ?>">
                                            <?= esc(ucfirst($cs['status'])) ?>
                                        </span>
                                    </a>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="<?= base_url('admin/case-studies/toggleFeatured/' . $cs['id']) ?>" class="<?= $cs['featured'] ? 'text-yellow-500' : 'text-text-muted' ?>">
                                        <i class="fa-<?= $cs['featured'] ? 'solid' : 'regular' ?> fa-star text-lg"></i>
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="<?= base_url('admin/case-studies/edit/' . $cs['id']) ?>" class="px-3 py-1 bg-surface-secondary border border-border rounded text-text hover:text-brand-primary">Edit</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if ($pager->getPageCount() > 1): ?>
        <div class="p-4 border-t border-border flex justify-end">
            <?= $pager->links() ?>
        </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>
