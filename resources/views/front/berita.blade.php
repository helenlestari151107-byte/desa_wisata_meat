@extends('layouts.app')

@section('body')
{{-- Mini marquee bar --}}
<div style="height:32px;background:linear-gradient(90deg,var(--forest),var(--teal),var(--forest))"></div>

{{-- Navbar --}}
<nav id="navbar" class="scrolled">
  <div class="nav-inner">
    <a class="nav-brand" href="{{ route('home') }}">
      <div class="brand-icon">M</div>
      <div class="brand-text">
        <span class="t1">{{ $profil->nama_desa ?? 'Desa Wisata Meat' }}</span>
        <span class="t2">🌿 Kab. Toba, Sumatera Utara</span>
      </div>
    </a>
    <ul class="nav-menu" style="display:flex">
      <li><a href="{{ route('home') }}"><i class="fas fa-home fa-xs"></i> Beranda</a></li>
      <li><a href="{{ route('berita.index') }}" class="nav-active"><i class="fas fa-newspaper fa-xs"></i> Berita</a></li>
      <li><a href="{{ route('event.index') }}"><i class="fas fa-calendar-alt fa-xs"></i> Event</a></li>
      <li><a href="{{ route('pengumuman.index') }}"><i class="fas fa-bullhorn fa-xs"></i> Pengumuman</a></li>
    </ul>
    <a href="{{ route('home') }}" class="btn-admin-nav"><i class="fas fa-arrow-left"></i> Beranda</a>
  </div>
</nav>

{{-- Breadcrumb --}}
<div class="page-breadcrumb">
  <div class="container">
    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a>
    <span class="bc-sep">/</span>
    <span class="bc-current">Berita Desa</span>
  </div>
</div>

{{-- Content --}}
<section class="section section-alt" style="padding-top:40px">
  <div class="container">
    <div class="sec-head" style="margin-bottom:36px">
      <div class="sec-pill"><i class="fas fa-newspaper"></i> Berita Desa</div>
      <h1 class="sec-title">Semua <span>Berita</span></h1>
      <p class="sec-desc">Informasi dan perkembangan terbaru seputar kegiatan Desa Meat</p>
    </div>

    @if($beritas->count())
    {{-- Featured first item --}}
    @php $first = $beritas->first(); @endphp
    <div class="berita-featured" style="margin-bottom:32px">
      <a href="{{ route('berita.detail', $first->slug) }}" class="bf-main">
        <div class="bf-img">
          @if($first->gambar)
            <img loading="lazy" src="{{ Storage::url($first->gambar) }}" alt="{{ $first->judul }}">
          @else
            <img loading="lazy" src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80" alt="">
          @endif
          <div class="bf-cat {{ $first->kategori=='wisata'?'amber':($first->kategori=='pengumuman'?'teal':'') }}">{{ ucfirst($first->kategori) }}</div>
        </div>
        <div class="bf-body">
          <div class="bf-meta">
            <span class="bf-date"><i class="fas fa-calendar"></i> {{ optional($first->published_at)->format('d M Y') ?? $first->created_at->format('d M Y') }}</span>
            <span class="bf-views"><i class="fas fa-eye"></i> {{ number_format($first->views) }}</span>
          </div>
          <div class="bf-title">{{ $first->judul }}</div>
          <div class="bf-excerpt">{{ Str::limit(strip_tags($first->isi), 240) }}</div>
          <div class="bf-footer">
            <div class="bf-author"><div class="bf-av">{{ strtoupper(substr($first->penulis??'A',0,1)) }}</div><span class="bf-an">{{ $first->penulis ?? 'Admin' }}</span></div>
            <span class="readmore">Baca Selengkapnya <i class="fas fa-arrow-right"></i></span>
          </div>
        </div>
      </a>
      <div class="berita-side">
        @foreach($beritas->slice(1,4) as $b)
        <a href="{{ route('berita.detail', $b->slug) }}" class="bside-item">
          <div class="bside-img">
            @if($b->gambar)<img loading="lazy" src="{{ Storage::url($b->gambar) }}" alt="">
            @else<img loading="lazy" src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=200&q=70" alt="">@endif
          </div>
          <div class="bside-body">
            <div class="bside-cat">{{ ucfirst($b->kategori) }}</div>
            <div class="bside-title">{{ Str::limit($b->judul,65) }}</div>
            <div class="bside-date"><i class="fas fa-calendar fa-xs"></i> {{ optional($b->published_at)->format('d M Y') ?? $b->created_at->format('d M Y') }}</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>

    {{-- Grid of remaining --}}
    @if($beritas->count() > 5)
    <h3 style="font-family:'Playfair Display',serif;font-size:22px;color:var(--navy);margin-bottom:20px">Berita Lainnya</h3>
    <div class="berita-grid-sm">
      @foreach($beritas->slice(5) as $b)
      <a href="{{ route('berita.detail', $b->slug) }}" class="bg-sm-card">
        <div class="bg-sm-img">
          @if($b->gambar)<img loading="lazy" src="{{ Storage::url($b->gambar) }}" alt="">
          @else<img loading="lazy" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&q=70" alt="">@endif
          <div class="bf-cat {{ $b->kategori=='wisata'?'amber':($b->kategori=='pengumuman'?'teal':'') }}" style="position:absolute;top:12px;left:12px">{{ ucfirst($b->kategori) }}</div>
        </div>
        <div class="bg-sm-body">
          <div class="bg-sm-title">{{ Str::limit($b->judul,70) }}</div>
          <div class="bg-sm-meta">
            <span class="bg-sm-date"><i class="fas fa-calendar"></i> {{ optional($b->published_at)->format('d M Y') ?? $b->created_at->format('d M Y') }}</span>
            <span class="readmore" style="font-size:11px">Baca <i class="fas fa-arrow-right"></i></span>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    @endif

    <div style="margin-top:32px">{{ $beritas->links() }}</div>
    @else
    <div style="text-align:center;padding:80px 0;color:var(--slate)">
      <i class="fas fa-newspaper" style="font-size:48px;opacity:0.2;display:block;margin-bottom:16px"></i>
      <p>Belum ada berita yang dipublikasikan.</p>
    </div>
    @endif
  </div>
</section>

<footer>
  <div class="container">
    <div class="footer-bottom">
      <p>© {{ date('Y') }} {{ $profil->nama_desa ?? 'Desa Wisata Meat' }} — Website Resmi Pemerintah Desa</p>
      <div class="fb-links"><a href="{{ route('home') }}">Beranda</a><a href="{{ route('login') }}">Admin</a></div>
    </div>
  </div>
</footer>
@endsection
