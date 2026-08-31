<?= $this->extend('layouts/main') ?>

<?= $this->section('head') ?>
    <style>
        /* Home Specific Styles */
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- S1. HERO (paper) -->
<section class="section-frame min-h-[90vh] flex flex-col items-center justify-center relative overflow-hidden mt-24">
    <div class="corner-stat tl">
        <div class="val">( 05 )</div>
        <div class="lbl">core services offered</div>
    </div>
    <div class="corner-stat tr">
        <div class="val">( 03 )</div>
        <div class="lbl">countries served &mdash; US &middot; UK &middot; AU</div>
    </div>
    <div class="corner-stat bl">
        <div class="val">( v2.0 )</div>
        <div class="lbl">engineering system</div>
    </div>
    <div class="corner-stat br">
        <div class="val">( 100% )</div>
        <div class="lbl">scalable &amp; secure builds</div>
    </div>
    
    <!-- 3D Retro Computer -->
    <div class="mb-16 relative z-10 w-64 h-64 mx-auto rise" style="perspective: 1000px;">
        <!-- Simulated clay Macintosh -->
        <div class="w-full h-full bg-[#E2E2DF] rounded-xl shadow-[0_20px_50px_rgba(0,0,0,0.1),inset_0_2px_5px_rgba(255,255,255,0.7)] flex flex-col p-4 border border-[#D1D1CE] transform rotate-y-[-10deg] rotate-x-[5deg]">
            <div class="flex-grow bg-navy rounded-lg p-3 overflow-hidden relative shadow-[inset_0_0_20px_rgba(0,0,0,0.8)] border-4 border-[#C1C1BE]">
                <div class="crt-text text-[9px] leading-relaxed font-mono-tag lowercase" id="hero-typing"></div>
                <div class="absolute inset-0 bg-mist opacity-[0.03] pointer-events-none"></div>
            </div>
            <div class="h-4 mt-3 flex justify-between items-center px-2">
                <div class="flex space-x-1"><div class="w-1 h-3 bg-mist opacity-30 rounded-full"></div><div class="w-1 h-3 bg-mist opacity-30 rounded-full"></div></div>
                <div class="w-2 h-2 rounded-full bg-crt shadow-[0_0_5px_var(--crt)]"></div>
            </div>
        </div>
    </div>
    
    <div class="w-full max-w-4xl mx-auto hairline-b relative mb-12">
        <div class="absolute left-1/2 -translate-x-1/2 -translate-y-1/2 bg-paper px-4 font-mono-tag text-[10px] tracking-widest text-ink">
            DISCOVER HOW ZIIBAY SOFT ENGINEERS GROWTH
        </div>
    </div>
    
    <div class="text-center reveal-blur px-4 max-w-3xl mx-auto z-10">
        <div class="chip mb-8">DIGITAL ENGINEERING STUDIO</div>
        <h1 class="mb-8">architecting high-performance<br>software solutions</h1>
        <p class="font-sans text-ink opacity-80 mb-10 leading-relaxed text-lg">
            We build scalable, secure, and modern digital platforms for ambitious international brands. From complex enterprise software to engaging mobile applications.
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="<?= url_to('contact') ?>" class="btn">
                <span class="arrow mr-2">&rarr;</span> GET A FREE CONSULTATION
            </a>
            <a href="<?= url_to('services') ?>" class="btn">
                EXPLORE CAPABILITIES
            </a>
        </div>
    </div>
    
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-ink opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path></svg>
    </div>
</section>

