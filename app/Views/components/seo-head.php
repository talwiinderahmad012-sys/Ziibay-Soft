<?php

/**
 * SEO <head> fragment.
 *
 * Consumes $site and $page arrays prepared by the controller/layout.
 * All values passed through esc() before output.
 */

$siteName    = $site->name;
$defaultLocale = $site->defaultLocale;
$headTitle    = $page['title'] ?? $siteName;
$description    = $page['description'] ?? '';
$canonical      = $page['canonical'] ?? current_url();
$robots         = $page['robots'] ?? 'index, follow';
$ogImage          = $page['og']['image'] ?? '';
$ogType           = $page['og']['type'] ?? 'website';
$ogLocale          = str_replace('-', '_', $defaultLocale);
$twitterCard       = $page['twitter']['card'] ?? 'summary';
$schema            = $page['schema'] ?? [];

$schema = array_merge([
    [
        '@context' => 'https://schema.org',
        '@type'    => 'WebSite',
        '@id'       => $canonical . '#website',
        'url'       => $canonical,
        'name'      => $headTitle,
        'description' => $description,
        'inLanguage' => $defaultLocale,
    ],
], $schema);
?>

<title><?= esc($headTitle) ?></title>
<meta name="description" content="<?= esc($description) ?>">
<link rel="canonical" href="<?= esc($canonical) ?>">
<meta name="robots" content="<?= esc($robots) ?>">

<meta property="og:site_name" content="<?= esc($siteName) ?>">
<meta property="og:type" content="<?= esc($ogType) ?>">
<meta property="og:title" content="<?= esc($headTitle) ?>">
<meta property="og:description" content="<?= esc($description) ?>">
<meta property="og:url" content="<?= esc($canonical) ?>">
<meta property="og:locale" content="<?= esc($ogLocale) ?>">
<?php if ($ogImage !== '') : ?>
    <meta property="og:image" content="<?= esc($ogImage) ?>">
<?php endif ?>

<meta name="twitter:card" content="<?= esc($twitterCard) ?>">
<meta name="twitter:title" content="<?= esc($headTitle) ?>">
<meta name="twitter:description" content="<?= esc($description) ?>">
<?php if ($ogImage !== '') : ?>
    <meta name="twitter:image" content="<?= esc($ogImage) ?>">
<?php endif ?>

<?php foreach ($schema as $block) : ?>
    <script type="application/ld+json"><?= raw_json($block) ?></script>
<?php endforeach ?>