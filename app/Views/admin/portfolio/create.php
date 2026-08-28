<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="px-6 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text mb-2"><?= isset($project) ? 'Edit Project' : 'Create Project' ?></h1>
        <a href="<?= base_url('admin/portfolio') ?>" class="text-text-muted hover:text-text"><i class="fa-solid fa-arrow-left mr-2"></i> Back to Portfolio</a>
    </div>

    <div class="bg-surface border border-border rounded-xl shadow-sm p-6">
        <form action="<?= isset($project) ? base_url('admin/portfolio/update/'.$project['id']) : base_url('admin/portfolio') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Title *</label>
                        <input type="text" name="title" value="<?= old('title', $project['title'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Slug *</label>
                        <input type="text" name="slug" value="<?= old('slug', $project['slug'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Short Description</label>
                        <textarea name="short_description" rows="3" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('short_description', $project['short_description'] ?? '') ?></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Description</label>
                        <textarea name="description" rows="6" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('description', $project['description'] ?? '') ?></textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-text mb-2">Client Name</label>
                            <input type="text" name="client_name" value="<?= old('client_name', $project['client_name'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-text mb-2">Project URL</label>
                            <input type="url" name="project_url" value="<?= old('project_url', $project['project_url'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary">
                        </div>
                    </div>
                </div>

                <!-- Sidebar settings -->
                <div class="space-y-6">
                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="block text-sm font-bold text-text mb-2">Status *</label>
                        <select name="status" class="w-full px-4 py-2 bg-surface border border-border rounded-lg text-text focus:outline-none" required>
                            <?php $status = old('status', $project['status'] ?? 'draft'); ?>
                            <option value="draft" <?= $status === 'draft' ? 'selected' : '' ?>>Draft</option>
                            <option value="published" <?= $status === 'published' ? 'selected' : '' ?>>Published</option>
                            <option value="archived" <?= $status === 'archived' ? 'selected' : '' ?>>Archived</option>
                        </select>
                    </div>

                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="block text-sm font-bold text-text mb-2">Project Type *</label>
                        <input type="text" name="project_type" value="<?= old('project_type', $project['project_type'] ?? '') ?>" placeholder="e.g. Website, Mobile App" class="w-full px-4 py-2 bg-surface border border-border rounded-lg text-text focus:outline-none" required>
                    </div>

                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="checkbox" name="featured" value="1" <?= old('featured', $project['featured'] ?? 0) ? 'checked' : '' ?> class="form-checkbox h-5 w-5 text-brand-primary bg-surface border-border rounded focus:ring-brand-primary">
                            <span class="text-sm font-bold text-text">Featured Project</span>
                        </label>
                    </div>

                    <!-- Multi-select relationships -->
                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="block text-sm font-bold text-text mb-2">Services Used</label>
                        <select name="services[]" multiple class="w-full px-4 py-2 bg-surface border border-border rounded-lg text-text focus:outline-none h-32">
                            <?php $selectedServices = old('services', $project['services'] ?? []); ?>
                            <?php foreach($services as $srv): ?>
                                <option value="<?= $srv['id'] ?>" <?= in_array($srv['id'], $selectedServices) ? 'selected' : '' ?>><?= esc($srv['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="block text-sm font-bold text-text mb-2">Industries Served</label>
                        <select name="industries[]" multiple class="w-full px-4 py-2 bg-surface border border-border rounded-lg text-text focus:outline-none h-32">
                            <?php $selectedInd = old('industries', $project['industries'] ?? []); ?>
                            <?php foreach($industries as $ind): ?>
                                <option value="<?= $ind['id'] ?>" <?= in_array($ind['id'], $selectedInd) ? 'selected' : '' ?>><?= esc($ind['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="block text-sm font-bold text-text mb-2">Technologies</label>
                        <select name="technologies[]" multiple class="w-full px-4 py-2 bg-surface border border-border rounded-lg text-text focus:outline-none h-32">
                            <?php $selectedTech = old('technologies', $project['technologies'] ?? []); ?>
                            <?php foreach($technologies as $tech): ?>
                                <option value="<?= $tech['id'] ?>" <?= in_array($tech['id'], $selectedTech) ? 'selected' : '' ?>><?= esc($tech['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
            </div>

            <!-- SEO Settings -->
            <div class="mt-8 border-t border-border pt-8">
                <h3 class="text-xl font-bold text-text mb-4">SEO Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-text mb-2">SEO Title</label>
                        <input type="text" name="seo_title" value="<?= old('seo_title', $project['seo_title'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Canonical URL</label>
                        <input type="url" name="canonical_url" value="<?= old('canonical_url', $project['canonical_url'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-text mb-2">SEO Description</label>
                        <textarea name="seo_description" rows="2" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('seo_description', $project['seo_description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="px-8 py-3 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary transition-colors">
                    <?= isset($project) ? 'Update Project' : 'Create Project' ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
