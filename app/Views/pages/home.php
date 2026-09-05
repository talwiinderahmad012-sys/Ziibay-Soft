<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- S1. HERO -->
<section class="light-panel" style="margin:14px auto; padding:80px 24px 32px; text-align:center; min-height:auto; display:flex; flex-direction:column; align-items:center; position:relative;">
    <div class="stat-corner tl">
        <div class="stat-val">( 05 )</div>
        <div class="stat-lbl">core services offered</div>
    </div>
    <div class="stat-corner tr">
        <div class="stat-val">( 03 )</div>
        <div class="stat-lbl">countries served</div>
    </div>
    <div class="stat-corner bl">
        <div class="stat-val">( v2.0 )</div>
        <div class="stat-lbl">engineering system</div>
    </div>
    <div class="stat-corner br">
        <div class="stat-val">( 100% )</div>
        <div class="stat-lbl">scalable & secure builds</div>
    </div>

    <div class="mac-wrap" data-rv>
        <svg class="mac-img" width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 880 740">
  <defs>
    <!-- Base Grain -->
    <filter id="grain">
      <feTurbulence type="fractalNoise" baseFrequency="0.6" numOctaves="3" result="noise" />
      <feColorMatrix type="matrix" values="0 0 0 0 0  0 0 0 0 0  0 0 0 0 0  0 0 0 0.05 0" in="noise" result="coloredNoise" />
      <feComposite operator="in" in="coloredNoise" in2="SourceGraphic" result="composite" />
      <feBlend mode="multiply" in="composite" in2="SourceGraphic" />
    </filter>
    
    <!-- Body Gradient -->
    <linearGradient id="bodyGrad" x1="0" y1="0" x2="0" y2="1">
      <stop offset="0%" stop-color="#f7f7f5" />
      <stop offset="100%" stop-color="#c6c9cb" />
    </linearGradient>

    <!-- Side Gradients for 3D depth -->
    <linearGradient id="highlight" x1="0" y1="0" x2="1" y2="0">
      <stop offset="0%" stop-color="#ffffff" stop-opacity="0.8" />
      <stop offset="100%" stop-color="#ffffff" stop-opacity="0" />
    </linearGradient>
    <linearGradient id="shade" x1="0" y1="0" x2="1" y2="0">
      <stop offset="0%" stop-color="#000000" stop-opacity="0" />
      <stop offset="100%" stop-color="#000000" stop-opacity="0.15" />
    </linearGradient>

    <!-- Screen Glow -->
    <radialGradient id="screenGlass" cx="50%" cy="50%" r="70%">
      <stop offset="0%" stop-color="#10202e" />
      <stop offset="60%" stop-color="#1d4d78" />
      <stop offset="100%" stop-color="#5fb0e6" />
    </radialGradient>

    <radialGradient id="screenGlow" cx="50%" cy="50%" r="50%">
      <stop offset="0%" stop-color="#5fb0e6" stop-opacity="0.6" />
      <stop offset="100%" stop-color="#5fb0e6" stop-opacity="0" />
    </radialGradient>

    <!-- Scanlines -->
    <pattern id="scanlines" width="4" height="4" patternUnits="userSpaceOnUse">
      <rect width="4" height="2" fill="#000000" fill-opacity="0.12" />
    </pattern>

    <!-- Ambient Occlusion / Shadows -->
    <filter id="blurShadow">
      <feGaussianBlur stdDeviation="8" />
    </filter>
    <filter id="softGlow">
      <feGaussianBlur stdDeviation="24" />
    </filter>
  </defs>

  <!-- Ground Shadow attached directly under Mac base -->
  <ellipse cx="440" cy="625" rx="380" ry="24" fill="rgba(30,52,72,0.22)" filter="url(#blurShadow)" />

  <!-- Main Body -->
  <g filter="url(#grain)">
    <!-- Base Chassis (Wide body) -->
    <rect x="20" y="80" width="840" height="480" rx="32" fill="url(#bodyGrad)" />
    <!-- Highlight Left -->
    <rect x="20" y="80" width="60" height="480" rx="32" fill="url(#highlight)" />
    <!-- Shade Right -->
    <rect x="800" y="80" width="60" height="480" rx="32" fill="url(#shade)" />
    
    <!-- Top Ridge & Vents -->
    <rect x="40" y="70" width="800" height="20" rx="8" fill="#e0e0de" />
    <rect x="400" y="65" width="80" height="10" rx="2" fill="#b0b3b5" />
    <rect x="410" y="66" width="60" height="2" fill="#808385" />
    <rect x="410" y="70" width="60" height="2" fill="#808385" />
    <rect x="410" y="74" width="60" height="2" fill="#808385" />

    <!-- Ambient Occlusion Bezel Shadow -->
    <rect x="70" y="140" width="740" height="240" rx="16" fill="#000" opacity="0.3" filter="url(#blurShadow)" />

    <!-- Recessed Screen Bezel -->
    <rect x="70" y="130" width="740" height="240" rx="20" fill="#1a1d20" />
    
    <!-- Outer Glow behind glass -->
    <rect x="90" y="150" width="700" height="200" rx="12" fill="url(#screenGlow)" filter="url(#softGlow)" />

    <!-- Glass Screen (Wide) -->
    <rect x="90" y="150" width="700" height="200" rx="12" fill="url(#screenGlass)" />
    <!-- Vignette -->
    <rect x="90" y="150" width="700" height="200" rx="12" fill="#000" opacity="0.4" />
    <!-- Scanlines Overlay -->
    <rect x="90" y="150" width="700" height="200" rx="12" fill="url(#scanlines)" />
    
    <!-- Inner Glass reflection -->
    <path d="M 95 155 Q 440 180 785 155 L 785 200 Q 440 220 95 200 Z" fill="#ffffff" opacity="0.05" />

    <!-- Terminal Live Text & Cursor inside SVG -->
    <g id="crt-terminal-group">
      <text id="crt" font-family="'Space Mono', monospace" font-size="11.5" fill="#cfe3f4" x="146" y="176" style="letter-spacing:0.5px; text-shadow:0 0 6px rgba(140,200,240,0.7);"></text>
      <rect id="crt-cursor" x="146" y="166" width="6" height="11" fill="#cfe3f4" style="animation: blink 1s steps(1) infinite;"></rect>
    </g>

    <!-- Bottom Drive Area (Floppy slot right x≈560 width≈220) -->
    <rect x="560" y="448" width="220" height="8" rx="2" fill="#000" opacity="0.15" filter="url(#blurShadow)" />
    <rect x="560" y="448" width="220" height="8" rx="2" fill="#303335" />
    <rect x="565" y="451" width="210" height="2" fill="#101315" />
    
    <!-- Eject Lever -->
    <rect x="786" y="448" width="16" height="8" rx="1" fill="#a0a3a5" />

    <!-- Logo Emboss (left x≈60) -->
    <rect x="60" y="440" width="24" height="24" rx="4" fill="#d0d3d5" />
    <!-- Rainbow Logo -->
    <rect x="64" y="444" width="16" height="4" fill="#61BB46" />
    <rect x="64" y="448" width="16" height="4" fill="#FDB827" />
    <rect x="64" y="452" width="16" height="4" fill="#F5821F" />
    <rect x="64" y="456" width="16" height="4" fill="#E03A3E" />
  </g>
