<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ContactPage",
  "name": "Contact Engineering | Ziibay Soft",
  "description": "Tell us about your project — we respond within one business day with a clear, honest engineering perspective.",
  "url": "<?= base_url('contact') ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO (FRAMED, CORNER STATS, ANIMATED CLAY CRT MAC) -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 24h ) response time</span>
        <span class="corner-stat tr">( 3 ) delivery hubs</span>
        <span class="corner-stat bl">( 100% ) confidential</span>
        <span class="corner-stat br">( 05 ) core services</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">GET IN TOUCH</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:18px;">
                contact engineering
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                Tell us about your project — we respond within one business day with a clear, honest engineering perspective.
            </p>

            <!-- Animated Clay CRT Terminal -->
            <div style="max-width:460px; margin:0 auto 16px;" class="clay-float">
                <svg viewBox="0 0 540 340" style="width:100%; height:auto; filter:drop-shadow(0 16px 30px rgba(30,52,72,0.18));">
                    <defs>
                        <linearGradient id="crt-case" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#FFFFFF"/>
                            <stop offset="100%" stop-color="#D6DADF"/>
                        </linearGradient>
                        <linearGradient id="crt-screen" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#1B2836"/>
                            <stop offset="100%" stop-color="#101924"/>
                        </linearGradient>
                    </defs>
                    <!-- Mac Body -->
                    <rect x="20" y="20" width="500" height="300" rx="20" fill="url(#crt-case)" stroke="rgba(30,52,72,0.2)" stroke-width="2"/>
                    <!-- Screen Bezel -->
                    <rect x="44" y="44" width="452" height="210" rx="12" fill="url(#crt-screen)" stroke="rgba(30,52,72,0.3)" stroke-width="2"/>
                    <!-- Chin Details -->
                    <rect x="52" y="274" width="16" height="16" rx="4" fill="var(--accent)"/>
                    <rect x="360" y="278" width="120" height="8" rx="4" fill="#A8B2BC"/>
                    <!-- CRT Glass Scanlines overlay -->
                    <line x1="48" y1="90" x2="492" y2="90" stroke="rgba(255,255,255,0.04)" stroke-width="2"/>
                    <line x1="48" y1="140" x2="492" y2="140" stroke="rgba(255,255,255,0.04)" stroke-width="2"/>
                    <line x1="48" y1="190" x2="492" y2="190" stroke="rgba(255,255,255,0.04)" stroke-width="2"/>
                    <!-- CRT Text Display -->
                    <text id="crtTerminalText1" x="68" y="95" font-family="'Space Mono', monospace" font-size="14" font-weight="700" fill="#6FB4E4" letter-spacing="1"></text>
                    <text id="crtTerminalText2" x="68" y="135" font-family="'Space Mono', monospace" font-size="14" font-weight="700" fill="#6FB4E4" letter-spacing="1"></text>
                    <text id="crtTerminalText3" x="68" y="175" font-family="'Space Mono', monospace" font-size="14" font-weight="700" fill="#A6E22E" letter-spacing="1"></text>
                    <!-- Blinking Cursor -->
                    <rect id="crtCursor" x="68" y="162" width="9" height="15" fill="#6FB4E4" style="animation:blink 0.8s infinite;"></rect>
                </svg>
            </div>

            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="#contactForm" class="chip shine-hover" style="background:var(--ink);color:var(--canvas);">→ SUBMIT PROJECT BRIEF</a>
                <a href="mailto:hello@ziibaysoft.com" class="chip">EMAIL US DIRECTLY</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. SPLIT SECTION (2-COL: LEFT FORM, RIGHT INFO) -->
