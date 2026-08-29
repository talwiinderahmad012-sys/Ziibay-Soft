<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Service × Location Matrix</h1>
        <div class="d-flex gap-2">
            <a href="?tier=all" class="btn btn-sm <?= $tier=='all'?'btn-dark':'btn-outline-secondary' ?>">All Tiers</a>
            <a href="?tier=1" class="btn btn-sm <?= $tier=='1'?'btn-primary':'btn-outline-secondary' ?>">Tier 1</a>
            <a href="?tier=2" class="btn btn-sm <?= $tier=='2'?'btn-secondary':'btn-outline-secondary' ?>">Tier 2</a>
            <a href="?tier=3" class="btn btn-sm <?= $tier=='3'?'btn-light border':'btn-outline-secondary' ?>">Tier 3</a>
            <a href="<?= site_url('admin/location-services/create') ?>" class="btn btn-success btn-sm ms-3">+ Add Page</a>
        </div>
    </div>

    <div class="alert alert-info bg-light border-0 mb-4">
        <strong>How to use:</strong> ✓ = Published &nbsp;|&nbsp; D = Draft &nbsp;|&nbsp; – = Not Created. Click a cell to create or edit a page. Only manually created pages can be published.
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-sm align-middle text-center" style="min-width: 600px;">
            <thead class="table-dark">
                <tr>
                    <th class="text-start" style="min-width:150px">Location</th>
                    <th>T</th>
                    <?php foreach($services as $s): ?>
                        <th><?= esc($s['name']) ?></th>
                    <?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($locations)): ?>
                    <tr><td colspan="<?= count($services) + 2 ?>" class="py-4">No city-level locations found. Add locations first.</td></tr>
                <?php endif; ?>
                <?php foreach($locations as $loc): ?>
                    <tr>
                        <td class="text-start fw-semibold"><?= esc($loc['name']) ?></td>
                        <td><span class="badge bg-secondary">T<?= esc($loc['tier'] ?? 2) ?></span></td>
                        <?php foreach($services as $s): ?>
                            <td>
                                <?php
                                $entry = $matrix[$loc['id']][$s['id']] ?? null;
                                if ($entry):
                                    $editUrl = site_url('admin/location-services/edit/'.$entry['id']);
                                    if ($entry['status'] === 'published' && $entry['is_indexable']):
                                ?>
                                    <a href="<?= $editUrl ?>" class="badge bg-success text-decoration-none p-2" title="Published & Indexable">✓</a>
                                <?php elseif ($entry['status'] === 'published'): ?>
                                    <a href="<?= $editUrl ?>" class="badge bg-warning text-dark text-decoration-none p-2" title="Published but Noindex">P</a>
                                <?php else: ?>
                                    <a href="<?= $editUrl ?>" class="badge bg-light border text-dark text-decoration-none p-2" title="Draft">D</a>
                                <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?= site_url('admin/location-services/create?location_id='.$loc['id'].'&service_id='.$s['id']) ?>" class="badge bg-light border text-muted text-decoration-none p-2" title="Create Page">–</a>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4 card p-3 bg-light border-0">
        <div class="row text-center">
            <div class="col">
                <span class="badge bg-success p-2 me-2">✓</span> Published &amp; Indexable
            </div>
            <div class="col">
                <span class="badge bg-warning text-dark p-2 me-2">P</span> Published / Noindex
            </div>
            <div class="col">
                <span class="badge bg-light border text-dark p-2 me-2">D</span> Draft
            </div>
            <div class="col">
                <span class="badge bg-light border text-muted p-2 me-2">–</span> Not Created
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
