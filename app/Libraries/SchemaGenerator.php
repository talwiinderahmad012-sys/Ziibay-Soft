<?php

namespace App\Libraries;

use App\Models\SettingModel;
use App\Models\SchemaOverrideModel;

/**
 * Phase 21 — Schema Generator Library
 *
 * Centralized, SEO-safe Structured Data generator.
 * Emits valid JSON-LD wrapped in a @graph.
 * Strips null/empty values automatically.
 * Respects page-level manual overrides and enable/disable flags.
 */
class SchemaGenerator
{
    protected $entities = [];
    protected $settings = [];
    protected $override = null;

    public function __construct()
    {
        $this->loadSettings();
    }

    /**
     * Load global settings for Organization/Logo data.
     */
    protected function loadSettings()
    {
        $model = new SettingModel();
        // Fallbacks if database settings are empty
        $this->settings = [
            'org_name'        => $this->getSettingValue($model, 'schema_organization_name') ?: 'Ziibay Soft',
            'org_logo'        => $this->getSettingValue($model, 'schema_organization_logo') ?: base_url('images/logo.png'),
            'org_description' => $this->getSettingValue($model, 'schema_organization_description') ?: 'A premium digital agency delivering scalable web and software solutions.',
            'org_email'       => $this->getSettingValue($model, 'schema_organization_email'),
            'org_phone'       => $this->getSettingValue($model, 'schema_organization_phone'),
            'same_as'         => $this->getSettingValue($model, 'schema_social_profiles'), // Expect JSON array string
        ];
    }

    protected function getSettingValue($model, $key)
    {
        $row = $model->where('setting_key', $key)->first();
        return $row ? $row['setting_value'] : null;
    }

    /**
     * Check if there's a page-level override
     */
    public function loadOverride(string $entityType, int $entityId)
    {
        $model = new SchemaOverrideModel();
        $this->override = $model->getOverride($entityType, $entityId);
    }

    /**
     * Build and return the final JSON-LD string
     */
    public function render(): string
    {
        // 1. Check if disabled via override
        if ($this->override && (int)$this->override['is_enabled'] === 0) {
            return "<!-- Schema disabled by admin -->\n";
        }

        // 2. Check if manual JSON-LD is provided
        if ($this->override && !empty($this->override['manual_json_ld'])) {
            $json = trim($this->override['manual_json_ld']);
            return "<script type=\"application/ld+json\">\n{$json}\n</script>\n";
        }

        // 3. Auto-generate graph
        if (empty($this->entities)) {
            return '';
        }

        $graph = [
            '@context' => 'https://schema.org',
            '@graph'   => $this->cleanArray($this->entities)
        ];

        // JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP for XSS safety
        $json = json_encode($graph, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_PRETTY_PRINT);
        
        return "<script type=\"application/ld+json\">\n{$json}\n</script>\n";
    }