<!-- S2. WHY CHOOSE (paper) -->
<section class="py-32 relative">
    <!-- Connected boxes top -->
    <div class="max-w-7xl mx-auto px-6 relative mb-24">
        <div class="absolute top-0 left-6 right-6 hairline-t"></div>
        <div class="flex justify-between -mt-3">
            <div class="bg-paper px-4 flex items-center gap-2">
                <div class="w-1 h-4 hairline-r"></div>
                <span class="font-mono-tag text-xs">( Scalable )</span>
                <span class="font-sans text-[10px] uppercase tracking-widest opacity-60 mt-0.5">future-proof codebases</span>
            </div>
            <div class="bg-paper px-4 flex items-center gap-2">
                <span class="font-sans text-[10px] uppercase tracking-widest opacity-60 mt-0.5">Core Web Vitals</span>
                <span class="font-mono-tag text-xs">( Optimized )</span>
                <div class="w-1 h-4 hairline-l"></div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-20 reveal-blur">
            <div class="eyebrow">WHERE AND HOW WE ENGINEER VALUE</div>
            <h2>built for performance</h2>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="section-frame p-10 flex flex-col rise" style="transition-delay: 100ms;">
                <div class="w-20 h-20 mb-8 bg-[#E2E2DF] rounded-lg shadow-inner flex items-center justify-center border border-[#D1D1CE]">
                    <!-- Abstract Server Stack -->
                    <div class="w-10 h-10 flex flex-col gap-1 justify-center items-center">
                        <div class="w-8 h-2 bg-mist rounded-sm"></div>
                        <div class="w-8 h-2 bg-mist rounded-sm"></div>
                        <div class="w-8 h-2 bg-mist rounded-sm"></div>
                    </div>
                </div>
                <h3 class="font-sans font-semibold text-xl mb-4 text-ink">Scalable Architecture</h3>
                <p class="font-sans text-sm opacity-70 mb-12 flex-grow leading-relaxed">
                    Future-proof codebases designed to grow with your business, handling increased traffic and complexity seamlessly.
                </p>
                <div class="font-serif-display text-6xl text-ink opacity-20">01</div>
            </div>
            
            <!-- Card 2 -->
            <div class="section-frame p-10 flex flex-col rise" style="transition-delay: 250ms;">
                <div class="w-20 h-20 mb-8 bg-[#E2E2DF] rounded-lg shadow-inner flex items-center justify-center border border-[#D1D1CE]">
                    <!-- Abstract Speed Gauge/Bolt -->
                    <div class="w-8 h-10 border-2 border-mist rounded flex items-center justify-center rotate-12">
                        <div class="w-1 h-6 bg-crt"></div>
                    </div>
                </div>
                <h3 class="font-sans font-semibold text-xl mb-4 text-ink">High Performance</h3>
                <p class="font-sans text-sm opacity-70 mb-12 flex-grow leading-relaxed">
                    Optimized for Core Web Vitals, blazing-fast load times, and seamless user experiences across all devices.
                </p>
                <div class="font-serif-display text-6xl text-ink opacity-20">02</div>
            </div>
            
            <!-- Card 3 -->
            <div class="section-frame p-10 flex flex-col rise" style="transition-delay: 400ms;">
                <div class="w-20 h-20 mb-8 bg-[#E2E2DF] rounded-lg shadow-inner flex items-center justify-center border border-[#D1D1CE]">
                    <!-- Abstract Chip Stack -->
                    <div class="w-10 h-10 border-2 border-mist rounded relative">
                        <div class="absolute inset-2 border border-mist"></div>
                    </div>
                </div>
                <h3 class="font-sans font-semibold text-xl mb-4 text-ink">Modern Tech Stack</h3>
                <p class="font-sans text-sm opacity-70 mb-12 flex-grow leading-relaxed">
                    Leveraging the latest frameworks and secure technologies to deliver robust, maintainable digital products.
                </p>
                <div class="font-serif-display text-6xl text-ink opacity-20">03</div>
            </div>
        </div>
    </div>
</section>

