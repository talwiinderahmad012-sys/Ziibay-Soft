<header x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 w-full z-50 transition-all duration-300 bg-[linear-gradient(180deg,rgba(9,23,31,0.96),rgba(10,29,38,0.92))] backdrop-blur-xl border-b border-white/15 shadow-[0_4px_24px_rgba(4,13,20,0.18)]" id="main-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Brand Logo -->
            <div class="flex-shrink-0 flex items-center relative group">
                <a href="<?= url_to('home') ?>" class="relative text-xl font-extrabold tracking-tight text-text flex items-center gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-lg py-1 px-1 text-white">
                    <div class="w-8 h-8 rounded-lg bg-white/6 border border-white/20 flex items-center justify-center text-cyan-300 shadow-[0_0_18px_rgba(34,211,238,0.45)]">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <span class="font-bold tracking-tight text-white">Ziibay <span class="text-cyan-300 font-extrabold">Soft</span></span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-1 border border-border/60 bg-surface/50 rounded-full px-2 py-1 shadow-inner backdrop-blur-md">
                <a href="<?= url_to('home') ?>" class="px-4 py-1.5 text-xs font-semibold tracking-wide transition-all duration-200 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('/') ? 'text-primary bg-primary/10 border border-primary/20 shadow-[0_0_10px_var(--primary-glow)]' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Home</a>
                <a href="<?= url_to('about') ?>" class="px-4 py-1.5 text-xs font-semibold tracking-wide transition-all duration-200 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('about') ? 'text-primary bg-primary/10 border border-primary/20 shadow-[0_0_10px_var(--primary-glow)]' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">About</a>
                
                <!-- Services Dropdown -->
                <div x-data="{ servicesMenuOpen: false }" @mouseenter="servicesMenuOpen = true" @mouseleave="servicesMenuOpen = false" class="relative">
                    <button type="button" class="px-4 py-1.5 text-xs font-semibold tracking-wide transition-all duration-200 rounded-full flex items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('services*') ? 'text-primary bg-primary/10 border border-primary/20 shadow-[0_0_10px_var(--primary-glow)]' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>" aria-haspopup="true" :aria-expanded="servicesMenuOpen">
                        Services
                        <svg class="ml-1.5 h-3.5 w-3.5 transform transition-transform duration-200 opacity-70" :class="{'rotate-180': servicesMenuOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    
                    <div x-show="servicesMenuOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-98"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-98"
                         class="absolute top-full left-1/2 -translate-x-1/2 mt-3 w-80 tech-panel-heavy border border-border/80 rounded-xl shadow-2xl overflow-hidden py-3 z-50"
                         style="display: none;">
                        <div class="px-4 pb-2 mb-2 border-b border-border/40 flex items-center justify-between">
                            <span class="text-caption text-primary">Core Capabilities</span>
                            <span class="text-[10px] font-mono text-text-dim">SYSTEM v2.0</span>
                        </div>
                        <a href="<?= url_to('service-detail', 'web-development') ?>" class="block px-4 py-2.5 text-xs font-semibold transition-all duration-200 <?= url_is('services/web-development') ? 'bg-primary/10 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-5' ?>">
                            <div class="flex items-center justify-between">
                                <span>Web Development</span>
                                <span class="text-[10px] font-mono text-text-dim">01</span>
                            </div>
                        </a>
                        <a href="<?= url_to('service-detail', 'software-development') ?>" class="block px-4 py-2.5 text-xs font-semibold transition-all duration-200 <?= url_is('services/software-development') ? 'bg-primary/10 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-5' ?>">
                            <div class="flex items-center justify-between">
                                <span>Software Development</span>
                                <span class="text-[10px] font-mono text-text-dim">02</span>
                            </div>
                        </a>
                        <a href="<?= url_to('service-detail', 'app-development') ?>" class="block px-4 py-2.5 text-xs font-semibold transition-all duration-200 <?= url_is('services/app-development') ? 'bg-primary/10 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-5' ?>">
                            <div class="flex items-center justify-between">
                                <span>App Development</span>
                                <span class="text-[10px] font-mono text-text-dim">03</span>
                            </div>
                        </a>
                        <a href="<?= url_to('service-detail', 'seo') ?>" class="block px-4 py-2.5 text-xs font-semibold transition-all duration-200 <?= url_is('services/seo') ? 'bg-primary/10 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-5' ?>">
                            <div class="flex items-center justify-between">
                                <span>SEO Services</span>
                                <span class="text-[10px] font-mono text-text-dim">04</span>
                            </div>
                        </a>
                        <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="block px-4 py-2.5 text-xs font-semibold transition-all duration-200 <?= url_is('services/social-media-management') ? 'bg-primary/10 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-5' ?>">
                            <div class="flex items-center justify-between">
                                <span>Social Media Management</span>
                                <span class="text-[10px] font-mono text-text-dim">05</span>
                            </div>
                        </a>
                        <div class="border-t border-border/40 my-2"></div>
                        <a href="<?= url_to('services') ?>" class="block px-4 py-1.5 text-xs font-bold text-primary hover:text-primary-light transition-colors uppercase tracking-wider flex items-center justify-between group">
                            <span>All Capabilities</span>
                            <span class="transition-transform duration-200 group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                </div>
                
                <a href="<?= url_to('industries') ?>" class="px-4 py-1.5 text-xs font-semibold tracking-wide transition-all duration-200 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('industries*') ? 'text-primary bg-primary/10 border border-primary/20 shadow-[0_0_10px_var(--primary-glow)]' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Industries</a>
                <a href="<?= base_url('locations') ?>" class="px-4 py-1.5 text-xs font-semibold tracking-wide transition-all duration-200 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('locations*') ? 'text-primary bg-primary/10 border border-primary/20 shadow-[0_0_10px_var(--primary-glow)]' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Locations</a>
                <a href="<?= url_to('portfolio') ?>" class="px-4 py-1.5 text-xs font-semibold tracking-wide transition-all duration-200 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('portfolio') ? 'text-primary bg-primary/10 border border-primary/20 shadow-[0_0_10px_var(--primary-glow)]' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Portfolio</a>
                <a href="<?= url_to('case-studies') ?>" class="px-4 py-1.5 text-xs font-semibold tracking-wide transition-all duration-200 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('case-studies') ? 'text-primary bg-primary/10 border border-primary/20 shadow-[0_0_10px_var(--primary-glow)]' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Case Studies</a>
                <a href="<?= url_to('blog') ?>" class="px-4 py-1.5 text-xs font-semibold tracking-wide transition-all duration-200 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('blog') ? 'text-primary bg-primary/10 border border-primary/20 shadow-[0_0_10px_var(--primary-glow)]' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Blog</a>
            </nav>

            <!-- CTA and Theme Switcher -->
            <div class="hidden lg:flex items-center space-x-3">
                <button id="theme-toggle" type="button" class="relative text-text-muted hover:text-text focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-lg p-2 transition-all duration-200 bg-surface border border-border hover:border-primary/40" aria-label="Toggle Dark Mode">
                    <!-- Moon (Shows when light mode is active) -->
                    <svg id="theme-toggle-dark-icon" class="w-4 h-4 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <!-- Sun (Shows when dark mode is active) -->
                    <svg id="theme-toggle-light-icon" class="w-4 h-4 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 1.364a1 1 0 011.415 0l.707.707a1 1 0 01-1.414 1.415l-.707-.707a1 1 0 010-1.415zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM15.636 15.636a1 1 0 010 1.415l-.707.707a1 1 0 01-1.415-1.414l.707-.707a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-1.364a1 1 0 01-1.415 0l-.707-.707a1 1 0 011.414-1.415l.707.707a1 1 0 010 1.415zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zM4.364 4.364a1 1 0 010-1.415l.707-.707a1 1 0 011.414 1.415l-.707.707a1 1 0 01-1.415 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="<?= url_to('contact') ?>" class="btn-primary group text-xs !py-2.5 !px-4">
                    <span>Get a Free Consultation</span>
                    <svg class="ml-1.5 w-3.5 h-3.5 transition-transform duration-200 group-hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <!-- Mobile Menu Toggle Button -->
            <div class="lg:hidden flex items-center space-x-2">
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="text-text-muted hover:text-text p-2 rounded-lg bg-surface border border-border focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary" :aria-expanded="mobileMenuOpen" aria-controls="mobile-menu">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!mobileMenuOpen" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg x-show="mobileMenuOpen" style="display: none;" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu Panel -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="lg:hidden tech-panel-heavy border-b border-border absolute w-full left-0 top-full"
         id="mobile-menu"
         style="display: none;">
        <div class="px-4 pt-3 pb-6 space-y-1 overflow-y-auto max-h-[calc(100vh-80px)]">
            <a href="<?= url_to('home') ?>" class="block px-3 py-2.5 text-sm font-semibold rounded-lg <?= url_is('/') ? 'text-primary bg-primary/10 border border-primary/20' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Home</a>
            <a href="<?= url_to('about') ?>" class="block px-3 py-2.5 text-sm font-semibold rounded-lg <?= url_is('about') ? 'text-primary bg-primary/10 border border-primary/20' : 'text-text-muted hover:text-text hover:bg-surface' ?>">About</a>
            
            <div x-data="{ servicesOpen: <?= url_is('services*') ? 'true' : 'false' ?> }" class="space-y-1">
                <button @click="servicesOpen = !servicesOpen" class="w-full flex justify-between items-center px-3 py-2.5 text-sm font-semibold rounded-lg <?= url_is('services*') ? 'text-primary bg-primary/10 border border-primary/20' : 'text-text-muted hover:text-text hover:bg-surface' ?>">
                    <span>Services</span>
                    <svg class="w-4 h-4 transition-transform duration-200" :class="{'rotate-180': servicesOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="servicesOpen" class="pl-4 space-y-1 pb-2 pt-1 border-l-2 border-border/50 ml-3">
                    <a href="<?= url_to('service-detail', 'web-development') ?>" class="block px-3 py-2 text-xs <?= url_is('services/web-development') ? 'text-primary font-bold' : 'text-text-muted hover:text-text' ?>">Web Development</a>
                    <a href="<?= url_to('service-detail', 'software-development') ?>" class="block px-3 py-2 text-xs <?= url_is('services/software-development') ? 'text-primary font-bold' : 'text-text-muted hover:text-text' ?>">Software Development</a>
                    <a href="<?= url_to('service-detail', 'app-development') ?>" class="block px-3 py-2 text-xs <?= url_is('services/app-development') ? 'text-primary font-bold' : 'text-text-muted hover:text-text' ?>">App Development</a>
                    <a href="<?= url_to('service-detail', 'seo') ?>" class="block px-3 py-2 text-xs <?= url_is('services/seo') ? 'text-primary font-bold' : 'text-text-muted hover:text-text' ?>">SEO Services</a>
                    <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="block px-3 py-2 text-xs <?= url_is('services/social-media-management') ? 'text-primary font-bold' : 'text-text-muted hover:text-text' ?>">Social Media Management</a>
                    <a href="<?= url_to('services') ?>" class="block px-3 py-2 text-xs text-primary font-bold hover:text-primary-light">All Capabilities &rarr;</a>
                </div>
            </div>
            
            <a href="<?= url_to('industries') ?>" class="block px-3 py-2.5 text-sm font-semibold rounded-lg <?= url_is('industries*') ? 'text-primary bg-primary/10 border border-primary/20' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Industries</a>
            <a href="<?= base_url('locations') ?>" class="block px-3 py-2.5 text-sm font-semibold rounded-lg <?= url_is('locations*') ? 'text-primary bg-primary/10 border border-primary/20' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Locations</a>
            <a href="<?= url_to('portfolio') ?>" class="block px-3 py-2.5 text-sm font-semibold rounded-lg <?= url_is('portfolio') ? 'text-primary bg-primary/10 border border-primary/20' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Portfolio</a>
            <a href="<?= url_to('case-studies') ?>" class="block px-3 py-2.5 text-sm font-semibold rounded-lg <?= url_is('case-studies') ? 'text-primary bg-primary/10 border border-primary/20' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Case Studies</a>
            <a href="<?= url_to('blog') ?>" class="block px-3 py-2.5 text-sm font-semibold rounded-lg <?= url_is('blog') ? 'text-primary bg-primary/10 border border-primary/20' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Blog</a>
            
            <div class="pt-4 pb-2 border-t border-border mt-4 space-y-3">
                <!-- Mobile Theme Toggle -->
                <button id="mobile-theme-toggle" type="button" class="w-full flex items-center justify-between px-3 py-2.5 text-sm font-semibold rounded-lg text-text-muted hover:text-text hover:bg-surface transition-colors border border-border/50" aria-label="Toggle Dark Mode">
                    <span>Theme Mode</span>
                    <span class="flex items-center gap-2 text-xs font-mono">
                        <span id="mobile-theme-label" class="text-text-muted"></span>
                        <svg id="mobile-dark-icon" class="w-4 h-4 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="mobile-light-icon" class="w-4 h-4 hidden" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 1.364a1 1 0 011.415 0l.707.707a1 1 0 01-1.414 1.415l-.707-.707a1 1 0 010-1.415zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM15.636 15.636a1 1 0 010 1.415l-.707.707a1 1 0 01-1.415-1.414l.707-.707a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-1.364a1 1 0 01-1.415 0l-.707-.707a1 1 0 011.414-1.415l.707.707a1 1 0 010 1.415zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zM4.364 4.364a1 1 0 010-1.415l.707-.707a1 1 0 011.414 1.415l-.707.707a1 1 0 01-1.415 0z" clip-rule="evenodd"></path></svg>
                    </span>
                </button>
                <a href="<?= url_to('contact') ?>" class="block w-full text-center btn-primary !py-3">Get a Free Consultation</a>
            </div>
        </div>
    </div>
