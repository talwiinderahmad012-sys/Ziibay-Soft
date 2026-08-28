<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>
<?= $this->section('og_image') ?><?= esc($og_image) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Project Hero -->
<section class="pt-32 pb-16 relative bg-surface overflow-hidden border-b border-border transition-colors duration-300">
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-brand-primary/5 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="container mx-auto px-4 relative z-10">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-sm text-text-muted mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="<?= base_url() ?>" class="hover:text-brand-primary transition-colors">Home</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <i class="fa-solid fa-chevron-right text-xs mx-2"></i>
                        <a href="<?= base_url('portfolio') ?>" class="hover:text-brand-primary transition-colors">Portfolio</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center text-text font-medium">
                        <i class="fa-solid fa-chevron-right text-xs mx-2 text-text-muted"></i>
                        <?= esc($project['title']) ?>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <?php if ($project['project_type']): ?>
                    <div class="inline-block px-3 py-1 bg-brand-primary/10 text-brand-primary rounded-full text-sm font-semibold mb-6">
                        <?= esc($project['project_type']) ?>
                    </div>
                <?php endif; ?>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6 leading-tight">
                    <?= esc($project['title']) ?>
                </h1>
                
                <p class="text-xl text-text-muted mb-8">
                    <?= nl2br(esc($project['short_description'])) ?>
                </p>
                
                <div class="flex flex-wrap gap-4 mb-8">
                    <?php if ($project['client_name']): ?>
                        <div class="flex flex-col">
                            <span class="text-xs text-text-muted uppercase tracking-wider font-semibold">Client</span>
                            <span class="text-text font-medium"><?= esc($project['client_name']) ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($industries)): ?>
                        <div class="flex flex-col ml-6">
                            <span class="text-xs text-text-muted uppercase tracking-wider font-semibold">Industry</span>
                            <span class="text-text font-medium">
                                <?= implode(', ', array_map('esc', array_column($industries, 'name'))) ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($project['project_url']): ?>
                        <div class="flex flex-col ml-6">
                            <span class="text-xs text-text-muted uppercase tracking-wider font-semibold">Live Link</span>
                            <a href="<?= esc($project['project_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-brand-primary hover:underline font-medium">
                                View Website <i class="fa-solid fa-external-link-alt text-xs ml-1"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="relative">
                <?php if ($project['featured_image']): ?>
                    <div class="rounded-2xl overflow-hidden shadow-2xl border border-border">
                        <img src="<?= base_url(esc($project['featured_image'])) ?>" alt="<?= esc($project['title']) ?> Featured Image" class="w-full h-auto object-cover" loading="eager">
                    </div>
                <?php else: ?>
                    <div class="w-full aspect-video bg-surface-secondary rounded-2xl border border-border flex items-center justify-center text-text-muted">
                        <i class="fa-regular fa-image text-6xl"></i>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Project Content -->
