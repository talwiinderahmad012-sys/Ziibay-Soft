<footer class="bg-navy section-frame mt-24 mb-6">
    <div class="max-w-7xl mx-auto px-6 py-20 relative">
        <!-- Optional S8 CTA part - Can be conditionally displayed if needed, but we'll include it for the global footer to match S8 -->
        <div class="text-center mb-24 reveal-blur">
            <div class="eyebrow">TURN AMBITIOUS IDEAS INTO POWERFUL SOFTWARE</div>
            <h2 class="mb-10 text-mist">want software? let's create!</h2>
            <a href="<?= url_to('contact') ?>" class="btn">
                <span class="arrow mr-2">&rarr;</span> GET A FREE CONSULTATION
            </a>
        </div>

        <!-- Footer Columns -->
        <div class="grid grid-cols-2 md:grid-cols-5 gap-8 mb-16 hairline-t pt-16">
            <div>
                <h4 class="font-mono-tag text-[10px] text-mist mb-6 opacity-70">CORE SERVICES</h4>
                <ul class="space-y-4 text-xs font-sans text-mist">
                    <li><a href="<?= url_to('service-detail', 'web-development') ?>" class="hover:text-white transition-colors">Web Development</a></li>
                    <li><a href="<?= url_to('service-detail', 'software-development') ?>" class="hover:text-white transition-colors">Software Development</a></li>
                    <li><a href="<?= url_to('service-detail', 'app-development') ?>" class="hover:text-white transition-colors">App Development</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-mono-tag text-[10px] text-mist mb-6 opacity-70">GROWTH</h4>
                <ul class="space-y-4 text-xs font-sans text-mist">
                    <li><a href="<?= url_to('service-detail', 'seo') ?>" class="hover:text-white transition-colors">SEO Services</a></li>
                    <li><a href="<?= url_to('service-detail', 'social-media-management') ?>" class="hover:text-white transition-colors">Social Media Management</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-mono-tag text-[10px] text-mist mb-6 opacity-70">COMPANY</h4>
                <ul class="space-y-4 text-xs font-sans text-mist">
                    <li><a href="<?= url_to('about') ?>" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="<?= url_to('portfolio') ?>" class="hover:text-white transition-colors">Portfolio</a></li>
                    <li><a href="<?= url_to('case-studies') ?>" class="hover:text-white transition-colors">Case Studies</a></li>
                    <li><a href="<?= url_to('blog') ?>" class="hover:text-white transition-colors">Insights & Blog</a></li>
                    <li><a href="<?= url_to('faq') ?>" class="hover:text-white transition-colors">FAQ</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-mono-tag text-[10px] text-mist mb-6 opacity-70">SECTORS</h4>
                <ul class="space-y-4 text-xs font-sans text-mist">
                    <li><a href="<?= url_to('industries') ?>" class="hover:text-white transition-colors">Industries Index</a></li>
                    <li><a href="<?= url_to('services') ?>" class="hover:text-white transition-colors">All Capabilities</a></li>
                    <li><a href="<?= base_url('search') ?>" class="hover:text-white transition-colors">Knowledge Search</a></li>
                    <li><a href="<?= url_to('contact') ?>" class="hover:text-white transition-colors flex items-center group">
                        Contact Engineering <span class="ml-1 transition-transform group-hover:translate-x-1">&rarr;</span>
                    </a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-mono-tag text-[10px] text-mist mb-6 opacity-70">LOCATIONS</h4>
                <ul class="space-y-4 text-xs font-sans text-mist">
                    <li><a href="<?= base_url('locations') ?>" class="hover:text-white transition-colors">All Locations</a></li>
                    <li><a href="<?= base_url('locations/united-states') ?>" class="hover:text-white transition-colors">United States</a></li>
                    <li><a href="<?= base_url('locations/united-kingdom') ?>" class="hover:text-white transition-colors">United Kingdom</a></li>
                    <li><a href="<?= base_url('locations/australia') ?>" class="hover:text-white transition-colors">Australia</a></li>
                </ul>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center text-[10px] font-mono text-mist opacity-70 hairline-t pt-8">
            <p>&copy; <?= date('Y') ?> Ziibay Soft. All rights reserved. Precision software engineering.</p>
            <div class="flex space-x-4 mt-4 md:mt-0">
                <a href="<?= base_url('privacy') ?>" class="hover:text-white">Privacy Policy</a>
                <a href="<?= base_url('terms') ?>" class="hover:text-white">Terms of Service</a>
            </div>
        </div>
        
        <!-- Optional Closing Frame: Retro Mac -->
        <?php if(url_is('/')): ?>
        <div class="absolute bottom-8 right-8 hidden lg:block opacity-50 hover:opacity-100 transition-opacity">
            <div class="w-16 h-16 bg-mist rounded-md flex items-center justify-center relative">
                <div class="w-12 h-10 bg-navy rounded crt-text text-[6px] p-1 overflow-hidden">
                    _ <br><span class="crt-cursor w-[4px] h-[6px]"></span>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</footer>
