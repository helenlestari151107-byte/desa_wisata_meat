<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Pengumuman;
use App\Models\Galeri;
use App\Models\Potensi;
use App\Models\Layanan;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'berita'     => Berita::count(),
            'potensi'    => Potensi::count(),
            'galeri'     => Galeri::count(),
            'event'      => Event::count(),
            'pengumuman' => Pengumuman::count(),
            'layanan'    => Layanan::count(),
        ];

        $beritaTerbaru = Berita::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'beritaTerbaru'));
    }
}
