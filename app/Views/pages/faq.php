<?= $this->extend('layouts/main') ?>

<?= $this->section('schema') ?>
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "FAQPage",
  "name": "Frequently Asked Questions | Ziibay Soft",
  "description": "Everything you need to know about working with Ziibay Soft, our pricing model, timelines, and post-launch SLAs.",
  "url": "<?= base_url('faq') ?>"
}
</script>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<!-- 1. HERO -->
<section style="padding:48px 16px 32px;">
    <div class="framed-panel" style="position:relative; padding:72px 24px 56px; text-align:center;">
        <span class="corner-stat tl">( 08 ) verified protocols</span>
        <span class="corner-stat tr">( 100% ) in-house</span>
        <span class="corner-stat bl">( 24h ) response time</span>
        <span class="corner-stat br">( 2026 ) standard</span>

        <div style="max-width:840px; margin:0 auto;" data-rv="blur-rise">
            <div class="eyebrow" style="margin-bottom:14px;">KNOWLEDGE BASE</div>
            <h1 class="serif-heading" style="font-size:clamp(2.4rem, 6vw, 4.4rem); line-height:1.1; margin-bottom:20px;">
                frequently asked
            </h1>
            <p style="font-size:16px; line-height:1.7; color:var(--muted); max-width:680px; margin:0 auto 28px;">
                Clear answers regarding our engineering pricing model, delivery timelines, intellectual property, and continuous post-launch support.
            </p>
            <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
                <a href="<?= url_to('contact') ?>" class="chip">→ ASK A CUSTOM QUESTION</a>
                <a href="<?= url_to('services') ?>" class="chip">VIEW SERVICES</a>
            </div>
        </div>
    </div>
</section>

<!-- 2. FAQS LIST -->
<section style="padding:24px 16px 56px;">
    <div style="max-width:880px; margin:0 auto; display:flex; flex-direction:column; gap:16px;">

        <!-- 1. Pricing Model -->
        <details class="framed-panel" style="background:var(--card); padding:24px 28px; cursor:pointer; border-radius:8px;" open data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.1rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>How does Ziibay Soft structure project pricing?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:14px; line-height:1.7; color:var(--muted); margin:16px 0 0; padding-top:16px; border-top:1px solid var(--line);">
                We operate on transparent, milestone-gated fixed quotes for scoped deliverables, and flexible dedicated-team retainers for evolving product engineering. Every quote includes detailed architecture specifications, clear acceptance criteria, and zero hidden licensing fees.
            </p>
        </details>

        <!-- 2. Timeline -->
        <details class="framed-panel" style="background:var(--card); padding:24px 28px; cursor:pointer; border-radius:8px;" data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.1rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>What is the typical timeline for an end-to-end build?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:14px; line-height:1.7; color:var(--muted); margin:16px 0 0; padding-top:16px; border-top:1px solid var(--line);">
                Standard custom web applications and MVPs typically deploy within 4 to 8 weeks. Complex enterprise SaaS platforms, custom ERPs, and native mobile suites average 8 to 16 weeks, broken down into iterative two-week sprint milestones with live staging previews.
            </p>
        </details>

        <!-- 3. Post-Launch Support -->
        <details class="framed-panel" style="background:var(--card); padding:24px 28px; cursor:pointer; border-radius:8px;" data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.1rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>What kind of post-launch maintenance and SLA support do you provide?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:14px; line-height:1.7; color:var(--muted); margin:16px 0 0; padding-top:16px; border-top:1px solid var(--line);">
                Every deployment includes a 30-day complimentary warranty period. Post-launch, we offer structured monthly SLA tiers covering continuous security patching, database optimization, 24/7 uptime monitoring, server maintenance, and proactive feature enhancements.
            </p>
        </details>

        <!-- 4. IP Ownership -->
        <details class="framed-panel" style="background:var(--card); padding:24px 28px; cursor:pointer; border-radius:8px;" data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.1rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>Do I own 100% of the code and intellectual property?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:14px; line-height:1.7; color:var(--muted); margin:16px 0 0; padding-top:16px; border-top:1px solid var(--line);">
                Yes. Upon final milestone payment, 100% of all intellectual property, source code repositories, design assets, and database schemas are transferred directly to your organization with full commercial rights.
            </p>
        </details>

        <!-- 5. Timezone Collaboration -->
        <details class="framed-panel" style="background:var(--card); padding:24px 28px; cursor:pointer; border-radius:8px;" data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.1rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>How do you handle remote communication across international timezones?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:14px; line-height:1.7; color:var(--muted); margin:16px 0 0; padding-top:16px; border-top:1px solid var(--line);">
                We structure dedicated engineering pods with guaranteed 4–6 hour business day overlap for US (EST/PST), UK (GMT), and Australian (AEST) clients. We use Slack, GitHub, Jira, and weekly video syncs to ensure total visibility.
            </p>
        </details>

        <!-- 6. Technology Selection -->
        <details class="framed-panel" style="background:var(--card); padding:24px 28px; cursor:pointer; border-radius:8px;" data-rv="deck-rise">
            <summary style="font-family:var(--sans); font-weight:700; font-size:1.1rem; color:var(--ink); outline:none; display:flex; justify-content:space-between; align-items:center;">
                <span>How do you choose the technology stack for a new project?</span>
                <span style="font-family:var(--mono); font-size:16px; margin-left:12px;">+</span>
            </summary>
            <p style="font-size:14px; line-height:1.7; color:var(--muted); margin:16px 0 0; padding-top:16px; border-top:1px solid var(--line);">
                We evaluate technical constraints, concurrency demands, time-to-market, and long-term maintainability. We specialize in robust, production-proven stacks including PHP (Laravel/CodeIgniter), TypeScript (Next.js/React/Node), Go, Python, Flutter, and cloud-native databases (PostgreSQL/MySQL/Redis).
            </p>
        </details>

    </div>
</section>

<!-- 3. CONTACT CTA -->
<section style="padding:16px 16px 48px;">
    <div class="framed-panel" style="padding:40px 24px; text-align:center; max-width:880px; margin:0 auto;" data-rv="blur-rise">
        <div class="eyebrow" style="margin-bottom:10px;">STILL HAVE QUESTIONS?</div>
        <h3 class="serif-heading" style="font-size:1.8rem; margin-bottom:16px;">speak with our principal engineer</h3>
        <p style="font-size:14px; color:var(--muted); max-width:540px; margin:0 auto 24px;">
            Book a 30-minute discovery call to discuss your architecture, specifications, or compliance questions.
        </p>
        <div style="display:flex; justify-content:center; gap:12px; flex-wrap:wrap;">
            <a href="<?= url_to('contact') ?>" class="chip">→ INITIALIZE CONSULTATION</a>
            <a href="mailto:hello@ziibaysoft.com" class="chip">EMAIL US</a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
