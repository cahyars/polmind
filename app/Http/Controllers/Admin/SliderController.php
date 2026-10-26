<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function edit(Slider $slider)
    {
        $sliders = Slider::orderBy('order')->get();
        return view('admin.sliders.index', [
            'sliders' => $sliders,
            'editSlider' => $slider,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:1000',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
        ], [
            'image.required' => 'Gambar slide wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, webp, atau avif.',
            'image.max' => 'Ukuran gambar maksimal 4MB.',
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');
        $order = $request->input('order', (Slider::max('order') ?? 0) + 1);

        Slider::create([
            'title' => $request->title,
            'caption' => $request->caption,
            'link' => $request->link,
            'image' => $imagePath,
            'order' => $order ?: 1,
            'is_active' => true,
        ]);

        return back()->with('success', 'Slide baru berhasil ditambahkan.');
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'caption' => 'nullable|string|max:1000',
            'link' => 'nullable|string|max:255',
            'order' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,avif|max:4096',
        ], [
            'order.required' => 'Urutan tampil wajib diisi.',
            'order.integer' => 'Urutan tampil harus berupa angka.',
            'order.min' => 'Urutan tampil minimal bernilai 1.',
            'image.image' => 'File harus berupa gambar.',
            'image.mimes' => 'Format gambar harus jpeg, png, jpg, webp, atau avif.',
            'image.max' => 'Ukuran gambar maksimal 4MB.',
        ]);

        $imagePath = $slider->image;
        if ($request->hasFile('image')) {
            if ($slider->image && !Str::startsWith($slider->image, 'assets/')) {
                Storage::disk('public')->delete($slider->image);
            }
            $imagePath = $request->file('image')->store('sliders', 'public');
        }

        $slider->update([
            'title' => $request->title,
            'caption' => $request->has('from_quick_order') ? $slider->caption : $request->caption,
            'link' => $request->link,
            'order' => $request->order,
            'image' => $imagePath,
            'is_active' => $request->has('from_quick_order')
                ? $request->boolean('is_active')
                : $request->has('is_active'),
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slide berhasil diperbarui.');
    }

    public function destroy(Slider $slider)
    {
        if ($slider->image && !Str::startsWith($slider->image, 'assets/')) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return back()->with('success', 'Slide berhasil dihapus.');
    }

    public function toggle(Slider $slider)
    {
        $slider->update(['is_active' => !$slider->is_active]);

        $status = $slider->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return back()->with('success', "Slide berhasil {$status}.");
    }
}