</svg>
    </div>

    <div style="margin:20px auto 20px; position:relative; width:100%; max-width:600px;">
        <div style="position:absolute; top:50%; left:0; width:100%; height:1px; background:var(--line); z-index:-1;"></div>
        <span style="font-family:var(--mono); font-size:11px; text-transform:uppercase; letter-spacing:0.12em; background:var(--canvas); padding:0 12px; color:var(--ink);">DISCOVER HOW ZIIBAY SOFT ENGINEERS GROWTH</span>
    </div>

    <div data-rv="blur-rise">
        <div class="chip" style="margin-bottom:12px;">DIGITAL ENGINEERING STUDIO</div>
        <h1 class="serif-heading serif-display" style="margin-bottom:14px;">architecting high-performance<br>software solutions</h1>
        <p style="max-width:600px; margin:0 auto 20px; font-size:15px; opacity:0.7; line-height:1.6;">We build scalable, secure, and modern digital platforms for ambitious international brands. From complex enterprise software to engaging mobile applications.</p>
        
        <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="<?= url_to('contact') ?>" class="chip">→ GET A FREE CONSULTATION</a>
            <a href="<?= url_to('services') ?>" class="chip">EXPLORE CAPABILITIES</a>
        </div>
    </div>
    
    <div style="margin-top:24px;">
        <div style="font-family:var(--mono); font-size:10px; letter-spacing:0.1em; opacity:0.6; margin-bottom:6px;">SCROLL DOWN</div>
        <div style="animation:bounce 2s infinite;">↓</div>
    </div>
</section>

<!-- S2. GLOBAL DELIVERY -->
<section class="dark-panel" style="padding:64px 24px; text-align:center; overflow:hidden;">
    <div class="stat-corner tl">
        <div class="stat-val">( 03 )</div>
        <div class="stat-lbl">international delivery hubs</div>
    </div>
    
    <div data-rv="blur-rise" style="margin-bottom:24px;">
        <div class="eyebrow" style="margin-bottom:12px;">WHERE ZIIBAY SOFT DELIVERS — 2026</div>
        <h2 class="serif-heading" style="font-size:clamp(2.5rem,6vw,4.5rem);">global delivery</h2>
    </div>

    <div class="globe-wrap" data-rv>
      <div class="globe-clip">
        <div class="globe-spin">
          <img src="<?= base_url('assets/img/earth.png') ?>" alt="Ziibay Soft global delivery">
        </div>
      </div>
      <div class="orbit back"></div>
      <div class="orbit front"></div>
      <i class="sat" data-label="NEW YORK · USA"></i>
      <i class="sat" data-label="LONDON · UK"></i>
      <i class="sat" data-label="SYDNEY · AUSTRALIA"></i>
      <i class="sat" data-label="BERLIN · GERMANY"></i>
      <i class="sat" data-label="PARIS · FRANCE"></i>
      <i class="sat" data-label="AMSTERDAM · NETHERLANDS"></i>
      <i class="sat" data-label="MADRID · SPAIN"></i>
      <i class="sat" data-label="MILAN · ITALY"></i>
      <i class="sat" data-label="STOCKHOLM · SWEDEN"></i>
      <i class="sat" data-label="TORONTO · CANADA"></i>
      <i class="sat" data-label="DUBAI · UAE"></i>
      <i class="sat" data-label="SINGAPORE · SINGAPORE"></i>
      <i class="sat" data-label="TOKYO · JAPAN"></i>
      <i class="sat" data-label="AUCKLAND · NEW ZEALAND"></i>
    </div>

    <div style="margin-top:24px;">
        <a href="<?= url_to('locations') ?>" class="chip">→ EXPLORE LOCATIONS</a>
    </div>
</section>

