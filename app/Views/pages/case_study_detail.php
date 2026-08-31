<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>
<?= $this->section('og_image') ?><?= esc($og_image) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-28 pb-16 bg-surface/30 border-b border-border/70 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <!-- Breadcrumbs -->
        <nav class="flex text-xs font-mono text-text-muted mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-2">
                <li>
                    <a href="<?= base_url() ?>" class="hover:text-primary transition-colors">Home</a>
                </li>
                <li class="text-text-dim">/</li>
                <li>
                    <a href="<?= base_url('case-studies') ?>" class="hover:text-primary transition-colors">Case Studies</a>
                </li>
                <li class="text-text-dim">/</li>
                <li aria-current="page" class="text-text font-semibold truncate max-w-xs">
                    <?= esc($caseStudy['title']) ?>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl">
            <div class="text-caption text-primary mb-3">CASE STUDY ARCHIVE</div>
            <h1 class="h1 text-text mb-6 leading-tight">
                <?= esc($caseStudy['title']) ?>
            </h1>
            
            <p class="text-body text-lg text-text-muted mb-8 leading-relaxed">
                <?= esc($caseStudy['excerpt'] ?? $caseStudy['short_description']) ?>
            </p>
            
            <div class="flex flex-wrap gap-8 items-center border-t border-border/50 pt-6">
                <?php if ($caseStudy['client_name']): ?>
                    <div>
                        <span class="block text-[10px] font-mono text-text-dim uppercase tracking-wider mb-1">Client</span>
                        <span class="text-text font-semibold text-sm"><?= esc($caseStudy['client_name']) ?></span>
                    </div>
                <?php endif; ?>

                <?php if (!empty($industries)): ?>
                    <div>
                        <span class="block text-[10px] font-mono text-text-dim uppercase tracking-wider mb-1">Industry</span>
                        <span class="text-text font-semibold text-sm flex flex-wrap gap-2">
                            <?php foreach($industries as $ind): ?>
                                <a href="<?= base_url('industries/' . esc($ind['slug'])) ?>" class="text-primary hover:underline"><?= esc($ind['name']) ?></a>
                            <?php endforeach; ?>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (!empty($services)): ?>
                    <div>
                        <span class="block text-[10px] font-mono text-text-dim uppercase tracking-wider mb-1">Services</span>
                        <span class="text-text font-semibold text-sm flex flex-wrap gap-2">
                            <?php foreach($services as $svc): ?>
                                <a href="<?= base_url('services/' . esc($svc['slug'])) ?>" class="text-primary hover:underline"><?= esc($svc['name']) ?></a>
                            <?php endforeach; ?>
                        </span>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Featured Image -->
