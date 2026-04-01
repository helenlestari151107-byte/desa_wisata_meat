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

Route::get('/', [FrontController::class, 'home'])->name('home');

Route::get('/berita/{slug}', [FrontController::class, 'beritaDetail'])
    ->name('berita.detail');

Auth::routes(['register' => false]);

Route::prefix('admin')
    ->middleware(['auth'])
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', function () {

            $stats = [
                'berita' => \App\Models\Berita::count(),
                'potensi' => \App\Models\Potensi::count(),
                'galeri' => \App\Models\Galeri::count(),
                'event' => \App\Models\Event::count(),
            ];

            return view('admin.dashboard', compact('stats'));

        })->name('dashboard');

        Route::resource('berita', BeritaController::class);
        Route::resource('pengumuman', PengumumanController::class);
        Route::resource('potensi', PotensiController::class);
        Route::resource('event', EventController::class);
        Route::resource('galeri', GaleriController::class);
        Route::resource('layanan', LayananController::class);
        Route::resource('kontak', KontakController::class);
        Route::resource('nomor-penting', NomorPentingController::class);

        Route::get('/profil', [ProfilDesaController::class, 'index'])->name('profil');
        Route::put('/profil/{profilDesa}', [ProfilDesaController::class, 'update']);
    });

Route::redirect('/admin', '/admin/dashboard');