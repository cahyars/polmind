<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    public function index()
    {
        $staff = Staff::orderBy('order')->get();
        return view('admin.tendik.index', compact('staff'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'nullable|integer',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('staff', 'public');
        }

        Staff::create([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $photoPath,
            'order' => $request->order ?: (Staff::max('order') + 1),
        ]);

        return back()->with('success', 'Tenaga kependidikan berhasil ditambahkan.');
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'order' => 'required|integer',
        ]);

        $photoPath = $staff->photo;
        if ($request->hasFile('photo')) {
            if ($staff->photo && !Str::startsWith($staff->photo, 'assets/')) {
                Storage::disk('public')->delete($staff->photo);
            }
            $photoPath = $request->file('photo')->store('staff', 'public');
        }

        $staff->update([
            'name' => $request->name,
            'position' => $request->position,
            'photo' => $photoPath,
            'order' => $request->order,
        ]);

        return back()->with('success', 'Data tendik berhasil diperbarui.');
    }

    public function destroy(Staff $staff)
    {
        if ($staff->photo && !Str::startsWith($staff->photo, 'assets/')) {
            Storage::disk('public')->delete($staff->photo);
        }

        $staff->delete();

        return back()->with('success', 'Data tendik berhasil dihapus.');
    }
}
