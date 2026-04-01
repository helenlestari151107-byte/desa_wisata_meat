<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $pengumumans = Pengumuman::orderBy('tanggal', 'desc')->paginate(10);
        return view('admin.pengumuman.index', compact('pengumumans'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'   => 'required|max:255',
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'tipe'    => 'required',
        ]);
        $data = $request->only(['judul', 'isi', 'tipe', 'tanggal', 'berakhir_pada']);
        $data['is_aktif'] = $request->has('is_aktif') ? 1 : 0;
        Pengumuman::create($data);
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan!');
    }

    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit', compact('pengumuman'));
    }

    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul'   => 'required|max:255',
            'isi'     => 'required',
            'tanggal' => 'required|date',
            'tipe'    => 'required',
        ]);
        $data = $request->only(['judul', 'isi', 'tipe', 'tanggal', 'berakhir_pada']);
        $data['is_aktif'] = $request->has('is_aktif') ? 1 : 0;
        $pengumuman->update($data);
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman berhasil diperbarui!');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('admin.pengumuman.index')->with('success', 'Pengumuman dihapus!');
    }
}
