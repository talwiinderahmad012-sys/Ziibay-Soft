<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "CollectionPage",
  "name": "Global Delivery Network | Ziibay Soft",
  "description": "Explore Ziibay Soft's primary international engineering hubs and delivery centers across the United States, United Kingdom, Australia, and worldwide.",
  "url": "<?= base_url('locations') ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<style>
.map-wrap{position:relative;border:1px solid var(--line);border-radius:16px;
 overflow:hidden;background:var(--card)}
.map-img{width:100%;display:block;animation:map-breathe 14s ease-in-out
 infinite alternate;transform-origin:center}
@keyframes map-breathe{from{transform:scale(1)}to{transform:scale(1.05)}}
.map-arcs{position:absolute;inset:0;width:100%;height:100%;
 fill:none;stroke:var(--accent);stroke-width:.18;stroke-dasharray:1.2 1.6;
 opacity:.55;vector-effect:non-scaling-stroke}
.in .map-arcs path{stroke-dashoffset:0}
.mk{position:absolute;transform:translate(-50%,-50%);cursor:pointer}
.mk b{display:block;width:8px;height:8px;border-radius:50%;
 background:var(--accent);box-shadow:0 0 0 3px rgba(255,255,255,.85)}
.mk.hub b{width:12px;height:12px}
.mk.hub::before{content:"";position:absolute;inset:-9px;border-radius:50%;
 border:1px solid var(--gold);animation:ping 2.4s ease-out infinite}
.mk span{position:absolute;bottom:16px;left:50%;transform:translateX(-50%)
 translateY(6px);opacity:0;transition:.3s;white-space:nowrap;
 font:700 9px var(--mono);letter-spacing:.1em;background:var(--card);
 border:1px solid var(--line);border-radius:6px;padding:5px 9px;
 color:var(--ink);box-shadow:0 8px 20px rgba(28,53,105,.12)}
.mk:hover span,.mk.hub span{opacity:1;transform:translateX(-50%)}
.mk.hub span{color:var(--accent)}
@keyframes ping{0%{transform:scale(.5);opacity:.9}100%{transform:scale(1.7);opacity:0}}
@media (prefers-reduced-motion:reduce){
 .map-img,.mk.hub::before{animation:none}}
</style>

<!-- 1. HERO WITH WORLD MAP -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 03 ) primary hubs</span>
        <span class="corner-stat tr">( 14 ) global cities</span>
        <span class="corner-stat bl">( 100% ) in-house</span>
        <span class="corner-stat br">( 24/7 ) coverage</span>

        <div style="max-width:960px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">WHERE ZIIBAY SOFT DELIVERS — 2026</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:18px;">
                global delivery network
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                Precision software engineering and cloud architectures delivered seamlessly across 14 strategic business hubs and global markets.
            </p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap; margin-bottom:24px;">
                <a href="<?= url_to('contact') ?>" class="chip">→ GET A CONSULTATION</a>
                <a href="<?= url_to('services') ?>" class="chip">VIEW SERVICES</a>
            </div>

            <!-- WORLD MAP (DOT-MATRIX IMAGE + OVERLAY) -->
            <div class="map-wrap" data-rv>
              <img class="map-img" src="<?= base_url('assets/img/worldmap.png') ?>"
                   alt="Ziibay Soft global delivery network">
              <svg class="map-arcs" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M27,30 Q37,18 47.5,26"/>
                <path d="M47.5,26 Q68,52 85,76"/>
                <path d="M27,30 Q56,62 85,76"/>
              </svg>
              <i class="mk hub" style="left:27%;top:30%"><b></b><span>[HUB 01] NEW YORK · USA</span></i>
              <i class="mk hub" style="left:47.5%;top:26%"><b></b><span>[HUB 02] LONDON · UK</span></i>
              <i class="mk hub" style="left:85%;top:76%"><b></b><span>[HUB 03] SYDNEY · AUSTRALIA</span></i>
              <i class="mk" style="left:51%;top:25%"><b></b><span>BERLIN · GERMANY</span></i>
              <i class="mk" style="left:48.5%;top:27%"><b></b><span>PARIS · FRANCE</span></i>
              <i class="mk" style="left:49.5%;top:25%"><b></b><span>AMSTERDAM · NETHERLANDS</span></i>
              <i class="mk" style="left:47%;top:31%"><b></b><span>MADRID · SPAIN</span></i>
              <i class="mk" style="left:51%;top:28.5%"><b></b><span>MILAN · ITALY</span></i>
              <i class="mk" style="left:53.5%;top:20%"><b></b><span>STOCKHOLM · SWEDEN</span></i>
              <i class="mk" style="left:26%;top:26%"><b></b><span>TORONTO · CANADA</span></i>
              <i class="mk" style="left:61.5%;top:37%"><b></b><span>DUBAI · UAE</span></i>
              <i class="mk" style="left:74.5%;top:52%"><b></b><span>SINGAPORE</span></i>
              <i class="mk" style="left:84.5%;top:32%"><b></b><span>TOKYO · JAPAN</span></i>
              <i class="mk" style="left:93.5%;top:82%"><b></b><span>AUCKLAND · NZ</span></i>
            </div>

        </div>
    </div>
