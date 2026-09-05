<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Place",
  "name": "<?= esc($location['name']) ?> Service Hub | Ziibay Soft",
  "description": "<?= esc($meta_description) ?>",
  "url": "<?= esc($canonical_url ?? current_url()) ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( Dedicated ) engineering pod</span>
        <span class="corner-stat tr">( 100% ) in-house</span>
        <span class="corner-stat bl">( Local ) compliance</span>
        <span class="corner-stat br">( Timezone ) aligned</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="chip" style="margin-bottom:16px;">
                <?php 
                    if (str_contains(strtolower($location['name']), 'united states')) echo 'NEW YORK · SAN FRANCISCO · AUSTIN';
                    elseif (str_contains(strtolower($location['name']), 'united kingdom')) echo 'LONDON · MANCHESTER · EDINBURGH';
                    elseif (str_contains(strtolower($location['name']), 'australia')) echo 'SYDNEY · MELBOURNE · BRISBANE';
                    else echo strtoupper($location['name']) . ' · REGIONAL HUB';
                ?>
            </div>
            
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                <?= esc(strtolower($location['name'])) ?> delivery
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                Providing organizations across <?= esc($location['name']) ?> with enterprise software engineering, web application development, and technical growth infrastructure.
            </p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="<?= url_to('contact') ?>" class="chip">→ DISCUSS <?= strtoupper(esc($location['name'])) ?> PROJECT</a>
                <a href="<?= url_to('services') ?>" class="chip">VIEW SERVICES</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. LOCAL CONTEXT -->
<section style="padding:24px 16px 48px;">
    <div class="framed-panel" style="padding:40px 32px; max-width:1100px; margin:0 auto;" data-rv="blur-rise">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:32px; align-items:center;">
            <div>
                <div class="eyebrow" style="margin-bottom:10px;">REGIONAL EXPERTISE</div>
                <h2 class="serif-heading" style="font-size:clamp(1.8rem, 3.5vw, 2.4rem); margin-bottom:12px;">
                    engineered for <?= esc($location['name']) ?> markets
                </h2>
            </div>
            <div style="font-size:14px; line-height:1.8; color:var(--muted);">
                <p style="margin-bottom:12px; color:var(--ink);">
                    We understand that deploying digital products in <?= esc($location['name']) ?> demands strict adherence to local regulatory standards, low-latency regional hosting, and seamless business-hours communication.
                </p>
                <p style="margin:0;">
                    Whether you are an ambitious scale-up or an established enterprise, our distributed engineering pods ensure synchronous collaboration and reliable, milestone-driven delivery.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 3. HOW WE DELIVER (3 BULLET CARDS) -->
<section style="padding:16px 16px 48px;">
    <div style="text-align:center; margin-bottom:36px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:10px;">REMOTE EXCELLENCE</div>
        <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">how we deliver</h2>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:20px; max-width:1200px; margin:0 auto;">
        <!-- Card 1: Timezone Overlap -->
        <article class="framed-panel" style="background:var(--card); padding:32px 24px; display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div class="chip" style="align-self:flex-start; margin-bottom:14px;">STANDARD 01</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:10px;">Guaranteed Timezone Overlap</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                Our engineers schedule sprint standups, milestone reviews, and Slack/Teams collaboration directly aligned with your local business hours.
            </p>
        </article>

        <!-- Card 2: Dedicated Pod -->
        <article class="framed-panel" style="background:var(--card); padding:32px 24px; display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div class="chip" style="align-self:flex-start; margin-bottom:14px;">STANDARD 02</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:10px;">Dedicated Engineering Pod</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                You receive a committed team of senior architects, frontend engineers, and QA specialists who work exclusively on your product.
            </p>
        </article>

        <!-- Card 3: Local Compliance -->
        <article class="framed-panel" style="background:var(--card); padding:32px 24px; display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div class="chip" style="align-self:flex-start; margin-bottom:14px;">STANDARD 03</div>
            <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:10px;">Strict Local Compliance</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;">
                We enforce data governance and security protocols appropriate for your jurisdiction (GDPR, HIPAA, SOC-2, and Australian Privacy Principles).
            </p>
        </article>
    </div>
</section>

<!-- 4. SERVICES AVAILABLE IN REGION -->
<section style="padding:16px 16px 48px;">
    <div class="framed-panel" style="padding:36px 24px; text-align:center; max-width:900px; margin:0 auto;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">AVAILABLE CAPABILITIES</div>
        <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:20px;">services deployed in <?= esc(strtolower($location['name'])) ?></h3>
        <div style="display:flex; justify-content:center; gap:10px; flex-wrap:wrap;">
            <a href="<?= url_to('service-detail', 'web-development') ?>" class="chip">WEB DEVELOPMENT →</a>
            <a href="<?= url_to('service-detail', 'software-development') ?>" class="chip">SOFTWARE ENGINEERING →</a>
            <a href="<?= url_to('service-detail', 'app-development') ?>" class="chip">MOBILE APPS →</a>
            <a href="<?= url_to('service-detail', 'seo') ?>" class="chip">TECHNICAL SEO →</a>
            <a href="<?= url_to('service-detail', 'social-media-management') ?>" class="chip">GROWTH MANAGEMENT →</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
