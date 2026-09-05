<?= $this->extend('layouts/main') ?>

<?= $this->section('head') ?>
<style>
/* Line-mask Heading Reveal */
.lm { overflow: hidden; display: block; }
.lm > span {
    display: block;
    transform: translateY(110%);
    transition: transform 1s cubic-bezier(.2,.7,.2,1);
}
.in .lm > span, h2.in .lm > span, [data-rv].in .lm > span {
    transform: none;
}

/* Category Divider Draw */
.cat-divider {
    transform: scaleX(0);
    transform-origin: left;
    transition: transform 1.2s cubic-bezier(0.16, 1, 0.3, 1) 0.2s;
}
.in .cat-divider, .cat-divider.in, [data-rv].in .cat-divider {
    transform: scaleX(1);
}

/* Marquee Strip */
.marquee {
    overflow: hidden;
    border-block: 1px solid var(--line);
    padding: 14px 0;
    background: rgba(255,255,255,0.25);
    margin: 0 auto 40px;
    max-width: 1240px;
}
.marquee-track {
    display: inline-block;
    white-space: nowrap;
    font: 700 12px var(--mono);
    letter-spacing: .2em;
    color: var(--muted);
    animation: mq 28s linear infinite;
}
@keyframes mq {
    to { transform: translateX(-50%); }
}

/* Service Card 3D Tilt & Shine */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 24px;
    perspective: 900px;
}
.svc-card {
    position: relative;
    overflow: hidden;
    transform-style: preserve-3d;
    background: linear-gradient(180deg, var(--card), color-mix(in srgb, var(--card) 92%, var(--accent-soft)));
    border: 1px solid var(--line);
    border-radius: 18px;
    padding: 28px;
    display: flex;
    flex-direction: column;
    gap: 14px;
    box-shadow: 0 22px 55px rgba(28,53,105,0.10), inset 0 1px 0 rgba(255,255,255,0.75);
    transition: transform 0.45s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.45s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.45s ease;
}
.svc-card::before {
    content: "";
    position: absolute;
    top: 16px;
    right: 16px;
    width: 34px;
    height: 2px;
    background: var(--gold);
    opacity: 0.75;
    z-index: 2;
    pointer-events: none;
}
.svc-card::after {
    content: "";
    position: absolute;
    inset: 0;
    pointer-events: none;
    background: linear-gradient(120deg, transparent 25%, rgba(255,255,255,.55) 50%, transparent 75%);
    transform: translateX(-130%);
    transition: transform .9s ease;
    z-index: 3;
}
.svc-card:hover::after {
    transform: translateX(130%);
}
.svc-card:hover {
    transform: translateY(-7px);
    border-color: color-mix(in srgb, var(--accent) 55%, var(--line));
    box-shadow: 0 30px 70px rgba(28,53,105,.16), inset 0 1px 0 rgba(255,255,255,.85);
}
.svc-card:hover .clay-icon {
    transform: translateY(-6px) scale(1.06) rotate(-2deg);
}
.svc-card .clay-icon {
    transition: transform .45s ease;
}

/* Workflow Upgrades */
.in .wf-connector {
    transform: scaleX(1) !important;
}
.wf-col {
    transition: transform 1s cubic-bezier(0.16, 1, 0.3, 1), background 0.3s ease, box-shadow 0.3s ease;
}
.wf-col:hover {
    background: var(--card);
    box-shadow: 0 10px 25px rgba(28,43,58,0.08);
}
.wf-col:hover .wf-num {
    color: var(--accent) !important;
    opacity: 1 !important;
}

/* Synergy Pulse */
@keyframes icon-pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.08); }
    100% { transform: scale(1); }
}
.in .synergy-icon {
    animation: icon-pulse 0.8s ease-out;
}

/* FAQ */
.faq-row {
    border-bottom: 1px solid var(--line);
}
.faq-btn {
    width: 100%;
    padding: 20px 8px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: none;
    border: none;
    cursor: pointer;
    text-align: left;
    color: var(--ink);
    font-family: var(--sans);
    font-weight: 600;
    font-size: 15px;
}
.faq-btn:hover {
    color: var(--accent);
}

