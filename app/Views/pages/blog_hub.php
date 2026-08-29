<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= isset($meta_description) ? $this->section('meta_description') . esc($meta_description) . $this->endSection() : '' ?>
<?= isset($canonical_url) ? $this->section('canonical') . esc($canonical_url) . $this->endSection() : '' ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-32 pb-16 bg-surface transition-colors duration-300 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-brand-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <?php if(isset($filters['category'])): ?>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6"><?= esc($filters['category']['name']) ?></h1>
            <p class="text-xl text-text-muted max-w-3xl mx-auto"><?= esc($filters['category']['description'] ?? 'Explore articles in this category.') ?></p>
        <?php elseif(isset($filters['tag'])): ?>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">Topic: <span class="text-brand-primary">#<?= esc($filters['tag']['name']) ?></span></h1>
            <p class="text-xl text-text-muted max-w-3xl mx-auto">Articles and guides related to <?= esc($filters['tag']['name']) ?>.</p>
        <?php elseif(isset($filters['author'])): ?>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">Articles by <span class="text-brand-primary"><?= esc($filters['author']['name']) ?></span></h1>
            <p class="text-xl text-text-muted max-w-3xl mx-auto"><?= esc($filters['author']['short_bio'] ?? '') ?></p>
        <?php else: ?>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">Insights & <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary">Knowledge</span></h1>
            <p class="text-xl text-text-muted max-w-3xl mx-auto">Expert strategies, technical deep-dives, and digital growth guides from the team at Ziibay Soft.</p>
        <?php endif; ?>
    </div>
</section>

<!-- Featured Article -->
<?php if (!empty($featuredPost)): ?>
<section class="py-12 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4">
        <a href="<?= base_url('blog/' . esc($featuredPost['slug'])) ?>" class="group block relative rounded-3xl overflow-hidden shadow-2xl border border-border bg-surface hover:border-brand-primary/50 transition-all duration-300">
            <div class="grid grid-cols-1 lg:grid-cols-2">
                <div class="relative h-64 lg:h-auto bg-surface-secondary overflow-hidden">
                    <?php if ($featuredPost['featured_image']): ?>
                        <img src="<?= base_url(esc($featuredPost['featured_image'])) ?>" alt="<?= esc($featuredPost['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-700" loading="eager">
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center text-text-muted bg-surface-secondary">
                            <i class="fa-solid fa-image text-4xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="absolute top-6 left-6 px-4 py-2 bg-brand-primary text-white text-xs font-bold rounded-full shadow-lg z-10 uppercase tracking-wider">
                        Featured Insight
                    </div>
                </div>
                <div class="p-8 lg:p-16 flex flex-col justify-center bg-gradient-to-br from-surface to-surface-secondary">
                    <?php if ($featuredPost['category_name']): ?>
                        <span class="text-brand-secondary font-bold text-sm uppercase tracking-wider mb-4 block"><?= esc($featuredPost['category_name']) ?></span>
                    <?php endif; ?>
                    <h2 class="text-3xl lg:text-4xl font-bold text-text mb-6 group-hover:text-brand-primary transition-colors leading-tight"><?= esc($featuredPost['title']) ?></h2>
                    <p class="text-text-muted text-lg mb-8 leading-relaxed"><?= esc($featuredPost['excerpt']) ?></p>
                    
                    <div class="mt-auto flex items-center justify-between border-t border-border/50 pt-6">
                        <div class="flex items-center">
                            <div class="w-10 h-10 rounded-full bg-brand-primary text-white flex items-center justify-center font-bold mr-3 shadow-md">
                                <?= substr(esc($featuredPost['author_name'] ?? 'Z'), 0, 1) ?>
                            </div>
                            <div>
                                <div class="text-text font-bold text-sm"><?= esc($featuredPost['author_name'] ?? 'Ziibay Soft Team') ?></div>
                                <div class="text-text-muted text-xs"><?= date('F j, Y', strtotime($featuredPost['published_at'])) ?></div>
                            </div>
                        </div>
                        <div class="text-brand-primary font-bold text-sm hidden sm:flex items-center">
                            Read Article <i class="fa-solid fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</section>
