<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Event;
use App\Models\Pengumuman;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'berita' => Berita::count(),
            'events' => Event::count(),
            'pengumuman' => Pengumuman::count(),
            'galeri' => Galeri::count(),
        ];

        return view('admin.dashboard', compact('counts'));
    }
}