<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.galeri.index', compact('galeris'));
    }
    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'  => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,webp|max:3048',
            'kategori' => 'required',
        ]);
        $data = $request->only(['judul', 'kategori', 'keterangan']);
        $data['gambar'] = $request->file('gambar')->store('galeri', 'public');
        Galeri::create($data);
        return redirect()->route('admin.galeri.index')->with('success', 'Foto berhasil ditambahkan!');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->gambar) {
            Storage::disk('public')->delete($galeri->gambar);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')
            ->with('success', 'Foto berhasil dihapus');
    }
}