<?php endif; ?>

<!-- Latest Articles -->
<section class="py-20 bg-surface-secondary transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4">
        
        <!-- Categories Filter Mockup -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 border-b border-border pb-6">
            <h2 class="text-3xl font-bold text-text mb-6 md:mb-0">Latest Articles</h2>
            <div class="flex flex-wrap gap-3">
                <a href="<?= base_url('blog') ?>" class="px-5 py-2 rounded-full text-sm font-medium bg-brand-primary text-white shadow-sm transition-colors">
                    All Topics
                </a>
                <?php foreach ($categories as $cat): ?>
                    <a href="<?= base_url('blog/category/' . esc($cat['slug'])) ?>" class="px-5 py-2 rounded-full text-sm font-medium bg-surface border border-border text-text hover:bg-brand-primary/10 hover:text-brand-primary transition-colors cursor-not-allowed">
                        <?= esc($cat['name']) ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <?php if (empty($posts)): ?>
            <div class="text-center py-24 bg-surface rounded-3xl border border-border shadow-sm">
                <div class="w-20 h-20 mx-auto bg-brand-primary/10 text-brand-primary rounded-full flex items-center justify-center mb-6">
                    <i class="fa-solid fa-pen-nib text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-text mb-2">Publishing soon</h3>
                <p class="text-text-muted max-w-md mx-auto">We are currently preparing our knowledge hub. Insights and guides will appear here shortly.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($posts as $post): ?>
                    <a href="<?= base_url('blog/' . esc($post['slug'])) ?>" class="group flex flex-col bg-surface border border-border rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-brand-primary/50 transition-all duration-300">
                        <div class="relative h-56 bg-surface-secondary overflow-hidden">
                            <?php if ($post['featured_image']): ?>
                                <img src="<?= base_url(esc($post['featured_image'])) ?>" alt="<?= esc($post['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-text-muted">
                                    <i class="fa-regular fa-image text-4xl"></i>
                                </div>
                            <?php endif; ?>
                            <?php if ($post['category_name']): ?>
                                <div class="absolute top-4 right-4 bg-surface/90 backdrop-blur-sm text-text text-xs font-bold px-3 py-1 rounded-full border border-border">
                                    <?= esc($post['category_name']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-text mb-3 group-hover:text-brand-primary transition-colors line-clamp-2 leading-tight"><?= esc($post['title']) ?></h3>
                            <p class="text-text-muted text-sm line-clamp-3 mb-6 flex-grow"><?= esc($post['excerpt']) ?></p>
                            
                            <div class="flex items-center justify-between border-t border-border pt-4 mt-auto">
                                <div class="flex items-center">
                                    <div class="text-text font-semibold text-xs"><?= esc($post['author_name'] ?? 'Ziibay Soft') ?></div>
                                    <span class="mx-2 text-border">&bull;</span>
                                    <div class="text-text-muted text-xs"><?= date('M j, Y', strtotime($post['published_at'])) ?></div>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>

            <!-- Pagination -->
            <div class="mt-16 flex justify-center">
                <?= $pager ?>
            </div>
        <?php endif; ?>
        
    </div>
</section>

<!-- Newsletter / CTA -->
<section class="py-24 bg-gradient-to-br from-brand-primary to-brand-secondary relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('<?= base_url('assets/images/pattern-overlay.png') ?>')] opacity-10"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <div class="max-w-2xl mx-auto bg-surface/10 backdrop-blur-md p-10 rounded-3xl border border-white/20">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Build your next project with experts</h2>
            <p class="text-lg text-white/90 mb-10">Get the technical foundation you need to scale your business. We design, build, and optimize enterprise-grade applications.</p>
            <a href="<?= base_url('contact') ?>" class="inline-block px-8 py-4 bg-white text-brand-primary rounded-full font-bold hover:bg-gray-100 transition-colors shadow-xl">
                Discuss Your Requirements
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
