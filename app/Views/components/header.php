<header class="site-header">
    <div class="container site-header__inner">
        <a class="brand" href="<?= app_url('') ?>" aria-label="<?= lang('App.siteName') ?> — <?= lang('App.nav.home') ?>">
            <svg class="brand__mark" width="28" height="28" viewBox="0 0 28 28" fill="none" aria-hidden="true" focusable="false">
                <rect x="1" y="1" width="26" height="26" rx="7" fill="var(--color-primary)" />
                <path d="M9 19V9h4.2c1.8 0 3 1 3 2.6 0 1.9-1.4 2.9-3.3 2.9H12v4.5H9zm3-6.7h1c.7 0 1.1-.4 1.1-1 0-.6-.4-1-1.1-1h-1v2z" fill="#fff" />
                <circle cx="19" cy="18" r="1.4" fill="#fff" />
            </svg>
            <span class="brand__name"><?= esc(site_config('name')) ?></span>
        </a>

        <div class="site-header__actions">
            <?= view('components/theme-switch') ?>
            <?= view('components/language-switch') ?>
        </div>
    </div>
</header>