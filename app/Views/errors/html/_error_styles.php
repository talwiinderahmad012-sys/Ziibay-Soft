?php
/**
 * Shared inline styles for branded error pages.
 * Referenced by error_40x.php / error_500.php / production.php via PHP return.
 *
 * Kept dependency-free so error pages always render, even when the
 * application itself is failing.
 *
 * @return string CSS shared by all HTML error views.
 */
return <<<'CSS'
* { box-sizing: border-box; margin: 0; }
:root {
    --cn-bg: #ffffff;
    --cn-surface: #f4f7fa;
    --cn-text: #1c2b33;
    --cn-muted: #5c6670;
    --cn-primary: #1188bb;
    --cn-border: #d8e0e6;
}
@media (prefers-color-scheme: dark) {
    :root {
        --cn-bg: #12161b;
        --cn-surface: #171c22;
        --cn-text: #e9eef2;
        --cn-muted: #9aa7b3;
        --cn-primary: #4bb3e6;
        --cn-border: #28313a;
    }
}
body { font-family: system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif; background: var(--cn-bg); color: var(--cn-text); min-height: 100vh; display: grid; place-items: center; padding: 1.5rem; }
main { text-align: center; max-width: 34rem; }
.error-code { font-size: clamp(4rem, 16vw, 7rem); font-weight: 800; line-height: 1; color: var(--cn-primary); }
h1 { font-size: 1.5rem; margin: 1.25rem 0 0.75rem; }
.lead { color: var(--cn-muted); margin-bottom: 1.75rem; }
code { background: var(--cn-surface); border: 1px solid var(--cn-border); border-radius: 6px; padding: 0.35rem 0.6rem; font-size: 0.875rem; white-space: pre-wrap; word-break: break-word; display: inline-block; max-width: 100%; margin-top: 0.75rem; }
.home-link { display: inline-block; color: #fff; background: var(--cn-primary); padding: 0.7rem 1.4rem; border-radius: 8px; text-decoration: none; font-weight: 600; }
.home-link:hover { filter: brightness(0.94); }
.brand { margin-top: 2.5rem; font-size: 0.875rem; color: var(--cn-muted); }
CSS;