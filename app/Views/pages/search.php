<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?php if (isset($noindex) && $noindex): ?>
    <?= $this->section('meta_tags') ?>
    <meta name="robots" content="noindex, follow">
    <?= $this->endSection() ?>
<?php endif; ?>

<?= $this->section('content') ?>

<section class="pt-32 pb-16 bg-surface transition-colors duration-300 min-h-screen">
    <div class="container mx-auto px-4 max-w-4xl">
        <h1 class="text-3xl md:text-5xl font-bold text-text mb-8 text-center">Global Search</h1>
        
        <!-- Search Form -->
        <form action="<?= base_url('search') ?>" method="GET" class="mb-12">
            <div class="relative max-w-2xl mx-auto">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-text-muted">
                    <i class="fa-solid fa-search text-lg"></i>
                </div>
                <input type="text" name="q" value="<?= esc($query) ?>" placeholder="Search services, articles, case studies..." class="w-full pl-12 pr-32 py-4 bg-surface-secondary border border-border rounded-full text-text text-lg focus:outline-none focus:ring-2 focus:ring-brand-primary focus:border-transparent transition-all shadow-sm">
                <button type="submit" class="absolute inset-y-2 right-2 px-6 bg-brand-primary text-white font-bold rounded-full hover:bg-brand-secondary transition-colors">
                    Search
                </button>
            </div>
            
            <!-- Filters -->
            <?php if (!empty($query)): ?>
            <div class="flex flex-wrap justify-center gap-3 mt-6">
                <a href="<?= base_url('search?q=' . urlencode($query)) ?>" class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?= empty($typeFilter) ? 'bg-brand-primary text-white' : 'bg-surface-secondary border border-border text-text-muted hover:text-text' ?>">
                    All Results
                </a>
                <a href="<?= base_url('search?q=' . urlencode($query) . '&type=service') ?>" class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?= $typeFilter === 'service' ? 'bg-brand-primary text-white' : 'bg-surface-secondary border border-border text-text-muted hover:text-text' ?>">
                    Services
                </a>
                <a href="<?= base_url('search?q=' . urlencode($query) . '&type=industry') ?>" class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?= $typeFilter === 'industry' ? 'bg-brand-primary text-white' : 'bg-surface-secondary border border-border text-text-muted hover:text-text' ?>">
                    Industries
                </a>
                <a href="<?= base_url('search?q=' . urlencode($query) . '&type=article') ?>" class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?= $typeFilter === 'article' ? 'bg-brand-primary text-white' : 'bg-surface-secondary border border-border text-text-muted hover:text-text' ?>">
                    Articles
                </a>
                <a href="<?= base_url('search?q=' . urlencode($query) . '&type=faq') ?>" class="px-4 py-2 rounded-full text-sm font-medium transition-colors <?= $typeFilter === 'faq' ? 'bg-brand-primary text-white' : 'bg-surface-secondary border border-border text-text-muted hover:text-text' ?>">
                    FAQs
                </a>
            </div>
            <?php endif; ?>
        </form>

        <!-- Results -->
        <?php if (!empty($query)): ?>
            <div class="mb-6 text-text-muted">
                Found <strong><?= $total ?></strong> result<?= $total !== 1 ? 's' : '' ?> for "<?= esc($query) ?>"
            </div>

            <?php if (empty($results)): ?>
                <div class="bg-surface-secondary border border-border rounded-2xl p-12 text-center">
                    <i class="fa-solid fa-search-minus text-4xl text-text-muted mb-4"></i>
                    <h3 class="text-xl font-bold text-text mb-2">No results found</h3>
                    <p class="text-text-muted mb-6">We couldn't find anything matching your search. Please try different keywords.</p>
                    <a href="<?= base_url('services') ?>" class="text-brand-primary font-bold hover:underline">Browse our Services</a>
                </div>
            <?php else: ?>
                <div class="space-y-6">
                    <?php foreach ($results as $result): ?>
                        <div class="bg-surface border border-border p-6 rounded-2xl hover:border-brand-primary/50 hover:shadow-md transition-all">
                            <div class="flex items-start justify-between mb-2">
                                <a href="<?= $result['url'] ?>" class="text-xl font-bold text-brand-primary hover:underline">
                                    <?= esc($result['title']) ?>
                                </a>
                                <span class="px-3 py-1 bg-surface-secondary text-text-muted text-xs font-bold rounded-full border border-border shrink-0">
                                    <?= esc($result['type']) ?>
                                </span>
                            </div>
                            <p class="text-text-muted text-sm line-clamp-2">
                                <?= esc($result['excerpt']) ?>
                            </p>
                            <div class="mt-4">
                                <a href="<?= $result['url'] ?>" class="text-sm font-bold text-text hover:text-brand-primary transition-colors flex items-center">
                                    View <?= esc($result['type']) ?> <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Pagination -->
                <?php if ($totalPages > 1): ?>
                    <div class="mt-12 flex justify-center gap-2">
                        <?php if ($page > 1): ?>
                            <a href="<?= base_url('search?q=' . urlencode($query) . ($typeFilter ? '&type=' . urlencode($typeFilter) : '') . '&page=' . ($page - 1)) ?>" class="px-4 py-2 bg-surface-secondary border border-border text-text rounded-lg hover:bg-brand-primary hover:text-white hover:border-brand-primary transition-colors">Previous</a>
                        <?php endif; ?>
                        
                        <span class="px-4 py-2 text-text-muted font-medium">Page <?= $page ?> of <?= $totalPages ?></span>
                        
                        <?php if ($page < $totalPages): ?>
                            <a href="<?= base_url('search?q=' . urlencode($query) . ($typeFilter ? '&type=' . urlencode($typeFilter) : '') . '&page=' . ($page + 1)) ?>" class="px-4 py-2 bg-surface-secondary border border-border text-text rounded-lg hover:bg-brand-primary hover:text-white hover:border-brand-primary transition-colors">Next</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?= $this->endSection() ?>
