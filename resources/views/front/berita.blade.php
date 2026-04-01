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

<div style="padding-top:96px;padding-bottom:60px;background:var(--smoke);min-height:100vh">
    <div class="container">
        <div class="sec-head" style="margin-bottom:36px;text-align:left">
            <div class="sec-pill"><i class="fas fa-newspaper"></i> Berita Desa</div>
            <h1 class="sec-title">Semua <span>Berita</span></h1>
        </div>
        @if($beritas->count())
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px">
            @foreach($beritas as $b)
            <a href="{{ route('berita.detail', $b->slug) }}" class="bf-main" style="text-decoration:none">
                <div class="bf-img">
                    @if($b->gambar)
                    <img src="{{ asset('storage/'.$b->gambar) }}" alt="{{ $b->judul }}">
                    @else
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&q=70" alt="">
                    @endif
                    <div class="bf-cat">{{ strtoupper($b->kategori) }}</div>
                </div>
                <div class="bf-body">
                    <h3 class="bf-title">{{ Str::limit($b->judul,70) }}</h3>
                    <p class="bf-excerpt">{{ Str::limit(strip_tags($b->isi),110) }}</p>
                    <div style="margin-top:10px;font-size:12px;color:var(--slate)">
                        <i class="fas fa-clock"></i> {{ $b->published_at ? $b->published_at->format('d M Y') : $b->created_at->format('d M Y') }}
                        &nbsp; <i class="fas fa-eye"></i> {{ number_format($b->views) }}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
        <div style="margin-top:32px">{{ $beritas->links() }}</div>
        @else
        <p style="text-align:center;color:var(--slate);padding:60px">Belum ada berita yang dipublikasikan.</p>
        @endif
    </div>
</div>
@endsection