<?php if ($caseStudy['featured_image']): ?>
<section class="py-8 bg-surface/20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-xl overflow-hidden shadow-2xl border border-border">
            <img src="<?= base_url(esc($caseStudy['featured_image'])) ?>" alt="<?= esc($caseStudy['title']) ?> Hero Image" class="w-full h-auto object-cover max-h-[70vh]" loading="eager">
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Case Study Body -->
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main Content (Left, 8 cols) -->
            <div class="lg:col-span-8 space-y-12">
                
                <?php if ($caseStudy['description']): ?>
                    <div class="tech-panel p-8 rounded-xl">
                        <div class="text-caption text-primary mb-2">BACKGROUND CONTEXT</div>
                        <h2 class="h3 text-text mb-4">Overview</h2>
                        <div class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($caseStudy['description'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['challenge']): ?>
                    <div class="tech-panel p-8 rounded-xl border-l-2 border-l-danger">
                        <div class="text-caption text-danger mb-2">CHALLENGE STATEMENT</div>
                        <h2 class="h3 text-text mb-4">The Challenge</h2>
                        <div class="text-small text-text-muted leading-relaxed">
                            <p class="leading-relaxed">
                                <?= nl2br(esc($caseStudy['challenge'])) ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php 
                $goals = json_decode($caseStudy['goals'] ?? '[]', true);
                if (!empty($goals)): 
                ?>
                    <div>
                        <h2 class="h3 text-text mb-6">Project Goals</h2>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php foreach ($goals as $goal): ?>
                                <li class="flex items-start tech-card p-4 rounded-xl">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary mt-2 mr-3 shrink-0 shadow-[0_0_5px_var(--primary-glow)]"></span>
                                    <span class="text-text font-medium text-sm"><?= esc($goal) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['discovery']): ?>
                    <div class="tech-panel p-8 rounded-xl">
                        <div class="text-caption text-accent-blue mb-2">PHASE 01</div>
                        <h2 class="h3 text-text mb-4">Discovery & Research</h2>
                        <div class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($caseStudy['discovery'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['strategy']): ?>
                    <div class="tech-panel p-8 rounded-xl">
                        <div class="text-caption text-primary mb-2">PHASE 02</div>
                        <h2 class="h3 text-text mb-4">Our Strategy</h2>
                        <div class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($caseStudy['strategy'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['solution']): ?>
                    <div class="tech-panel p-8 rounded-xl border-l-2 border-l-primary">
                        <div class="text-caption text-primary mb-2">PHASE 03</div>
                        <h2 class="h3 text-text mb-4">The Solution</h2>
                        <div class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($caseStudy['solution'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['implementation']): ?>
                    <div class="tech-panel p-8 rounded-xl">
                        <div class="text-caption text-accent-teal mb-2">PHASE 04</div>
                        <h2 class="h3 text-text mb-4">Implementation Details</h2>
                        <div class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($caseStudy['implementation'])) ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php 
                $keyFeatures = json_decode($caseStudy['key_features'] ?? '[]', true);
                if (!empty($keyFeatures)): 
                ?>
                    <div>
                        <h2 class="h3 text-text mb-6">Key Features Delivered</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($keyFeatures as $feature): ?>
                                <div class="flex items-center tech-card p-4 rounded-xl text-text">
                                    <span class="w-1.5 h-1.5 rounded-full bg-primary mr-3 shrink-0 shadow-[0_0_5px_var(--primary-glow)]"></span>
                                    <span class="font-medium text-sm"><?= esc($feature) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['results']): ?>
                    <div>
                        <h2 class="h3 text-text mb-6">Impact & Results</h2>
                        <div class="tech-panel p-8 rounded-xl border-l-2 border-l-accent-teal">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <?php foreach (explode("\n", trim($caseStudy['results'])) as $result): ?>
                                    <?php if (trim($result)): ?>
                                        <div class="flex flex-col tech-card p-5 rounded-lg">
                                            <span class="text-caption text-accent-teal mb-1">METRIC RESULT</span>
                                            <span class="text-base font-bold text-text"><?= esc($result) ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['lessons']): ?>
                    <div class="tech-panel p-8 rounded-xl">
                        <h2 class="h3 text-text mb-4">Lessons Learned</h2>
                        <div class="text-small text-text-muted leading-relaxed">
                            <?= nl2br(esc($caseStudy['lessons'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php 
                $gallery = json_decode($caseStudy['gallery'] ?? '[]', true);
                if (!empty($gallery)): 
                ?>
                    <div>
                        <h2 class="h3 text-text mb-6">Project Media</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($gallery as $img): ?>
                                <div class="rounded-xl overflow-hidden border border-border shadow-md">
                                    <img src="<?= base_url(esc($img)) ?>" alt="Case Study Gallery Image" class="w-full h-auto object-cover hover:scale-105 transition-transform duration-500" loading="lazy">
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php 
                $testimonial = json_decode($caseStudy['testimonial'] ?? '{}', true);
                if (!empty($testimonial['quote'])): 
                ?>
                    <div class="mt-12">
                        <blockquote class="tech-panel p-8 rounded-xl border border-primary/30 relative">
                            <div class="text-caption text-primary mb-3">CLIENT VERIFICATION</div>
                            <p class="text-lg text-text font-medium leading-relaxed italic mb-6">
                                "<?= esc($testimonial['quote']) ?>"
                            </p>
                            <div class="flex items-center">
                                <div class="w-10 h-10 bg-primary text-background rounded-full flex items-center justify-center font-bold text-sm mr-3">
                                    <?= substr(esc($testimonial['client_name'] ?? 'C'), 0, 1) ?>
                                </div>
                                <div>
                                    <div class="text-text font-bold text-sm"><?= esc($testimonial['client_name'] ?? 'Client') ?></div>
                                    <div class="text-text-dim text-xs font-mono">
                                        <?= esc($testimonial['client_role'] ?? '') ?><?= !empty($testimonial['company']) ? ', ' . esc($testimonial['company']) : '' ?>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                <?php endif; ?>

            </div>
            
            <!-- Sidebar (Right, 4 cols) -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Portfolio Link -->
                <?php if ($portfolioProject): ?>
                    <div class="tech-card p-6 rounded-xl border border-primary/40 text-center">
                        <i class="fa-solid fa-briefcase text-primary text-2xl mb-2"></i>
                        <h4 class="text-base font-bold text-text mb-1">Visual Showcase</h4>
                        <p class="text-xs text-text-muted mb-4 leading-relaxed">See screens and interface assets for this project.</p>
                        <a href="<?= base_url('portfolio/' . esc($portfolioProject['slug'])) ?>" class="btn-primary w-full text-xs text-center !py-2.5">
                            View Portfolio Project
                        </a>
                    </div>
                <?php endif; ?>

                <!-- Technologies -->
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
                
                <!-- Services -->
                <?php if (!empty($services)): ?>
                    <div class="tech-panel p-6 rounded-xl">
                        <h4 class="text-xs font-mono text-text-dim uppercase tracking-wider mb-4">Services Delivered</h4>
                        <ul class="space-y-2.5">
                            <?php foreach ($services as $srv): ?>
                                <li>
                                    <a href="<?= base_url('services/' . esc($srv['slug'])) ?>" class="flex items-center justify-between text-xs font-semibold text-text-muted hover:text-primary transition-colors">
                                        <span><?= esc($srv['name']) ?></span>
                                        <i class="fa-solid fa-arrow-right text-[10px] text-text-dim"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Sticky CTA Widget -->
                <div class="sticky top-28 tech-panel p-6 rounded-xl border border-border/80 text-center">
                    <div class="text-caption text-primary mb-1">DEPLOY NOW</div>
                    <h4 class="text-base font-bold text-text mb-2">Build Something Similar</h4>
                    <p class="text-xs text-text-muted mb-6 leading-relaxed">Ready to architect a scalable solution for your business? Let's talk.</p>
                    <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode($whatsappMessage) ?>" target="_blank" rel="noopener noreferrer" class="btn-secondary w-full text-xs text-center !py-2.5 mb-2.5 flex items-center justify-center gap-2">
                        <i class="fa-brands fa-whatsapp text-emerald-500 text-sm"></i> WhatsApp Us
                    </a>
                    <a href="<?= base_url('contact?service=' . (isset($services[0]) ? esc($services[0]['slug']) : '')) ?>" class="btn-primary w-full text-xs text-center !py-2.5">
                        <i class="fa-regular fa-envelope mr-1.5"></i> Email Us
                    </a>
                </div>

            </div>
            
        </div>
    </div>
</section>

<!-- FAQs -->
<?php if (!empty($faqs)): ?>
<section class="py-20 bg-surface/50 border-t border-border/70">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="text-caption text-primary mb-2">CASE CLARIFICATIONS</div>
            <h2 class="h2 text-text mb-2">Frequently Asked Questions</h2>
            <p class="text-small text-text-muted">Common questions about this case study and our approach.</p>
        </div>
        <div class="space-y-3" x-data="{ active: null }">
            <?php foreach ($faqs as $index => $faq): ?>
                <div class="tech-card rounded-xl overflow-hidden">
                    <button 
                        @click="active = (active === <?= $index ?> ? null : <?= $index ?>)"
                        class="w-full px-6 py-4 text-left flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                        :aria-expanded="active === <?= $index ?>"
                    >
                        <span class="font-semibold text-text text-sm md:text-base pr-8"><?= esc($faq['question']) ?></span>
                        <span class="text-primary transform transition-transform duration-200 text-xs" :class="{ 'rotate-180': active === <?= $index ?> }">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>
                    <div 
                        x-show="active === <?= $index ?>" 
                        x-collapse
                        class="px-6 pb-4 text-text-muted text-sm border-t border-border/40 pt-3 leading-relaxed"
                    >
                        <?= $faq['answer'] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Related Case Studies -->
<?php if (!empty($relatedCaseStudies)): ?>
<section class="py-20 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="h3 text-text mb-8 text-center">Related Case Studies</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <?php foreach ($relatedCaseStudies as $rcs): ?>
                <a href="<?= base_url('case-studies/' . esc($rcs['slug'])) ?>" class="group block tech-card rounded-xl overflow-hidden">
                    <div class="h-44 overflow-hidden bg-surface-hover relative border-b border-border/50">
                        <?php if ($rcs['featured_image']): ?>
                            <img src="<?= base_url(esc($rcs['featured_image'])) ?>" alt="<?= esc($rcs['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-text-muted">
                                <i class="fa-regular fa-image text-4xl"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-5">
                        <h4 class="text-sm font-bold text-text mb-1 group-hover:text-primary transition-colors line-clamp-2"><?= esc($rcs['title']) ?></h4>
                        <p class="text-xs text-text-muted line-clamp-3 leading-relaxed"><?= esc($rcs['excerpt'] ?? $rcs['short_description']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?= $this->endSection() ?>