<!-- S3. GLOBAL DELIVERY (navy) -->
<section class="bg-navy section-frame overflow-hidden relative min-h-[90vh] flex flex-col items-center justify-center py-32">
    <div class="corner-stat tr text-mist">
        <div class="val">( 03 )</div>
        <div class="lbl">international delivery hubs</div>
    </div>
    
    <div class="text-center relative z-20 reveal-blur mb-16 mt-16">
        <div class="eyebrow text-mist">WHERE ZIIBAY SOFT DELIVERS &mdash; 2026</div>
        <h2 class="text-mist">global delivery</h2>
    </div>
    
    <!-- 3D Orbit -->
    <div class="relative w-full max-w-3xl aspect-square mx-auto flex items-center justify-center my-10 z-10 rise">
        <div class="w-40 h-40 bg-gradient-to-br from-mist to-crt rounded-full shadow-[0_0_60px_rgba(89,167,220,0.4)] relative z-20 flex items-center justify-center">
            <!-- Globe lines -->
            <div class="absolute inset-0 border border-white/20 rounded-full rotate-45 scale-90"></div>
            <div class="absolute inset-0 border border-white/20 rounded-full -rotate-45 scale-90"></div>
        </div>
        
        <div class="orbit-ring">
            <div class="orbit-chip-wrapper" style="animation-delay: -0s;">
                <div class="orbit-chip chip text-[10px] text-white !border-mist/50">UNITED STATES</div>
            </div>
            <div class="orbit-chip-wrapper" style="animation-delay: -5s;">
                <div class="orbit-chip chip text-[10px] text-white !border-mist/50">UNITED KINGDOM</div>
            </div>
            <div class="orbit-chip-wrapper" style="animation-delay: -10s;">
                <div class="orbit-chip chip text-[10px] text-white !border-mist/50">AUSTRALIA</div>
            </div>
            <div class="orbit-chip-wrapper" style="animation-delay: -15s;">
                <div class="orbit-chip chip text-[10px] text-white !border-mist/50">WORLDWIDE</div>
            </div>
        </div>
    </div>
    
    <div class="relative z-20 mt-8 reveal-blur">
        <a href="<?= base_url('locations') ?>" class="btn">
            <span class="arrow mr-2">&rarr;</span> EXPLORE LOCATIONS
        </a>
    </div>
</section>

