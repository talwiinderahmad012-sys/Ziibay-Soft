<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-text mb-2">FAQ Management</h1>
            <p class="text-text-muted">Manage global and contextual FAQs across the website.</p>
        </div>
        <div>
            <a href="<?= base_url('admin/faqs/create') ?>" class="bg-brand-primary text-white font-bold py-2 px-6 rounded-lg hover:bg-brand-secondary transition-colors inline-flex items-center">
                <i class="fa-solid fa-plus mr-2"></i> Create FAQ
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <!-- Toolbar -->
    <div class="bg-surface p-4 rounded-xl border border-border shadow-sm mb-6 flex flex-col md:flex-row gap-4 items-center justify-between">
        <form action="<?= base_url('admin/faqs') ?>" method="GET" class="flex-grow max-w-lg flex items-center">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-text-muted">
                    <i class="fa-solid fa-search"></i>
                </div>
                <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Search FAQs..." class="w-full pl-10 pr-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-brand-primary">
            </div>
            <button type="submit" class="ml-4 px-6 py-2 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary transition-colors">
                Search
            </button>
            <?php if ($search): ?>
                <a href="<?= base_url('admin/faqs') ?>" class="ml-4 text-text-muted hover:text-text transition-colors">Clear</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Table -->
    <div class="bg-surface border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left whitespace-nowrap">
                <thead>
                    <tr class="bg-surface-secondary text-text-muted text-xs uppercase tracking-wider font-bold">
                        <th class="px-6 py-4 border-b border-border w-16">Sort</th>
                        <th class="px-6 py-4 border-b border-border">Question</th>
                        <th class="px-6 py-4 border-b border-border">Status</th>
                        <th class="px-6 py-4 border-b border-border text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border text-sm">
                    <?php if (empty($faqs)): ?>
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center text-text-muted">
                                No FAQs found.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($faqs as $faq): ?>
                            <tr class="hover:bg-surface-secondary/50 transition-colors">
                                <td class="px-6 py-4 text-text-muted font-mono">
                                    <?= esc($faq['sort_order']) ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="font-bold text-text truncate max-w-md" title="<?= esc($faq['question']) ?>">
                                        <?= esc($faq['question']) ?>
                                    </div>
                                    <div class="text-text-muted text-xs truncate max-w-md mt-1" title="<?= esc(strip_tags($faq['answer'])) ?>">
                                        <?= esc(strip_tags($faq['answer'])) ?>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="<?= base_url('admin/faqs/toggle-status/' . $faq['id']) ?>" method="POST">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="px-3 py-1 rounded-full text-xs font-bold transition-colors <?= $faq['status'] === 'active' ? 'bg-green-100 text-green-700 hover:bg-green-200' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' ?>" title="Click to toggle">
                                            <?= esc(ucfirst($faq['status'])) ?>
                                        </button>
                                    </form>
                                </td>
                                <td class="px-6 py-4 text-right space-x-2">
                                    <a href="<?= base_url('admin/faqs/edit/' . $faq['id']) ?>" class="text-brand-primary hover:text-brand-secondary p-2 transition-colors">
                                        <i class="fa-solid fa-edit"></i>
                                    </a>
                                    <form action="<?= base_url('admin/faqs/delete/' . $faq['id']) ?>" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this FAQ?');">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="text-red-500 hover:text-red-700 p-2 transition-colors">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
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
