<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Service",
  "name": "<?= esc($service['name']) ?>",
  "provider": {
    "@type": "Organization",
    "name": "Ziibay Soft"
  },
  "description": "<?= esc($meta_description) ?>"
}
</script>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [{
    "@type": "ListItem",
    "position": 1,
    "name": "Home",
    "item": "<?= url_to('home') ?>"
  },{
    "@type": "ListItem",
    "position": 2,
    "name": "Services",
    "item": "<?= url_to('services') ?>"
  },{
    "@type": "ListItem",
    "position": 3,
    "name": "<?= esc($service['name']) ?>"
  }]
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 04 ) phase delivery</span>
        <span class="corner-stat tr">( 100% ) in-house</span>
        <span class="corner-stat bl">( 2026 ) production sla</span>
        <span class="corner-stat br">( 05 ) core services</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="chip" style="margin-bottom:16px;"><?= esc($service['category_name'] ?? 'ENGINEERING SPECIFICATION') ?></div>
            
            <!-- Clay Icon -->
            <div style="display:flex; justify-content:center; margin-bottom:16px;">
                <?php if ($service['slug'] === 'web-development'): ?>
                    <svg class="clay-icon" viewBox="0 0 96 96" style="width:72px; height:72px;"><defs><linearGradient id="sd-w1" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                    <rect x="18" y="24" width="60" height="48" rx="7" fill="url(#sd-w1)" stroke="rgba(28,43,58,.18)"/>
                    <line x1="18" y1="36" x2="78" y2="36" stroke="rgba(28,43,58,.18)"/>
                    <circle cx="26" cy="30" r="2" fill="#c2c7cb"/><circle cx="32" cy="30" r="2" fill="#c2c7cb"/><circle cx="38" cy="30" r="2" fill="var(--accent)"/>
                    <rect x="24" y="42" width="22" height="16" rx="3" fill="var(--clay-fill)"/>
                    <rect x="50" y="43" width="22" height="3" rx="1.5" fill="#c2c7cb"/><rect x="50" y="50" width="18" height="3" rx="1.5" fill="#c2c7cb"/><rect x="50" y="57" width="12" height="3" rx="1.5" fill="#c2c7cb"/></svg>
                <?php elseif ($service['slug'] === 'software-development'): ?>
                    <svg class="clay-icon" viewBox="0 0 96 96" style="width:72px; height:72px;"><defs><linearGradient id="sd-w2" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                    <g fill="#c2c7cb"><rect x="45" y="18" width="6" height="10" rx="2"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(45 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(90 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(135 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(180 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(225 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(270 48 48)"/><rect x="45" y="18" width="6" height="10" rx="2" transform="rotate(315 48 48)"/></g>
                    <circle cx="48" cy="48" r="22" fill="url(#sd-w2)" stroke="rgba(28,43,58,.18)"/>
                    <circle cx="48" cy="48" r="8" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/></svg>
                <?php elseif ($service['slug'] === 'app-development'): ?>
                    <svg class="clay-icon" viewBox="0 0 96 96" style="width:72px; height:72px;"><defs><linearGradient id="sd-w3" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                    <rect x="32" y="18" width="32" height="60" rx="8" fill="url(#sd-w3)" stroke="rgba(28,43,58,.18)"/>
                    <rect x="36" y="28" width="24" height="38" rx="3" fill="var(--clay-fill)"/>
                    <rect x="42" y="22" width="12" height="2.5" rx="1.25" fill="#c2c7cb"/>
                    <circle cx="48" cy="72" r="2.5" fill="var(--accent)"/></svg>
                <?php elseif ($service['slug'] === 'seo'): ?>
                    <svg class="clay-icon" viewBox="0 0 96 96" style="width:72px; height:72px;"><defs><linearGradient id="sd-w4" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                    <rect x="24" y="52" width="8" height="16" rx="2" fill="#c2c7cb"/>
                    <rect x="36" y="44" width="8" height="24" rx="2" fill="url(#sd-w4)"/>
                    <rect x="48" y="36" width="8" height="32" rx="2" fill="#c2c7cb"/>
                    <circle cx="60" cy="38" r="13" fill="var(--clay-fill)" stroke="rgba(28,43,58,.25)" stroke-width="3"/>
                    <line x1="69" y1="48" x2="79" y2="58" stroke="var(--accent)" stroke-width="5" stroke-linecap="round"/></svg>
                <?php else: ?>
                    <svg class="clay-icon" viewBox="0 0 96 96" style="width:72px; height:72px;"><defs><linearGradient id="sd-w5" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#ffffff"/><stop offset="1" stop-color="#d3d7da"/></linearGradient></defs>
                    <rect x="48" y="44" width="30" height="22" rx="8" fill="var(--clay-fill)" stroke="rgba(28,43,58,.15)"/>
                    <path d="M70 66 l4 7 -8 -2 z" fill="var(--clay-fill)"/>
                    <rect x="18" y="26" width="38" height="26" rx="8" fill="url(#sd-w5)" stroke="rgba(28,43,58,.18)"/>
                    <path d="M28 52 l-4 8 9 -3 z" fill="url(#sd-w5)"/>
                    <circle cx="29" cy="39" r="2.5" fill="var(--accent)"/><circle cx="37" cy="39" r="2.5" fill="var(--accent)"/><circle cx="45" cy="39" r="2.5" fill="var(--accent)"/></svg>
                <?php endif; ?>
            </div>

            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                <?= esc(strtolower($service['name'])) ?>
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                <?= esc($service['hero_subheadline'] ?? $service['overview']) ?>
            </p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="<?= base_url('contact?service=' . esc($service['slug'])) ?>" class="chip">→ GET A FREE CONSULTATION</a>
                <a href="#capabilities" class="chip">VIEW CAPABILITIES</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. WHAT YOU GET (4 HAIRLINE BULLET CARDS) -->
<section class="section-polished" style="max-width:1240px; margin:0 auto;">
    <div style="text-align:center; margin-bottom:36px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:10px;">DELIVERABLES & VALUE</div>
        <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">what you get</h2>
    </div>

    <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(280px, 1fr)); gap:20px; max-width:1200px; margin:0 auto;">
        <?php foreach($service['capabilities'] as $idx => $cap): ?>
        <article class="card" style="display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <span class="corner-stat tr">( 0<?= $idx + 1 ?> )</span>
            <div class="eyebrow" style="margin-bottom:10px;">DELIVERABLE</div>
            <h3 class="serif-heading" style="font-size:1.35rem; margin-bottom:10px;"><?= esc($cap['title']) ?></h3>
            <p style="font-size:13px; line-height:1.6; color:var(--muted); margin:0;"><?= esc($cap['desc']) ?></p>
        </article>
        <?php endforeach; ?>
    </div>
</section>

<!-- 3. OUR APPROACH (4-STEP WORKFLOW BARS) -->
<section style="padding:32px 16px 48px;">
    <div class="framed-panel" style="padding:48px 24px;" data-rv="blur-rise">
        <div style="text-align:center; margin-bottom:40px;">
            <div class="eyebrow" style="margin-bottom:10px;">EXECUTION PIPELINE</div>
            <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">our approach</h2>
            <p style="font-size:14px; color:var(--muted); max-width:600px; margin:0 auto;">Rigorous engineering methodology from discovery to ongoing maintenance.</p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(240px, 1fr)); gap:16px;">
            <div class="wf-col in" style="border:1px solid var(--line); border-radius:8px; padding:24px 20px; background:rgba(255,255,255,0.4);">
                <div class="chip" style="margin-bottom:12px;">STEP 01</div>
                <h4 style="font-family:var(--sans); font-weight:700; font-size:1.05rem; margin:0 0 8px; color:var(--ink);">Discovery & Specs</h4>
                <p style="font-size:12px; line-height:1.6; color:var(--muted); margin:0;">We document all business workflows, data models, edge cases, and architectural constraints.</p>
            </div>
            <div class="wf-col in" style="border:1px solid var(--line); border-radius:8px; padding:24px 20px; background:rgba(255,255,255,0.4);">
                <div class="chip" style="margin-bottom:12px;">STEP 02</div>
                <h4 style="font-family:var(--sans); font-weight:700; font-size:1.05rem; margin:0 0 8px; color:var(--ink);">Architecture & UX</h4>
                <p style="font-size:12px; line-height:1.6; color:var(--muted); margin:0;">Design wireframes, database schemas, and microservice APIs with zero guesswork.</p>
            </div>
            <div class="wf-col in" style="border:1px solid var(--line); border-radius:8px; padding:24px 20px; background:rgba(255,255,255,0.4);">
                <div class="chip" style="margin-bottom:12px;">STEP 03</div>
                <h4 style="font-family:var(--sans); font-weight:700; font-size:1.05rem; margin:0 0 8px; color:var(--ink);">Agile Engineering</h4>
                <p style="font-size:12px; line-height:1.6; color:var(--muted); margin:0;">Sprint-based development with unit tests, CI/CD pipelines, and weekly milestone demos.</p>
            </div>
            <div class="wf-col in" style="border:1px solid var(--line); border-radius:8px; padding:24px 20px; background:rgba(255,255,255,0.4);">
                <div class="chip" style="margin-bottom:12px;">STEP 04</div>
                <h4 style="font-family:var(--sans); font-weight:700; font-size:1.05rem; margin:0 0 8px; color:var(--ink);">Deploy & Scale</h4>
                <p style="font-size:12px; line-height:1.6; color:var(--muted); margin:0;">Security hardening, load testing, zero-downtime release, and proactive SLA support.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. CAPABILITIES (MONO LIST & TECH STACK) -->
<section id="capabilities" style="padding:32px 16px 48px;">
    <div style="text-align:center; margin-bottom:36px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:10px;">TECHNICAL PROFILE</div>
        <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">core capabilities & stack</h2>
    </div>

    <div class="framed-panel" style="padding:40px 28px; max-width:1100px; margin:0 auto; background:var(--card);" data-rv="deck-rise">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:32px;">
            <div>
                <div class="eyebrow" style="margin-bottom:14px;">PROBLEM WE SOLVE</div>
                <h3 class="serif-heading" style="font-size:1.4rem; margin-bottom:12px;">The Core Challenge</h3>
                <p style="font-size:13px; line-height:1.7; color:var(--muted); margin:0;">
                    <?= esc($service['problem_statement']) ?>
                </p>
            </div>
            <div>
                <div class="eyebrow" style="margin-bottom:14px;">TECHNOLOGIES UTILIZED</div>
                <div style="display:flex; flex-wrap:wrap; gap:8px; margin-bottom:20px;">
                    <?php foreach($service['tech_tags'] as $tag): ?>
                    <span class="chip" style="font-size:11px;"><?= esc($tag) ?></span>
                    <?php endforeach; ?>
                </div>
                <p style="font-size:12px; font-family:var(--mono); color:var(--muted); text-transform:uppercase; letter-spacing:0.08em; margin:0;">
                    Architecture customized strictly per client performance requirements
                </p>
            </div>
        </div>
    </div>
</section>

<!-- 5. FAQS ACCORDION -->
<?php if (!empty($service['faqs'])): ?>
<section style="padding:32px 16px 48px;">
    <div style="text-align:center; margin-bottom:36px;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:10px;">QUESTIONS & ANSWERS</div>
        <h2 class="serif-heading" style="font-size:clamp(2rem, 4.5vw, 3rem);">frequently asked</h2>
    </div>

    <div style="max-width:860px; margin:0 auto; display:flex; flex-direction:column; gap:12px;">
        <?php foreach($service['faqs'] as $index => $faq): ?>
        <details class="framed-panel" style="background:var(--card); padding:20px 24px; cursor:pointer; border-radius:8px;">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.05rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span><?= esc($faq['q']) ?></span>
                <span style="font-family:var(--mono); font-size:14px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:13px; line-height:1.7; color:var(--muted); margin:14px 0 0; padding-top:12px; border-top:1px solid var(--line);">
                <?= esc($faq['a']) ?>
            </p>
        </details>
        <?php endforeach; ?>
    </div>
</section>
<?php endif; ?>

<!-- 6. RELATED SERVICES -->
<section style="padding:32px 16px 48px;">
    <div class="framed-panel" style="padding:36px 24px; text-align:center; max-width:900px; margin:0 auto;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:12px;">EXPLORE COMPATIBLE DISCIPLINES</div>
        <h3 class="serif-heading" style="font-size:1.6rem; margin-bottom:20px;">related services</h3>
        <div style="display:flex; justify-content:center; gap:10px; flex-wrap:wrap;">
            <?php foreach($service['related_services'] as $rel): ?>
            <a href="<?= url_to('service-detail', $rel['slug']) ?>" class="chip">
                <?= esc(strtoupper($rel['name'])) ?> →
            </a>
            <?php endforeach; ?>
            <a href="<?= url_to('services') ?>" class="chip">ALL SERVICES →</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
