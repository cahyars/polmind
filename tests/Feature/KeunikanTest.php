<?php

namespace Tests\Feature;

use App\Models\KeunikanItem;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class KeunikanTest extends TestCase
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

    public function test_public_keunikan_page_displays_blocks_and_careers(): void
    {
        $response = $this->get('/keunikan');

        $response->assertStatus(200);
        $response->assertSee('KEUNIKAN DAN KEUNGGULAN');
        $response->assertSee('Mengapa Memilih Politeknik Mitra Industri?');
        $response->assertSee('Project-Based Learning &amp; TEFA', false);
        $response->assertSee('Kemitraan Industri &amp; Kegiatan', false);
        $response->assertSee('Kurikulum &amp; Praktik Industri', false);
        $response->assertSee('Bagian Karir &amp; Internasionalisasi', false);
        $response->assertSee('Magang di Industri');
        $response->assertSee('Tugas Akhir/Skripsi dari project');
        $response->assertSee('Kesempatan Kerja');
        $response->assertSee('Presentasi Bahasa Asing');
    }

    public function test_admin_can_access_keunikan_management_page(): void
    {
        $response = $this->actingAs($this->admin)->get('/admin/keunikan');

        $response->assertStatus(200);
        $response->assertSee('Kelola Keunikan');
        $response->assertSee('Blok Keunggulan Berurutan');
        $response->assertSee('Kartu Karir & Internasionalisasi');
    }

    public function test_admin_can_create_new_block_item(): void
    {
        Storage::fake('public');

        $file = UploadedFile::fake()->image('test_block.jpg');

        $response = $this->actingAs($this->admin)->post('/admin/keunikan', [
            'type' => 'block',
            'badge_number' => '04',
            'title' => 'Sertifikasi Kompetensi BNSP',
            'description' => "Uji sertifikasi resmi nasional.\nDiakui dunia industri.",
            'order' => 4,
            'image' => $file,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('keunikan_items', [
            'type' => 'block',
            'badge_number' => '04',
            'title' => 'Sertifikasi Kompetensi BNSP',
            'order' => 4,
        ]);
    }

    public function test_admin_can_create_new_career_item(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/keunikan', [
            'type' => 'career',
            'title' => 'Program Inkubator Startup',
            'subtitle' => 'Didukung inkubasi bisnis kampus.',
            'icon' => 'fas fa-rocket',
            'order' => 5,
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('success');

        $this->assertDatabaseHas('keunikan_items', [
            'type' => 'career',
            'title' => 'Program Inkubator Startup',
            'icon' => 'fas fa-rocket',
            'order' => 5,
        ]);
    }

    public function test_admin_can_toggle_item_status(): void
    {
        $item = KeunikanItem::first();
        $initialStatus = $item->is_active;

        $response = $this->actingAs($this->admin)->post("/admin/keunikan/{$item->id}/toggle");

        $response->assertRedirect();
        $this->assertEquals(!$initialStatus, $item->fresh()->is_active);
    }

    public function test_admin_can_update_item(): void
    {
        $item = KeunikanItem::first();

        $response = $this->actingAs($this->admin)->put("/admin/keunikan/{$item->id}", [
            'title' => 'Judul Terupdate',
            'badge_number' => $item->badge_number,
            'subtitle' => 'Subjudul baru',
            'description' => "Poin satu terupdate\nPoin dua terupdate",
            'icon' => $item->icon,
            'order' => 1,
            'is_active' => '1',
        ]);

        $response->assertRedirect();
        $this->assertDatabaseHas('keunikan_items', [
            'id' => $item->id,
            'title' => 'Judul Terupdate',
        ]);
    }

    public function test_admin_can_delete_item(): void
    {
        $item = KeunikanItem::create([
            'type' => 'block',
            'badge_number' => '99',
            'title' => 'Item to Delete',
            'order' => 99,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin)->delete("/admin/keunikan/{$item->id}");

        $response->assertRedirect();
        $this->assertDatabaseMissing('keunikan_items', [
            'id' => $item->id,
        ]);
    }

    public function test_admin_can_update_keunikan_settings(): void
    {
        $response = $this->actingAs($this->admin)->post('/admin/keunikan-settings', [
            'keunikan_page_title' => 'KEUNGGULAN DAN KEUNIKAN KAMPUS',
            'keunikan_page_subtitle' => 'Kenapa harus kuliah di Polmind?',
            'keunikan_career_title' => 'Jalur Karir Masa Depan',
        ]);

        $response->assertRedirect();
        $this->assertEquals('KEUNGGULAN DAN KEUNIKAN KAMPUS', SiteSetting::get('keunikan_page_title'));
        $this->assertEquals('Kenapa harus kuliah di Polmind?', SiteSetting::get('keunikan_page_subtitle'));
        $this->assertEquals('Jalur Karir Masa Depan', SiteSetting::get('keunikan_career_title'));
    }
}
