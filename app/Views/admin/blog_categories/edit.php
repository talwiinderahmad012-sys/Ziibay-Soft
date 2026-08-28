<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class='container-fluid px-4 py-5'>
    <h1>Edit Blog Category</h1>
    <form action='<?= site_url("admin/blog-categories/update/".$category['id']) ?>' method='POST'>
        <?= csrf_field() ?>
        <input type='text' name='name' class='form-control mb-3' value='<?= esc($category['name']) ?>' required>
        <input type='text' name='slug' class='form-control mb-3' value='<?= esc($category['slug']) ?>' required>
        <textarea name='description' class='form-control mb-3'><?= esc($category['description']) ?></textarea>
        <button type='submit' class='btn btn-primary'>Update</button>
    </form>
</div>
<?= $this->endSection() ?>
