<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Infografis;
use Illuminate\Http\Request;

class InfografisController extends Controller
{
    public function index()
    {
        $data = Infografis::latest()->get();
        return view('admin.infografis.index', compact('data'));
    }

    public function create()
    {
        return view('admin.infografis.create');
    }

    public function store(Request $request)
    {
        Infografis::create($request->all());
        return redirect()->route('infografis.index');
    }

    public function edit($id)
    {
        $data = Infografis::findOrFail($id);
        return view('admin.infografis.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Infografis::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('infografis.index');
    }

    public function destroy($id)
    {
        Infografis::destroy($id);
        return redirect()->route('infografis.index');
    }
}
