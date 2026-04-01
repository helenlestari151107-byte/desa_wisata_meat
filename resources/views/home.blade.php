@extends('layouts.app')
@section('body')

<div class="marquee-bar">
  <div class="marquee-badge">INFO</div>
  <div class="marquee-track">
    @foreach($pengumumans as $p)
      <span><i class="fas fa-bell"></i> {{ $p->judul }}</span>
    @endforeach
    @foreach($pengumumans as $p)
      <span><i class="fas fa-bell"></i> {{ $p->judul }}</span>
    @endforeach
  </div>
</div>

<nav id="navbar">
  <div class="nav-inner">
    <a href="{{ route('home') }}" class="nav-brand">
      <div class="brand-icon">D</div>
      <div class="brand-text">
        <span class="t1">{{ $profil->nama_desa ?? 'Desa Wisata Meat' }}</span>
        <span class="t2">Pesona Danau Toba</span>
      </div>
    </a>
    <ul class="nav-menu">
      <li><a href="#beranda">Beranda</a></li>
      <li><a href="#profil">Profil Desa</a></li>
      <li><a href="#berita">Berita</a></li>
      <li><a href="#potensi">Potensi</a></li>
      <li><a href="#galeri">Galeri</a></li>
      <li><a href="#kontak">Kontak</a></li>
    </ul>
  </div>
</nav>

<section id="hero">
  <div class="hero-slides">
    <div class="hero-slide hs1 active"></div>
    <div class="hero-slide hs2"></div>
    <div class="hero-slide hs3"></div>
  </div>
  <div class="hero-inner">
    <div class="hero-badge"><i class="fas fa-star"></i> Desa Wisata Unggulan Danau Toba</div>
    <h1 class="hero-title">Selamat Datang di<br><span class="accent">{{ $profil->nama_desa ?? 'Desa Wisata Meat' }}</span></h1>
    <p class="hero-sub">Surga tersembunyi di tepi Danau Toba dengan keindahan alam, budaya Batak, dan keramahan warga yang tak tertandingi.</p>
    <div class="hero-ctas">
      <a href="#potensi" class="cta-primary"><i class="fas fa-map-marked-alt"></i> Jelajahi Sekarang</a>
      <a href="#profil" class="cta-ghost"><i class="fas fa-info-circle"></i> Tentang Desa</a>
    </div>
  </div>
  <div class="hero-dots">
    <div class="hdot on"></div><div class="hdot"></div><div class="hdot"></div>
  </div>
</section>

<section id="profil" class="section section-alt">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-village"></i> Profil Desa</div>
      <h2 class="sec-title">Tentang <span>{{ $profil->nama_desa ?? 'Desa Meat' }}</span></h2>
      <p class="sec-desc">{{ Str::limit($profil->sejarah ?? 'Desa Wisata Meat terletak di tepi Danau Toba, Sumatera Utara.', 160) }}</p>
    </div>
  </div>
</section>

<section id="berita" class="section">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-newspaper"></i> Berita & Informasi</div>
      <h2 class="sec-title">Berita <span>Terkini</span></h2>
    </div>
    @if($beritas->count())
    <div class="berita-featured">
      @with($beritas->first())
      <a href="{{ route('berita.detail', $beritas->first()->slug) }}" class="bf-main">
        <div class="bf-img">
          @if($beritas->first()->gambar)
            <img src="{{ Storage::url($beritas->first()->gambar) }}" alt="{{ $beritas->first()->judul }}">
          @else
            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80" alt="">
          @endif
          <span class="bf-cat">{{ $beritas->first()->kategori }}</span>
        </div>
        <div class="bf-body">
          <p class="bf-title">{{ $beritas->first()->judul }}</p>
          <p class="bf-excerpt">{{ Str::limit(strip_tags($beritas->first()->isi), 150) }}</p>
        </div>
      </a>
      <div class="berita-side">
        @foreach($beritas->slice(1,4) as $b)
        <a href="{{ route('berita.detail', $b->slug) }}" class="bside-item">
          <div class="bside-img">
            @if($b->gambar)<img src="{{ Storage::url($b->gambar) }}" alt="">
            @else<img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=200&q=60" alt="">@endif
          </div>
          <div class="bside-body">
            <p class="bside-title">{{ Str::limit($b->judul,60) }}</p>
            <span class="bside-date"><i class="fas fa-clock"></i> {{ $b->created_at->diffForHumans() }}</span>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</section>

