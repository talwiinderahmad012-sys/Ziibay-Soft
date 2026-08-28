<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="py-24 relative overflow-hidden bg-surface transition-colors duration-300 border-b border-border">
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-brand-primary/10 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">Success <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary">Stories</span></h1>
        <p class="text-xl text-text-muted max-w-3xl mx-auto">
            Discover how we've engineered scalable digital solutions for ambitious brands, solved complex challenges, and delivered measurable business growth.
        </p>
    </div>
</section>

<!-- Featured Case Studies -->
<?php if (!empty($featuredCaseStudies)): ?>
<section class="py-16 bg-surface-secondary transition-colors duration-300 border-b border-border">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-text mb-10 text-center">Featured Work</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            <?php foreach ($featuredCaseStudies as $index => $cs): ?>
                <?php if ($index === 0): // Highlight the first featured item ?>
                    <a href="<?= base_url('case-studies/' . esc($cs['slug'])) ?>" class="lg:col-span-2 group flex flex-col md:flex-row bg-surface border border-border rounded-2xl overflow-hidden hover:border-brand-primary/50 hover:shadow-2xl transition-all duration-300">
                        <div class="md:w-1/2 relative h-64 md:h-auto bg-surface-secondary">
                            <?php if ($cs['featured_image']): ?>
                                <img src="<?= base_url(esc($cs['featured_image'])) ?>" alt="<?= esc($cs['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="eager">
                            <?php endif; ?>
                            <div class="absolute top-4 left-4 px-3 py-1 bg-brand-primary text-white text-xs font-bold rounded-full shadow-lg">Featured</div>
                        </div>
                        <div class="md:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                            <h3 class="text-3xl font-bold text-text mb-4 group-hover:text-brand-primary transition-colors"><?= esc($cs['title']) ?></h3>
                            <p class="text-text-muted text-lg mb-8"><?= esc($cs['excerpt'] ?? $cs['short_description']) ?></p>
                            <div class="mt-auto flex items-center text-brand-primary font-bold">
                                Read Full Case Study <i class="fa-solid fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('case-studies/' . esc($cs['slug'])) ?>" class="group flex flex-col bg-surface border border-border rounded-2xl overflow-hidden hover:border-brand-primary/50 hover:shadow-xl transition-all duration-300">
                        <div class="relative h-64 bg-surface-secondary overflow-hidden">
                            <?php if ($cs['featured_image']): ?>
                                <img src="<?= base_url(esc($cs['featured_image'])) ?>" alt="<?= esc($cs['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="p-8 flex flex-col flex-grow">
                            <h3 class="text-2xl font-bold text-text mb-4 group-hover:text-brand-primary transition-colors"><?= esc($cs['title']) ?></h3>
                            <p class="text-text-muted mb-6 flex-grow"><?= esc($cs['excerpt'] ?? $cs['short_description']) ?></p>
                            <div class="mt-auto flex items-center text-brand-primary font-bold text-sm">
                                Read Full Case Study <i class="fa-solid fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- All Case Studies Grid -->
<section class="py-20 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4">
        
        <!-- Filters (Mockup) -->
        <div class="flex flex-wrap items-center justify-between mb-12 border-b border-border pb-6">
            <h2 class="text-2xl font-bold text-text">All Case Studies</h2>
            <div class="flex gap-4 mt-4 md:mt-0">
                <a href="<?= base_url('case-studies') ?>" class="text-sm font-medium px-4 py-2 rounded-full <?= (!$serviceFilter && !$industryFilter && !$techFilter) ? 'bg-brand-primary text-white' : 'bg-surface-secondary text-text hover:bg-brand-primary/10' ?> transition-colors">
                    All
                </a>
                <!-- Future dynamic filters could render here based on available taxonomies -->
            </div>
        </div>

        <?php if (empty($caseStudies)): ?>
            <div class="text-center py-24 bg-surface-secondary rounded-2xl border border-border">
                <div class="w-20 h-20 mx-auto bg-brand-primary/10 text-brand-primary rounded-full flex items-center justify-center mb-6">
                    <i class="fa-solid fa-folder-open text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-text mb-2">Detailed case studies coming soon</h3>
                <p class="text-text-muted max-w-md mx-auto">Our detailed case studies will be published here as projects are documented and approved for publication.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($caseStudies as $cs): ?>
                    <!-- Only show in this grid if not featured (or we can show all). Let's show all here for complete list. -->
                    <a href="<?= base_url('case-studies/' . esc($cs['slug'])) ?>" class="group flex flex-col bg-surface-secondary border border-border rounded-2xl overflow-hidden hover:border-brand-primary/50 hover:shadow-xl transition-all duration-300">
                        <div class="relative h-56 bg-surface overflow-hidden">
                            <?php if ($cs['featured_image']): ?>
                                <img src="<?= base_url(esc($cs['featured_image'])) ?>" alt="<?= esc($cs['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-text-muted">
                                    <i class="fa-solid fa-image text-4xl"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-xl font-bold text-text mb-3 group-hover:text-brand-primary transition-colors line-clamp-2"><?= esc($cs['title']) ?></h3>
                            <p class="text-text-muted text-sm line-clamp-3 mb-6 flex-grow"><?= esc($cs['excerpt'] ?? $cs['short_description']) ?></p>
                            <div class="mt-auto flex items-center text-brand-primary font-semibold text-sm">
                                Read Case Study <i class="fa-solid fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-surface-secondary transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4 text-center max-w-3xl">
        <h2 class="text-3xl md:text-4xl font-bold text-text mb-6">Have a similar project in mind?</h2>
        <p class="text-lg text-text-muted mb-10">We bring technical excellence and strategic thinking to every project. Let's discuss how we can solve your toughest challenges.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?= base_url('contact') ?>" class="px-8 py-4 bg-brand-primary text-white rounded-full font-bold hover:bg-brand-primary/90 transition-colors shadow-lg shadow-brand-primary/25 w-full sm:w-auto">
                Discuss Your Project
            </a>
            <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode('Hello Ziibay Soft, I reviewed your case studies and would like to discuss a project.') ?>" target="_blank" rel="noopener noreferrer" class="px-8 py-4 bg-surface border-2 border-brand-primary text-brand-primary rounded-full font-bold hover:bg-brand-primary/10 transition-colors w-full sm:w-auto flex items-center justify-center">
                <i class="fa-brands fa-whatsapp text-xl mr-2"></i> WhatsApp Us
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
