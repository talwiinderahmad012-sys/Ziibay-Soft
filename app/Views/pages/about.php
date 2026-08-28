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
<div class="bg-surface border-b border-border py-4">
    <div class="container mx-auto">
        <nav aria-label="Breadcrumb" class="text-sm text-text-muted flex items-center space-x-2">
            <a href="<?= url_to('home') ?>" class="hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Home</a>
            <span>/</span>
            <span class="text-text font-medium" aria-current="page">About Us</span>
        </nav>
    </div>
</div>

<!-- 2. Hero Section -->
<section class="relative pt-20 pb-24 overflow-hidden">
    <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.03\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
    <div class="container mx-auto relative z-10 text-center">
        <div class="max-w-4xl mx-auto">
            <h1 class="h1 text-text mb-6">Building Digital Products With Purpose</h1>
            <p class="text-body text-xl mb-10 leading-relaxed text-text-muted">
                Ziibay Soft is a digital engineering agency specializing in custom web platforms, complex software architecture, and native mobile applications. We build scalable technology to solve real business challenges.
            </p>
        </div>
    </div>
</section>

<!-- 3. Company Introduction & What We Do -->
<section class="py-24 bg-surface/50 border-y border-border">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="h2 text-text mb-6">Our Philosophy</h2>
                <p class="text-body mb-6 leading-relaxed">
                    Technology should not be a barrier; it should be an enabler. At Ziibay Soft, we focus on engineering robust digital solutions that streamline operations, engage users, and scale seamlessly as your organization grows.
                </p>
                <p class="text-body leading-relaxed">
                    We believe in custom architecture over restrictive templates, ensuring that the software we build fits your precise workflows rather than forcing you to adapt to rigid off-the-shelf software.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="glass-panel p-6 rounded-xl border-t-4 border-t-primary">
                    <h3 class="text-text font-bold mb-2">Web Development</h3>
                    <p class="text-sm text-text-muted">High-performance corporate websites, e-commerce, and bespoke web apps.</p>
                </div>
                <div class="glass-panel p-6 rounded-xl border-t-4 border-t-secondary">
                    <h3 class="text-text font-bold mb-2">Software Development</h3>
                    <p class="text-sm text-text-muted">Business management systems, SaaS platforms, and API integration.</p>
                </div>
                <div class="glass-panel p-6 rounded-xl border-t-4 border-t-primary sm:col-span-2">
                    <h3 class="text-text font-bold mb-2">App Development</h3>
                    <p class="text-sm text-text-muted">Native and cross-platform mobile applications designed for intuitive UX and secure data synchronization.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. How We Work -->
<section class="py-24">
    <div class="container mx-auto">
        <div class="text-center mb-16">
            <h2 class="h2 text-text mb-4">Our Approach</h2>
            <p class="text-body max-w-2xl mx-auto">Principles that guide our engineering process.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="glass-panel p-8 rounded-2xl">
                <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center font-bold mb-4">01</div>
                <h3 class="text-text font-bold text-lg mb-3">Understand Before Building</h3>
                <p class="text-small">We never rush into code. We map your business processes, user journeys, and technical constraints first to ensure the solution actually solves the problem.</p>
            </div>
            <div class="glass-panel p-8 rounded-2xl">
                <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center font-bold mb-4">02</div>
                <h3 class="text-text font-bold text-lg mb-3">Design Around Users</h3>
                <p class="text-small">A system is only as good as its adoption rate. We prioritize intuitive UI/UX to minimize friction and training requirements for your staff or customers.</p>
            </div>
            <div class="glass-panel p-8 rounded-2xl">
                <div class="w-10 h-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center font-bold mb-4">03</div>
                <h3 class="text-text font-bold text-lg mb-3">Plan For Growth</h3>
                <p class="text-small">We architect databases and server infrastructure to handle increased load, ensuring you won't need to rebuild from scratch when your user base expands.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. Engineering Principles -->
<section class="py-24 bg-surface border-y border-border">
    <div class="container mx-auto">
        <div class="max-w-3xl mb-16">
            <h2 class="h2 text-text mb-4">Engineering Standards</h2>
            <p class="text-body">Our commitment to code quality and maintainability.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-10">
            <div>
                <h4 class="text-text font-bold text-lg mb-2">Clean Architecture</h4>
                <p class="text-small">We enforce strict separation of concerns, writing modular, maintainable code that allows future developers to safely introduce new features without breaking existing functionality.</p>
            </div>
            <div>
                <h4 class="text-text font-bold text-lg mb-2">Performance Optimization</h4>
                <p class="text-small">Speed impacts conversion and user retention. We optimize database queries, implement caching strategies, and minimize asset payloads to ensure blazing-fast response times.</p>
            </div>
            <div>
                <h4 class="text-text font-bold text-lg mb-2">Security by Design</h4>
                <p class="text-small">We implement strict input validation, parameterized queries to prevent SQL injection, CSRF tokens, and secure authentication flows to protect your business data.</p>
            </div>
            <div>
                <h4 class="text-text font-bold text-lg mb-2">SEO-Aware Development</h4>
                <p class="text-small">SEO is not an afterthought. We build with semantic HTML, optimized Core Web Vitals, server-side rendering where appropriate, and structured JSON-LD data from day one.</p>
            </div>
            <div>
                <h4 class="text-text font-bold text-lg mb-2">Accessibility</h4>
                <p class="text-small">We design interfaces adhering to WCAG principles, ensuring your digital products are usable by everyone, utilizing semantic ARIA labels and strict color contrast ratios.</p>
            </div>
            <div>
                <h4 class="text-text font-bold text-lg mb-2">Scalability</h4>
                <p class="text-small">Whether through stateless architecture or microservices, we build systems capable of vertical and horizontal scaling to support enterprise-level traffic spikes.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. Team & Portfolio Empty States (E-E-A-T Foundation) -->
<section class="py-24">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Team Preview -->
            <div class="glass-panel p-10 rounded-2xl border-dashed border-2 border-border text-center">
                <div class="w-16 h-16 bg-surface rounded-full flex items-center justify-center mx-auto mb-4 text-text-muted">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <h3 class="text-xl text-text font-bold mb-2">Meet Our Engineering Team</h3>
                <p class="text-small mb-6">Team profiles and leadership biographies are currently being updated in our system.</p>
                <span class="text-xs text-text-muted uppercase tracking-widest">Profiles Pending</span>
            </div>
            
            <!-- Portfolio Preview -->
            <div class="glass-panel p-10 rounded-2xl border-dashed border-2 border-border text-center">
                <div class="w-16 h-16 bg-surface rounded-full flex items-center justify-center mx-auto mb-4 text-text-muted">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                </div>
                <h3 class="text-xl text-text font-bold mb-2">Selected Case Studies</h3>
                <p class="text-small mb-6">We are organizing our latest project highlights and client success stories.</p>
                <span class="text-xs text-text-muted uppercase tracking-widest">Portfolio Pending</span>
            </div>
        </div>
    </div>
</section>

<!-- 7. Final CTA -->
<section class="py-24 relative overflow-hidden bg-primary/10 border-t border-primary/20">
    <div class="container mx-auto relative z-10 text-center">
        <h2 class="h2 text-text mb-6">Let's Build Something Together</h2>
        <p class="text-body max-w-2xl mx-auto mb-10 text-text-muted">
            Reach out to discuss your technical requirements and discover how Ziibay Soft can architect your next digital product.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn-primary py-4 px-8 text-lg glow-primary">
                Start Your Project
            </a>
            <a href="<?= url_to('services') ?>" class="btn-secondary py-4 px-8 text-lg">
                View Our Services
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
