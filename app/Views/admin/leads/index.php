<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="px-6 py-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-text mb-2">Lead Management</h1>
            <p class="text-text-muted">Manage, track, and assign incoming client inquiries.</p>
        </div>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
        <div class="bg-surface p-4 rounded-xl border border-border shadow-sm text-center">
            <div class="text-3xl font-bold text-brand-primary mb-1"><?= esc($stats['new']) ?></div>
            <div class="text-xs font-bold text-text-muted uppercase tracking-wider">New</div>
        </div>
        <div class="bg-surface p-4 rounded-xl border border-border shadow-sm text-center">
            <div class="text-3xl font-bold text-blue-500 mb-1"><?= esc($stats['contacted']) ?></div>
            <div class="text-xs font-bold text-text-muted uppercase tracking-wider">Contacted</div>
        </div>
        <div class="bg-surface p-4 rounded-xl border border-border shadow-sm text-center">
            <div class="text-3xl font-bold text-yellow-500 mb-1"><?= esc($stats['qualified']) ?></div>
            <div class="text-xs font-bold text-text-muted uppercase tracking-wider">Qualified</div>
        </div>
        <div class="bg-surface p-4 rounded-xl border border-border shadow-sm text-center">
            <div class="text-3xl font-bold text-green-500 mb-1"><?= esc($stats['won']) ?></div>
            <div class="text-xs font-bold text-text-muted uppercase tracking-wider">Won</div>
        </div>
        <div class="bg-surface p-4 rounded-xl border border-border shadow-sm text-center">
            <div class="text-3xl font-bold text-red-500 mb-1"><?= esc($stats['lost']) ?></div>
            <div class="text-xs font-bold text-text-muted uppercase tracking-wider">Lost</div>
        </div>
    </div>

    <!-- Toolbar -->
    <div class="bg-surface p-4 rounded-xl border border-border shadow-sm mb-6 flex flex-col md:flex-row gap-4 items-center justify-between">
        <form action="<?= base_url('admin/leads') ?>" method="GET" class="flex-grow max-w-lg flex items-center">
            <div class="relative w-full">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-text-muted">
                    <i class="fa-solid fa-search"></i>
                </div>
                <input type="text" name="search" value="<?= esc($search) ?>" placeholder="Search by name, email, or company..." class="w-full pl-10 pr-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-brand-primary">
            </div>
            <select name="status" class="ml-4 px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none">
                <option value="">All Statuses</option>
                <option value="New" <?= $statusFilter === 'New' ? 'selected' : '' ?>>New</option>
                <option value="Contacted" <?= $statusFilter === 'Contacted' ? 'selected' : '' ?>>Contacted</option>
                <option value="Qualified" <?= $statusFilter === 'Qualified' ? 'selected' : '' ?>>Qualified</option>
                <option value="Proposal" <?= $statusFilter === 'Proposal' ? 'selected' : '' ?>>Proposal</option>
                <option value="Won" <?= $statusFilter === 'Won' ? 'selected' : '' ?>>Won</option>
                <option value="Lost" <?= $statusFilter === 'Lost' ? 'selected' : '' ?>>Lost</option>
                <option value="Spam" <?= $statusFilter === 'Spam' ? 'selected' : '' ?>>Spam</option>
            </select>
            <button type="submit" class="ml-4 px-6 py-2 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary transition-colors">
                Filter
            </button>
            <?php if ($search || $statusFilter): ?>
                <a href="<?= base_url('admin/leads') ?>" class="ml-4 text-text-muted hover:text-text transition-colors">Clear</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Leads Table -->
    <div class="bg-surface border border-border rounded-xl shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full whitespace-nowrap text-left">
                <thead>
                    <tr class="bg-surface-secondary text-text-muted text-xs uppercase tracking-wider font-bold">
                        <th class="px-6 py-4 border-b border-border">Contact Info</th>
                        <th class="px-6 py-4 border-b border-border">Company / Country</th>
                        <th class="px-6 py-4 border-b border-border">Status</th>
                        <th class="px-6 py-4 border-b border-border">Source</th>
                        <th class="px-6 py-4 border-b border-border">Date Received</th>
                        <th class="px-6 py-4 border-b border-border text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border text-sm">
                    <?php if (empty($leads)): ?>
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-text-muted">
                                No leads found matching your criteria.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($leads as $lead): ?>
                            <tr class="hover:bg-surface-secondary/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-bold text-text"><?= esc($lead['name']) ?></div>
                                    <div class="text-text-muted text-xs"><?= esc($lead['email']) ?></div>
                                    <?php if ($lead['phone']): ?>
                                        <div class="text-text-muted text-xs"><?= esc($lead['phone']) ?></div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-text font-medium"><?= esc($lead['company'] ?? '-') ?></div>
                                    <div class="text-text-muted text-xs"><?= esc($lead['country'] ?? '-') ?></div>
                                </td>
                                <td class="px-6 py-4">
                                    <?php
                                        $statusColors = [
                                            'New' => 'bg-brand-primary/10 text-brand-primary',
                                            'Contacted' => 'bg-blue-500/10 text-blue-500',
                                            'Qualified' => 'bg-yellow-500/10 text-yellow-500',
                                            'Proposal' => 'bg-purple-500/10 text-purple-500',
                                            'Won' => 'bg-green-500/10 text-green-500',
                                            'Lost' => 'bg-red-500/10 text-red-500',
                                            'Spam' => 'bg-gray-500/10 text-gray-500',
                                        ];
                                        $color = $statusColors[$lead['status']] ?? 'bg-surface-secondary text-text-muted';
                                    ?>
                                    <span class="px-3 py-1 rounded-full text-xs font-bold <?= $color ?>">
                                        <?= esc($lead['status']) ?>
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-text"><?= esc(ucfirst(str_replace('_', ' ', $lead['source_type']))) ?></div>
                                    <?php if ($lead['landing_page']): ?>
                                        <div class="text-text-muted text-xs truncate max-w-[150px] cursor-help" title="<?= esc($lead['landing_page']) ?>">
                                            <?= esc($lead['landing_page']) ?>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 text-text-muted">
                                    <?= date('M j, Y H:i', strtotime($lead['created_at'])) ?>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="<?= base_url('admin/leads/' . $lead['id']) ?>" class="px-4 py-2 bg-surface-secondary border border-border text-text text-xs font-bold rounded-lg hover:bg-brand-primary/10 hover:text-brand-primary hover:border-brand-primary/30 transition-colors">
                                        View Details
                                    </a>
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
