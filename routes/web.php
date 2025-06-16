<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerAdmin;
use App\Http\Controllers\ControllerResetPasswordAdmin;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ControllerPenerima;
use App\Http\Controllers\Auth\RegisterController; // Pindahkan ke atas


// =======================
// Halaman Awal
// =======================
Route::get('/', function () {
    return view('welcome');
});

// =======================
// Register (User Biasa)
// =======================
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// =======================
// Resource Routes
// =======================
Route::resource('kategori', KategoriController::class);
Route::resource('surat', SuratController::class);
Route::resource('laporan', LaporanController::class);
Route::resource('penerima', ControllerPenerima::class);

// =======================
// Laporan Custom
// =======================
Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

// =======================
// Surat Routes
// =======================
Route::get('/surat', [SuratController::class, 'index'])->name('surat.index');
Route::get('/surat/create', [SuratController::class, 'create'])->name('surat.create');
Route::post('/surat', [SuratController::class, 'store'])->name('surat.store');

// =======================
// Penerima Routes
// =======================
Route::get('/penerima', [ControllerPenerima::class, 'index'])->name('penerima.index');
Route::get('/penerima/create', [ControllerPenerima::class, 'create'])->name('penerima.create');
Route::post('/penerima', [ControllerPenerima::class, 'store'])->name('penerima.store');

// =======================
// Admin (Guest)
// =======================
Route::middleware(['guest:admin'])->group(function () {
    Route::get('/login', [ControllerAdmin::class, 'showLoginForm'])->name('login');
    Route::get('/admin/login', [ControllerAdmin::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [ControllerAdmin::class, 'login'])->name('admin.login.post');

    Route::get('/admin/register', [ControllerAdmin::class, 'showRegisterForm'])->name('admin.register');
    Route::post('/admin/register', [ControllerAdmin::class, 'register'])->name('admin.register.post');

    Route::get('/admin/forgot-password', [ControllerResetPasswordAdmin::class, 'showForgotPasswordForm'])->name('admin.password.request');
    Route::post('/admin/forgot-password', [ControllerResetPasswordAdmin::class, 'sendResetLink'])->name('admin.password.email');
    Route::get('/admin/reset-password/{token}', [ControllerResetPasswordAdmin::class, 'showResetForm'])->name('admin.password.reset');
    Route::post('/admin/reset-password', [ControllerResetPasswordAdmin::class, 'resetPassword'])->name('admin.password.update');
});

// =======================
// Admin (Auth)
// =======================
Route::middleware(['auth:admin'])->group(function () {
    Route::post('/admin/logout', [ControllerAdmin::class, 'logout'])->name('admin.logout');

    Route::get('/admin/dashboard', [ControllerAdmin::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [ControllerAdmin::class, 'profile'])->name('admin.profile');

    // Admin CRUD
    Route::get('/admin', [ControllerAdmin::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [ControllerAdmin::class, 'create'])->name('admin.create');
    Route::post('/admin', [ControllerAdmin::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}', [ControllerAdmin::class, 'show'])->name('admin.show');
    Route::get('/admin/{id}/edit', [ControllerAdmin::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [ControllerAdmin::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [ControllerAdmin::class, 'destroy'])->name('admin.destroy');

    Route::post('/admin/{id}/approve', [ControllerAdmin::class, 'approve'])->name('admin.approve');
    Route::post('/admin/{id}/reject', [ControllerAdmin::class, 'reject'])->name('admin.reject');

    // Kategori Custom
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');
});
