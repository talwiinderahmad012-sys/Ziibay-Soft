<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-24 pb-16 bg-surface/30 border-b border-border/70 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center max-w-4xl">
        <div class="text-caption text-primary mb-3">KNOWLEDGE PROTOCOLS</div>
        <h1 class="h1 text-text mb-6">Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent-blue">Questions</span></h1>
        <p class="text-body text-lg text-text-muted mb-8 max-w-2xl mx-auto">
            Everything you need to know about working with Ziibay Soft.
        </p>
        
        <!-- Search -->
        <form action="<?= base_url('faq') ?>" method="GET" class="max-w-xl mx-auto relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-text-dim text-xs">
                <i class="fa-solid fa-search"></i>
            </div>
            <input type="text" name="q" value="<?= esc($search) ?>" placeholder="Search FAQs..." class="w-full pl-10 pr-4 py-3 bg-surface border border-border rounded-lg text-text text-sm focus:outline-none focus:border-primary transition-all shadow-tech">
        </form>
    </div>
</section>

<!-- FAQs Section -->
<section class="py-16 min-h-[400px]">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php if (!empty($search)): ?>
            <div class="mb-8 text-center text-text-muted text-sm">
                <p>Showing results for "<strong class="text-text"><?= esc($search) ?></strong>"</p>
                <a href="<?= base_url('faq') ?>" class="tech-link text-xs font-mono mt-2 inline-block">Clear Search &rarr;</a>
            </div>
        <?php endif; ?>

        <?php if (empty($faqs)): ?>
            <div class="text-center py-16 tech-panel border-dashed border-2 border-border/70 rounded-xl">
                <i class="fa-regular fa-circle-question text-3xl text-text-dim mb-3"></i>
                <h3 class="text-lg font-bold text-text mb-1">No FAQs found</h3>
                <p class="text-small text-text-muted mb-6">We couldn't find any questions matching your criteria.</p>
                <a href="<?= base_url('contact') ?>" class="btn-primary py-3 px-6 text-xs">Ask us directly</a>
            </div>
        <?php else: ?>
            <div class="space-y-3" x-data="{ activeAccordion: null }">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="tech-card rounded-xl overflow-hidden transition-all duration-200">
                        <button 
                            @click="activeAccordion = activeAccordion === <?= $index ?> ? null : <?= $index ?>"
                            class="w-full px-6 py-4 text-left flex justify-between items-center focus:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                            :aria-expanded="activeAccordion === <?= $index ?>"
                            aria-controls="faq-<?= $index ?>"
                        >
                            <span class="font-bold text-sm md:text-base text-text pr-4"><?= esc($faq['question']) ?></span>
                            <span class="text-primary transform transition-transform duration-200 flex-shrink-0 text-xs" :class="{ 'rotate-180': activeAccordion === <?= $index ?> }">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </button>
                        <div 
                            id="faq-<?= $index ?>"
                            x-show="activeAccordion === <?= $index ?>" 
                            x-collapse
                            style="display: none;"
                        >
                            <div class="px-6 pb-5 text-text-muted text-sm border-t border-border/40 pt-3 leading-relaxed">
                                <?= $faq['answer'] ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Contact CTA -->
        <div class="mt-16 text-center tech-panel p-8 rounded-xl">
            <div class="text-caption text-primary mb-1">NEED ASSISTANCE?</div>
            <h3 class="h3 text-text mb-2">Still have questions?</h3>
            <p class="text-small text-text-muted mb-6">Can't find the answer you're looking for? Please chat to our engineering team.</p>
            <div class="flex justify-center gap-3">
                <a href="<?= base_url('contact') ?>" class="btn-primary py-3 px-6 text-xs">Get in Touch</a>
                <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>" target="_blank" class="btn-secondary py-3 px-6 text-xs flex items-center">
                    <i class="fa-brands fa-whatsapp text-emerald-500 mr-2 text-sm"></i> WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Schema -->
<?php if (!empty($faqs)): ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "mainEntity": [
    <?php 
    $schemaFaqs = [];
    foreach ($faqs as $faq) {
        $schemaFaqs[] = '{
            "@type": "Question",
            "name": ' . json_encode(strip_tags($faq['question'])) . ',
            "acceptedAnswer": {
                "@type": "Answer",
                "text": ' . json_encode(strip_tags($faq['answer'])) . '
            }
        }';
    }
    echo implode(",\n", $schemaFaqs);
    ?>
  ]
}
</script>
<?php endif; ?>

<?= $this->endSection() ?>
