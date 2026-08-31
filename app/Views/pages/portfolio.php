<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-24 pb-20 relative overflow-hidden bg-surface/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="text-caption text-primary mb-3">DEPLOYMENTS DIRECTORY</div>
            <h1 class="h1 text-text mb-6">Our Selected <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent-blue">Work</span></h1>
            <p class="text-body text-lg text-text-muted max-w-2xl mx-auto mb-8">
                Explore how we've helped businesses across industries transform their operations through innovative digital solutions.
            </p>

            <!-- Categories / Filters -->
            <?php if (!empty($categories)): ?>
                <div class="flex flex-wrap justify-center gap-2 mb-4">
                    <a href="<?= base_url('portfolio') ?>" class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold transition-all duration-200 <?= (!$serviceFilter && !$industryFilter) ? 'bg-primary text-background shadow-tech' : 'tech-badge text-text-muted hover:text-text' ?>">
                        All Projects
                    </a>
                    <?php foreach ($categories as $cat): ?>
                        <span class="px-4 py-1.5 rounded-full text-xs font-mono font-semibold tech-badge text-text-muted">
                            <?= esc($cat) ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Portfolio Grid Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php if (empty($projects)): ?>
            <!-- Empty State -->
            <div class="text-center py-20 tech-panel border-dashed border-2 border-border/70 rounded-xl">
                <div class="w-16 h-16 mx-auto bg-surface border border-border text-primary rounded-lg flex items-center justify-center mb-4">
                    <i class="fa-solid fa-briefcase text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-text mb-2">Selected work will appear here</h3>
                <p class="text-small text-text-muted">As projects are published, they will be showcased in this section.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php foreach ($projects as $project): ?>
                    <a href="<?= base_url('portfolio/' . esc($project['slug'])) ?>" class="group block h-full tech-card rounded-xl overflow-hidden flex flex-col">
                        <!-- Image -->
                        <div class="relative h-56 overflow-hidden bg-surface-hover border-b border-border/50">
                            <?php if ($project['featured_image']): ?>
                                <img src="<?= base_url(esc($project['featured_image'])) ?>" alt="<?= esc($project['title']) ?> Preview" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-text-muted">
                                    <i class="fa-regular fa-image text-4xl"></i>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Featured Badge -->
                            <?php if ($project['featured']): ?>
                                <div class="absolute top-3 right-3 px-2.5 py-1 bg-primary text-background text-[10px] font-mono font-bold uppercase rounded-full shadow-tech">
                                    Featured
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <!-- Category/Industry hint -->
                            <?php if ($project['project_type']): ?>
                                <div class="text-caption text-primary mb-2">
                                    <?= esc($project['project_type']) ?>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="text-lg font-bold text-text mb-2 group-hover:text-primary transition-colors">
                                <?= esc($project['title']) ?>
                            </h3>
                            
                            <p class="text-small text-text-muted line-clamp-3 mb-6 flex-grow leading-relaxed">
                                <?= esc($project['short_description']) ?>
                            </p>
                            
                            <div class="mt-auto flex items-center text-primary font-mono text-xs uppercase tracking-wider group-hover:text-primary-light">
                                View Case Study <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-surface/50 relative border-t border-border/70">
    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <h2 class="h2 text-text mb-4">Ready to Start Your Project?</h2>
        <p class="text-body text-text-muted mb-8">Let's discuss how our tailored digital solutions can accelerate your business growth.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?= base_url('contact') ?>" class="btn-primary py-3.5 px-8 text-sm w-full sm:w-auto">
                Discuss Your Idea
            </a>
            <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode('Hello Ziibay Soft, I saw your portfolio and would like to discuss a project.') ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary py-3.5 px-8 text-sm w-full sm:w-auto flex items-center justify-center gap-2">
                <i class="fa-brands fa-whatsapp text-lg text-emerald-500"></i> WhatsApp Us
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
