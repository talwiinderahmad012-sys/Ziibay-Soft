<!DOCTYPE html>
<html lang="<?= esc(site_config('defaultLocale')) ?>" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>/* Theme bootstrap — inline to prevent FOUC. */
        (function () {
            const stored = localStorage.getItem('ziibay-theme');
            const dark   = window.matchMedia('(prefers-color-scheme: dark)').matches;

            document.documentElement.dataset.theme = stored
                ? stored
                : (dark ? 'dark' : 'light');
        })();
    </script>

    <?= view('components/seo-head', ['site' => $site, 'page' => $page]) ?>

    <link rel="stylesheet" href="<?= asset_url('css/base.css') ?>">
    <link rel="stylesheet" href="<?= asset_url('css/components.css') ?>">
    <link rel="stylesheet" href="<?= asset_url('css/layouts.css') ?>">
    <link rel="stylesheet" href="<?= asset_url('css/pages.css') ?>">

    <link rel="icon" type="image/svg+xml" href="<?= asset_url('favicon.svg') ?>">
</head>
<body id="top">
    <a class="skip-link" href="#main-content"><?= lang('App.skipToContent') ?></a>

    <?= view('components/header', ['site' => $site]) ?>
    <?= view('components/nav', ['site' => $site]) ?>

    <main id="main-content" class="site-main">
        <?= view($contentView, $page['contentData'] ?? []) ?>
    </main>

    <?= view('components/footer', ['site' => $site]) ?>

    <script src="<?= asset_url('js/app.js') ?>" defer></script>
</body>
</html>