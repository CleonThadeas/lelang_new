<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaPetugasController;
use App\Http\Controllers\KelolaBarangController;
use App\Http\Controllers\KelolaLelangController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\TawarController;
use App\Http\Controllers\LaporanController;

// Halaman utama -> redirect ke login
Route::get('/', function () {
    return view('auth.welcome'); // Halaman default
});

Route::get('/login', function () {
    return view('auth.login'); // Halaman login
});


// Auth
Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Kelola Petugas (Admin)
Route::get('/petugas', [KelolaPetugasController::class, 'index'])->name('petugas.index');
Route::post('/petugas', [KelolaPetugasController::class, 'store'])->name('petugas.store');
Route::get('/petugas/delete/{id}', [KelolaPetugasController::class, 'destroy'])->name('petugas.destroy');

// Kelola Barang (Admin/Petugas)
Route::get('/barang', [KelolaBarangController::class, 'index'])->name('barang.index');
Route::post('/barang', [KelolaBarangController::class, 'store'])->name('barang.store');
Route::get('/barang/delete/{id}', [KelolaBarangController::class, 'destroy'])->name('barang.destroy');

// Kelola Lelang (Admin/Petugas)
Route::get('/lelang', [KelolaLelangController::class, 'index'])->name('lelang.index');
Route::post('/lelang', [KelolaLelangController::class, 'store'])->name('lelang.store');
Route::get('/lelang/close/{id}', [KelolaLelangController::class, 'close'])->name('lelang.close');

// Masyarakat (List barang dibuka & tawar)
Route::get('/list-barang', [ListBarangController::class, 'index'])->name('list.barang');
Route::get('/tawar/{id_lelang}', [TawarController::class, 'form'])->name('tawar.form');
Route::post('/tawar/{id_lelang}', [TawarController::class, 'store'])->name('tawar.store');

// Laporan (Admin/Petugas)
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
