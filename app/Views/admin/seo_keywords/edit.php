<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <div class="mb-4 d-flex justify-content-between">
        <a href="<?= site_url('admin/seo-keywords') ?>" class="btn btn-outline-secondary">← Back to Keywords</a>
        <?php if($keyword['target_url']): ?>
            <a href="<?= site_url('admin/seo-keywords/brief?url=' . urlencode($keyword['target_url'])) ?>" class="btn btn-primary">View Content Brief</a>
        <?php endif; ?>
    </div>

    <div class="card shadow-sm max-w-4xl">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Edit SEO Keyword</h4>
        </div>
        <div class="card-body">
            
            <?php if(session('errors')): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    <?php foreach(session('errors') as $e): ?>
                        <li><?= esc($e) ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('admin/seo-keywords/update/'.$keyword['id']) ?>" method="POST">
                <?= csrf_field() ?>
                
                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Keyword *</label>
                        <input type="text" name="keyword" class="form-control" value="<?= old('keyword', $keyword['keyword']) ?>" required>
                        <div class="form-text">Normalized value: <code><?= esc($keyword['normalized_keyword']) ?></code></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Intent *</label>
                        <select name="intent" class="form-select" required>
                            <option value="commercial" <?= old('intent', $keyword['intent'])=='commercial'?'selected':'' ?>>Commercial (Evaluating Services)</option>
                            <option value="transactional" <?= old('intent', $keyword['intent'])=='transactional'?'selected':'' ?>>Transactional (Ready to Hire/Buy)</option>
                            <option value="informational" <?= old('intent', $keyword['intent'])=='informational'?'selected':'' ?>>Informational (Blogs/Guides)</option>
                            <option value="navigational" <?= old('intent', $keyword['intent'])=='navigational'?'selected':'' ?>>Navigational (Brand Search)</option>
                            <option value="local_commercial" <?= old('intent', $keyword['intent'])=='local_commercial'?'selected':'' ?>>Local Commercial (City Specific)</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Keyword Type *</label>
                        <select name="keyword_type" class="form-select" required>
                            <option value="primary" <?= old('keyword_type', $keyword['keyword_type'])=='primary'?'selected':'' ?>>Primary</option>
                            <option value="secondary" <?= old('keyword_type', $keyword['keyword_type'])=='secondary'?'selected':'' ?>>Secondary</option>
                            <option value="semantic" <?= old('keyword_type', $keyword['keyword_type'])=='semantic'?'selected':'' ?>>Semantic / Concept</option>
                            <option value="long_tail" <?= old('keyword_type', $keyword['keyword_type'])=='long_tail'?'selected':'' ?>>Long-tail</option>
                            <option value="question" <?= old('keyword_type', $keyword['keyword_type'])=='question'?'selected':'' ?>>Question</option>
                        </select>
                    </div>
                </div>

                <hr class="my-4">
                <h5 class="mb-3">Mapping (Optional)</h5>

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Related Service</label>
                        <select name="service_id" class="form-select">
                            <option value="">None</option>
                            <?php foreach($services as $s): ?>
                                <option value="<?= $s['id'] ?>" <?= old('service_id', $keyword['service_id'])==$s['id']?'selected':'' ?>><?= esc($s['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Related Location</label>
                        <select name="location_id" class="form-select">
                            <option value="">None</option>
                            <?php foreach($locations as $l): ?>
                                <option value="<?= $l['id'] ?>" <?= old('location_id', $keyword['location_id'])==$l['id']?'selected':'' ?>><?= esc($l['name']) ?> (<?= esc($l['location_type']) ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Related Industry</label>
                        <select name="industry_id" class="form-select">
                            <option value="">None</option>
                            <?php foreach($industries as $i): ?>
                                <option value="<?= $i['id'] ?>" <?= old('industry_id', $keyword['industry_id'])==$i['id']?'selected':'' ?>><?= esc($i['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <label class="form-label fw-bold">Target URL</label>
                        <input type="text" name="target_url" class="form-control" value="<?= old('target_url', $keyword['target_url']) ?>" placeholder="e.g. services/web-development">
                        <div class="form-text">The exact path (without leading slash) where this keyword should rank.</div>
                    </div>
                </div>

                <hr class="my-4">
                <h5 class="mb-3">Admin Details</h5>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Priority *</label>
                        <select name="priority" class="form-select" required>
                            <option value="high" <?= old('priority', $keyword['priority'])=='high'?'selected':'' ?>>High</option>
                            <option value="medium" <?= old('priority', $keyword['priority'])=='medium'?'selected':'' ?>>Medium</option>
                            <option value="low" <?= old('priority', $keyword['priority'])=='low'?'selected':'' ?>>Low</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="active" <?= old('status', $keyword['status'])=='active'?'selected':'' ?>>Active</option>
                            <option value="draft" <?= old('status', $keyword['status'])=='draft'?'selected':'' ?>>Draft</option>
                            <option value="archived" <?= old('status', $keyword['status'])=='archived'?'selected':'' ?>>Archived</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-12">
                        <label class="form-label">Internal Notes</label>
                        <textarea name="notes" class="form-control" rows="3"><?= old('notes', $keyword['notes']) ?></textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary px-5">Update Keyword</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
