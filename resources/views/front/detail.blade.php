@extends('layouts.app')

@section('body')
<!-- Minimal navbar for detail page -->
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
    <div style="display:flex;align-items:center;gap:12px">
      <a href="{{ route('home') }}" class="btn-admin-nav"><i class="fas fa-arrow-left"></i> Kembali</a>
    </div>
  </div>
</nav>

<div style="padding-top:110px;padding-bottom:60px;background:white;min-height:100vh">
  <div class="container" style="max-width:860px">
    <div style="display:inline-block;background:rgba(27,94,47,0.08);color:var(--forest);padding:4px 14px;border-radius:100px;font-size:11px;font-weight:700;letter-spacing:1px;text-transform:uppercase;margin-bottom:16px">
      {{ $berita->kategori }}
    </div>
    <h1 style="font-family:'Playfair Display',serif;font-size:clamp(26px,4vw,40px);font-weight:700;color:var(--navy);line-height:1.25;margin-bottom:16px">{{ $berita->judul }}</h1>
    <div style="display:flex;gap:20px;align-items:center;margin-bottom:28px;padding-bottom:20px;border-bottom:1px solid #f0f0f0;flex-wrap:wrap">
      <span style="font-size:13px;color:var(--slate)"><i class="fas fa-user" style="color:var(--forest)"></i> {{ $berita->penulis }}</span>
      <span style="font-size:13px;color:var(--slate)"><i class="fas fa-clock" style="color:var(--forest)"></i> {{ $berita->published_at ? $berita->published_at->format('d M Y') : $berita->created_at->format('d M Y') }}</span>
      <span style="font-size:13px;color:var(--slate)"><i class="fas fa-eye" style="color:var(--forest)"></i> {{ number_format($berita->views) }} tayangan</span>
    </div>
    @if($berita->gambar)
    <img src="{{ asset('storage/'.$berita->gambar) }}" alt="{{ $berita->judul }}" style="width:100%;max-height:420px;object-fit:cover;border-radius:16px;margin-bottom:32px">
    @endif
    <div style="font-size:15px;color:var(--navy);line-height:1.9;margin-bottom:40px">{!! nl2br(e($berita->isi)) !!}</div>

    @if($terkait->count())
    <div style="border-top:1px solid #f0f0f0;padding-top:36px">
      <h3 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--navy);margin-bottom:20px">Berita Terkait</h3>
      <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px">
        @foreach($terkait as $b)
        <a href="{{ route('berita.detail', $b->slug) }}" class="bside-item" style="text-decoration:none">
          <div class="bside-img">
            @if($b->gambar)
              <img src="{{ asset('storage/'.$b->gambar) }}" alt="{{ $b->judul }}">
            @else
              <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=200&q=60" alt="">
            @endif
          </div>
          <div class="bside-body">
            <div class="bside-title">{{ Str::limit($b->judul,60) }}</div>
            <div class="bside-date">{{ $b->published_at ? $b->published_at->format('d M Y') : $b->created_at->format('d M Y') }}</div>
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
      © {{ date('Y') }} Desa Wisata Meat — Website Resmi Pemerintah Desa Meat.
    </div>
  </div>
</footer>
@endsection