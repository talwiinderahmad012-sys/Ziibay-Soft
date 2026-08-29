<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4 py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Technical SEO Audit Dashboard</h1>
        <a href="<?= site_url('admin/content-dashboard') ?>" class="btn btn-outline-primary"><i class="bi bi-diagram-3"></i> Content Architecture</a>
    </div>

    <!-- SEO Health Summary -->
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-4 border-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Indexable Pages</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($totalIndexable) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-search text-gray-300 fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-4 border-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">NOINDEX Pages</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($totalNoIndex) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-eye-slash text-gray-300 fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-4 border-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Redirects</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($activeRedirects) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-signpost-split text-gray-300 fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-start border-4 border-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Missing Canonicals</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($missingCanonical) ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="bi bi-exclamation-triangle text-gray-300 fs-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warnings & Issues -->
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Content Warnings</h6>
                </div>
                <div class="card-body">
                    <h4 class="small font-weight-bold">Thin Location Content <span class="float-end"><?= $thinContentCount ?> Pages</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: <?= ($totalIndexable > 0) ? min(100, ($thinContentCount/$totalIndexable)*100) : 0 ?>%" aria-valuenow="<?= $thinContentCount ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="text-muted small">Location pages with less than 200 words might be considered doorway pages. We recommend expanding their content.</p>
                    <h4 class="small font-weight-bold mt-4">Doorway-Page Patterns <span class="float-end"><?= $doorwayWarnings ?> Instances</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?= ($totalIndexable > 0) ? min(100, ($doorwayWarnings/$totalIndexable)*100) : 0 ?>%" aria-valuenow="<?= $doorwayWarnings ?>" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <p class="text-muted small">Location pages with identical content are flagged to prevent spam penalties.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Technical Issues</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <?php if($duplicateLocations > 0): ?>
                            <li class="list-group-item text-danger border-0 px-0">
                                <i class="bi bi-exclamation-circle me-2"></i> <?= $duplicateLocations ?> duplicate location slugs detected in the same parent hierarchy.
                            </li>
                        <?php endif; ?>
                        <?php if($missingCanonical > 0): ?>
                            <li class="list-group-item text-danger border-0 px-0">
                                <i class="bi bi-exclamation-circle me-2"></i> <?= $missingCanonical ?> pages are missing canonical URLs.
                            </li>
                        <?php else: ?>
                            <li class="list-group-item text-success border-0 px-0">
                                <i class="bi bi-check-circle me-2"></i> All indexed pages have canonical URLs.
                            </li>
                        <?php endif; ?>

                        <li class="list-group-item text-success border-0 px-0">
                            <i class="bi bi-check-circle me-2"></i> Global Robots.txt is active and managed.
                        </li>
                        <li class="list-group-item text-success border-0 px-0">
                            <i class="bi bi-check-circle me-2"></i> Sitemap dynamically updates to exclude NOINDEX pages.
                        </li>
                        <li class="list-group-item text-success border-0 px-0">
                            <i class="bi bi-check-circle me-2"></i> Soft 404 tracking active.
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

