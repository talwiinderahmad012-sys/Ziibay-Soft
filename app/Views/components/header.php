<header x-data="{ mobileMenuOpen: false }" class="fixed w-full z-50 transition-all duration-300 bg-surface/80 backdrop-blur-md border-b border-border/50 shadow-sm" id="main-header">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex-shrink-0 flex items-center">
                <a href="<?= url_to('home') ?>" class="text-2xl font-bold text-text tracking-tight flex items-center gap-2 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-lg">
                    <svg class="w-8 h-8 text-primary" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2L2 22h20L12 2zm0 3.8l7.1 14.2H4.9L12 5.8z"/></svg>
                    Ziibay Soft
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center space-x-2">
                <a href="<?= url_to('home') ?>" class="px-4 py-2 text-sm font-medium transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('/') ? 'text-text bg-surface-hover' : 'text-text-muted hover:text-text' ?>">Home</a>
                <a href="<?= url_to('about') ?>" class="px-4 py-2 text-sm font-medium transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('about') ? 'text-text bg-surface-hover' : 'text-text-muted hover:text-text' ?>">About</a>
                
                <!-- Services Dropdown -->
                <div x-data="{ servicesMenuOpen: false }" @mouseenter="servicesMenuOpen = true" @mouseleave="servicesMenuOpen = false" class="relative group">
                    <button type="button" class="px-4 py-2 text-sm font-medium transition-colors rounded-md flex items-center focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('services*') ? 'text-text bg-surface-hover' : 'text-text-muted hover:text-text' ?>" aria-haspopup="true" :aria-expanded="servicesMenuOpen">
                        Services
                        <svg class="ml-1 h-4 w-4 transform transition-transform duration-200" :class="{'rotate-180': servicesMenuOpen}" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                    </button>
                    
                    <div x-show="servicesMenuOpen" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute top-full left-0 mt-1 w-64 glass-panel rounded-xl shadow-xl overflow-hidden py-2"
                         style="display: none;">
                        <a href="<?= url_to('service-detail', 'web-development') ?>" class="block px-4 py-3 text-sm transition-colors <?= url_is('services/web-development') ? 'bg-surface-hover text-text' : 'text-text-muted hover:bg-surface-hover hover:text-text' ?>">Web Development</a>
                        <a href="<?= url_to('service-detail', 'software-development') ?>" class="block px-4 py-3 text-sm transition-colors <?= url_is('services/software-development') ? 'bg-surface-hover text-text' : 'text-text-muted hover:bg-surface-hover hover:text-text' ?>">Software Development</a>
                        <a href="<?= url_to('service-detail', 'app-development') ?>" class="block px-4 py-3 text-sm transition-colors <?= url_is('services/app-development') ? 'bg-surface-hover text-text' : 'text-text-muted hover:bg-surface-hover hover:text-text' ?>">App Development</a>
                        <a href="<?= url_to('service-detail', 'seo') ?>" class="block px-4 py-3 text-sm transition-colors <?= url_is('services/seo') ? 'bg-surface-hover text-text' : 'text-text-muted hover:bg-surface-hover hover:text-text' ?>">SEO Services</a>
                        <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="block px-4 py-3 text-sm transition-colors <?= url_is('services/social-media-management') ? 'bg-surface-hover text-text' : 'text-text-muted hover:bg-surface-hover hover:text-text' ?>">Social Media Management</a>
                        <div class="border-t border-border my-1"></div>
                        <a href="<?= url_to('services') ?>" class="block px-4 py-2 text-xs font-semibold text-primary hover:text-primary-light transition-colors uppercase tracking-wider">View All Services &rarr;</a>
                    </div>
                </div>
                
                <a href="<?= url_to('industries') ?>" class="px-4 py-2 text-sm font-medium transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('industries*') ? 'text-text bg-surface-hover' : 'text-text-muted hover:text-text' ?>">Industries</a>
                <a href="<?= url_to('portfolio') ?>" class="px-4 py-2 text-sm font-medium transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('portfolio') ? 'text-text bg-surface-hover' : 'text-text-muted hover:text-text' ?>">Portfolio</a>
                <a href="<?= url_to('case-studies') ?>" class="px-4 py-2 text-sm font-medium transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('case-studies') ? 'text-text bg-surface-hover' : 'text-text-muted hover:text-text' ?>">Case Studies</a>
                <a href="<?= url_to('blog') ?>" class="px-4 py-2 text-sm font-medium transition-colors rounded-md focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary <?= url_is('blog') ? 'text-text bg-surface-hover' : 'text-text-muted hover:text-text' ?>">Blog</a>
            </nav>

            <!-- CTA and Theme Switcher -->
            <div class="hidden lg:flex items-center space-x-4">
                <button id="theme-toggle" type="button" class="text-text-muted hover:text-text focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary rounded-md p-2 transition-colors" aria-label="Toggle Dark Mode">
                    <!-- Moon (Light Mode) -->
                    <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <!-- Sun (Dark Mode) -->
                    <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4.22 1.364a1 1 0 011.415 0l.707.707a1 1 0 01-1.414 1.415l-.707-.707a1 1 0 010-1.415zM18 10a1 1 0 01-1 1h-1a1 1 0 110-2h1a1 1 0 011 1zM15.636 15.636a1 1 0 010 1.415l-.707.707a1 1 0 01-1.415-1.414l.707-.707a1 1 0 011.415 0zM10 16a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4.22-1.364a1 1 0 01-1.415 0l-.707-.707a1 1 0 011.414-1.415l.707.707a1 1 0 010 1.415zM2 10a1 1 0 011-1h1a1 1 0 110 2H3a1 1 0 01-1-1zM4.364 4.364a1 1 0 010-1.415l.707-.707a1 1 0 011.414 1.415l-.707.707a1 1 0 01-1.415 0z" clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="<?= url_to('contact') ?>" class="btn-primary">
                    Get a Free Consultation
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
    // Desktop elements
    const desktopBtn = document.getElementById('theme-toggle');
    const desktopDarkIcon = document.getElementById('theme-toggle-dark-icon');
    const desktopLightIcon = document.getElementById('theme-toggle-light-icon');

    // Mobile elements
    const mobileBtn = document.getElementById('mobile-theme-toggle');
    const mobileDarkIcon = document.getElementById('mobile-dark-icon');
    const mobileLightIcon = document.getElementById('mobile-light-icon');
    const mobileLabel = document.getElementById('mobile-theme-label');

    function isDark() {
        return document.documentElement.classList.contains('dark');
    }

    function syncIcons() {
        if (isDark()) {
            // Show sun icons (to switch to light)
            desktopDarkIcon.classList.add('hidden');
            desktopLightIcon.classList.remove('hidden');
            mobileDarkIcon.classList.add('hidden');
            mobileLightIcon.classList.remove('hidden');
            mobileLabel.textContent = 'Dark';
        } else {
            // Show moon icons (to switch to dark)
            desktopDarkIcon.classList.remove('hidden');
            desktopLightIcon.classList.add('hidden');
            mobileDarkIcon.classList.remove('hidden');
            mobileLightIcon.classList.add('hidden');
            mobileLabel.textContent = 'Light';
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

    // Initialize icons
    syncIcons();

    // Attach listeners
    desktopBtn.addEventListener('click', toggleTheme);
    mobileBtn.addEventListener('click', toggleTheme);
})();
</script>
<style type="text/tailwindcss">
/* Reusable Button System */
.btn-primary {
    @apply inline-flex items-center justify-center px-6 py-2.5 rounded-lg text-sm font-semibold text-text bg-primary hover:bg-primary-hover transition-all duration-200 glow-primary focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-background focus-visible:ring-primary disabled:opacity-50 disabled:cursor-not-allowed;
}
.btn-secondary {
    @apply inline-flex items-center justify-center px-6 py-2.5 rounded-lg text-sm font-semibold text-text bg-surface border border-border hover:bg-surface-hover hover:border-text-muted transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-offset-background focus-visible:ring-border disabled:opacity-50;
}
.btn-ghost {
    @apply inline-flex items-center justify-center px-6 py-2.5 rounded-lg text-sm font-semibold text-text-muted hover:text-text hover:bg-surface transition-all duration-200 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary disabled:opacity-50;
}
</style>
