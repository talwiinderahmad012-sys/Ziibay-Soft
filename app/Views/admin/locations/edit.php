<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <h1>Edit <?= ucfirst($location['location_type']) ?></h1>
    <form action="<?= site_url('admin/locations/update/'.$location['id']) ?>" method="POST">
        <?= csrf_field() ?>
        
        <?php if($location['location_type'] !== 'country'): ?>
        <div class="mb-3">
            <label>Parent</label>
            <select name="parent_id" class="form-control" required>
                <option value="">Select Parent...</option>
                <?php foreach($parents as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= $location['parent_id'] == $p['id'] ? 'selected' : '' ?>><?= esc($p['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="<?= esc($location['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" value="<?= esc($location['slug']) ?>" required>
        </div>
        <?php if($location['location_type'] === 'country'): ?>
        <div class="mb-3">
            <label>Country Code</label>
            <input type="text" name="country_code" class="form-control" maxlength="2" value="<?= esc($location['country_code']) ?>">
        </div>
        <div class="mb-3">
            <label>Locale (e.g. en-US, en-GB)</label>
            <input type="text" name="locale" class="form-control" maxlength="10" value="<?= esc($location['locale'] ?? '') ?>">
        </div>
        <div class="mb-3">
            <label>Currency (e.g. USD, GBP)</label>
            <input type="text" name="currency" class="form-control" maxlength="3" value="<?= esc($location['currency'] ?? '') ?>">
        </div>
        <div class="mb-3">
            <label>Region Label (e.g. State, Province, Territory)</label>
            <input type="text" name="region_label" class="form-control" maxlength="50" placeholder="Defaults to Region" value="<?= esc($location['region_label'] ?? '') ?>">
        </div>
        <?php endif; ?>
        
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft" <?= $location['status'] == 'draft' ? 'selected':'' ?>>Draft</option>
                <option value="published" <?= $location['status'] == 'published' ? 'selected':'' ?>>Published</option>
            </select>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_indexable" class="form-check-input" value="1" <?= $location['is_indexable'] ? 'checked':'' ?>>
            <label class="form-check-label">Indexable</label>
        </div>

        <h4>SEO</h4>
        <input type="text" name="seo_title" class="form-control mb-2" value="<?= esc($location['seo_title']) ?>">
        <textarea name="seo_description" class="form-control mb-2"><?= esc($location['seo_description']) ?></textarea>
        <textarea name="description" class="form-control mb-2"><?= esc($location['description']) ?></textarea>
        
        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>
</div>
<?= $this->endSection() ?>
