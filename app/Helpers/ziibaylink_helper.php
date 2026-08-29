<?php

/**
 * ZiibayLink Helper
 *
 * Centralized canonical URL generator for internal links.
 * Always respects base_url() and existing slug fields.
 * Editors and templates should use these functions rather than
 * hardcoding paths throughout views.
 *
 * Phase #20 — Internal Linking Architecture
 */

if (! function_exists('ziibay_service_url')) {
    /**
     * Generate the canonical URL for a service page.
     * @param  string  $slug  Service slug (e.g. 'web-development')
     * @return string
     */
    function ziibay_service_url(string $slug): string
    {
        return base_url('services/' . $slug);
    }
}

if (! function_exists('ziibay_industry_url')) {
    /**
     * Generate the canonical URL for an industry page.
     * @param  string  $slug  Industry slug
     * @return string
     */
    function ziibay_industry_url(string $slug): string
    {
        return base_url('industries/' . $slug);
    }
}

if (! function_exists('ziibay_blog_url')) {
    /**
     * Generate the canonical URL for a blog post.
     * @param  string  $slug  Post slug
     * @return string
     */
    function ziibay_blog_url(string $slug): string
    {
        return base_url('blog/' . $slug);
    }
}

if (! function_exists('ziibay_case_study_url')) {
    /**
     * Generate the canonical URL for a case study.
     * @param  string  $slug  Case study slug
     * @return string
     */
    function ziibay_case_study_url(string $slug): string
    {
        return base_url('case-studies/' . $slug);
    }
}

if (! function_exists('ziibay_location_url')) {
    /**
     * Generate a canonical location URL from a location row.
     * Handles city, region, country by climbing parent_id chain.
     *
     * @param  array  $location   Location row (must have 'location_type', 'slug')
     * @param  string $countrySlug
     * @param  string $regionSlug  (optional, required when city)
     * @return string
     */
    function ziibay_location_url(string $countrySlug, string $regionSlug = '', string $citySlug = ''): string
    {
        $path = 'locations/' . $countrySlug;
        if ($regionSlug) {
            $path .= '/' . $regionSlug;
        }
        if ($citySlug) {
            $path .= '/' . $citySlug;
        }
        return base_url($path);
    }
}

if (! function_exists('ziibay_location_service_url')) {
    /**
     * Generate the canonical URL for a location-service page.
     *
     * @param  string  $countrySlug
     * @param  string  $regionSlug
     * @param  string  $citySlug
     * @param  string  $serviceSlug
     * @return string
     */
    function ziibay_location_service_url(string $countrySlug, string $regionSlug, string $citySlug, string $serviceSlug): string
    {
        return base_url("locations/{$countrySlug}/{$regionSlug}/{$citySlug}/{$serviceSlug}");
    }
}

if (! function_exists('ziibay_portfolio_url')) {
    /**
     * Generate the canonical URL for a portfolio item.
     * @param  string  $slug
     * @return string
     */
    function ziibay_portfolio_url(string $slug): string
    {
        return base_url('portfolio/' . $slug);
    }
}
