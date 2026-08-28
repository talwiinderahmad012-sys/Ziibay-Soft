<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- 1. Hero Section -->
<section class="relative pt-32 pb-24 overflow-hidden">
    <div class="absolute top-0 right-0 w-1/2 h-full bg-gradient-to-l from-primary/5 to-transparent pointer-events-none"></div>
    <div class="container mx-auto relative z-10 text-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto">
            <h1 class="h1 text-text mb-6">Digital Services for Ambitious Brands</h1>
            <p class="text-body text-xl mb-10 leading-relaxed text-text-muted">
                From scalable web architecture to strategic digital growth. We engineer comprehensive digital solutions tailored to your operational and marketing objectives.
            </p>
        </div>
    </div>
</section>

<!-- 2. Services Display by Category -->
<section class="py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <?php foreach($categories as $categoryName => $services): ?>
            <?php if(!empty($services)): ?>
                <div class="mb-24">
                    <div class="mb-12 border-b border-border pb-6 flex items-center justify-between">
                        <h2 class="text-3xl font-bold text-text"><?= esc($categoryName) ?></h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php foreach($services as $service): ?>
                        <div class="glass-panel p-8 rounded-2xl flex flex-col h-full group hover:-translate-y-2 transition-transform duration-300 border border-border hover:border-primary/30">
                            <h3 class="text-2xl font-bold text-text mb-4 group-hover:text-primary transition-colors"><?= esc($service['name']) ?></h3>
                            <p class="text-text-muted mb-8 flex-grow leading-relaxed">
                                <?= esc($service['overview'] ?? $service['seo_description']) ?>
                            </p>
                            
                            <?php if(!empty($service['capabilities'])): ?>
                                <ul class="space-y-3 mb-8">
                                    <?php $count = 0; foreach($service['capabilities'] as $cap): if($count++ >= 3) break; ?>
                                        <li class="flex items-start text-sm text-text-muted">
                                            <svg class="w-5 h-5 text-primary mr-3 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                                            <?= esc($cap['title']) ?>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>

                            <a href="<?= url_to('service-detail', $service['slug']) ?>" class="inline-flex items-center text-primary font-semibold hover:text-primary-light transition-colors mt-auto focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">
                                Explore Service <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</section>

<!-- 3. How Services Work Together -->
<section class="py-24 bg-surface/50 border-y border-border">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="h2 text-text mb-6">An Integrated Ecosystem</h2>
                <p class="text-body leading-relaxed mb-6">
                    Digital success rarely relies on a single service. Our approach integrates robust technical engineering with strategic digital growth. We build scalable platforms that are optimized for search engines from day one, ensuring your digital presence is both structurally sound and highly visible.
                </p>
                <p class="text-body leading-relaxed">
                    By aligning custom software development with SEO and consistent brand management, we create a unified digital ecosystem that drives real business results without friction between disparate agencies.
                </p>
            </div>
            <div class="glass-panel p-8 rounded-2xl relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-br from-primary/10 to-transparent pointer-events-none"></div>
                <ul class="space-y-6 relative z-10">
                    <li class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-surface border border-border flex items-center justify-center mr-4 shrink-0 text-primary">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                        </div>
                        <div>
                            <h4 class="text-text font-semibold mb-1">Architecture & Development</h4>
                            <p class="text-sm text-text-muted">The secure, scalable technical foundation.</p>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-surface border border-border flex items-center justify-center mr-4 shrink-0 text-primary">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-text font-semibold mb-1">Search Optimization (SEO)</h4>
                            <p class="text-sm text-text-muted">Built-in technical compliance and content strategy.</p>
                        </div>
                    </li>
                    <li class="flex items-center">
                        <div class="w-12 h-12 rounded-lg bg-surface border border-border flex items-center justify-center mr-4 shrink-0 text-primary">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" /></svg>
                        </div>
                        <div>
                            <h4 class="text-text font-semibold mb-1">Brand & Community Management</h4>
                            <p class="text-sm text-text-muted">Consistent, strategic multi-platform communication.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- 4. Why Ziibay Soft & Process -->
