<!DOCTYPE html>
<html lang="<?= esc($locale ?? 'en') ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title ?? 'Ziibay Soft - Premium Digital Agency') ?></title>
    
    <!-- SEO Architecture -->
    <?php if (isset($meta_description)): ?>
        <meta name="description" content="<?= esc($meta_description) ?>">
    <?php endif; ?>
    <?php if (isset($canonical_url)): ?>
        <link rel="canonical" href="<?= esc($canonical_url) ?>">
    <?php endif; ?>
    <?php if (isset($robots)): ?>
        <meta name="robots" content="<?= esc($robots) ?>">
    <?php else: ?>
        <meta name="robots" content="index, follow">
    <?php endif; ?>
    <?php if (isset($hreflangs) && is_array($hreflangs)): ?>
        <?php foreach ($hreflangs as $code => $url): ?>
            <link rel="alternate" hreflang="<?= esc($code) ?>" href="<?= esc($url) ?>" />
        <?php endforeach; ?>
    <?php endif; ?>
    <!-- Open Graph -->
    <meta property="og:title" content="<?= esc($og_title ?? $title ?? 'Ziibay Soft') ?>">
    <meta property="og:description" content="<?= esc($og_description ?? $meta_description ?? '') ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= current_url() ?>">
    <?php if (isset($og_image)): ?>
        <meta property="og:image" content="<?= esc($og_image) ?>">
    <?php endif; ?>
    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    
    <!-- Schema Markup -->
    <?php if (isset($schema_json)): ?>
        <?= $schema_json ?>
    <?php else: ?>
        <?php
            $fallbackSchema = new \App\Libraries\SchemaGenerator();
            $fallbackSchema->addOrganization()->addWebSite();
            echo $fallbackSchema->render();
        ?>
    <?php endif; ?>
    
    <?= $this->renderSection('schema') ?>

    <?= $this->include('components/theme_manager') ?>
    
    <?= $this->include('components/premium_interactions') ?>
    
    <?= $this->renderSection('head') ?>
</head>
<body class="flex flex-col min-h-screen">

    <?= $this->include('components/header') ?>

    <main class="flex-grow pt-20">
        <?= $this->renderSection('content') ?>
    </main>

    <?= $this->include('components/footer') ?>
    
    <!-- Global WhatsApp CTA -->
    <?= $this->include('components/whatsapp_cta') ?>

    <?= $this->renderSection('scripts') ?>

    <!-- Alpine.js & Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Global Universal Reveal & Interaction Engine -->
    <script>
        document.documentElement.classList.add('js');
        const rv = new IntersectionObserver(es => es.forEach(e => {
            if (e.isIntersecting) {
                e.target.classList.add('in');
                rv.unobserve(e.target);
            }
        }), { threshold: .15, rootMargin: '0px 0px -8% 0px' });

        function watch() {
            document.querySelectorAll(
                '[data-rv],[data-stagger],.card,.tech-card,.svc-card,.xcard,.c-card,.info-card,.wf-col,.framed-panel'
            ).forEach(el => {
                if (!el.classList.contains('in')) rv.observe(el);
            });
        }
        document.addEventListener('DOMContentLoaded', watch);
        window.addEventListener('load', watch);
        setTimeout(() => document.querySelectorAll(
            '[data-rv],.card,.tech-card,.svc-card,.xcard,.c-card,.info-card,.wf-col'
        ).forEach(el => el.classList.add('in')), 2500);

        document.addEventListener('DOMContentLoaded', () => {
            // Heading Blur-in Reveal (runs globally on all pages)
            const hio = new IntersectionObserver(es => es.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('in'); hio.unobserve(e.target); }
            }), { threshold: .25 });
            document.querySelectorAll('h1, h2').forEach(el => hio.observe(el));

            // Numbers count-up
            const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            if (!prefersReducedMotion) {
                document.querySelectorAll('.stat-val').forEach(el => {
                    const text = el.innerText;
                    const numMatch = text.match(/(\d+)/);
                    if (numMatch) {
                        const target = parseInt(numMatch[1]);
                        let start = 0;
                        const update = setInterval(() => {
                            start += Math.ceil(target / 20);
                            if (start >= target) {
                                el.innerText = text.replace(numMatch[1], target);
                                clearInterval(update);
                            } else {
                                let padded = start.toString();
                                if (numMatch[1].startsWith('0')) padded = padded.padStart(numMatch[1].length, '0');
                                el.innerText = text.replace(numMatch[1], padded);
                            }
                        }, 50);
                    }
                });
            }

            // Corner Stat gold highlight
            document.querySelectorAll('.corner-stat').forEach(el => {
                if (!el.querySelector('.gold-val')) {
                    el.innerHTML = el.innerHTML.replace(/\(\s*([^\)]+)\s*\)/g, '(<span class="gold-val" style="color:var(--gold);font-weight:700;"> $1 </span>)');
                }
            });

            // Expandable Cards [data-x]
            document.querySelectorAll('[data-x]').forEach(c => {
                c.addEventListener('click', (e) => {
                    if (e.target.closest('a')) return;
                    const open = c.classList.contains('open');
                    document.querySelectorAll('[data-x].open').forEach(o => o.classList.remove('open'));
                    if (!open) c.classList.add('open');
                });
            });
        });
    </script>
</body>
</html>