</header>

<script>
(function() {
    function applyTheme() {
        var desktopBtn      = document.getElementById('theme-toggle');
        var desktopDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var desktopLightIcon= document.getElementById('theme-toggle-light-icon');

        var mobileBtn       = document.getElementById('mobile-theme-toggle');
        var mobileDarkIcon  = document.getElementById('mobile-dark-icon');
        var mobileLightIcon = document.getElementById('mobile-light-icon');
        var mobileLabel     = document.getElementById('mobile-theme-label');

        if (!desktopBtn || !desktopDarkIcon || !desktopLightIcon) return;

        function isDark() {
            return document.documentElement.classList.contains('dark');
        }

        function syncIcons() {
            if (isDark()) {
                desktopDarkIcon.classList.add('hidden');
                desktopLightIcon.classList.remove('hidden');
                desktopBtn.setAttribute('aria-label', 'Switch to light mode');
                if (mobileDarkIcon)  mobileDarkIcon.classList.add('hidden');
                if (mobileLightIcon) mobileLightIcon.classList.remove('hidden');
                if (mobileLabel)     mobileLabel.textContent = 'Dark Theme';
                if (mobileBtn)       mobileBtn.setAttribute('aria-label', 'Switch to light mode');
            } else {
                desktopDarkIcon.classList.remove('hidden');
                desktopLightIcon.classList.add('hidden');
                desktopBtn.setAttribute('aria-label', 'Switch to dark mode');
                if (mobileDarkIcon)  mobileDarkIcon.classList.remove('hidden');
                if (mobileLightIcon) mobileLightIcon.classList.add('hidden');
                if (mobileLabel)     mobileLabel.textContent = 'Light Theme';
                if (mobileBtn)       mobileBtn.setAttribute('aria-label', 'Switch to dark mode');
            }
        }

        function toggleTheme() {
            if (isDark()) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
            syncIcons();
        }

        syncIcons();

        desktopBtn.addEventListener('click', toggleTheme);
        if (mobileBtn) mobileBtn.addEventListener('click', toggleTheme);
    }

    applyTheme();

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', applyTheme);
    }
})();
</script>
