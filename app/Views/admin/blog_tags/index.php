<?= $this->extend('admin/layouts/main') ?>
<?= $this->section('content') ?>
<div class='container-fluid px-4 py-5'>
    <h1>Blog Tags</h1>
    <a href='<?= site_url("admin/blog-tags/create") ?>' class='btn btn-primary mb-3'>Create</a>
    <table class='table'>
    <tr><th>Name</th><th>Slug</th><th>Actions</th></tr>
    <?php foreach($tags as $c): ?>
    <tr>
        <td><?= esc($c['name']) ?></td>
        <td><?= esc($c['slug']) ?></td>
        <td><a href='<?= site_url("admin/blog-tags/edit/".$c['id']) ?>' class='btn btn-sm btn-info'>Edit</a></td>
    </tr>
    <?php endforeach; ?>
    </table>
</div>
<?= $this->endSection() ?>
