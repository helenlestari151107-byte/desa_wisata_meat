<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NomorPenting;
use Illuminate\Http\Request;

class NomorPentingController extends Controller
{
    public function index()
    {
        $data = NomorPenting::latest()->get();
        return view('admin.nomor_penting.index', compact('data'));
    }

    public function create()
    {
        return view('admin.nomor_penting.create');
    }

    public function store(Request $request)
    {
        NomorPenting::create($request->all());
        return redirect()->route('nomor-penting.index');
    }

    public function edit($id)
    {
        $data = NomorPenting::findOrFail($id);
        return view('admin.nomor_penting.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = NomorPenting::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('nomor-penting.index');
    }

    public function destroy($id)
    {
        NomorPenting::destroy($id);
        return redirect()->route('nomor-penting.index');
    }
}