<section id="contactForm" style="padding:32px 16px 56px;">
    <div style="max-width:1160px; margin:0 auto; display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:32px; align-items:start;">

        <!-- LEFT: FORM -->
        <div class="framed-panel" style="background:var(--card); padding:40px 32px; position:relative;" data-rv="deck-rise">
            <div class="eyebrow" style="margin-bottom:10px;">PROJECT BRIEF INTAKE</div>
            <h2 class="serif-heading" style="font-size:clamp(1.8rem, 3.5vw, 2.2rem); margin-bottom:24px;">tell us about your build</h2>

            <?php if (session()->getFlashdata('success')): ?>
                <!-- Animated Success Confirmation Card -->
                <div style="background:#ffffff; border:1px solid var(--accent); border-radius:10px; padding:36px 24px; text-align:center; box-shadow:0 12px 30px var(--accent-glow);" data-rv="blur-rise">
                    <!-- Clay Check Icon -->
                    <svg class="clay-icon" viewBox="0 0 96 96" style="width:64px; height:64px; margin-bottom:16px;">
                        <defs>
                            <linearGradient id="chk-g" x1="0" y1="0" x2="0" y2="1">
                                <stop offset="0%" stop-color="#ffffff"/>
                                <stop offset="100%" stop-color="#d3d7da"/>
                            </linearGradient>
                        </defs>
                        <circle cx="48" cy="48" r="36" fill="url(#chk-g)" stroke="rgba(28,43,58,0.18)" stroke-width="2"/>
                        <path d="M34 48 l10 10 l20 -20" fill="none" stroke="var(--accent)" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <h3 class="serif-heading" style="font-size:1.8rem; margin-bottom:10px;">Brief Received</h3>
                    <div class="chip" style="margin-bottom:16px;">REPLY WITHIN &lt; 24 HOURS GUARANTEED</div>
                    <p style="font-size:14px; line-height:1.7; color:var(--muted); max-width:480px; margin:0 auto 24px;">
                        <?= esc(session()->getFlashdata('success')) ?>
                    </p>
                    <a href="<?= url_to('contact') ?>" class="chip">→ SEND ANOTHER INQUIRY</a>
                </div>
            <?php else: ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div style="background:rgba(255,0,0,0.08); border:1px solid rgba(255,0,0,0.3); border-radius:6px; padding:16px; margin-bottom:20px; font-size:13px; color:var(--ink);">
                        <strong>ERROR:</strong> <?= esc(session()->getFlashdata('error')) ?>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('errors')): ?>
                    <div style="background:rgba(255,0,0,0.08); border:1px solid rgba(255,0,0,0.3); border-radius:6px; padding:16px; margin-bottom:20px; font-size:13px; color:var(--ink);">
                        <strong>VALIDATION NOTICE:</strong>
                        <ul style="margin:8px 0 0 16px; padding:0;">
                            <?php foreach (session()->getFlashdata('errors') as $err): ?>
                                <li><?= esc($err) ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?= base_url('contact') ?>" method="POST" style="display:flex; flex-direction:column; gap:18px;">
                    <?= csrf_field() ?>
                    <input type="hidden" name="source" value="VIP Contact Form">
                    
                    <!-- Honeypot -->
                    <div style="display:none;" aria-hidden="true">
                        <label for="website_url_hp">Leave empty</label>
                        <input type="text" name="website_url_hp" id="website_url_hp" tabindex="-1" autocomplete="off">
                    </div>

                    <!-- Name & Email Row -->
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px;">
                        <div>
                            <label for="name" class="hairline-label">Full Name <span style="color:var(--accent);">*</span></label>
                            <input type="text" id="name" name="name" value="<?= old('name') ?>" required class="hairline-input" placeholder="e.g. Eleanor Vance">
                        </div>
                        <div>
                            <label for="email" class="hairline-label">Email Address <span style="color:var(--accent);">*</span></label>
                            <input type="email" id="email" name="email" value="<?= old('email') ?>" required class="hairline-input" placeholder="eleanor@company.com">
                        </div>
                    </div>

                    <!-- Company & Phone Row -->
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px;">
                        <div>
                            <label for="company" class="hairline-label">Company Name (Optional)</label>
                            <input type="text" id="company" name="company" value="<?= old('company') ?>" class="hairline-input" placeholder="Vance Logistics Ltd">
                        </div>
                        <div>
                            <label for="phone" class="hairline-label">Phone / WhatsApp</label>
                            <input type="tel" id="phone" name="phone" value="<?= old('phone') ?>" class="hairline-input" placeholder="+1 (555) 019-2834">
                        </div>
                    </div>

                    <!-- Service & Budget Row -->
                    <?php
                    $serviceMap = [
                        'web-development' => 'Web Development',
                        'software-development' => 'Software Development',
                        'app-development' => 'App Development',
                        'seo' => 'Search Engine Optimization (SEO)',
                        'social-media-management' => 'Social Media Management',
                    ];
                    $selectedService = old('service', old('project_type', $preselected_service ?? ''));
                    if (isset($serviceMap[$selectedService])) {
                        $initServiceVal = $selectedService;
                        $initServiceLabel = $serviceMap[$selectedService];
                    } elseif (in_array($selectedService, $serviceMap)) {
                        $initServiceVal = array_search($selectedService, $serviceMap);
                        $initServiceLabel = $selectedService;
                    } else {
                        $initServiceVal = '';
                        $initServiceLabel = 'Select Service';
                    }

                    $currentBudget = old('budget', '');
                    $initBudgetVal = $currentBudget;
                    $initBudgetLabel = !empty($currentBudget) ? $currentBudget : 'Select Budget';
                    ?>
                    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(220px, 1fr)); gap:16px;">
                        <div>
                            <label class="hairline-label">Core Service <span style="color:var(--accent);">*</span></label>
                            <div class="dd" x-data="{open:false, value:'<?= esc($initServiceVal) ?>', label:'<?= esc($initServiceLabel) ?>'}"
                                 x-effect="if(value){ const err=document.getElementById('serviceError'); if(err) err.style.display='none'; $el.querySelector('.dd-btn')?.classList.remove('dd-shake'); }"
                                 @click.outside="open=false" @keydown.escape.window="open=false">
                                <input type="hidden" name="service" :value="value" id="serviceInput">
                                <button type="button" class="dd-btn" @click="open=!open" aria-haspopup="listbox">
                                    <span x-text="label || 'Select Service'"></span>
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         :style="open && 'transform:rotate(180deg)'">
                                        <path d="M6 9l6 6 6-6"/>
                                    </svg>
                                </button>
                                <div x-show="open" x-transition.origin.top class="dd-list" role="listbox" style="display:none;">
                                    <button type="button" class="dd-opt" :class="value==='web-development' && 'sel'"
                                        @click="value='web-development'; label='Web Development'; open=false">
                                        Web Development
                                    </button>
                                    <button type="button" class="dd-opt" :class="value==='software-development' && 'sel'"
                                        @click="value='software-development'; label='Software Development'; open=false">
                                        Software Development
                                    </button>
                                    <button type="button" class="dd-opt" :class="value==='app-development' && 'sel'"
                                        @click="value='app-development'; label='App Development'; open=false">
                                        App Development
                                    </button>
                                    <button type="button" class="dd-opt" :class="value==='seo' && 'sel'"
                                        @click="value='seo'; label='Search Engine Optimization (SEO)'; open=false">
                                        Search Engine Optimization (SEO)
                                    </button>
                                    <button type="button" class="dd-opt" :class="value==='social-media-management' && 'sel'"
                                        @click="value='social-media-management'; label='Social Media Management'; open=false">
                                        Social Media Management
                                    </button>
                                </div>
                            </div>
                            <span id="serviceError" class="dd-error-msg" style="display:none;">service is required</span>
                        </div>

                        <div>
                            <label class="hairline-label">Target Budget <span style="color:var(--accent);">*</span></label>
                            <div class="dd" x-data="{open:false, value:'<?= esc($initBudgetVal) ?>', label:'<?= esc($initBudgetLabel) ?>'}"
                                 x-effect="if(value){ const err=document.getElementById('budgetError'); if(err) err.style.display='none'; $el.querySelector('.dd-btn')?.classList.remove('dd-shake'); }"
                                 @click.outside="open=false" @keydown.escape.window="open=false">
                                <input type="hidden" name="budget" :value="value" id="budgetInput">
                                <button type="button" class="dd-btn" @click="open=!open" aria-haspopup="listbox">
                                    <span x-text="label || 'Select Budget'"></span>
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                         stroke="currentColor" stroke-width="2"
                                         :style="open && 'transform:rotate(180deg)'">
                                        <path d="M6 9l6 6 6-6"/>
                                    </svg>
                                </button>
                                <div x-show="open" x-transition.origin.top class="dd-list" role="listbox" style="display:none;">
                                    <button type="button" class="dd-opt" :class="value==='< $5,000' && 'sel'"
                                        @click="value='< $5,000'; label='< $5,000'; open=false">
                                        &lt; $5,000
                                    </button>
                                    <button type="button" class="dd-opt" :class="value==='$5,000 – $15,000' && 'sel'"
                                        @click="value='$5,000 – $15,000'; label='$5,000 – $15,000'; open=false">
                                        $5,000 – $15,000
                                    </button>
                                    <button type="button" class="dd-opt" :class="value==='$15,000 – $50,000' && 'sel'"
                                        @click="value='$15,000 – $50,000'; label='$15,000 – $50,000'; open=false">
                                        $15,000 – $50,000
                                    </button>
                                    <button type="button" class="dd-opt" :class="value==='$50,000+' && 'sel'"
                                        @click="value='$50,000+'; label='$50,000+'; open=false">
                                        $50,000+
                                    </button>
                                </div>
                            </div>
                            <span id="budgetError" class="dd-error-msg" style="display:none;">budget is required</span>
                        </div>
                    </div>

                    <!-- Message -->
                    <div>
                        <label for="message" class="hairline-label">Project Brief & Specifications <span style="color:var(--accent);">*</span></label>
                        <textarea id="message" name="message" rows="5" required class="hairline-input" style="resize:vertical;" placeholder="Describe your architecture requirements, user workflows, target launch date, or current technical bottlenecks..."><?= esc(old('message')) ?></textarea>
                    </div>

                    <!-- Submit & Privacy Note -->
                    <div style="display:flex; flex-direction:column; gap:12px; margin-top:8px;">
                        <button type="submit" class="chip shine-hover" style="background:var(--ink); color:var(--canvas); padding:15px 30px; font-size:12px; cursor:pointer; align-self:flex-start;">
                            → SEND PROJECT BRIEF
                        </button>
                        <span style="font-family:var(--mono); font-size:11px; color:var(--muted); letter-spacing:0.04em;">
                            ( 100% ) confidential — mutual NDA executed on request
                        </span>
                    </div>

                </form>
            <?php endif; ?>
        </div>

        <!-- RIGHT: INFO PANEL WITH FLOATING CLAY ICONS -->
        <div style="display:flex; flex-direction:column; gap:20px;">
            
            <article class="framed-panel" style="background:var(--card); padding:36px 28px; position:relative;" data-rv="deck-rise">
                <span class="corner-stat tr">( Direct ) engineering</span>
                <div class="eyebrow" style="margin-bottom:10px;">DIRECT CHANNELS</div>
                <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:24px;">engineering office</h3>

                <div style="display:flex; flex-direction:column; gap:24px;">
                    
                    <!-- Row 1: Clay Envelope -->
                    <div style="display:flex; gap:16px; align-items:flex-start;">
                        <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0; flex-shrink:0;">
                            <defs><linearGradient id="ic-env" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="100%" stop-color="#d3d7da"/></linearGradient></defs>
                            <rect x="14" y="24" width="68" height="48" rx="8" fill="url(#ic-env)" stroke="rgba(28,43,58,0.18)" stroke-width="2"/>
                            <path d="M16 28 l32 26 l32 -26" fill="none" stroke="var(--accent)" stroke-width="3" stroke-linecap="round"/>
                        </svg>
                        <div>
                            <div class="hairline-label" style="margin-bottom:2px;">Email Engineering</div>
                            <a href="mailto:hello@ziibaysoft.com" style="font-family:var(--mono); font-weight:700; font-size:13px; color:var(--ink); text-decoration:none;">
                                hello@ziibaysoft.com
                            </a>
                        </div>
                    </div>

                    <!-- Row 2: Clay Clock -->
                    <div style="display:flex; gap:16px; align-items:flex-start;">
                        <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0; flex-shrink:0; animation-delay:0.5s;">
                            <defs><linearGradient id="ic-clk" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="100%" stop-color="#d3d7da"/></linearGradient></defs>
                            <circle cx="48" cy="48" r="34" fill="url(#ic-clk)" stroke="rgba(28,43,58,0.18)" stroke-width="2"/>
                            <line x1="48" y1="48" x2="48" y2="28" stroke="var(--accent)" stroke-width="4" stroke-linecap="round"/>
                            <line x1="48" y1="48" x2="62" y2="48" stroke="var(--accent)" stroke-width="4" stroke-linecap="round"/>
                        </svg>
                        <div>
                            <div class="hairline-label" style="margin-bottom:2px;">Response SLA</div>
                            <div style="font-size:13px; font-weight:600; color:var(--ink);">
                                ( 24h ) average response time guaranteed
                            </div>
                        </div>
                    </div>

                    <!-- Row 3: Clay Globe-Pin -->
                    <div style="display:flex; gap:16px; align-items:flex-start;">
                        <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0; flex-shrink:0; animation-delay:1s;">
                            <defs><linearGradient id="ic-glb" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="100%" stop-color="#d3d7da"/></linearGradient></defs>
                            <circle cx="48" cy="44" r="28" fill="url(#ic-glb)" stroke="rgba(28,43,58,0.18)" stroke-width="2"/>
                            <ellipse cx="48" cy="44" rx="14" ry="28" fill="none" stroke="var(--accent)" stroke-width="2"/>
                            <line x1="20" y1="44" x2="76" y2="44" stroke="var(--accent)" stroke-width="2"/>
                        </svg>
                        <div>
                            <div class="hairline-label" style="margin-bottom:2px;">Delivery Hubs</div>
                            <div style="font-size:13px; font-weight:600; color:var(--ink);">
                                ( 3 ) hubs — US · UK · AU, follow-the-sun delivery
                            </div>
                        </div>
                    </div>

                    <!-- Row 4: Clay Chat (WhatsApp) -->
                    <div style="display:flex; gap:16px; align-items:flex-start;">
                        <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0; flex-shrink:0; animation-delay:1.5s;">
                            <defs><linearGradient id="ic-cht" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="100%" stop-color="#d3d7da"/></linearGradient></defs>
                            <rect x="20" y="24" width="56" height="42" rx="12" fill="url(#ic-cht)" stroke="rgba(28,43,58,0.18)" stroke-width="2"/>
                            <path d="M36 66 l-8 12 l14 -4 z" fill="url(#ic-cht)"/>
                            <circle cx="36" cy="45" r="3" fill="var(--accent)"/><circle cx="48" cy="45" r="3" fill="var(--accent)"/><circle cx="60" cy="45" r="3" fill="var(--accent)"/>
                        </svg>
                        <div>
                            <div class="hairline-label" style="margin-bottom:6px;">Instant Dispatch</div>
                            <a href="https://wa.me/<?= esc(config('App')->whatsappNumber ?? '1234567890') ?>?text=<?= urlencode("Hello Ziibay Soft, I would like to discuss an engineering project.") ?>" target="_blank" rel="noopener noreferrer" class="chip shine-hover">
                                → CHAT ON WHATSAPP
                            </a>
                        </div>
                    </div>

                </div>
            </article>

        </div>

    </div>
