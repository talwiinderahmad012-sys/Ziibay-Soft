<?= $this->extend('layouts/main') ?>

<?= $this->section('head') ?>
    <style>
        .hero-bg {
            background-image: radial-gradient(circle at 50% -20%, theme('colors.primary.glow'), transparent 60%);
        }
        .pattern-bg {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .constellation-bg {
            background-image: radial-gradient(rgba(255, 255, 255, 0.1) 1px, transparent 1px);
            background-size: 30px 30px;
            animation: pulse-grid 8s linear infinite;
        }
        @keyframes pulse-grid {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.6; transform: scale(1.05); }
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<section class="relative pt-32 pb-24 lg:pt-52 lg:pb-40 overflow-hidden flex flex-col justify-center min-h-[90vh]">
    <!-- Abstract Tech Visual - Digital Architecture Core -->
    <div class="absolute inset-0 z-0 pointer-events-none flex items-center justify-center overflow-hidden">
        <!-- Glowing Core -->
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary/5 rounded-full blur-[100px] animate-pulse-glow"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[300px] h-[300px] bg-accent-violet/10 rounded-full blur-[80px] animate-float" style="animation-delay: 1s;"></div>
        
        <!-- Architectural Wireframes / Grids -->
        <div class="absolute inset-0" style="background-image: linear-gradient(var(--border-color) 1px, transparent 1px), linear-gradient(90deg, var(--border-color) 1px, transparent 1px); background-size: 50px 50px; opacity: 0.2; transform: perspective(1000px) rotateX(60deg) scale(2.5) translateY(-20%); transform-origin: top center;"></div>
        <div class="absolute inset-0 constellation-bg pointer-events-none mix-blend-screen"></div>
        
        <!-- Geometric Nodes -->
        <div class="absolute top-1/3 left-1/4 w-32 h-32 border border-primary/20 rounded-full animate-float"></div>
        <div class="absolute top-2/3 right-1/4 w-48 h-48 border border-primary/10 rounded-full animate-float" style="animation-delay: 2s; animation-duration: 8s;"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[800px] h-[800px] border border-border/30 rounded-full rotate-45 border-dashed animate-[spin_120s_linear_infinite]"></div>
        
        <!-- Data Streams -->
        <div class="absolute left-1/3 top-0 w-px h-full bg-gradient-to-b from-transparent via-primary/30 to-transparent transform -skew-x-12 animate-[slide_4s_linear_infinite]"></div>
        <div class="absolute right-1/3 top-0 w-px h-full bg-gradient-to-b from-transparent via-accent-violet/30 to-transparent transform skew-x-12 animate-[slide_6s_linear_infinite]" style="animation-delay: 2s;"></div>
    </div>

    <div class="container mx-auto relative z-10 text-center animate-slide-up">
        <!-- Eyebrow -->
        <div class="inline-flex items-center px-4 py-1.5 rounded-full border border-primary/30 bg-surface/50 backdrop-blur-md shadow-glass text-primary text-xs font-bold tracking-[0.15em] uppercase mb-8">
            <span class="flex h-2 w-2 rounded-full bg-primary mr-3 shadow-[0_0_8px_var(--primary-glow)] animate-pulse"></span>
            Digital Products <span class="mx-2 opacity-50">&bull;</span> Software <span class="mx-2 opacity-50">&bull;</span> Web <span class="mx-2 opacity-50">&bull;</span> Mobile
        </div>
        
        <h1 class="h1 text-text mb-6 max-w-5xl mx-auto drop-shadow-2xl">
            Architecting <span class="shining-text relative inline-block">
                High-Performance
                <span class="absolute -bottom-2 left-0 w-full h-[2px] bg-gradient-to-r from-transparent via-primary to-transparent opacity-50"></span>
            </span> <br class="hidden md:block" /> Software Solutions
        </h1>
        
        <p class="text-body max-w-2xl mx-auto mb-12 text-text-muted drop-shadow-sm font-medium">
            We build scalable, secure, and modern digital platforms for ambitious international brands. From complex enterprise software to engaging mobile applications.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-6 items-center">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-base shadow-tech hover:scale-105 transition-transform duration-300 btn-shimmer">
                Get a Free Consultation
            </a>
            <a href="<?= url_to('services') ?>" class="btn-secondary py-4 px-8 text-base bg-surface/50 backdrop-blur-md hover:bg-surface hover:text-text hover:border-primary/50 hover:shadow-[0_0_15px_var(--primary-glow)] transition-all duration-300 btn-liquid">
                Explore Capabilities
            </a>
        </div>
    </div>
    
    <!-- Abstract Base Divider -->
    <div class="absolute bottom-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-border to-transparent"></div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-1/3 h-[1px] bg-gradient-to-r from-transparent via-primary/50 to-transparent shadow-[0_0_10px_var(--primary-glow)]"></div>
</section>

<!-- 2. Trust / Why Ziibay Soft -->
<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-background-alt/50"></div>
    <div class="container mx-auto relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center md:text-left">
            <div class="glass-panel p-8 rounded-2xl relative group overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-tech spotlight-card reveal-on-scroll reveal-delay-100">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="w-14 h-14 rounded-xl bg-surface border border-border flex items-center justify-center text-primary mb-6 mx-auto md:mx-0 shadow-glass group-hover:border-primary/50 group-hover:shadow-[0_0_15px_var(--primary-glow)] transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
                <h3 class="h4 text-text mb-4 font-bold relative z-10">Scalable Architecture</h3>
                <p class="text-small text-text-muted leading-relaxed relative z-10">Future-proof codebases designed to grow with your business, handling increased traffic and complexity seamlessly.</p>
            </div>
            
            <div class="glass-panel p-8 rounded-2xl relative group overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-tech spotlight-card reveal-on-scroll reveal-delay-200">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-accent-violet to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="w-14 h-14 rounded-xl bg-surface border border-border flex items-center justify-center text-accent-violet mb-6 mx-auto md:mx-0 shadow-glass group-hover:border-accent-violet/50 group-hover:shadow-[0_0_15px_rgba(99,102,241,0.2)] transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <h3 class="h4 text-text mb-4 font-bold relative z-10">High Performance</h3>
                <p class="text-small text-text-muted leading-relaxed relative z-10">Optimized for Core Web Vitals, blazing-fast load times, and seamless user experiences across all devices.</p>
            </div>
            
            <div class="glass-panel p-8 rounded-2xl relative group overflow-hidden transition-all duration-500 hover:-translate-y-2 hover:shadow-tech spotlight-card reveal-on-scroll reveal-delay-300">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-accent-teal to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <div class="w-14 h-14 rounded-xl bg-surface border border-border flex items-center justify-center text-accent-teal mb-6 mx-auto md:mx-0 shadow-glass group-hover:border-accent-teal/50 group-hover:shadow-[0_0_15px_rgba(13,148,136,0.2)] transition-all duration-300">
                    <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
                </div>
                <h3 class="h4 text-text mb-4 font-bold relative z-10">Modern Tech Stack</h3>
                <p class="text-small text-text-muted leading-relaxed relative z-10">Leveraging the latest frameworks and secure technologies to deliver robust, maintainable digital products.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Core Services -->
<section class="py-32 relative">
    <!-- Decorative background glow -->
    <div class="absolute top-1/2 left-0 w-full h-[500px] bg-gradient-to-r from-primary/5 via-transparent to-accent-violet/5 rounded-full blur-[120px] pointer-events-none transform -translate-y-1/2"></div>
    
    <div class="container mx-auto relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
            <div class="max-w-3xl">
                <div class="text-primary text-sm font-bold tracking-[0.2em] uppercase mb-4 flex items-center">
                    <span class="w-8 h-[1px] bg-primary mr-4"></span> Capabilities
                </div>
                <h2 class="h2 text-text mb-6">Core Architecture</h2>
                <p class="text-body text-text-muted text-lg">End-to-end development services tailored to your operational needs.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Web Dev -->
            <article class="glass-panel p-10 rounded-2xl group hover:-translate-y-2 transition-all duration-500 hover:shadow-tech relative overflow-hidden spotlight-card reveal-on-scroll reveal-delay-100">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-primary/10 rounded-full blur-3xl group-hover:bg-primary/20 transition-colors duration-500"></div>
                <div class="w-16 h-16 bg-surface/50 backdrop-blur-sm rounded-xl flex items-center justify-center mb-8 text-primary border border-border group-hover:border-primary/50 transition-all duration-500 shadow-glass relative z-10">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" /></svg>
                </div>
                <h3 class="h3 text-text mb-4 relative z-10">Web Development</h3>
                <p class="text-small text-text-muted mb-8 line-clamp-3 leading-relaxed relative z-10">Custom, high-performance web applications, enterprise portals, and robust backend systems built for scale and security.</p>
                <ul class="space-y-3 mb-10 text-sm text-text-muted relative z-10">
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-primary mr-3 shadow-[0_0_5px_var(--primary-glow)]"></span> Custom Web Apps</li>
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-primary mr-3 shadow-[0_0_5px_var(--primary-glow)]"></span> API Development</li>
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-primary mr-3 shadow-[0_0_5px_var(--primary-glow)]"></span> System Integration</li>
                </ul>
                <a href="<?= url_to('service-detail', 'web-development') ?>" class="tech-link text-sm relative z-10 group/link">
                    Explore Service <svg class="w-4 h-4 ml-2 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </article>

            <!-- Software Dev -->
            <article class="glass-panel p-10 rounded-2xl group hover:-translate-y-2 transition-all duration-500 hover:shadow-tech relative overflow-hidden spotlight-card reveal-on-scroll reveal-delay-200">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-accent-violet/10 rounded-full blur-3xl group-hover:bg-accent-violet/20 transition-colors duration-500"></div>
                <div class="w-16 h-16 bg-surface/50 backdrop-blur-sm rounded-xl flex items-center justify-center mb-8 text-accent-violet border border-border group-hover:border-accent-violet/50 transition-all duration-500 shadow-glass relative z-10">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
                </div>
                <h3 class="h3 text-text mb-4 relative z-10">Software Development</h3>
                <p class="text-small text-text-muted mb-8 line-clamp-3 leading-relaxed relative z-10">Bespoke software solutions tailored to automate your workflows, manage data securely, and solve complex business challenges.</p>
                <ul class="space-y-3 mb-10 text-sm text-text-muted relative z-10">
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-accent-violet mr-3 shadow-[0_0_5px_rgba(99,102,241,0.5)]"></span> Enterprise Software</li>
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-accent-violet mr-3 shadow-[0_0_5px_rgba(99,102,241,0.5)]"></span> SaaS Architecture</li>
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-accent-violet mr-3 shadow-[0_0_5px_rgba(99,102,241,0.5)]"></span> Legacy Modernization</li>
                </ul>
                <a href="<?= url_to('service-detail', 'software-development') ?>" class="tech-link text-sm !text-accent-violet relative z-10 group/link">
                    <style>.group:hover .tech-link::after { background-color: var(--accent-violet); }</style>
                    Explore Service <svg class="w-4 h-4 ml-2 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </article>

            <!-- App Dev -->
            <article class="glass-panel p-10 rounded-2xl group hover:-translate-y-2 transition-all duration-500 hover:shadow-tech relative overflow-hidden spotlight-card reveal-on-scroll reveal-delay-300">
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-accent-teal/10 rounded-full blur-3xl group-hover:bg-accent-teal/20 transition-colors duration-500"></div>
                <div class="w-16 h-16 bg-surface/50 backdrop-blur-sm rounded-xl flex items-center justify-center mb-8 text-accent-teal border border-border group-hover:border-accent-teal/50 transition-all duration-500 shadow-glass relative z-10">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" /></svg>
                </div>
                <h3 class="h3 text-text mb-4 relative z-10">App Development</h3>
                <p class="text-small text-text-muted mb-8 line-clamp-3 leading-relaxed relative z-10">Native and cross-platform mobile applications designed for intuitive user experiences and high performance on iOS and Android.</p>
                <ul class="space-y-3 mb-10 text-sm text-text-muted relative z-10">
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal mr-3 shadow-[0_0_5px_rgba(13,148,136,0.5)]"></span> iOS & Android Apps</li>
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal mr-3 shadow-[0_0_5px_rgba(13,148,136,0.5)]"></span> React Native / Flutter</li>
                    <li class="flex items-center"><span class="w-1.5 h-1.5 rounded-full bg-accent-teal mr-3 shadow-[0_0_5px_rgba(13,148,136,0.5)]"></span> Mobile UI/UX</li>
                </ul>
                <a href="<?= url_to('service-detail', 'app-development') ?>" class="tech-link text-sm !text-accent-teal relative z-10 group/link">
                    Explore Service <svg class="w-4 h-4 ml-2 group-hover/link:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </article>
        </div>
    </div>
</section>

<!-- 4. Industries Section -->
<section class="py-24 relative overflow-hidden bg-background-alt/30 border-y border-border/40">
    <div class="absolute inset-0 pattern-bg opacity-30"></div>
    <div class="container mx-auto relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <div class="text-accent-teal text-sm font-bold tracking-[0.2em] uppercase mb-4 flex items-center">
                    <span class="w-8 h-[1px] bg-accent-teal mr-4"></span> Sectors
                </div>
                <h2 class="h2 text-text mb-4">Industries We Serve</h2>
                <p class="text-body text-text-muted">We provide tailored digital solutions across diverse sectors, understanding the unique regulatory and operational requirements of each industry.</p>
            </div>
            <a href="<?= url_to('industries') ?>" class="btn-ghost group">
                <span class="relative z-10">View All Industries</span>
                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <!-- Industry cards driven by published CMS data -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 reveal-on-scroll">
            <?php foreach ($homeIndustries ?? [] as $industry): ?>
            <a href="<?= base_url('industries/' . esc($industry['slug'])) ?>" class="glass-panel px-6 py-8 rounded-xl hover:bg-surface-hover hover:border-accent-teal/40 hover:shadow-[0_0_15px_rgba(13,148,136,0.15)] transition-all duration-300 group relative overflow-hidden spotlight-card">
                <div class="absolute top-0 right-0 w-16 h-16 bg-accent-teal/5 rounded-bl-full transition-transform duration-500 group-hover:scale-150"></div>
                <h4 class="text-text font-medium text-center relative z-10 group-hover:text-accent-teal transition-colors flex items-center justify-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-border group-hover:bg-accent-teal transition-colors shadow-[0_0_5px_rgba(13,148,136,0)] group-hover:shadow-[0_0_5px_rgba(13,148,136,0.5)]"></span>
                    <?= esc($industry['name']) ?>
                </h4>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 5. Process Section -->
<section class="py-32 relative">
    <div class="container mx-auto">
        <div class="text-center mb-20">
            <div class="text-primary text-sm font-bold tracking-[0.2em] uppercase mb-4 flex items-center justify-center">
                <span class="w-4 h-[1px] bg-primary mr-4"></span> Protocol <span class="w-4 h-[1px] bg-primary ml-4"></span>
            </div>
            <h2 class="h2 text-text mb-6">Our Development Process</h2>
            <p class="text-body max-w-2xl mx-auto text-text-muted">A transparent, agile approach to delivering complex projects on time.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 relative">
            <!-- Connecting Data Stream (Desktop) -->
            <div class="hidden lg:block absolute top-[40px] left-[10%] w-[80%] h-[1px] bg-border/50 z-0">
                <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-transparent via-primary to-transparent w-1/3 animate-[slide_3s_linear_infinite] shadow-[0_0_10px_var(--primary-glow)]"></div>
            </div>

            <div class="relative z-10 glass-panel p-8 rounded-2xl bg-surface/40 backdrop-blur-sm border-t-0 hover:bg-surface hover:-translate-y-2 hover:shadow-tech transition-all duration-500 group spotlight-card reveal-on-scroll reveal-delay-100">
                <div class="w-20 h-20 rounded-full bg-background flex items-center justify-center border border-border group-hover:border-primary/50 shadow-glass mb-6 mx-auto relative group-hover:shadow-[0_0_20px_var(--primary-glow)] transition-all duration-500">
                    <span class="text-primary font-mono font-bold text-xl relative z-10">01</span>
                    <div class="absolute inset-0 rounded-full border border-primary/20 scale-[1.15] opacity-0 group-hover:opacity-100 group-hover:animate-[spin_10s_linear_infinite] transition-opacity"></div>
                </div>
                <h4 class="text-text font-bold text-xl mb-3 text-center relative z-10">Discovery</h4>
                <p class="text-small text-text-muted text-center leading-relaxed relative z-10">We analyze your requirements, market, and technical constraints to define the project scope.</p>
            </div>

            <div class="relative z-10 glass-panel p-8 rounded-2xl bg-surface/40 backdrop-blur-sm border-t-0 hover:bg-surface hover:-translate-y-2 hover:shadow-tech transition-all duration-500 group spotlight-card reveal-on-scroll reveal-delay-200">
                <div class="w-20 h-20 rounded-full bg-background flex items-center justify-center border border-border group-hover:border-accent-violet/50 shadow-glass mb-6 mx-auto relative group-hover:shadow-[0_0_20px_rgba(99,102,241,0.2)] transition-all duration-500">
                    <span class="text-accent-violet font-mono font-bold text-xl relative z-10">02</span>
                    <div class="absolute inset-0 rounded-full border border-accent-violet/20 scale-[1.15] opacity-0 group-hover:opacity-100 group-hover:animate-[spin_10s_linear_infinite_reverse] transition-opacity"></div>
                </div>
                <h4 class="text-text font-bold text-xl mb-3 text-center relative z-10">Architecture</h4>
                <p class="text-small text-text-muted text-center leading-relaxed relative z-10">Designing the database schema, system architecture, and UI/UX prototypes.</p>
            </div>

            <div class="relative z-10 glass-panel p-8 rounded-2xl bg-surface/40 backdrop-blur-sm border-t-0 hover:bg-surface hover:-translate-y-2 hover:shadow-tech transition-all duration-500 group spotlight-card reveal-on-scroll reveal-delay-300">
                <div class="w-20 h-20 rounded-full bg-background flex items-center justify-center border border-border group-hover:border-primary/50 shadow-glass mb-6 mx-auto relative group-hover:shadow-[0_0_20px_var(--primary-glow)] transition-all duration-500">
                    <span class="text-primary font-mono font-bold text-xl relative z-10">03</span>
                    <div class="absolute inset-0 rounded-full border border-primary/20 scale-[1.15] opacity-0 group-hover:opacity-100 group-hover:animate-[spin_10s_linear_infinite] transition-opacity"></div>
                </div>
                <h4 class="text-text font-bold text-xl mb-3 text-center relative z-10">Development</h4>
                <p class="text-small text-text-muted text-center leading-relaxed relative z-10">Agile coding sprints with continuous integration, strict code reviews, and testing.</p>
            </div>

            <div class="relative z-10 glass-panel p-8 rounded-2xl bg-surface/40 backdrop-blur-sm border-t-0 hover:bg-surface hover:-translate-y-2 hover:shadow-tech transition-all duration-500 group spotlight-card reveal-on-scroll reveal-delay-400">
                <div class="w-20 h-20 rounded-full bg-background flex items-center justify-center border border-border group-hover:border-accent-teal/50 shadow-glass mb-6 mx-auto relative group-hover:shadow-[0_0_20px_rgba(13,148,136,0.2)] transition-all duration-500">
                    <span class="text-accent-teal font-mono font-bold text-xl relative z-10">04</span>
                    <div class="absolute inset-0 rounded-full border border-accent-teal/20 scale-[1.15] opacity-0 group-hover:opacity-100 group-hover:animate-[spin_10s_linear_infinite_reverse] transition-opacity"></div>
                </div>
                <h4 class="text-text font-bold text-xl mb-3 text-center relative z-10">Launch & Growth</h4>
                <p class="text-small text-text-muted text-center leading-relaxed relative z-10">Secure deployment, performance monitoring, and ongoing maintenance.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Selected Work / Case Studies -->
<section class="py-32 bg-surface/30 backdrop-blur-md border-y border-border/40 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-tech opacity-30 pointer-events-none"></div>
    <div class="container mx-auto relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <div class="text-primary text-sm font-bold tracking-[0.2em] uppercase mb-4 flex items-center">
                    <span class="w-8 h-[1px] bg-primary mr-4"></span> Deployments
                </div>
                <h2 class="h2 text-text mb-4">Selected Work</h2>
                <p class="text-body text-text-muted">Discover how we've helped businesses transform their digital presence and streamline operations.</p>
            </div>
            <a href="<?= url_to('case-studies') ?>" class="btn-ghost group">
                <span class="relative z-10">View All Case Studies</span>
                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <?php if (! empty($featuredCaseStudies ?? [])): ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 reveal-on-scroll">
            <?php foreach ($featuredCaseStudies as $cs): ?>
            <a href="<?= base_url('case-studies/' . esc($cs['slug'])) ?>" class="glass-panel rounded-2xl border border-border/50 overflow-hidden group hover:-translate-y-2 transition-all duration-500 flex flex-col hover:shadow-tech hover:border-primary/40 relative spotlight-card">
                <div class="absolute inset-0 bg-gradient-to-t from-background via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10 pointer-events-none"></div>
                <?php if (! empty($cs['featured_image'])): ?>
                    <div class="h-56 overflow-hidden bg-surface-hover relative">
                        <div class="absolute inset-0 bg-primary/20 mix-blend-overlay z-10 group-hover:bg-transparent transition-colors duration-500"></div>
                        <img src="<?= base_url(esc($cs['featured_image'])) ?>" alt="<?= esc($cs['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 grayscale group-hover:grayscale-0" loading="lazy">
                    </div>
                <?php endif; ?>
                <div class="p-8 flex flex-col flex-grow relative z-20 bg-surface/50 backdrop-blur-sm">
                    <h3 class="text-xl font-bold text-text mb-3 group-hover:text-primary transition-colors line-clamp-2"><?= esc($cs['title']) ?></h3>
                    <?php if (! empty($cs['excerpt'])): ?>
                        <p class="text-small text-text-muted line-clamp-2 mb-6"><?= esc($cs['excerpt']) ?></p>
                    <?php endif; ?>
                    <span class="mt-auto tech-link text-sm">
                        Read the case study <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </div>
            </a>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="max-w-4xl mx-auto glass-panel border-dashed border-2 border-border/50 rounded-2xl p-16 text-center relative overflow-hidden reveal-on-scroll">
            <div class="absolute inset-0 bg-gradient-radial from-primary/5 to-transparent pointer-events-none"></div>
            <svg class="w-16 h-16 text-text-muted mx-auto mb-6 opacity-50" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" /></svg>
            <h3 class="text-2xl text-text font-bold mb-3">Portfolio Updates in Progress</h3>
            <p class="text-text-muted mb-8 text-lg">We are currently curating our latest case studies and project highlights.</p>
            <a href="<?= url_to('contact') ?>" class="btn-secondary btn-liquid">Discuss Your Project</a>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php if (! empty($latestGuides ?? [])): ?>
<!-- 6b. Latest Guides & Insights -->
<section class="py-32 relative">
    <div class="container mx-auto relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <div class="text-accent-violet text-sm font-bold tracking-[0.2em] uppercase mb-4 flex items-center">
                    <span class="w-8 h-[1px] bg-accent-violet mr-4"></span> Intelligence
                </div>
                <h2 class="h2 text-text mb-4">Guides & Insights</h2>
                <p class="text-body text-text-muted">Practical resources from our engineering and growth teams.</p>
            </div>
            <a href="<?= url_to('blog') ?>" class="btn-ghost group">
                <span class="relative z-10">Visit the Blog</span>
                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 reveal-on-scroll">
            <?php foreach ($latestGuides as $guide): ?>
            <a href="<?= base_url('blog/' . esc($guide['slug'])) ?>" class="glass-panel rounded-2xl border border-border/50 p-8 group hover:-translate-y-2 transition-all duration-500 flex flex-col hover:shadow-tech hover:border-accent-violet/40 relative overflow-hidden spotlight-card">
                <div class="absolute top-0 right-0 w-32 h-32 bg-accent-violet/5 rounded-bl-full transition-transform duration-500 group-hover:scale-150 pointer-events-none"></div>
                <h3 class="text-xl font-bold text-text mb-4 group-hover:text-accent-violet transition-colors line-clamp-2 relative z-10"><?= esc($guide['title']) ?></h3>
                <?php if (! empty($guide['excerpt'])): ?>
                    <p class="text-small text-text-muted line-clamp-3 mb-8 relative z-10 leading-relaxed"><?= esc($guide['excerpt']) ?></p>
                <?php endif; ?>
                <span class="mt-auto tech-link text-sm !text-accent-violet relative z-10">
                    <style>.group:hover .tech-link::after { background-color: var(--accent-violet); }</style>
                    Read the guide <svg class="w-4 h-4 ml-1.5 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (! empty($featuredCountries ?? [])): ?>
<!-- 6c. Where We Work (compact locations entry point) -->
<section class="py-24 bg-surface/30 backdrop-blur-sm border-y border-border/40 relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjAiIGhlaWdodD0iMjAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGNpcmNsZSBjeD0iMSIgY3k9IjEiIHI9IjEiIGZpbGw9InJnYmEoMjU1LDI1NSwyNTUsMC4wNSkiLz48L3N2Zz4=')] opacity-50"></div>
    <div class="container mx-auto relative z-10">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="max-w-2xl">
                <div class="text-accent-teal text-sm font-bold tracking-[0.2em] uppercase mb-4 flex items-center">
                    <span class="w-8 h-[1px] bg-accent-teal mr-4"></span> Network
                </div>
                <h2 class="h2 text-text mb-4">Where We Work</h2>
                <p class="text-body text-text-muted">We deliver remotely for businesses across key international markets.</p>
            </div>
            <a href="<?= base_url('locations') ?>" class="btn-ghost group">
                <span class="relative z-10">Explore All Locations</span>
                <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            <?php foreach ($featuredCountries as $country): ?>
            <a href="<?= base_url('locations/' . esc($country['slug'])) ?>" class="glass-panel p-6 rounded-xl text-center hover:border-accent-teal/50 hover:shadow-[0_0_15px_rgba(13,148,136,0.15)] transition-all duration-300 group flex flex-col items-center justify-center">
                <div class="w-2 h-2 rounded-full bg-border group-hover:bg-accent-teal mb-3 group-hover:shadow-[0_0_8px_rgba(13,148,136,0.8)] transition-all duration-300"></div>
                <span class="block text-text font-semibold group-hover:text-accent-teal transition-colors text-lg"><?= esc($country['name']) ?></span>
                <span class="text-caption mt-2 block opacity-0 group-hover:opacity-100 transition-opacity duration-300 translate-y-2 group-hover:translate-y-0">View services</span>
            </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- 7. FAQ Section (Accessible Accordion with Alpine) -->
<section class="py-32 relative">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gradient-radial from-primary/5 to-transparent pointer-events-none"></div>
    <div class="container mx-auto max-w-4xl relative z-10">
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
            <div class="glass-panel rounded-xl overflow-hidden border border-border/50 hover:border-primary/30 transition-colors duration-300">
                <button @click="active === <?= $index ?> ? active = null : active = <?= $index ?>" 
                        class="w-full text-left px-8 py-6 flex justify-between items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary group"
                        :aria-expanded="active === <?= $index ?>">
                    <span class="font-bold text-text pr-4 text-lg group-hover:text-primary transition-colors"><?= esc($faq['q']) ?></span>
                    <div class="w-8 h-8 rounded-full bg-surface-hover flex items-center justify-center shrink-0 border border-border group-hover:border-primary/30 transition-colors">
                        <svg class="w-5 h-5 text-primary transform transition-transform duration-300" 
                             :class="{'rotate-180': active === <?= $index ?>}" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </button>
                <div x-show="active === <?= $index ?>" 
                     x-collapse 
                     x-transition.duration.300ms
                     class="px-8 pb-6 text-text-muted text-base border-t border-white/5 pt-4 leading-relaxed">
                    <?= esc($faq['a']) ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 8. Final CTA -->
<section class="py-32 relative overflow-hidden bg-background border-t border-border/50">
    <div class="absolute inset-0 pattern-bg opacity-30"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-primary/5 pointer-events-none"></div>
    
    <!-- Central Glow -->
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[300px] bg-primary/10 rounded-full blur-[100px] pointer-events-none"></div>
    
    <div class="container mx-auto relative z-10 text-center animate-slide-up">
        <h2 class="h1 text-text mb-8 max-w-4xl mx-auto drop-shadow-xl">
            Ready to build something <span class="shining-text">exceptional?</span>
        </h2>
        <p class="text-body max-w-2xl mx-auto mb-12 text-text-muted text-xl">
            Partner with Ziibay Soft to architect and launch your next digital product.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-6 reveal-on-scroll">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-10 text-lg shadow-tech hover:scale-105 transition-transform duration-300 relative group overflow-hidden btn-shimmer">
                <span class="relative z-10">Start Your Project</span>
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
