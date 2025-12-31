<?php

use Illuminate\Support\Facades\Route;

// --- IMPORT CONTROLLER ---
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;         
use App\Http\Controllers\AdminListingController;  
use App\Http\Controllers\AdminSettingController;  

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// 1. HALAMAN PUBLIK
// ==========================================

// Halaman Utama (Showroom)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Halaman Detail Mobil (INI YANG TADI HILANG)
Route::get('/mobil/{id}', [HomeController::class, 'show'])->name('mobil.detail');

// Halaman Cek Harga AI
Route::get('/cek-harga', [PrediksiController::class, 'index'])->name('prediksi.index');
Route::post('/predict', [PrediksiController::class, 'process'])->name('predict.process');

// ... Route Home ...
Route::get('/', [HomeController::class, 'index'])->name('home');

// TAMBAHKAN INI:
Route::get('/tentang-kami', [HomeController::class, 'about'])->name('about');

// ... Route Detail Mobil ...

// ==========================================
// 2. OTENTIKASI
// ==========================================
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ==========================================
// 3. HALAMAN ADMIN
// ==========================================
Route::middleware(['auth'])->group(function () {

    // A. Data AI
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{id}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // B. Stok Mobil
    Route::get('/admin/listings', [AdminListingController::class, 'index'])->name('admin.listings.index');
    Route::get('/admin/listings/create', [AdminListingController::class, 'create'])->name('admin.listings.create');
    Route::post('/admin/listings', [AdminListingController::class, 'store'])->name('admin.listings.store');
    Route::get('/admin/listings/{id}/edit', [AdminListingController::class, 'edit'])->name('admin.listings.edit');
    Route::put('/admin/listings/{id}', [AdminListingController::class, 'update'])->name('admin.listings.update');
    Route::delete('/admin/listings/{id}', [AdminListingController::class, 'destroy'])->name('admin.listings.destroy');

    // C. Pengaturan Web
    Route::get('/admin/settings', [AdminSettingController::class, 'index'])->name('admin.settings.index');
    Route::post('/admin/settings', [AdminSettingController::class, 'update'])->name('admin.settings.update');

});