<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KeunikanItem;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KeunikanController extends Controller
{
    /**
     * Menampilkan daftar keunikan & keunggulan (blok & karir) serta pengaturan teks
     */
    public function index()
    {
        $blocks = KeunikanItem::blocks()->orderBy('order')->get();
        $careers = KeunikanItem::careers()->orderBy('order')->get();

        $settings = [
            'keunikan_page_title' => SiteSetting::get('keunikan_page_title', 'KEUNIKAN DAN KEUNGGULAN'),
            'keunikan_page_subtitle' => SiteSetting::get('keunikan_page_subtitle', 'Mengapa Memilih Politeknik Mitra Industri?'),
            'keunikan_career_title' => SiteSetting::get('keunikan_career_title', 'Bagian Karir & Internasionalisasi'),
        ];

        return view('admin.keunikan.index', compact('blocks', 'careers', 'settings'));
    }

    /**
     * Menyimpan item keunikan baru (blok atau karir)
     */
    public function store(Request $request)
    {
        $type = $request->input('type', 'block');

        $request->validate([
            'type' => 'required|in:block,career',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'badge_number' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:5120',
            'order' => 'nullable|integer',
        ], [
            'title.required' => 'Judul item wajib diisi.',
            'image.image' => 'File harus berupa gambar.',
            'image.max' => 'Ukuran gambar maksimal 5MB.',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('keunikan', 'public');
        }

        // Tentukan order otomatis jika tidak diisi
        $defaultOrder = (KeunikanItem::where('type', $type)->max('order') ?? 0) + 1;
        $order = $request->filled('order') ? (int) $request->order : $defaultOrder;

        // Tentukan nomor badge default jika blok
        $badgeNumber = $request->badge_number;
        if ($type === 'block' && empty($badgeNumber)) {
            $badgeNumber = sprintf('%02d', $order);
        }

        KeunikanItem::create([
            'type' => $type,
            'badge_number' => $badgeNumber,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'image' => $imagePath,
            'icon' => $request->icon ?: ($type === 'career' ? 'fas fa-briefcase' : null),
            'order' => $order,
            'is_active' => true,
        ]);

        $label = $type === 'block' ? 'Blok keunggulan' : 'Kartu karir & internasionalisasi';
        return back()->with('success', "{$label} berhasil ditambahkan.");
    }

    /**
     * Memperbarui data item keunikan
     */
    public function update(Request $request, KeunikanItem $keunikan)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'badge_number' => 'nullable|string|max:20',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:5120',
            'order' => 'required|integer',
        ], [
            'title.required' => 'Judul item wajib diisi.',
            'order.required' => 'Urutan tampil wajib diisi.',
        ]);

        $imagePath = $keunikan->image;
        if ($request->hasFile('image')) {
            // Hapus file lama jika tersimpan di disk public dan bukan file bawaan assets/
            if ($keunikan->image && !Str::startsWith($keunikan->image, ['assets/', '/assets/'])) {
                Storage::disk('public')->delete($keunikan->image);
            }
            $imagePath = $request->file('image')->store('keunikan', 'public');
        }

        $keunikan->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'badge_number' => $request->badge_number,
            'description' => $request->description,
            'icon' => $request->icon,
            'image' => $imagePath,
            'order' => $request->order,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', "Data '{$keunikan->title}' berhasil diperbarui.");
    }

    /**
     * Menghapus item keunikan
     */
    public function destroy(KeunikanItem $keunikan)
    {
        $title = $keunikan->title;

        if ($keunikan->image && !Str::startsWith($keunikan->image, ['assets/', '/assets/'])) {
            Storage::disk('public')->delete($keunikan->image);
        }

        $keunikan->delete();

        return back()->with('success', "Item '{$title}' berhasil dihapus.");
    }

    /**
     * Mengaktifkan/menonaktifkan status tampilan
     */
    public function toggle(KeunikanItem $keunikan)
    {
        $keunikan->update(['is_active' => !$keunikan->is_active]);

        $status = $keunikan->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Item '{$keunikan->title}' berhasil {$status}.");
    }

    /**
     * Memperbarui pengaturan judul dan teks halaman keunikan
     */
    public function updateSettings(Request $request)
    {
        $request->validate([
            'keunikan_page_title' => 'required|string|max:255',
            'keunikan_page_subtitle' => 'nullable|string|max:255',
            'keunikan_career_title' => 'required|string|max:255',
        ], [
            'keunikan_page_title.required' => 'Judul utama halaman wajib diisi.',
            'keunikan_career_title.required' => 'Judul bagian karir wajib diisi.',
        ]);

        SiteSetting::set('keunikan_page_title', $request->keunikan_page_title, 'keunikan');
        SiteSetting::set('keunikan_page_subtitle', $request->keunikan_page_subtitle, 'keunikan');
        SiteSetting::set('keunikan_career_title', $request->keunikan_career_title, 'keunikan');

        return back()->with('success', 'Pengaturan teks halaman keunikan berhasil disimpan.');
    }
}