<section class="py-20 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Main Content (Left, 2 columns) -->
            <div class="lg:col-span-2 space-y-16">
                
                <?php if ($project['description']): ?>
                    <div class="prose prose-lg dark:prose-invert max-w-none text-text">
                        <h2 class="text-3xl font-bold mb-6">Project Overview</h2>
                        <div class="text-text-muted">
                            <?= nl2br(esc($project['description'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($project['challenge']): ?>
                    <div class="bg-surface-secondary p-8 rounded-2xl border border-border">
                        <h3 class="text-2xl font-bold text-text mb-4">The Challenge</h3>
                        <p class="text-text-muted">
                            <?= nl2br(esc($project['challenge'])) ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if ($project['solution']): ?>
                    <div class="prose prose-lg dark:prose-invert max-w-none text-text">
                        <h3 class="text-2xl font-bold mb-4">Our Approach & Solution</h3>
                        <div class="text-text-muted">
                            <?= nl2br(esc($project['solution'])) ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php 
                $keyFeatures = json_decode($project['key_features'] ?? '[]', true);
                if (!empty($keyFeatures)): 
                ?>
                    <div>
                        <h3 class="text-2xl font-bold text-text mb-6">Key Features Delivered</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php foreach ($keyFeatures as $feature): ?>
                                <div class="flex items-start bg-surface-secondary p-4 rounded-xl border border-border">
                                    <i class="fa-solid fa-check-circle text-brand-primary mt-1 mr-3 text-lg"></i>
                                    <span class="text-text font-medium"><?= esc($feature) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($project['results']): ?>
                    <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/10 p-8 rounded-2xl border border-brand-primary/20">
                        <h3 class="text-2xl font-bold text-text mb-6">Impact & Results</h3>
                        <ul class="space-y-4">
                            <?php foreach (explode("\n", $project['results']) as $result): ?>
                                <?php if (trim($result)): ?>
                                    <li class="flex items-start text-text">
                                        <i class="fa-solid fa-chart-line text-brand-secondary mt-1 mr-4 text-xl"></i>
                                        <span class="text-lg font-medium"><?= esc($result) ?></span>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php 
                $gallery = json_decode($project['gallery'] ?? '[]', true);
                if (!empty($gallery)): 
                ?>
                    <div>
                        <h3 class="text-2xl font-bold text-text mb-6">Project Gallery</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($gallery as $img): ?>
                                <div class="rounded-xl overflow-hidden border border-border cursor-pointer group">
                                    <img src="<?= base_url(esc($img)) ?>" alt="Gallery Image" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
            
            <!-- Sidebar (Right, 1 column) -->
            <div class="space-y-8">
                <!-- Services -->
                <?php if (!empty($services)): ?>
                    <div class="bg-surface-secondary p-6 rounded-2xl border border-border">
                        <h4 class="text-lg font-bold text-text mb-4">Services Delivered</h4>
                        <ul class="space-y-3">
                            <?php foreach ($services as $srv): ?>
                                <li>
                                    <a href="<?= base_url('services/' . esc($srv['slug'])) ?>" class="flex items-center text-text-muted hover:text-brand-primary transition-colors">
                                        <i class="fa-solid fa-angle-right mr-2 text-sm"></i>
                                        <?= esc($srv['name']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Technology Stack -->
                <?php if (!empty($technologies)): ?>
                    <div class="bg-surface-secondary p-6 rounded-2xl border border-border">
                        <h4 class="text-lg font-bold text-text mb-4">Technology Stack</h4>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($technologies as $tech): ?>
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-surface border border-border text-sm font-medium text-text group hover:border-brand-primary transition-colors">
                                    <?php if ($tech['icon']): ?>
                                        <i class="<?= esc($tech['icon']) ?> mr-2 text-text-muted group-hover:text-brand-primary transition-colors"></i>
                                    <?php endif; ?>
                                    <?= esc($tech['name']) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Case Study Link -->
                <?php if (isset($caseStudySlug) && $caseStudySlug): ?>
                    <div class="bg-gradient-to-br from-brand-secondary to-brand-primary p-6 rounded-2xl text-white shadow-lg">
                        <h4 class="text-xl font-bold mb-3">Deep Dive</h4>
                        <p class="text-white/90 mb-4 text-sm">Read the full story, technical challenges, and solutions.</p>
                        <a href="<?= base_url('case-studies/' . esc($caseStudySlug)) ?>" class="block w-full py-3 bg-white text-brand-primary text-center rounded-lg font-bold hover:bg-gray-100 transition-colors shadow-sm">
                            Read Full Case Study
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Sticky CTA Widget -->
                <div class="sticky top-24 bg-gradient-to-br from-brand-primary to-brand-secondary p-6 rounded-2xl text-white shadow-xl shadow-brand-primary/20">
                    <h4 class="text-xl font-bold mb-3">Want similar results?</h4>
                    <p class="text-white/80 mb-6 text-sm">Let's discuss how we can build a scalable solution for your business.</p>
                    <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode($whatsappMessage) ?>" target="_blank" rel="noopener noreferrer" class="block w-full py-3 bg-[#25D366] text-white text-center rounded-lg font-bold hover:bg-[#1DA851] transition-colors shadow-md mb-3">
                        <i class="fa-brands fa-whatsapp mr-2"></i> Let's Talk
                    </a>
                    <a href="<?= base_url('contact?service=' . (isset($services[0]) ? esc($services[0]['slug']) : '')) ?>" class="block w-full py-3 bg-white text-brand-primary text-center rounded-lg font-bold hover:bg-gray-100 transition-colors shadow-md">
                        <i class="fa-regular fa-envelope mr-2"></i> Email Us
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Related Projects Section -->
<?php if (!empty($relatedProjects)): ?>
<section class="py-16 bg-surface-secondary transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-text mb-10 text-center">Similar Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($relatedProjects as $rp): ?>
                <a href="<?= base_url('portfolio/' . esc($rp['slug'])) ?>" class="group block bg-surface rounded-2xl border border-border overflow-hidden hover:border-brand-primary/50 hover:shadow-xl transition-all duration-300">
                    <div class="h-48 overflow-hidden bg-surface-secondary">
                        <?php if ($rp['featured_image']): ?>
                            <img src="<?= base_url(esc($rp['featured_image'])) ?>" alt="<?= esc($rp['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-text-muted">
                                <i class="fa-regular fa-image text-3xl"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-5">
                        <h4 class="font-bold text-text mb-2 group-hover:text-brand-primary transition-colors"><?= esc($rp['title']) ?></h4>
                        <p class="text-sm text-text-muted line-clamp-2"><?= esc($rp['short_description']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Schema.org BreadcrumbList -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "<?= base_url() ?>"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Portfolio",
      "item": "<?= base_url('portfolio') ?>"
    },
    {
      "@type": "ListItem",
      "position": 3,
      "name": "<?= esc($project['title']) ?>",
      "item": "<?= esc($canonical_url) ?>"
    }
  ]
}
</script>

<?= $this->endSection() ?>
