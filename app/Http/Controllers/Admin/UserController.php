<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of all users
     */
    public function index()
    {
        $users = User::orderByDesc('id')->get();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Store a newly created user in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|string|in:admin,humas,operator',
            'password' => 'required|string|min:6',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar oleh pengguna lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => strtolower(trim($request->email)),
            'role' => $request->role,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
        ]);

        return back()->with('success', 'Akun baru "' . $user->name . '" (' . $user->role_label . ') berhasil ditambahkan.');
    }

    /**
     * Update the specified user in storage
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|string|in:admin,humas,operator',
            'password' => 'nullable|string|min:6',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar oleh pengguna lain.',
            'password.min' => 'Password baru minimal harus 6 karakter.',
        ]);

        // Prevent self demoting from admin
        if ($user->id === Auth::id() && $request->role !== 'admin') {
            return back()->with('error', 'Anda tidak dapat menurunkan role akun Anda sendiri dari Administrator.');
        }

        $data = [
            'name' => $request->name,
            'email' => strtolower(trim($request->email)),
            'role' => $request->role,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Data akun "' . $user->name . '" berhasil diperbarui.');
    }

    /**
     * Remove the specified user from storage
     */
    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri yang sedang aktif digunakan.');
        }

        $name = $user->name;
        $user->delete();

        return back()->with('success', 'Akun "' . $name . '" berhasil dihapus.');
    }
}