/* Reduced Motion Safety */
@media (prefers-reduced-motion: reduce) {
    .marquee-track, .clay-icon, .synergy-icon { animation: none !important; }
    .lm > span { transform: none !important; }
    .cat-divider, .wf-connector { transform: none !important; }
    * { transition-duration: .01ms !important; }
}
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO SECTION -->
<section class="light-panel" style="margin:14px auto 32px; padding:64px 24px 40px; text-align:center; position:relative; max-width:1240px;" data-rv>
    <div class="stat-corner tl">
        <div class="stat-val">( 05 )</div>
        <div class="stat-lbl">core services</div>
    </div>
    <div class="stat-corner tr">
        <div class="stat-val">( 02 )</div>
        <div class="stat-lbl">growth channels</div>
    </div>
    <div class="stat-corner bl">
        <div class="stat-val">( 04 )</div>
        <div class="stat-lbl">step workflow</div>
    </div>
    <div class="stat-corner br">
        <div class="stat-val">( 100% )</div>
        <div class="stat-lbl">in-house engineering</div>
    </div>

    <div class="eyebrow" style="margin-bottom:12px;">ENGINEERING DIRECTORY</div>
    <h1 class="serif-heading" style="font-size:clamp(2.4rem, 5.5vw, 4.2rem); max-width:860px; margin:0 auto 16px; line-height:1.15;">
        <span class="lm"><span>Digital Services For Ambitious Brands</span></span>
    </h1>
    <p style="max-width:680px; margin:0 auto 20px; font-size:15px; line-height:1.6; opacity:0.85;">
        From scalable web architecture to strategic digital growth. We engineer comprehensive digital solutions tailored to your operational and marketing objectives.
    </p>

    <!-- Floating Clay 3D Object -->
    <div style="margin:0 auto 24px; width:140px; height:80px; display:flex; justify-content:center; align-items:center;">
        <svg class="clay-icon" style="width:140px; height:80px; margin:0;" viewBox="0 0 96 68">
            <defs>
                <linearGradient id="hero_zw_clay" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0" stop-color="#ffffff"/>
                    <stop offset="1" stop-color="#d3d7da"/>
                </linearGradient>
            </defs>
            <rect x="6" y="6" width="84" height="56" rx="8" fill="url(#hero_zw_clay)" stroke="rgba(28,43,58,.18)"/>
            <line x1="6" y1="20" x2="90" y2="20" stroke="rgba(28,43,58,.18)"/>
            <circle cx="16" cy="13" r="2.5" fill="var(--accent)"/>
            <circle cx="24" cy="13" r="2.5" fill="var(--accent)"/>
            <circle cx="32" cy="13" r="2.5" fill="var(--accent)"/>
            <rect x="16" y="28" width="30" height="24" rx="3" fill="var(--clay-fill)"/>
            <rect x="52" y="28" width="28" height="4" rx="2" fill="var(--accent)"/>
            <rect x="52" y="36" width="24" height="4" rx="2" fill="var(--accent)"/>
            <rect x="52" y="44" width="16" height="4" rx="2" fill="rgba(28,43,58,0.3)"/>
        </svg>
    </div>

    <div style="display:flex; justify-content:center; gap:14px; flex-wrap:wrap;">
        <a href="<?= url_to('contact') ?>" class="chip">→ GET A FREE CONSULTATION</a>
        <a href="#capabilities" class="chip">EXPLORE CAPABILITIES ↓</a>
    </div>
</section>

<!-- 1.5 MONO MARQUEE STRIP -->
<div class="marquee" data-rv>
    <div class="marquee-track">
        WEB DEVELOPMENT <span class="star-gold">✳</span> SOFTWARE DEVELOPMENT <span class="star-gold">✳</span> APP DEVELOPMENT <span class="star-gold">✳</span> SEO SERVICES <span class="star-gold">✳</span> SOCIAL MEDIA MANAGEMENT <span class="star-gold">✳</span> WEB DEVELOPMENT <span class="star-gold">✳</span> SOFTWARE DEVELOPMENT <span class="star-gold">✳</span> APP DEVELOPMENT <span class="star-gold">✳</span> SEO SERVICES <span class="star-gold">✳</span> SOCIAL MEDIA MANAGEMENT <span class="star-gold">✳</span>
    </div>
