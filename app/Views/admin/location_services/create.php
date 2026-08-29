<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <div class="mb-4">
        <a href="<?= site_url('admin/location-services') ?>" class="btn btn-outline-secondary">← Back to Location Pages</a>
    </div>

    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0">Create Location-Service Page</h4>
        </div>
        <div class="card-body">

            <?php if(session('error')): ?>
                <div class="alert alert-danger fw-bold"><?= session('error') ?></div>
            <?php endif; ?>
            <?php if(!empty(session('errors'))): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    <?php foreach(session('errors') as $e): ?>
                        <li><?= esc($e) ?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('admin/location-services') ?>" method="POST">
                <?= csrf_field() ?>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">City *</label>
                        <select name="location_id" class="form-select" required>
                            <option value="">Select City...</option>
                            <?php foreach($locations as $l): ?>
                                <option value="<?= $l['id'] ?>" <?= old('location_id', $preselected_location)==$l['id']?'selected':'' ?>>
                                    <?= esc($l['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Service *</label>
                        <select name="service_id" class="form-select" required>
                            <option value="">Select Service...</option>
                            <?php foreach($services as $s): ?>
                                <option value="<?= $s['id'] ?>" <?= old('service_id', $preselected_service)==$s['id']?'selected':'' ?>>
                                    <?= esc($s['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Status *</label>
                        <select name="status" class="form-select" required>
                            <option value="draft" selected>Draft (Recommended for new pages)</option>
                            <option value="published">Published</option>
                        </select>
                        <div class="form-text text-warning fw-semibold">Always create as Draft. Review &amp; complete content before publishing.</div>
                    </div>
                    <div class="col-md-6 d-flex align-items-center pt-4">
                        <div class="form-check form-switch">
                            <input type="checkbox" name="is_indexable" class="form-check-input" value="1">
                            <label class="form-check-label">Allow Indexing (only when published)</label>
                        </div>
                    </div>
                </div>

                <hr class="my-4">
                <h5>Core Content</h5>
                <p class="text-muted small">Write genuine unique content. Do NOT simply insert a city name into a generic template.</p>

                <div class="mb-3">
                    <label class="form-label fw-bold">Hero Intro</label>
                    <textarea name="intro" class="form-control" rows="2" placeholder="E.g. Ziibay Soft provides custom web development services to businesses in Los Angeles, helping them..."><?= old('intro') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Main Content</label>
                    <textarea name="content" class="form-control editor" rows="8"><?= old('content') ?></textarea>
                    <div class="form-text">Minimum recommended: 300 characters of genuine unique content about this service in this location.</div>
                </div>

                <hr class="my-4">
                <h5>Local Relevance</h5>

                <div class="mb-3">
                    <label class="form-label">Local Business Needs</label>
                    <textarea name="local_business_needs" class="form-control" rows="3" placeholder="What challenges do businesses in this city face that this service addresses?"><?= old('local_business_needs') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Location-Specific FAQs</label>
                    <textarea name="local_faqs" class="form-control" rows="3" placeholder="Q: Do you work with businesses in this city? A: Yes, Ziibay Soft works with businesses in [city] remotely..."><?= old('local_faqs') ?></textarea>
                </div>

                <hr class="my-4">
                <h5>SEO Metadata</h5>

                <div class="mb-3">
                    <label class="form-label fw-bold">SEO Title</label>
                    <input type="text" name="seo_title" class="form-control" value="<?= old('seo_title') ?>" placeholder="E.g. Web Development Company in Los Angeles | Ziibay Soft">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">SEO Description</label>
                    <textarea name="seo_description" class="form-control" rows="2" placeholder="A genuinely useful description..."><?= old('seo_description') ?></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Canonical URL Override</label>
                    <input type="text" name="canonical_url" class="form-control" value="<?= old('canonical_url') ?>" placeholder="Leave blank for self-referencing canonical">
                </div>

                <hr class="my-4">
                <h5>Admin Notes</h5>
                <div class="mb-4">
                    <label class="form-label">Market Notes (Internal)</label>
                    <textarea name="market_notes" class="form-control" rows="2" placeholder="E.g. Tier 1 market. Target SaaS companies and ecommerce businesses."><?= old('market_notes') ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary btn-lg px-5">Create Page</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