<!-- S3. WHY CHOOSE -->
<section class="section-polished" style="max-width:1200px; margin:0 auto;">
    <div class="connected-boxes">
        <div style="background:var(--canvas); padding-right:16px;">
            <div class="stat-val">( Scalable )</div>
            <div class="stat-lbl">future-proof codebases</div>
        </div>
        <div style="background:var(--canvas); padding-left:16px; text-align:right;">
            <div class="stat-val">( Optimized )</div>
            <div class="stat-lbl">Core Web Vitals</div>
        </div>
    </div>

    <div style="text-align:center; margin-bottom:32px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">WHERE AND HOW WE ENGINEER VALUE</div>
        <h2 class="serif-heading section-title">built for performance</h2>
    </div>

    <div style="display:flex; gap:24px; flex-wrap:wrap; justify-content:center;">
        <!-- Card 1 -->
        <div data-rv="deck-rise" class="card" style="flex:1; min-width:300px; position:relative;">
            <svg class="clay-icon" viewBox="0 0 96 96"><defs>
            <linearGradient id="zi1a" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient>
            <linearGradient id="zi1b" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#eef1f2"/><stop offset="1" stop-color="#c2c7cb"/></linearGradient>
            </defs>
            <g stroke="rgba(28,43,58,.18)" stroke-width="1">
            <rect x="22" y="60" width="52" height="13" rx="5" fill="url(#zi1b)"/>
            <rect x="27" y="44" width="42" height="13" rx="5" fill="url(#zi1a)"/>
            <rect x="32" y="28" width="32" height="13" rx="5" fill="url(#zi1b)"/>
            </g>
            <path d="M48 20 V8 M48 8 l-5 6 M48 8 l5 6" stroke="var(--accent)" stroke-width="2.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/></svg>
            <h3 style="font-weight:600; font-size:18px; margin-bottom:10px;">Scalable Architecture</h3>
            <p style="opacity:0.7; line-height:1.6; margin-bottom:32px;">Future-proof codebases designed to grow with your business, handling increased traffic and complexity seamlessly.</p>
            <div class="serif-heading" style="font-size:40px; opacity:0.2; position:absolute; bottom:16px; left:28px;">01</div>
        </div>
        <!-- Card 2 -->
        <div data-rv="deck-rise" class="card" style="flex:1; min-width:300px; position:relative; transform:translateY(12px); transition-delay:0.15s;">
            <svg class="clay-icon" viewBox="0 0 96 96"><defs>
            <linearGradient id="zi2" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient>
            </defs>
            <circle cx="48" cy="50" r="30" fill="url(#zi2)" stroke="rgba(28,43,58,.18)"/>
            <path d="M28 56 a20 20 0 0 1 40 0" fill="none" stroke="var(--accent-soft)" stroke-width="5" stroke-linecap="round"/>
            <path d="M30 52 l3 1 M48 36 v3 M66 52 l-3 1" stroke="var(--accent-soft)" stroke-width="2" stroke-linecap="round"/>
            <line x1="48" y1="56" x2="60" y2="40" stroke="var(--ink)" stroke-width="3" stroke-linecap="round"/>
            <circle cx="48" cy="56" r="3.5" fill="var(--ink)"/></svg>
            <h3 style="font-weight:600; font-size:18px; margin-bottom:10px;">High Performance</h3>
            <p style="opacity:0.7; line-height:1.6; margin-bottom:32px;">Optimized for Core Web Vitals, blazing-fast load times, and seamless user experiences across all devices.</p>
            <div class="serif-heading" style="font-size:40px; opacity:0.2; position:absolute; bottom:16px; left:28px;">02</div>
        </div>
        <!-- Card 3 -->
        <div data-rv="deck-rise" class="card" style="flex:1; min-width:300px; position:relative; transform:translateY(24px); transition-delay:0.3s;">
            <svg class="clay-icon" viewBox="0 0 96 96"><defs>
            <linearGradient id="zi3" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient>
            </defs>
            <g fill="#c2c7cb">
            <rect x="36" y="16" width="5" height="10" rx="2"/><rect x="46" y="16" width="5" height="10" rx="2"/><rect x="56" y="16" width="5" height="10" rx="2"/>
            <rect x="36" y="70" width="5" height="10" rx="2"/><rect x="46" y="70" width="5" height="10" rx="2"/><rect x="56" y="70" width="5" height="10" rx="2"/>
            <rect x="16" y="36" width="10" height="5" rx="2"/><rect x="16" y="46" width="10" height="5" rx="2"/><rect x="16" y="56" width="10" height="5" rx="2"/>
            <rect x="70" y="36" width="10" height="5" rx="2"/><rect x="70" y="46" width="10" height="5" rx="2"/><rect x="70" y="56" width="10" height="5" rx="2"/>
            </g>
            <rect x="24" y="24" width="48" height="48" rx="9" fill="url(#zi3)" stroke="rgba(28,43,58,.18)"/>
            <rect x="37" y="37" width="22" height="22" rx="5" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/>
            <circle cx="48" cy="48" r="3" fill="var(--accent)"/></svg>
            <h3 style="font-weight:600; font-size:18px; margin-bottom:10px;">Modern Tech Stack</h3>
            <p style="opacity:0.7; line-height:1.6; margin-bottom:32px;">Leveraging the latest frameworks and secure technologies to deliver robust, maintainable digital products.</p>
            <div class="serif-heading" style="font-size:40px; opacity:0.2; position:absolute; bottom:16px; left:28px;">03</div>
        </div>
    </div>
</section>

