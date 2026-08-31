<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= isset($meta_description) ? $this->section('meta_description') . esc($meta_description) . $this->endSection() : '' ?>
<?= isset($canonical_url) ? $this->section('canonical') . esc($canonical_url) . $this->endSection() : '' ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-24 pb-16 bg-surface/30 border-b border-border/70 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <?php if(isset($filters['category'])): ?>
                <div class="text-caption text-primary mb-3">CATEGORY ARCHIVE</div>
                <h1 class="h1 text-text mb-6"><?= esc($filters['category']['name']) ?></h1>
                <p class="text-body text-lg text-text-muted max-w-3xl mx-auto"><?= esc($filters['category']['description'] ?? 'Explore articles in this category.') ?></p>
            <?php elseif(isset($filters['tag'])): ?>
                <div class="text-caption text-primary mb-3">TOPIC ARCHIVE</div>
                <h1 class="h1 text-text mb-6">Topic: <span class="text-primary font-mono">#<?= esc($filters['tag']['name']) ?></span></h1>
                <p class="text-body text-lg text-text-muted max-w-3xl mx-auto">Articles and guides related to <?= esc($filters['tag']['name']) ?>.</p>
            <?php elseif(isset($filters['author'])): ?>
                <div class="text-caption text-primary mb-3">AUTHOR ARCHIVE</div>
                <h1 class="h1 text-text mb-6">Articles by <span class="text-primary"><?= esc($filters['author']['name']) ?></span></h1>
                <p class="text-body text-lg text-text-muted max-w-3xl mx-auto"><?= esc($filters['author']['short_bio'] ?? '') ?></p>
            <?php else: ?>
                <div class="text-caption text-primary mb-3">INTELLIGENCE HUB</div>
                <h1 class="h1 text-text mb-6">Insights & <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent-blue">Knowledge</span></h1>
                <p class="text-body text-lg text-text-muted max-w-3xl mx-auto">Expert strategies, technical deep-dives, and digital growth guides from the team at Ziibay Soft.</p>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Featured Article -->
<?php if (!empty($featuredPost)): ?>
<section class="py-12 bg-surface/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="<?= base_url('blog/' . esc($featuredPost['slug'])) ?>" class="group block relative rounded-xl overflow-hidden tech-card">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="relative h-64 lg:h-auto bg-surface-hover overflow-hidden border-b lg:border-b-0 lg:border-r border-border/50">
                    <?php if ($featuredPost['featured_image']): ?>
                        <img src="<?= base_url(esc($featuredPost['featured_image'])) ?>" alt="<?= esc($featuredPost['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" loading="eager">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center text-text-muted bg-surface-hover">
                            <i class="fa-solid fa-image text-4xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="absolute top-4 left-4 px-3 py-1 bg-primary text-background text-[10px] font-mono font-bold rounded-full shadow-tech uppercase tracking-wider">
                        Featured Insight
                    </div>
                </div>
                <div class="p-8 lg:p-12 flex flex-col justify-center">
                    <?php if ($featuredPost['category_name']): ?>
                        <span class="text-caption text-primary mb-3 block"><?= esc($featuredPost['category_name']) ?></span>
                    <?php endif; ?>
                    <h2 class="text-2xl lg:text-3xl font-bold text-text mb-4 group-hover:text-primary transition-colors leading-tight"><?= esc($featuredPost['title']) ?></h2>
                    <p class="text-small text-text-muted mb-6 leading-relaxed"><?= esc($featuredPost['excerpt']) ?></p>
                    
                    <div class="mt-auto flex items-center justify-between border-t border-border/40 pt-4">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full bg-primary text-background flex items-center justify-center font-bold text-xs mr-3">
                                <?= substr(esc($featuredPost['author_name'] ?? 'Z'), 0, 1) ?>
                            </div>
                            <div>
                                <div class="text-text font-semibold text-xs"><?= esc($featuredPost['author_name'] ?? 'Ziibay Soft Team') ?></div>
                                <div class="text-text-dim text-[10px] font-mono"><?= date('F j, Y', strtotime($featuredPost['published_at'])) ?></div>
                            </div>
                        </div>
                        <div class="text-primary font-mono text-xs uppercase tracking-wider hidden sm:flex items-center">
                            Read Article <i class="fa-solid fa-arrow-right ml-1.5 group-hover:translate-x-1 transition-transform"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
