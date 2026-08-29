<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <div class="mb-4">
        <a href="<?= site_url('admin/seo-keywords') ?>" class="btn btn-outline-secondary">← Back to Keywords</a>
        <a href="<?= base_url(esc($targetUrl)) ?>" target="_blank" class="btn btn-outline-primary ms-2">View Live Page</a>
    </div>

    <div class="card shadow-sm mb-4 border-top-primary">
        <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Content Brief</h4>
            <span class="text-muted">Target URL: <strong>/<?= esc($targetUrl) ?></strong></span>
        </div>
        <div class="card-body">
            
            <div class="row mb-5">
                <div class="col-md-12">
                    <h5 class="text-primary border-bottom pb-2 mb-3">Primary Target</h5>
                    <?php if(empty($primary)): ?>
                        <div class="alert alert-warning">No Primary Keyword assigned to this URL. You should assign one.</div>
                    <?php else: ?>
                        <?php foreach($primary as $p): ?>
                            <div class="card bg-light mb-3 border-0">
                                <div class="card-body">
                                    <h3 class="mb-1 text-dark"><?= esc($p['keyword']) ?></h3>
                                    <div class="mb-2">
                                        <span class="badge bg-info text-dark">Intent: <?= esc($p['intent']) ?></span>
                                        <span class="badge bg-secondary">Priority: <?= esc($p['priority']) ?></span>
                                    </div>
                                    <?php if($p['notes']): ?>
                                        <p class="text-muted small mb-0 mt-2"><strong>Notes:</strong> <?= nl2br(esc($p['notes'])) ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php if(count($primary) > 1): ?>
                            <div class="alert alert-danger mt-2">
                                <i class="bi bi-exclamation-triangle-fill"></i> Warning: Multiple Primary Keywords assigned to the same URL. This can dilute SEO focus.
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="text-secondary border-bottom pb-2 mb-3">Secondary Keywords</h5>
                    <?php if(empty($secondary)): ?>
                        <p class="text-muted small">None assigned.</p>
                    <?php else: ?>
                        <ul class="list-group list-group-flush">
                        <?php foreach($secondary as $s): ?>
                            <li class="list-group-item bg-transparent px-0 border-0 py-1">
                                <i class="bi bi-check2 text-success me-2"></i><?= esc($s['keyword']) ?>
                                <span class="text-muted small ms-1">(<?= esc($s['intent']) ?>)</span>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="text-secondary border-bottom pb-2 mb-3">Semantic Concepts</h5>
                    <?php if(empty($semantic)): ?>
                        <p class="text-muted small">None assigned.</p>
                    <?php else: ?>
                        <div class="d-flex flex-wrap gap-2">
                        <?php foreach($semantic as $sem): ?>
                            <span class="badge bg-light text-dark border p-2"><?= esc($sem['keyword']) ?></span>
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-4 mb-4">
                    <h5 class="text-secondary border-bottom pb-2 mb-3">Questions / FAQs</h5>
                    <?php if(empty($questions)): ?>
                        <p class="text-muted small">None assigned.</p>
                    <?php else: ?>
                        <ul class="list-group list-group-flush">
                        <?php foreach($questions as $q): ?>
                            <li class="list-group-item bg-transparent px-0 border-0 py-1">
                                <i class="bi bi-question-circle text-primary me-2"></i><?= esc($q['keyword']) ?>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>

            <hr>
            <div class="alert alert-info bg-light border-0 text-dark mt-4">
                <h6 class="alert-heading fw-bold"><i class="bi bi-info-circle me-2"></i> Content Guidelines</h6>
                <p class="mb-0 small">Use this brief as a guide for content creation. Do NOT stuff these keywords unnaturally. Focus on comprehensively answering the search intent and thoroughly covering the semantic concepts assigned above.</p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
