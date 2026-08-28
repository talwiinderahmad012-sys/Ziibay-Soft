<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Blog Posts</h1>
        <a href="<?= site_url('admin/blog/create') ?>" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Create New Post
        </a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">All Posts</h6>
            <form method="get" action="<?= site_url('admin/blog') ?>" class="d-flex">
                <select name="status" class="form-select form-select-sm me-2" onchange="this.form.submit()">
                    <option value="">All Statuses</option>
                    <option value="published" <?= ($statusFilter ?? '') === 'published' ? 'selected' : '' ?>>Published</option>
                    <option value="draft" <?= ($statusFilter ?? '') === 'draft' ? 'selected' : '' ?>>Draft</option>
                    <option value="scheduled" <?= ($statusFilter ?? '') === 'scheduled' ? 'selected' : '' ?>>Scheduled</option>
                    <option value="archived" <?= ($statusFilter ?? '') === 'archived' ? 'selected' : '' ?>>Archived</option>
                </select>
                <input type="text" name="search" class="form-control form-control-sm me-2" placeholder="Search..." value="<?= esc($search ?? '') ?>">
                <button type="submit" class="btn btn-sm btn-outline-secondary">Search</button>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Featured</th>
                            <th>Published/Scheduled</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($posts)): ?>
                            <tr>
                                <td colspan="6" class="text-center">No posts found.</td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($posts as $post): ?>
                                <tr>
                                    <td>
                                        <strong><?= esc($post['title']) ?></strong><br>
                                        <small class="text-muted">/blog/<?= esc($post['slug']) ?></small>
                                    </td>
                                    <td>
                                        <?php if($post['status'] === 'published'): ?>
                                            <span class="badge bg-success">Published</span>
                                        <?php elseif($post['status'] === 'draft'): ?>
                                            <span class="badge bg-secondary">Draft</span>
                                        <?php elseif($post['status'] === 'scheduled'): ?>
                                            <span class="badge bg-warning text-dark">Scheduled</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">Archived</span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= esc($post['content_type']) ?></td>
                                    <td>
                                        <form method="post" action="<?= site_url('admin/blog/toggle-featured/'.$post['id']) ?>" style="display:inline;">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-sm <?= $post['featured'] ? 'btn-warning' : 'btn-outline-secondary' ?>">
                                                <i class="bi <?= $post['featured'] ? 'bi-star-fill' : 'bi-star' ?>"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <?php if($post['status'] === 'scheduled'): ?>
                                            <?= date('M d, Y H:i', strtotime($post['scheduled_at'])) ?>
                                        <?php else: ?>
                                            <?= $post['published_at'] ? date('M d, Y', strtotime($post['published_at'])) : '-' ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?= site_url('admin/blog/edit/'.$post['id']) ?>" class="btn btn-sm btn-info">Edit</a>
                                        <form method="post" action="<?= site_url('admin/blog/toggle-status/'.$post['id']) ?>" style="display:inline;">
                                            <?= csrf_field() ?>
                                            <button type="submit" class="btn btn-sm btn-outline-secondary" onclick="return confirm('Toggle status?');">
                                                Toggle Status
                                            </button>
                                        </form>
                                        <?php if($post['status'] === 'published'): ?>
                                            <a href="<?= site_url('blog/'.$post['slug']) ?>" target="_blank" class="btn btn-sm btn-outline-primary">View</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
