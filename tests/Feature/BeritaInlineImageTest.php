<?php

namespace Tests\Feature;

use App\Models\Berita;
use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class BeritaInlineImageTest extends TestCase
{
    use RefreshDatabase;

    protected bool $seed = true;

    protected User $admin;
    protected Category $category;

    protected function setUp(): void
    {
        parent::setUp();

        $this->admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->category = Category::create([
            'name' => 'Akademik',
            'slug' => 'akademik',
        ]);
    }

    public function test_admin_can_upload_inline_image(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('kegiatan.jpg', 800, 600);

        $response = $this->actingAs($this->admin)->postJson('/admin/berita/upload-image', [
            'image' => $file,
        ]);

        $response->assertStatus(200);
        $response->assertJson([
            'success' => true,
        ]);

        $this->assertStringContainsString('storage/news/inline/', $response->json('url'));
    }

    public function test_berita_with_inline_image_renders_properly(): void
    {
        $content = "Paragraf pembuka berita.\n\n<figure class=\"news-inline-image\">\n  <img src=\"/storage/news/inline/test.jpg\" alt=\"Dokumentasi Kegiatan\">\n  <figcaption>Foto: Suasana praktikum mahasiswa</figcaption>\n</figure>\n\nParagraf penutup berita.";

        $berita = Berita::create([
            'title' => 'Uji Coba Berita Multi Gambar',
            'slug' => 'uji-coba-berita-multi-gambar',
            'category' => $this->category->slug,
            'category_id' => $this->category->id,
            'author' => 'Administrator',
            'published_date' => now(),
            'content' => $content,
            'is_published' => true,
        ]);

        $formatted = $berita->formatted_content;

        $this->assertStringContainsString('<figure class="news-inline-image">', $formatted);
        $this->assertStringContainsString('<img src="/storage/news/inline/test.jpg"', $formatted);
        $this->assertStringContainsString('<figcaption>Foto: Suasana praktikum mahasiswa</figcaption>', $formatted);
        $this->assertStringContainsString('<p>Paragraf pembuka berita.</p>', $formatted);
        $this->assertStringContainsString('<p>Paragraf penutup berita.</p>', $formatted);

        $response = $this->get('/beranda/berita/' . $berita->slug);
        $response->assertStatus(200);
        $response->assertSee('<figure class="news-inline-image">', false);
        $response->assertSee('Foto: Suasana praktikum mahasiswa');
    }
}
