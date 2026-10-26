<?php

namespace Tests\Feature;

use App\Models\Slider;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminSliderTest extends TestCase
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

    public function test_admin_can_view_sliders_index(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/sliders');

        $response->assertStatus(200);
        $response->assertSee('Kelola Slider Banner Beranda');
        $response->assertSee('Tambah Slide Banner Baru');
        $response->assertSee('Teks Slider (Overlay Teks Dinamis)');
        $response->assertSee('Daftar Slide Beranda');
        $response->assertSee('editSliderModal', false);
    }

    public function test_admin_can_create_new_slider_with_dynamic_caption(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('wuhan_students.jpg', 1920, 1080);

        $response = $this->actingAs($this->admin)->post('/admin/sliders', [
            'title' => 'Mahasiswa di Wuhan',
            'caption' => 'Didirikan oleh *Expert* dan Profesional Industri',
            'link' => '/pmb',
            'order' => 99,
            'image' => $file,
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('sliders', [
            'title' => 'Mahasiswa di Wuhan',
            'caption' => 'Didirikan oleh *Expert* dan Profesional Industri',
            'link' => '/pmb',
            'order' => 99,
            'is_active' => true,
        ]);

        $slider = Slider::where('title', 'Mahasiswa di Wuhan')->first();
        $this->assertNotNull($slider);
        $this->assertTrue($slider->has_dynamic_caption);
        $this->assertEquals('Didirikan oleh <em>Expert</em> dan Profesional Industri', $slider->formatted_caption);
        Storage::disk('public')->assertExists($slider->image);

        // Verify public home page renders the dynamic text
        $home = $this->get('/');
        $home->assertStatus(200);
        $home->assertSee('slide-caption-wrapper');
        $home->assertSee('Didirikan oleh <em>Expert</em> dan Profesional Industri', false);
    }

    public function test_slider_without_caption_does_not_render_overlay_text(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('raw_with_text.jpg', 1920, 1080);

        // Slide without caption (caption is null/empty)
        $response = $this->actingAs($this->admin)->post('/admin/sliders', [
            'title' => 'Poster Matang',
            'caption' => '',
            'link' => null,
            'order' => 100,
            'image' => $file,
        ]);

        $response->assertRedirect();
        $slider = Slider::where('title', 'Poster Matang')->first();
        $this->assertNotNull($slider);
        $this->assertFalse($slider->has_dynamic_caption);
        $this->assertNull($slider->formatted_caption);
    }

    public function test_admin_can_access_edit_route_for_slider(): void
    {
        $slider = Slider::first() ?? Slider::create([
            'title' => 'Slide Awal',
            'caption' => 'Caption Uji Coba',
            'image' => 'sliders/sample.jpg',
            'link' => '/berita',
            'order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->get("/admin/sliders/{$slider->id}/edit");

        $response->assertStatus(200);
        $response->assertSee($slider->title);
        $response->assertSee('openEditSliderModal', false);
    }

    public function test_admin_can_update_slider_and_caption(): void
    {
        $slider = Slider::create([
            'title' => 'Slide Lama',
            'caption' => null,
            'image' => 'assets/images/slider/polmind_vasanta.png',
            'link' => '/old-link',
            'order' => 2,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->put("/admin/sliders/{$slider->id}", [
            'title' => 'Slide Sudah Diubah',
            'caption' => 'Sekarang punya teks dinamis dengan *penekanan*',
            'link' => '/new-link',
            'order' => 5,
            'is_active' => '1',
        ]);

        $response->assertRedirect(route('admin.sliders.index'));
        $slider->refresh();

        $this->assertEquals('Slide Sudah Diubah', $slider->title);
        $this->assertEquals('Sekarang punya teks dinamis dengan *penekanan*', $slider->caption);
        $this->assertEquals('Sekarang punya teks dinamis dengan <em>penekanan</em>', $slider->formatted_caption);
        $this->assertEquals('/new-link', $slider->link);
        $this->assertEquals(5, $slider->order);
        $this->assertTrue($slider->is_active);
    }

    public function test_admin_can_update_slider_with_new_image(): void
    {
        Storage::fake('public');

        $initialFile = UploadedFile::fake()->image('initial.jpg');
        $storedPath = $initialFile->store('sliders', 'public');

        $slider = Slider::create([
            'title' => 'Slide Gambar Awal',
            'caption' => null,
            'image' => $storedPath,
            'link' => '/link',
            'order' => 1,
            'is_active' => true,
        ]);

        Storage::disk('public')->assertExists($storedPath);

        $newFile = UploadedFile::fake()->image('replaced.jpg', 1920, 1080);

        $response = $this->actingAs($this->admin)->put("/admin/sliders/{$slider->id}", [
            'title' => 'Slide Gambar Baru',
            'caption' => 'Teks baru di atas gambar baru',
            'link' => '/updated-link',
            'order' => 1,
            'image' => $newFile,
        ]);

        $response->assertRedirect(route('admin.sliders.index'));
        $slider->refresh();

        $this->assertEquals('Slide Gambar Baru', $slider->title);
        $this->assertEquals('Teks baru di atas gambar baru', $slider->caption);
        $this->assertNotEquals($storedPath, $slider->image);
        Storage::disk('public')->assertMissing($storedPath);
        Storage::disk('public')->assertExists($slider->image);
    }

    public function test_admin_can_toggle_slider_status(): void
    {
        $slider = Slider::create([
            'title' => 'Slide Toggle Test',
            'caption' => null,
            'image' => 'assets/images/slider/polmind_vasanta.png',
            'link' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->post("/admin/sliders/{$slider->id}/toggle");
        $response->assertRedirect();
        $this->assertFalse($slider->fresh()->is_active);

        $response = $this->actingAs($this->admin)->post("/admin/sliders/{$slider->id}/toggle");
        $response->assertRedirect();
        $this->assertTrue($slider->fresh()->is_active);
    }

    public function test_admin_can_delete_slider(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('delete_me.jpg');
        $storedPath = $file->store('sliders', 'public');

        $slider = Slider::create([
            'title' => 'Slide To Delete',
            'caption' => null,
            'image' => $storedPath,
            'link' => null,
            'order' => 10,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->delete("/admin/sliders/{$slider->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('sliders', ['id' => $slider->id]);
        Storage::disk('public')->assertMissing($storedPath);
    }

    public function test_slider_aspect_ratio_rendering_distinction(): void
    {
        // Slide standar (1620x810 ~ 2:1)
        $standardSlide = Slider::create([
            'title' => 'Standard Slide Banner',
            'caption' => null,
            'image' => 'assets/images/slider6.jpg',
            'link' => null,
            'order' => 1,
            'is_active' => true,
        ]);

        $this->assertTrue($standardSlide->is_standard_aspect_ratio);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('slide-standard');
        $response->assertSee('slide-standard-img');
    }
}
