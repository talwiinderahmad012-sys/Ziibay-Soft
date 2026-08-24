<?php

/**
 * Language switcher (STEP 01 architecture shell).
 *
 * Renders a <select> of supported locales. With a single locale (English),
 * nothing is rendered — the feature becomes active as soon as a second
 * supported locale is added via Config\Site / env.
 */

$locales = site_config('supportedLocales');

if (! is_array($locales) || count($locales) <= 1) {
    return;
}

$current = service('request')->getLocale();
?>

<div class="language-switch">
    <label class="language-switch__label" for="language-select"><?= lang('App.language.label') ?></label>
    <select
        id="language-select"
        class="language-switch__select"
        name="locale"
        data-language-select>
        <?php foreach ($locales as $locale) : ?>
            <option value="<?= esc($locale) ?>"<?= ($locale === $current) ? ' selected' : '' ?>>
                <?= esc(strtoupper($locale)) ?>
            </option>
        <?php endforeach ?>
    </select>
</div>