<!-- S4. CORE CAPABILITIES (navy) -->
<section class="bg-navy section-frame py-32 px-6 flex flex-col">
    <div class="text-center mb-20 reveal-blur">
        <div class="eyebrow text-mist">CORE CAPABILITIES</div>
        <h2 class="text-mist mb-6">premium development services</h2>
        <p class="font-sans text-mist opacity-80 max-w-2xl mx-auto">
            End-to-end development services tailored to your operational needs.
        </p>
    </div>
    
    <div class="flex flex-col md:flex-row h-[600px] w-full max-w-7xl mx-auto hairline rounded-lg overflow-hidden rise">
        <!-- 1 -->
        <div class="expand-card p-6 flex flex-col relative group">
            <div class="chip text-mist border-mist/30 w-fit mb-auto">WEB</div>
            
            <div class="expand-content absolute inset-x-6 top-24 bottom-32 flex flex-col items-center justify-center">
                <div class="w-32 h-32 bg-[#E2E2DF] rounded border border-[#D1D1CE] mb-6 flex items-center justify-center opacity-80 mix-blend-luminosity">
                    <div class="w-16 h-12 border-2 border-navy rounded flex flex-col">
                        <div class="h-3 border-b-2 border-navy"></div>
                    </div>
                </div>
                <p class="font-sans text-xs text-mist opacity-80 text-center leading-relaxed">
                    Custom, high-performance web applications, enterprise portals, and robust backend systems built for scale and security.
                </p>
                <a href="<?= url_to('service-detail', 'web-development') ?>" class="font-mono-tag text-[10px] text-crt mt-6 hover:underline">EXPLORE SERVICE &rarr;</a>
            </div>
            
            <div class="expand-card-title mt-auto text-mist font-serif-display text-5xl">/01</div>
        </div>
        
        <!-- 2 -->
        <div class="expand-card p-6 flex flex-col relative group">
            <div class="chip text-mist border-mist/30 w-fit mb-auto">SOFTWARE</div>
            
            <div class="expand-content absolute inset-x-6 top-24 bottom-32 flex flex-col items-center justify-center">
                <div class="w-32 h-32 bg-[#E2E2DF] rounded border border-[#D1D1CE] mb-6 flex items-center justify-center opacity-80 mix-blend-luminosity">
                    <div class="w-12 h-12 border-2 border-navy flex flex-wrap"><div class="w-1/2 h-1/2 border-r-2 border-b-2 border-navy"></div></div>
                </div>
                <p class="font-sans text-xs text-mist opacity-80 text-center leading-relaxed">
                    Bespoke software solutions tailored to automate your workflows, manage data securely, and solve complex business challenges.
                </p>
                <a href="<?= url_to('service-detail', 'software-development') ?>" class="font-mono-tag text-[10px] text-crt mt-6 hover:underline">EXPLORE SERVICE &rarr;</a>
            </div>
            
            <div class="expand-card-title mt-auto text-mist font-serif-display text-5xl">/02</div>
        </div>
        
        <!-- 3 -->
        <div class="expand-card p-6 flex flex-col relative group">
            <div class="chip text-mist border-mist/30 w-fit mb-auto">APP</div>
            
            <div class="expand-content absolute inset-x-6 top-24 bottom-32 flex flex-col items-center justify-center">
                <div class="w-32 h-32 bg-[#E2E2DF] rounded border border-[#D1D1CE] mb-6 flex items-center justify-center opacity-80 mix-blend-luminosity">
                    <div class="w-10 h-16 border-2 border-navy rounded-md flex justify-center items-end p-1"><div class="w-2 h-2 rounded-full bg-navy"></div></div>
                </div>
                <p class="font-sans text-xs text-mist opacity-80 text-center leading-relaxed">
                    Native and cross-platform mobile applications designed for intuitive user experiences and high performance on iOS and Android.
                </p>
                <a href="<?= url_to('service-detail', 'app-development') ?>" class="font-mono-tag text-[10px] text-crt mt-6 hover:underline">EXPLORE SERVICE &rarr;</a>
            </div>
            
            <div class="expand-card-title mt-auto text-mist font-serif-display text-5xl">/03</div>
        </div>
        
        <!-- 4 -->
        <div class="expand-card p-6 flex flex-col relative group">
            <div class="chip text-mist border-mist/30 w-fit mb-auto">SEO</div>
            <div class="expand-content absolute inset-x-6 top-24 bottom-32 flex flex-col items-center justify-center">
                <p class="font-sans text-xs text-mist opacity-80 text-center leading-relaxed">
                    Data-driven SEO strategies to dominate search engine results and drive high-quality organic traffic.
                </p>
                <a href="<?= url_to('service-detail', 'seo') ?>" class="font-mono-tag text-[10px] text-crt mt-6 hover:underline">EXPLORE SERVICE &rarr;</a>
            </div>
            <div class="expand-card-title mt-auto text-mist font-serif-display text-5xl">/04</div>
        </div>
        
        <!-- 5 -->
        <div class="expand-card p-6 flex flex-col relative group">
            <div class="chip text-mist border-mist/30 w-fit mb-auto">SOCIAL</div>
            <div class="expand-content absolute inset-x-6 top-24 bottom-32 flex flex-col items-center justify-center">
                <p class="font-sans text-xs text-mist opacity-80 text-center leading-relaxed">
                    Engaging social media campaigns that build brand authority and foster community growth.
                </p>
                <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="font-mono-tag text-[10px] text-crt mt-6 hover:underline">EXPLORE SERVICE &rarr;</a>
            </div>
            <div class="expand-card-title mt-auto text-mist font-serif-display text-5xl">/05</div>
        </div>
    </div>
</section>

