<header x-data="{ mobileMenuOpen: false }" class="fixed w-[96%] max-w-7xl left-1/2 -translate-x-1/2 top-4 z-50 transition-all duration-500 bg-surface/60 backdrop-blur-xl border border-border/50 shadow-glass-dark rounded-2xl" id="main-header">
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center relative group">
                <div class="absolute -inset-2 bg-primary/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                <a href="<?= url_to('home') ?>" class="relative text-2xl font-extrabold tracking-tighter text-text flex items-center gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-lg z-10">
                    <svg class="w-8 h-8 text-primary animate-pulse-glow" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1M4 7l2-1M4 7l2 1M4 7v2.5M12 21l-2-1m2 1l2-1m-2 1v-2.5M6 18l-2-1v-2.5M18 18l2-1v-2.5"></path>
                    </svg>
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-text to-text-muted">Ziibay Soft</span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-1 border border-border/50 bg-background/50 rounded-full px-2 py-1 shadow-inner backdrop-blur-md">
                <a href="<?= url_to('home') ?>" class="nav-item px-5 py-2 text-sm font-semibold transition-all duration-300 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('/') ? 'text-primary active' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Home</a>
                <a href="<?= url_to('about') ?>" class="nav-item px-5 py-2 text-sm font-semibold transition-all duration-300 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('about') ? 'text-primary active' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">About</a>
                
                <!-- Services Dropdown -->
                <div x-data="{ servicesMenuOpen: false }" @mouseenter="servicesMenuOpen = true" @mouseleave="servicesMenuOpen = false" class="relative group">
                    <button type="button" class="nav-item px-5 py-2 text-sm font-semibold transition-all duration-300 rounded-full flex items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('services*') ? 'text-primary active' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>" aria-haspopup="true" :aria-expanded="servicesMenuOpen">
                        Services
                        <svg class="ml-1.5 h-4 w-4 transform transition-transform duration-300 opacity-70" :class="{'rotate-180': servicesMenuOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    
                    <div x-show="servicesMenuOpen" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                         x-transition:leave="transition ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                         x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                         class="absolute top-full left-1/2 -translate-x-1/2 mt-4 w-72 glass-panel border border-border/40 rounded-2xl shadow-2xl overflow-hidden py-3"
                         style="display: none;">
                        <div class="px-4 pb-2 mb-2 border-b border-border/30">
                            <span class="text-xs font-bold uppercase tracking-wider text-primary">Core Capabilities</span>
                        </div>
                        <a href="<?= url_to('service-detail', 'web-development') ?>" class="block px-5 py-2.5 text-sm transition-all duration-300 <?= url_is('services/web-development') ? 'bg-primary/5 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-6' ?>">Web Development</a>
                        <a href="<?= url_to('service-detail', 'software-development') ?>" class="block px-5 py-2.5 text-sm transition-all duration-300 <?= url_is('services/software-development') ? 'bg-primary/5 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-6' ?>">Software Development</a>
                        <a href="<?= url_to('service-detail', 'app-development') ?>" class="block px-5 py-2.5 text-sm transition-all duration-300 <?= url_is('services/app-development') ? 'bg-primary/5 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-6' ?>">App Development</a>
                        <a href="<?= url_to('service-detail', 'seo') ?>" class="block px-5 py-2.5 text-sm transition-all duration-300 <?= url_is('services/seo') ? 'bg-primary/5 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-6' ?>">SEO Services</a>
                        <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="block px-5 py-2.5 text-sm transition-all duration-300 <?= url_is('services/social-media-management') ? 'bg-primary/5 text-primary' : 'text-text-muted hover:bg-surface hover:text-text hover:pl-6' ?>">Social Media Management</a>
                        <div class="border-t border-border/30 my-2"></div>
                        <a href="<?= url_to('services') ?>" class="block px-5 py-2 text-xs font-bold text-primary hover:text-primary-light transition-colors uppercase tracking-[0.15em] flex items-center group">
                            View All <span class="ml-2 transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                        </a>
                    </div>
                </div>
                
                <a href="<?= url_to('industries') ?>" class="nav-item px-5 py-2 text-sm font-semibold transition-all duration-300 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('industries*') ? 'text-primary active' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Industries</a>
                <a href="<?= base_url('locations') ?>" class="nav-item px-5 py-2 text-sm font-semibold transition-all duration-300 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('locations*') ? 'text-primary active' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Locations</a>
                <a href="<?= url_to('portfolio') ?>" class="nav-item px-5 py-2 text-sm font-semibold transition-all duration-300 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('portfolio') ? 'text-primary active' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Portfolio</a>
                <a href="<?= url_to('case-studies') ?>" class="nav-item px-5 py-2 text-sm font-semibold transition-all duration-300 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('case-studies') ? 'text-primary active' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Case Studies</a>
                <a href="<?= url_to('blog') ?>" class="nav-item px-5 py-2 text-sm font-semibold transition-all duration-300 rounded-full focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('blog') ? 'text-primary active' : 'text-text-muted hover:text-text hover:bg-surface-hover' ?>">Blog</a>
            </nav>

            <!-- CTA and Theme Switcher -->
            <div class="hidden lg:flex items-center space-x-5">
                <button id="theme-toggle" type="button" class="relative group text-text-muted hover:text-text focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-full p-2.5 transition-all duration-300 bg-surface/50 border border-border/50 shadow-sm hover:shadow-glow-primary hover:border-primary/30" aria-label="Toggle Dark Mode">
                    <div class="absolute inset-0 rounded-full bg-primary/10 scale-0 group-hover:scale-100 transition-transform duration-300 origin-center"></div>
                    <!-- Moon (Light Mode) -->
                    <svg id="theme-toggle-dark-icon" class="w-4 h-4 hidden relative z-10" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <!-- Sun (Dark Mode) -->
                    <svg id="theme-toggle-light-icon" class="w-4 h-4 hidden relative z-10" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 1.364a1 1 0 011.415 0l.707.707a1 1 0 01-1.414 1.415l-.707-.707a1 1 0 010-1.415zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM15.636 15.636a1 1 0 010 1.415l-.707.707a1 1 0 01-1.415-1.414l.707-.707a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-1.364a1 1 0 01-1.415 0l-.707-.707a1 1 0 011.414-1.415l.707.707a1 1 0 010 1.415zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zM4.364 4.364a1 1 0 010-1.415l.707-.707a1 1 0 011.414 1.415l-.707.707a1 1 0 01-1.415 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="<?= url_to('contact') ?>" class="btn-primary group">
                    <span>Get a Free Consultation</span>
                    <svg class="ml-2 w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                </a>
            </div>

            <!-- Mobile menu button -->
            <div class="lg:hidden flex items-center">
                <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="text-text-muted hover:text-text p-2 rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary" :aria-expanded="mobileMenuOpen" aria-controls="mobile-menu">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!mobileMenuOpen" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    <svg x-show="mobileMenuOpen" style="display: none;" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
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
         class="lg:hidden glass-panel-heavy border-b border-border absolute w-full"
         id="mobile-menu"
         style="display: none;">
        <div class="px-4 pt-2 pb-6 space-y-1 overflow-y-auto max-h-[calc(100vh-80px)]">
            <a href="<?= url_to('home') ?>" class="block px-3 py-3 text-base font-medium rounded-md <?= url_is('/') ? 'text-text bg-surface' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Home</a>
            <a href="<?= url_to('about') ?>" class="block px-3 py-3 text-base font-medium rounded-md <?= url_is('about') ? 'text-text bg-surface' : 'text-text-muted hover:text-text hover:bg-surface' ?>">About</a>
            
            <div x-data="{ servicesOpen: <?= url_is('services*') ? 'true' : 'false' ?> }" class="space-y-1">
                <button @click="servicesOpen = !servicesOpen" class="w-full flex justify-between items-center px-3 py-3 text-base font-medium rounded-md <?= url_is('services*') ? 'text-text bg-surface' : 'text-text-muted hover:text-text hover:bg-surface' ?>">
                    <span>Services</span>
                    <svg class="w-5 h-5 transition-transform duration-200" :class="{'rotate-180': servicesOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                </button>
                <div x-show="servicesOpen" class="pl-6 space-y-1 pb-2">
                    <a href="<?= url_to('service-detail', 'web-development') ?>" class="block px-3 py-2 text-sm <?= url_is('services/web-development') ? 'text-text font-medium' : 'text-text-muted hover:text-text' ?>">Web Development</a>
                    <a href="<?= url_to('service-detail', 'software-development') ?>" class="block px-3 py-2 text-sm <?= url_is('services/software-development') ? 'text-text font-medium' : 'text-text-muted hover:text-text' ?>">Software Development</a>
                    <a href="<?= url_to('service-detail', 'app-development') ?>" class="block px-3 py-2 text-sm <?= url_is('services/app-development') ? 'text-text font-medium' : 'text-text-muted hover:text-text' ?>">App Development</a>
                    <a href="<?= url_to('service-detail', 'seo') ?>" class="block px-3 py-2 text-sm <?= url_is('services/seo') ? 'text-text font-medium' : 'text-text-muted hover:text-text' ?>">SEO Services</a>
                    <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="block px-3 py-2 text-sm <?= url_is('services/social-media-management') ? 'text-text font-medium' : 'text-text-muted hover:text-text' ?>">Social Media Management</a>
                    <a href="<?= url_to('services') ?>" class="block px-3 py-2 text-sm text-primary font-medium hover:text-primary-light">All Services &rarr;</a>
                </div>
            </div>
            
            <a href="<?= url_to('industries') ?>" class="block px-3 py-3 text-base font-medium rounded-md <?= url_is('industries*') ? 'text-text bg-surface' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Industries</a>
            <a href="<?= base_url('locations') ?>" class="block px-3 py-3 text-base font-medium rounded-md <?= url_is('locations*') ? 'text-text bg-surface' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Locations</a>
            <a href="<?= url_to('portfolio') ?>" class="block px-3 py-3 text-base font-medium rounded-md <?= url_is('portfolio') ? 'text-text bg-surface' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Portfolio</a>
            <a href="<?= url_to('case-studies') ?>" class="block px-3 py-3 text-base font-medium rounded-md <?= url_is('case-studies') ? 'text-text bg-surface' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Case Studies</a>
            <a href="<?= url_to('blog') ?>" class="block px-3 py-3 text-base font-medium rounded-md <?= url_is('blog') ? 'text-text bg-surface' : 'text-text-muted hover:text-text hover:bg-surface' ?>">Blog</a>
            
            <div class="pt-4 pb-2 border-t border-border mt-4 space-y-3">
                <!-- Mobile Theme Toggle -->
                <button id="mobile-theme-toggle" type="button" class="w-full flex items-center justify-between px-3 py-3 text-base font-medium rounded-md text-text-muted hover:text-text hover:bg-surface transition-colors" aria-label="Toggle Dark Mode">
                    <span>Theme</span>
                    <span class="flex items-center gap-2 text-sm">
                        <span id="mobile-theme-label" class="text-text-muted"></span>
                        <svg id="mobile-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="mobile-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 1.364a1 1 0 011.415 0l.707.707a1 1 0 01-1.414 1.415l-.707-.707a1 1 0 010-1.415zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM15.636 15.636a1 1 0 010 1.415l-.707.707a1 1 0 01-1.415-1.414l.707-.707a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-1.364a1 1 0 01-1.415 0l-.707-.707a1 1 0 011.414-1.415l.707.707a1 1 0 010 1.415zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zM4.364 4.364a1 1 0 010-1.415l.707-.707a1 1 0 011.414 1.415l-.707.707a1 1 0 01-1.415 0z" clip-rule="evenodd"></path></svg>
                    </span>
                </button>
                <a href="<?= url_to('contact') ?>" class="block w-full text-center btn-primary">Get a Free Consultation</a>
            </div>
        </div>
    </div>
