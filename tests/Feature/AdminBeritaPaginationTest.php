<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBeritaPaginationTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    protected User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = User::first() ?? User::create([
            'name' => 'Administrator',
            'email' => 'admin@polmind.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
    }

    public function test_admin_berita_pagination_renders_cleanly(): void
    {
        // Seed 15 news articles so pagination is triggered (page size = 10)
        for ($i = 1; $i <= 15; $i++) {
            Berita::create([
                'title' => "Berita Uji Coba Ke-{$i}",
                'slug' => "berita-uji-coba-ke-{$i}",
                'author' => 'Humas Polmind',
                'category' => 'akademik',
                'published_date' => now()->subDays($i),
                'summary' => "Ringkasan berita {$i}",
                'content' => "Konten isi berita {$i}",
                'is_published' => true,
                'views_count' => 10,
            ]);
        }

        $response = $this->actingAs($this->admin)->get('/admin/berita');

        $response->assertStatus(200);

        // Assert custom pagination structure
        $response->assertSee('admin-pagination-nav');
        $response->assertSee('admin-pagination-list');
        $response->assertSee('admin-page-link');
        $response->assertSee('Menampilkan');
        $response->assertSee('sampai');
        $response->assertSee('hasil');
        $response->assertSee('Sebelumnya');
        $response->assertSee('Berikutnya');

        // Assert bug indicators are NOT present
        $response->assertDontSee('pagination.previous');
        $response->assertDontSee('pagination.next');
        $response->assertDontSee('w-5 h-5');
    }
}
