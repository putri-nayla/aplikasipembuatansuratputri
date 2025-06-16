<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class ControllerAdmin extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Proses login
    public function login(Request $request)
    {    $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',

        ]);

        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->with('error', 'Username atau password salah.');
        }

        // Periksa apakah admin telah disetujui
        if ($admin->status !== 'setujui') {
            return back()->with('error', 'Akun belum mendapat persetujuan dari admin.');
        }

        Auth::guard('admin')->login($admin);
       // Redirect berdasarkan role
    if ($admin->role === 'admin') {
        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil sebagai Admin!');
    } else {
        return redirect()->route('petugas.dashboard')->with('success', 'Login berhasil sebagai Petugas!');
    }
}



    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('admin.register');
    }

    // Proses registrasi admin baru
    public function register(Request $request)
    {
        $request->validate([
            'namaadmin' => 'required|string|max:255',
            'username' => 'required|string|unique:admin',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,petugas',
            'foto' => 'nullable|image|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('admin_fotos', 'public');
        }

        Admin::create([
            'namaadmin' => $request->namaadmin,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'pending',
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.login')->with('success', 'Registrasi berhasil, silakan login.');
    }

    // Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    // Menampilkan daftar admin
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }

    // Menampilkan halaman tambah admin
    public function create()
    {
        return view('admin.create');
    }

    // Proses penyimpanan admin baru
    public function store(Request $request)
    {
        $request->validate([
            'namaadmin' => 'required|string|max:255',
            'username' => 'required|string|unique:admin',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,petugas',
            'foto' => 'nullable|image|max:2048',
        ]);

        $fotoPath = $request->file('foto') ? $request->file('foto')->store('admin_fotos', 'public') : null;

        Admin::create([
            'namaadmin' => $request->namaadmin,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'status' => 'pending',
            'foto' => $fotoPath,
        ]);

        return redirect()->route('admin.index')->with('success', 'Admin berhasil ditambahkan.');
    }

    // Menampilkan detail admin
    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.show', compact('admin'));
    }

    // Menampilkan halaman edit admin
    public function edit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.edit', compact('admin'));
    }

    // Proses update admin
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaadmin' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admin,username,' . $id,
            'password' => 'nullable|min:6|confirmed',
            'foto' => 'nullable|image|max:2048',
            'status' => 'required|in:pending,setujui,tolak',
            'role' => 'required|in:admin,petugas',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->namaadmin = $request->namaadmin;
        $admin->username = $request->username;

        if ($request->filled('password')) {
            $admin->password = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($admin->foto) {
                Storage::disk('public')->delete($admin->foto);
            }

            // Simpan foto baru
            $admin->foto = $request->file('foto')->store('admin_fotos', 'public');
        }

        $admin->status = $request->status;
        $admin->role = $request->role;
        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin berhasil diperbarui.');
    }

    // Menghapus admin
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);

        // Hapus foto jika ada
        if ($admin->foto) {
            Storage::disk('public')->delete($admin->foto);
        }

        $admin->delete();
        return redirect()->route('admin.index')->with('success', 'Admin berhasil dihapus.');
    }

    // Menyetujui admin
    public function approve($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update(['status' => 'setujui']);
        return redirect()->route('admin.index')->with('success', 'Admin berhasil disetujui.');
    }

    // Menolak admin
    public function reject($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->update(['status' => 'tolak']);
        return redirect()->route('admin.index')->with('success', 'Admin ditolak.');
    }

    // Menampilkan halaman dashboard admin
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        return view('admin.profile'); // Pastikan ada file profile.blade.php
    
    }
public function dashboardAdmin()
    {
    return view('admin.dashboardadmin');
}

public function dashboardPetugas()
{
    return view('admin.dashboardpetugas');
}
}