</header>

<script>
(function() {
    function applyTheme() {
        // Desktop elements
        var desktopBtn      = document.getElementById('theme-toggle');
        var desktopDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var desktopLightIcon= document.getElementById('theme-toggle-light-icon');

        // Mobile elements
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
                // Currently dark → show SUN icon (click = switch to light)
                desktopDarkIcon.classList.add('hidden');
                desktopLightIcon.classList.remove('hidden');
                desktopBtn.setAttribute('aria-label', 'Switch to light mode');
                if (mobileDarkIcon)  mobileDarkIcon.classList.add('hidden');
                if (mobileLightIcon) mobileLightIcon.classList.remove('hidden');
                if (mobileLabel)     mobileLabel.textContent = 'Dark';
                if (mobileBtn)       mobileBtn.setAttribute('aria-label', 'Switch to light mode');
            } else {
                // Currently light → show MOON icon (click = switch to dark)
                desktopDarkIcon.classList.remove('hidden');
                desktopLightIcon.classList.add('hidden');
                desktopBtn.setAttribute('aria-label', 'Switch to dark mode');
                if (mobileDarkIcon)  mobileDarkIcon.classList.remove('hidden');
                if (mobileLightIcon) mobileLightIcon.classList.add('hidden');
                if (mobileLabel)     mobileLabel.textContent = 'Light';
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

        // Sync icons immediately
        syncIcons();

        // Attach click listeners
        desktopBtn.addEventListener('click', toggleTheme);
        if (mobileBtn) mobileBtn.addEventListener('click', toggleTheme);
    }

    // Run immediately (script is after header HTML so elements exist)
    applyTheme();

    // Also run on DOMContentLoaded as a safety net for deferred rendering
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', applyTheme);
    }
})();
</script>
<style type="text/tailwindcss">
/* Reusable Button System */
.btn-primary {
    @apply inline-flex items-center justify-center px-6 py-2.5 rounded-lg text-sm font-semibold text-text bg-primary hover:bg-primary-hover transition-all duration-300 shadow-[0_0_15px_var(--primary-glow)] hover:shadow-[0_0_25px_var(--primary-glow)] focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-background focus-visible:ring-primary disabled:opacity-50 disabled:cursor-not-allowed hover:-translate-y-0.5;
}
.btn-secondary {
    @apply inline-flex items-center justify-center px-6 py-2.5 rounded-lg text-sm font-semibold text-text bg-surface/50 backdrop-blur-md border border-border hover:bg-surface hover:border-primary/50 transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-background focus-visible:ring-border disabled:opacity-50 hover:-translate-y-0.5 hover:shadow-[0_0_15px_var(--primary-glow)];
}
.btn-ghost {
    @apply inline-flex items-center justify-center px-6 py-2.5 rounded-lg text-sm font-semibold text-text-muted hover:text-text hover:bg-surface transition-all duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:opacity-50 hover:-translate-y-0.5;
}
</style>
