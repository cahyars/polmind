<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->orderBy('name')->get();
        return view('admin.partners.index', compact('partners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website_url' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'logo' => 'required|image|mimes:jpeg,png,jpg,webp,avif,svg|max:4096',
        ], [
            'name.required' => 'Nama mitra industri wajib diisi.',
            'logo.required' => 'File logo mitra wajib diunggah.',
            'logo.image' => 'File harus berupa gambar.',
        ]);

        $logoPath = $request->file('logo')->store('partners', 'public');
        $order = $request->input('order', (Partner::max('order') ?? 0) + 1);

        Partner::create([
            'name' => $request->name,
            'website_url' => $request->website_url,
            'logo' => $logoPath,
            'order' => $order ?: 1,
            'is_active' => true,
        ]);

        return back()->with('success', 'Logo mitra baru berhasil ditambahkan.');
    }

    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'website_url' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif,svg|max:4096',
        ], [
            'name.required' => 'Nama mitra industri wajib diisi.',
        ]);

        $logoPath = $partner->logo;
        if ($request->hasFile('logo')) {
            if ($partner->logo && !Str::startsWith($partner->logo, 'assets/')) {
                Storage::disk('public')->delete($partner->logo);
            }
            $logoPath = $request->file('logo')->store('partners', 'public');
        }

        $partner->update([
            'name' => $request->name,
            'website_url' => $request->website_url,
            'order' => $request->order,
            'logo' => $logoPath,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', 'Data mitra industri berhasil diperbarui.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo && !Str::startsWith($partner->logo, 'assets/')) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return back()->with('success', 'Logo mitra berhasil dihapus.');
    }

    public function toggle(Partner $partner)
    {
        $partner->update(['is_active' => !$partner->is_active]);

        $status = $partner->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Mitra {$partner->name} berhasil {$status}.");
    }
}
