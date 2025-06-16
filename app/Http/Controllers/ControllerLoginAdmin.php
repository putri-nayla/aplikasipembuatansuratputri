<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ControllerLoginAdmin extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {	
        return view('admin.login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);
        $admin = Admin::where('username', $request->username)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return back()->withErrors(['username' => 'Username atau password salah.']);
        }

        if ($admin->status !== 'setujui') {
            return back()->withErrors(['username' => 'Akun belum disetujui oleh admin.']);
        }

        Auth::guard('admin')->login($admin);
        return redirect()->route('admin.dashboard')->with('success', 'Login berhasil!');
    }

    // Menampilkan halaman register
    public function showRegisterForm()
    {
        return view('admin.register');
    }
  // Proses registrasi admin
  public function register(Request $request)
  {
      $request->validate([
          'namaadmin' => 'required|string|max:255',
          'username' => 'required|string|unique:admin',
          'password' => 'required|min:6|confirmed',
          'role' => 'required|in:admin,petugas',
          'foto' => 'nullable|image|max:2048'
      ]);

      $fotoPath = $request->file('foto') ? $request->file('foto')->store('admin_photos', 'public') : null;

      Admin::create([
          'namaadmin' => $request->namaadmin,
          'username' => $request->username,
          'password' => Hash::make($request->password),
          'role' => $request->role,
          'status' => 'pending', // Status default "pending" sampai disetujui
          'foto' => $fotoPath
      ]);

      return redirect()->route('admin.login')->with('success', 'Registrasi berhasil! Menunggu persetujuan admin.');
  }

// Logout admin
public function logout()
{
    Auth::guard('admin')->logout();
    return redirect()->route('admin.login')->with('success', 'Anda telah logout.');
}

}