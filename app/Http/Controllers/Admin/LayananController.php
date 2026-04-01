<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::orderBy('urutan')->get();
        return view('admin.layanan.index', compact('layanans'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|max:255',
            'ikon'      => 'required|max:100',
            'deskripsi' => 'required',
        ]);
        $data = $request->only(['nama', 'ikon', 'deskripsi', 'warna_ikon', 'urutan']);
        $data['is_aktif']  = $request->has('is_aktif') ? 1 : 0;
        $data['urutan']    = $data['urutan'] ?? 0;
        Layanan::create($data);
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function edit(Layanan $layanan)
    {
        return view('admin.layanan.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama'      => 'required|max:255',
            'ikon'      => 'required|max:100',
            'deskripsi' => 'required',
        ]);
        $data = $request->only(['nama', 'ikon', 'deskripsi', 'warna_ikon', 'urutan']);
        $data['is_aktif'] = $request->has('is_aktif') ? 1 : 0;
        $layanan->update($data);
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('admin.layanan.index')->with('success', 'Layanan dihapus!');
    }
}
