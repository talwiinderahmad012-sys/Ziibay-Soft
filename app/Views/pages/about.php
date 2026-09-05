<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "AboutPage",
  "name": "About Us | Ziibay Soft",
  "description": "Ziibay Soft is a precision software engineering consultancy delivering custom web systems, mobile applications, and digital growth infrastructure.",
  "url": "<?= base_url('about') ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 03 ) delivery hubs</span>
        <span class="corner-stat tr">( 05 ) core services</span>
        <span class="corner-stat bl">( 100% ) in-house</span>
        <span class="corner-stat br">( 2026 ) standard</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">ENGINEERING IDENTITY</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                the ziibay standard
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                We build digital infrastructure for organizations that demand precision, performance, and uncompromising software craftsmanship.
            </p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="<?= url_to('contact') ?>" class="chip">→ DISCUSS YOUR PROJECT</a>
                <a href="<?= url_to('services') ?>" class="chip">EXPLORE SERVICES</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. BRAND STORY -->
<section style="padding:24px 16px 48px;">
    <div class="framed-panel" style="padding:48px 32px;" data-rv="blur-rise">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:40px; align-items:center;">
            <div>
                <div class="eyebrow" style="margin-bottom:12px;">OUR PHILOSOPHY</div>
                <h2 class="serif-heading" style="font-size:clamp(1.8rem, 4vw, 2.6rem); line-height:1.2; margin-bottom:16px;">
                    engineering without shortcuts
                </h2>
            </div>
            <div style="color:var(--ink); font-size:14px; line-height:1.8;">
                <p style="margin-bottom:16px;">
                    At Ziibay Soft, we believe software should be an enduring competitive advantage, not a recurring liability. Generic templates and bloated site-builders leave companies burdened with slow load times, security vulnerabilities, and brittle dependencies. We take the opposite approach: engineered from first principles, architected for throughput, and built to scale cleanly as your business grows.
                </p>
                <p style="color:var(--muted); margin:0;">
                    From high-concurrency database backends and headless CMS architectures to native mobile applications and search infrastructure, our in-house engineering team delivers maintainable codebases with documented APIs, automated testing, and guaranteed uptime.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 3. CORE VALUES (3 VALUE CARDS WITH CLAY ICONS) -->
<section style="padding:16px 16px 48px;">
    <div style="text-align:center; margin-bottom:36px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:10px;">PRINCIPLES OVER PROMISES</div>
        <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">how we build</h2>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px; max-width:1200px; margin:0 auto;">
        <!-- Card 1: Precision (Gear) -->
        <article class="framed-panel" style="background:var(--card); padding:36px 28px; display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <svg class="clay-icon" viewBox="0 0 96 96" style="width:64px; height:64px; margin-bottom:20px;"><defs><linearGradient id="v-gear" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
            <g fill="#c2c7cb"><rect x="45" y="18" width="6" height="10" rx="2"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(45 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(90 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(135 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(180 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(225 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(270 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(315 48 48)"/></g>
            <circle cx="48" cy="48" r="22" fill="url(#v-gear)" stroke="rgba(30,52,72,.18)"/>
            <circle cx="48" cy="48" r="8" fill="var(--clay-fill)" stroke="rgba(30,52,72,.15)"/></svg>
            <div class="chip" style="align-self:flex-start; margin-bottom:14px;">STANDARD 01</div>
            <h3 class="serif-heading" style="font-size:1.5rem; margin-bottom:10px;">Precision Architecture</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                Every schema, endpoint, and interface is mapped before execution. We enforce strict separation of concerns, defensive security protocols, and deterministic deployment pipelines.
            </p>
        </article>

        <!-- Card 2: Transparency (Gauge/Eye) -->
        <article class="framed-panel" style="background:var(--card); padding:36px 28px; display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <svg class="clay-icon" viewBox="0 0 96 96" style="width:64px; height:64px; margin-bottom:20px;"><defs><linearGradient id="v-eye" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
            <rect x="20" y="28" width="56" height="40" rx="8" fill="url(#v-eye)" stroke="rgba(30,52,72,.18)"/>
            <circle cx="48" cy="48" r="14" fill="var(--clay-fill)" stroke="rgba(30,52,72,.15)"/>
            <circle cx="48" cy="48" r="6" fill="var(--accent)"/>
            <line x1="48" y1="36" x2="48" y2="40" stroke="var(--accent)" stroke-width="2" stroke-linecap="round"/></svg>
            <div class="chip" style="align-self:flex-start; margin-bottom:14px;">STANDARD 02</div>
            <h3 class="serif-heading" style="font-size:1.5rem; margin-bottom:10px;">Absolute Transparency</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                No opaque agency black boxes. You receive weekly milestone builds, direct communication with dedicated engineers, readable version control, and full IP ownership on delivery.
            </p>
        </article>

        <!-- Card 3: Performance (Bolt) -->
        <article class="framed-panel" style="background:var(--card); padding:36px 28px; display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <svg class="clay-icon" viewBox="0 0 96 96" style="width:64px; height:64px; margin-bottom:20px;"><defs><linearGradient id="v-bolt" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
            <circle cx="48" cy="48" r="28" fill="url(#v-bolt)" stroke="rgba(30,52,72,.18)"/>
            <polygon points="50,26 36,50 48,50 44,70 62,44 50,44" fill="var(--accent)"/></svg>
            <div class="chip" style="align-self:flex-start; margin-bottom:14px;">STANDARD 03</div>
            <h3 class="serif-heading" style="font-size:1.5rem; margin-bottom:10px;">Obsessive Performance</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                Sub-second page rendering, optimal Core Web Vitals, lightweight asset bundles, and database queries indexed for maximum throughput under heavy concurrent traffic.
            </p>
        </article>
    </div>
</section>

<!-- 4. STATS STRIP -->
<section style="padding:16px 16px 48px;">
    <div class="framed-panel" style="padding:32px 24px; text-align:center;">
        <div style="display:flex; justify-content:space-around; align-items:center; flex-wrap:wrap; gap:24px;">
            <div>
                <div class="serif-heading" style="font-size:clamp(2rem, 5vw, 3.2rem);">( 03 )</div>
                <div class="eyebrow" style="margin-top:6px;">GLOBAL HUBS (US · UK · AU)</div>
            </div>
            <div>
                <div class="serif-heading" style="font-size:clamp(2rem, 5vw, 3.2rem);">( 05 )</div>
                <div class="eyebrow" style="margin-top:6px;">CORE DISCIPLINES</div>
            </div>
            <div>
                <div class="serif-heading" style="font-size:clamp(2rem, 5vw, 3.2rem);">( 100% )</div>
                <div class="eyebrow" style="margin-top:6px;">IN-HOUSE ENGINEERING</div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
