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

    <!-- 21st.dev Inspired Interaction System -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Heading Blur-in Reveal (runs globally on all pages)
            const hio = new IntersectionObserver(es => es.forEach(e => {
                if (e.isIntersecting) { e.target.classList.add('in'); hio.unobserve(e.target); }
            }), { threshold: .25 });
            document.querySelectorAll('h1, h2').forEach(el => hio.observe(el));

            // 1. Scroll Choreography (Intersection Observer)
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-revealed');
                        // Optional: stop observing once revealed
                        // observer.unobserve(entry.target); 
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.reveal-on-scroll').forEach(el => {
                observer.observe(el);
            });

            // 2. Spotlight Effect for Cards
            const spotlightCards = document.querySelectorAll('.spotlight-card');
            spotlightCards.forEach(card => {
                card.addEventListener('mousemove', e => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    card.style.setProperty('--mouse-x', `${x}px`);
                    card.style.setProperty('--mouse-y', `${y}px`);
                });
            });

            // 3. Navbar Scroll Transform
            const navbar = document.getElementById('main-navbar');
            if (navbar) {
                window.addEventListener('scroll', () => {
                    if (window.scrollY > 50) {
                        navbar.classList.add('nav-scrolled');
                    } else {
                        navbar.classList.remove('nav-scrolled');
                    }
                }, { passive: true });
            }
        });
    </script>
</body>
</html>
