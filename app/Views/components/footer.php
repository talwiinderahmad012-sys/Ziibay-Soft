<footer class="bg-surface/90 border-t border-border/80 pt-20 pb-12 mt-auto relative overflow-hidden">
    <!-- Subtle top glow -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-3/4 h-px bg-gradient-to-r from-transparent via-primary/30 to-transparent"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-10 mb-16">
            <!-- Brand Column -->
            <div class="lg:col-span-2">
                <a href="<?= url_to('home') ?>" class="text-xl font-extrabold text-text tracking-tight mb-4 inline-flex items-center gap-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">
                    <div class="w-6 h-6 rounded bg-surface border border-border flex items-center justify-center text-primary">
                        <svg class="w-3.5 h-3.5 text-primary" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span>Ziibay <span class="text-primary font-bold">Soft</span></span>
                </a>
                <p class="text-text-muted text-xs leading-relaxed max-w-sm mb-6">
                    A premium digital engineering studio delivering scalable web platforms, software systems, and mobile applications for international brands.
                </p>
                <div class="flex items-center space-x-3">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-mono bg-surface border border-border text-text-muted">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        SYSTEM ACTIVE
                    </span>
                </div>
            </div>

            <!-- Core Services -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-text mb-5 font-mono">Core Services</h4>
                <ul class="space-y-3 text-xs mb-6">
                    <li><a href="<?= url_to('service-detail', 'web-development') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Web Development</a></li>
                    <li><a href="<?= url_to('service-detail', 'software-development') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Software Development</a></li>
                    <li><a href="<?= url_to('service-detail', 'app-development') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">App Development</a></li>
                </ul>

                <h4 class="text-xs font-bold uppercase tracking-wider text-text mb-4 font-mono">Growth</h4>
                <ul class="space-y-3 text-xs">
                    <li><a href="<?= url_to('service-detail', 'seo') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">SEO Services</a></li>
                    <li><a href="<?= url_to('service-detail', 'social-media-management') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Social Media Management</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-text mb-5 font-mono">Company</h4>
                <ul class="space-y-3 text-xs">
                    <li><a href="<?= url_to('about') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">About Us</a></li>
                    <li><a href="<?= url_to('portfolio') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Portfolio</a></li>
                    <li><a href="<?= url_to('case-studies') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Case Studies</a></li>
                    <li><a href="<?= url_to('blog') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Insights & Blog</a></li>
                    <li><a href="<?= url_to('faq') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">FAQ</a></li>
                </ul>
            </div>

            <!-- Sectors -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-text mb-5 font-mono">Sectors</h4>
                <ul class="space-y-3 text-xs">
                    <li><a href="<?= url_to('industries') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Industries Index</a></li>
                    <li><a href="<?= url_to('services') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">All Capabilities</a></li>
                    <li><a href="<?= base_url('search') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Knowledge Search</a></li>
                    <li><a href="<?= url_to('contact') ?>" class="text-primary hover:text-primary-light font-semibold transition-colors">Contact Engineering &rarr;</a></li>
                </ul>
            </div>

            <!-- Locations -->
            <div>
                <h4 class="text-xs font-bold uppercase tracking-wider text-text mb-5 font-mono">Locations</h4>
                <ul class="space-y-3 text-xs">
                    <li><a href="<?= base_url('locations') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">All Locations</a></li>
                    <li><a href="<?= base_url('locations/united-states') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">United States</a></li>
                    <li><a href="<?= base_url('locations/united-kingdom') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">United Kingdom</a></li>
                    <li><a href="<?= base_url('locations/australia') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Australia</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="border-t border-border/60 pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-text-muted gap-4">
            <p class="font-mono text-[11px]">&copy; <?= date('Y') ?> Ziibay Soft. All rights reserved. Precision software engineering.</p>
            <div class="flex space-x-6 text-xs">
                <a href="<?= base_url('privacy') ?>" class="hover:text-text transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Privacy Policy</a>
                <a href="<?= base_url('terms') ?>" class="hover:text-text transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
