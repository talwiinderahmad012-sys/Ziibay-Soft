<section class="page-section" aria-labelledby="contact-title">
    <div class="container container--narrow">
        <h1 id="contact-title" class="page-title"><?= lang('App.contact.title') ?></h1>
        <p class="page-lead"><?= lang('App.contact.lead') ?></p>

        <?php $email = site_config('contactEmail'); ?>
        <?php if (is_string($email) && $email !== '') : ?>
            <div class="contact-block">
                <h2 class="page-subtitle"><?= lang('App.contact.email') ?></h2>
                <a class="button button--ghost" href="mailto:<?= esc($email, 'url') ?>"><?= esc($email) ?></a>
            </div>
        <?php endif ?>

        <!-- A contact form (with CSRF + validation) will be added in a later step. -->
    </div>
</section>