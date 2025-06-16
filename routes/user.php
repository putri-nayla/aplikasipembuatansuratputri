<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route lain user (misal surat, laporan, penerima, dll)
Route::resource('kategori', KategoriController::class);
Route::resource('surat', SuratController::class);
Route::resource('laporan', LaporanController::class);
Route::resource('penerima', ControllerPenerima::class);

Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');

// ...dst sesuai kebutuhan