<!-- S5. GROWTH & INNOVATION (paper) -->
<section class="py-32 overflow-hidden bg-paper section-frame">
    <div class="text-center mb-16 reveal-blur">
        <div class="eyebrow">NEW STANDARDS FOR GROWTH</div>
        <h2>growth &amp; innovation</h2>
    </div>
    
    <div class="max-w-6xl mx-auto relative h-[500px]" x-data="{ slide: 1 }">
        <!-- Cards Container -->
        <div class="absolute inset-0 flex items-center justify-center perspective-1000">
            <!-- Left Card -->
            <div class="absolute w-[340px] h-[400px] bg-white hairline rounded-lg p-6 shadow-sm transition-all duration-500 flex flex-col"
                 :class="slide === 0 ? 'z-20 scale-100 translate-x-0 opacity-100' : (slide === 1 ? 'z-10 scale-90 -translate-x-[240px] opacity-40 cursor-pointer' : 'z-0 scale-75 -translate-x-[400px] opacity-0')"
                 @click="slide = 0">
                <div class="flex items-center gap-2 mb-6 font-mono-tag text-[10px] hairline-b pb-2"><span class="text-crt">&#8599;</span> GROWTH SERVICE</div>
                <h3 class="font-sans text-xl font-semibold text-ink mb-2">SEO Services</h3>
                <p class="font-sans text-xs text-ink opacity-70 flex-grow">Organic growth architecture and search performance.</p>
                <div class="w-full h-32 bg-mist/20 rounded mb-6 flex items-center justify-center">
                    <div class="w-16 h-16 bg-mist rounded-full rounded-tr-none rotate-45 mix-blend-multiply opacity-50"></div>
                </div>
                <a href="<?= url_to('service-detail', 'seo') ?>" class="font-mono-tag text-[10px] text-ink hover:text-crt hairline-t pt-4 block w-full">&rarr; EXPLORE SERVICE</a>
            </div>
            
            <!-- Center Card -->
            <div class="absolute w-[340px] h-[400px] bg-white hairline rounded-lg p-6 shadow-xl transition-all duration-500 flex flex-col"
                 :class="slide === 1 ? 'z-20 scale-100 translate-x-0 opacity-100' : (slide === 2 ? 'z-10 scale-90 -translate-x-[240px] opacity-40 cursor-pointer' : (slide === 0 ? 'z-10 scale-90 translate-x-[240px] opacity-40 cursor-pointer' : 'z-0 opacity-0'))"
                 @click="slide = 1">
                <div class="flex items-center gap-2 mb-6 font-mono-tag text-[10px] hairline-b pb-2"><span class="text-crt">&#8599;</span> GROWTH SERVICE</div>
                <h3 class="font-sans text-xl font-semibold text-ink mb-2">Social Media Management</h3>
                <p class="font-sans text-xs text-ink opacity-70 flex-grow">Audience engagement and brand distribution channels.</p>
                <div class="w-full h-32 bg-mist/20 rounded mb-6 flex items-center justify-center">
                    <div class="w-16 h-16 bg-mist rounded-tl-full rounded-br-full rotate-12 mix-blend-multiply opacity-50"></div>
                </div>
                <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="font-mono-tag text-[10px] text-ink hover:text-crt hairline-t pt-4 block w-full">&rarr; EXPLORE SERVICE</a>
            </div>
            
            <!-- Right Card -->
            <div class="absolute w-[340px] h-[400px] bg-white hairline rounded-lg p-6 shadow-sm transition-all duration-500 flex flex-col"
                 :class="slide === 2 ? 'z-20 scale-100 translate-x-0 opacity-100' : (slide === 1 ? 'z-10 scale-90 translate-x-[240px] opacity-40 cursor-pointer' : 'z-0 scale-75 translate-x-[400px] opacity-0')"
                 @click="slide = 2">
                <div class="flex items-center gap-2 mb-6 font-mono-tag text-[10px] hairline-b pb-2"><span class="text-crt">&#8599;</span> GROWTH SERVICE</div>
                <h3 class="font-sans text-xl font-semibold text-ink mb-2">All Capabilities</h3>
                <p class="font-sans text-xs text-ink opacity-70 flex-grow">Full spectrum of our engineering & growth offerings.</p>
                <div class="w-full h-32 bg-mist/20 rounded mb-6 flex items-center justify-center flex-wrap gap-2 p-4">
                    <div class="w-6 h-6 bg-mist rounded-full opacity-50"></div>
                    <div class="w-6 h-6 bg-mist rounded opacity-50"></div>
                    <div class="w-6 h-6 bg-mist rounded-tl-full opacity-50"></div>
                </div>
                <a href="<?= url_to('services') ?>" class="font-mono-tag text-[10px] text-ink hover:text-crt hairline-t pt-4 block w-full">&rarr; EXPLORE SERVICE</a>
            </div>
        </div>
        
        <!-- Controls -->
        <div class="absolute top-1/2 -translate-y-1/2 left-0 right-0 flex justify-between px-10 pointer-events-none z-30">
            <button @click="slide = Math.max(0, slide - 1)" :class="slide === 0 ? 'opacity-20' : 'hover:bg-ink hover:text-paper'" class="w-10 h-10 hairline bg-paper rounded flex items-center justify-center font-mono pointer-events-auto transition-colors">&larr;</button>
            <button @click="slide = Math.min(2, slide + 1)" :class="slide === 2 ? 'opacity-20' : 'hover:bg-ink hover:text-paper'" class="w-10 h-10 hairline bg-paper rounded flex items-center justify-center font-mono pointer-events-auto transition-colors">&rarr;</button>
        </div>
    </div>
    
    <div class="text-center mt-8 relative z-30">
        <a href="<?= url_to('services') ?>" class="btn">
            <span class="mr-2">+</span> VIEW ALL SERVICES
        </a>
    </div>
