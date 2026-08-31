<?= $this->extend('layouts/main') ?>

<?= $this->section('head') ?>
    <style>
        .services-grid-item {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .services-category {
            margin-bottom: var(--spacing-5xl);
            position: relative;
            animation: slide-up var(--duration-slow) var(--easing-ease-out) forwards;
            opacity: 0;
        }
        
        @for $i from 1 through 5 {
            .services-category:nth-of-type(#{$i}) {
                animation-delay: calc(#{$i} * 50ms);
            }
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: var(--spacing-2xl);
            animation: fade-in var(--duration-slow) var(--easing-ease-out);
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. Premium Hero Section -->
<section class="hero-premium reveal-on-scroll">
    <div class="hero-content">
        <div class="hero-badge">
            <span class="text-meta">Engineering Directory</span>
        </div>
        
        <h1 class="hero-title">
            Digital Services for <br>
            <span class="gradient-text">Ambitious Brands</span>
        </h1>
        
        <p class="hero-subtitle">
            From scalable web architecture to strategic digital growth. We engineer comprehensive digital solutions tailored to your operational and marketing objectives.
        </p>
    </div>
</section>

<!-- 2. Services Display by Category -->
<section class="section-transition-light py-32">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <?php foreach($categories as $categoryName => $services): ?>
            <?php if(!empty($services)): ?>
                <div class="services-category reveal-on-scroll">
                    <!-- Category Header -->
                    <div class="mb-12 border-b border-border/40 pb-6 flex items-center justify-between">
                        <div>
                            <div class="section-eyebrow mb-2"><?= esc($categoryName) ?></div>
                            <h2 class="section-title"><?= esc($categoryName) ?> Services</h2>
                        </div>
                        <span class="text-meta text-text-muted">CAPABILITIES</span>
                    </div>
                    
                    <!-- Services Grid -->
                    <div class="services-grid">
                        <?php $serviceIndex = 0; foreach($services as $service): $serviceIndex++; ?>
                        <article class="service-card-premium reveal-on-scroll" data-stagger>
                            <div class="service-number">
                                <?= str_pad($serviceIndex, 2, '0', STR_PAD_LEFT) ?>
                            </div>
                            
                            <h3 class="service-title">
                                <?= esc($service['name']) ?>
                            </h3>
                            
                            <p class="service-description">
                                <?= esc($service['overview'] ?? $service['seo_description']) ?>
                            </p>
                            
                            <?php if(!empty($service['capabilities'])): ?>
                                <ul class="space-y-2.5 mb-8 text-xs text-text-muted font-mono">
                                    <?php $count = 0; foreach($service['capabilities'] as $cap): if($count++ >= 3) break; ?>
                                        <li class="flex items-center">
                                            <span class="w-1.5 h-1.5 rounded-full bg-accent-cyan mr-2.5 shadow-[0_0_5px_var(--color-glow-cyan)]"></span>
                                            <?= esc($cap['title']) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            
                            <a href="<?= url_to('service-detail', $service['slug']) ?>" class="service-link">
                                Explore Service
                            </a>
                        </article>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<!-- 3. System Integration Section -->
<section class="section-transition-dark py-32 reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center lg:gap-16">
            <!-- Left Content -->
            <div class="reveal-on-scroll">
                <div class="section-eyebrow mb-4">SYSTEM SYNERGY</div>
                <h2 class="section-title mb-6">An Integrated Ecosystem</h2>
                <p class="section-description mb-6">
                    Digital success rarely relies on a single service. Our approach integrates robust technical engineering with strategic digital growth. We build scalable platforms that are optimized for search engines from day one, ensuring your digital presence is both structurally sound and highly visible.
                </p>
                <p class="section-description mb-8">
                    By aligning custom software development with SEO and consistent brand management, we create a unified digital ecosystem that drives real business results without friction between disparate agencies.
                </p>
                <a href="<?= url_to('about') ?>" class="link-arrow arrow">
                    Learn Our Approach
                </a>
            </div>
            
            <!-- Right Panel -->
            <div class="card card-tech p-8 lg:p-12">
                <ul class="space-y-8">
                    <li class="flex items-start gap-4 reveal-on-scroll" data-stagger>
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-cyan-500/20 to-blue-500/20 border border-cyan-500/30 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-text-primary mb-1">Architecture & Development</h4>
                            <p class="text-sm text-text-secondary">The secure, scalable technical foundation.</p>
                        </div>
                    </li>
                    
                    <li class="flex items-start gap-4 reveal-on-scroll" data-stagger>
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border border-blue-500/30 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-text-primary mb-1">Search Optimization (SEO)</h4>
                            <p class="text-sm text-text-secondary">Built-in technical compliance and content strategy.</p>
                        </div>
                    </li>
                    
                    <li class="flex items-start gap-4 reveal-on-scroll" data-stagger>
                        <div class="w-12 h-12 rounded-lg bg-gradient-to-br from-teal-500/20 to-green-500/20 border border-teal-500/30 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-text-primary mb-1">Brand & Community Management</h4>
                            <p class="text-sm text-text-secondary">Consistent, strategic multi-platform communication.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- 4. Why Ziibay Soft & Process -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <div class="text-caption text-primary mb-3">WORKFLOW PROTOCOL</div>
            <h2 class="h2 text-text mb-4">Our Process</h2>
            <p class="text-body text-text-muted">We maintain a disciplined, transparent approach to every project, ensuring technical excellence and strategic alignment.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="tech-card p-6 rounded-xl text-center">
                <div class="text-caption text-primary font-mono mb-4">01 // STEP</div>
                <h4 class="text-text font-bold text-base mb-2">Discovery & Strategy</h4>
                <p class="text-xs text-text-muted leading-relaxed">Understanding your business logic, audience, and technical requirements.</p>
            </div>
            <div class="tech-card p-6 rounded-xl text-center">
                <div class="text-caption text-accent-blue font-mono mb-4">02 // STEP</div>
                <h4 class="text-text font-bold text-base mb-2">Architecture & Planning</h4>
                <p class="text-xs text-text-muted leading-relaxed">Designing the database schema, UI flow, and technical SEO structure.</p>
            </div>
            <div class="tech-card p-6 rounded-xl text-center">
                <div class="text-caption text-primary font-mono mb-4">03 // STEP</div>
                <h4 class="text-text font-bold text-base mb-2">Execution & Engineering</h4>
                <p class="text-xs text-text-muted leading-relaxed">Writing clean, secure code and implementing content strategies.</p>
            </div>
            <div class="tech-card p-6 rounded-xl text-center">
                <div class="text-caption text-accent-teal font-mono mb-4">04 // STEP</div>
                <h4 class="text-text font-bold text-base mb-2">Launch & Optimization</h4>
                <p class="text-xs text-text-muted leading-relaxed">Deployment, continuous performance monitoring, and iterative improvement.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. FAQ -->
<section class="py-24 bg-surface/50 border-t border-border/70">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <div class="text-caption text-primary mb-3">FAQ PROTOCOL</div>
            <h2 class="h2 text-text">Service Frequently Asked Questions</h2>
        </div>
        
        <div class="space-y-3" x-data="{ activeAccordion: null }">
            <div class="tech-card rounded-xl overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 1 ? null : 1" class="w-full px-6 py-5 text-left flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                    <span class="font-semibold text-text text-sm md:text-base">Can I combine multiple services?</span>
                    <svg class="w-4 h-4 text-text-muted transform transition-transform duration-200" :class="{'rotate-180': activeAccordion === 1}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeAccordion === 1" x-collapse class="px-6 pb-5 text-text-muted text-sm border-t border-border/40 pt-3 leading-relaxed">
                    Yes. In fact, combining Web Development with SEO Services from the start is highly recommended. It ensures the technical architecture is perfectly aligned with search engine requirements before launch.
                </div>
            </div>
            
            <div class="tech-card rounded-xl overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 2 ? null : 2" class="w-full px-6 py-5 text-left flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                    <span class="font-semibold text-text text-sm md:text-base">Do you guarantee specific outcomes?</span>
                    <svg class="w-4 h-4 text-text-muted transform transition-transform duration-200" :class="{'rotate-180': activeAccordion === 2}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeAccordion === 2" x-collapse class="px-6 pb-5 text-text-muted text-sm border-t border-border/40 pt-3 leading-relaxed">
                    We guarantee professional engineering, adherence to technical best practices, and honest strategy. We do not make unrealistic promises like "guaranteed #1 Google rankings" or "viral social growth," as these are outside direct control and often imply manipulative tactics.
                </div>
            </div>

            <div class="tech-card rounded-xl overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 3 ? null : 3" class="w-full px-6 py-5 text-left flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                    <span class="font-semibold text-text text-sm md:text-base">Are your services performed in-house?</span>
                    <svg class="w-4 h-4 text-text-muted transform transition-transform duration-200" :class="{'rotate-180': activeAccordion === 3}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeAccordion === 3" x-collapse class="px-6 pb-5 text-text-muted text-sm border-t border-border/40 pt-3 leading-relaxed">
                    Yes. Our core engineering and strategic services are performed by our dedicated professional teams to ensure strict quality control and seamless communication.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Final CTA -->
<section class="py-24 relative overflow-hidden bg-surface/50 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="h2 text-text mb-4">Ready to Discuss Your Project?</h2>
        <p class="text-body max-w-2xl mx-auto mb-8 text-text-muted">
            Contact our team to explore how our digital services can support your business objectives.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-3.5 px-8 text-sm">
                Get a Free Consultation
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
