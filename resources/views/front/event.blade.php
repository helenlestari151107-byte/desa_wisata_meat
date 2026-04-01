@extends('layouts.app')

@section('body')
<div style="height:32px;background:linear-gradient(90deg,var(--forest),var(--teal),var(--forest))"></div>
<nav id="navbar" class="scrolled">
    <div class="nav-inner">
        <a class="nav-brand" href="{{ route('home') }}">
            <div class="brand-icon">M</div>
            <div class="brand-text">
                <span class="t1">{{ $profil->nama_desa ?? 'Desa Wisata Meat' }}</span>
                <span class="t2">🌿 Kab. Toba, Sumatera Utara</span>
            </div>
        </a>
        <a href="{{ route('home') }}" class="btn-admin-nav"><i class="fas fa-arrow-left"></i> Beranda</a>
    </div>
</nav>

<div style="padding-top:96px;padding-bottom:60px;background:var(--navy);min-height:100vh">
    <div class="container">
        <div style="text-align:center;margin-bottom:48px">
            <div class="sec-pill light"><i class="fas fa-calendar-alt"></i> Event & Kegiatan</div>
            <h1 class="sec-title white">Jadwal <span class="amber">Event</span> Desa</h1>
        </div>
        @if($events->count())
        <div class="event-grid">
            @foreach($events as $e)
            <div class="ev-card">
                @if($e->gambar)
                <div class="ev-img"><img src="{{ asset('storage/'.$e->gambar) }}" alt="{{ $e->nama_event }}"></div>
                @else
                <div class="ev-img" style="background:rgba(255,255,255,0.08);display:flex;align-items:center;justify-content:center;font-size:40px">🎉</div>
                @endif
                <div class="ev-body">
                    <div class="ev-date"><i class="fas fa-calendar"></i> {{ $e->tanggal_mulai ? $e->tanggal_mulai->format('d M Y') : '-' }} — {{ $e->tanggal_selesai ? $e->tanggal_selesai->format('d M Y') : '' }}</div>
                    <div class="ev-name">{{ $e->nama_event }}</div>
                    @if($e->deskripsi)<p style="font-size:12px;color:rgba(255,255,255,0.55);margin-bottom:8px">{{ Str::limit($e->deskripsi,100) }}</p>@endif
                    @if($e->lokasi)<div class="ev-loc"><i class="fas fa-map-marker-alt"></i> {{ $e->lokasi }}</div>@endif
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-top:32px">{{ $events->links() }}</div>
        @else
        <p style="text-align:center;color:rgba(255,255,255,0.5);padding:60px">Belum ada event dijadwalkan.</p>
        @endif
    </div>
</div>
@endsection