</section>

<!-- 3. WHAT HAPPENS NEXT (3 WORKFLOW BARS GROW ON SCROLL) -->
<section class="section-polished" style="max-width:1240px; margin:0 auto;">
    <div class="framed-panel" style="padding:48px 28px; max-width:1160px; margin:0 auto;" data-rv="blur-rise">
        <div style="text-align:center; margin-bottom:40px;">
            <div class="eyebrow" style="margin-bottom:10px;">CLEAR EXPECTATIONS</div>
            <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">what happens next</h2>
            <p style="font-size:14px; color:var(--muted); max-width:600px; margin:0 auto;">Our standard intake cadence ensures zero friction and complete alignment.</p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px;">
            
            <!-- Step 1 -->
            <div class="wf-col in" style="border:1px solid var(--line); border-radius:14px; padding:32px 24px; background:var(--card); display:flex; flex-direction:column;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                    <div class="tag">PHASE 01</div>
                    <span style="font-family:var(--mono); font-size:13px; font-weight:700; color:var(--accent);">24 HOURS</span>
                </div>
                <h3 class="serif-heading" style="font-size:1.35rem; margin-bottom:10px;">01 // Brief Review</h3>
                <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                    Our principal architect reviews your requirements, runs feasibility assessments, and prepares preliminary budget brackets.
                </p>
            </div>

            <!-- Step 2 -->
            <div class="wf-col in" style="border:1px solid var(--line); border-radius:14px; padding:32px 24px; background:var(--card); display:flex; flex-direction:column;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                    <div class="tag">PHASE 02</div>
                    <span style="font-family:var(--mono); font-size:13px; font-weight:700; color:var(--accent);">48 HOURS</span>
                </div>
                <h3 class="serif-heading" style="font-size:1.35rem; margin-bottom:10px;">02 // Discovery Call</h3>
                <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                    A focused technical call to clarify edge cases, data structures, integration APIs, and business success metrics.
                </p>
            </div>

            <!-- Step 3 -->
            <div class="wf-col in" style="border:1px solid var(--line); border-radius:14px; padding:32px 24px; background:var(--card); display:flex; flex-direction:column;">
                <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                    <div class="tag">PHASE 03</div>
                    <span style="font-family:var(--mono); font-size:13px; font-weight:700; color:var(--accent);">5 DAYS</span>
                </div>
                <h3 class="serif-heading" style="font-size:1.35rem; margin-bottom:10px;">03 // Proposal & Roadmap</h3>
                <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                    We deliver a complete architectural blueprint, milestone delivery timeline, fixed quote, and team pod allocation.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- 4. MINI FAQ (3 ACCORDION ROWS) -->
