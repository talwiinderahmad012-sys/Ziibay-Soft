<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "<?= url_to('home') ?>"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "About Us"
  }]
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. Breadcrumb -->
<div class="bg-surface/80 border-b border-border/70 py-3">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav aria-label="Breadcrumb" class="text-xs font-mono text-text-muted flex items-center space-x-2">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span class="text-text-dim">/</span>
            <span class="text-text font-semibold" aria-current="page">About Us</span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-24 pb-20 overflow-hidden bg-surface/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <div class="text-caption text-primary mb-3">ENGINEERING IDENTITY</div>
            <h1 class="h1 text-text mb-6">Building Digital Products With Purpose</h1>
            <p class="text-body text-lg mb-10 leading-relaxed text-text-muted max-w-3xl mx-auto">
                Ziibay Soft is a digital engineering agency specializing in custom web platforms, complex software architecture, and native mobile applications. We build scalable technology to solve real business challenges.
            </p>
        </div>
    </div>
</section>

<!-- 3. Company Introduction & What We Do -->
<section class="py-24 bg-surface/50 border-y border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="text-caption text-accent-blue mb-3">CORE PRINCIPLES</div>
                <h2 class="h2 text-text mb-6">Our Philosophy</h2>
                <p class="text-body mb-6 leading-relaxed text-text-muted">
                    Technology should not be a barrier; it should be an enabler. At Ziibay Soft, we focus on engineering robust digital solutions that streamline operations, engage users, and scale seamlessly as your organization grows.
                </p>
                <p class="text-body leading-relaxed text-text-muted">
                    We believe in custom architecture over restrictive templates, ensuring that the software we build fits your precise workflows rather than forcing you to adapt to rigid off-the-shelf software.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="tech-card p-6 rounded-xl border-l-2 border-l-primary">
                    <h3 class="text-text font-bold text-base mb-2">Web Development</h3>
                    <p class="text-xs text-text-muted leading-relaxed">High-performance corporate websites, e-commerce, and bespoke web apps.</p>
                </div>
                <div class="tech-card p-6 rounded-xl border-l-2 border-l-accent-blue">
                    <h3 class="text-text font-bold text-base mb-2">Software Development</h3>
                    <p class="text-xs text-text-muted leading-relaxed">Business management systems, SaaS platforms, and API integration.</p>
                </div>
                <div class="tech-card p-6 rounded-xl border-l-2 border-l-accent-teal sm:col-span-2">
                    <h3 class="text-text font-bold text-base mb-2">App Development</h3>
                    <p class="text-xs text-text-muted leading-relaxed">Native and cross-platform mobile applications designed for intuitive UX and secure data synchronization.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. How We Work -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="text-caption text-primary mb-3">METHODOLOGY</div>
            <h2 class="h2 text-text mb-4">Our Approach</h2>
            <p class="text-body max-w-2xl mx-auto text-text-muted">Principles that guide our engineering process.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="tech-card p-8 rounded-xl">
                <div class="text-caption text-primary font-mono mb-4">01 // PROTOCOL</div>
                <h3 class="text-text font-bold text-lg mb-3">Understand Before Building</h3>
                <p class="text-small text-text-muted leading-relaxed">We never rush into code. We map your business processes, user journeys, and technical constraints first to ensure the solution actually solves the problem.</p>
            </div>
            <div class="tech-card p-8 rounded-xl">
                <div class="text-caption text-accent-blue font-mono mb-4">02 // PROTOCOL</div>
                <h3 class="text-text font-bold text-lg mb-3">Design Around Users</h3>
                <p class="text-small text-text-muted leading-relaxed">A system is only as good as its adoption rate. We prioritize intuitive UI/UX to minimize friction and training requirements for your staff or customers.</p>
            </div>
            <div class="tech-card p-8 rounded-xl">
                <div class="text-caption text-accent-teal font-mono mb-4">03 // PROTOCOL</div>
                <h3 class="text-text font-bold text-lg mb-3">Plan For Growth</h3>
                <p class="text-small text-text-muted leading-relaxed">We architect databases and server infrastructure to handle increased load, ensuring you won't need to rebuild from scratch when your user base expands.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. Engineering Principles -->
