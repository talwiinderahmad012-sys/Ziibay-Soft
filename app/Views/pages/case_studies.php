<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "Case Studies & Architectural Proof | Ziibay Soft",
  "description": "Read in-depth case studies detailing technical challenges, custom engineering approaches, and measurable business results delivered by Ziibay Soft.",
  "url": "<?= base_url('case-studies') ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 03 ) in-depth reports</span>
        <span class="corner-stat tr">( 100% ) verified outcomes</span>
        <span class="corner-stat bl">( 2026 ) audit standard</span>
        <span class="corner-stat br">( 05 ) disciplines</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">EMPIRICAL EVIDENCE</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                proof over promises
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                Technical breakdowns detailing the problems we solved, the architectures we deployed, and the measurable business outcomes delivered.
            </p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="<?= url_to('contact') ?>" class="chip">→ DISCUSS YOUR CHALLENGE</a>
                <a href="<?= url_to('portfolio') ?>" class="chip">VIEW PORTFOLIO</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. CASE STUDY REPORTS -->
<section class="section-polished" style="max-width:1240px; margin:0 auto;">
    <div style="max-width:1100px; margin:0 auto; display:flex; flex-direction:column; gap:32px;">

        <!-- Case 1: E-Commerce -->
        <article class="card" style="padding:40px 32px; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:24px;">
                <div class="tag">E-COMMERCE · HIGH CONCURRENCY</div>
                <div style="font-family:var(--mono); font-size:11px; opacity:0.6;">REPORT REF: CS-01</div>
            </div>

            <h2 class="serif-heading" style="font-size:clamp(1.8rem, 4vw, 2.4rem); margin-bottom:24px;">
                Aura Global: Headless Commerce & Multi-Currency Engine
            </h2>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px; margin-bottom:28px;">
                <div style="border-left:2px solid var(--accent); padding-left:16px;">
                    <div class="eyebrow" style="margin-bottom:8px;">01 // THE CHALLENGE</div>
                    <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                        Legacy monolithic store suffered 6.2s checkout latencies and crashed repeatedly during 50,000-user global holiday sales peaks.
                    </p>
                </div>
                <div style="border-left:2px solid var(--line); padding-left:16px;">
                    <div class="eyebrow" style="margin-bottom:8px;">02 // THE APPROACH</div>
                    <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                        Engineered a decoupled Next.js storefront powered by Go microservices, Cloudflare Edge caching, and automated inventory reconciliation.
                    </p>
                </div>
            </div>

            <div style="background:rgba(255,255,255,0.6); border:1px solid var(--line); border-radius:14px; padding:20px 24px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
                <div>
                    <div class="eyebrow" style="margin-bottom:4px;">03 // MEASURED RESULTS</div>
                    <div class="serif-heading" style="font-size:1.4rem; color:var(--ink);">
                        +38% Conversions · 0.6s Global TTFB · 100% Uptime
                    </div>
                </div>
                <a href="<?= url_to('contact') ?>" class="chip">ENGAGE THIS STACK →</a>
            </div>
        </article>

        <!-- Case 2: SaaS Logistics -->
        <article class="card" style="padding:40px 32px; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:24px;">
                <div class="tag">LOGISTICS · CLOUD AUTOMATION</div>
                <div style="font-family:var(--mono); font-size:11px; opacity:0.6;">REPORT REF: CS-02</div>
            </div>

            <h2 class="serif-heading" style="font-size:clamp(1.8rem, 4vw, 2.4rem); margin-bottom:24px;">
                Kinetix Dispatch: Enterprise Freight ERP & Real-Time Tracking
            </h2>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px; margin-bottom:28px;">
                <div style="border-left:2px solid var(--accent); padding-left:16px;">
                    <div class="eyebrow" style="margin-bottom:8px;">01 // THE CHALLENGE</div>
                    <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                        Fragmented spreadsheets and delayed driver communication caused 18% shipping bottlenecks and costly manual dispatch errors.
                    </p>
                </div>
                <div style="border-left:2px solid var(--line); padding-left:16px;">
                    <div class="eyebrow" style="margin-bottom:8px;">02 // THE APPROACH</div>
                    <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                        Built a custom reactive web portal with WebSocket live telematics, automated routing heuristics, and role-gated sub-accounts.
                    </p>
                </div>
            </div>

            <div style="background:rgba(255,255,255,0.6); border:1px solid var(--line); border-radius:14px; padding:20px 24px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
                <div>
                    <div class="eyebrow" style="margin-bottom:4px;">03 // MEASURED RESULTS</div>
                    <div class="serif-heading" style="font-size:1.4rem; color:var(--ink);">
                        14,000 Daily Shipments · 82% Faster Dispatch · $320K Saved
                    </div>
                </div>
                <a href="<?= url_to('contact') ?>" class="chip">ENGAGE THIS STACK →</a>
            </div>
        </article>

        <!-- Case 3: Healthcare Mobile -->
        <article class="card" style="padding:40px 32px; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:12px; margin-bottom:24px;">
                <div class="tag">HEALTHCARE · HIPAA COMPLIANT</div>
                <div style="font-family:var(--mono); font-size:11px; opacity:0.6;">REPORT REF: CS-03</div>
            </div>

            <h2 class="serif-heading" style="font-size:clamp(1.8rem, 4vw, 2.4rem); margin-bottom:24px;">
                PulseCare: Encrypted Telemedicine & Clinical Mobile Suite
            </h2>

            <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:24px; margin-bottom:28px;">
                <div style="border-left:2px solid var(--accent); padding-left:16px;">
                    <div class="eyebrow" style="margin-bottom:8px;">01 // THE CHALLENGE</div>
                    <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                        Legacy client portal was not mobile responsive, resulting in 42% patient drop-off and lack of secure document exchange.
                    </p>
                </div>
                <div style="border-left:2px solid var(--line); padding-left:16px;">
                    <div class="eyebrow" style="margin-bottom:8px;">02 // THE APPROACH</div>
                    <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                        Engineered native iOS & Android apps with WebRTC encrypted video, offline syncing biometric auth, and automated prescription routing.
                    </p>
                </div>
            </div>

            <div style="background:rgba(255,255,255,0.6); border:1px solid var(--line); border-radius:8px; padding:20px 24px; display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:16px;">
                <div>
                    <div class="eyebrow" style="margin-bottom:4px;">03 // MEASURED RESULTS</div>
                    <div class="serif-heading" style="font-size:1.4rem; color:var(--ink);">
                        99.99% Uptime · 4.9★ App Store · 250,000+ Consultations
                    </div>
                </div>
                <a href="<?= url_to('contact') ?>" class="chip">ENGAGE THIS STACK →</a>
            </div>
        </article>

    </div>
</section>

<?= $this->endSection() ?>
