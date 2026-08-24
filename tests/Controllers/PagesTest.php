<?php

namespace Tests\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * Feature tests for the public shell pages (STEP 01).
 *
 * @internal
 */
final class PagesTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testHomePage(): void
    {
        $result = $this->get('/');

        $result->assertStatus(200);
        $result->assertSee('Ziibay Soft');
        $result->assertSee('data-theme');
    }

    public function testAboutPage(): void
    {
        $result = $this->get('/about');

        $result->assertStatus(200);
        $result->assertSee('About');
    }

    public function testContactPage(): void
    {
        $result = $this->get('/contact');

        $result->assertStatus(200);
        $result->assertSee('Contact');
    }

    /**
     * Unknown routes raise PageNotFoundException; the framework's exception
     * handler then renders app/Views/errors/html/error_404.php.
     */
    public function testUnknownRouteThrowsPageNotFound(): void
    {
        $this->expectException(PageNotFoundException::class);

        $this->get('/this-page-does-not-exist');
    }
}