<?php
namespace App\Http\Controllers;

use App\Models\{Berita, Pengumuman, Potensi, Event, Galeri, Layanan, KontakDesa, NomorPenting, ProfilDesa};
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home()
    {
        $profil      = ProfilDesa::first();
        $beritas     = Berita::where('is_published', true)->orderBy('published_at', 'desc')->take(6)->get();
        $pengumumans = Pengumuman::where('is_aktif', true)->orderBy('tanggal', 'desc')->take(5)->get();
        $potensis    = Potensi::where('is_aktif', true)->take(6)->get();
        $events      = Event::where('is_aktif', true)->orderBy('tanggal_mulai', 'asc')->take(6)->get();
        $galeris     = Galeri::orderBy('created_at', 'desc')->take(12)->get();
        $layanans    = Layanan::where('is_aktif', true)->orderBy('urutan')->get();
        $kontaks     = KontakDesa::all();
        $nomors      = NomorPenting::all();

        return view('front.home', compact(
            'profil', 'beritas', 'pengumumans', 'potensis',
            'events', 'galeris', 'layanans', 'kontaks', 'nomors'
        ));
    }

    public function beritaDetail($slug)
    {
        $berita  = Berita::where('slug', $slug)->firstOrFail();
        $berita->increment('views');
        $terkait = Berita::where('id', '!=', $berita->id)
                         ->where('is_published', true)
                         ->take(3)->get();
        return view('front.berita-detail', compact('berita', 'terkait'));
    }

    public function beritaList()
    {
        $profil  = ProfilDesa::first();
        $beritas = Berita::where('is_published', true)->orderBy('published_at', 'desc')->paginate(9);
        return view('front.berita', compact('profil', 'beritas'));
    }

    public function eventList()
    {
        $profil = ProfilDesa::first();
        $events = Event::where('is_aktif', true)->orderBy('tanggal_mulai', 'asc')->paginate(9);
        return view('front.event', compact('profil', 'events'));
    }

    public function pengumumanList()
    {
        $profil      = ProfilDesa::first();
        $pengumumans = Pengumuman::where('is_aktif', true)->orderBy('tanggal', 'desc')->paginate(10);
        return view('front.pengumuman', compact('profil', 'pengumumans'));
    }
}
