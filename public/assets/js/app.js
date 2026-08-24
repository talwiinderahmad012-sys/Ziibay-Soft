/**
 * Ziibay Soft — frontend behaviours.
 *
 * Architecture notes:
 * - The theme is applied on <html data-theme="…">. The inline bootstrap
 *   script in layouts/frontend reads localStorage / prefers-color-scheme
 *   before first paint (no FOUC). This module owns the toggle + persistence.
 * - The language <select> is wired here so future multi-lingual routing can
 *   reuse the same hook without touching markup.
 */
'use strict';

(() => {
    const STORAGE_KEY = 'ziibay-theme';
    const root = document.documentElement;

    const getStoredTheme = () => localStorage.getItem(STORAGE_KEY);
    const setStoredTheme = (theme) => localStorage.setItem(STORAGE_KEY, theme);

    /* Theme switch -------------------------------------------------------- */
    const themeSwitch = document.querySelector('[data-theme-toggle]');
    const themeIcon = themeSwitch ? themeSwitch.querySelector('.theme-switch__icon') : null;

    const SUN_SVG =
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="4.2"/><path d="M12 2.5v2.2M12 19.3v2.2M2.5 12h2.2M19.3 12h2.2M4.9 4.9l1.6 1.6M17.5 17.5l1.6 1.6M19.1 4.9l-1.6 1.6M6.5 17.5l-1.6 1.6"/></svg>';
    const MOON_SVG =
        '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.5 14.2A8.5 8.5 0 0 1 9.8 3.5a8.5 8.5 0 1 0 10.7 10.7z"/></svg>';

    const currentTheme = () => root.dataset.theme || 'light';

    function renderThemeIcon(theme) {
        if (!themeIcon) {
            return;
        }
        themeIcon.innerHTML = theme === 'dark' ? SUN_SVG : MOON_SVG;
    }

    function applyTheme(theme, persist) {
        root.dataset.theme = theme;
        renderThemeIcon(theme);

        if (themeSwitch) {
            themeSwitch.setAttribute('aria-checked', theme === 'dark' ? 'true' : 'false');
        }

        if (persist) {
            setStoredTheme(theme);
        }
    }

    if (themeSwitch) {
        themeSwitch.addEventListener('click', () => {
            const next = currentTheme() === 'dark' ? 'light' : 'dark';
            applyTheme(next, true);
        });
    }

    /* Mobile navigation toggle ---------------------------------------------- */
    const navToggle = document.querySelector('[data-nav-toggle]');
    const navList = document.querySelector('#primary-navigation');

    if (navToggle && navList) {
        navToggle.addEventListener('click', () => {
            const open = navList.classList.toggle('is-open');
            navToggle.setAttribute('aria-expanded', open ? 'true' : 'false');
        });
    }

    /* Language switch (future multi-locale) ---------------------------------- */
    const langSelect = document.querySelector('[data-language-select]');
    if (langSelect) {
        langSelect.addEventListener('change', () => {
            const locale = langSelect.value;
            if (!locale) {
                return;
            }
            const url = new URL(window.location.href);
            url.searchParams.set('lang', locale);
            window.location.href = url.toString();
        });
    }

    /* Boot -------------------------------------------------------------------- */
    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)');
    applyTheme(getStoredTheme() ?? (prefersDark.matches ? 'dark' : 'light'), false);

    prefersDark.addEventListener('change', (event) => {
        if (!getStoredTheme()) {
            applyTheme(event.matches ? 'dark' : 'light', false);
        }
    });
})();