<section id="potensi" class="section section-sand">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-mountain"></i> Potensi Desa</div>
      <h2 class="sec-title">Wisata <span>Unggulan</span></h2>
    </div>
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px">
      @foreach($potensis as $p)
      <div class="wcard">
        <div class="wcard-img">
          @if($p->gambar)
            <img src="{{ Storage::url($p->gambar) }}" alt="{{ $p->nama }}">
          @else
            <img src="https://images.unsplash.com/photo-1482822683622-00effad5052e?w=600&q=80" alt="">
          @endif
          <div class="wcard-overlay"></div>
          <div class="wcard-rating"><i class="fas fa-star"></i> {{ $p->rating }}</div>
          <div class="wcard-info">
            <div class="wcard-name">{{ $p->nama }}</div>
          </div>
        </div>
        <div class="wcard-body">
          <p class="wcard-desc">{{ Str::limit($p->deskripsi, 100) }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="event" class="section section-teal">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill light"><i class="fas fa-calendar-alt"></i> Kalender Event</div>
      <h2 class="sec-title white">Event & <span class="amber">Agenda</span></h2>
    </div>
    <div class="event-grid">
      @foreach($events as $e)
      <div class="ev-card">
        <div class="ev-img">
          @if($e->gambar)
            <img src="{{ Storage::url($e->gambar) }}" alt="{{ $e->nama_event }}">
          @else
            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&q=60" alt="">
          @endif
        </div>
        <div class="ev-body">
          <div class="ev-date"><i class="fas fa-calendar"></i> {{ $e->tanggal_mulai->format('d M Y') }}</div>
          <div class="ev-name">{{ $e->nama_event }}</div>
          <div class="ev-loc"><i class="fas fa-map-pin"></i> {{ $e->lokasi ?? 'Desa Meat' }}</div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<section id="galeri" class="section section-alt">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-images"></i> Galeri Foto</div>
      <h2 class="sec-title">Keindahan <span>Desa Meat</span></h2>
    </div>
    <div class="galeri-masonry">
      @foreach($galeris->take(8) as $i => $g)
      <div class="gal-item {{ $i % 5 == 0 ? 'tall' : '' }}">
        <img src="{{ Storage::url($g->gambar) }}" alt="{{ $g->judul }}" loading="lazy">
        <div class="gal-item-overlay"><i class="fas fa-expand"></i></div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="layanan" class="section">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-concierge-bell"></i> Layanan Desa</div>
      <h2 class="sec-title">Layanan <span>Publik</span></h2>
    </div>
    <div class="layanan-grid">
      @foreach($layanans as $l)
      <div class="lay-card">
        <div class="lay-icon {{ $l->warna_ikon }}"><i class="{{ $l->ikon }}"></i></div>
        <div class="lay-body">
          <h4>{{ $l->nama }}</h4>
          <p>{{ Str::limit($l->deskripsi ?? '', 60) }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section id="kontak" class="section section-sand">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-address-book"></i> Kontak</div>
      <h2 class="sec-title">Hubungi <span>Kami</span></h2>
    </div>
    <div class="kontak-grid">
      @foreach($kontaks as $k)
      <div class="kontak-card">
        <div class="kontak-av"><i class="{{ $k->ikon }}"></i></div>
        <div class="kontak-info">
          <h4>{{ $k->nama }}</h4>
          <p>{{ $k->jabatan }}</p>
          @if($k->nomor)<p><i class="fas fa-phone"></i> {{ $k->nomor }}</p>@endif
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<section class="section section-navy">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill light"><i class="fas fa-phone-alt"></i> Nomor Penting</div>
      <h2 class="sec-title white">Nomor <span class="amber">Darurat</span></h2>
    </div>
    <div class="nomor-grid">
      @foreach($nomors as $n)
      <div class="nomor-card">
        <div class="nomor-icon {{ $n->warna }}"><i class="{{ $n->ikon }}"></i></div>
        <div class="nomor-body">
          <h4>{{ $n->nama }}</h4>
          <p>{{ $n->nomor_telepon }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <h3>{{ $profil->nama_desa ?? 'Desa Wisata Meat' }}</h3>
        <p>Desa wisata di tepi Danau Toba yang kaya budaya Batak dan keindahan alam.</p>
      </div>
      <div><h4>Navigasi</h4><ul><li><a href="#profil">Profil Desa</a></li><li><a href="#berita">Berita</a></li><li><a href="#potensi">Potensi</a></li><li><a href="#galeri">Galeri</a></li></ul></div>
      <div><h4>Layanan</h4><ul>@foreach($layanans->take(4) as $l)<li><a href="#layanan">{{ $l->nama }}</a></li>@endforeach</ul></div>
      <div><h4>Kontak</h4><ul><li><a href="#">{{ $profil->alamat ?? 'Desa Meat, Balige, Toba' }}</a></li><li><a href="tel:{{ $profil->no_telepon }}">{{ $profil->no_telepon ?? '-' }}</a></li><li><a href="mailto:{{ $profil->email_desa }}">{{ $profil->email_desa ?? '-' }}</a></li></ul></div>
    </div>
    <div class="footer-bottom">© {{ date('Y') }} {{ $profil->nama_desa ?? 'Desa Wisata Meat' }} — Hak Cipta Dilindungi</div>
  </div>
</footer>

@endsection