<?= $this->extend('admin/layouts/main') ?>

<?= $this->section('content') ?>
<div class="px-6 py-8">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-text mb-2"><?= isset($caseStudy) ? 'Edit Case Study' : 'Create Case Study' ?></h1>
        <a href="<?= base_url('admin/case-studies') ?>" class="text-text-muted hover:text-text"><i class="fa-solid fa-arrow-left mr-2"></i> Back to Case Studies</a>
    </div>

    <div class="bg-surface border border-border rounded-xl shadow-sm p-6">
        <form action="<?= isset($caseStudy) ? base_url('admin/case-studies/update/'.$caseStudy['id']) : base_url('admin/case-studies') ?>" method="POST" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Title *</label>
                        <input type="text" name="title" value="<?= old('title', $caseStudy['title'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Slug *</label>
                        <input type="text" name="slug" value="<?= old('slug', $caseStudy['slug'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary" required>
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Excerpt</label>
                        <textarea name="excerpt" rows="2" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('excerpt', $caseStudy['excerpt'] ?? '') ?></textarea>
                    </div>

                    <div class="border-t border-border pt-6 mt-6">
                        <h3 class="text-lg font-bold text-text mb-4">Case Study Content</h3>
                        
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-bold text-text mb-2">Challenge</label>
                                <textarea name="challenge" rows="4" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('challenge', $caseStudy['challenge'] ?? '') ?></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-text mb-2">Goals</label>
                                <textarea name="goals" rows="4" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('goals', $caseStudy['goals'] ?? '') ?></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-text mb-2">Strategy / Approach</label>
                                <textarea name="strategy" rows="4" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('strategy', $caseStudy['strategy'] ?? '') ?></textarea>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-bold text-text mb-2">Solution</label>
                                <textarea name="solution" rows="4" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('solution', $caseStudy['solution'] ?? '') ?></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-text mb-2">Implementation</label>
                                <textarea name="implementation" rows="4" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('implementation', $caseStudy['implementation'] ?? '') ?></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-text mb-2">Results (Keep factual)</label>
                                <textarea name="results" rows="4" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('results', $caseStudy['results'] ?? '') ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar settings -->
                <div class="space-y-6">
                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="block text-sm font-bold text-text mb-2">Status *</label>
                        <select name="status" class="w-full px-4 py-2 bg-surface border border-border rounded-lg text-text focus:outline-none" required>
                            <?php $status = old('status', $caseStudy['status'] ?? 'draft'); ?>
                            <option value="draft" <?= $status === 'draft' ? 'selected' : '' ?>>Draft</option>
                            <option value="published" <?= $status === 'published' ? 'selected' : '' ?>>Published</option>
                            <option value="archived" <?= $status === 'archived' ? 'selected' : '' ?>>Archived</option>
                        </select>
                    </div>
                    
                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="block text-sm font-bold text-text mb-2">Attach to Project</label>
                        <select name="portfolio_project_id" class="w-full px-4 py-2 bg-surface border border-border rounded-lg text-text focus:outline-none">
                            <option value="">-- None --</option>
                            <?php $selectedProj = old('portfolio_project_id', $caseStudy['portfolio_project_id'] ?? ''); ?>
                            <?php foreach($projects as $p): ?>
                                <option value="<?= $p['id'] ?>" <?= $selectedProj == $p['id'] ? 'selected' : '' ?>><?= esc($p['title']) ?></option>
                            <?php endforeach; ?>
                        </select>
                        <p class="text-xs text-text-muted mt-2">Linking a project allows sharing services, industries, and technologies.</p>
                    </div>

                    <div class="bg-surface-secondary p-4 rounded-lg border border-border">
                        <label class="flex items-center space-x-3 cursor-pointer">
                            <input type="checkbox" name="featured" value="1" <?= old('featured', $caseStudy['featured'] ?? 0) ? 'checked' : '' ?> class="form-checkbox h-5 w-5 text-brand-primary bg-surface border-border rounded focus:ring-brand-primary">
                            <span class="text-sm font-bold text-text">Featured Case Study</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- SEO Settings -->
            <div class="mt-8 border-t border-border pt-8">
                <h3 class="text-xl font-bold text-text mb-4">SEO Settings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-text mb-2">SEO Title</label>
                        <input type="text" name="seo_title" value="<?= old('seo_title', $caseStudy['seo_title'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-text mb-2">Canonical URL</label>
                        <input type="url" name="canonical_url" value="<?= old('canonical_url', $caseStudy['canonical_url'] ?? '') ?>" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-text mb-2">SEO Description</label>
                        <textarea name="seo_description" rows="2" class="w-full px-4 py-2 bg-surface-secondary border border-border rounded-lg text-text focus:outline-none focus:border-brand-primary"><?= old('seo_description', $caseStudy['seo_description'] ?? '') ?></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex justify-end">
                <button type="submit" class="px-8 py-3 bg-brand-primary text-white font-bold rounded-lg hover:bg-brand-secondary transition-colors">
                    <?= isset($caseStudy) ? 'Update Case Study' : 'Create Case Study' ?>
                </button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
