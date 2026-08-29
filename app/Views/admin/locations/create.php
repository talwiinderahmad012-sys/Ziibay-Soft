<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <h1>Create <?= ucfirst($type) ?></h1>
    <form action="<?= site_url('admin/locations') ?>" method="POST">
        <?= csrf_field() ?>
        <input type="hidden" name="location_type" value="<?= esc($type) ?>">
        
        <?php if($type !== 'country'): ?>
        <div class="mb-3">
            <label>Parent</label>
            <select name="parent_id" class="form-control" required>
                <option value="">Select Parent...</option>
                <?php foreach($parents as $p): ?>
                    <option value="<?= $p['id'] ?>" <?= $parentId == $p['id'] ? 'selected' : '' ?>><?= esc($p['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>
        <?php if($type === 'country'): ?>
        <div class="mb-3">
            <label>Country Code (e.g. US, GB)</label>
            <input type="text" name="country_code" class="form-control" maxlength="2">
        </div>
        <div class="mb-3">
            <label>Locale (e.g. en-US, en-GB)</label>
            <input type="text" name="locale" class="form-control" maxlength="10">
        </div>
        <div class="mb-3">
            <label>Currency (e.g. USD, GBP)</label>
            <input type="text" name="currency" class="form-control" maxlength="3">
        </div>
        <div class="mb-3">
            <label>Region Label (e.g. State, Province, Territory)</label>
            <input type="text" name="region_label" class="form-control" maxlength="50" placeholder="Defaults to Region">
        </div>
        <?php endif; ?>
        
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="draft">Draft</option>
                <option value="published">Published</option>
            </select>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="is_indexable" class="form-check-input" value="1">
            <label class="form-check-label">Indexable (Robots)</label>
        </div>

        <h4>SEO</h4>
        <input type="text" name="seo_title" class="form-control mb-2" placeholder="SEO Title">
        <textarea name="seo_description" class="form-control mb-2" placeholder="Meta Description"></textarea>
        <textarea name="description" class="form-control mb-2" placeholder="Page Content / Intro"></textarea>
        
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
<?= $this->endSection() ?>
