@extends('layouts.app')

@section('body')
<div style="height:32px;background:linear-gradient(90deg,var(--forest),var(--teal),var(--forest))"></div>

<nav id="navbar" class="scrolled">
  <div class="nav-inner">
    <a class="nav-brand" href="{{ route('home') }}">
      <div class="brand-icon">M</div>
      <div class="brand-text">
        <span class="t1">Desa Wisata Meat</span>
        <span class="t2">🌿 Kab. Toba, Sumatera Utara</span>
      </div>
    </a>
    <a href="{{ route('berita.index') }}" class="btn-admin-nav"><i class="fas fa-arrow-left"></i> Kembali ke Berita</a>
  </div>
</nav>

<div class="page-breadcrumb">
  <div class="container">
    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a>
    <span class="bc-sep">/</span>
    <a href="{{ route('berita.index') }}">Berita</a>
    <span class="bc-sep">/</span>
    <span class="bc-current">{{ Str::limit($berita->judul, 40) }}</span>
  </div>
</div>

<div style="background:white;min-height:100vh;padding-bottom:60px">
  <div class="container" style="max-width:860px;padding-top:32px">

    {{-- Kategori badge --}}
    <div style="display:inline-block;background:rgba(27,94,47,0.08);color:var(--forest);padding:5px 16px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:1.2px;text-transform:uppercase;margin-bottom:18px">
      <i class="fas fa-tag"></i> {{ ucfirst($berita->kategori) }}
    </div>

    {{-- Judul --}}
    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(26px,4vw,40px);font-weight:700;color:var(--navy);line-height:1.25;margin-bottom:18px">{{ $berita->judul }}</h1>

    {{-- Meta --}}
    <div style="display:flex;gap:20px;align-items:center;margin-bottom:28px;padding-bottom:20px;border-bottom:2px solid var(--sand);flex-wrap:wrap">
      <span style="display:flex;align-items:center;gap:6px;font-size:13px;color:var(--slate)">
        <div style="width:28px;height:28px;border-radius:50%;background:var(--forest);color:white;display:flex;align-items:center;justify-content:center;font-size:11px;font-weight:700">{{ strtoupper(substr($berita->penulis??'A',0,1)) }}</div>
        {{ $berita->penulis ?? 'Admin' }}
      </span>
      <span style="font-size:13px;color:var(--slate)"><i class="fas fa-clock" style="color:var(--forest)"></i> {{ optional($berita->published_at)->format('d F Y') ?? $berita->created_at->format('d F Y') }}</span>
      <span style="font-size:13px;color:var(--slate)"><i class="fas fa-eye" style="color:var(--forest)"></i> {{ number_format($berita->views) }} tayangan</span>
    </div>

    {{-- Gambar --}}
    @if($berita->gambar)
    <img src="{{ Storage::url($berita->gambar) }}" alt="{{ $berita->judul }}"
      style="width:100%;max-height:440px;object-fit:cover;border-radius:16px;margin-bottom:32px;box-shadow:0 8px 32px rgba(0,0,0,0.12)">
    @endif

    {{-- Isi --}}
    <div style="font-size:15px;color:var(--navy);line-height:1.95;margin-bottom:40px">
      {!! nl2br(e($berita->isi)) !!}
    </div>

    {{-- Share --}}
    <div style="border-top:1px solid var(--sand);border-bottom:1px solid var(--sand);padding:16px 0;margin-bottom:40px;display:flex;align-items:center;gap:12px;flex-wrap:wrap">
      <span style="font-size:13px;font-weight:700;color:var(--navy)">Bagikan:</span>
      <a href="https://wa.me/?text={{ urlencode($berita->judul . ' ' . request()->url()) }}" target="_blank"
        style="display:inline-flex;align-items:center;gap:6px;padding:7px 14px;background:#25D366;color:white;border-radius:8px;font-size:12px;font-weight:600;text-decoration:none"><i class="fab fa-whatsapp"></i> WhatsApp</a>
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
        style="display:inline-flex;align-items:center;gap:6px;padding:7px 14px;background:#1877f2;color:white;border-radius:8px;font-size:12px;font-weight:600;text-decoration:none"><i class="fab fa-facebook-f"></i> Facebook</a>
      <a href="{{ route('berita.index') }}" class="btn-green" style="margin-left:auto"><i class="fas fa-arrow-left"></i> Semua Berita</a>
    </div>

    {{-- Berita Terkait --}}
    @if($terkait->count())
    <div>
      <h3 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--navy);margin-bottom:20px">📰 Berita Terkait</h3>
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px">
        @foreach($terkait as $b)
        <a href="{{ route('berita.detail', $b->slug) }}" class="bside-item" style="text-decoration:none">
          <div class="bside-img">
            @if($b->gambar)<img src="{{ Storage::url($b->gambar) }}" alt="{{ $b->judul }}">
            @else<img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=200&q=60" alt="">@endif
          </div>
          <div class="bside-body">
            <div class="bside-cat">{{ ucfirst($b->kategori) }}</div>
            <div class="bside-title">{{ Str::limit($b->judul,60) }}</div>
            <div class="bside-date">{{ optional($b->published_at)->format('d M Y') ?? $b->created_at->format('d M Y') }}</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endif

  </div>
</div>

<footer>
  <div class="container">
    <div class="footer-bottom">
      <p>© {{ date('Y') }} Desa Wisata Meat — Website Resmi Pemerintah Desa</p>
      <div class="fb-links"><a href="{{ route('home') }}">Beranda</a><a href="{{ route('berita.index') }}">Berita</a><a href="{{ route('login') }}">Admin</a></div>
    </div>
  </div>
</footer>
@endsection
