<section class="hero">
    <div class="container">
        <p class="hero__eyebrow"><?= lang('App.siteTagline') ?></p>
        <h1 class="hero__title"><?= lang('App.home.hero.title') ?></h1>
        <p class="hero__lead"><?= lang('App.home.hero.lead') ?></p>

        <div class="hero__actions">
            <a class="button button--primary" href="<?= app_url('contact') ?>"><?= lang('App.home.cta.primary') ?></a>
            <a class="button button--ghost" href="<?= app_url('about') ?>"><?= lang('App.home.cta.secondary') ?></a>
        </div>

        <!-- Service catalogue, portfolio and SEO location pages are intentionally
             not part of STEP 01. They will appear here in later steps. -->
    </div>
</section>