<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <h1 class="h3 mb-4">SEO & Schema Settings</h1>

    <?php if(session('success')): ?><div class="alert alert-success"><?= session('success') ?></div><?php endif; ?>
    <?php if(session('error')): ?><div class="alert alert-danger"><?= session('error') ?></div><?php endif; ?>

    <div class="row">
        <!-- Global Settings -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">Global Organization Schema</div>
                <div class="card-body">
                    <form action="<?= site_url('admin/seo-settings/update') ?>" method="POST">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label class="form-label">Organization Name</label>
                            <input type="text" name="schema_organization_name" class="form-control" value="<?= esc($settings['schema_organization_name'] ?? 'Ziibay Soft') ?>">
                            <div class="form-text">Used for Publisher, Provider, and Organization schemas.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Logo Absolute URL</label>
                            <input type="url" name="schema_organization_logo" class="form-control" value="<?= esc($settings['schema_organization_logo'] ?? base_url('images/logo.png')) ?>">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Organization Description</label>
                            <textarea name="schema_organization_description" class="form-control" rows="3"><?= esc($settings['schema_organization_description'] ?? 'A premium digital agency delivering scalable web and software solutions.') ?></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Email</label>
                                <input type="email" name="schema_organization_email" class="form-control" value="<?= esc($settings['schema_organization_email'] ?? '') ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Contact Phone</label>
                                <input type="text" name="schema_organization_phone" class="form-control" value="<?= esc($settings['schema_organization_phone'] ?? '') ?>">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Social Profiles (sameAs)</label>
                            <?php 
                            $socialsRaw = $settings['schema_social_profiles'] ?? '[]';
                            $socialsArr = json_decode($socialsRaw, true) ?: [];
                            $socialsText = implode("\n", $socialsArr);
                            ?>
                            <textarea name="schema_social_profiles" class="form-control font-monospace" rows="4" placeholder="https://linkedin.com/company/ziibay-soft&#10;https://twitter.com/ziibaysoft"><?= esc($socialsText) ?></textarea>
                            <div class="form-text">Enter one official absolute URL per line. Do not invent profiles.</div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Global Schema</button>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header bg-white fw-bold">Dynamic robots.txt</div>
                <div class="card-body">
                    <form action="<?= site_url('admin/seo-settings/update') ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="mb-3">
                            <label class="form-label">Robots Content</label>
                            <textarea name="seo_robots_txt" class="form-control font-monospace text-sm" rows="6" placeholder="User-agent: *&#10;Disallow: /admin/"><?= esc($settings['seo_robots_txt'] ?? "User-agent: *\nDisallow: /admin/\nDisallow: /private/\n\nSitemap: " . site_url('sitemap.xml')) ?></textarea>
                            <div class="form-text">Directly controls the output of <code>/robots.txt</code>.</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Robots.txt</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Report -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white fw-bold">Manual Overrides Report</div>
                <div class="card-body">
                    <p class="text-muted small">Pages with manually disabled schema or custom JSON-LD overrides.</p>
                    
                    <?php if (empty($overrides)): ?>
                        <div class="alert alert-info py-2 small mb-0">No schema overrides exist. All pages are generating schema automatically.</div>
                    <?php else: ?>
                        <ul class="list-group list-group-flush small">
                        <?php foreach($overrides as $ov): ?>
                            <li class="list-group-item px-0 d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="badge bg-secondary"><?= esc($ov['entity_type']) ?></span> ID: <?= esc($ov['entity_id']) ?>
                                </div>
                                <div>
                                    <?php if($ov['is_enabled'] == 0): ?>
                                        <span class="badge bg-danger">Disabled</span>
                                    <?php endif; ?>
                                    <?php if(!empty($ov['manual_json_ld'])): ?>
                                        <span class="badge bg-warning text-dark">Custom JSON</span>
                                    <?php endif; ?>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="card border-0 shadow-sm mt-4 bg-light">
                <div class="card-body small text-muted">
                    <h6 class="fw-bold mb-2 text-dark">Schema Architecture Info</h6>
                    <ul class="mb-0 ps-3">
                        <li>Schema generation is centralized and runs automatically on all indexable pages.</li>
                        <li>The system automatically detects the page type and generates a valid <code>@graph</code> JSON-LD payload.</li>
                        <li>Empty values are automatically stripped to maintain valid syntax.</li>
                        <li>Do NOT add HTML script tags in the manual override inputs on CMS pages. Only valid raw JSON is accepted.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
