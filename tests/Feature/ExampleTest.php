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

    public function test_beranda_displays_partner_slider(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('partner-marquee-track');
        $response->assertSee('PT Denso Indonesia');
    }

    public function test_admin_can_access_partners_management(): void
    {
        $admin = \App\Models\User::first();
        $response = $this->actingAs($admin)->get('/admin/partners');
        $response->assertStatus(200);
        $response->assertSee('Kelola Logo Mitra');
        $response->assertSee('PT Denso Indonesia');
    }
}
