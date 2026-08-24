<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 *
 * Extend this class in any new controllers:
 *
 *     class Home extends BaseController
 *
 * For security, be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
    }

    /**
     * Renders a page inside the shared frontend layout.
     *
     * Keeps controllers thin: page content fragments live in
     * app/Views/frontend/pages/* and never repeat the HTML shell.
     *
     * @param array<string, mixed> $page SEO/head metadata + content fragment data.
     *                                   Known keys:
     *                                   - title, description, canonical, robots
     *                                   - og:type, og:image, twitter:card
     *                                   - schema: list<array> (JSON-LD payloads)
     *                                   - contentData: array passed to the fragment view
     */
    protected function renderPage(string $viewName, array $page = []): string
    {
        $site = site_config();

        $defaults = [
            'title'       => $site->name,
            'description' => '',
            'canonical'   => '',
            'robots'      => 'index, follow',
            'og'          => [],
            'twitter'     => [],
            'schema'      => [],
            'contentData' => [],
        ];

        $page = array_merge($defaults, $page);

        return view('layouts/frontend', [
            'site'        => $site,
            'page'        => $page,
            'contentView' => $viewName,
        ]);
    }
}
