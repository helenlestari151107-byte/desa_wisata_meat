<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PotensiController extends Controller
{
    public function index()
    {
        $potensis = Potensi::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.potensi.index', compact('potensis'));
    }

    public function create()
    {
        return view('admin.potensi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|max:255',
            'kategori'  => 'required',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $data = $request->only(['nama', 'kategori', 'deskripsi', 'rating', 'lokasi', 'tags']);
        $data['is_aktif'] = $request->has('is_aktif') ? 1 : 0;
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('potensi', 'public');
        }
        Potensi::create($data);
        return redirect()->route('admin.potensi.index')->with('success', 'Potensi berhasil ditambahkan!');
    }

    public function edit(Potensi $potensi)
    {
        return view('admin.potensi.edit', compact('potensi'));
    }

    public function update(Request $request, Potensi $potensi)
    {
        $request->validate([
            'nama'      => 'required|max:255',
            'kategori'  => 'required',
            'deskripsi' => 'required',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $data = $request->only(['nama', 'kategori', 'deskripsi', 'rating', 'lokasi', 'tags']);
        $data['is_aktif'] = $request->has('is_aktif') ? 1 : 0;
        if ($request->hasFile('gambar')) {
            if ($potensi->gambar) Storage::disk('public')->delete($potensi->gambar);
            $data['gambar'] = $request->file('gambar')->store('potensi', 'public');
        }
        $potensi->update($data);
        return redirect()->route('admin.potensi.index')->with('success', 'Potensi berhasil diperbarui!');
    }

    public function destroy(Potensi $potensi)
    {
        if ($potensi->gambar) Storage::disk('public')->delete($potensi->gambar);
        $potensi->delete();
        return redirect()->route('admin.potensi.index')->with('success', 'Potensi dihapus!');
    }
}