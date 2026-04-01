<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('tanggal_mulai', 'desc')->paginate(10);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_event'     => 'required|max:255',
            'tanggal_mulai'  => 'required|date',
            'tanggal_selesai'=> 'required|date|after_or_equal:tanggal_mulai',
            'lokasi'         => 'required',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $data = $request->only(['nama_event', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'lokasi', 'is_aktif']);
        $data['is_aktif'] = $request->has('is_aktif') ? 1 : 0;
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('events', 'public');
        }
        Event::create($data);
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil ditambahkan!');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'nama_event'     => 'required|max:255',
            'tanggal_mulai'  => 'required|date',
            'tanggal_selesai'=> 'required|date|after_or_equal:tanggal_mulai',
            'lokasi'         => 'required',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);
        $data = $request->only(['nama_event', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'lokasi']);
        $data['is_aktif'] = $request->has('is_aktif') ? 1 : 0;
        if ($request->hasFile('gambar')) {
            if ($event->gambar) Storage::disk('public')->delete($event->gambar);
            $data['gambar'] = $request->file('gambar')->store('events', 'public');
        }
        $event->update($data);
        return redirect()->route('admin.event.index')->with('success', 'Event berhasil diperbarui!');
    }

    public function destroy(Event $event)
    {
        if ($event->gambar) Storage::disk('public')->delete($event->gambar);
        $event->delete();
        return redirect()->route('admin.event.index')->with('success', 'Event dihapus!');
    }
}