<section class="section-polished" style="max-width:1240px; margin:0 auto;">
    <div style="text-align:center; margin-bottom:36px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:10px;">FREQUENT INQUIRIES</div>
        <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">common questions</h2>
    </div>

    <div style="max-width:880px; margin:0 auto; display:flex; flex-direction:column; gap:14px;">
        
        <details class="card" style="padding:22px 26px; cursor:pointer; border-radius:14px;" open data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.05rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>How does Ziibay Soft structure project pricing?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:13px; line-height:1.7; color:var(--muted); margin:14px 0 0; padding-top:14px; border-top:1px solid var(--line);">
                We operate on transparent, milestone-gated fixed quotes for scoped deliverables, and flexible dedicated-team retainers for evolving product engineering. Every quote includes detailed architecture specifications, clear acceptance criteria, and zero hidden licensing fees.
            </p>
        </details>

        <details class="card" style="padding:22px 26px; cursor:pointer; border-radius:14px;" data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.05rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>What is the typical timeline for an end-to-end build?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:13px; line-height:1.7; color:var(--muted); margin:14px 0 0; padding-top:14px; border-top:1px solid var(--line);">
                Standard custom web applications and MVPs typically deploy within 4 to 8 weeks. Complex enterprise SaaS platforms, custom ERPs, and native mobile suites average 8 to 16 weeks, broken down into iterative two-week sprint milestones with live staging previews.
            </p>
        </details>

        <details class="card" style="padding:22px 26px; cursor:pointer; border-radius:14px;" data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.05rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>What kind of post-launch maintenance and SLA support do you provide?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:13px; line-height:1.7; color:var(--muted); margin:14px 0 0; padding-top:14px; border-top:1px solid var(--line);">
                Every deployment includes a 30-day complimentary warranty period. Post-launch, we offer structured monthly SLA tiers covering continuous security patching, database optimization, 24/7 uptime monitoring, server maintenance, and proactive feature enhancements.
            </p>
        </details>

    </div>