</div>

<!-- 2. SERVICES BY CATEGORY -->
<section id="capabilities" style="padding:32px 24px; max-width:1240px; margin:0 auto;">
    <?php foreach($categories as $categoryName => $services): ?>
        <?php if(!empty($services)): ?>
            <div style="margin-bottom:48px;" data-rv>
                <!-- Category Header -->
                <div style="display:flex; justify-content:space-between; align-items:flex-end; padding-bottom:12px;">
                    <div>
                        <div class="eyebrow" style="margin-bottom:8px;"><?= esc($categoryName) ?></div>
                        <h2 class="serif-heading" style="font-size:clamp(2rem, 4vw, 2.8rem);">
                            <span class="lm"><span><?= esc($categoryName) ?> Services</span></span>
                        </h2>
                    </div>
                    <span style="font-family:var(--mono); font-size:11px; letter-spacing:0.12em; opacity:0.6;">CAPABILITIES</span>
                </div>
                <!-- Drawing Divider -->
                <div class="cat-divider" style="height:1px; background:var(--line); margin-bottom:32px;"></div>

                <!-- Services Grid -->
                <div class="services-grid">
                    <?php $serviceIndex = 0; foreach($services as $service): $serviceIndex++; ?>
                    <article class="svc-card" data-rv="deck-rise">
                        <!-- Top Row: Tag Chip + Number -->
                        <div style="display:flex; justify-content:space-between; align-items:flex-start; gap:12px;">
                            <span class="chip" style="font-size:10px; max-width:200px;"><?= esc($service['name']) ?></span>
                            <span style="font-family:var(--serif); font-size:20px; opacity:0.4;">/ <?= str_pad($serviceIndex, 2, '0', STR_PAD_LEFT) ?> /</span>
                        </div>

                        <!-- Clay 3D Icon by Slug -->
                        <div style="margin:6px 0;">
                            <?php if ($service['slug'] === 'web-development'): ?>
                                <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw1_<?= $serviceIndex ?>" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                                <rect x="18" y="24" width="60" height="48" rx="8" fill="url(#zw1_<?= $serviceIndex ?>)" stroke="rgba(28,43,58,.18)"/>
                                <line x1="18" y1="38" x2="78" y2="38" stroke="rgba(28,43,58,.18)"/>
                                <circle cx="28" cy="31" r="2.5" fill="var(--accent)"/><circle cx="36" cy="31" r="2.5" fill="var(--accent)"/><circle cx="44" cy="31" r="2.5" fill="var(--accent)"/>
                                <rect x="28" y="46" width="22" height="18" rx="3" fill="var(--clay-fill)"/><rect x="54" y="46" width="14" height="4" rx="2" fill="var(--accent)"/><rect x="54" y="54" width="14" height="4" rx="2" fill="var(--accent)"/></svg>
                            <?php elseif ($service['slug'] === 'software-development'): ?>
                                <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw2_<?= $serviceIndex ?>" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                                <circle cx="48" cy="48" r="22" fill="url(#zw2_<?= $serviceIndex ?>)" stroke="rgba(28,43,58,.18)"/>
                                <circle cx="48" cy="48" r="9" fill="var(--clay-fill)" stroke="rgba(28,43,58,.18)"/>
                                <rect x="44" y="16" width="8" height="10" rx="3" fill="url(#zw2_<?= $serviceIndex ?>)" stroke="rgba(28,43,58,.18)"/>
                                <rect x="44" y="70" width="8" height="10" rx="3" fill="url(#zw2_<?= $serviceIndex ?>)" stroke="rgba(28,43,58,.18)"/>
                                <rect x="16" y="44" width="10" height="8" rx="3" fill="url(#zw2_<?= $serviceIndex ?>)" stroke="rgba(28,43,58,.18)"/>
                                <rect x="70" y="44" width="10" height="8" rx="3" fill="url(#zw2_<?= $serviceIndex ?>)" stroke="rgba(28,43,58,.18)"/>
                                <circle cx="48" cy="48" r="4" fill="var(--accent)"/></svg>
                            <?php elseif ($service['slug'] === 'app-development'): ?>
                                <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw3_<?= $serviceIndex ?>" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                                <rect x="30" y="18" width="36" height="60" rx="10" fill="url(#zw3_<?= $serviceIndex ?>)" stroke="rgba(28,43,58,.18)"/>
                                <rect x="36" y="28" width="24" height="38" rx="4" fill="var(--clay-fill)"/>
                                <line x1="44" y1="23" x2="52" y2="23" stroke="var(--accent)" stroke-width="2" stroke-linecap="round"/>
                                <circle cx="48" cy="71" r="3" fill="var(--accent)"/></svg>
                            <?php elseif (in_array($service['slug'], ['seo', 'seo-services'])): ?>
                                <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw4_<?= $serviceIndex ?>" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                                <rect x="24" y="52" width="8" height="16" rx="2" fill="#c2c7cb"/>
                                <rect x="36" y="44" width="8" height="24" rx="2" fill="url(#zw4_<?= $serviceIndex ?>)"/>
                                <rect x="48" y="36" width="8" height="32" rx="2" fill="#c2c7cb"/>
                                <circle cx="60" cy="38" r="13" fill="var(--clay-fill)" stroke="rgba(28,43,58,.25)" stroke-width="3"/>
                                <line x1="69" y1="48" x2="79" y2="58" stroke="var(--accent)" stroke-width="5" stroke-linecap="round"/></svg>
                            <?php elseif ($service['slug'] === 'social-media-management'): ?>
                                <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw5_<?= $serviceIndex ?>" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                                <rect x="48" y="44" width="30" height="22" rx="8" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/>
                                <path d="M70 66 l4 7 -8 -2 z" fill="var(--clay-fill)"/>
                                <rect x="18" y="26" width="38" height="26" rx="8" fill="url(#zw5_<?= $serviceIndex ?>)" stroke="rgba(28,43,58,.18)"/>
                                <path d="M28 52 l-4 8 9 -3 z" fill="url(#zw5_<?= $serviceIndex ?>)"/>
                                <circle cx="29" cy="39" r="2.5" fill="var(--accent)"/><circle cx="37" cy="39" r="2.5" fill="var(--accent)"/><circle cx="45" cy="39" r="2.5" fill="var(--accent)"/></svg>
                            <?php else: ?>
                                <svg class="clay-icon" viewBox="0 0 96 96"><defs><linearGradient id="zw6_<?= $serviceIndex ?>" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                                <g stroke="rgba(28,43,58,.18)">
                                <rect x="20" y="20" width="26" height="26" rx="6" fill="url(#zw6_<?= $serviceIndex ?>)"/>
                                <rect x="50" y="20" width="26" height="26" rx="6" fill="var(--clay-fill)"/>
                                <rect x="20" y="50" width="26" height="26" rx="6" fill="var(--clay-fill)"/>
                                <rect x="50" y="50" width="26" height="26" rx="6" fill="url(#zw6_<?= $serviceIndex ?>)"/>
                                </g></svg>
                            <?php endif; ?>
                        </div>

                        <h3 style="font-family:var(--serif); font-size:22px; margin:0;"><?= esc($service['name']) ?></h3>

                        <p style="font-size:13px; line-height:1.6; opacity:0.85; margin:0; flex-grow:1;">
                            <?= esc($service['overview'] ?? $service['seo_description']) ?>
                        </p>

                        <?php if(!empty($service['capabilities'])): ?>
                            <div style="display:flex; flex-direction:column; gap:8px; padding-top:12px; border-top:1px solid var(--line);">
                                <?php $count = 0; foreach($service['capabilities'] as $cap): if($count++ >= 3) break; ?>
                                    <div style="font:12px var(--sans); color:var(--muted); line-height:1.5;">
                                        <span style="font-family:var(--mono); color:var(--accent); margin-right:6px;">—</span><?= esc($cap['title']) ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                        <div style="padding-top:14px; border-top:1px solid var(--line); margin-top:auto;">
                            <a href="<?= url_to('service-detail', $service['slug']) ?>" style="font-family:var(--mono); font-size:11px; font-weight:700; text-decoration:none; color:var(--ink);">
                                EXPLORE SERVICE →
                            </a>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
</section>

<!-- 3. SYSTEM SYNERGY (2-col panel) -->
<section class="light-panel" style="padding:64px 28px; max-width:1240px; margin:32px auto;" data-rv>
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:48px; align-items:center;">
        <!-- Left Content -->
        <div>
            <div class="eyebrow" style="margin-bottom:12px;">SYSTEM SYNERGY</div>
            <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3.2rem); margin-bottom:20px; line-height:1.15;">
                <span class="lm"><span>An Integrated Ecosystem</span></span>
            </h2>
            <p style="font-size:14px; line-height:1.7; opacity:0.85; margin-bottom:16px;">
                Digital success rarely relies on a single service. Our approach integrates robust technical engineering with strategic digital growth. We build scalable platforms that are optimized for search engines from day one, ensuring your digital presence is both structurally sound and highly visible.
            </p>
            <p style="font-size:14px; line-height:1.7; opacity:0.85; margin-bottom:28px;">
                By aligning custom software development with SEO and consistent brand management, we create a unified digital ecosystem that drives real business results without friction between disparate agencies.
            </p>
            <a href="<?= url_to('about') ?>" class="chip">LEARN OUR APPROACH →</a>
        </div>

        <!-- Right Panel (Monochrome Clay Rows) -->
        <div style="background:var(--card); border:1px solid var(--line); border-radius:10px; padding:32px; display:flex; flex-direction:column; gap:24px; box-shadow:0 10px 30px rgba(28,43,58,0.06);">
            <!-- Row 1 -->
            <div style="display:flex; gap:16px; align-items:flex-start;">
                <div class="synergy-icon" style="width:48px; height:48px; border-radius:8px; background:linear-gradient(180deg, #ffffff 0%, #d3d7da 100%); border:1px solid rgba(28,43,58,0.18); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="16 18 22 12 16 6"></polyline>
                        <polyline points="8 6 2 12 8 18"></polyline>
                    </svg>
                </div>
                <div>
                    <h4 style="font-family:var(--serif); font-size:16px; margin:0 0 4px; color:var(--ink);">Architecture & Development</h4>
                    <p style="font-size:13px; opacity:0.8; margin:0; line-height:1.5;">The secure, scalable technical foundation.</p>
                </div>
            </div>

            <div style="height:1px; background:var(--line); opacity:0.4;"></div>

            <!-- Row 2 -->
            <div style="display:flex; gap:16px; align-items:flex-start;">
                <div class="synergy-icon" style="width:48px; height:48px; border-radius:8px; background:linear-gradient(180deg, #ffffff 0%, #d3d7da 100%); border:1px solid rgba(28,43,58,0.18); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <div>
                    <h4 style="font-family:var(--serif); font-size:16px; margin:0 0 4px; color:var(--ink);">Search Optimization (SEO)</h4>
                    <p style="font-size:13px; opacity:0.8; margin:0; line-height:1.5;">Built-in technical compliance and content strategy.</p>
                </div>
            </div>

            <div style="height:1px; background:var(--line); opacity:0.4;"></div>

            <!-- Row 3 -->
            <div style="display:flex; gap:16px; align-items:flex-start;">
                <div class="synergy-icon" style="width:48px; height:48px; border-radius:8px; background:linear-gradient(180deg, #ffffff 0%, #d3d7da 100%); border:1px solid rgba(28,43,58,0.18); display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="var(--accent)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                    </svg>
                </div>
                <div>
                    <h4 style="font-family:var(--serif); font-size:16px; margin:0 0 4px; color:var(--ink);">Brand & Community Management</h4>
                    <p style="font-size:13px; opacity:0.8; margin:0; line-height:1.5;">Consistent, strategic multi-platform communication.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. WORKFLOW PROTOCOL (Bar columns) -->
<section class="light-panel" style="padding:64px 24px; max-width:1240px; margin:32px auto;" data-rv>
    <div style="text-align:center; margin-bottom:32px;">
        <div class="eyebrow" style="margin-bottom:12px;">WORKFLOW PROTOCOL</div>
        <h2 class="serif-heading section-title">
            <span class="lm"><span>Our Process</span></span>
        </h2>
        <p style="max-width:680px; margin:0 auto; font-size:14px; opacity:0.8; line-height:1.6;">
            We maintain a disciplined, transparent approach to every project, ensuring technical excellence and strategic alignment.
        </p>
    </div>

    <div style="position:relative;">
        <div class="wf-connector" style="position:absolute; top:28px; left:8%; right:8%; height:1px; border-top:1px dashed var(--line); transform:scaleX(0); transform-origin:left; transition:transform 1.2s cubic-bezier(0.16,1,0.3,1) 0.3s; z-index:0; pointer-events:none;"></div>
        <div class="bars" style="margin-top:24px; position:relative; z-index:1;">
            <div class="wf-col" style="height:70%;">
                <div class="wf-num" style="font-family:var(--mono); font-size:10px; opacity:0.5; margin-bottom:6px; transition:color 0.3s;">/ 01 //</div>
                <div style="font-weight:600; font-size:13px; margin-bottom:6px; text-align:center; padding:0 8px;">Discovery & Strategy</div>
                <p style="font-size:11px; opacity:0.75; text-align:center; padding:0 12px; margin:0 0 12px;">Understanding your business logic, audience, and technical requirements.</p>
            </div>
            <div class="wf-col" style="height:85%;">
                <div class="wf-num" style="font-family:var(--mono); font-size:10px; opacity:0.5; margin-bottom:6px; transition:color 0.3s;">/ 02 //</div>
                <div style="font-weight:600; font-size:13px; margin-bottom:6px; text-align:center; padding:0 8px;">Architecture & Planning</div>
                <p style="font-size:11px; opacity:0.75; text-align:center; padding:0 12px; margin:0 0 12px;">Designing the database schema, UI flow, and technical SEO structure.</p>
            </div>
            <div class="wf-col highlight" style="height:100%;">
                <div class="wf-num" style="font-family:var(--mono); font-size:10px; opacity:0.5; margin-bottom:6px; transition:color 0.3s;">/ 03 //</div>
                <div style="font-weight:600; font-size:13px; margin-bottom:6px; text-align:center; padding:0 8px;">Execution & Engineering</div>
                <p style="font-size:11px; opacity:0.75; text-align:center; padding:0 12px; margin:0 0 12px;">Writing clean, secure code and implementing content strategies.</p>
            </div>
            <div class="wf-col" style="height:80%;">
                <div class="wf-num" style="font-family:var(--mono); font-size:10px; opacity:0.5; margin-bottom:6px; transition:color 0.3s;">/ 04 //</div>
                <div style="font-weight:600; font-size:13px; margin-bottom:6px; text-align:center; padding:0 8px;">Launch & Optimization</div>
                <p style="font-size:11px; opacity:0.75; text-align:center; padding:0 12px; margin:0 0 12px;">Deployment, continuous performance monitoring, and iterative improvement.</p>
            </div>
        </div>
    </div>
</section>

<!-- 5. FAQ PROTOCOL -->
<section style="padding:64px 24px; max-width:900px; margin:0 auto;" data-rv>
    <div style="text-align:center; margin-bottom:40px;">
        <div class="eyebrow" style="margin-bottom:12px;">FAQ PROTOCOL</div>
        <h2 class="serif-heading section-title">
            <span class="lm"><span>Service Frequently Asked Questions</span></span>
        </h2>
    </div>

    <div style="display:flex; flex-direction:column;" x-data="{ activeAccordion: null }">
        <!-- Item 1 -->
        <div class="faq-row">
            <button @click="activeAccordion = activeAccordion === 1 ? null : 1" class="faq-btn">
                <span><span style="font-family:var(--mono); font-size:12px; opacity:0.5; margin-right:12px;">/ 01 /</span>Can I combine multiple services?</span>
                <span style="font-family:var(--mono); font-size:16px; transition:transform 0.3s;" :style="activeAccordion === 1 ? 'transform:rotate(90deg)' : ''">→</span>
            </button>
            <div x-show="activeAccordion === 1" x-collapse style="display: none;">
                <div style="padding:0 8px 20px; font-size:14px; line-height:1.7; opacity:0.85;">
                    Yes. In fact, combining Web Development with SEO Services from the start is highly recommended. It ensures the technical architecture is perfectly aligned with search engine requirements before launch.
                </div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="faq-row">
            <button @click="activeAccordion = activeAccordion === 2 ? null : 2" class="faq-btn">
                <span><span style="font-family:var(--mono); font-size:12px; opacity:0.5; margin-right:12px;">/ 02 /</span>Do you guarantee specific outcomes?</span>
                <span style="font-family:var(--mono); font-size:16px; transition:transform 0.3s;" :style="activeAccordion === 2 ? 'transform:rotate(90deg)' : ''">→</span>
            </button>
            <div x-show="activeAccordion === 2" x-collapse style="display: none;">
                <div style="padding:0 8px 20px; font-size:14px; line-height:1.7; opacity:0.85;">
                    We guarantee professional engineering, adherence to technical best practices, and honest strategy. We do not make unrealistic promises like "guaranteed #1 Google rankings" or "viral social growth," as these are outside direct control and often imply manipulative tactics.
                </div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="faq-row">
            <button @click="activeAccordion = activeAccordion === 3 ? null : 3" class="faq-btn">
                <span><span style="font-family:var(--mono); font-size:12px; opacity:0.5; margin-right:12px;">/ 03 /</span>Are your services performed in-house?</span>
                <span style="font-family:var(--mono); font-size:16px; transition:transform 0.3s;" :style="activeAccordion === 3 ? 'transform:rotate(90deg)' : ''">→</span>
            </button>
            <div x-show="activeAccordion === 3" x-collapse style="display: none;">
                <div style="padding:0 8px 20px; font-size:14px; line-height:1.7; opacity:0.85;">
                    Yes. Our core engineering and strategic services are performed by our dedicated professional teams to ensure strict quality control and seamless communication.
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6. FINAL CTA -->
<section class="dark-panel" style="padding:64px 24px; text-align:center; max-width:1240px; margin:32px auto 0;" data-rv>
    <div class="eyebrow" style="margin-bottom:12px;">TURN AMBITIOUS IDEAS INTO POWERFUL SOFTWARE</div>
    <h2 class="serif-heading" style="font-size:clamp(2.2rem,5vw,3.8rem); line-height:1.15; margin-bottom:20px;">
        <span class="lm"><span>Ready To Discuss</span></span>
        <span class="lm"><span>Your Project?</span></span>
    </h2>
    <p style="max-width:600px; margin:0 auto 28px; font-size:14px; opacity:0.8; line-height:1.6;">
        Contact our team to explore how our digital services can support your business objectives.
    </p>
    <div>
        <a href="<?= url_to('contact') ?>" class="chip">→ GET A FREE CONSULTATION</a>
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReducedMotion) return;

    // 1. Service Card 3D Tilt
    document.querySelectorAll('.svc-card').forEach(card => {
        card.addEventListener('mousemove', e => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            const rx = -(y / (rect.height / 2)) * 4;
            const ry = (x / (rect.width / 2)) * 4;
            card.style.transform = `perspective(900px) translateY(-6px) rotateX(${rx.toFixed(2)}deg) rotateY(${ry.toFixed(2)}deg)`;
        });
        card.addEventListener('mouseleave', () => {
            card.style.transform = '';
        });
    });

    // 2. Magnetic Chips
    document.querySelectorAll('.chip').forEach(btn => {
        btn.addEventListener('mousemove', e => {
            const rect = btn.getBoundingClientRect();
            const x = (e.clientX - rect.left - rect.width / 2) * 0.25;
            const y = (e.clientY - rect.top - rect.height / 2) * 0.25;
            const clampX = Math.max(-6, Math.min(6, x));
            const clampY = Math.max(-6, Math.min(6, y));
            btn.style.transform = `translate(${clampX}px, ${clampY}px)`;
        });
        btn.addEventListener('mouseleave', () => {
            btn.style.transform = '';
        });
    });
});
</script>
<?= $this->endSection() ?>
