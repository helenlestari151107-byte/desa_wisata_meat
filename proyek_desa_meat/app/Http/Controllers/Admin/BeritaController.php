<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|max:255',
            'kategori' => 'required',
            'isi'      => 'required',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $data = $request->only(['judul', 'kategori', 'isi', 'penulis']);
        $data['slug'] = Str::slug($request->judul) . '-' . time();
        $data['published_at'] = now();
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('beritas', 'public');
        }
        Berita::create($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul'    => 'required|max:255',
            'kategori' => 'required',
            'isi'      => 'required',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $data = $request->only(['judul', 'kategori', 'isi', 'penulis']);
        if ($request->hasFile('gambar')) {
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('beritas', 'public');
        }
        $berita->update($data);
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita dihapus!');
    }
}
