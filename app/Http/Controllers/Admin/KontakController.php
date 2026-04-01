<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KontakDesa;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontaks = KontakDesa::orderBy('created_at', 'desc')->get();
        return view('admin.kontak.index', compact('kontaks'));
    }

    public function create()
    {
        return view('admin.kontak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'    => 'required|max:255',
            'jabatan' => 'required|max:255',
            'nomor'   => 'required|max:20',
        ]);
        KontakDesa::create($request->only(['nama', 'jabatan', 'nomor', 'email', 'ikon']));
        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil ditambahkan!');
    }

    public function edit(KontakDesa $kontak)
    {
        return view('admin.kontak.edit', compact('kontak'));
    }

    public function update(Request $request, KontakDesa $kontak)
    {
        $request->validate([
            'nama'    => 'required|max:255',
            'jabatan' => 'required|max:255',
            'nomor'   => 'required|max:20',
        ]);
        $kontak->update($request->only(['nama', 'jabatan', 'nomor', 'email', 'ikon']));
        return redirect()->route('admin.kontak.index')->with('success', 'Kontak berhasil diperbarui!');
    }

    public function destroy(KontakDesa $kontak)
    {
        $kontak->delete();
        return redirect()->route('admin.kontak.index')->with('success', 'Kontak dihapus!');
    }
}
