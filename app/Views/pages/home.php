<?= $this->extend('layouts/main') ?>

<?= $this->section('head') ?>
    <style>
        .hero-bg {
            background-image: radial-gradient(circle at 50% -20%, theme('colors.primary.glow'), transparent 60%);
        }
        .pattern-bg {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. Hero Section -->
<section class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden hero-bg">
    <div class="container mx-auto relative z-10 text-center">
        <!-- Eyebrow -->
        <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-primary/30 bg-primary/10 text-primary text-sm font-semibold mb-8 animate-fade-in-up">
            <span class="flex h-2 w-2 rounded-full bg-primary mr-2 shadow-[0_0_8px_rgba(6,182,212,0.8)]"></span>
            Digital Products &bull; Software &bull; Web &bull; Mobile
        </div>
        
        <h1 class="h1 text-text mb-6 max-w-5xl mx-auto">
            Architecting <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-secondary">High-Performance</span> <br class="hidden md:block" /> Software Solutions
        </h1>
        
        <p class="text-body max-w-2xl mx-auto mb-12">
            We build scalable, secure, and modern digital platforms for ambitious international brands. From complex enterprise software to engaging mobile applications.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-base">
                Get a Free Consultation
            </a>
            <a href="<?= url_to('services') ?>" class="btn-secondary py-4 px-8 text-base">
                Explore Capabilities
            </a>
        </div>
    </div>
    
    <!-- Abstract Tech Visual -->
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-border to-transparent mt-20"></div>
</section>

<!-- 2. Trust / Why Ziibay Soft -->
<section class="py-20 bg-surface/50 border-b border-border pattern-bg">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center md:text-left">
            <div>
                <div class="w-12 h-12 rounded-lg bg-primary/10 border border-primary/20 flex items-center justify-center text-primary mb-6 mx-auto md:mx-0">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
                <h3 class="h4 text-text mb-3">Scalable Architecture</h3>
                <p class="text-small">Future-proof codebases designed to grow with your business, handling increased traffic and complexity seamlessly.</p>
            </div>
            <div>
                <div class="w-12 h-12 rounded-lg bg-primary/10 border border-primary/20 flex items-center justify-center text-primary mb-6 mx-auto md:mx-0">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <h3 class="h4 text-text mb-3">High Performance</h3>
                <p class="text-small">Optimized for Core Web Vitals, blazing-fast load times, and seamless user experiences across all devices.</p>
            </div>
            <div>
                <div class="w-12 h-12 rounded-lg bg-primary/10 border border-primary/20 flex items-center justify-center text-primary mb-6 mx-auto md:mx-0">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                </div>
                <h3 class="h4 text-text mb-3">Modern Tech Stack</h3>
                <p class="text-small">Leveraging the latest frameworks and secure technologies to deliver robust, maintainable digital products.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Core Services -->
<section class="py-24">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="h2 text-text mb-4">Core Capabilities</h2>
            <p class="text-body max-w-2xl mx-auto">End-to-end development services tailored to your operational needs.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Web Dev -->
            <article class="glass-panel p-8 rounded-2xl group hover:-translate-y-2 transition-transform duration-300">
                <div class="w-14 h-14 bg-surface rounded-xl flex items-center justify-center mb-6 text-primary border border-border group-hover:border-primary/50 transition-colors">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                </div>
                <h3 class="h3 text-text mb-4">Web Development</h3>
                <p class="text-small mb-6 line-clamp-3">Custom, high-performance web applications, enterprise portals, and robust backend systems built for scale and security.</p>
                <ul class="space-y-2 mb-8 text-sm text-text-muted">
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Custom Web Apps</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> API Development</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> System Integration</li>
                </ul>
                <a href="<?= url_to('service-detail', 'web-development') ?>" class="inline-flex items-center text-primary font-semibold hover:text-primary-light transition-colors group-hover:underline">
                    Explore Service <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </article>

            <!-- Software Dev -->
            <article class="glass-panel p-8 rounded-2xl group hover:-translate-y-2 transition-transform duration-300">
                <div class="w-14 h-14 bg-surface rounded-xl flex items-center justify-center mb-6 text-primary border border-border group-hover:border-primary/50 transition-colors">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                </div>
                <h3 class="h3 text-text mb-4">Software Development</h3>
                <p class="text-small mb-6 line-clamp-3">Bespoke software solutions tailored to automate your workflows, manage data securely, and solve complex business challenges.</p>
                <ul class="space-y-2 mb-8 text-sm text-text-muted">
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Enterprise Software</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> SaaS Architecture</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Legacy Modernization</li>
                </ul>
                <a href="<?= url_to('service-detail', 'software-development') ?>" class="inline-flex items-center text-primary font-semibold hover:text-primary-light transition-colors group-hover:underline">
                    Explore Service <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </article>

            <!-- App Dev -->
            <article class="glass-panel p-8 rounded-2xl group hover:-translate-y-2 transition-transform duration-300">
                <div class="w-14 h-14 bg-surface rounded-xl flex items-center justify-center mb-6 text-primary border border-border group-hover:border-primary/50 transition-colors">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                </div>
                <h3 class="h3 text-text mb-4">App Development</h3>
                <p class="text-small mb-6 line-clamp-3">Native and cross-platform mobile applications designed for intuitive user experiences and high performance on iOS and Android.</p>
                <ul class="space-y-2 mb-8 text-sm text-text-muted">
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> iOS & Android Apps</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> React Native / Flutter</li>
                    <li class="flex items-center"><svg class="w-4 h-4 text-primary mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg> Mobile UI/UX</li>
                </ul>
                <a href="<?= url_to('service-detail', 'app-development') ?>" class="inline-flex items-center text-primary font-semibold hover:text-primary-light transition-colors group-hover:underline">
                    Explore Service <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </article>
        </div>
    </div>
</section>

<!-- 4. Industries Section -->
<section class="py-24 bg-surface border-y border-border">
    <div class="container mx-auto">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <h2 class="h2 text-text mb-4">Industries We Serve</h2>
                <p class="text-body">We provide tailored digital solutions across diverse sectors, understanding the unique regulatory and operational requirements of each industry.</p>
            </div>
            <a href="<?= url_to('industries') ?>" class="btn-ghost">View All Industries</a>
        </div>

        <!-- Reusable Industry Cards -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php 
            $industries = ['Healthcare', 'Finance & FinTech', 'E-commerce', 'Real Estate', 'Logistics', 'Education', 'SaaS', 'Professional Services'];
            foreach($industries as $industry): ?>
            <a href="<?= base_url('industries/'.url_title(strtolower($industry), '-', true)) ?>" class="glass-panel p-6 rounded-xl hover:bg-surface-hover hover:border-primary/30 transition-all duration-300 group">
                <h4 class="text-text font-medium group-hover:text-primary transition-colors"><?= esc($industry) ?></h4>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 5. Process Section -->
<section class="py-24">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="h2 text-text mb-4">Our Development Process</h2>
            <p class="text-body max-w-2xl mx-auto">A transparent, agile approach to delivering complex projects on time.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative">
            <!-- Connecting Line (Desktop) -->
            <div class="hidden lg:block absolute top-1/2 left-0 w-full h-px bg-border -translate-y-1/2 z-0"></div>

            <div class="relative z-10 glass-panel p-8 rounded-2xl border-t-4 border-t-primary bg-surface">
                <span class="text-primary font-bold tracking-widest text-sm uppercase mb-2 block">01</span>
                <h4 class="text-text font-bold text-xl mb-3">Discovery</h4>
                <p class="text-small">We analyze your requirements, market, and technical constraints to define the project scope.</p>
            </div>

            <div class="relative z-10 glass-panel p-8 rounded-2xl border-t-4 border-t-secondary bg-surface">
                <span class="text-secondary font-bold tracking-widest text-sm uppercase mb-2 block">02</span>
                <h4 class="text-text font-bold text-xl mb-3">Architecture</h4>
                <p class="text-small">Designing the database schema, system architecture, and UI/UX prototypes.</p>
            </div>

            <div class="relative z-10 glass-panel p-8 rounded-2xl border-t-4 border-t-primary bg-surface">
                <span class="text-primary font-bold tracking-widest text-sm uppercase mb-2 block">03</span>
                <h4 class="text-text font-bold text-xl mb-3">Development</h4>
                <p class="text-small">Agile coding sprints with continuous integration, strict code reviews, and testing.</p>
            </div>

            <div class="relative z-10 glass-panel p-8 rounded-2xl border-t-4 border-t-secondary bg-surface">
                <span class="text-secondary font-bold tracking-widest text-sm uppercase mb-2 block">04</span>
                <h4 class="text-text font-bold text-xl mb-3">Launch & Growth</h4>
                <p class="text-small">Secure deployment, performance monitoring, and ongoing maintenance.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Portfolio Preview Empty State -->
<section class="py-24 bg-surface border-y border-border">
    <div class="container mx-auto text-center">
        <h2 class="h2 text-text mb-6">Selected Work</h2>
        <p class="text-body max-w-2xl mx-auto mb-12">Discover how we've helped businesses transform their digital presence and streamline operations.</p>
        
        <div class="max-w-4xl mx-auto glass-panel border-dashed border-2 border-border rounded-2xl p-16">
            <svg class="w-16 h-16 text-text-muted mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
            <h3 class="text-xl text-text font-medium mb-2">Portfolio Updates in Progress</h3>
            <p class="text-text-muted mb-6">We are currently curating our latest case studies and project highlights.</p>
            <a href="<?= url_to('contact') ?>" class="btn-secondary">Discuss Your Project</a>
        </div>
    </div>
</section>

<!-- 7. FAQ Section (Accessible Accordion with Alpine) -->
<section class="py-24">
    <div class="container mx-auto max-w-4xl">
        <div class="text-center mb-16">
            <h2 class="h2 text-text mb-4">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4" x-data="{ active: null }">
            <?php 
            $faqs = [
                ['q' => 'What technologies do you use for web development?', 'a' => 'We utilize a modern tech stack including PHP (CodeIgniter, Laravel), JavaScript (React, Vue, Node.js), and tailored SQL/NoSQL databases depending on your project\'s specific scaling requirements.'],
                ['q' => 'Do you provide ongoing maintenance after launch?', 'a' => 'Yes, we offer comprehensive SLA agreements covering security patching, performance monitoring, and feature updates to ensure your product remains robust.'],
                ['q' => 'Can you integrate with our existing CRM or ERP?', 'a' => 'Absolutely. We specialize in API development and system integration, securely connecting your new web platform or app with existing enterprise software.'],
                ['q' => 'How long does a typical project take?', 'a' => 'Project timelines vary based on complexity. A standard corporate website may take 4-8 weeks, while a custom SaaS platform or enterprise application can take 3-6 months. We provide detailed roadmaps during the discovery phase.']
            ];
            foreach($faqs as $index => $faq): ?>
            <div class="glass-panel rounded-xl overflow-hidden">
                <button @click="active === <?= $index ?> ? active = null : active = <?= $index ?>" 
                        class="w-full text-left px-6 py-5 flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary"
                        :aria-expanded="active === <?= $index ?>">
                    <span class="font-semibold text-text pr-4"><?= esc($faq['q']) ?></span>
                    <svg class="w-5 h-5 text-primary transform transition-transform duration-200 shrink-0" 
                         :class="{'rotate-180': active === <?= $index ?>}" 
                         fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div x-show="active === <?= $index ?>" 
                     x-collapse 
                     x-transition.duration.300ms
                     class="px-6 pb-5 text-text-muted text-sm border-t border-white/5 pt-4">
                    <?= esc($faq['a']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 8. Final CTA -->
<section class="py-24 relative overflow-hidden bg-primary/10 border-t border-primary/20">
    <div class="absolute inset-0 pattern-bg opacity-50"></div>
    <div class="container mx-auto relative z-10 text-center">
        <h2 class="h1 text-text mb-6">Ready to build something exceptional?</h2>
        <p class="text-body max-w-2xl mx-auto mb-10 text-text-muted">
            Partner with Ziibay Soft to architect and launch your next digital product.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-lg glow-primary">
                Start Your Project
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