<?php endif; ?>

<!-- Latest Articles -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Categories Filter -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 border-b border-border/70 pb-4">
            <h2 class="h3 text-text mb-4 md:mb-0">Latest Articles</h2>
            <div class="flex flex-wrap gap-2">
                <a href="<?= base_url('blog') ?>" class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold bg-primary text-background shadow-tech transition-colors">
                    All Topics
                </a>
                <?php foreach ($categories as $cat): ?>
                    <a href="<?= base_url('blog/category/' . esc($cat['slug'])) ?>" class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold tech-badge text-text-muted hover:text-text">
                        <?= esc($cat['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if (empty($posts)): ?>
            <div class="text-center py-20 tech-panel border-dashed border-2 border-border/70 rounded-xl">
                <div class="w-16 h-16 mx-auto bg-surface border border-border text-primary rounded-lg flex items-center justify-center mb-4">
                    <i class="fa-solid fa-pen-nib text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-text mb-2">Publishing soon</h3>
                <p class="text-small text-text-muted max-w-md mx-auto">We are currently preparing our knowledge hub. Insights and guides will appear here shortly.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($posts as $post): ?>
                    <a href="<?= base_url('blog/' . esc($post['slug'])) ?>" class="group flex flex-col tech-card rounded-xl overflow-hidden">
                        <div class="relative h-52 bg-surface-hover overflow-hidden border-b border-border/50">
                            <?php if ($post['featured_image']): ?>
                                <img src="<?= base_url(esc($post['featured_image'])) ?>" alt="<?= esc($post['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-text-muted">
                                    <i class="fa-regular fa-image text-4xl"></i>
                                </div>
                            <?php endif; ?>
                            <?php if ($post['category_name']): ?>
                                <div class="absolute top-3 right-3 bg-surface/90 backdrop-blur-sm text-text text-[10px] font-mono font-bold px-2.5 py-0.5 rounded-full border border-border">
                                    <?= esc($post['category_name']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-base font-bold text-text mb-2 group-hover:text-primary transition-colors line-clamp-2 leading-snug"><?= esc($post['title']) ?></h3>
                            <p class="text-small text-text-muted line-clamp-3 mb-6 flex-grow leading-relaxed"><?= esc($post['excerpt']) ?></p>
                            
                            <div class="flex items-center justify-between border-t border-border/40 pt-3 mt-auto">
                                <div class="flex items-center text-xs">
                                    <span class="text-text font-semibold"><?= esc($post['author_name'] ?? 'Ziibay Soft') ?></span>
                                    <span class="mx-1.5 text-text-dim">&bull;</span>
                                    <span class="text-text-dim font-mono text-[10px]"><?= date('M j, Y', strtotime($post['published_at'])) ?></span>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-12 flex justify-center">
                <?= $pager ?>
            </div>
        <?php endif; ?>
        
    </div>
</section>

<!-- Newsletter / CTA -->
<section class="py-24 bg-surface/50 border-t border-border/70 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="max-w-2xl mx-auto tech-panel p-10 rounded-xl">
            <div class="text-caption text-primary mb-2">STRATEGIC ALLIANCE</div>
            <h2 class="h2 text-text mb-4">Build your next project with experts</h2>
            <p class="text-body text-text-muted mb-8">Get the technical foundation you need to scale your business. We design, build, and optimize enterprise-grade applications.</p>
            <a href="<?= base_url('contact') ?>" class="btn-primary py-3.5 px-8 text-sm">
                Discuss Your Requirements
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
