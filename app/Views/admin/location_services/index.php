<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <h1>Service Locations <?php if($location): ?> for <?= esc($location['name']) ?><?php endif; ?></h1>
    
    <a href="<?= site_url('admin/location-services/create' . ($location ? '?location_id='.$location['id'] : '')) ?>" class="btn btn-primary mb-4">Add Service to Location</a>
    <a href="<?= site_url('admin/locations?type=city' . ($location ? '&parent_id='.$location['parent_id'] : '')) ?>" class="btn btn-outline-secondary mb-4">Back to Cities</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Location</th>
                <th>Service</th>
                <th>Status</th>
                <th>Indexable</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($locationServices as $ls): ?>
            <tr>
                <td><?= esc($ls['location_name']) ?></td>
                <td><?= esc($ls['service_name']) ?></td>
                <td><?= esc($ls['status']) ?></td>
                <td><?= $ls['is_indexable'] ? 'Yes' : 'No' ?></td>
                <td>
                    <a href="<?= site_url('admin/location-services/edit/'.$ls['id']) ?>" class="btn btn-sm btn-info">Edit SEO/Content</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection() ?>
