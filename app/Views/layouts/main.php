<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
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
    
    <!-- Organization Schema Foundation -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Ziibay Soft",
      "url": "<?= base_url() ?>",
      "logo": "<?= base_url('images/logo.png') ?>",
      "sameAs": []
    }
    </script>
    
    <?= $this->renderSection('schema') ?>

    <?= $this->include('components/theme_manager') ?>
    
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
</body>
</html>
