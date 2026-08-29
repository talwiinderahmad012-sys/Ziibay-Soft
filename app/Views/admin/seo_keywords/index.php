<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800">SEO Keywords & Intent Mapping</h1>
        <a href="<?= site_url('admin/seo-keywords/create') ?>" class="btn btn-success">Add Keyword</a>
    </div>

    <?php if(session()->getFlashdata('message')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <!-- Filters -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="<?= site_url('admin/seo-keywords') ?>" method="GET" class="row g-3">
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Search keywords..." value="<?= esc($search) ?>">
                </div>
                <div class="col-md-2">
                    <select name="intent" class="form-select">
                        <option value="">All Intents</option>
                        <option value="commercial" <?= $intent == 'commercial' ? 'selected':'' ?>>Commercial</option>
                        <option value="transactional" <?= $intent == 'transactional' ? 'selected':'' ?>>Transactional</option>
                        <option value="informational" <?= $intent == 'informational' ? 'selected':'' ?>>Informational</option>
                        <option value="navigational" <?= $intent == 'navigational' ? 'selected':'' ?>>Navigational</option>
                        <option value="local_commercial" <?= $intent == 'local_commercial' ? 'selected':'' ?>>Local Commercial</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="type" class="form-select">
                        <option value="">All Types</option>
                        <option value="primary" <?= $type == 'primary' ? 'selected':'' ?>>Primary</option>
                        <option value="secondary" <?= $type == 'secondary' ? 'selected':'' ?>>Secondary</option>
                        <option value="semantic" <?= $type == 'semantic' ? 'selected':'' ?>>Semantic</option>
                        <option value="long_tail" <?= $type == 'long_tail' ? 'selected':'' ?>>Long-tail</option>
                        <option value="question" <?= $type == 'question' ? 'selected':'' ?>>Question</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">All Statuses</option>
                        <option value="active" <?= $status == 'active' ? 'selected':'' ?>>Active</option>
                        <option value="draft" <?= $status == 'draft' ? 'selected':'' ?>>Draft</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Keyword Table -->
    <div class="card">
        <div class="card-body p-0 table-responsive">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Keyword</th>
                        <th>Intent</th>
                        <th>Type</th>
                        <th>Priority</th>
                        <th>Target URL</th>
                        <th>Warnings</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($keywords)): ?>
                        <tr><td colspan="7" class="text-center py-4">No keywords found.</td></tr>
                    <?php endif; ?>
                    <?php foreach($keywords as $k): ?>
                    <tr>
                        <td>
                            <strong><?= esc($k['keyword']) ?></strong>
                            <?php if($k['status'] === 'draft'): ?>
                                <span class="badge bg-secondary ms-2">Draft</span>
                            <?php endif; ?>
                        </td>
                        <td><span class="badge bg-info text-dark"><?= esc($k['intent']) ?></span></td>
                        <td>
                            <?php if($k['keyword_type'] === 'primary'): ?>
                                <span class="badge bg-primary">Primary</span>
                            <?php else: ?>
                                <span class="badge bg-light text-dark border"><?= esc($k['keyword_type']) ?></span>
                            <?php endif; ?>
                        </td>
                        <td><?= ucfirst(esc($k['priority'])) ?></td>
                        <td>
                            <?php if($k['target_url']): ?>
                                <a href="<?= base_url(esc($k['target_url'])) ?>" target="_blank" class="text-decoration-none small">/<?= esc($k['target_url']) ?></a>
                                <br>
                                <a href="<?= site_url('admin/seo-keywords/brief?url=' . urlencode($k['target_url'])) ?>" class="badge bg-primary text-decoration-none mt-1">View Brief</a>
                            <?php else: ?>
                                <span class="text-muted small">Unmapped</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($k['cannibalization_warning']): ?>
                                <span class="badge bg-danger"><i class="bi bi-exclamation-triangle"></i> Cannibalization</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?= site_url('admin/seo-keywords/edit/'.$k['id']) ?>" class="btn btn-sm btn-outline-primary">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4">
        <?= $pager->links() ?>
    </div>
</div>
<?= $this->endSection() ?>
