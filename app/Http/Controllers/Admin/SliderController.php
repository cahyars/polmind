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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'link' => 'nullable|string|max:255',
            'order' => 'nullable|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
        ], [
            'image.required' => 'Gambar slide wajib diunggah.',
            'image.image' => 'File harus berupa gambar.',
        ]);

        $imagePath = $request->file('image')->store('sliders', 'public');
        $order = $request->input('order', Slider::max('order') + 1);

        Slider::create([
            'title' => $request->title,
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
            'link' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:4096',
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
            'link' => $request->link,
            'order' => $request->order,
            'image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return back()->with('success', 'Slide berhasil diperbarui.');
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
