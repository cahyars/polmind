<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lecturer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LecturerController extends Controller
{
    public function index()
    {
        $lecturers = Lecturer::orderBy('category')->orderBy('order')->get();
        return view('admin.dosen.index', compact('lecturers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'category' => 'required|string|in:internal,industri,instruktur',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('lecturers', 'public');
        }

        Lecturer::create([
            'name' => $request->name,
            'position' => $request->position,
            'category' => $request->category,
            'photo' => $photoPath,
            'order' => $request->order ?: (Lecturer::max('order') + 1),
        ]);

        return back()->with('success', 'Dosen berhasil ditambahkan.');
    }

    public function update(Request $request, $dosen)
    {
        $lecturer = $dosen instanceof Lecturer ? $dosen : Lecturer::findOrFail($dosen);

        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'category' => 'required|string|in:internal,industri,instruktur',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'required|integer',
        ]);

        $photoPath = $lecturer->photo;
        if ($request->hasFile('photo')) {
            if ($lecturer->photo && !Str::startsWith($lecturer->photo, 'assets/')) {
                Storage::disk('public')->delete($lecturer->photo);
            }
            $photoPath = $request->file('photo')->store('lecturers', 'public');
        }

        $lecturer->update([
            'name' => $request->name,
            'position' => $request->position,
            'category' => $request->category,
            'photo' => $photoPath,
            'order' => $request->order,
        ]);

        return back()->with('success', 'Data dosen berhasil diperbarui.');
    }

    public function destroy($dosen)
    {
        $lecturer = $dosen instanceof Lecturer ? $dosen : Lecturer::findOrFail($dosen);

        if ($lecturer->photo && !Str::startsWith($lecturer->photo, 'assets/')) {
            Storage::disk('public')->delete($lecturer->photo);
        }

        $lecturer->delete();

        return back()->with('success', 'Data dosen berhasil dihapus.');
    }
}
