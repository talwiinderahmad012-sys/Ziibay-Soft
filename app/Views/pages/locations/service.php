<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- ==========================================
     HERO SECTION
     ========================================== -->
<section class="pt-32 pb-16 bg-surface transition-colors duration-300 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-1/2 bg-brand-primary/10 blur-[100px] rounded-full pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">

        <!-- Breadcrumbs -->
        <nav class="flex justify-center text-sm text-text-muted mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <?php foreach($breadcrumbs as $index => $crumb): ?>
                    <li class="inline-flex items-center">
                        <?php if($index > 0): ?>
                            <svg class="w-3 h-3 text-text-muted mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                        <?php endif; ?>
                        <?php if($crumb['url']): ?>
                            <a href="<?= $crumb['url'] ?>" class="hover:text-brand-primary transition-colors"><?= esc($crumb['name']) ?></a>
                        <?php else: ?>
                            <span class="text-text font-medium"><?= esc($crumb['name']) ?></span>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>

        <!-- H1 — One per page, semantically correct -->
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">
            <?= esc($service['name']) ?> Company in <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary"><?= esc($city['name']) ?></span>
        </h1>
        
        <?php if(!empty($ls['intro'])): ?>
        <p class="text-xl text-text-muted max-w-3xl mx-auto mb-10">
            <?= esc($ls['intro']) ?>
        </p>
        <?php endif; ?>

        <!-- Primary CTAs -->
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?= base_url('contact') ?>" class="px-8 py-4 rounded-xl font-bold text-white bg-brand-primary hover:bg-brand-secondary transition-colors w-full sm:w-auto text-center">
                Start Your Project
            </a>
            <?php if(isset($settings['whatsapp_number']) && $settings['whatsapp_number']): ?>
            <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) ?>?text=<?= urlencode('Hello Ziibay Soft, I am interested in ' . $service['name'] . ' services for my business in ' . $city['name'] . '.') ?>" 
               target="_blank" rel="noopener noreferrer" 
               class="px-8 py-4 rounded-xl font-bold border-2 border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition-colors flex items-center justify-center w-full sm:w-auto">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.385 0 0 5.388 0 12.04c0 2.128.555 4.195 1.613 6.012L.376 24l6.096-1.597A11.961 11.961 0 0 0 12.03 24c6.643 0 12.03-5.387 12.03-12.04C24.06 5.388 18.674 0 12.031 0zm6.985 17.265c-.3.845-1.745 1.583-2.43 1.67-.624.08-1.427.243-4.593-1.07-3.824-1.584-6.3-5.485-6.49-5.736-.188-.25-1.554-2.066-1.554-3.94 0-1.874.97-2.795 1.31-3.172.342-.375.74-.47 1.01-.47.266 0 .53.003.766.014.246.01.575-.094.9.684.34.803 1.157 2.827 1.258 3.028.1.202.166.44.032.708-.133.27-.202.44-.403.67-.203.23-.42.502-.587.693-.188.21-.393.442-.162.838.23.395 1.026 1.69 2.2 2.73 1.517 1.343 2.766 1.763 3.163 1.954.398.192.633.16.868-.11.235-.27.994-1.163 1.258-1.562.264-.398.53-.332.893-.197.365.134 2.308 1.085 2.705 1.282.398.196.663.293.76.458.098.164.098.956-.202 1.802z"/></svg>
                WhatsApp Us
            </a>
            <?php endif; ?>
        </div>
        
        <!-- Transparent remote-work statement — no fake local claims -->
        <p class="mt-6 text-sm text-text-muted">
            Ziibay Soft works with businesses in <?= esc($city['name']) ?> fully remotely, delivering professional results without geographical limitations.
        </p>
    </div>
</section>

<!-- ==========================================
     UNIQUE LOCAL CONTENT
     ========================================== -->
<?php if(!empty($ls['content'])): ?>
<section class="py-16 bg-background transition-colors duration-300">
    <div class="container mx-auto px-4 prose dark:prose-invert lg:prose-lg max-w-4xl">
        <?= $ls['content'] ?>
    </div>
</section>
<?php endif; ?>

<!-- ==========================================
     LOCAL BUSINESS NEEDS (only if admin set it)
     ========================================== -->
<?php if(!empty($ls['local_business_needs'])): ?>
<section class="py-16 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-4xl">
        <h2 class="text-2xl font-bold text-text mb-6">What <?= esc($city['name']) ?> Businesses Need</h2>
        <div class="prose dark:prose-invert lg:prose-lg">
            <?= nl2br(esc($ls['local_business_needs'])) ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==========================================
     PARENT SERVICE LINK — Internal linking rule
     ========================================== -->
<section class="py-10 bg-surface border-t border-border transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-4xl">
        <p class="text-text-muted text-sm">
            Learn more about our full <a href="<?= base_url('services/' . esc($service['slug'])) ?>" class="text-brand-primary hover:underline font-semibold"><?= esc($service['name']) ?> services</a> — including capabilities, process, and client results.
        </p>
    </div>
</section>

