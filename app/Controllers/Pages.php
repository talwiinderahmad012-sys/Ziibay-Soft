<?php

namespace App\Controllers;

/**
 * Public pages.
 *
 * STEP 01: only the static shell pages exist.
 * Service, location and CMS pages will be added in later steps.
 */
class Pages extends BaseController
{
    public function home(): string
    {
        return $this->renderPage('frontend/pages/home', [
            'title'       => 'Ziibay Soft — Web, Software & App Development',
            'description' => 'Ziibay Soft builds websites, software and mobile apps for international businesses.',
            'canonical'   => app_url(''),
        ]);
    }

    public function about(): string
    {
        return $this->renderPage('frontend/pages/about', [
            'title'       => 'About Us | Ziibay Soft',
            'description' => 'Learn how Ziibay Soft helps companies launch and scale digital products across the globe.',
            'canonical'   => app_url('about'),
        ]);
    }

    public function contact(): string
    {
        return $this->renderPage('frontend/pages/contact', [
            'title'       => 'Contact Us | Ziibay Soft',
            'description' => 'Get in touch with the Ziibay Soft team about your next web, software or app project.',
            'canonical'   => app_url('contact'),
        ]);
    }
}