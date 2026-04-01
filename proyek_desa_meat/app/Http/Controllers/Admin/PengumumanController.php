<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $data = Pengumuman::latest()->get();
        return view('admin.pengumuman.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pengumuman.create');
    }

    public function store(Request $request)
    {
        Pengumuman::create($request->all());
        return redirect()->route('pengumuman.index');
    }

    public function edit($id)
    {
        $data = Pengumuman::findOrFail($id);
        return view('admin.pengumuman.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Pengumuman::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('pengumuman.index');
    }

    public function destroy($id)
    {
        Pengumuman::destroy($id);
        return redirect()->route('pengumuman.index');
    }
}