<!-- S4. CORE CAPABILITIES -->
<section class="dark-panel" style="padding:64px 24px;">
    <div style="text-align:center; margin-bottom:32px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">CORE CAPABILITIES</div>
        <h2 class="serif-heading section-title">premium development services</h2>
        <p style="opacity:0.7; max-width:500px; margin:0 auto;">End-to-end development services tailored to your operational needs.</p>
    </div>

    <div class="xrow">
        <!-- 01 WEB DEVELOPMENT -->
        <article class="xcard" data-x>
            <div class="tag">WEB DEVELOPMENT</div>
            <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw1" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
            <rect x="18" y="24" width="60" height="48" rx="7" fill="url(#zw1)" stroke="rgba(28,43,58,.18)"/>
            <line x1="18" y1="36" x2="78" y2="36" stroke="rgba(28,43,58,.18)"/>
            <circle cx="26" cy="30" r="2" fill="#c2c7cb"/><circle cx="32" cy="30" r="2" fill="#c2c7cb"/><circle cx="38" cy="30" r="2" fill="var(--accent)"/>
            <rect x="24" y="42" width="22" height="16" rx="3" fill="var(--clay-fill)"/>
            <rect x="50" y="43" width="22" height="3" rx="1.5" fill="#c2c7cb"/><rect x="50" y="50" width="18" height="3" rx="1.5" fill="#c2c7cb"/><rect x="50" y="57" width="12" height="3" rx="1.5" fill="#c2c7cb"/></svg>
            <h3>Web Development</h3>
            <p class="x-short">Custom, high-performance web applications, enterprise portals, and robust backend systems.</p>
            <div class="x-num">01</div>
            <div class="more">
                <p>Custom, high-performance web applications, enterprise portals, and robust backend systems built for scale and security. From lightning-fast marketing sites to complex SaaS platforms, we engineer every layer — UI, API, database and DevOps — for reliability, SEO-readiness and Core Web Vitals.</p>
                <ul>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Enterprise web portals & SaaS platforms</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Robust APIs & headless CMS architecture</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>SEO-first performance & Core Web Vitals</li>
                </ul>
                <a href="<?= url_to('service-detail', 'web-development') ?>" class="mono-link">EXPLORE SERVICE →</a>
            </div>
        </article>

        <!-- 02 SOFTWARE DEVELOPMENT -->
        <article class="xcard" data-x>
            <div class="tag">SOFTWARE DEVELOPMENT</div>
            <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw2" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
            <g fill="#c2c7cb"><rect x="45" y="18" width="6" height="10" rx="2"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(45 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(90 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(135 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(180 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(225 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(270 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(315 48 48)"/></g>
            <circle cx="48" cy="48" r="22" fill="url(#zw2)" stroke="rgba(28,43,58,.18)"/>
            <circle cx="48" cy="48" r="8" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/></svg>
            <h3>Software Development</h3>
            <p class="x-short">Bespoke software solutions tailored to automate your workflows and manage data securely.</p>
            <div class="x-num">02</div>
            <div class="more">
                <p>Bespoke software solutions tailored to automate your workflows, manage data securely, and solve complex business challenges. We deliver ERPs, CRMs, dashboards and automation pipelines with role-based access, audit trails and seamless third-party integrations.</p>
                <ul>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Custom CRM, ERP & internal operations tools</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>High-throughput backend databases & APIs</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Automated workflow & data pipelines</li>
                </ul>
                <a href="<?= url_to('service-detail', 'software-development') ?>" class="mono-link">EXPLORE SERVICE →</a>
            </div>
        </article>

        <!-- 03 APP DEVELOPMENT -->
        <article class="xcard" data-x>
            <div class="tag">APP DEVELOPMENT</div>
            <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw3" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
            <rect x="32" y="18" width="32" height="60" rx="8" fill="url(#zw3)" stroke="rgba(28,43,58,.18)"/>
            <rect x="36" y="28" width="24" height="38" rx="3" fill="var(--clay-fill)"/>
            <rect x="42" y="22" width="12" height="2.5" rx="1.25" fill="#c2c7cb"/>
            <circle cx="48" cy="72" r="2.5" fill="var(--accent)"/></svg>
            <h3>App Development</h3>
            <p class="x-short">Native and cross-platform mobile applications for iOS and Android.</p>
            <div class="x-num">03</div>
            <div class="more">
                <p>Native and cross-platform mobile applications designed for intuitive user experiences and high performance on iOS and Android. One codebase, app-store-ready builds, offline-first data, push notifications and buttery 60fps interactions.</p>
                <ul>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>iOS & Android native/cross-platform apps</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Offline-first data caching & synchronization</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Push notifications & in-app engagement</li>
                </ul>
                <a href="<?= url_to('service-detail', 'app-development') ?>" class="mono-link">EXPLORE SERVICE →</a>
            </div>
        </article>

        <!-- 04 SEO SERVICES -->
        <article class="xcard" data-x>
            <div class="tag">SEO SERVICES</div>
            <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw4" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
            <rect x="24" y="52" width="8" height="16" rx="2" fill="#c2c7cb"/>
            <rect x="36" y="44" width="8" height="24" rx="2" fill="url(#zw4)"/>
            <rect x="48" y="36" width="8" height="32" rx="2" fill="#c2c7cb"/>
            <circle cx="60" cy="38" r="13" fill="var(--clay-fill)" stroke="rgba(28,43,58,.25)" stroke-width="3"/>
            <line x1="69" y1="48" x2="79" y2="58" stroke="var(--accent)" stroke-width="5" stroke-linecap="round"/></svg>
            <h3>SEO Services</h3>
            <p class="x-short">Data-driven SEO strategies to dominate search engine results.</p>
            <div class="x-num">04</div>
            <div class="more">
                <p>Data-driven SEO strategies to dominate search engine results and drive high-quality organic traffic. Technical audits, keyword architecture, content strategy and authority building — measured in rankings, clicks and revenue.</p>
                <ul>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Technical SEO audits & architectural fixes</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>High-intent keyword targeting & content hubs</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Authority backlink acquisition & rank tracking</li>
                </ul>
                <a href="<?= url_to('service-detail', 'seo') ?>" class="mono-link">EXPLORE SERVICE →</a>
            </div>
        </article>

        <!-- 05 SOCIAL MEDIA MANAGEMENT -->
        <article class="xcard" data-x>
            <div class="tag">SOCIAL MEDIA MANAGEMENT</div>
            <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw5" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
            <rect x="48" y="44" width="30" height="22" rx="8" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/>
            <path d="M70 66 l4 7 -8 -2 z" fill="var(--clay-fill)"/>
            <rect x="18" y="26" width="38" height="26" rx="8" fill="url(#zw5)" stroke="rgba(28,43,58,.18)"/>
            <path d="M28 52 l-4 8 9 -3 z" fill="url(#zw5)"/>
            <circle cx="29" cy="39" r="2.5" fill="var(--accent)"/><circle cx="37" cy="39" r="2.5" fill="var(--accent)"/><circle cx="45" cy="39" r="2.5" fill="var(--accent)"/></svg>
            <h3>Social Media Management</h3>
            <p class="x-short">Engaging social media campaigns that build brand authority.</p>
            <div class="x-num">05</div>
            <div class="more">
                <p>Engaging social media campaigns that build brand authority and foster community growth. Content calendars, creative production, paid amplification and analytics that turn followers into customers.</p>
                <ul>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Multi-platform content calendars & copywriting</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>High-converting creative assets & short-form video</li>
                    <li><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Performance tracking & community management</li>
                </ul>
                <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="mono-link">EXPLORE SERVICE →</a>
            </div>
        </article>
    </div>
</section>

<!-- S5. GROWTH CAROUSEL -->
<section class="light-panel" style="padding:64px 24px; overflow:hidden;">
    <div style="text-align:center; margin-bottom:32px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">NEW STANDARDS FOR GROWTH</div>
        <h2 class="serif-heading section-title">growth & innovation</h2>
    </div>

    <div style="position:relative; width:100%; max-width:1160px; margin:0 auto; overflow:hidden; padding:20px 0;">
        <div id="carousel-track" style="display:flex; gap:24px; justify-content:center; align-items:center; transition:transform 0.5s cubic-bezier(0.16, 1, 0.3, 1);">
            <!-- CARD A: SEO SERVICES -->
            <div class="c-card side">
                <div class="os-header">↗ GROWTH SERVICE</div>
                <div style="padding:24px 20px; flex:1; display:flex; flex-direction:column;">
                    <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw4_car" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                    <rect x="24" y="52" width="8" height="16" rx="2" fill="#c2c7cb"/>
                    <rect x="36" y="44" width="8" height="24" rx="2" fill="url(#zw4_car)"/>
                    <rect x="48" y="36" width="8" height="32" rx="2" fill="#c2c7cb"/>
                    <circle cx="60" cy="38" r="13" fill="var(--clay-fill)" stroke="rgba(28,43,58,.25)" stroke-width="3"/>
                    <line x1="69" y1="48" x2="79" y2="58" stroke="var(--accent)" stroke-width="5" stroke-linecap="round"/></svg>
                    <h3 style="font-family:var(--serif); font-size:22px; margin-bottom:10px; color:var(--ink); text-align:center;">SEO Services</h3>
                    <p style="font-size:13px; line-height:1.6; color:var(--ink); opacity:0.85; margin-bottom:18px; text-align:center;">Organic growth architecture and search performance. We build technically flawless, content-rich websites that climb rankings and keep climbing.</p>
                    <div style="display:flex; flex-direction:column; gap:8px; margin-bottom:20px;">
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Technical SEO audits & Core Web Vitals tuning</div>
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Keyword architecture & content strategy</div>
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Authority building & digital PR</div>
                    </div>
                </div>
                <div style="border-top:1px solid var(--line); padding:14px 20px; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:11px; color:var(--muted); font-family:var(--mono);">Rankings, clicks, revenue — measured.</span>
                    <a href="<?= url_to('service-detail', 'seo') ?>" style="font-family:var(--mono); font-size:11px; font-weight:700; text-decoration:none; color:var(--ink);">→ EXPLORE</a>
                </div>
            </div>

            <!-- CARD B: SOCIAL MEDIA MANAGEMENT -->
            <div class="c-card center">
                <div class="os-header">↗ GROWTH SERVICE</div>
                <div style="padding:24px 20px; flex:1; display:flex; flex-direction:column;">
                    <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw5_car" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                    <rect x="48" y="44" width="30" height="22" rx="8" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/>
                    <path d="M70 66 l4 7 -8 -2 z" fill="var(--clay-fill)"/>
                    <rect x="18" y="26" width="38" height="26" rx="8" fill="url(#zw5_car)"/>
                    <path d="M28 52 l-4 8 9 -3 z" fill="url(#zw5_car)"/>
                    <circle cx="29" cy="39" r="2.5" fill="var(--accent)"/><circle cx="37" cy="39" r="2.5" fill="var(--accent)"/><circle cx="45" cy="39" r="2.5" fill="var(--accent)"/></svg>
                    <h3 style="font-family:var(--serif); font-size:22px; margin-bottom:10px; color:var(--ink); text-align:center;">Social Media Management</h3>
                    <p style="font-size:13px; line-height:1.6; color:var(--ink); opacity:0.85; margin-bottom:18px; text-align:center;">Audience engagement and brand distribution channels. We run your brand's voice across every platform that matters.</p>
                    <div style="display:flex; flex-direction:column; gap:8px; margin-bottom:20px;">
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Content calendars & creative production</div>
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Community management & paid amplification</div>
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Monthly analytics & growth reports</div>
                    </div>
                </div>
                <div style="border-top:1px solid var(--line); padding:14px 20px; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:11px; color:var(--muted); font-family:var(--mono);">Followers turned customers.</span>
                    <a href="<?= url_to('service-detail', 'social-media-management') ?>" style="font-family:var(--mono); font-size:11px; font-weight:700; text-decoration:none; color:var(--ink);">→ EXPLORE</a>
                </div>
            </div>

            <!-- CARD C: ALL CAPABILITIES -->
            <div class="c-card side">
                <div class="os-header">↗ GROWTH SERVICE</div>
                <div style="padding:24px 20px; flex:1; display:flex; flex-direction:column;">
                    <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw6" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                    <g stroke="rgba(28,43,58,.18)">
                    <rect x="20" y="20" width="26" height="26" rx="6" fill="url(#zw6)"/>
                    <rect x="50" y="20" width="26" height="26" rx="6" fill="var(--clay-fill)"/>
                    <rect x="20" y="50" width="26" height="26" rx="6" fill="var(--clay-fill)"/>
                    <rect x="50" y="50" width="26" height="26" rx="6" fill="url(#zw6)"/>
                    </g></svg>
                    <h3 style="font-family:var(--serif); font-size:22px; margin-bottom:10px; color:var(--ink); text-align:center;">All Capabilities</h3>
                    <p style="font-size:13px; line-height:1.6; color:var(--ink); opacity:0.85; margin-bottom:18px; text-align:center;">Full spectrum of our engineering & growth offerings — one team, one roadmap, one accountable partner.</p>
                    <div style="display:flex; flex-direction:column; gap:8px; margin-bottom:20px;">
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Web / Software / App Development</div>
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>SEO Services & Social Media Management</div>
                        <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;"><span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span>Dedicated engineering + growth pods</div>
                    </div>
                </div>
                <div style="border-top:1px solid var(--line); padding:14px 20px; display:flex; justify-content:space-between; align-items:center;">
                    <span style="font-size:11px; color:var(--muted); font-family:var(--mono);">Explore the complete capability index.</span>
                    <a href="<?= url_to('services') ?>" style="font-family:var(--mono); font-size:11px; font-weight:700; text-decoration:none; color:var(--ink);">→ EXPLORE</a>
                </div>
            </div>
        </div>

        <div style="position:absolute; top:50%; left:50%; transform:translate(-50%, -50%); width:min(100%, 800px); display:flex; justify-content:space-between; z-index:10; pointer-events:none; padding:0 8px;">
            <button id="car-prev" style="pointer-events:auto; width:40px; height:40px; border:1px solid var(--line); cursor:pointer; background:#fff; border-radius:50%; box-shadow:0 4px 12px rgba(30,52,72,0.1); font-weight:700;">←</button>
            <button id="car-next" style="pointer-events:auto; width:40px; height:40px; border:1px solid var(--line); cursor:pointer; background:#fff; border-radius:50%; box-shadow:0 4px 12px rgba(30,52,72,0.1); font-weight:700;">→</button>
        </div>
    </div>
    
    <div style="text-align:center; margin-top:24px;">
        <a href="<?= url_to('services') ?>" class="chip">+ VIEW ALL SERVICES</a>
    </div>
</section>

<!-- S6. ECOSYSTEM TREE -->
<section style="padding:64px 24px; position:relative; overflow:hidden;">
    <div style="text-align:center; margin-bottom:28px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">THE ECOSYSTEM</div>
        <h2 class="serif-heading section-title">where software gets its answers</h2>
    </div>

    <div style="position:relative; width:100%; max-width:800px; margin:0 auto; height:280px;">
        <!-- Elliptical rings -->
        <div style="position:absolute; top:20px; left:50%; transform:translateX(-50%); width:600px; height:200px; border:1px solid var(--line); border-radius:50%; opacity:0.5;"></div>
        <div style="position:absolute; top:40px; left:50%; transform:translateX(-50%); width:400px; height:120px; border:1px solid var(--line); border-radius:50%; opacity:0.5;"></div>
        
        <div class="chip" style="position:absolute; top:0; left:50%; transform:translateX(-50%); z-index:2;">ZS</div>
        
        <svg style="position:absolute; top:15px; left:0; width:100%; height:230px; pointer-events:none;" preserveAspectRatio="none">
            <path class="draw-path" d="M 400 0 Q 200 120 100 200" fill="none" stroke="var(--line)" stroke-width="1" stroke-dasharray="4,4" />
            <path class="draw-path" d="M 400 0 Q 300 120 250 200" fill="none" stroke="var(--line)" stroke-width="1" stroke-dasharray="4,4" />
            <path class="draw-path" d="M 400 0 L 400 200" fill="none" stroke="var(--line)" stroke-width="1" stroke-dasharray="4,4" />
            <path class="draw-path" d="M 400 0 Q 500 120 550 200" fill="none" stroke="var(--line)" stroke-width="1" stroke-dasharray="4,4" />
            <path class="draw-path" d="M 400 0 Q 600 120 700 200" fill="none" stroke="var(--line)" stroke-width="1" stroke-dasharray="4,4" />
        </svg>

        <div style="position:absolute; bottom:0; width:100%; display:flex; justify-content:space-between; padding:0 40px;">
            <div class="chip">WEB DEV</div>
            <div class="chip">SOFTWARE</div>
            <div class="chip">APP DEV</div>
            <div class="chip">SEO</div>
            <div class="chip">SOCIAL</div>
        </div>
    </div>
    
    <div style="text-align:center; margin-top:28px;">
        <a href="<?= url_to('services') ?>" class="chip">+ EXPLORE ALL CAPABILITIES</a>
    </div>

    <div class="connected-boxes" style="max-width:1200px; margin:32px auto 0;">
        <div style="background:var(--canvas); padding-right:16px;">
            <div class="stat-val">( Portfolio )</div>
            <div class="stat-lbl">proof of engineering</div>
        </div>
        <div style="background:var(--canvas); padding-left:16px; text-align:right;">
            <div class="stat-lbl">results in detail</div>
            <div class="stat-val">( Case Studies )</div>
        </div>
    </div>
</section>

<!-- S7. CAPABILITIES CHART -->
<section class="light-panel" style="padding:64px 24px; margin-bottom:32px;">
    <div style="text-align:center; margin-bottom:32px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">PRODUCTIVITY AND INNOVATION</div>
        <h2 class="serif-heading section-title">services that power growth</h2>
    </div>

    <div class="bars">
        <div class="bar-col highlight" style="height:90%;" data-rv="scale-y">
            <div style="font-weight:600; font-size:12px; margin-bottom:8px;">Web Development</div>
            <div style="font-family:var(--mono); font-size:10px; opacity:0.5;">/ 01 /</div>
            <div style="width:10px; height:1px; background:var(--line); margin:8px 0;"></div>
            <a href="<?= url_to('service-detail', 'web-development') ?>" class="chip" style="font-size:9px; padding:4px 8px; margin-top:auto; margin-bottom:16px;">+ DETAILS</a>
        </div>
        <div class="bar-col" style="height:70%;" data-rv="scale-y">
            <div style="font-weight:600; font-size:12px; margin-bottom:8px;">Software</div>
            <div style="font-family:var(--mono); font-size:10px; opacity:0.5;">/ 02 /</div>
            <div style="width:10px; height:1px; background:var(--line); margin:8px 0;"></div>
            <a href="<?= url_to('service-detail', 'software-development') ?>" class="chip" style="font-size:9px; padding:4px 8px; margin-top:auto; margin-bottom:16px;">+ DETAILS</a>
        </div>
        <div class="bar-col" style="height:100%;" data-rv="scale-y">
            <div style="font-weight:600; font-size:12px; margin-bottom:8px;">App</div>
            <div style="font-family:var(--mono); font-size:10px; opacity:0.5;">/ 03 /</div>
            <div style="width:10px; height:1px; background:var(--line); margin:8px 0;"></div>
            <a href="<?= url_to('service-detail', 'app-development') ?>" class="chip" style="font-size:9px; padding:4px 8px; margin-top:auto; margin-bottom:16px;">+ DETAILS</a>
        </div>
        <div class="bar-col" style="height:55%;" data-rv="scale-y">
            <div style="font-weight:600; font-size:12px; margin-bottom:8px;">SEO</div>
            <div style="font-family:var(--mono); font-size:10px; opacity:0.5;">/ 04 /</div>
            <div style="width:10px; height:1px; background:var(--line); margin:8px 0;"></div>
            <a href="<?= url_to('service-detail', 'seo') ?>" class="chip" style="font-size:9px; padding:4px 8px; margin-top:auto; margin-bottom:16px;">+ DETAILS</a>
        </div>
        <div class="bar-col" style="height:60%;" data-rv="scale-y">
            <div style="font-weight:600; font-size:12px; margin-bottom:8px;">Social</div>
            <div style="font-family:var(--mono); font-size:10px; opacity:0.5;">/ 05 /</div>
            <div style="width:10px; height:1px; background:var(--line); margin:8px 0;"></div>
            <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="chip" style="font-size:9px; padding:4px 8px; margin-top:auto; margin-bottom:16px;">+ DETAILS</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    // prefers-reduced-motion check
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // Intersection Observer for reveals
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                if (!prefersReducedMotion) {
                    entry.target.classList.add('in');
                } else {
                    entry.target.style.opacity = 1;
                    entry.target.style.transform = 'none';
                    entry.target.style.filter = 'none';
                }
                
                // SVG dashed paths draw
                if (entry.target.querySelector('.draw-path')) {
                    const paths = entry.target.querySelectorAll('.draw-path');
                    paths.forEach((p, i) => {
                        if (prefersReducedMotion) return;
                        const len = p.getTotalLength();
                        p.style.strokeDasharray = len;
                        p.style.strokeDashoffset = len;
                        p.animate([
                            { strokeDashoffset: len },
                            { strokeDashoffset: 0 }
                        ], { duration: 1500, delay: i * 150, fill: 'forwards', easing: 'ease-out' });
                    });
                }
            }
        });
    }, { threshold: 0.1 });
    
    document.querySelectorAll('[data-rv], section').forEach(el => observer.observe(el));
    if(prefersReducedMotion) {
        document.querySelectorAll('[data-rv]').forEach(el => {
            el.style.opacity = 1; el.style.transform = 'none'; el.style.filter = 'none';
        });
    }

    // CRT Typing inside SVG
    const textEl = document.getElementById('crt');
    const cursorEl = document.getElementById('crt-cursor');
    const logs = [
        "Ziibay Boot ... OK",
        "Architecture Check ... OK",
        "Loading Services ... OK",
        "Extensions ... Loaded",
        "",
        " > INIT studio sequence",
        " > USER login: client",
        " > SYSTEM: ready for commands",
        "",
        " >> echo 'High-Performance Software'",
        "Ziibay Soft Ready"
    ];
    const startX = 146;
    const startY = 176;
    const dy = 15.5;
    const charWidth = 6.9;

    if (prefersReducedMotion) {
        if (textEl) {
            textEl.innerHTML = logs.map((line, i) => {
                if (i === 0) return `<tspan x="${startX}">${line || ' '}</tspan>`;
                return `<tspan x="${startX}" dy="${dy}">${line || ' '}</tspan>`;
            }).join('');
            if (cursorEl) {
                const lastLine = logs[logs.length - 1];
                cursorEl.setAttribute('x', startX + lastLine.length * charWidth + 2);
                cursorEl.setAttribute('y', startY + (logs.length - 1) * dy - 10);
            }
        }
    } else if (textEl) {
        let lineIdx = 0;
        let charIdx = 0;
        let linesRendered = [""];

        function render() {
            textEl.innerHTML = linesRendered.map((line, i) => {
                if (i === 0) return `<tspan x="${startX}">${line || ' '}</tspan>`;
                return `<tspan x="${startX}" dy="${dy}">${line || ' '}</tspan>`;
            }).join('');
            if (cursorEl) {
                const currentLineText = linesRendered[lineIdx] || "";
                cursorEl.setAttribute('x', startX + currentLineText.length * charWidth + 2);
                cursorEl.setAttribute('y', startY + lineIdx * dy - 10);
            }
        }

        function type() {
            if (lineIdx < logs.length) {
                const targetLine = logs[lineIdx];
                if (charIdx < targetLine.length) {
                    linesRendered[lineIdx] += targetLine.charAt(charIdx);
                    charIdx++;
                    render();
                    setTimeout(type, 18);
                } else {
                    lineIdx++;
                    if (lineIdx < logs.length) {
                        linesRendered.push("");
                        charIdx = 0;
                        render();
                        setTimeout(type, 250);
                    }
                }
            }
        }
        render();
        setTimeout(type, 500);
    }

    // Orbit rAF
    const sats = document.querySelectorAll('.sat');
    sats.forEach(sat => sat.innerText = sat.dataset.label);
    if (!prefersReducedMotion) {
        let start = null;
        function step(timestamp) {
            if (!start) start = timestamp;
            const t = (timestamp - start) / 60000 * 2 * Math.PI; // ~60s rev
            sats.forEach((sat, i) => {
                const a = t + i * (2 * Math.PI / sats.length);
                const x = 50 + 66 * Math.cos(a);
                const y = 57 + 17 * Math.sin(a);
                sat.style.left = x + '%';
                sat.style.top = y + '%';
                if (Math.sin(a) > 0) {
                    sat.classList.add('front');
                    sat.classList.remove('back');
                } else {
                    sat.classList.add('back');
                    sat.classList.remove('front');
                }
            });
            requestAnimationFrame(step);
        }
        requestAnimationFrame(step);
    } else {
        sats.forEach((sat, i) => {
            const a = i * (2 * Math.PI / sats.length);
            sat.style.left = (50 + 66 * Math.cos(a)) + '%';
            sat.style.top = (57 + 17 * Math.sin(a)) + '%';
            if (Math.sin(a) > 0) {
                sat.classList.add('front');
            } else {
                sat.classList.add('back');
            }
        });
    }

    // Carousel
    let curSlide = 1;
    const cards = document.querySelectorAll('.c-card');
    const track = document.getElementById('carousel-track');
    
    function updateCarousel() {
        cards.forEach((card, i) => {
            if (i === curSlide) {
                card.className = 'c-card center';
                card.style.opacity = '';
                card.style.transform = '';
                card.style.zIndex = '';
                card.style.boxShadow = '';
            } else {
                card.className = 'c-card side';
                card.style.opacity = '';
                card.style.transform = '';
                card.style.zIndex = '';
                card.style.boxShadow = '';
            }
        });
        track.style.transform = `translateX(${(1 - curSlide) * 384}px)`;
    }
    document.getElementById('car-prev').addEventListener('click', () => {
        if (curSlide > 0) curSlide--;
        updateCarousel();
    });
    document.getElementById('car-next').addEventListener('click', () => {
        if (curSlide < cards.length - 1) curSlide++;
        updateCarousel();
    });
    
    // Numbers count-up
    if(!prefersReducedMotion) {
        document.querySelectorAll('.stat-val').forEach(el => {
            const text = el.innerText;
            const numMatch = text.match(/(\d+)/);
            if(numMatch) {
                const target = parseInt(numMatch[1]);
                let start = 0;
                const update = setInterval(() => {
                    start += Math.ceil(target / 20);
                    if(start >= target) {
                        el.innerText = text.replace(numMatch[1], target);
                        clearInterval(update);
                    } else {
                        let padded = start.toString();
                        if(numMatch[1].startsWith('0')) padded = padded.padStart(numMatch[1].length, '0');
                        el.innerText = text.replace(numMatch[1], padded);
                    }
                }, 50);
            }
        });
    }

    // Expandable xcards (click to expand)
    document.querySelectorAll('[data-x]').forEach(c => {
        c.addEventListener('click', (e) => {
            if (e.target.closest('a')) return;
            const open = c.classList.contains('open');
            document.querySelectorAll('[data-x].open').forEach(o => o.classList.remove('open'));
            if (!open) c.classList.add('open');
        });
    });
});
</script>
<style>
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(8px); }
}
</style>
<?= $this->endSection() ?>
