<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class='container-fluid px-4 py-5'>
    <h1>Edit Blog Tag</h1>
    <form action='<?= site_url("admin/blog-tags/update/".$tag['id']) ?>' method='POST'>
        <?= csrf_field() ?>
        <input type='text' name='name' class='form-control mb-3' value='<?= esc($tag['name']) ?>' required>
        <input type='text' name='slug' class='form-control mb-3' value='<?= esc($tag['slug']) ?>' required>
        <button type='submit' class='btn btn-primary'>Update</button>
    </form>
</div>
<?= $this->endSection() ?>
