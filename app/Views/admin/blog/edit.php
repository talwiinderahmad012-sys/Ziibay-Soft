<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="container-fluid px-4 py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Blog Post</h1>
        <div>
            <?php if($post['status'] === 'published'): ?>
                <a href="<?= site_url('blog/'.$post['slug']) ?>" target="_blank" class="btn btn-outline-primary me-2">
                    <i class="bi bi-eye"></i> View Public
                </a>
            <?php endif; ?>
            <a href="<?= site_url('admin/blog') ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to Posts
            </a>
        </div>
    </div>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('admin/blog/update/'.$post['id']) ?>" method="POST">
        <?= csrf_field() ?>

        <div class="row">
            <div class="col-lg-8">
                <!-- Main Content -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Content</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="<?= old('title', $post['title']) ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Slug <span class="text-danger">*</span></label>
                            <input type="text" name="slug" class="form-control" value="<?= old('slug', $post['slug']) ?>" required>
                            <small class="text-muted">Unique URL-friendly string.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Excerpt</label>
                            <textarea name="excerpt" class="form-control" rows="3"><?= old('excerpt', $post['excerpt']) ?></textarea>
                            <small class="text-muted">Brief summary of the article.</small>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea name="content" class="form-control editor" rows="15"><?= old('content', $post['content']) ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- SEO -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">SEO & Open Graph</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">SEO Title</label>
                            <input type="text" name="seo_title" class="form-control" value="<?= old('seo_title', $post['seo_title']) ?>">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Meta Description</label>
                            <textarea name="meta_description" class="form-control" rows="2"><?= old('meta_description', $post['meta_description']) ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Canonical URL</label>
                            <input type="url" name="canonical_url" class="form-control" value="<?= old('canonical_url', $post['canonical_url']) ?>">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">OG Title</label>
                                <input type="text" name="og_title" class="form-control" value="<?= old('og_title', $post['og_title']) ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">OG Image URL</label>
                                <input type="text" name="og_image" class="form-control" value="<?= old('og_image', $post['og_image']) ?>">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">OG Description</label>
                            <textarea name="og_description" class="form-control" rows="2"><?= old('og_description', $post['og_description']) ?></textarea>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="indexable" name="indexable" value="1" <?= old('indexable', $post['indexable'] ?? 1) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="indexable">Indexable (Robots)</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- Publishing -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Publishing</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Status <span class="text-danger">*</span></label>
                            <select name="status" class="form-select" id="status-select" required>
                                <option value="draft" <?= old('status', $post['status']) === 'draft' ? 'selected' : '' ?>>Draft</option>
                                <option value="published" <?= old('status', $post['status']) === 'published' ? 'selected' : '' ?>>Published</option>
                                <option value="scheduled" <?= old('status', $post['status']) === 'scheduled' ? 'selected' : '' ?>>Scheduled</option>
                                <option value="archived" <?= old('status', $post['status']) === 'archived' ? 'selected' : '' ?>>Archived</option>
                            </select>
                        </div>
                        
                        <div class="mb-3" id="schedule-container" style="display: <?= old('status', $post['status']) === 'scheduled' ? 'block' : 'none' ?>;">
                            <label class="form-label">Schedule At</label>
                            <input type="datetime-local" name="scheduled_at" class="form-control" value="<?= old('scheduled_at', isset($post['scheduled_at']) ? date('Y-m-d\TH:i', strtotime($post['scheduled_at'])) : '') ?>">
                        </div>
                        
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" id="featured" name="featured" value="1" <?= old('featured', $post['featured']) ? 'checked' : '' ?>>
                            <label class="form-check-label" for="featured">Featured Article</label>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Author</label>
                            <select name="team_member_id" class="form-select">
                                <option value="">Select Author...</option>
                                <?php foreach($authors as $author): ?>
                                    <option value="<?= $author['id'] ?>" <?= old('team_member_id', $post['team_member_id'] ?? '') == $author['id'] ? 'selected' : '' ?>>
                                        <?= esc($author['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Content Type</label>
                            <select name="content_type" class="form-select">
                                <?php $ctype = old('content_type', $post['content_type'] ?? 'Article'); ?>
                                <option value="Article" <?= $ctype == 'Article' ? 'selected' : '' ?>>Article</option>
                                <option value="Guide" <?= $ctype == 'Guide' ? 'selected' : '' ?>>Guide</option>
                                <option value="Tutorial" <?= $ctype == 'Tutorial' ? 'selected' : '' ?>>Tutorial</option>
                                <option value="News" <?= $ctype == 'News' ? 'selected' : '' ?>>News</option>
                                <option value="Opinion" <?= $ctype == 'Opinion' ? 'selected' : '' ?>>Opinion</option>
                                <option value="Case Study Reference" <?= $ctype == 'Case Study Reference' ? 'selected' : '' ?>>Case Study Reference</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>
                    </div>
                </div>

                <!-- Media -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Media</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Featured Image URL</label>
                            <input type="text" name="featured_image" class="form-control" value="<?= old('featured_image', $post['featured_image']) ?>">
                        </div>
                    </div>
                </div>

                <!-- Taxonomy & Relationships -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Taxonomy & Relationships</h6>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select">
                                <option value="">Select Category...</option>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>" <?= old('category_id', $post['category_id']) == $category['id'] ? 'selected' : '' ?>>
                                        <?= esc($category['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tags</label>
                            <select name="tags[]" class="form-select" multiple style="height: 120px;">
                                <?php $selectedTags = old('tags', $post['tags'] ?? []); ?>
                                <?php foreach($tags as $tag): ?>
                                    <option value="<?= $tag['id'] ?>" <?= in_array($tag['id'], $selectedTags) ? 'selected' : '' ?>>
                                        <?= esc($tag['name']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                            <small class="text-muted">Hold CTRL/CMD to select multiple.</small>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Parent Pillar(s)</label>
                            <select name="pillars[]" class="form-select" multiple style="height: 100px;">
                                <?php $selectedPillars = old('pillars', $post['pillars'] ?? []); ?>
                                <?php foreach($posts as $p): ?>
                                    <option value="<?= $p['id'] ?>" <?= in_array($p['id'], $selectedPillars) ? 'selected' : '' ?>>
                                        <?= esc($p['title']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Related Articles</label>
                            <select name="related[]" class="form-select" multiple style="height: 100px;">
                                <?php $selectedRelated = old('related', $post['related'] ?? []); ?>
                                <?php foreach($posts as $p): ?>
                                    <option value="<?= $p['id'] ?>" <?= in_array($p['id'], $selectedRelated) ? 'selected' : '' ?>>
                                        <?= esc($p['title']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">FAQs</label>
                            <select name="faqs[]" class="form-select" multiple style="height: 100px;">
                                <?php $selectedFaqs = old('faqs', $post['faqs'] ?? []); ?>
                                <?php foreach($faqs as $faq): ?>
                                    <option value="<?= $faq['id'] ?>" <?= in_array($faq['id'], $selectedFaqs) ? 'selected' : '' ?>>
                                        <?= esc($faq['question']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>

<script>
document.getElementById('status-select').addEventListener('change', function() {
    document.getElementById('schedule-container').style.display = (this.value === 'scheduled') ? 'block' : 'none';
});
</script>
<?= $this->endSection() ?>