    /**
     * Recursively remove nulls or empty strings/arrays from the schema
     */
    protected function cleanArray(array $array): array
    {
        $cleaned = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $value = $this->cleanArray($value);
            }
            if ($value !== null && $value !== '' && $value !== []) {
                $cleaned[$key] = $value;
            }
        }
        return $cleaned;
    }

    /**
     * Add Organization Entity
     */
    public function addOrganization()
    {
        $sameAs = [];
        if ($this->settings['same_as']) {
            $decoded = json_decode($this->settings['same_as'], true);
            if (is_array($decoded)) {
                $sameAs = $decoded;
            }
        }

        $org = [
            '@type'       => 'Organization',
            '@id'         => base_url('#organization'),
            'name'        => $this->settings['org_name'],
            'url'         => base_url(),
            'logo'        => [
                '@type' => 'ImageObject',
                '@id'   => base_url('#logo'),
                'url'   => $this->settings['org_logo'],
            ],
            'description' => $this->settings['org_description'],
            'sameAs'      => !empty($sameAs) ? $sameAs : null,
        ];

        if ($this->settings['org_email'] || $this->settings['org_phone']) {
            $contact = ['@type' => 'ContactPoint', 'contactType' => 'customer service'];
            if ($this->settings['org_email']) $contact['email'] = $this->settings['org_email'];
            if ($this->settings['org_phone']) $contact['telephone'] = $this->settings['org_phone'];
            $org['contactPoint'] = $contact;
        }

        $this->entities[] = $org;
        return $this;
    }

    /**
     * Add WebSite Entity
     */
    public function addWebSite()
    {
        $this->entities[] = [
            '@type'     => 'WebSite',
            '@id'       => base_url('#website'),
            'url'       => base_url(),
            'name'      => $this->settings['org_name'],
            'publisher' => ['@id' => base_url('#organization')],
        ];
        return $this;
    }

    /**
     * Add WebPage Entity
     */
    public function addWebPage(string $title, string $url, string $description = '')
    {
        $this->entities[] = [
            '@type'       => 'WebPage',
            '@id'         => $url . '#webpage',
            'url'         => $url,
            'name'        => $title,
            'description' => $description,
            'isPartOf'    => ['@id' => base_url('#website')],
        ];
        return $this;
    }

    /**
     * Add BreadcrumbList Entity
     * @param array $breadcrumbs Format: [['name' => 'Home', 'url' => '...'], ...]
     */
    public function addBreadcrumbs(array $breadcrumbs)
    {
        if (empty($breadcrumbs)) return $this;

        $itemList = [];
        $position = 1;
        foreach ($breadcrumbs as $crumb) {
            $itemList[] = [
                '@type'    => 'ListItem',
                'position' => $position,
                'name'     => $crumb['name'],
                'item'     => $crumb['url']
            ];
            $position++;
        }

        $this->entities[] = [
            '@type'           => 'BreadcrumbList',
            '@id'             => $breadcrumbs[count($breadcrumbs)-1]['url'] . '#breadcrumb',
            'itemListElement' => $itemList,
        ];

        return $this;
    }

    /**
     * Add Service Entity
     */
    public function addService(string $name, string $description, string $url, array $areaServed = [])
    {
        $service = [
            '@type'       => 'Service',
            '@id'         => $url . '#service',
            'name'        => $name,
            'description' => $description,
            'url'         => $url,
            'provider'    => ['@id' => base_url('#organization')],
            'serviceType' => $name,
        ];

        if (!empty($areaServed)) {
            $service['areaServed'] = [];
            foreach ($areaServed as $area) {
                // Must be valid AdministrativeArea or Place
                $service['areaServed'][] = [
                    '@type' => $area['type'] ?? 'AdministrativeArea',
                    'name'  => $area['name'],
                ];
            }
        }

        $this->entities[] = $service;
        return $this;
    }

    /**
     * Add Article Entity
     */
    public function addArticle(string $headline, string $url, string $datePublished, string $dateModified, string $description = '', string $imageUrl = '', string $authorName = '')
    {
        $article = [
            '@type'            => 'Article',
            '@id'              => $url . '#article',
            'mainEntityOfPage' => ['@id' => $url . '#webpage'],
            'headline'         => $headline,
            'description'      => $description,
            'url'              => $url,
            'datePublished'    => $datePublished ? date('c', strtotime($datePublished)) : null,
            'dateModified'     => $dateModified ? date('c', strtotime($dateModified)) : null,
            'publisher'        => ['@id' => base_url('#organization')],
        ];

        if ($imageUrl) {
            $article['image'] = [
                '@type' => 'ImageObject',
                'url'   => $imageUrl,
            ];
        }

        if ($authorName) {
            $article['author'] = [
                '@type' => 'Person',
                'name'  => $authorName,
            ];
        } else {
            $article['author'] = ['@id' => base_url('#organization')];
        }

        $this->entities[] = $article;
        return $this;
    }

    /**
     * Add FAQPage Entity
     * @param array $faqs Format: [['q' => '...', 'a' => '...'], ...]
     */
    public function addFAQ(array $faqs)
    {
        if (empty($faqs)) return $this;

        $mainEntity = [];
        foreach ($faqs as $faq) {
            // Support both ['q'=>'', 'a'=>''] and ['question'=>'', 'answer'=>'']
            $q = $faq['q'] ?? $faq['question'] ?? '';
            $a = $faq['a'] ?? $faq['answer'] ?? '';
            
            if ($q && $a) {
                $mainEntity[] = [
                    '@type'          => 'Question',
                    'name'           => $q,
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text'  => $a,
                    ]
                ];
            }
        }

        if (!empty($mainEntity)) {
            $this->entities[] = [
                '@type'      => 'FAQPage',
                'mainEntity' => $mainEntity
            ];
        }

        return $this;
    }
}
