<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "Industries Index | Ziibay Soft",
  "description": "Discover specialized digital and software engineering solutions tailored for diverse global industries by Ziibay Soft.",
  "url": "<?= base_url('industries') ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 08 ) vertical sectors</span>
        <span class="corner-stat tr">( 100% ) in-house</span>
        <span class="corner-stat bl">( 2026 ) compliance</span>
        <span class="corner-stat br">( 03 ) global markets</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">SECTOR SPECIFICATIONS</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                industries index
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                Custom software architecture and digital solutions engineered for the specific regulatory and operational demands of your industry.
            </p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="<?= url_to('contact') ?>" class="chip">→ DISCUSS YOUR INDUSTRY</a>
                <a href="<?= url_to('services') ?>" class="chip">ALL SERVICES</a>
            </div>
        </div>
    </div>
</section>
<!-- 2. 8 INDUSTRIES TILES -->
<section class="section-polished" style="max-width:1240px; margin:0 auto;">
    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px; max-width:1200px; margin:0 auto;">

        <!-- 1. E-Commerce -->
        <article class="card" data-rv="deck-rise" style="display:flex; flex-direction:column; position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <div class="tag">SECTOR 01</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="ind1" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#dfe3ea"/></linearGradient></defs><path d="M30 34h36l4 40a6 6 0 0 1-6 6H32a6 6 0 0 1-6-6z" fill="url(#ind1)" stroke="rgba(28,53,105,.2)"/><path d="M38 40v-6a10 10 0 0 1 20 0v6" fill="none" stroke="var(--accent)" stroke-width="3" stroke-linecap="round"/><circle cx="48" cy="58" r="4" fill="var(--gold)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">E-Commerce & Retail</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Headless storefronts, custom checkout pipelines, multi-currency engines, and ERP sync.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">CONSULT SECTOR →</a>
        </article>

        <!-- 2. Healthcare -->
        <article class="card" data-rv="deck-rise" style="display:flex; flex-direction:column; position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <div class="tag">SECTOR 02</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="ind2" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#dfe3ea"/></linearGradient></defs><path d="M48 76C30 62 22 50 26 40c4-10 16-12 22-4 6-8 18-6 22 4 4 10-4 22-22 36z" fill="url(#ind2)" stroke="rgba(28,53,105,.2)"/><path d="M30 50h8l4-8 6 14 4-6h14" fill="none" stroke="var(--accent)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Healthcare & Medical</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                HIPAA-compliant patient portals, encrypted EHR synchronization, and telemedicine apps.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">CONSULT SECTOR →</a>
        </article>

        <!-- 3. Education -->
        <article class="card" data-rv="deck-rise" style="display:flex; flex-direction:column; position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <div class="tag">SECTOR 03</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="ind3" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#dfe3ea"/></linearGradient></defs><path d="M48 24l32 14-32 14-32-14z" fill="url(#ind3)" stroke="rgba(28,53,105,.2)"/><path d="M32 46v10c0 6 32 6 32 0V46" fill="url(#ind3)" stroke="rgba(28,53,105,.2)"/><line x1="78" y1="40" x2="78" y2="58" stroke="var(--gold)" stroke-width="2.5"/><circle cx="78" cy="61" r="3" fill="var(--gold)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Education & EdTech</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Learning management systems, interactive classrooms, and automated student grading portals.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">CONSULT SECTOR →</a>
        </article>

        <!-- 4. Real Estate -->
        <article class="card" data-rv="deck-rise" style="display:flex; flex-direction:column; position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <div class="tag">SECTOR 04</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="ind4" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#dfe3ea"/></linearGradient></defs><path d="M22 48L48 26l26 22" fill="none" stroke="var(--accent)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/><rect x="30" y="48" width="36" height="26" rx="4" fill="url(#ind4)" stroke="rgba(28,53,105,.2)"/><rect x="43" y="56" width="10" height="18" rx="2" fill="var(--accent)"/><circle cx="60" cy="56" r="2.5" fill="var(--gold)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Real Estate & PropTech</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                MLS/IDX integrated portals, 3D property tours, and lease management automation.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">CONSULT SECTOR →</a>
        </article>

        <!-- 5. Logistics -->
        <article class="card" data-rv="deck-rise" style="display:flex; flex-direction:column; position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <div class="tag">SECTOR 05</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="ind5" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#dfe3ea"/></linearGradient></defs><rect x="16" y="36" width="36" height="24" rx="4" fill="url(#ind5)" stroke="rgba(28,53,105,.2)"/><path d="M52 42h14l10 10v8H52z" fill="url(#ind5)" stroke="rgba(28,53,105,.2)"/><circle cx="30" cy="64" r="6" fill="var(--accent)"/><circle cx="64" cy="64" r="6" fill="var(--accent)"/><circle cx="30" cy="64" r="2" fill="#fff"/><circle cx="64" cy="64" r="2" fill="#fff"/><rect x="22" y="42" width="10" height="6" rx="2" fill="var(--gold)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Logistics & Supply Chain</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Fleet telematics, automated shipment dispatching, and distributed inventory management.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">CONSULT SECTOR →</a>
        </article>

        <!-- 6. Finance -->
        <article class="card" data-rv="deck-rise" style="display:flex; flex-direction:column; position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <div class="tag">SECTOR 06</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="ind6" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#dfe3ea"/></linearGradient></defs><ellipse cx="38" cy="64" rx="16" ry="6" fill="url(#ind6)" stroke="rgba(28,53,105,.2)"/><ellipse cx="38" cy="54" rx="16" ry="6" fill="url(#ind6)" stroke="rgba(28,53,105,.2)"/><ellipse cx="38" cy="44" rx="16" ry="6" fill="url(#ind6)" stroke="rgba(28,53,105,.2)"/><path d="M58 62l10-12 6 6 10-14" fill="none" stroke="var(--accent)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/><path d="M84 42h-8m8 0v8" fill="none" stroke="var(--accent)" stroke-width="3" stroke-linecap="round"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Finance & Banking</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Secure client portals, automated compliance ledgers, and institutional asset management.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">CONSULT SECTOR →</a>
        </article>

        <!-- 7. Hospitality -->
        <article class="card" data-rv="deck-rise" style="display:flex; flex-direction:column; position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <div class="tag">SECTOR 07</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="ind7" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#dfe3ea"/></linearGradient></defs><rect x="24" y="38" width="48" height="32" rx="8" fill="url(#ind7)" stroke="rgba(28,53,105,.2)"/><rect x="40" y="30" width="16" height="8" rx="3" fill="none" stroke="var(--accent)" stroke-width="3"/><line x1="36" y1="42" x2="36" y2="66" stroke="var(--accent)" stroke-width="2.5"/><line x1="60" y1="42" x2="60" y2="66" stroke="var(--accent)" stroke-width="2.5"/><circle cx="48" cy="54" r="3" fill="var(--gold)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Hospitality & Travel</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                Direct booking engines, guest loyalty platforms, and localized concierge mobile apps.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">CONSULT SECTOR →</a>
        </article>

        <!-- 8. Manufacturing -->
        <article class="card" data-rv="deck-rise" style="display:flex; flex-direction:column; position:relative;">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:16px;">
                <div class="tag">SECTOR 08</div>
                <svg class="clay-icon" viewBox="0 0 96 96" style="width:48px; height:48px; margin:0;"><defs><linearGradient id="ind8" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#ffffff"/><stop offset="1" stop-color="#dfe3ea"/></linearGradient></defs><path d="M22 70V44l14 10V44l14 10V44l24 16v10z" fill="url(#ind8)" stroke="rgba(28,53,105,.2)"/><rect x="62" y="28" width="8" height="20" rx="2" fill="url(#ind8)" stroke="rgba(28,53,105,.2)"/><rect x="30" y="60" width="6" height="6" fill="var(--accent)"/><rect x="42" y="60" width="6" height="6" fill="var(--accent)"/><rect x="54" y="60" width="6" height="6" fill="var(--gold)"/></svg>
            </div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:8px;">Manufacturing & Industry</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 16px;">
                IoT sensor telemetry dashboards, supply chain visibility, and factory floor ERP modules.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip" style="align-self:flex-start; margin-top:auto; font-size:10px;">CONSULT SECTOR →</a>
        </article>

    </div>
</section>

<?= $this->endSection() ?>
