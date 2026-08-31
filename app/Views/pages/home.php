<?= $this->extend('layouts/main') ?>

<?= $this->section('head') ?>
    <style>
        /* Premium Hero Styling */
        .hero-premium {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, var(--color-bg-primary) 0%, var(--color-bg-secondary) 100%);
            min-height: 92vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .hero-premium::before {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 50% 30%, rgba(6, 182, 212, 0.1), transparent 60%);
            z-index: 1;
        }
        
        .hero-premium::after {
            content: '';
            position: absolute;
            inset: 0;
            background-image: 
                linear-gradient(90deg, var(--color-border) 1px, transparent 1px),
                linear-gradient(0deg, var(--color-border) 1px, transparent 1px);
            background-size: 80px 80px;
            opacity: 0.1;
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 10;
            text-align: center;
            max-width: 1000px;
            margin: 0 auto;
            padding: 0 var(--spacing-lg);
        }
        
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-md);
            padding: var(--spacing-sm) var(--spacing-xl);
            border: 1px solid var(--color-border-light);
            border-radius: var(--radius-full);
            background: var(--color-surface);
            backdrop-filter: blur(12px);
            margin-bottom: var(--spacing-2xl);
            animation: slide-up 0.6s var(--easing-ease-out) forwards;
        }
        
        .hero-badge::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: var(--color-accent-cyan);
            box-shadow: 0 0 12px var(--color-glow-cyan);
            animation: pulse 2s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .hero-title {
            font-size: clamp(2.5rem, 8vw, 5rem);
            line-height: 1.1;
            letter-spacing: -0.03em;
            margin-bottom: var(--spacing-xl);
            color: var(--color-text-primary);
            font-weight: 700;
            animation: slide-up 0.8s var(--easing-ease-out) 0.1s forwards;
            opacity: 0;
        }
        
        .hero-title .gradient-text {
            background: linear-gradient(135deg, var(--color-accent-cyan) 0%, var(--color-accent-blue) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .hero-subtitle {
            font-size: clamp(1rem, 2vw, 1.5rem);
            line-height: 1.6;
            color: var(--color-text-secondary);
            margin-bottom: var(--spacing-3xl);
            animation: slide-up 0.8s var(--easing-ease-out) 0.2s forwards;
            opacity: 0;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .hero-cta-group {
            display: flex;
            flex-wrap: wrap;
            gap: var(--spacing-lg);
            justify-content: center;
            animation: slide-up 0.8s var(--easing-ease-out) 0.3s forwards;
            opacity: 0;
        }
        
        /* Section Transitions */
        .section-transition-dark {
            background: var(--color-bg-primary);
            position: relative;
        }
        
        .section-transition-dark::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-accent-cyan), transparent);
            opacity: 0.5;
        }
        
        .section-transition-light {
            background: linear-gradient(180deg, var(--color-bg-secondary) 0%, var(--color-bg-tertiary) 100%);
            position: relative;
        }
        
        .section-transition-light::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--color-accent-cyan), transparent);
            opacity: 0.3;
        }
        
        /* Premium Service Card */
        .service-card-premium {
            background: var(--color-surface-elevated);
            border: 1px solid var(--color-border);
            border-radius: var(--radius-xl);
            padding: var(--spacing-2xl);
            position: relative;
            overflow: hidden;
            transition: all var(--duration-base) var(--easing-ease-out);
            display: flex;
            flex-direction: column;
        }
        
        .service-card-premium::before {
            content: '';
            position: absolute;
            inset: -1px;
            background: linear-gradient(135deg, var(--color-accent-cyan), var(--color-accent-blue));
            opacity: 0;
            z-index: -1;
            border-radius: var(--radius-xl);
            transition: opacity var(--duration-base);
        }
        
        .service-card-premium:hover {
            border-color: var(--color-accent-cyan);
            background: var(--color-surface-hover);
            transform: translateY(-4px);
            box-shadow: var(--shadow-glow);
        }
        
        .service-card-premium:hover::before {
            opacity: 0.1;
        }
        
        .service-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--color-accent-cyan);
            opacity: 0.3;
            margin-bottom: var(--spacing-md);
            font-family: 'JetBrains Mono', monospace;
        }
        
        .service-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-text-primary);
            margin-bottom: var(--spacing-md);
        }
        
        .service-description {
            color: var(--color-text-secondary);
            line-height: 1.7;
            margin-bottom: var(--spacing-xl);
            flex-grow: 1;
        }
        
        .service-link {
            display: inline-flex;
            align-items: center;
            gap: var(--spacing-sm);
            color: var(--color-accent-cyan);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: gap var(--duration-base);
        }
        
        .service-link::after {
            content: 'â†’';
            transition: transform var(--duration-base) var(--easing-ease-out);
        }
        
        .service-link:hover::after {
            transform: translateX(4px);
        }
        
        /* Premium Section Heading */
        .section-heading {
            margin-bottom: var(--spacing-3xl);
        }
        
        .section-eyebrow {
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: var(--color-accent-cyan);
            margin-bottom: var(--spacing-md);
            display: flex;
            align-items: center;
            gap: var(--spacing-md);
        }
        
        .section-eyebrow::before {
            content: '';
            display: inline-block;
            width: 8px;
            height: 1px;
            background: var(--color-accent-cyan);
        }
        
        .section-title {
            font-size: clamp(1.75rem, 5vw, 3rem);
            font-weight: 700;
            color: var(--color-text-primary);
            margin-bottom: var(--spacing-lg);
            line-height: 1.2;
        }
        
        .section-description {
            font-size: 1.125rem;
            color: var(--color-text-secondary);
            line-height: 1.7;
            max-width: 600px;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. Premium Hero Section -->
<section class="hero-premium reveal-on-scroll">
    <div class="hero-content">
        <div class="hero-badge">
            <span class="text-meta">Digital Engineering Studio</span>
        </div>
        
        <h1 class="hero-title">
            Architecting <br>
            <span class="gradient-text">High-Performance</span> <br>
            Software Solutions
        </h1>
        
        <p class="hero-subtitle">
            We build scalable, secure, and modern digital platforms for ambitious international brands. From complex enterprise software to engaging mobile applications.
        </p>
        
        <div class="hero-cta-group">
            <a href="<?= url_to('contact') ?>" class="btn btn-primary">
                Get a Free Consultation
            </a>
            <a href="<?= url_to('services') ?>" class="btn btn-secondary">
                Explore Capabilities
            </a>
        </div>
    </div>
</section>

<!-- 2. Why Choose Section -->
<section class="section-transition-light py-24 reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="reveal-on-scroll" data-stagger>
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-gradient-to-br from-cyan-500/20 to-blue-500/20 border border-cyan-500/30 mb-6">
                    <svg class="w-6 h-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-text-primary mb-3">Scalable Architecture</h3>
                <p class="text-text-secondary leading-relaxed">Future-proof codebases designed to grow with your business, handling increased traffic and complexity seamlessly.</p>
            </div>
            
            <div class="reveal-on-scroll" data-stagger>
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-gradient-to-br from-blue-500/20 to-indigo-500/20 border border-blue-500/30 mb-6">
                    <svg class="w-6 h-6 text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-text-primary mb-3">High Performance</h3>
                <p class="text-text-secondary leading-relaxed">Optimized for Core Web Vitals, blazing-fast load times, and seamless user experiences across all devices.</p>
            </div>
            
            <div class="reveal-on-scroll" data-stagger>
                <div class="flex items-center justify-center w-12 h-12 rounded-lg bg-gradient-to-br from-teal-500/20 to-green-500/20 border border-teal-500/30 mb-6">
                    <svg class="w-6 h-6 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-text-primary mb-3">Modern Tech Stack</h3>
                <p class="text-text-secondary leading-relaxed">Leveraging the latest frameworks and secure technologies to deliver robust, maintainable digital products.</p>
            </div>
        </div>
    </div>
</section>

<!-- 3. Core Services Section -->
<section class="section-transition-dark py-32 reveal-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-heading mb-16">
            <div class="section-eyebrow">Core Capabilities</div>
            <h2 class="section-title">Premium Development Services</h2>
            <p class="section-description">End-to-end development services tailored to your operational needs.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Web Development -->
            <article class="service-card-premium reveal-on-scroll" data-stagger>
                <div class="service-number">01</div>
                <h3 class="service-title">Web Development</h3>
                <p class="service-description">Custom, high-performance web applications, enterprise portals, and robust backend systems built for scale and security.</p>
                <a href="<?= url_to('service-detail', 'web-development') ?>" class="service-link">
                    Explore Service
                </a>
            </article>
            
            <!-- Software Development -->
            <article class="service-card-premium reveal-on-scroll" data-stagger>
                <div class="service-number">02</div>
                <h3 class="service-title">Software Development</h3>
                <p class="service-description">Bespoke software solutions tailored to automate your workflows, manage data securely, and solve complex business challenges.</p>
                <a href="<?= url_to('service-detail', 'software-development') ?>" class="service-link">
                    Explore Service
                </a>
            </article>
            
            <!-- App Development -->
            <article class="service-card-premium reveal-on-scroll" data-stagger>
                <div class="service-number">03</div>
                <h3 class="service-title">App Development</h3>
                <p class="service-description">Native and cross-platform mobile applications designed for intuitive user experiences and high performance on iOS and Android.</p>
                <a href="<?= url_to('service-detail', 'app-development') ?>" class="service-link">
                    Explore Service
                </a>
            </article>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
