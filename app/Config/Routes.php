<?php

use CodeIgniter\Router\RouteCollection;

/**
 * Frontend routes (STEP 01).
 *
 * Service / location / blog / admin routes will be added in later steps.
 * Do not add auto-routed controllers — Routing::$autoRoute stays disabled.
 *
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::home');
$routes->get('about', 'Pages::about');
$routes->get('contact', 'Pages::contact');
