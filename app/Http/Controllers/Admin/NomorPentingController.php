<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NomorPenting;
use Illuminate\Http\Request;

class NomorPentingController extends Controller
{
    public function index()
    {
        $nomors = NomorPenting::orderBy('kategori')->get();
        return view('admin.nomor_penting.index', compact('nomors'));
    }

    public function create()
    {
        return view('admin.nomor_penting.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|max:255',
            'nomor_telepon' => 'required|max:20',
            'kategori'      => 'required',
        ]);
        NomorPenting::create($request->only(['nama', 'kategori', 'nomor_telepon', 'warna', 'ikon']));
        return redirect()->route('admin.nomor-penting.index')->with('success', 'Nomor penting berhasil ditambahkan!');
    }

    public function edit(NomorPenting $nomorPenting)
    {
        return view('admin.nomor_penting.edit', compact('nomorPenting'));
    }

    public function update(Request $request, NomorPenting $nomorPenting)
    {
        $request->validate([
            'nama'          => 'required|max:255',
            'nomor_telepon' => 'required|max:20',
            'kategori'      => 'required',
        ]);
        $nomorPenting->update($request->only(['nama', 'kategori', 'nomor_telepon', 'warna', 'ikon']));
        return redirect()->route('admin.nomor-penting.index')->with('success', 'Nomor penting berhasil diperbarui!');
    }

    public function destroy(NomorPenting $nomorPenting)
    {
        $nomorPenting->delete();
        return redirect()->route('admin.nomor-penting.index')->with('success', 'Nomor penting dihapus!');
    }
}
