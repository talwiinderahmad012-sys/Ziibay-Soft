<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <h1 class="h3 mb-4 text-gray-800">
        <?= ucfirst($type) ?> Locations
        <?php if($parent): ?> under <?= esc($parent['name']) ?><?php endif; ?>
    </h1>
    
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card bg-light">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-bar-chart-fill"></i> Location Coverage</h5>
                    <div class="d-flex justify-content-between text-center mt-3">
                        <div><h3 class="mb-0"><?= $coverage['countries'] ?></h3><small class="text-muted">Countries</small></div>
                        <div><h3 class="mb-0"><?= $coverage['regions'] ?></h3><small class="text-muted">Regions</small></div>
                        <div><h3 class="mb-0"><?= $coverage['cities'] ?></h3><small class="text-muted">Cities</small></div>
                        <div><h3 class="mb-0 text-success"><?= $coverage['published'] ?></h3><small class="text-muted">Published</small></div>
                        <div><h3 class="mb-0 text-secondary"><?= $coverage['draft'] ?></h3><small class="text-muted">Drafts</small></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-4">
        <a href="<?= site_url('admin/locations?type=country') ?>" class="btn <?= $type=='country'?'btn-primary':'btn-outline-primary' ?>">Countries</a>
        <a href="<?= site_url('admin/locations?type=region') ?>" class="btn <?= $type=='region'?'btn-primary':'btn-outline-primary' ?>">Regions</a>
        <a href="<?= site_url('admin/locations?type=city') ?>" class="btn <?= $type=='city'?'btn-primary':'btn-outline-primary' ?>">Cities</a>
    </div>

    <div class="d-flex justify-content-between mb-4">
        <a href="<?= site_url("admin/locations/create?type={$type}" . ($parent ? "&parent_id=".$parent['id'] : '')) ?>" class="btn btn-success">Create <?= ucfirst($type) ?></a>
        <form method="get" action="<?= site_url('admin/locations') ?>" class="d-flex">
            <input type="hidden" name="type" value="<?= esc($type) ?>">
            <?php if($parent): ?><input type="hidden" name="parent_id" value="<?= esc($parent['id']) ?>"><?php endif; ?>
            <select name="status" class="form-select me-2">
                <option value="">All Statuses</option>
                <option value="published" <?= (isset($_GET['status']) && $_GET['status'] == 'published') ? 'selected' : '' ?>>Published</option>
                <option value="draft" <?= (isset($_GET['status']) && $_GET['status'] == 'draft') ? 'selected' : '' ?>>Draft</option>
            </select>
            <input type="text" name="search" class="form-control me-2" placeholder="Search by name, slug, ISO..." value="<?= esc($_GET['search'] ?? '') ?>">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </form>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Indexable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($locations as $l): ?>
            <tr>
                <td><?= esc($l['name']) ?></td>
                <td><?= esc($l['slug']) ?></td>
                <td><?= esc($l['status']) ?></td>
                <td><?= $l['is_indexable'] ? 'Yes' : 'No' ?></td>
                <td>
                    <a href="<?= site_url('admin/locations/edit/'.$l['id']) ?>" class="btn btn-sm btn-info">Edit</a>
                    <?php if($l['location_type'] === 'country'): ?>
                        <a href="<?= site_url('admin/locations?type=region&parent_id='.$l['id']) ?>" class="btn btn-sm btn-outline-primary">Regions</a>
                    <?php elseif($l['location_type'] === 'region'): ?>
                        <a href="<?= site_url('admin/locations?type=city&parent_id='.$l['id']) ?>" class="btn btn-sm btn-outline-primary">Cities</a>
                    <?php elseif($l['location_type'] === 'city'): ?>
                        <a href="<?= site_url('admin/location-services?location_id='.$l['id']) ?>" class="btn btn-sm btn-warning">Services</a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $pager->links() ?>
</div>
<?= $this->endSection() ?>
