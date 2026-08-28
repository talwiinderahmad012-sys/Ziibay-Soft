<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="py-20 relative overflow-hidden bg-surface transition-colors duration-300">
    <!-- Background Glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-brand-primary/10 blur-[100px] rounded-full pointer-events-none"></div>

    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6">Our Selected <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-secondary">Work</span></h1>
        <p class="text-xl text-text-muted max-w-2xl mx-auto mb-10">
            Explore how we've helped businesses across industries transform their operations through innovative digital solutions.
        </p>

        <!-- Categories / Filters (Mockup of dynamic filters) -->
        <?php if (!empty($categories)): ?>
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <a href="<?= base_url('portfolio') ?>" class="px-5 py-2 rounded-full text-sm font-medium transition-all duration-300 <?= (!$serviceFilter && !$industryFilter) ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/30' : 'bg-surface-secondary text-text hover:bg-brand-primary/10' ?>">
                    All Projects
                </a>
                <?php foreach ($categories as $cat): ?>
                    <span class="px-5 py-2 rounded-full text-sm font-medium bg-surface-secondary text-text border border-border transition-colors">
                        <?= esc($cat) ?>
                    </span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Portfolio Grid Section -->
<section class="py-16 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4">
        
        <?php if (empty($projects)): ?>
            <!-- Empty State -->
            <div class="text-center py-20 bg-surface-secondary rounded-2xl border border-border">
                <div class="w-20 h-20 mx-auto bg-brand-primary/10 text-brand-primary rounded-full flex items-center justify-center mb-6">
                    <i class="fa-solid fa-briefcase text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-text mb-2">Selected work will appear here</h3>
                <p class="text-text-muted">As projects are published, they will be showcased in this section.</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php foreach ($projects as $project): ?>
                    <a href="<?= base_url('portfolio/' . esc($project['slug'])) ?>" class="group block h-full bg-surface-secondary rounded-2xl border border-border overflow-hidden hover:border-brand-primary/50 hover:shadow-xl hover:shadow-brand-primary/10 transition-all duration-300 flex flex-col">
                        <!-- Image -->
                        <div class="relative h-60 overflow-hidden bg-surface">
                            <?php if ($project['featured_image']): ?>
                                <img src="<?= base_url(esc($project['featured_image'])) ?>" alt="<?= esc($project['title']) ?> Preview" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                            <?php else: ?>
                                <div class="w-full h-full flex items-center justify-center text-text-muted">
                                    <i class="fa-regular fa-image text-4xl"></i>
                                </div>
                            <?php endif; ?>
                            
                            <!-- Featured Badge -->
                            <?php if ($project['featured']): ?>
                                <div class="absolute top-4 right-4 px-3 py-1 bg-brand-primary text-white text-xs font-bold rounded-full shadow-lg">
                                    Featured
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6 flex flex-col flex-grow">
                            <!-- Category/Industry hint if available -->
                            <?php if ($project['project_type']): ?>
                                <div class="text-brand-secondary text-sm font-semibold mb-2">
                                    <?= esc($project['project_type']) ?>
                                </div>
                            <?php endif; ?>
                            
                            <h3 class="text-xl font-bold text-text mb-3 group-hover:text-brand-primary transition-colors">
                                <?= esc($project['title']) ?>
                            </h3>
                            
                            <p class="text-text-muted text-sm line-clamp-3 mb-6 flex-grow">
                                <?= esc($project['short_description']) ?>
                            </p>
                            
                            <div class="mt-auto flex items-center text-brand-primary font-medium text-sm group-hover:translate-x-2 transition-transform">
                                View Case Study <i class="fa-solid fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-surface-secondary transition-colors duration-300 relative border-t border-border">
    <div class="container mx-auto px-4 text-center max-w-4xl relative z-10">
        <h2 class="text-3xl md:text-4xl font-bold text-text mb-6">Ready to Start Your Project?</h2>
        <p class="text-lg text-text-muted mb-10">Let's discuss how our tailored digital solutions can accelerate your business growth.</p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="<?= base_url('contact') ?>" class="px-8 py-4 bg-brand-primary text-white rounded-full font-semibold hover:bg-brand-primary/90 transition-colors shadow-lg shadow-brand-primary/25 w-full sm:w-auto">
                Discuss Your Idea
            </a>
            <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode('Hello Ziibay Soft, I saw your portfolio and would like to discuss a project.') ?>" target="_blank" rel="noopener noreferrer" class="px-8 py-4 bg-green-500 text-white rounded-full font-semibold hover:bg-green-600 transition-colors shadow-lg shadow-green-500/25 flex items-center justify-center gap-2 w-full sm:w-auto">
                <i class="fa-brands fa-whatsapp text-xl"></i> WhatsApp Us
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