</section>

<!-- 2. 3 PRIMARY DELIVERY HUBS (SUB-PAGES) -->
<section class="section-polished" style="max-width:1240px; margin:0 auto;">
    <div style="text-align:center; margin-bottom:32px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:10px;">PRIMARY REGIONAL HUBS</div>
        <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">explore delivery centers</h2>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px; max-width:1100px; margin:0 auto;">

        <!-- Hub 1: United States -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div class="tag" style="align-self:flex-start; margin-bottom:16px;">NEW YORK · USA</div>
            <h3 class="serif-heading" style="font-size:1.8rem; margin-bottom:10px;">United States</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 20px;">
                Serving North American enterprises with EST/PST aligned communication, HIPAA-compliant healthcare builds, and high-throughput fintech infrastructure.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:center;">
                <span style="font-family:var(--mono); font-size:11px; opacity:0.6; color:var(--ink);">HUB 01</span>
                <a href="<?= base_url('locations/united-states') ?>" class="chip">EXPLORE HUB →</a>
            </div>
        </article>

        <!-- Hub 2: United Kingdom -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div class="tag" style="align-self:flex-start; margin-bottom:16px;">LONDON · UK</div>
            <h3 class="serif-heading" style="font-size:1.8rem; margin-bottom:10px;">United Kingdom</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 20px;">
                Providing UK and European organizations with GMT overlap, GDPR-ready database architectures, and custom enterprise logistics portals.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:center;">
                <span style="font-family:var(--mono); font-size:11px; opacity:0.6; color:var(--ink);">HUB 02</span>
                <a href="<?= base_url('locations/united-kingdom') ?>" class="chip">EXPLORE HUB →</a>
            </div>
        </article>

        <!-- Hub 3: Australia -->
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div class="tag" style="align-self:flex-start; margin-bottom:16px;">SYDNEY · AUSTRALIA</div>
            <h3 class="serif-heading" style="font-size:1.8rem; margin-bottom:10px;">Australia</h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0 0 20px;">
                Engineering bespoke digital products for the APAC market with AEST business-hours collaboration and cloud-native scalability.
            </p>
            <div style="margin-top:auto; padding-top:16px; border-top:1px solid var(--line); display:flex; justify-content:space-between; align-items:center;">
                <span style="font-family:var(--mono); font-size:11px; opacity:0.6; color:var(--ink);">HUB 03</span>
                <a href="<?= base_url('locations/australia') ?>" class="chip">EXPLORE HUB →</a>
            </div>
        </article>

    </div>
</section>

<?= $this->endSection() ?>
