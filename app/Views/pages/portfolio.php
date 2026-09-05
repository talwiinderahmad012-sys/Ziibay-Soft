<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "Selected Work & Portfolio | Ziibay Soft",
  "description": "Explore custom software engineering, web application, and mobile system deployments delivered by Ziibay Soft.",
  "url": "<?= base_url('portfolio') ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 06 ) flagship builds</span>
        <span class="corner-stat tr">( 03 ) global markets</span>
        <span class="corner-stat bl">( 100% ) in-house</span>
        <span class="corner-stat br">( 2026 ) directory</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">DEPLOYMENTS DIRECTORY</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                selected work
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                Engineered digital solutions across e-commerce, cloud software, healthcare, and enterprise fintech.
            </p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="<?= url_to('contact') ?>" class="chip">→ DISCUSS YOUR BUILD</a>
                <a href="<?= url_to('case-studies') ?>" class="chip">VIEW CASE STUDIES</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. PORTFOLIO GRID -->
<section class="section-polished" style="max-width:1240px; margin:0 auto;">
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:24px; max-width:1200px; margin:0 auto;">
        
        <!-- Project 1: Aura Global Marketplace -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <div class="tag">E-COMMERCE · USA</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="p1-g" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                <rect x="18" y="24" width="60" height="48" rx="7" fill="url(#p1-g)" stroke="rgba(28,43,58,.18)"/>
                <line x1="18" y1="36" x2="78" y2="36" stroke="rgba(28,43,58,.18)"/>
                <circle cx="26" cy="30" r="2" fill="#c2c7cb"/><circle cx="32" cy="30" r="2" fill="#c2c7cb"/><circle cx="38" cy="30" r="2" fill="var(--accent)"/>
                <rect x="24" y="42" width="22" height="16" rx="3" fill="var(--clay-fill)"/>
                <rect x="50" y="43" width="22" height="3" rx="1.5" fill="#c2c7cb"/><rect x="50" y="50" width="18" height="3" rx="1.5" fill="#c2c7cb"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:8px;">Aura Luxury Retail</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                High-performance headless Shopify storefront & custom ERP synchronization for multi-currency international commerce.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:flex-end;">
                <div>
                    <div style="font-family:var(--mono); font-size:10px; opacity:0.6; text-transform:uppercase;">OUTCOME</div>
                    <div class="serif-heading" style="font-size:1.5rem; color:var(--ink);">+38% Conversions</div>
                </div>
                <a href="<?= url_to('case-studies') ?>" class="chip" style="font-size:10px;">DETAILS →</a>
            </div>
        </article>

        <!-- Project 2: Kinetix Logistics -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <div class="tag">SUPPLY CHAIN · UK</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="p2-g" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                <g fill="#c2c7cb"><rect x="45" y="18" width="6" height="10" rx="2"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(45 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(90 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(135 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(180 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(225 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(270 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(315 48 48)"/></g>
                <circle cx="48" cy="48" r="22" fill="url(#p2-g)" stroke="rgba(28,43,58,.18)"/>
                <circle cx="48" cy="48" r="8" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:8px;">Kinetix Cloud Dispatch</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Real-time automated freight routing platform handling 14,000 daily carrier shipments across Europe.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:flex-end;">
                <div>
                    <div style="font-family:var(--mono); font-size:10px; opacity:0.6; text-transform:uppercase;">OUTCOME</div>
                    <div class="serif-heading" style="font-size:1.5rem; color:var(--ink);">2.1s → 0.6s Speed</div>
                </div>
                <a href="<?= url_to('case-studies') ?>" class="chip" style="font-size:10px;">DETAILS →</a>
            </div>
        </article>

        <!-- Project 3: PulseCare Telehealth -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <div class="tag">HEALTHCARE · AU</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="p3-g" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                <rect x="32" y="18" width="32" height="60" rx="8" fill="url(#p3-g)" stroke="rgba(28,43,58,.18)"/>
                <rect x="36" y="28" width="24" height="38" rx="3" fill="var(--clay-fill)"/>
                <rect x="42" y="22" width="12" height="2.5" rx="1.25" fill="#c2c7cb"/>
                <circle cx="48" cy="72" r="2.5" fill="var(--accent)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:8px;">PulseCare Clinical App</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                HIPAA-compliant native iOS & Android application for end-to-end encrypted doctor-patient consultations.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:flex-end;">
                <div>
                    <div style="font-family:var(--mono); font-size:10px; opacity:0.6; text-transform:uppercase;">OUTCOME</div>
                    <div class="serif-heading" style="font-size:1.5rem; color:var(--ink);">99.99% Uptime</div>
                </div>
                <a href="<?= url_to('case-studies') ?>" class="chip" style="font-size:10px;">DETAILS →</a>
            </div>
        </article>

        <!-- Project 4: Horizon Fintech Platform -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <div class="tag">FINANCE · USA</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="p4-g" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                <circle cx="48" cy="48" r="28" fill="url(#p4-g)" stroke="rgba(28,43,58,.18)"/>
                <polygon points="50,26 36,50 48,50 44,70 62,44 50,44" fill="var(--accent)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:8px;">Horizon Asset Portal</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Institutional capital management dashboard with automated ledger reconciliation and multi-tenant security.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:flex-end;">
                <div>
                    <div style="font-family:var(--mono); font-size:10px; opacity:0.6; text-transform:uppercase;">OUTCOME</div>
                    <div class="serif-heading" style="font-size:1.5rem; color:var(--ink);">+140% Retention</div>
                </div>
                <a href="<?= url_to('case-studies') ?>" class="chip" style="font-size:10px;">DETAILS →</a>
            </div>
        </article>

        <!-- Project 5: Apex Global SEO -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <div class="tag">SAAS · UK</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="p5-g" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                <rect x="24" y="52" width="8" height="16" rx="2" fill="#c2c7cb"/>
                <rect x="36" y="44" width="8" height="24" rx="2" fill="url(#p5-g)"/>
                <rect x="48" y="36" width="8" height="32" rx="2" fill="#c2c7cb"/>
                <circle cx="60" cy="38" r="13" fill="var(--clay-fill)" stroke="rgba(28,43,58,.25)" stroke-width="3"/>
                <line x1="69" y1="48" x2="79" y2="58" stroke="var(--accent)" stroke-width="5" stroke-linecap="round"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:8px;">Apex Architecture SEO</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Complete technical SEO restructure, Core Web Vitals optimization, and programmatically generated search hubs.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:flex-end;">
                <div>
                    <div style="font-family:var(--mono); font-size:10px; opacity:0.6; text-transform:uppercase;">OUTCOME</div>
                    <div class="serif-heading" style="font-size:1.5rem; color:var(--ink);">3× Organic Traffic</div>
                </div>
                <a href="<?= url_to('case-studies') ?>" class="chip" style="font-size:10px;">DETAILS →</a>
            </div>
        </article>

        <!-- Project 6: Vanguard Omnichannel -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
                <div class="tag">HOSPITALITY · AU</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="p6-g" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                <rect x="48" y="44" width="30" height="22" rx="8" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/>
                <path d="M70 66 l4 7 -8 -2 z" fill="var(--clay-fill)"/>
                <rect x="18" y="26" width="38" height="26" rx="8" fill="url(#p6-g)" stroke="rgba(28,43,58,.18)"/>
                <path d="M28 52 l-4 8 9 -3 z" fill="url(#p6-g)"/>
                <circle cx="29" cy="39" r="2.5" fill="var(--accent)"/><circle cx="37" cy="39" r="2.5" fill="var(--accent)"/><circle cx="45" cy="39" r="2.5" fill="var(--accent)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:8px;">Vanguard Brand Suite</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Omnichannel social media management, brand authority production, and audience conversion campaigns for boutique resorts.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:flex-end;">
                <div>
                    <div style="font-family:var(--mono); font-size:10px; opacity:0.6; text-transform:uppercase;">OUTCOME</div>
                    <div class="serif-heading" style="font-size:1.5rem; color:var(--ink);">4.8★ Rating</div>
                </div>
                <a href="<?= url_to('case-studies') ?>" class="chip" style="font-size:10px;">DETAILS →</a>
            </div>
        </article>

    </div>
</section>

<?= $this->endSection() ?>
