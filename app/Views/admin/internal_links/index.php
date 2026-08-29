<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3 mb-1">Internal Link Audit</h1>
            <p class="text-muted small mb-0">Identifies orphan pages, deep pages, and content with low discoverability. This is an editorial tool — not an SEO ranking predictor.</p>
        </div>
    </div>

    <?php if(session('success')): ?><div class="alert alert-success"><?= session('success') ?></div><?php endif; ?>
    <?php if(session('error')): ?><div class="alert alert-danger"><?= session('error') ?></div><?php endif; ?>

    <!-- Stats Row -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
                <div class="card-body py-3">
                    <div class="fs-2 fw-bold text-dark"><?= $stats['total'] ?></div>
                    <div class="text-muted small">Total Pages Tracked</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
                <div class="card-body py-3">
                    <div class="fs-2 fw-bold text-danger"><?= $stats['orphan_critical'] ?></div>
                    <div class="text-muted small">Critical Orphans (Priority)</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
                <div class="card-body py-3">
                    <div class="fs-2 fw-bold text-warning"><?= $stats['orphan_warning'] ?></div>
                    <div class="text-muted small">Orphan Warnings</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-0 shadow-sm">
                <div class="card-body py-3">
                    <div class="fs-2 fw-bold text-info"><?= $stats['deep_warning'] ?></div>
                    <div class="text-muted small">Deep Priority Pages</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Legend -->
    <div class="card mb-4 border-0 bg-light">
        <div class="card-body py-2 d-flex flex-wrap gap-4 small">
            <span><span class="badge bg-danger">Critical</span> Priority page, no inbound links</span>
            <span><span class="badge bg-warning text-dark">Warning</span> Normal page, no inbound links or too deep</span>
            <span><span class="badge bg-success">Healthy</span> Has inbound links from meaningful navigation</span>
            <span><span class="text-muted">Depth</span> = click distance from Home (0=Home, 1=direct nav, 2=hub→page…)</span>
        </div>
    </div>

    <!-- Filter by type -->
    <div class="mb-3 d-flex flex-wrap gap-2">
        <a href="#" class="btn btn-sm btn-outline-secondary filter-btn active" data-filter="all">All</a>
        <a href="#" class="btn btn-sm btn-outline-danger filter-btn" data-filter="orphan">Orphans Only</a>
        <a href="#" class="btn btn-sm btn-outline-primary filter-btn" data-filter="service">Services</a>
        <a href="#" class="btn btn-sm btn-outline-secondary filter-btn" data-filter="industry">Industries</a>
        <a href="#" class="btn btn-sm btn-outline-success filter-btn" data-filter="blog_post">Blog</a>
        <a href="#" class="btn btn-sm btn-outline-warning filter-btn" data-filter="case_study">Case Studies</a>
        <a href="#" class="btn btn-sm btn-outline-info filter-btn" data-filter="location">Locations</a>
        <a href="#" class="btn btn-sm btn-outline-dark filter-btn" data-filter="location_service">Loc-Service</a>
    </div>

    <!-- Main Table -->
    <div class="table-responsive">
        <table class="table table-hover table-sm align-middle" id="auditTable">
            <thead class="table-dark">
                <tr>
                    <th>Page / Entity</th>
                    <th>Type</th>
                    <th>Silo</th>
                    <th class="text-center">Depth</th>
                    <th class="text-center">Est. Inbound</th>
                    <th class="text-center">Status</th>
                    <th>Notes</th>
                    <th>Priority</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pages as $page): ?>
                    <?php
                    $statusBadge = match($page['status']) {
                        'orphan' => ($page['priority'] === 'priority') ? '<span class="badge bg-danger">Critical</span>' : '<span class="badge bg-warning text-dark">Warning</span>',
                        default  => '<span class="badge bg-success">Healthy</span>'
                    };
                    
                    // Deep page check
                    $depthBadge = '';
                    if (($page['depth'] ?? 0) > 3 && $page['priority'] === 'priority') {
                        $depthBadge = ' <span class="badge bg-info text-white" title="Important page at depth > 3">Deep</span>';
                    }
                    ?>
                    <tr data-type="<?= esc($page['entity_type']) ?>" data-status="<?= esc($page['status']) ?>">
                        <td>
                            <span class="fw-semibold text-dark"><?= esc($page['title']) ?></span>
                            <br><small class="text-muted font-monospace"><?= esc($page['url']) ?></small>
                        </td>
                        <td><span class="badge bg-secondary"><?= esc($page['type']) ?></span></td>
                        <td class="text-muted small"><?= esc($page['silo'] ?? '') ?></td>
                        <td class="text-center">
                            <?= esc($page['depth']) ?><?= $depthBadge ?>
                        </td>
                        <td class="text-center fw-semibold"><?= $page['inbound_estimate'] >= 99 ? '∞' : esc($page['inbound_estimate']) ?></td>
                        <td class="text-center"><?= $statusBadge ?></td>
                        <td class="small text-muted"><?= esc($page['note'] ?? '') ?></td>
                        <td>
                            <?php if($page['entity_id'] > 0 && $page['entity_type'] !== 'page'): ?>
                            <form method="POST" action="<?= site_url('admin/internal-links/set-priority') ?>" class="d-inline">
                                <?= csrf_field() ?>
                                <input type="hidden" name="entity_type" value="<?= esc($page['entity_type']) ?>">
                                <input type="hidden" name="entity_id" value="<?= esc($page['entity_id']) ?>">
                                <select name="priority" class="form-select form-select-sm d-inline-block w-auto" onchange="this.form.submit()">
                                    <option value="priority" <?= ($page['priority'] === 'priority') ? 'selected' : '' ?>>Priority</option>
                                    <option value="normal" <?= ($page['priority'] === 'normal') ? 'selected' : '' ?>>Normal</option>
                                    <option value="low" <?= ($page['priority'] === 'low') ? 'selected' : '' ?>>Low</option>
                                </select>
                            </form>
                            <?php else: ?>
                                <span class="badge bg-primary">Priority</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Recommendations Panel -->
    <div class="card mt-4 border-0 shadow-sm">
        <div class="card-header bg-white fw-bold">Editorial Recommendations</div>
        <div class="card-body">
            <ul class="mb-0 text-muted small">
                <li class="mb-2">🔴 <strong>Critical Orphans:</strong> Priority pages with no inbound links should be linked from a relevant hub (Services, Industries, or Blog).</li>
                <li class="mb-2">🟡 <strong>Deep Priority Pages:</strong> If an important page is deeper than depth 3, add a shortcut link from an appropriate hub page or the footer.</li>
                <li class="mb-2">📝 <strong>Blog posts without service links:</strong> Blog articles tagged with a service will automatically appear in the "Related Guides" section on that service page. Assign a <code>service_id</code> in the Blog CMS to activate this.</li>
                <li class="mb-2">📊 <strong>Location-service pages with "Low content":</strong> These pages are published but lack sufficient unique content. Edit them in the Location Matrix to add unique intro, content, or local relevance fields before indexing.</li>
                <li class="mb-2">🌐 <strong>Sitemap ≠ Internal Links:</strong> A page appearing in the sitemap does not mean it is discoverable via navigation. Both are needed.</li>
            </ul>
        </div>
    </div>

</div>

<script>
document.querySelectorAll('.filter-btn').forEach(function(btn) {
    btn.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        var filter = this.dataset.filter;
        document.querySelectorAll('#auditTable tbody tr').forEach(function(row) {
            if (filter === 'all') {
                row.style.display = '';
            } else if (filter === 'orphan') {
                row.style.display = row.dataset.status === 'orphan' ? '' : 'none';
            } else {
                row.style.display = row.dataset.type === filter ? '' : 'none';
            }
        });
    });
});
</script>
<?= $this->endSection() ?>
