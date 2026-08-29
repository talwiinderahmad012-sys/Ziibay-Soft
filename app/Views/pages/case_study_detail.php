<?= $this->extend('layouts/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>
<?= $this->section('meta_description') ?><?= esc($meta_description) ?><?= $this->endSection() ?>
<?= $this->section('canonical') ?><?= esc($canonical_url) ?><?= $this->endSection() ?>
<?= $this->section('og_image') ?><?= esc($og_image) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- Hero Section -->
<section class="pt-32 pb-16 bg-surface border-b border-border transition-colors duration-300 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-full h-full bg-gradient-to-b from-brand-primary/5 to-transparent pointer-events-none"></div>
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
                        <a href="<?= base_url('case-studies') ?>" class="hover:text-brand-primary transition-colors">Case Studies</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center text-text font-medium">
                        <i class="fa-solid fa-chevron-right text-xs mx-2 text-text-muted"></i>
                        <?= esc($caseStudy['title']) ?>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="max-w-4xl">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-text mb-6 leading-tight">
                <?= esc($caseStudy['title']) ?>
            </h1>
            
            <p class="text-xl md:text-2xl text-text-muted mb-10 leading-relaxed font-light">
                <?= esc($caseStudy['excerpt'] ?? $caseStudy['short_description']) ?>
            </p>
            
            <div class="flex flex-wrap gap-8 items-center border-t border-border pt-8">
                <?php if ($caseStudy['client_name']): ?>
                    <div>
                        <span class="block text-xs text-text-muted uppercase tracking-wider font-bold mb-1">Client</span>
                        <span class="text-text font-medium text-lg"><?= esc($caseStudy['client_name']) ?></span>
                    </div>
                <?php endif; ?>


                <?php if (!empty($industries)): ?>
                    <div>
                        <span class="block text-xs text-text-muted uppercase tracking-wider font-bold mb-1">Industry</span>
                        <span class="text-text font-medium text-lg flex flex-wrap gap-2">
                            <?php foreach($industries as $ind): ?>
                                <a href="<?= base_url('industries/' . esc($ind['slug'])) ?>" class="hover:text-brand-primary transition-colors underline decoration-dotted underline-offset-2"><?= esc($ind['name']) ?></a>
                            <?php endforeach; ?>
                        </span>
                    </div>
                <?php endif; ?>

                <?php if (!empty($services)): ?>
                    <div>
                        <span class="block text-xs text-text-muted uppercase tracking-wider font-bold mb-1">Services</span>
                        <span class="text-text font-medium text-lg flex flex-wrap gap-2">
                            <?php foreach($services as $svc): ?>
                                <a href="<?= base_url('services/' . esc($svc['slug'])) ?>" class="hover:text-brand-primary transition-colors underline decoration-dotted underline-offset-2"><?= esc($svc['name']) ?></a>
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
<section class="bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4 -mt-8 relative z-20">
        <div class="rounded-2xl overflow-hidden shadow-2xl border border-border">
            <img src="<?= base_url(esc($caseStudy['featured_image'])) ?>" alt="<?= esc($caseStudy['title']) ?> Hero Image" class="w-full h-auto object-cover max-h-[70vh]" loading="eager">
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Case Study Body -->
<section class="py-20 bg-surface transition-colors duration-300">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Main Content (Left, 8 cols) -->
            <div class="lg:col-span-8 space-y-16">
                
                <?php if ($caseStudy['description']): ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">Overview</h2>
                        <div class="prose prose-lg dark:prose-invert max-w-none text-text-muted">
                            <?= nl2br(esc($caseStudy['description'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['challenge']): ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">The Challenge</h2>
                        <div class="bg-surface-secondary p-8 rounded-2xl border-l-4 border-brand-primary">
                            <p class="text-lg text-text-muted leading-relaxed">
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
                        <h2 class="text-2xl font-bold text-text mb-6">Project Goals</h2>
                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <?php foreach ($goals as $goal): ?>
                                <li class="flex items-start bg-surface-secondary p-4 rounded-xl border border-border">
                                    <i class="fa-solid fa-bullseye text-brand-secondary mt-1 mr-3 text-lg"></i>
                                    <span class="text-text font-medium"><?= esc($goal) ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['discovery']): ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">Discovery & Research</h2>
                        <div class="prose prose-lg dark:prose-invert max-w-none text-text-muted">
                            <?= nl2br(esc($caseStudy['discovery'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['strategy']): ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">Our Strategy</h2>
                        <div class="prose prose-lg dark:prose-invert max-w-none text-text-muted">
                            <?= nl2br(esc($caseStudy['strategy'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['solution']): ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">The Solution</h2>
                        <div class="prose prose-lg dark:prose-invert max-w-none text-text-muted">
                            <?= nl2br(esc($caseStudy['solution'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['implementation']): ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">Implementation Details</h2>
                        <div class="prose prose-lg dark:prose-invert max-w-none text-text-muted">
                            <?= nl2br(esc($caseStudy['implementation'])) ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <?php 
                $keyFeatures = json_decode($caseStudy['key_features'] ?? '[]', true);
                if (!empty($keyFeatures)): 
                ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">Key Features Delivered</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <?php foreach ($keyFeatures as $feature): ?>
                                <div class="flex items-center text-text">
                                    <i class="fa-solid fa-check text-brand-primary mr-3"></i>
                                    <span class="font-medium"><?= esc($feature) ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['results']): ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">Impact & Results</h2>
                        <div class="bg-gradient-to-br from-brand-primary/10 to-brand-secondary/10 p-8 rounded-2xl border border-brand-primary/20">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <?php foreach (explode("\n", trim($caseStudy['results'])) as $result): ?>
                                    <?php if (trim($result)): ?>
                                        <div class="flex flex-col bg-surface p-6 rounded-xl shadow-sm border border-border/50">
                                            <i class="fa-solid fa-arrow-trend-up text-brand-secondary text-2xl mb-3"></i>
                                            <span class="text-lg font-bold text-text"><?= esc($result) ?></span>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($caseStudy['lessons']): ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">Lessons Learned</h2>
                        <div class="prose prose-lg dark:prose-invert max-w-none text-text-muted">
                            <?= nl2br(esc($caseStudy['lessons'])) ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php 
                $gallery = json_decode($caseStudy['gallery'] ?? '[]', true);
                if (!empty($gallery)): 
                ?>
                    <div>
                        <h2 class="text-3xl font-bold text-text mb-6">Project Media</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
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
                    <div class="mt-16">
                        <blockquote class="bg-surface-secondary p-10 rounded-3xl border border-border relative">
                            <i class="fa-solid fa-quote-left text-6xl text-brand-primary/10 absolute top-6 left-6"></i>
                            <p class="text-2xl text-text font-medium leading-relaxed italic relative z-10 mb-8">
                                "<?= esc($testimonial['quote']) ?>"
                            </p>
                            <div class="flex items-center">
                                <div class="w-14 h-14 bg-brand-primary text-white rounded-full flex items-center justify-center font-bold text-xl mr-4 shadow-lg">
                                    <?= substr(esc($testimonial['client_name'] ?? 'C'), 0, 1) ?>
                                </div>
                                <div>
                                    <div class="text-text font-bold text-lg"><?= esc($testimonial['client_name'] ?? 'Client') ?></div>
                                    <div class="text-text-muted">
                                        <?= esc($testimonial['client_role'] ?? '') ?><?= !empty($testimonial['company']) ? ', ' . esc($testimonial['company']) : '' ?>
                                    </div>
                                </div>
                            </div>
                        </blockquote>
                    </div>
                <?php endif; ?>

            </div>
            
            <!-- Sidebar (Right, 4 cols) -->
            <div class="lg:col-span-4 space-y-8">
                
                <!-- Portfolio Link -->
                <?php if ($portfolioProject): ?>
                    <div class="bg-gradient-to-r from-brand-primary to-brand-secondary p-1 rounded-2xl">
                        <div class="bg-surface p-6 rounded-[14px] h-full flex flex-col items-center text-center">
                            <i class="fa-solid fa-briefcase text-brand-primary text-3xl mb-3"></i>
                            <h4 class="text-lg font-bold text-text mb-2">Visual Showcase</h4>
                            <p class="text-text-muted text-sm mb-6">See more screens and visual assets for this project.</p>
                            <a href="<?= base_url('portfolio/' . esc($portfolioProject['slug'])) ?>" class="px-6 py-2 bg-brand-primary/10 text-brand-primary font-bold rounded-full hover:bg-brand-primary hover:text-white transition-colors w-full">
                                View Portfolio Project
                            </a>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Technologies -->
                <?php if (!empty($technologies)): ?>
                    <div class="bg-surface-secondary p-8 rounded-2xl border border-border">
                        <h4 class="text-xl font-bold text-text mb-6">Technology Stack</h4>
                        <div class="flex flex-wrap gap-3">
                            <?php foreach ($technologies as $tech): ?>
                                <span class="inline-flex items-center px-4 py-2 rounded-xl bg-surface border border-border text-sm font-semibold text-text shadow-sm hover:border-brand-primary transition-colors cursor-default">
                                    <?php if ($tech['icon']): ?>
                                        <i class="<?= esc($tech['icon']) ?> mr-2 text-brand-secondary text-lg"></i>
                                    <?php endif; ?>
                                    <?= esc($tech['name']) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
                
                <!-- Services -->
                <?php if (!empty($services)): ?>
                    <div class="bg-surface-secondary p-8 rounded-2xl border border-border">
                        <h4 class="text-xl font-bold text-text mb-6">Services Delivered</h4>
                        <ul class="space-y-4">
                            <?php foreach ($services as $srv): ?>
                                <li>
                                    <a href="<?= base_url('services/' . esc($srv['slug'])) ?>" class="flex items-center justify-between text-text group">
                                        <span class="font-medium group-hover:text-brand-primary transition-colors"><?= esc($srv['name']) ?></span>
                                        <i class="fa-solid fa-arrow-right text-text-muted group-hover:text-brand-primary transform group-hover:translate-x-1 transition-all"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <!-- Sticky CTA Widget -->
                <div class="sticky top-24 bg-surface p-8 rounded-2xl border-2 border-brand-primary text-center shadow-xl shadow-brand-primary/10 mt-12">
                    <h4 class="text-2xl font-bold text-text mb-4">Build Something Similar</h4>
                    <p class="text-text-muted mb-8">Ready to architect a scalable solution for your business? Let's talk.</p>
                    <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode($whatsappMessage) ?>" target="_blank" rel="noopener noreferrer" class="block w-full py-4 bg-[#25D366] text-white rounded-xl font-bold hover:bg-[#1DA851] transition-colors shadow-lg shadow-brand-primary/10 mb-4">
                        <i class="fa-brands fa-whatsapp mr-2 text-lg"></i> Discuss on WhatsApp
                    </a>
                    <a href="<?= base_url('contact?service=' . (isset($services[0]) ? esc($services[0]['slug']) : '')) ?>" class="block w-full py-4 bg-brand-primary text-white rounded-xl font-bold hover:bg-brand-secondary transition-colors shadow-lg shadow-brand-primary/30">
                        <i class="fa-regular fa-envelope mr-2 text-lg"></i> Email Us
                    </a>
                </div>

            </div>
            
        </div>
    </div>
</section>

<!-- FAQs -->
<?php if (!empty($faqs)): ?>
<section class="py-20 bg-surface transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4 max-w-4xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-text mb-4">Frequently Asked Questions</h2>
            <p class="text-text-muted">Common questions about this case study and our approach.</p>
        </div>
        <div class="space-y-4" x-data="{ active: null }">
            <?php foreach ($faqs as $index => $faq): ?>
                <div class="border border-border rounded-xl bg-surface-secondary overflow-hidden transition-colors">
                    <button 
                        @click="active = (active === <?= $index ?> ? null : <?= $index ?>)"
                        class="w-full px-6 py-4 text-left flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-primary"
                        :aria-expanded="active === <?= $index ?>"
                    >
                        <span class="font-bold text-text pr-8"><?= esc($faq['question']) ?></span>
                        <span class="text-brand-primary transform transition-transform duration-300" :class="{ 'rotate-180': active === <?= $index ?> }">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>
                    <div 
                        x-show="active === <?= $index ?>" 
                        x-collapse
                        class="px-6 pb-4 text-text-muted prose prose-sm dark:prose-invert max-w-none"
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
<section class="py-20 bg-surface-secondary transition-colors duration-300 border-t border-border">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-text mb-10 text-center">Related Case Studies</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($relatedCaseStudies as $rcs): ?>
                <a href="<?= base_url('case-studies/' . esc($rcs['slug'])) ?>" class="group block bg-surface rounded-2xl border border-border overflow-hidden hover:border-brand-primary/50 hover:shadow-xl transition-all duration-300">
                    <div class="h-48 overflow-hidden bg-surface-secondary relative">
                        <?php if ($rcs['featured_image']): ?>
                            <img src="<?= base_url(esc($rcs['featured_image'])) ?>" alt="<?= esc($rcs['title']) ?>" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500" loading="lazy">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center text-text-muted">
                                <i class="fa-regular fa-image text-4xl"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="p-6">
                        <h4 class="text-xl font-bold text-text mb-3 group-hover:text-brand-primary transition-colors line-clamp-2"><?= esc($rcs['title']) ?></h4>
                        <p class="text-sm text-text-muted line-clamp-3"><?= esc($rcs['excerpt'] ?? $rcs['short_description']) ?></p>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>



<?= $this->endSection() ?>


