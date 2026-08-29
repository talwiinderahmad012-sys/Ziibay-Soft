<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Edit <?= esc($service['name']) ?> in <?= esc($location['name']) ?></h1>
        <?php if($ls['seo_readiness']): ?>
            <span class="badge bg-success fs-6"><i class="bi bi-check-circle"></i> SEO Ready</span>
        <?php else: ?>
            <span class="badge bg-warning text-dark fs-6"><i class="bi bi-exclamation-circle"></i> Needs SEO / Content Review</span>
        <?php endif; ?>
    </div>
    
    <?php if(session('error')): ?>
        <div class="alert alert-danger fw-bold"><?= session('error') ?></div>
    <?php endif; ?>
    <?php if(session('success')): ?>
        <div class="alert alert-success"><?= session('success') ?></div>
    <?php endif; ?>

    <?php if(!empty($warnings)): ?>
        <div class="alert alert-warning">
            <h5 class="alert-heading">Editorial Warnings</h5>
            <ul class="mb-0">
                <?php foreach($warnings as $w): ?>
                    <li><strong><?= esc($w) ?></strong></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/location-services/update/'.$ls['id']) ?>" method="POST">
        <?= csrf_field() ?>
        
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="draft" <?= $ls['status']=='draft'?'selected':'' ?>>Draft (Hidden)</option>
                    <option value="published" <?= $ls['status']=='published'?'selected':'' ?>>Published</option>
                </select>
            </div>
            <div class="col-md-6 d-flex align-items-end">
                <div class="form-check form-switch fs-5">
                    <input type="checkbox" name="is_indexable" class="form-check-input" value="1" <?= $ls['is_indexable']?'checked':'' ?>>
                    <label class="form-check-label">Indexable (Sitemap & Robots)</label>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-white"><h4 class="mb-0">Core Content</h4></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Intro / Hero Subtitle</label>
                    <textarea name="intro" class="form-control" rows="2" placeholder="Brief opening statement for this city..."><?= esc($ls['intro']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Main Content (Why us in this city?)</label>
                    <textarea name="content" class="form-control editor" rows="6"><?= esc($ls['content']) ?></textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow-sm">
            <div class="card-header bg-white"><h4 class="mb-0">Local Relevance Fields</h4></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Local Business Needs</label>
                    <textarea name="local_business_needs" class="form-control" rows="3" placeholder="What specific challenges do businesses in <?= esc($location['name']) ?> face?"><?= esc($ls['local_business_needs'] ?? '') ?></textarea>
                    <small class="text-muted">Avoid generic filler. Speak directly to the local market.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label">Local FAQs (Optional, HTML/JSON)</label>
                    <textarea name="local_faqs" class="form-control" rows="3" placeholder="Q: Do you offer local support in <?= esc($location['name']) ?>? A: ..."><?= esc($ls['local_faqs'] ?? '') ?></textarea>
                </div>
            </div>
        </div>

        <div class="card mb-4 shadow-sm border-info">
            <div class="card-header bg-info text-white"><h4 class="mb-0">SEO & Admin Data</h4></div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">SEO Title</label>
                    <input type="text" name="seo_title" class="form-control" value="<?= esc($ls['seo_title']) ?>">
                    <small class="text-muted">Target length: 50-60 chars.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">SEO Description</label>
                    <textarea name="seo_description" class="form-control" rows="2"><?= esc($ls['seo_description']) ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Canonical URL Override</label>
                    <input type="text" name="canonical_url" class="form-control" placeholder="Leave blank to self-reference" value="<?= esc($ls['canonical_url']) ?>">
                </div>
                <hr>
                <div class="mb-3">
                    <label class="form-label fw-bold">Internal Market Notes</label>
                    <textarea name="market_notes" class="form-control" rows="2" placeholder="E.g. High priority tier 1 market, target SaaS companies."><?= esc($ls['market_notes'] ?? '') ?></textarea>
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary btn-lg px-5">Save Changes</button>
        <a href="<?= site_url('admin/location-services?location_id='.$ls['location_id']) ?>" class="btn btn-secondary btn-lg ms-2">Cancel</a>
    </form>
</div>
<?= $this->endSection() ?>
