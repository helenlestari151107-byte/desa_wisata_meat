<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $data = Event::latest()->get();
        return view('admin.events.index', compact('data'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect()->route('events.index');
    }

    public function edit($id)
    {
        $data = Event::findOrFail($id);
        return view('admin.events.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = Event::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('events.index');
    }

    public function destroy($id)
    {
        Event::destroy($id);
        return redirect()->route('events.index');
    }
}