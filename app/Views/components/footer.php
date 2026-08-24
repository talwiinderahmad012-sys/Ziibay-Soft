<footer class="site-footer">
    <div class="container site-footer__grid">
        <div class="site-footer__brand">
            <p class="site-footer__name"><?= esc(site_config('name')) ?></p>
            <p class="site-footer__tagline"><?= lang('App.footer.tagline') ?></p>
        </div>

        <nav class="site-footer__nav" aria-label="<?= lang('App.footer.navigation') ?>">
            <p class="site-footer__heading"><?= lang('App.footer.navigation') ?></p>
            <ul>
                <li><a href="<?= app_url('') ?>"><?= lang('App.nav.home') ?></a></li>
                <li><a href="<?= app_url('about') ?>"><?= lang('App.nav.about') ?></a></li>
                <li><a href="<?= app_url('contact') ?>"><?= lang('App.nav.contact') ?></a></li>
            </ul>
        </nav>

        <div class="site-footer__contact">
            <p class="site-footer__heading"><?= lang('App.footer.contact') ?></p>
            <ul>
                <?php $email = site_config('contactEmail'); ?>
                <?php if (is_string($email) && $email !== '') : ?>
                    <li><a href="mailto:<?= esc($email, 'url') ?>"><?= esc($email) ?></a></li>
                <?php endif ?>
            </ul>
        </div>
    </div>

    <div class="container site-footer__bottom">
        <p>&copy; <?= date('Y') ?> <?= esc(site_config('name')) ?>. <?= lang('App.footer.rights') ?></p>
        <a class="site-footer__top" href="#top"><?= lang('App.footer.backToTop') ?> ↑</a>
    </div>
</footer>

<?= view('components/whatsapp-button') ?>