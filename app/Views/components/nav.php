<?php
$currentPath = trim((string) service('request')->getUri()->getPath(), '/');

$links = [
    ['path' => '',    'label' => lang('App.nav.home')],
    ['path' => 'about',   'label' => lang('App.nav.about')],
    ['path' => 'contact', 'label' => lang('App.nav.contact')],
];
?>

<nav class="site-nav" aria-label="<?= esc(site_config('name')) ?>">
    <div class="container site-nav__inner">
        <button
            type="button"
            class="site-nav__toggle"
            data-nav-toggle
            aria-expanded="false"
            aria-controls="primary-navigation"
            aria-label="<?= lang('App.nav.menu') ?>">
            <span class="site-nav__toggle-bar" aria-hidden="true"></span>
            <span class="site-nav__toggle-bar" aria-hidden="true"></span>
            <span class="site-nav__toggle-bar" aria-hidden="true"></span>
        </button>

        <ul id="primary-navigation" class="site-nav__list">
            <?php foreach ($links as $link) : ?>
                <?php $isActive = $currentPath === $link['path']; ?>
                <li class="site-nav__item">
                    <a
                        class="site-nav__link<?= $isActive ? ' is-active' : '' ?>"
                        href="<?= app_url($link['path']) ?>"
                        <?= $isActive ? 'aria-current="page"' : '' ?>>
                        <?= esc($link['label']) ?>
                    </a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>
</nav>