<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-24 pb-20 relative overflow-hidden bg-surface/30 border-b border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="text-caption text-primary mb-3">CASE ARCHIVES</div>
            <h1 class="h1 text-text mb-6">Success <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent-blue">Stories</span></h1>
            <p class="text-body text-lg text-text-muted max-w-3xl mx-auto">
                Discover how we've engineered scalable digital solutions for ambitious brands, solved complex challenges, and delivered measurable business growth.
            </p>
        </div>
    </div>
</section>

<!-- Featured Case Studies -->
<?php if (!empty($featuredCaseStudies)): ?>
<section class="py-16 bg-surface/50 border-b border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-caption text-primary mb-2 text-center">SELECTED DELIVERABLES</div>
        <h2 class="h2 text-text mb-10 text-center">Featured Work</h2>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <?php foreach ($featuredCaseStudies as $index => $cs): ?>
                <?php if ($index === 0): // Highlight the first featured item ?>
                    <a href="<?= base_url('case-studies/' . esc($cs['slug'])) ?>" class="lg:col-span-2 group flex flex-col md:flex-row tech-card rounded-xl overflow-hidden">
                        <div class="md:w-1/2 relative h-64 md:h-auto bg-surface-hover">
                            <?php if ($cs['featured_image']): ?>
                                <img src="<?= base_url(esc($cs['featured_image'])) ?>" alt="<?= esc($cs['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="eager">
                            <?php endif; ?>
                            <div class="absolute top-3 left-3 px-2.5 py-1 bg-primary text-background text-[10px] font-mono font-bold uppercase rounded-full shadow-tech">Featured</div>
                        </div>
                        <div class="md:w-1/2 p-8 lg:p-10 flex flex-col justify-center">
                            <h3 class="text-2xl font-bold text-text mb-3 group-hover:text-primary transition-colors"><?= esc($cs['title']) ?></h3>
                            <p class="text-small text-text-muted mb-6 leading-relaxed"><?= esc($cs['excerpt'] ?? $cs['short_description']) ?></p>
                            <div class="mt-auto flex items-center text-primary font-mono text-xs uppercase tracking-wider">
                                Read Full Case Study <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                <?php else: ?>
                    <a href="<?= base_url('case-studies/' . esc($cs['slug'])) ?>" class="group flex flex-col tech-card rounded-xl overflow-hidden">
                        <div class="relative h-56 bg-surface-hover overflow-hidden border-b border-border/50">
                            <?php if ($cs['featured_image']): ?>
                                <img src="<?= base_url(esc($cs['featured_image'])) ?>" alt="<?= esc($cs['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-lg font-bold text-text mb-2 group-hover:text-primary transition-colors"><?= esc($cs['title']) ?></h3>
                            <p class="text-small text-text-muted mb-6 flex-grow leading-relaxed"><?= esc($cs['excerpt'] ?? $cs['short_description']) ?></p>
                            <div class="mt-auto flex items-center text-primary font-mono text-xs uppercase tracking-wider">
                                Read Full Case Study <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
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
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="flex flex-wrap items-center justify-between mb-10 border-b border-border/70 pb-4">
            <h2 class="h3 text-text">All Case Studies</h2>
            <div class="flex gap-2 mt-4 md:mt-0">
                <a href="<?= base_url('case-studies') ?>" class="text-xs font-mono font-semibold px-4 py-1.5 rounded-full <?= (!$serviceFilter && !$industryFilter && !$techFilter) ? 'bg-primary text-background shadow-tech' : 'tech-badge text-text-muted hover:text-text' ?> transition-colors">
                    All
                </a>
            </div>
        </div>

        <?php if (empty($caseStudies)): ?>
            <div class="text-center py-20 tech-panel border-dashed border-2 border-border/70 rounded-xl">
                <div class="w-16 h-16 mx-auto bg-surface border border-border text-primary rounded-lg flex items-center justify-center mb-4">
                    <i class="fa-solid fa-folder-open text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-text mb-2">Detailed case studies coming soon</h3>
                <p class="text-small text-text-muted max-w-md mx-auto">Our detailed case studies will be published here as projects are documented and approved for publication.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($caseStudies as $cs): ?>
                    <a href="<?= base_url('case-studies/' . esc($cs['slug'])) ?>" class="group flex flex-col tech-card rounded-xl overflow-hidden">
                        <div class="relative h-52 bg-surface-hover overflow-hidden border-b border-border/50">
                            <?php if ($cs['featured_image']): ?>
                                <img src="<?= base_url(esc($cs['featured_image'])) ?>" alt="<?= esc($cs['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-text-muted">
                                    <i class="fa-solid fa-image text-4xl"></i>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="text-base font-bold text-text mb-2 group-hover:text-primary transition-colors line-clamp-2"><?= esc($cs['title']) ?></h3>
                            <p class="text-small text-text-muted line-clamp-3 mb-6 flex-grow leading-relaxed"><?= esc($cs['excerpt'] ?? $cs['short_description']) ?></p>
                            <div class="mt-auto flex items-center text-primary font-mono text-xs uppercase tracking-wider">
                                Read Case Study <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-surface/50 border-t border-border/70">
    <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="h2 text-text mb-4">Have a similar project in mind?</h2>
        <p class="text-body text-text-muted mb-8">We bring technical excellence and strategic thinking to every project. Let's discuss how we can solve your toughest challenges.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?= base_url('contact') ?>" class="btn-primary py-3.5 px-8 text-sm w-full sm:w-auto">
                Discuss Your Project
            </a>
            <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode('Hello Ziibay Soft, I reviewed your case studies and would like to discuss a project.') ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary py-3.5 px-8 text-sm w-full sm:w-auto flex items-center justify-center gap-2">
                <i class="fa-brands fa-whatsapp text-lg text-emerald-500"></i> WhatsApp Us
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
