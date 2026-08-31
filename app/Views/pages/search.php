<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?php if (isset($noindex) && $noindex): ?>
    <?= $this->section('meta_tags') ?>
    <meta name="robots" content="noindex, follow">
    <?= $this->endSection() ?>
<?php endif; ?>

<?= $this->section('content') ?>

<section class="pt-28 pb-20 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-8">
            <div class="text-caption text-primary mb-2">INDEX QUERY</div>
            <h1 class="h1 text-text">Global Search</h1>
        </div>
        
        <!-- Search Form -->
        <form action="<?= base_url('search') ?>" method="GET" class="mb-10">
            <div class="relative max-w-2xl mx-auto">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-text-dim text-xs">
                    <i class="fa-solid fa-search"></i>
                </div>
                <input type="text" name="q" value="<?= esc($query) ?>" placeholder="Search services, articles, case studies..." class="w-full pl-10 pr-28 py-3.5 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-all shadow-tech">
                <button type="submit" class="btn-primary absolute inset-y-1.5 right-1.5 px-5 !py-2 text-xs">
                    Search
                </button>
            </div>
            
            <!-- Filters -->
            <?php if (!empty($query)): ?>
            <div class="flex flex-wrap justify-center gap-2 mt-6">
                <a href="<?= base_url('search?q=' . urlencode($query)) ?>" class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold transition-colors <?= empty($typeFilter) ? 'bg-primary text-background shadow-tech' : 'tech-badge text-text-muted hover:text-text' ?>">
                    All Results
                </a>
                <a href="<?= base_url('search?q=' . urlencode($query) . '&type=service') ?>" class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold transition-colors <?= $typeFilter === 'service' ? 'bg-primary text-background shadow-tech' : 'tech-badge text-text-muted hover:text-text' ?>">
                    Services
                </a>
                <a href="<?= base_url('search?q=' . urlencode($query) . '&type=industry') ?>" class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold transition-colors <?= $typeFilter === 'industry' ? 'bg-primary text-background shadow-tech' : 'tech-badge text-text-muted hover:text-text' ?>">
                    Industries
                </a>
                <a href="<?= base_url('search?q=' . urlencode($query) . '&type=article') ?>" class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold transition-colors <?= $typeFilter === 'article' ? 'bg-primary text-background shadow-tech' : 'tech-badge text-text-muted hover:text-text' ?>">
                    Articles
                </a>
                <a href="<?= base_url('search?q=' . urlencode($query) . '&type=faq') ?>" class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold transition-colors <?= $typeFilter === 'faq' ? 'bg-primary text-background shadow-tech' : 'tech-badge text-text-muted hover:text-text' ?>">
                    FAQs
                </a>
            </div>
            <?php endif; ?>
        </form>

        <!-- Results -->
        <?php if (!empty($query)): ?>
            <div class="mb-6 text-xs font-mono text-text-dim">
                FOUND <strong class="text-text"><?= $total ?></strong> RESULT<?= $total !== 1 ? 'S' : '' ?> FOR "<?= esc($query) ?>"
            </div>

            <?php if (empty($results)): ?>
                <div class="tech-panel border-dashed border-2 border-border/70 p-12 text-center rounded-xl">
                    <i class="fa-solid fa-search-minus text-3xl text-text-dim mb-3"></i>
                    <h3 class="text-lg font-bold text-text mb-1">No results found</h3>
                    <p class="text-small text-text-muted mb-6">We couldn't find anything matching your search. Please try different keywords.</p>
                    <a href="<?= base_url('services') ?>" class="btn-secondary py-2.5 px-6 text-xs">Browse our Services</a>
                </div>
            <?php else: ?>
                <div class="space-y-4">
                    <?php foreach ($results as $result): ?>
                        <div class="tech-card p-6 rounded-xl">
                            <div class="flex items-start justify-between mb-2">
                                <a href="<?= $result['url'] ?>" class="text-base font-bold text-text hover:text-primary transition-colors">
                                    <?= esc($result['title']) ?>
                                </a>
                                <span class="tech-badge text-[10px] uppercase font-mono shrink-0 ml-2">
                                    <?= esc($result['type']) ?>
                                </span>
                            </div>
                            <p class="text-small text-text-muted line-clamp-2 leading-relaxed">
                                <?= esc($result['excerpt']) ?>
                            </p>
                            <div class="mt-4">
                                <a href="<?= $result['url'] ?>" class="text-xs font-mono uppercase tracking-wider text-primary hover:text-primary-light transition-colors flex items-center">
                                    View <?= esc($result['type']) ?> <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                    <div class="mt-12 flex justify-center items-center gap-2">
                        <?php if ($page > 1): ?>
                            <a href="<?= base_url('search?q=' . urlencode($query) . ($typeFilter ? '&type=' . urlencode($typeFilter) : '') . '&page=' . ($page - 1)) ?>" class="btn-secondary !py-2 !px-4 text-xs font-mono">Previous</a>
                        <?php endif; ?>
                        
                        <span class="px-4 py-2 text-xs font-mono text-text-dim">Page <?= $page ?> of <?= $totalPages ?></span>
                        
                        <?php if ($page < $totalPages): ?>
                            <a href="<?= base_url('search?q=' . urlencode($query) . ($typeFilter ? '&type=' . urlencode($typeFilter) : '') . '&page=' . ($page + 1)) ?>" class="btn-secondary !py-2 !px-4 text-xs font-mono">Next</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
