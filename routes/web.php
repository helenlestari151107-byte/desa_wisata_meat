<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\PengumumanController;
use App\Http\Controllers\Admin\PotensiController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\KontakController;
use App\Http\Controllers\Admin\NomorPentingController;
use App\Http\Controllers\Admin\ProfilDesaController;
use App\Http\Controllers\Admin\InfografisController;
use App\Http\Controllers\Admin\DashboardController;

// ====== FRONT ROUTES ======
Route::get('/', [FrontController::class, 'home'])->name('home');
Route::get('/berita', [FrontController::class, 'beritaList'])->name('berita.index');
Route::get('/berita/{slug}', [FrontController::class, 'beritaDetail'])->name('berita.detail');
Route::get('/event', [FrontController::class, 'eventList'])->name('event.index');
Route::get('/pengumuman', [FrontController::class, 'pengumumanList'])->name('pengumuman.index');

// ====== AUTH ROUTES ======
Auth::routes(['register' => true]);

// ====== ADMIN ROUTES ======
Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {
        

        // Dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Profil Desa (single resource, no create/delete)
        Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil.index');
        Route::put('/profil/{profilDesa}', [ProfilDesaController::class, 'update'])->name('profil.update');

        // Full CRUD resources
        Route::resource('berita',         BeritaController::class)->parameters(['berita' => 'berita']);
        Route::resource('pengumuman',     PengumumanController::class);
        Route::resource('potensi',        PotensiController::class);
        Route::resource('event',          EventController::class);
        Route::resource('galeri',         GaleriController::class);
        Route::resource('layanan',        LayananController::class);
        Route::resource('kontak',         KontakController::class);
        Route::resource('nomor-penting',  NomorPentingController::class);
        Route::resource('infografis',     InfografisController::class);
    });

// Redirect /admin → /admin/dashboard
Route::redirect('/admin', '/admin/dashboard');
Route::get('/home', function () {
    return redirect('/admin/dashboard');
});
