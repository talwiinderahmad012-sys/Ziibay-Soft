<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4 py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 text-gray-800"><i class="bi bi-diagram-3"></i> Content Architecture Dashboard</h1>
    </div>

    <!-- Overview Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Services</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalServices ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Blog Posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalBlogs ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Keywords</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalKeywords ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Mapped Keywords</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $mappedKeywords ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Content Gaps -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Content Gaps</h6>
                </div>
                <div class="card-body">
                    <p><strong>Unmapped Active Keywords:</strong></p>
                    <?php if (empty($unmappedKeywords)): ?>
                        <p class="text-success small">All active keywords are mapped.</p>
                    <?php else: ?>
                        <ul class="text-danger small">
                        <?php foreach($unmappedKeywords as $kw): ?>
                            <li><?= esc($kw['keyword']) ?> (<?= esc($kw['intent']) ?>) - <a href="<?= site_url('admin/seo-keywords/edit/' . $kw['id']) ?>">Map now</a></li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <hr>
                    
                    <p><strong>Services without Keywords:</strong></p>
                    <?php if (empty($servicesWithoutKeywords)): ?>
                        <p class="text-success small">All services have mapped keywords.</p>
                    <?php else: ?>
                        <ul class="text-warning small">
                        <?php foreach($servicesWithoutKeywords as $s): ?>
                            <li><?= esc($s['name']) ?></li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Health / Cannibalization / Orphans -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning"><i class="bi bi-activity"></i> Cannibalization & Orphans</h6>
                </div>
                <div class="card-body">
                    <p><strong>Duplicate SEO Titles:</strong></p>
                    
                    <?php if (empty($duplicateLocationTitles) && empty($duplicateServiceTitles) && empty($duplicateBlogTitles)): ?>
                        <p class="text-success small">No duplicate SEO titles found.</p>
                    <?php else: ?>
                        <ul class="text-danger small">
                        <?php foreach($duplicateLocationTitles as $dup): ?>
                            <li>[Location] "<?= esc($dup['seo_title']) ?>" is used <?= $dup['count'] ?> times (IDs: <?= $dup['ids'] ?>)</li>
                        <?php endforeach; ?>
                        <?php foreach($duplicateServiceTitles as $dup): ?>
                            <li>[Service] "<?= esc($dup['seo_title']) ?>" is used <?= $dup['count'] ?> times (IDs: <?= $dup['ids'] ?>)</li>
                        <?php endforeach; ?>
                        <?php foreach($duplicateBlogTitles as $dup): ?>
                            <li>[Blog] "<?= esc($dup['seo_title']) ?>" is used <?= $dup['count'] ?> times (IDs: <?= $dup['ids'] ?>)</li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <hr>

                    <p><strong>Orphan Services (0 Internal Links):</strong></p>
                    <?php if (empty($orphanServices)): ?>
                        <p class="text-success small">No orphan services found.</p>
                    <?php else: ?>
                        <ul class="text-warning small">
                        <?php foreach($orphanServices as $s): ?>
                            <li><?= esc($s['name']) ?> (<?= esc($s['slug']) ?>)</li>
                        <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>

