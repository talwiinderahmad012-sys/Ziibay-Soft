<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

/**
 * --------------------------------------------------------------------------
 * Site Configuration
 * --------------------------------------------------------------------------
 *
 * Holds high-level application-wide settings that will eventually be
 * manageable from a database-backed settings module (STEP 02+).
 * For now every value is environment-driven with safe defaults.
 *
 * The supported locales list is intentionally the single source of truth
 * for frontend language switching. Only English ships in STEP 01.
 */
class Site extends BaseConfig
{
    /**
     * Public website name / brand.
     */
    public string $name = 'Ziibay Soft';

    /**
     * Public website base URL (used for canonical links, schema, sitemap).
     */
    public string $url = '';

    /**
     * Default (fallback) interface language.
     */
    public string $defaultLocale = 'en';

    /**
     * Locales the frontend can be displayed in.
     *
     * @var list<string>
     */
    public array $supportedLocales = ['en'];

    /**
     * Default contact email shown on the Contact page.
     */
    public string $contactEmail = '';

    /**
     * WhatsApp number used by the global floating WhatsApp button.
     *
     * Empty string disables the button. Format: international digits only.
     */
    public string $whatsappNumber = '';

    /**
     * Social/profile links — empty until defined.
     *
     * @var array<string, string>
     */
    public array $social = [];

    public function __construct()
    {
        parent::__construct();

        $this->name          = (string) env('site.name', $this->name);
        $this->url           = rtrim((string) env('site.url', $this->url), '/');
        $this->defaultLocale = (string) env('site.defaultLocale', $this->defaultLocale);
        $this->contactEmail  = (string) env('site.email', $this->contactEmail);
        $this->whatsappNumber = preg_replace('/\D+/', '', (string) env('site.whatsapp', $this->whatsappNumber));

        $locales = env('site.supportedLocales', 'en');
        $this->supportedLocales = array_values(array_filter(array_map(
            static fn (string $l): string => trim($l),
            explode(',', (string) $locales),
        )));
    }
}