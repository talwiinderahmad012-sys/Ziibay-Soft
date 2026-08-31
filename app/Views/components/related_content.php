<?php
/**
 * Reusable related-content link component.
 *
 * Expected variables:
 *   $related_title    string  Section heading
 *   $related_items    array   Each: ['url' => string, 'title' => string,
 *                                    'excerpt' => string|null, 'badge' => string|null]
 *   $related_columns  string  Optional grid column classes (default 3)
 */

if (empty($related_items)) {
    return;
}

$related_title   = $related_title ?? 'Related Capabilities & Insights';
$related_columns = $related_columns ?? 'md:grid-cols-3';
?>
<section class="py-16 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h2 class="h3 text-text"><?= esc($related_title) ?></h2>
            <span class="text-caption text-text-dim hidden sm:inline">INDEX DIRECTORY</span>
        </div>

        <div class="grid grid-cols-1 <?= esc($related_columns) ?> gap-6">
            <?php foreach ($related_items as $item): ?>
                <a href="<?= esc($item['url']) ?>"
                   class="group flex flex-col tech-card rounded-xl p-6 hover:border-primary/50 transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                    <?php if (! empty($item['badge'])): ?>
                        <span class="text-caption text-primary mb-3"><?= esc($item['badge']) ?></span>
                    <?php endif; ?>

                    <h3 class="text-base font-bold text-text mb-2 group-hover:text-primary transition-colors line-clamp-2">
                        <?= esc($item['title']) ?>
                    </h3>

                    <?php if (! empty($item['excerpt'])): ?>
                        <p class="text-small line-clamp-2 mb-4 leading-relaxed"><?= esc($item['excerpt']) ?></p>
                    <?php endif; ?>

                    <span class="mt-auto inline-flex items-center text-xs font-semibold text-primary font-mono uppercase tracking-wider">
                        <?= esc($item['cta'] ?? 'Explore') ?>
                        <svg class="w-3.5 h-3.5 ml-1.5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
