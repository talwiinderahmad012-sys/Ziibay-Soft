<?php

/**
 * Global WhatsApp button (STEP 01 architecture shell).
 *
 * Rendered once in the shared footer so the feature can later be enabled
 * everywhere by configuring the WhatsApp number in site settings / env.
 * The button stays hidden until Config\Site::$whatsappNumber is set.
 */

$whatsapp = site_config('whatsappNumber');

if (! is_string($whatsapp) || $whatsapp === '') {
    return;
}
?>

<a
    class="whatsapp-button"
    href="https://wa.me/<?= esc($whatsapp, 'attr') ?>"
    target="_blank"
    rel="noopener noreferrer"
    aria-label="<?= lang('App.whatsapp.label') ?>">
    <svg width="26" height="26" viewBox="0 0 32 32" fill="currentColor" aria-hidden="true" focusable="false">
        <path d="M16 2.7C8.7 2.7 2.8 8.6 2.8 15.9c0 2.3.6 4.6 1.8 6.6L2.6 29.4l7-1.8c1.9 1 4 1.6 6.3 1.6 7.3 0 13.2-5.9 13.2-13.2C29.2 8.6 23.3 2.7 16 2.7zm0 24.2c-2.1 0-4.1-.6-5.9-1.6l-.4-.2-4.2 1.1 1.1-4.1-.3-.4c-1.2-1.8-1.8-3.9-1.8-6C4.5 9.3 9.7 4.1 16 4.1s11.5 5.2 11.5 11.5S22.3 26.9 16 26.9zm5.9-8.3c-.3-.2-1.9-.9-2.2-1s-.5-.2-.7.2c-.2.3-.8 1-.9 1.2-.2.2-.3.2-.6.1-.3-.2-1.3-.5-2.5-1.5-.9-.8-1.5-1.9-1.7-2.2-.2-.3 0-.5.1-.6l.5-.6c.2-.2.2-.3.3-.5s0-.4 0-.5c-.1-.2-.7-1.6-.9-2.2-.2-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.5s1.1 2.9 1.2 3.1c.1.2 2.1 3.3 5.2 4.6.7.3 1.3.5 1.7.6.7.2 1.4.2 1.9.1.6-.1 1.9-.8 2.1-1.5.3-.7.3-1.4.2-1.5-.1-.1-.3-.2-.6-.4z"/>
    </svg>
    <span class="whatsapp-button__label"><?= lang('App.whatsapp.label') ?></span>
</a>