</section>

<!-- S6. ECOSYSTEM TREE (paper) -->
<section class="py-32 relative bg-paper overflow-hidden">
    <div class="text-center mb-24 reveal-blur relative z-20">
        <div class="eyebrow">THE ECOSYSTEM</div>
        <h2>where software gets its answers</h2>
    </div>
    
    <div class="max-w-5xl mx-auto relative h-[400px] flex flex-col items-center rise">
        <!-- Background ellipses -->
        <div class="absolute top-20 left-1/2 -translate-x-1/2 w-[800px] h-[300px] border border-mist/30 rounded-[100%]"></div>
        <div class="absolute top-24 left-1/2 -translate-x-1/2 w-[600px] h-[220px] border border-mist/20 rounded-[100%]"></div>
        
        <!-- Top Node -->
        <div class="chip bg-white z-20 mb-[120px]">ZS</div>
        
        <!-- Dashed connectors SVG -->
        <svg class="absolute top-8 left-0 w-full h-[300px] pointer-events-none z-10" viewBox="0 0 1000 300" preserveAspectRatio="none">
            <path class="eco-curve stroke-dash-draw" d="M500,20 Q200,150 100,200" />
            <path class="eco-curve stroke-dash-draw" d="M500,20 Q350,150 300,200" />
            <path class="eco-curve stroke-dash-draw" d="M500,20 L500,200" />
            <path class="eco-curve stroke-dash-draw" d="M500,20 Q650,150 700,200" />
            <path class="eco-curve stroke-dash-draw" d="M500,20 Q800,150 900,200" />
        </svg>
        
        <!-- Bottom Nodes -->
        <div class="flex justify-between w-full px-4 md:px-12 z-20">
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-white hairline rounded flex items-center justify-center mb-4"><span class="text-xs">&lt;/&gt;</span></div>
                <div class="font-mono-tag text-[10px]">WEB DEV</div>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-white hairline rounded flex items-center justify-center mb-4"><span class="text-xs">{}</span></div>
                <div class="font-mono-tag text-[10px]">SOFTWARE</div>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-white hairline rounded flex items-center justify-center mb-4"><span class="text-xs">[]</span></div>
                <div class="font-mono-tag text-[10px]">APP DEV</div>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-white hairline rounded flex items-center justify-center mb-4"><span class="text-xs">%%</span></div>
                <div class="font-mono-tag text-[10px]">SEO</div>
            </div>
            <div class="flex flex-col items-center">
                <div class="w-10 h-10 bg-white hairline rounded flex items-center justify-center mb-4"><span class="text-xs">@@</span></div>
                <div class="font-mono-tag text-[10px]">SOCIAL</div>
            </div>
        </div>
    </div>
    
    <div class="text-center mt-12 relative z-20 reveal-blur">
        <a href="<?= url_to('services') ?>" class="btn">
            <span class="mr-2">+</span> EXPLORE ALL CAPABILITIES
        </a>
    </div>
    
    <!-- Bottom connected boxes -->
    <div class="max-w-7xl mx-auto px-6 relative mt-32">
        <div class="absolute bottom-4 left-6 right-6 hairline-t"></div>
        <div class="flex justify-between relative z-10">
            <div class="bg-paper px-4 flex items-center gap-2">
                <div class="w-1 h-4 hairline-r"></div>
                <span class="font-mono-tag text-xs">( Portfolio )</span>
                <span class="font-sans text-[10px] uppercase tracking-widest opacity-60 mt-0.5">proof of engineering</span>
            </div>
            <div class="bg-paper px-4 flex items-center gap-2">
                <span class="font-sans text-[10px] uppercase tracking-widest opacity-60 mt-0.5">results in detail</span>
                <span class="font-mono-tag text-xs">( Case Studies )</span>
                <div class="w-1 h-4 hairline-l"></div>
            </div>
        </div>
    </div>
