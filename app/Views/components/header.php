<header class="fixed top-0 left-0 w-full z-50 p-4 transition-all duration-300" id="main-header" x-data="{ mobileMenuOpen: false }">
    <div class="max-w-7xl mx-auto flex justify-between items-center bg-paper/80 backdrop-blur-md rounded-lg p-2 hairline">
        <!-- Left Logo -->
        <a href="<?= url_to('home') ?>" class="chip text-ink hover:text-ink">
            <span class="mr-2">[\u2318]</span> ZIIBAY SOFT
        </a>
        
        <!-- Center Nav -->
        <nav class="hidden lg:flex space-x-2">
            <a href="<?= url_to('home') ?>" class="chip hover:bg-ink hover:text-paper">HOME</a>
            
            <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                <a href="<?= url_to('services') ?>" class="chip hover:bg-ink hover:text-paper flex items-center">
                    SERVICES <span class="ml-1 text-[10px]">&#9662;</span>
                </a>
                <div x-show="open" 
                     x-transition.opacity
                     class="absolute top-full mt-2 left-0 w-48 bg-paper hairline rounded-md shadow-lg p-2 flex flex-col gap-1"
                     style="display: none;">
                    <a href="<?= url_to('service-detail', 'web-development') ?>" class="chip hover:bg-ink hover:text-paper w-full text-left justify-start">WEB DEV</a>
                    <a href="<?= url_to('service-detail', 'software-development') ?>" class="chip hover:bg-ink hover:text-paper w-full text-left justify-start">SOFTWARE</a>
                    <a href="<?= url_to('service-detail', 'app-development') ?>" class="chip hover:bg-ink hover:text-paper w-full text-left justify-start">APP DEV</a>
                    <a href="<?= url_to('service-detail', 'seo') ?>" class="chip hover:bg-ink hover:text-paper w-full text-left justify-start">SEO</a>
                    <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="chip hover:bg-ink hover:text-paper w-full text-left justify-start">SOCIAL</a>
                </div>
            </div>
            
            <a href="<?= url_to('portfolio') ?>" class="chip hover:bg-ink hover:text-paper">PORTFOLIO</a>
            <a href="<?= url_to('blog') ?>" class="chip hover:bg-ink hover:text-paper">BLOG</a>
        </nav>
        
        <!-- Right CTA -->
        <a href="<?= url_to('contact') ?>" class="chip bg-ink text-paper hover:bg-mist hover:text-navy group hidden md:inline-flex">
            <span class="arrow inline-block transition-transform group-hover:translate-x-1 mr-2">&rarr;</span> GET A FREE CONSULTATION
        </a>

        <!-- Mobile Menu Toggle -->
        <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="chip lg:hidden">
            <span x-show="!mobileMenuOpen">MENU</span>
            <span x-show="mobileMenuOpen" style="display:none;">CLOSE</span>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" x-transition.opacity class="lg:hidden absolute top-full left-4 right-4 mt-2 bg-paper hairline rounded-lg p-4 flex flex-col gap-2" style="display: none;">
        <a href="<?= url_to('home') ?>" class="chip w-full justify-center">HOME</a>
        <a href="<?= url_to('services') ?>" class="chip w-full justify-center">SERVICES</a>
        <a href="<?= url_to('portfolio') ?>" class="chip w-full justify-center">PORTFOLIO</a>
        <a href="<?= url_to('blog') ?>" class="chip w-full justify-center">BLOG</a>
        <a href="<?= url_to('contact') ?>" class="chip w-full justify-center bg-ink text-paper">GET A FREE CONSULTATION</a>
    </div>
</header>
