<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>
<?= $this->section('og_image') ?><?= esc($og_image) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Project Hero -->
<section class="pt-28 pb-16 relative bg-surface/30 border-b border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-xs font-mono text-text-muted mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li>
                    <a href="<?= base_url() ?>" class="hover:text-primary transition-colors">Home</a>
                </li>
                <li class="text-text-dim">/</li>
                <li>
                    <a href="<?= base_url('portfolio') ?>" class="hover:text-primary transition-colors">Portfolio</a>
                </li>
                <li class="text-text-dim">/</li>
                <li aria-current="page" class="text-text font-semibold truncate max-w-xs">
                    <?= esc($project['title']) ?>
                </li>
            </ol>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <?php if ($project['project_type']): ?>
                    <div class="text-caption text-primary mb-3">
                        <?= esc($project['project_type']) ?>
                    </div>
                <?php endif; ?>
                
                <h1 class="h1 text-text mb-6 leading-tight">
                    <?= esc($project['title']) ?>
                </h1>
                
                <p class="text-body text-lg text-text-muted mb-8 leading-relaxed">
                    <?= nl2br(esc($project['short_description'])) ?>
                </p>
                
                <div class="flex flex-wrap gap-6 mb-8 pt-4 border-t border-border/50">
                    <?php if ($project['client_name']): ?>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-mono text-text-dim uppercase tracking-wider">Client</span>
                            <span class="text-text font-semibold text-sm"><?= esc($project['client_name']) ?></span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($industries)): ?>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-mono text-text-dim uppercase tracking-wider">Industry</span>
                            <span class="text-text font-semibold text-sm">
                                <?= implode(', ', array_map('esc', array_column($industries, 'name'))) ?>
                            </span>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ($project['project_url']): ?>
                        <div class="flex flex-col">
                            <span class="text-[10px] font-mono text-text-dim uppercase tracking-wider">Live Link</span>
                            <a href="<?= esc($project['project_url']) ?>" target="_blank" rel="noopener noreferrer" class="text-primary hover:underline font-mono text-sm flex items-center gap-1">
                                View Website <i class="fa-solid fa-external-link-alt text-xs"></i>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="relative">
                <?php if ($project['featured_image']): ?>
                    <div class="rounded-xl overflow-hidden shadow-2xl border border-border">
                        <img src="<?= base_url(esc($project['featured_image'])) ?>" alt="<?= esc($project['title']) ?> Featured Image" class="w-full h-auto object-cover" loading="eager">
                    </div>
                <?php else: ?>
                    <div class="w-full aspect-video bg-surface rounded-xl border border-border flex items-center justify-center text-text-muted">
                        <i class="fa-regular fa-image text-4xl"></i>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Project Content -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <!-- Main Content (Left, 2 columns) -->
            <div class="lg:col-span-2 space-y-12">
                
                <?php if ($project['description']): ?>
                    <div class="tech-panel p-8 rounded-xl text-text leading-relaxed">
                        <h2 class="h3 text-text mb-4">Project Overview</h2>
                        <div class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($project['description'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($project['challenge']): ?>
                    <div class="tech-panel p-8 rounded-xl border-l-2 border-l-danger">
                        <div class="text-caption text-danger mb-2">CHALLENGE STATEMENT</div>
                        <h3 class="h3 text-text mb-3">The Challenge</h3>
                        <p class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($project['challenge'])) ?>
                        </p>
                    </div>
                <?php endif; ?>

                <?php if ($project['solution']): ?>
                    <div class="tech-panel p-8 rounded-xl border-l-2 border-l-primary">
                        <div class="text-caption text-primary mb-2">ENGINEERING RESOLUTION</div>
                        <h3 class="h3 text-text mb-3">Our Approach & Solution</h3>
                        <div class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($project['solution'])) ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php 
                $keyFeatures = json_decode($project['key_features'] ?? '[]', true);
                if (!empty($keyFeatures)): 
                ?>
                    <div>
                        <h3 class="h3 text-text mb-6">Key Features Delivered</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php foreach ($keyFeatures as $feature): ?>
                                <div class="flex items-start tech-card p-4 rounded-xl">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary mt-2 mr-3 shrink-0 shadow-[0_0_5px_var(--primary-glow)]"></span>
                                    <span class="text-text font-medium text-sm"><?= esc($feature) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($project['results']): ?>
                    <div class="tech-panel p-8 rounded-xl border-l-2 border-l-accent-teal">
                        <div class="text-caption text-accent-teal mb-2">MEASURED OUTCOMES</div>
                        <h3 class="h3 text-text mb-4">Impact & Results</h3>
                        <ul class="space-y-3">
                            <?php foreach (explode("\n", $project['results']) as $result): ?>
                                <?php if (trim($result)): ?>
                                    <li class="flex items-start text-text">
                                        <span class="w-1.5 h-1.5 rounded-full bg-accent-teal mt-2 mr-3 shrink-0"></span>
                                        <span class="text-small text-text-muted font-medium"><?= esc($result) ?></span>
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
                        <h3 class="h3 text-text mb-6">Project Gallery</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($gallery as $img): ?>
                                <div class="rounded-xl overflow-hidden border border-border group">
                                    <img src="<?= base_url(esc($img)) ?>" alt="Gallery Image" class="w-full h-auto object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
            
            <!-- Sidebar (Right, 1 column) -->
            <div class="space-y-6">
                <!-- Services -->
                <?php if (!empty($services)): ?>
                    <div class="tech-panel p-6 rounded-xl">
                        <h4 class="text-xs font-mono text-text-dim uppercase tracking-wider mb-4">Services Delivered</h4>
                        <ul class="space-y-2.5">
                            <?php foreach ($services as $srv): ?>
                                <li>
                                    <a href="<?= base_url('services/' . esc($srv['slug'])) ?>" class="flex items-center text-xs font-semibold text-text-muted hover:text-primary transition-colors">
                                        <i class="fa-solid fa-angle-right mr-2 text-[10px]"></i>
                                        <?= esc($srv['name']) ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <!-- Technology Stack -->
                <?php if (!empty($technologies)): ?>
                    <div class="tech-panel p-6 rounded-xl">
                        <h4 class="text-xs font-mono text-text-dim uppercase tracking-wider mb-4">Technology Stack</h4>
                        <div class="flex flex-wrap gap-2">
                            <?php foreach ($technologies as $tech): ?>
                                <span class="tech-badge text-xs">
                                    <?php if ($tech['icon']): ?>
                                        <i class="<?= esc($tech['icon']) ?> mr-1.5 text-primary"></i>
                                    <?php endif; ?>
                                    <?= esc($tech['name']) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Case Study Link -->
                <?php if (isset($caseStudySlug) && $caseStudySlug): ?>
                    <div class="tech-card p-6 rounded-xl border border-primary/40">
                        <div class="text-caption text-primary mb-1">DEEP DIVE</div>
                        <h4 class="text-base font-bold text-text mb-2">Technical Case Study</h4>
                        <p class="text-xs text-text-muted mb-4 leading-relaxed">Read the full architectural breakdown and performance benchmarks.</p>
                        <a href="<?= base_url('case-studies/' . esc($caseStudySlug)) ?>" class="btn-primary w-full text-xs text-center !py-2.5">
                            Read Full Case Study
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Sticky CTA Widget -->
                <div class="sticky top-28 tech-panel p-6 rounded-xl border border-border/80">
                    <div class="text-caption text-primary mb-1">COLLABORATE</div>
                    <h4 class="text-base font-bold text-text mb-2">Want similar results?</h4>
                    <p class="text-xs text-text-muted mb-6 leading-relaxed">Let's discuss how we can build a scalable solution for your business.</p>
                    <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode($whatsappMessage) ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary w-full text-xs text-center !py-2.5 mb-2.5 flex items-center justify-center gap-2">
                        <i class="fa-brands fa-whatsapp text-emerald-500 text-sm"></i> WhatsApp Us
                    </a>
                    <a href="<?= base_url('contact?service=' . (isset($services[0]) ? esc($services[0]['slug']) : '')) ?>" class="btn-primary w-full text-xs text-center !py-2.5">
                        <i class="fa-regular fa-envelope mr-1.5"></i> Email Engineering
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Related Projects Section -->
<?php if (!empty($relatedProjects)): ?>
<section class="py-16 bg-surface/50 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="h3 text-text mb-8 text-center">Similar Projects</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($relatedProjects as $rp): ?>
                <a href="<?= base_url('portfolio/' . esc($rp['slug'])) ?>" class="group block tech-card rounded-xl overflow-hidden">
                    <div class="h-44 overflow-hidden bg-surface border-b border-border/50">
                        <?php if ($rp['featured_image']): ?>
                            <img src="<?= base_url(esc($rp['featured_image'])) ?>" alt="<?= esc($rp['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-text-muted">
                                <i class="fa-regular fa-image text-3xl"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-5">
                        <h4 class="font-bold text-text text-sm mb-1 group-hover:text-primary transition-colors"><?= esc($rp['title']) ?></h4>
                        <p class="text-xs text-text-muted line-clamp-2 leading-relaxed"><?= esc($rp['short_description']) ?></p>
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