<section class="py-24 bg-surface/50 border-y border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mb-16">
            <div class="text-caption text-primary mb-3">CODEBASE STANDARDS</div>
            <h2 class="h2 text-text mb-4">Engineering Standards</h2>
            <p class="text-body text-text-muted">Our commitment to code quality and maintainability.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
            <div class="tech-panel p-6 rounded-xl">
                <h4 class="text-text font-bold text-base mb-2 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                    Clean Architecture
                </h4>
                <p class="text-small text-text-muted leading-relaxed">We enforce strict separation of concerns, writing modular, maintainable code that allows future developers to safely introduce new features without breaking existing functionality.</p>
            </div>
            <div class="tech-panel p-6 rounded-xl">
                <h4 class="text-text font-bold text-base mb-2 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-blue"></span>
                    Performance Optimization
                </h4>
                <p class="text-small text-text-muted leading-relaxed">Speed impacts conversion and user retention. We optimize database queries, implement caching strategies, and minimize asset payloads to ensure blazing-fast response times.</p>
            </div>
            <div class="tech-panel p-6 rounded-xl">
                <h4 class="text-text font-bold text-base mb-2 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span>
                    Security by Design
                </h4>
                <p class="text-small text-text-muted leading-relaxed">We implement strict input validation, parameterized queries to prevent SQL injection, CSRF tokens, and secure authentication flows to protect your business data.</p>
            </div>
            <div class="tech-panel p-6 rounded-xl">
                <h4 class="text-text font-bold text-base mb-2 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                    SEO-Aware Development
                </h4>
                <p class="text-small text-text-muted leading-relaxed">SEO is not an afterthought. We build with semantic HTML, optimized Core Web Vitals, server-side rendering where appropriate, and structured JSON-LD data from day one.</p>
            </div>
            <div class="tech-panel p-6 rounded-xl">
                <h4 class="text-text font-bold text-base mb-2 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-blue"></span>
                    Accessibility
                </h4>
                <p class="text-small text-text-muted leading-relaxed">We design interfaces adhering to WCAG principles, ensuring your digital products are usable by everyone, utilizing semantic ARIA labels and strict color contrast ratios.</p>
            </div>
            <div class="tech-panel p-6 rounded-xl">
                <h4 class="text-text font-bold text-base mb-2 flex items-center gap-2">
                    <span class="w-1.5 h-1.5 rounded-full bg-accent-teal"></span>
                    Scalability
                </h4>
                <p class="text-small text-text-muted leading-relaxed">Whether through stateless architecture or microservices, we build systems capable of vertical and horizontal scaling to support enterprise-level traffic spikes.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Team & Portfolio Empty States (E-E-A-T Foundation) -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Team Preview -->
            <div class="tech-card p-8 rounded-xl border-dashed border-2 border-border/70 text-center">
                <div class="w-12 h-12 bg-surface rounded-lg border border-border flex items-center justify-center mx-auto mb-4 text-text-muted">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <h3 class="text-lg text-text font-bold mb-2">Meet Our Engineering Team</h3>
                <p class="text-small text-text-muted mb-4 leading-relaxed">Team profiles and leadership biographies are currently being updated in our system.</p>
                <span class="text-caption text-text-dim">PROFILES PENDING</span>
            </div>
            
            <!-- Portfolio Preview -->
            <div class="tech-card p-8 rounded-xl border-dashed border-2 border-border/70 text-center">
                <div class="w-12 h-12 bg-surface rounded-lg border border-border flex items-center justify-center mx-auto mb-4 text-text-muted">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <h3 class="text-lg text-text font-bold mb-2">Selected Case Studies</h3>
                <p class="text-small text-text-muted mb-4 leading-relaxed">We are organizing our latest project highlights and client success stories.</p>
                <span class="text-caption text-text-dim">PORTFOLIO PENDING</span>
            </div>
        </div>
    </div>
</section>

<!-- 7. Final CTA -->
<section class="py-24 relative overflow-hidden bg-surface/50 border-t border-border/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h2 class="h2 text-text mb-4">Let's Build Something Together</h2>
        <p class="text-body max-w-2xl mx-auto mb-8 text-text-muted">
            Reach out to discuss your technical requirements and discover how Ziibay Soft can architect your next digital product.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-3.5 px-8 text-sm">
                Start Your Project
            </a>
            <a href="<?= url_to('services') ?>" class="btn-secondary py-3.5 px-8 text-sm">
                View Our Services
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
