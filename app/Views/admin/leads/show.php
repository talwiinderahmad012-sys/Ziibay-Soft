<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>

<div class="px-6 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <div>
            <div class="flex items-center gap-3 mb-2">
                <a href="<?= base_url('admin/leads') ?>" class="text-text-muted hover:text-brand-primary transition-colors">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <h1 class="text-3xl font-bold text-text">Lead: <?= esc($lead['name']) ?></h1>
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
            </div>
            <p class="text-text-muted text-sm ml-7">
                Received on <?= date('F j, Y g:i a', strtotime($lead['created_at'])) ?> via <?= esc($lead['source_type']) ?>
            </p>
        </div>
        
        <div class="flex items-center gap-3">
            <form action="<?= base_url('admin/leads/update-status/' . $lead['id']) ?>" method="POST" class="flex items-center gap-2">
                <?= csrf_field() ?>
                <select name="status" class="px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-brand-primary text-sm" onchange="this.form.submit()">
                    <option value="New" <?= $lead['status'] === 'New' ? 'selected' : '' ?>>New</option>
                    <option value="Contacted" <?= $lead['status'] === 'Contacted' ? 'selected' : '' ?>>Contacted</option>
                    <option value="Qualified" <?= $lead['status'] === 'Qualified' ? 'selected' : '' ?>>Qualified</option>
                    <option value="Proposal" <?= $lead['status'] === 'Proposal' ? 'selected' : '' ?>>Proposal</option>
                    <option value="Won" <?= $lead['status'] === 'Won' ? 'selected' : '' ?>>Won</option>
                    <option value="Lost" <?= $lead['status'] === 'Lost' ? 'selected' : '' ?>>Lost</option>
                    <option value="Spam" <?= $lead['status'] === 'Spam' ? 'selected' : '' ?>>Spam</option>
                </select>
            </form>
        </div>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-8 rounded shadow-sm">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-8 rounded shadow-sm">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Details -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Message Block -->
            <div class="bg-surface rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="bg-surface-secondary px-6 py-4 border-b border-border flex items-center gap-3">
                    <i class="fa-regular fa-comment-dots text-brand-primary text-lg"></i>
                    <h3 class="font-bold text-text">Inquiry Message</h3>
                </div>
                <div class="p-6">
                    <p class="text-text whitespace-pre-wrap font-medium leading-relaxed"><?= esc($lead['message']) ?></p>
                </div>
            </div>

            <!-- Project Details -->
            <div class="bg-surface rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="bg-surface-secondary px-6 py-4 border-b border-border flex items-center gap-3">
                    <i class="fa-solid fa-briefcase text-brand-primary text-lg"></i>
                    <h3 class="font-bold text-text">Project Information</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Services Requested</div>
                        <?php if (!empty($services)): ?>
                            <div class="flex flex-wrap gap-2 mt-2">
                                <?php foreach ($services as $srv): ?>
                                    <span class="px-3 py-1 bg-brand-primary/10 text-brand-primary text-xs font-bold rounded-full">
                                        <?= esc($srv['name']) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-text font-medium">-</div>
                        <?php endif; ?>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Project Type</div>
                        <div class="text-text font-medium"><?= esc($lead['project_type'] ?? '-') ?></div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Budget Range</div>
                        <div class="text-text font-medium"><?= esc($lead['budget'] ?? '-') ?></div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Timeline</div>
                        <div class="text-text font-medium"><?= esc($lead['timeline'] ?? '-') ?></div>
                    </div>
                </div>
            </div>

            <!-- Internal Notes -->
            <div class="bg-surface rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="bg-surface-secondary px-6 py-4 border-b border-border flex items-center gap-3">
                    <i class="fa-regular fa-note-sticky text-brand-primary text-lg"></i>
                    <h3 class="font-bold text-text">Internal Notes</h3>
                </div>
                <div class="p-6">
                    <!-- Add Note Form -->
                    <form action="<?= base_url('admin/leads/add-note/' . $lead['id']) ?>" method="POST" class="mb-6">
                        <?= csrf_field() ?>
                        <textarea name="note" rows="3" required class="w-full px-4 py-3 bg-surface-secondary border border-border rounded-xl text-text focus:outline-none focus:ring-2 focus:ring-brand-primary mb-3 resize-none" placeholder="Add an internal note about this lead..."></textarea>
                        <div class="flex justify-end">
                            <button type="submit" class="px-6 py-2 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary transition-colors text-sm">
                                Save Note
                            </button>
                        </div>
                    </form>

                    <!-- Notes List -->
                    <div class="space-y-4">
                        <?php if (empty($notes)): ?>
                            <div class="text-center py-4 text-text-muted text-sm">No internal notes yet.</div>
                        <?php else: ?>
                            <?php foreach ($notes as $note): ?>
                                <div class="bg-surface-secondary border border-border rounded-xl p-4">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="font-bold text-sm text-text"><?= esc($note['user_name'] ?? 'Admin') ?></div>
                                        <div class="text-xs text-text-muted"><?= date('M j, Y H:i', strtotime($note['created_at'])) ?></div>
                                    </div>
                                    <p class="text-sm text-text-muted whitespace-pre-wrap"><?= esc($note['note']) ?></p>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        <!-- Right Column: Sidebar -->
        <div class="space-y-8">
            
            <!-- Contact Info -->
            <div class="bg-surface rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="bg-surface-secondary px-6 py-4 border-b border-border flex items-center gap-3">
                    <i class="fa-regular fa-address-card text-brand-primary text-lg"></i>
                    <h3 class="font-bold text-text">Contact Details</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Name</div>
                        <div class="text-text font-medium"><?= esc($lead['name']) ?></div>
                    </div>
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Email</div>
                        <a href="mailto:<?= esc($lead['email']) ?>" class="text-brand-primary font-medium hover:underline">
                            <?= esc($lead['email']) ?>
                        </a>
                    </div>
                    <?php if ($lead['phone']): ?>
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Phone / WhatsApp</div>
                        <a href="tel:<?= esc($lead['phone']) ?>" class="text-brand-primary font-medium hover:underline flex items-center gap-2">
                            <?= esc($lead['phone']) ?>
                        </a>
                        <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $lead['phone']) ?>" target="_blank" class="text-xs text-[#25D366] font-bold mt-1 inline-block hover:underline">
                            <i class="fa-brands fa-whatsapp"></i> Message on WhatsApp
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php if ($lead['company']): ?>
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Company</div>
                        <div class="text-text font-medium"><?= esc($lead['company']) ?></div>
                    </div>
                    <?php endif; ?>
                    <?php if ($lead['country']): ?>
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Country</div>
                        <div class="text-text font-medium"><?= esc($lead['country']) ?></div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Assignment -->
            <div class="bg-surface rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="bg-surface-secondary px-6 py-4 border-b border-border flex items-center gap-3">
                    <i class="fa-solid fa-user-plus text-brand-primary text-lg"></i>
                    <h3 class="font-bold text-text">Assignment</h3>
                </div>
                <div class="p-6">
                    <form action="<?= base_url('admin/leads/assign/' . $lead['id']) ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-4">
                            <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-2">Assigned To</div>
                            <select name="assigned_user_id" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:ring-2 focus:ring-brand-primary text-sm mb-3">
                                <option value="">Unassigned</option>
                                <?php foreach ($teamMembers as $tm): ?>
                                    <option value="<?= $tm['id'] ?>" <?= $lead['assigned_user_id'] == $tm['id'] ? 'selected' : '' ?>>
                                        <?= esc($tm['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="w-full py-2 bg-surface-secondary border border-border text-text font-bold rounded-lg hover:bg-brand-primary/10 hover:text-brand-primary hover:border-brand-primary/30 transition-colors text-sm">
                            Update Assignment
                        </button>
                    </form>
                </div>
            </div>

            <!-- Origin Info -->
            <div class="bg-surface rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="bg-surface-secondary px-6 py-4 border-b border-border flex items-center gap-3">
                    <i class="fa-solid fa-globe text-brand-primary text-lg"></i>
                    <h3 class="font-bold text-text">Origin Details</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Landing Page</div>
                        <div class="text-text text-sm break-all">
                            <?= $lead['landing_page'] ? esc($lead['landing_page']) : '-' ?>
                        </div>
                    </div>
                    <?php if ($lead['source_url']): ?>
                    <div>
                        <div class="text-xs font-bold text-text-muted uppercase tracking-wider mb-1">Referrer URL</div>
                        <div class="text-text text-sm break-all">
                            <?= esc($lead['source_url']) ?>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <!-- Activity Timeline -->
            <div class="bg-surface rounded-2xl border border-border shadow-sm overflow-hidden">
                <div class="bg-surface-secondary px-6 py-4 border-b border-border flex items-center gap-3">
                    <i class="fa-solid fa-clock-rotate-left text-brand-primary text-lg"></i>
                    <h3 class="font-bold text-text">Activity Log</h3>
                </div>
                <div class="p-6">
                    <div class="space-y-6 relative before:absolute before:inset-0 before:ml-5 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-border before:to-transparent">
                        <?php if (empty($activities)): ?>
                            <div class="text-center py-2 text-text-muted text-sm">No activity recorded.</div>
                        <?php else: ?>
                            <?php foreach ($activities as $activity): ?>
                                <div class="relative flex items-center justify-between md:justify-normal md:odd:flex-row-reverse group is-active">
                                    <div class="flex items-center justify-center w-4 h-4 rounded-full border-2 border-surface bg-brand-primary text-surface shadow shrink-0 md:order-1 md:group-odd:-translate-x-1/2 md:group-even:translate-x-1/2 z-10 absolute left-4 md:left-1/2 transform -translate-x-1/2"></div>
                                    <div class="w-[calc(100%-3rem)] md:w-[calc(50%-1.5rem)] bg-surface-secondary p-3 rounded-lg border border-border ml-10 md:ml-0">
                                        <div class="text-xs text-text-muted mb-1"><?= date('M j, Y H:i', strtotime($activity['created_at'])) ?></div>
                                        <div class="text-sm font-bold text-text mb-1"><?= esc($activity['action']) ?></div>
                                        <div class="text-xs text-text-muted"><?= esc($activity['details']) ?></div>
                                        <?php if ($activity['user_name']): ?>
                                            <div class="text-xs text-brand-primary mt-1 font-medium">By <?= esc($activity['user_name']) ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