</section>

<!-- 5. CTA PANEL -->
<section style="padding:16px 16px 56px;">
    <div class="framed-panel" style="padding:48px 24px; text-align:center; max-width:880px; margin:0 auto;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">LET'S CONNECT</div>
        <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3.2rem); margin-bottom:18px;">
            ready to discuss / your project?
        </h2>
        <p style="font-size:15px; color:var(--muted); max-width:540px; margin:0 auto 28px;">
            Partner with Ziibay Soft to architect and launch your digital product with precision engineering.
        </p>
        <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="#contactForm" class="chip shine-hover" style="background:var(--ink); color:#ffffff;">→ GET A FREE CONSULTATION</a>
            <a href="<?= url_to('services') ?>" class="chip">EXPLORE SERVICES</a>
        </div>
    </div>
</section>

<!-- CRT Terminal Typewriter Script -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const l1 = "> INIT conversation ... OK";
    const l2 = "> awaiting your brief _";
    const l3 = "> response: < 24h";

    const t1 = document.getElementById('crtTerminalText1');
    const t2 = document.getElementById('crtTerminalText2');
    const t3 = document.getElementById('crtTerminalText3');
    const cursor = document.getElementById('crtCursor');

    if (!t1 || !t2 || !t3) return;

    let i = 0, j = 0, k = 0;

    function typeLine1() {
        if (i < l1.length) {
            t1.textContent += l1.charAt(i);
            i++;
            if (cursor) cursor.setAttribute('x', 68 + i * 9.5);
            setTimeout(typeLine1, 45);
        } else {
            if (cursor) {
                cursor.setAttribute('y', '122');
                cursor.setAttribute('x', '68');
            }
            setTimeout(typeLine2, 200);
        }
    }

    function typeLine2() {
        if (j < l2.length) {
            t2.textContent += l2.charAt(j);
            j++;
            if (cursor) cursor.setAttribute('x', 68 + j * 9.5);
            setTimeout(typeLine2, 45);
        } else {
            if (cursor) {
                cursor.setAttribute('y', '162');
                cursor.setAttribute('x', '68');
            }
            setTimeout(typeLine3, 200);
        }
    }

    function typeLine3() {
        if (k < l3.length) {
            t3.textContent += l3.charAt(k);
            k++;
            if (cursor) cursor.setAttribute('x', 68 + k * 9.5);
            setTimeout(typeLine3, 45);
        }
    }

    setTimeout(typeLine1, 400);

    // Custom Dropdown Validation on Submit
    const contactForm = document.querySelector('form[action*="contact"]');
    if (contactForm) {
        contactForm.addEventListener('submit', (e) => {
            let hasError = false;
            
            const serviceInput = document.getElementById('serviceInput');
            const serviceErr = document.getElementById('serviceError');
            if (serviceInput && (!serviceInput.value || serviceInput.value.trim() === '')) {
                hasError = true;
                const btn = serviceInput.closest('.dd')?.querySelector('.dd-btn');
                if (btn) {
                    btn.classList.remove('dd-shake');
                    void btn.offsetWidth;
                    btn.classList.add('dd-shake');
                }
                if (serviceErr) serviceErr.style.display = 'block';
            }

            const budgetInput = document.getElementById('budgetInput');
            const budgetErr = document.getElementById('budgetError');
            if (budgetInput && (!budgetInput.value || budgetInput.value.trim() === '')) {
                hasError = true;
                const btn = budgetInput.closest('.dd')?.querySelector('.dd-btn');
                if (btn) {
                    btn.classList.remove('dd-shake');
                    void btn.offsetWidth;
                    btn.classList.add('dd-shake');
                }
                if (budgetErr) budgetErr.style.display = 'block';
            }

            if (hasError) {
                e.preventDefault();
            }
        });
    }
});
</script>

<?= $this->endSection() ?>