</section>

<!-- S7. CAPABILITIES CHART (paper) -->
<section class="py-32 bg-paper section-frame">
    <div class="text-center mb-24 reveal-blur">
        <div class="eyebrow">PRODUCTIVITY AND INNOVATION</div>
        <h2>services that power growth</h2>
    </div>
    
    <div class="max-w-5xl mx-auto px-6 h-[400px] flex items-end justify-between gap-4 hairline-b border-l border-hairline-light pb-0 relative overflow-x-auto rise">
        
        <!-- Y-axis marks -->
        <div class="absolute left-0 top-0 bottom-0 w-full flex flex-col justify-between pointer-events-none opacity-20">
            <div class="w-full hairline-b"></div>
            <div class="w-full hairline-b"></div>
            <div class="w-full hairline-b"></div>
            <div class="w-full hairline-b"></div>
            <div class="w-full hairline-b"></div>
        </div>
        
        <div class="chart-col w-full h-[90%] bg-mist/10 flex flex-col items-center pt-4 group">
            <div class="font-sans text-xs font-semibold mb-2 text-center hidden md:block">Web Development</div>
            <div class="font-sans text-[10px] text-center md:hidden break-words w-full px-1">Web</div>
            <div class="font-mono-tag text-xs text-ink/50">/ 01 /</div>
            <div class="w-4 h-px bg-ink/30 my-2"></div>
            <div class="font-sans text-[9px] uppercase tracking-widest opacity-60 text-center hidden md:block">enterprise portals</div>
            
            <a href="<?= url_to('service-detail', 'web-development') ?>" class="mt-auto mb-6 opacity-0 group-hover:opacity-100 transition-opacity font-mono-tag text-[10px] bg-white px-2 py-1 hairline rounded">+ DETAILS</a>
        </div>
        
        <div class="chart-col w-full h-[70%] flex flex-col items-center pt-4 group">
            <div class="font-sans text-xs font-semibold mb-2 text-center hidden md:block">Software</div>
            <div class="font-sans text-[10px] text-center md:hidden break-words w-full px-1">Soft</div>
            <div class="font-mono-tag text-xs text-ink/50">/ 02 /</div>
            <div class="w-4 h-px bg-ink/30 my-2"></div>
            <div class="font-sans text-[9px] uppercase tracking-widest opacity-60 text-center hidden md:block">bespoke automation</div>
            
            <a href="<?= url_to('service-detail', 'software-development') ?>" class="mt-auto mb-6 opacity-0 group-hover:opacity-100 transition-opacity font-mono-tag text-[10px] bg-white px-2 py-1 hairline rounded">+ DETAILS</a>
        </div>
        
        <div class="chart-col w-full h-[60%] flex flex-col items-center pt-4 group">
            <div class="font-sans text-xs font-semibold mb-2 text-center hidden md:block">App Dev</div>
            <div class="font-sans text-[10px] text-center md:hidden break-words w-full px-1">App</div>
            <div class="font-mono-tag text-xs text-ink/50">/ 03 /</div>
            <div class="w-4 h-px bg-ink/30 my-2"></div>
            <div class="font-sans text-[9px] uppercase tracking-widest opacity-60 text-center hidden md:block">iOS & Android</div>
            
            <a href="<?= url_to('service-detail', 'app-development') ?>" class="mt-auto mb-6 opacity-0 group-hover:opacity-100 transition-opacity font-mono-tag text-[10px] bg-white px-2 py-1 hairline rounded">+ DETAILS</a>
        </div>
        
        <div class="chart-col w-full h-[40%] flex flex-col items-center pt-4 group">
            <div class="font-sans text-xs font-semibold mb-2 text-center hidden md:block">SEO</div>
            <div class="font-sans text-[10px] text-center md:hidden break-words w-full px-1">SEO</div>
            <div class="font-mono-tag text-xs text-ink/50">/ 04 /</div>
            <div class="w-4 h-px bg-ink/30 my-2"></div>
            <div class="font-sans text-[9px] uppercase tracking-widest opacity-60 text-center hidden md:block">organic growth</div>
            
            <a href="<?= url_to('service-detail', 'seo') ?>" class="mt-auto mb-6 opacity-0 group-hover:opacity-100 transition-opacity font-mono-tag text-[10px] bg-white px-2 py-1 hairline rounded">+ DETAILS</a>
        </div>
        
        <div class="chart-col w-full h-[50%] flex flex-col items-center pt-4 group">
            <div class="font-sans text-xs font-semibold mb-2 text-center hidden md:block">Social</div>
            <div class="font-sans text-[10px] text-center md:hidden break-words w-full px-1">Social</div>
            <div class="font-mono-tag text-xs text-ink/50">/ 05 /</div>
            <div class="w-4 h-px bg-ink/30 my-2"></div>
            <div class="font-sans text-[9px] uppercase tracking-widest opacity-60 text-center hidden md:block">brand engagement</div>
            
            <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="mt-auto mb-6 opacity-0 group-hover:opacity-100 transition-opacity font-mono-tag text-[10px] bg-white px-2 py-1 hairline rounded">+ DETAILS</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // Typing effect for CRT Hero
    const crtEl = document.getElementById('hero-typing');
    const logs = [
        "Ziibay Boot ... OK",
        "Architecture Check ... OK",
        "Loading Services ... OK",
        "Extensions ... Loaded",
        "> INIT studio sequence",
        "> USER login: client",
        "> SYSTEM: ready for commands",
        ">> echo 'High-Performance Software Solutions'",
        "Ziibay Soft Ready_"
    ];
    let i = 0;
    let j = 0;
    let currentLog = "";
    
    function typeCrt() {
        if(i < logs.length) {
            if(j < logs[i].length) {
                currentLog += logs[i].charAt(j);
                crtEl.innerHTML = currentLog.replace(/\n/g, '<br>');
                j++;
                setTimeout(typeCrt, Math.random() * 30 + 10);
            } else {
                currentLog += "\n";
                crtEl.innerHTML = currentLog.replace(/\n/g, '<br>');
                i++;
                j = 0;
                setTimeout(typeCrt, Math.random() * 200 + 100);
            }
        }
    }
    
    setTimeout(typeCrt, 500);

    // Scroll reveal observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if(entry.isIntersecting) {
                entry.target.classList.add('is-revealed');
                
                // If it has stroke-dash-draw SVG animation
                const paths = entry.target.querySelectorAll('.stroke-dash-draw');
                paths.forEach((p, i) => {
                    p.style.strokeDasharray = p.getTotalLength();
                    p.style.strokeDashoffset = p.getTotalLength();
                    p.style.animation = `draw 2s ease-out ${i*0.2}s forwards`;
                });
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -10% 0px' });
    
    document.querySelectorAll('.reveal-blur, .rise, .chart-col').forEach(el => observer.observe(el));
});
</script>

<style>
@keyframes draw {
    to { stroke-dashoffset: 0; }
}
</style>
<?= $this->endSection() ?>
