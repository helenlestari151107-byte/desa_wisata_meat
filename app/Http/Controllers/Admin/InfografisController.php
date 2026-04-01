<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infografis;
use Illuminate\Http\Request;

class InfografisController extends Controller
{
    public function index()
    {
        $infografis = Infografis::orderBy('urutan')->get();
        return view('admin.infografis.index', compact('infografis'));
    }

    public function create()
    {
        return view('admin.infografis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required|max:255',
            'nilai' => 'required|max:100',
        ]);
        Infografis::create($request->only(['label', 'nilai', 'ikon', 'warna', 'urutan']));
        return redirect()->route('admin.infografis.index')->with('success', 'Infografis berhasil ditambahkan!');
    }

    public function edit(Infografis $infografis)
    {
        return view('admin.infografis.edit', compact('infografis'));
    }

    public function update(Request $request, Infografis $infografis)
    {
        $request->validate([
            'label' => 'required|max:255',
            'nilai' => 'required|max:100',
        ]);
        $infografis->update($request->only(['label', 'nilai', 'ikon', 'warna', 'urutan']));
        return redirect()->route('admin.infografis.index')->with('success', 'Infografis berhasil diperbarui!');
    }

    public function destroy(Infografis $infografis)
    {
        $infografis->delete();
        return redirect()->route('admin.infografis.index')->with('success', 'Infografis dihapus!');
    }
}

