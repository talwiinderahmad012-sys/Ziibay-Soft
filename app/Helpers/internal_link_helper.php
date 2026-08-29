<?php

/**
 * Internal Link Helper
 *
 * Centralized builder for canonical internal URLs (Phase #20).
 * All public internal links should be generated through these functions
 * so URL normalization stays consistent across templates, audit tooling,
 * and future features.
 */

if (! function_exists('internal_url')) {
    /**
     * Build a canonical internal URL for a known entity type.
     *
     * @param string $type   One of: home, about, contact, faq, search,
     *                       services, service, industries, industry,
     *                       blog, blog_category, blog_tag, blog_author, blog_post,
     *                       case_studies, case_study, portfolio, portfolio_project,
     *                       locations, location, location_service, privacy, terms
     * @param array  $params Type-specific values (slug, path slugs, etc.)
     *
     * @return string|null Absolute URL, or null when required params are missing.
     */
    function internal_url(string $type, array $params = []): ?string
    {
        switch ($type) {
            case 'home':
                return base_url('/');
            case 'about':
                return base_url('about');
            case 'contact':
                return base_url('contact');
            case 'faq':
                return base_url('faq');
            case 'search':
                return base_url('search');
            case 'privacy':
                return base_url('privacy');
            case 'terms':
                return base_url('terms');

            case 'services':
                return base_url('services');
            case 'service':
                return isset($params['slug']) ? base_url('services/' . $params['slug']) : null;

            case 'industries':
                return base_url('industries');
            case 'industry':
                return isset($params['slug']) ? base_url('industries/' . $params['slug']) : null;

            case 'blog':
                return base_url('blog');
            case 'blog_category':
                return isset($params['slug']) ? base_url('blog/category/' . $params['slug']) : null;
            case 'blog_tag':
                return isset($params['slug']) ? base_url('blog/tag/' . $params['slug']) : null;
            case 'blog_author':
                return isset($params['slug']) ? base_url('authors/' . $params['slug']) : null;
            case 'blog_post':
                return isset($params['slug']) ? base_url('blog/' . $params['slug']) : null;

            case 'case_studies':
                return base_url('case-studies');
            case 'case_study':
                return isset($params['slug']) ? base_url('case-studies/' . $params['slug']) : null;

            case 'portfolio':
                return base_url('portfolio');
            case 'portfolio_project':
                return isset($params['slug']) ? base_url('portfolio/' . $params['slug']) : null;

            case 'locations':
                return base_url('locations');
            case 'location':
                // $params['path'] = ordered slugs [country, region, city]
                if (empty($params['path']) || ! is_array($params['path'])) {
                    return null;
                }
                return base_url('locations/' . implode('/', $params['path']));
            case 'location_service':
                if (empty($params['path']) || ! is_array($params['path']) || empty($params['service_slug'])) {
                    return null;
                }
                return base_url('locations/' . implode('/', $params['path']) . '/' . $params['service_slug']);

            default:
                return null;
        }
    }
}

if (! function_exists('is_internal_url')) {
    /**
     * True when the URL points at the current site (same host),
     * or is a root-relative path.
     */
    function is_internal_url(string $url): bool
    {
        $url = trim($url);

        if ($url === '' || str_starts_with($url, '#')) {
            return false;
        }

        // Root-relative paths are internal by definition.
        if (str_starts_with($url, '/') && ! str_starts_with($url, '//')) {
            return true;
        }

        // mailto, tel, javascript are not crawlable internal links.
        if (preg_match('/^(mailto:|tel:|javascript:)/i', $url)) {
            return false;
        }

        $parts = parse_url($url);
        if (empty($parts['host'])) {
            return str_starts_with($url, base_url());
        }

        $siteHost = parse_url(base_url(), PHP_URL_HOST) ?: '';
        $host     = strtolower($parts['host']);
        $siteHost = strtolower($siteHost);

        if ($host === $siteHost) {
            return true;
        }

        // Treat www / non-www variants as internal.
        return ltrim($host, 'www.') === ltrim($siteHost, 'www.');
    }
}

if (! function_exists('normalize_internal_url')) {
    /**
     * Normalize an internal URL to a site-relative path used for
     * graph matching: leading slash, lowercased host removed,
     * query string and fragment removed, single trailing slash removed.
     *
     * Returns null when the URL is not internal.
     */
    function normalize_internal_url(string $url): ?string
    {
        if (! is_internal_url($url)) {
            return null;
        }

        $url = trim($url);

        if (str_starts_with($url, '/') && ! str_starts_with($url, '//')) {
            $path = $url;
        } else {
            $base  = rtrim(base_url(), '/');
            $path  = $url;
            if (str_starts_with(strtolower($path), strtolower($base))) {
                $path = substr($path, strlen($base));
            } else {
                $parts = parse_url($url);
                $path  = $parts['path'] ?? '/';
            }
        }

        // Drop query string and fragment.
        $path = strtok($path, '?');
        $path = strtok($path, '#');

        if ($path === '') {
            $path = '/';
        }

        if (! str_starts_with($path, '/')) {
            $path = '/' . $path;
        }

        // Remove a single trailing slash (root stays "/").
        if ($path !== '/' && str_ends_with($path, '/')) {
            $path = rtrim($path, '/');
        }

        // Collapse duplicate slashes.
        $path = preg_replace('#/+#', '/', $path);

        return $path;
    }
}

if (! function_exists('extract_internal_links')) {
    /**
     * Extract internal href targets from an HTML fragment.
     *
     * Returns a unique list of normalized internal paths.
     * External, anchor-only, mailto/tel links are ignored.
     */
    function extract_internal_links(?string $html): array
    {
        if ($html === null || $html === '' || stripos($html, '<a') === false) {
            return [];
        }

        if (! preg_match_all('/<a\s[^>]*href\s*=\s*["\']([^"\']+)["\']/i', $html, $matches)) {
            return [];
        }

        $paths = [];
        foreach ($matches[1] as $href) {
            $normalized = normalize_internal_url($href);
            if ($normalized !== null && $normalized !== '/') {
                $paths[$normalized] = true;
            } elseif ($normalized === '/') {
                $paths['/'] = true;
            }
        }

        return array_keys($paths);
    }
}
