<?php

/**
 * --------------------------------------------------------------------------
 * Site Helper
 * --------------------------------------------------------------------------
 *
 * Small, framework-native helpers for the frontend shell.
 * This file is autoloaded via app/Config/Autoload.php.
 */

if (! function_exists('site_config')) {
    /**
     * Returns a value from the Config\Site settings bag.
     *
     * @param string|null $key Dotted key; null returns the whole config object.
     */
    function site_config(?string $key = null): mixed
    {
        $site = config('Site');

        if ($key === null || $key === '') {
            return $site;
        }

        $value = $site;
        foreach (explode('.', $key) as $segment) {
            if (! is_object($value) || ! property_exists($value, $segment)) {
                return null;
            }
            $value = $value->{$segment};
        }

        return $value;
    }
}

if (! function_exists('asset_url')) {
    /**
     * Full URL to a file inside public/assets.
     *
     * @param string $path Relative path under /assets, e.g. 'css/site.css'.
     */
    function asset_url(string $path = ''): string
    {
        return base_url('assets/' . ltrim($path, '/'));
    }
}

if (! function_exists('app_url')) {
    /**
     * Absolute URL for a site path based on Config\Site::$url.
     *
     * This never appends index.php (unlike the framework's site_url helper),
     * so it is safe for canonical tags, nav links and sitemaps.
     * Falls back to base_url() when Config\Site::$url is empty.
     *
     * @param string $path Site-relative path, e.g. 'about'.
     */
    function app_url(string $path = ''): string
    {
        $base = (string) site_config('url');

        if ($base === '') {
            $base = base_url();
        }

        return rtrim($base, '/') . '/' . ltrim($path, '/');
    }
}

if (! function_exists('raw_json')) {
    /**
     * JSON-encodes a value for safe inline script/JSON-LD output.
     * Hex-tags prevent HTML/script breakouts.
     */
    function raw_json(mixed $value): string
    {
        return json_encode(
            $value,
            JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES
        );
    }
}