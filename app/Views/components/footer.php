<footer class="bg-surface border-t border-border pt-20 pb-10 mt-auto">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-12 mb-16">
            <!-- Brand -->
            <div class="lg:col-span-2">
                <a href="<?= url_to('home') ?>" class="text-2xl font-bold text-text tracking-tight mb-4 inline-block focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">
                    Ziibay <span class="text-primary">Soft</span>
                </a>
                <p class="text-text-muted text-sm leading-relaxed max-w-sm mb-6">
                    A premium digital agency delivering scalable web and software solutions for ambitious international brands. We build technology that drives growth.
                </p>
                <div class="flex space-x-4">
                    <!-- Social Links (Configurable later) -->
                    <a href="#" aria-label="LinkedIn" class="text-text-muted hover:text-text transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <a href="#" aria-label="GitHub" class="text-text-muted hover:text-text transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Services -->
            <div>
                <h4 class="text-text font-semibold mb-6">Core Services</h4>
                <ul class="space-y-4 text-sm mb-8">
                    <li><a href="<?= url_to('service-detail', 'web-development') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Web Development</a></li>
                    <li><a href="<?= url_to('service-detail', 'software-development') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Software Development</a></li>
                    <li><a href="<?= url_to('service-detail', 'app-development') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">App Development</a></li>
                </ul>

                <h4 class="text-text font-semibold mb-6">Digital Growth</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="<?= url_to('service-detail', 'seo') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">SEO Services</a></li>
                    <li><a href="<?= url_to('service-detail', 'social-media-management') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Social Media Management</a></li>
                </ul>
            </div>

            <!-- Company -->
            <div>
                <h4 class="text-text font-semibold mb-6">Company</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="<?= url_to('about') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">About Us</a></li>
                    <li><a href="<?= url_to('portfolio') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Portfolio</a></li>
                    <li><a href="<?= url_to('case-studies') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Case Studies</a></li>
                    <li><a href="<?= url_to('blog') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Insights & Blog</a></li>
                </ul>
            </div>

            <!-- Explore -->
            <div>
                <h4 class="text-text font-semibold mb-6">Explore</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="<?= url_to('industries') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Industries</a></li>
                    <li><a href="<?= url_to('case-studies') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Case Studies</a></li>
                    <li><a href="<?= url_to('blog') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Insights & Blog</a></li>
                    <li><a href="<?= url_to('faq') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">FAQ</a></li>
                    <li><a href="<?= url_to('about') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">About Us</a></li>
                </ul>
            </div>

            <!-- Locations -->
            <div>
                <h4 class="text-text font-semibold mb-6">Locations</h4>
                <ul class="space-y-4 text-sm">
                    <li><a href="<?= base_url('locations') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">All Locations</a></li>
                    <li><a href="<?= base_url('locations/united-states') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">United States</a></li>
                    <li><a href="<?= base_url('locations/united-kingdom') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">United Kingdom</a></li>
                    <li><a href="<?= base_url('locations/australia') ?>" class="text-text-muted hover:text-primary transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded">Australia</a></li>
                    <li><a href="<?= url_to('contact') ?>" class="text-primary hover:text-primary-light font-semibold transition-colors">Start a project →</a></li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="border-t border-border pt-8 flex flex-col md:flex-row justify-between items-center text-xs text-text-muted">
            <p>&copy; <?= date('Y') ?> Ziibay Soft. All rights reserved.</p>
            <div class="flex space-x-6 mt-4 md:mt-0">
                <a href="<?= base_url('privacy') ?>" class="hover:text-text transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Privacy Policy</a>
                <a href="<?= base_url('terms') ?>" class="hover:text-text transition-colors focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-primary rounded">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