<!-- ==========================================
     LOCAL FAQs (only if admin set them)
     ========================================== -->
<?php if(!empty($ls['local_faqs'])): ?>
<section class="py-16 bg-background transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-4xl">
        <h2 class="text-2xl font-bold text-text mb-8">Frequently Asked Questions</h2>
        <div class="prose dark:prose-invert">
            <?= nl2br(esc($ls['local_faqs'])) ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==========================================
     RELATED BLOG CONTENT (informational support)
     ========================================== -->
<?php if(!empty($relatedPosts)): ?>
<section class="py-16 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-5xl">
        <h2 class="text-2xl font-bold text-text mb-6">Related Guides</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach($relatedPosts as $post): ?>
            <a href="<?= base_url('blog/' . esc($post['slug'])) ?>" class="block p-5 rounded-xl border border-border bg-background hover:border-brand-primary transition-all group">
                <h3 class="text-base font-semibold text-text group-hover:text-brand-primary transition-colors mb-2"><?= esc($post['title']) ?></h3>
                <?php if($post['excerpt']): ?>
                    <p class="text-sm text-text-muted line-clamp-2"><?= esc($post['excerpt']) ?></p>
                <?php endif; ?>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==========================================
     RELATED SERVICES — Natural internal linking
     ========================================== -->
<?php if(!empty($relatedServices)): ?>
<section class="py-16 bg-background transition-colors duration-300">
    <div class="container mx-auto px-4 max-w-5xl">
        <h2 class="text-2xl font-bold text-text mb-6">Other Services</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <?php foreach($relatedServices as $rs): ?>
            <a href="<?= base_url('services/' . esc($rs['slug'])) ?>" class="block p-4 rounded-xl border border-border bg-surface hover:border-brand-primary transition-all text-center group">
                <span class="text-sm font-semibold text-text group-hover:text-brand-primary transition-colors"><?= esc($rs['name']) ?></span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- ==========================================
     FINAL CTA
     ========================================== -->
<section class="py-20 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4 text-center max-w-3xl">
        <h2 class="text-3xl font-bold text-text mb-4">Ready to grow your business in <?= esc($city['name']) ?>?</h2>
        <p class="text-text-muted mb-8">Let's discuss your project goals. We'll listen, advise, and build a solution that actually works for your business.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?= base_url('contact') ?>" class="px-8 py-4 rounded-xl font-bold text-white bg-brand-primary hover:bg-brand-secondary transition-colors w-full sm:w-auto text-center">
                Get a Free Consultation
            </a>
            <?php if(isset($settings['whatsapp_number']) && $settings['whatsapp_number']): ?>
            <a href="https://wa.me/<?= preg_replace('/[^0-9]/', '', $settings['whatsapp_number']) ?>?text=<?= urlencode('Hello, I would like to discuss ' . $service['name'] . ' for my business in ' . $city['name'] . '.') ?>" 
               target="_blank" rel="noopener noreferrer"
               class="px-8 py-4 rounded-xl font-bold border-2 border-green-500 text-green-500 hover:bg-green-500 hover:text-white transition-colors flex items-center justify-center w-full sm:w-auto">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 0C5.385 0 0 5.388 0 12.04c0 2.128.555 4.195 1.613 6.012L.376 24l6.096-1.597A11.961 11.961 0 0 0 12.03 24c6.643 0 12.03-5.387 12.03-12.04C24.06 5.388 18.674 0 12.031 0zm6.985 17.265c-.3.845-1.745 1.583-2.43 1.67-.624.08-1.427.243-4.593-1.07-3.824-1.584-6.3-5.485-6.49-5.736-.188-.25-1.554-2.066-1.554-3.94 0-1.874.97-2.795 1.31-3.172.342-.375.74-.47 1.01-.47.266 0 .53.003.766.014.246.01.575-.094.9.684.34.803 1.157 2.827 1.258 3.028.1.202.166.44.032.708-.133.27-.202.44-.403.67-.203.23-.42.502-.587.693-.188.21-.393.442-.162.838.23.395 1.026 1.69 2.2 2.73 1.517 1.343 2.766 1.763 3.163 1.954.398.192.633.16.868-.11.235-.27.994-1.163 1.258-1.562.264-.398.53-.332.893-.197.365.134 2.308 1.085 2.705 1.282.398.196.663.293.76.458.098.164.098.956-.202 1.802z"/></svg>
                WhatsApp Now
            </a>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- ==========================================
     SCHEMA: BreadcrumbList only
     No LocalBusiness schema injected — Ziibay Soft is a remote company
     ========================================== -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    <?php foreach($breadcrumbs as $index => $crumb): ?>
    {
      "@type": "ListItem",
      "position": <?= $index + 1 ?>,
      "name": "<?= esc($crumb['name']) ?>",
      "item": "<?= $crumb['url'] ? esc($crumb['url']) : esc($canonical_url) ?>"
    }<?= $index < count($breadcrumbs) - 1 ? ',' : '' ?>
    <?php endforeach; ?>
  ]
}
</script>

<?= $this->endSection() ?>
