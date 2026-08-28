<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class='container-fluid px-4 py-5'>
    <h1>Create Blog Category</h1>
    <form action='<?= site_url("admin/blog-categories") ?>' method='POST'>
        <?= csrf_field() ?>
        <input type='text' name='name' class='form-control mb-3' placeholder='Name' required>
        <input type='text' name='slug' class='form-control mb-3' placeholder='Slug' required>
        <textarea name='description' class='form-control mb-3' placeholder='Description'></textarea>
        <button type='submit' class='btn btn-primary'>Save</button>
    </form>
</div>
<?= $this->endSection() ?>