<section class="py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="h2 text-text mb-6">Our Process</h2>
            <p class="text-body">We maintain a disciplined, transparent approach to every project, ensuring technical excellence and strategic alignment.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div class="text-center">
                <div class="w-16 h-16 rounded-2xl bg-surface border border-border text-primary font-bold text-2xl flex items-center justify-center mx-auto mb-6">01</div>
                <h4 class="text-text font-semibold mb-3">Discovery & Strategy</h4>
                <p class="text-sm text-text-muted">Understanding your business logic, audience, and technical requirements.</p>
            </div>
            <div class="text-center relative">
                <div class="hidden md:block absolute top-8 left-0 w-full h-px bg-border -z-10"></div>
                <div class="w-16 h-16 rounded-2xl bg-surface border border-border text-primary font-bold text-2xl flex items-center justify-center mx-auto mb-6">02</div>
                <h4 class="text-text font-semibold mb-3">Architecture & Planning</h4>
                <p class="text-sm text-text-muted">Designing the database schema, UI flow, and technical SEO structure.</p>
            </div>
            <div class="text-center relative">
                <div class="hidden md:block absolute top-8 left-0 w-full h-px bg-border -z-10"></div>
                <div class="w-16 h-16 rounded-2xl bg-surface border border-border text-primary font-bold text-2xl flex items-center justify-center mx-auto mb-6">03</div>
                <h4 class="text-text font-semibold mb-3">Execution & Engineering</h4>
                <p class="text-sm text-text-muted">Writing clean, secure code and implementing content strategies.</p>
            </div>
            <div class="text-center relative">
                <div class="hidden md:block absolute top-8 left-0 w-full h-px bg-border -z-10"></div>
                <div class="w-16 h-16 rounded-2xl bg-surface border border-border text-primary font-bold text-2xl flex items-center justify-center mx-auto mb-6">04</div>
                <h4 class="text-text font-semibold mb-3">Launch & Optimization</h4>
                <p class="text-sm text-text-muted">Deployment, continuous performance monitoring, and iterative improvement.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. FAQ -->
<section class="py-24 bg-surface border-t border-border">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <div class="text-center mb-12">
            <h2 class="h2 text-text">Service Frequently Asked Questions</h2>
        </div>
        
        <div class="space-y-4" x-data="{ activeAccordion: null }">
            <div class="glass-panel rounded-xl overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 1 ? null : 1" class="w-full px-6 py-4 text-left flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                    <span class="font-semibold text-text">Can I combine multiple services?</span>
                    <svg class="w-5 h-5 text-text-muted transform transition-transform" :class="{'rotate-180': activeAccordion === 1}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeAccordion === 1" x-collapse class="px-6 pb-4 text-text-muted">
                    Yes. In fact, combining Web Development with SEO Services from the start is highly recommended. It ensures the technical architecture is perfectly aligned with search engine requirements before launch.
                </div>
            </div>
            
            <div class="glass-panel rounded-xl overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 2 ? null : 2" class="w-full px-6 py-4 text-left flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                    <span class="font-semibold text-text">Do you guarantee specific outcomes?</span>
                    <svg class="w-5 h-5 text-text-muted transform transition-transform" :class="{'rotate-180': activeAccordion === 2}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeAccordion === 2" x-collapse class="px-6 pb-4 text-text-muted">
                    We guarantee professional engineering, adherence to technical best practices, and honest strategy. We do not make unrealistic promises like "guaranteed #1 Google rankings" or "viral social growth," as these are outside direct control and often imply manipulative tactics.
                </div>
            </div>

            <div class="glass-panel rounded-xl overflow-hidden">
                <button @click="activeAccordion = activeAccordion === 3 ? null : 3" class="w-full px-6 py-4 text-left flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary">
                    <span class="font-semibold text-text">Are your services performed in-house?</span>
                    <svg class="w-5 h-5 text-text-muted transform transition-transform" :class="{'rotate-180': activeAccordion === 3}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="activeAccordion === 3" x-collapse class="px-6 pb-4 text-text-muted">
                    Yes. Our core engineering and strategic services are performed by our dedicated professional teams to ensure strict quality control and seamless communication.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. Final CTA -->
<section class="py-24 relative overflow-hidden bg-primary/10 border-t border-primary/20">
    <div class="container mx-auto relative z-10 text-center px-4">
        <h2 class="h2 text-text mb-6">Ready to Discuss Your Project?</h2>
        <p class="text-body max-w-2xl mx-auto mb-10 text-text-muted">
            Contact our team to explore how our digital services can support your business objectives.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-lg glow-primary">
                Get a Free Consultation
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
