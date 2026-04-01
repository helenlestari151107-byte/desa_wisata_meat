<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $data = Layanan::latest()->get();
        return view('admin.layanan.index', compact('data'));
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
        Layanan::create($request->all());
        return redirect()->route('layanan.index');
    }

    public function edit($id)
    {
        $data = Layanan::findOrFail($id);
        return view('admin.layanan.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Layanan::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('layanan.index');
    }

    public function destroy($id)
    {
        Layanan::destroy($id);
        return redirect()->route('layanan.index');
    }
}
