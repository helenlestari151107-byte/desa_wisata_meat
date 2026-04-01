<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Potensi;
use Illuminate\Http\Request;

class PotensiController extends Controller
{
    public function index()
    {
        $data = Potensi::latest()->get();
        return view('admin.potensi.index', compact('data'));
    }

    public function create()
    {
        return view('admin.potensi.create');
    }

    public function store(Request $request)
    {
        Potensi::create($request->all());
        return redirect()->route('potensi.index');
    }

    public function edit($id)
    {
        $data = Potensi::findOrFail($id);
        return view('admin.potensi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Potensi::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('potensi.index');
    }

    public function destroy($id)
    {
        Potensi::destroy($id);
        return redirect()->route('potensi.index');
    }
}