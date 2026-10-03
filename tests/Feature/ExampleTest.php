<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    /**
     * Test public pages load successfully.
     */
    public function test_public_pages_return_successful_responses(): void
    {
        $routes = [
            '/',
            '/beranda',
            '/profil',
            '/prodi',
            '/keunikan',
            '/pmb',
            '/dokumentasi',
            '/daftar_dosen',
            '/daftar_tendik',
            '/beranda/berita',
            '/admin/login',
            '/sitemap.xml',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }
}
