<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-32 pb-16 bg-surface transition-colors duration-300 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-1/2 h-1/2 bg-brand-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10 text-center max-w-4xl">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">Frequently Asked <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary">Questions</span></h1>
        <p class="text-xl text-text-muted mb-8">
            Everything you need to know about working with Ziibay Soft.
        </p>
        
        <!-- Search -->
        <form action="<?= base_url('faq') ?>" method="GET" class="max-w-xl mx-auto relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-text-muted">
                <i class="fa-solid fa-search"></i>
            </div>
            <input type="text" name="q" value="<?= esc($search) ?>" placeholder="Search FAQs..." class="w-full pl-12 pr-4 py-3 bg-surface-secondary border border-border rounded-full text-text focus:outline-none focus:ring-2 focus:ring-brand-primary transition-all shadow-sm">
        </form>
    </div>
</section>

<!-- FAQs Section -->
<section class="py-12 bg-surface transition-colors duration-300 min-h-[400px]">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <?php if (!empty($search)): ?>
            <div class="mb-8 text-center text-text-muted">
                <p>Showing results for "<strong><?= esc($search) ?></strong>"</p>
                <a href="<?= base_url('faq') ?>" class="text-brand-primary hover:underline text-sm font-bold mt-2 inline-block">Clear Search</a>
            </div>
        <?php endif; ?>

        <?php if (empty($faqs)): ?>
            <div class="text-center py-12 bg-surface-secondary rounded-2xl border border-border">
                <i class="fa-regular fa-circle-question text-4xl text-text-muted mb-4"></i>
                <h3 class="text-xl font-bold text-text mb-2">No FAQs found</h3>
                <p class="text-text-muted mb-6">We couldn't find any questions matching your criteria.</p>
                <a href="<?= base_url('contact') ?>" class="btn-primary py-3 px-6">Ask us directly</a>
            </div>
        <?php else: ?>
            <div class="space-y-4" x-data="{ activeAccordion: null }">
                <?php foreach ($faqs as $index => $faq): ?>
                    <div class="bg-surface border border-border rounded-2xl overflow-hidden shadow-sm transition-all duration-200 hover:border-brand-primary/50">
                        <button 
                            @click="activeAccordion = activeAccordion === <?= $index ?> ? null : <?= $index ?>"
                            class="w-full px-6 py-5 text-left flex justify-between items-center focus:outline-none focus-visible:bg-surface-secondary"
                            :aria-expanded="activeAccordion === <?= $index ?>"
                            aria-controls="faq-<?= $index ?>"
                        >
                            <span class="font-bold text-lg text-text pr-4"><?= esc($faq['question']) ?></span>
                            <span class="text-brand-primary transform transition-transform duration-300 flex-shrink-0" :class="{ 'rotate-180': activeAccordion === <?= $index ?> }">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </button>
                        <div 
                            id="faq-<?= $index ?>"
                            x-show="activeAccordion === <?= $index ?>" 
                            x-collapse
                            style="display: none;"
                        >
                            <div class="px-6 pb-6 text-text-muted prose prose-sm dark:prose-invert max-w-none">
                                <?= $faq['answer'] // Safe HTML from admin ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Contact CTA -->
        <div class="mt-16 text-center bg-surface-secondary p-8 rounded-3xl border border-border">
            <h3 class="text-2xl font-bold text-text mb-2">Still have questions?</h3>
            <p class="text-text-muted mb-6">Can't find the answer you're looking for? Please chat to our friendly team.</p>
            <div class="flex justify-center gap-4">
                <a href="<?= base_url('contact') ?>" class="btn-primary py-3 px-8">Get in Touch</a>
                <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>" target="_blank" class="px-8 py-3 bg-[#25D366] text-white font-bold rounded-full hover:bg-[#1DA851] transition-colors shadow-lg shadow-green-500/20 flex items-center">
                    <i class="fa-brands fa-whatsapp mr-2"></i> WhatsApp
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
