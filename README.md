# Ziibay Soft — Website

Production foundation (STEP 01) for the Ziibay Soft international software-company
website, built on **CodeIgniter 4.7** with a clean, dependency-light frontend.

Core business: Web Development · Software Development · App Development
(plus SEO, SMM, UI/UX, Graphic Design and E-Commerce services in later steps).

---

## Requirements

| Tool    | Version                        |
|---------|--------------------------------|
| PHP     | ^8.2 (tested on 8.4.15)        |
| Composer| 2.x                            |
| MySQL / MariaDB | 5.7+ / 10.4+ (STEP 02+) |

Required PHP extensions (all present in WAMP): mbstring, intl, mysqli /
pdo_mysql, curl, json, openssl, libxml.

## Getting started

```bash
# 1. Install dependencies
composer install

# 2. Create your local environment
cp .env.example .env        # Windows PowerShell: Copy-Item .env.example .env
# then edit .env — at minimum set app.baseURL and database credentials

# 3. Run locally (built-in server)
php spark serve             # http://localhost:8080
```

### WAMP / Apache alternative

The project lives in `d:/Wamp/www/Ziibay Soft`. Point a WAMP virtual host at the
`public/` folder (never the project root) or enable WAMP's per-folder alias.
With plain `http://localhost/Ziibay%20Soft/public/` the root `.htaccess` handles
rewriting; for production always prefer a vhost whose `DocumentRoot` is `public/`.

## Routes (STEP 01)

| Route      | Controller        | Description            |
|------------|-------------------|------------------------|
| `/`        | `Pages::home`     | Placeholder homepage   |
| `/about`   | `Pages::about`    | Placeholder about page |
| `/contact` | `Pages::contact`  | Placeholder contact    |

Auto-routing is **disabled** (`Config\Routing::$autoRoute = false`). Every route
must be declared explicitly in `app/Config/Routes.php`.

## Running tests

```bash
composer test                                  # fast run
$env:XDEBUG_MODE='coverage'; composer test     # with coverage report
```

## Verifying the theme foundation

1. Open any page → the theme follows your OS setting on first visit
   (`prefers-color-scheme`), applied by an inline boot script before first paint (no flash).
2. Click the sun/moon button in the header → theme toggles instantly and is
   stored in `localStorage` (`ziibay-theme`).
3. Reload → your choice persists; OS changes no longer override it while a
   stored preference exists.
4. Implementation:
   - tokens & palettes: `public/assets/css/base.css`
     (`:root` = light, `[data-theme="dark"]` = dark)
   - boot script + toggle logic: `app/Views/layouts/frontend.php`,
     `public/assets/js/app.js`

## Project structure

```
app/
    Config/          App, Site (site settings/env), Routing, Filters, …
    Controllers/     BaseController (+ renderPage()), Pages
    Database/        Migrations/, Seeds/          (empty — STEP 02+)
    Filters/         custom filters               (empty)
    Helpers/         site_helper.php (site_config, app_url, asset_url, raw_json)
    Language/en/     App.php strings catalog (i18n-ready)
    Libraries/       reusable libraries           (empty)
    Models/          models                       (empty)
    Services/        service classes              (empty)
    Views/
        layouts/frontend.php      shared HTML shell
        components/               seo-head, header, nav, footer,
                                  theme-switch, language-switch, whatsapp-button
        frontend/pages/           home, about, contact fragments
        errors/html/              branded 400/403/404/500 pages
        admin/                    reserved for STEP 02+
public/
    assets/css|js|images|icons|fonts/
    favicon.svg  index.php  robots.txt  .htaccess
tests/               PHPUnit suite (unit + feature)
writable/            cache, logs, session, uploads
```

## Architecture notes (STEP 01)

- **Layout composition** — controllers call `$this->renderPage($view, $page)`
  (`BaseController`). The layout renders `<head>` SEO via `components/seo-head`
  and includes the page fragment from `Views/frontend/pages/*`. Page views stay
  pure content; SEO metadata stays in controllers.
- **SEO-ready head** — every page defines title/description/canonical/robots;
  Open Graph, Twitter cards and JSON-LD schema emit automatically
  (`components/seo-head.php`). No fake content is generated.
- **Theme system** — CSS custom properties only (no hard-coded colors in
  components); `data-theme` attribute strategy; localStorage persistence;
  `prefers-color-scheme` fallback; FOUC prevented by an inline head script.
- **i18n-ready** — all UI copy flows through `lang('App.*')` with an English
  catalog; `Config\Site::$supportedLocales` is the single switchboard. Only
  English ships in STEP 01. IP-based language *suggestion* (never auto-redirect)
  is planned as a later, opt-in UX feature — crawlers always get consistent HTML.
- **WhatsApp button** — component included globally via the footer; it renders
  only when `site.whatsapp` is configured in `.env`, so enabling it later needs
  zero template changes.
- **Security baseline** — CSRF filter global (state-changing requests),
  invalid-chars filter, secure-headers filter, HttpOnly/Lax cookies with a
  `ziibay_` prefix, cookie/session names product-prefixed, secrets only in
  `.env` (gitignored), XSS-safe output via `esc()` everywhere.
- **Error handling** — branded self-contained error views (they never depend on
  helpers/services so they render even during failures); JSON responses for
  non-HTML clients; debug details only outside production.
- **Deliberate deviation** — the scaffold's `pre_system` handler flushed all
  output buffers; that broke the first buffered response under PHPUnit, so it
  was reduced to the zlib-compression guard (see `app/Config/Events.php`).

## What comes next (not in this step)

Database schema & settings module · admin panel · authentication/RBAC ·
services catalogue · countries/states/cities · programmatic SEO location pages
(`/services/web-development/united-states/california/los-angeles/`) · blog ·
portfolio · case studies · leads · WhatsApp integration · multi-language ·
XML sitemap · caching & performance tuning.

