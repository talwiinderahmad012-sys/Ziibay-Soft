<?php
/**
 * Reusable related-content link component (Phase #20).
 *
 * Expected variables:
 *   $related_title    string  Section heading
 *   $related_items    array   Each: ['url' => string, 'title' => string,
 *                                    'excerpt' => string|null, 'badge' => string|null]
 *   $related_columns  string  Optional grid column classes (default 3)
 *
 * Only renders when $related_items is non-empty — related content is
 * relationship-driven, never randomized or padded.
 */

if (empty($related_items)) {
    return;
}

$related_title   = $related_title ?? 'Related Content';
$related_columns = $related_columns ?? 'md:grid-cols-3';
?>
<section class="py-16 border-t border-border">
    <div class="container mx-auto">
        <h2 class="h3 text-text mb-10"><?= esc($related_title) ?></h2>

        <div class="grid grid-cols-1 <?= esc($related_columns) ?> gap-6">
            <?php foreach ($related_items as $item): ?>
                <a href="<?= esc($item['url']) ?>"
                   class="group flex flex-col glass-panel rounded-2xl border border-border p-6 hover:border-primary/50 hover:-translate-y-1 transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                    <?php if (! empty($item['badge'])): ?>
                        <span class="text-caption text-primary mb-3"><?= esc($item['badge']) ?></span>
                    <?php endif; ?>

                    <h3 class="text-lg font-bold text-text mb-2 group-hover:text-primary transition-colors line-clamp-2">
                        <?= esc($item['title']) ?>
                    </h3>

                    <?php if (! empty($item['excerpt'])): ?>
                        <p class="text-small line-clamp-2 mb-4"><?= esc($item['excerpt']) ?></p>
                    <?php endif; ?>

                    <span class="mt-auto inline-flex items-center text-sm font-semibold text-primary">
                        <?= esc($item['cta'] ?? 'Learn more') ?>
                        <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
