<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 01 ) governance standard</span>
        <span class="corner-stat tr">( 100% ) transparency</span>
        <span class="corner-stat bl">( <?= esc($legal_updated ?? '2026') ?> ) revision</span>
        <span class="corner-stat br">( Global ) compliance</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">LEGAL & COMPLIANCE PROTOCOL</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                <?= esc(strtolower($title)) ?>
            </h1>
            <p style="font-size:15px; line-height:1.7; color:var(--muted); max-width:640px; margin:0 auto 20px;">
                Clear contractual specifications, privacy protections, and client rights governing Ziibay Soft engagements.
            </p>
            <div class="chip" style="font-size:11px;">EFFECTIVE DATE: <?= esc($legal_updated ?? 'AUGUST 2026') ?></div>
        </div>
    </div>
</section>

<!-- 2. NUMBERED CLAUSES -->
<section style="padding:32px 16px 56px;">
    <div style="max-width:880px; margin:0 auto; display:flex; flex-direction:column; gap:20px;">
        <?php foreach ($legal_sections as $index => $section): ?>
        <article class="framed-panel" style="background:var(--card); padding:36px 28px; display:flex; flex-direction:column; position:relative;" data-rv="deck-rise">
            <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:14px;">
                <div class="chip">CLAUSE <?= str_pad($index + 1, 2, '0', STR_PAD_LEFT) ?></div>
            </div>
            <h2 class="serif-heading" style="font-size:1.4rem; margin-bottom:12px;"><?= esc($section['heading']) ?></h2>
            <p style="font-size:14px; line-height:1.75; color:var(--muted); margin:0;">
                <?= esc($section['body']) ?>
            </p>
        </article>
        <?php endforeach; ?>

        <!-- Questions Panel -->
        <article class="framed-panel" style="background:var(--card); padding:36px 28px; text-align:center;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:8px;">LEGAL INQUIRIES</div>
            <h3 class="serif-heading" style="font-size:1.5rem; margin-bottom:12px;">questions regarding this document?</h3>
            <p style="font-size:14px; line-height:1.7; color:var(--muted); max-width:540px; margin:0 auto 20px;">
                If you have compliance inquiries, data processing agreement (DPA) requests, or terms questions, reach out directly.
            </p>
            <a href="<?= url_to('contact') ?>" class="chip">→ CONTACT LEGAL DESK</a>
        </article>
    </div>
</section>

<?= $this->endSection() ?>
