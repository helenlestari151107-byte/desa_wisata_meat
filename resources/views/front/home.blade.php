@extends('layouts.app')

@section('body')

{{-- ====== MARQUEE TOP ====== --}}
<div class="marquee-bar">
  <div class="marquee-badge">📢 INFO</div>
  <div class="marquee-track">
    <div class="marquee-inner">  
    @forelse($pengumumans as $p)
      <span><i class="fas fa-bullhorn"></i> {{ $p->judul }}</span>
    @empty
      <span><i class="fas fa-bullhorn"></i> Selamat datang di Website Desa Meat</span>
      <span><i class="fas fa-tree"></i> Gotong Royong massal setiap Sabtu pukul 07.00 WIB</span>
      <span><i class="fas fa-calendar"></i> Festival Budaya Batak Toba — Nantikan di Desa Meat</span>
    @endforelse
    {{-- Duplikat untuk marquee seamless --}}
    @forelse($pengumumans as $p)
      <span><i class="fas fa-bullhorn"></i> {{ $p->judul }}</span>
    @empty
      <span><i class="fas fa-bullhorn"></i> Selamat datang di Website Desa Meat</span>
      <span><i class="fas fa-tree"></i> Gotong Royong massal setiap Sabtu pukul 07.00 WIB</span>
      <span><i class="fas fa-calendar"></i> Festival Budaya Batak Toba — Nantikan di Desa Meat</span>
    @endforelse
    </div>
  </div>
</div>

{{-- ====== NAVBAR ====== --}}
<nav id="navbar">
  <div class="nav-inner">
    <a class="nav-brand" href="{{ route('home') }}">
      <div class="brand-icon">M</div>
      <div class="brand-text">
        <span class="t1">{{ $profil->nama_desa ?? 'Desa Meat' }}</span>
        <span class="t2">🌿 Kab. Toba, Sumatera Utara</span>
      </div>
    </a>
    <ul class="nav-menu">
      <li><a href="#beranda">Beranda</a></li>
      <li>
        <a href="#">Info Desa <i class="fas fa-chevron-down" style="font-size:9px"></i></a>
        <div class="dd-menu">
          <a href="#profil-desa"><i class="fas fa-landmark"></i> Profil Desa</a>
          <a href="#struktur-pemerintahan"><i class="fas fa-sitemap"></i> Struktur Pemerintahan</a>
          <a href="#infografis-desa"><i class="fas fa-chart-bar"></i> Infografis Data</a>
          <div class="dd-divider"></div>
          <a href="#galeri-desa"><i class="fas fa-images"></i> Galeri & Video</a>
          <a href="#peta-desa"><i class="fas fa-map-marked-alt"></i> Peta Desa</a>
        </div>
      </li>
      <li>
        <a href="#">Potensi <i class="fas fa-chevron-down" style="font-size:9px"></i></a>
        <div class="dd-menu">
          <a href="#potensi-wisata"><i class="fas fa-mountain"></i> Wisata Alam</a>
          <a href="#potensi-wisata"><i class="fas fa-drum"></i> Wisata Budaya</a>
          <a href="#potensi-wisata"><i class="fas fa-store"></i> UMKM Desa</a>
          <a href="#potensi-wisata"><i class="fas fa-box-open"></i> Produk Unggulan</a>
        </div>
      </li>
      <li><a href="#berita-desa"><i class="fas fa-newspaper fa-xs"></i> Berita</a></li>
      <li><a href="#pengumuman-desa"><i class="fas fa-bullhorn fa-xs"></i> Pengumuman</a></li>
      <li><a href="#layanan-desa"><i class="fas fa-concierge-bell fa-xs"></i> Layanan</a></li>
      <li><a href="#event-desa"><i class="fas fa-calendar-alt fa-xs"></i> Event</a></li>
    </ul>
    <div class="nav-actions">
      <button class="btn-srch" onclick="openSearch()"><i class="fas fa-search"></i></button>
      <a href="{{ route('login') }}" style="display:inline-flex;align-items:center;gap:6px;padding:8px 16px;border-radius:8px;background:var(--amber);color:var(--navy);font-size:12px;font-weight:700;text-decoration:none;transition:all 0.2s" onmouseover="this.style.background='var(--amber-l)'" onmouseout="this.style.background='var(--amber)'"><i class="fas fa-lock"></i> Admin</a>
    </div>
    <button class="hamburger" id="hamburgerBtn" onclick="toggleDrawer()" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

{{-- ====== MOBILE DRAWER ====== --}}
<div class="mobile-drawer" id="mobileDrawer" onclick="closeDrawerIfOverlay(event)">
  <div class="drawer-panel">
    <div class="drawer-head">
      <div class="drawer-head-icon">M</div>
      <div>
        <h4>{{ $profil->nama_desa ?? 'Desa Meat' }}</h4>
        <p>🌿 Kab. Toba, Sumatera Utara</p>
      </div>
      <button class="drawer-close" onclick="toggleDrawer()"><i class="fas fa-times"></i></button>
    </div>
    <nav class="drawer-nav">
      <a href="#beranda" onclick="toggleDrawer()"><i class="fas fa-home"></i> Beranda</a>
      <div class="drawer-divider"></div>
      <div class="drawer-section">Info Desa</div>
      <a href="#profil-desa" onclick="toggleDrawer()"><i class="fas fa-landmark"></i> Profil Desa</a>
      <a href="#struktur-pemerintahan" onclick="toggleDrawer()"><i class="fas fa-sitemap"></i> Struktur Pemerintahan</a>
      <a href="#infografis-desa" onclick="toggleDrawer()"><i class="fas fa-chart-bar"></i> Infografis Data</a>
      <a href="#galeri-desa" onclick="toggleDrawer()"><i class="fas fa-images"></i> Galeri & Video</a>
      <a href="#peta-desa" onclick="toggleDrawer()"><i class="fas fa-map-marked-alt"></i> Peta Desa</a>
      <div class="drawer-divider"></div>
      <div class="drawer-section">Konten</div>
      <a href="#potensi-wisata" onclick="toggleDrawer()"><i class="fas fa-mountain"></i> Potensi & Wisata</a>
      <a href="#berita-desa" onclick="toggleDrawer()"><i class="fas fa-newspaper"></i> Berita Desa</a>
      <a href="#pengumuman-desa" onclick="toggleDrawer()"><i class="fas fa-bullhorn"></i> Pengumuman</a>
      <a href="#event-desa" onclick="toggleDrawer()"><i class="fas fa-calendar-alt"></i> Event Kalender</a>
      <div class="drawer-divider"></div>
      <div class="drawer-section">Layanan</div>
      <a href="#layanan-desa" onclick="toggleDrawer()"><i class="fas fa-concierge-bell"></i> Layanan Desa</a>
      <a href="#kontak-desa" onclick="toggleDrawer()"><i class="fas fa-phone-alt"></i> Kontak Penting</a>
    </nav>
    <div class="drawer-footer">
      @if($profil && $profil->no_telepon)
      <a href="tel:{{ $profil->no_telepon }}" class="drawer-phone"><i class="fas fa-phone"></i> Telepon</a>
      @endif
    </div>
  </div>
</div>

{{-- ====== BERANDA ====== --}}
<div id="page-beranda" class="site-page">

{{-- HERO --}}
<section id="hero">
  <div class="hero-slides">
    <div class="hero-slide hs1 active"></div>
    <div class="hero-slide hs2"></div>
    <div class="hero-slide hs3"></div>
  </div>
  <div class="hero-inner">
    <div class="hero-badge"><i class="fas fa-map-marker-alt"></i> Kecamatan Balige, Kabupaten Toba</div>
    <h1 class="hero-title">
      <span class="accent">Desa Meat</span>
    </h1>
    <p class="hero-sub">Pesona Danau Toba, Kearifan Lokal Batak, dan Keramahan Masyarakat yang Tak Terlupakan</p>
    <div class="hero-ctas">
      <a href="#potensi-wisata" class="cta-primary"><i class="fas fa-compass"></i> Jelajahi Wisata</a>
      <a href="#profil-desa" class="cta-ghost"><i class="fas fa-info-circle"></i> Profil Desa</a>
    </div>
  </div>
  <button class="hero-prev" onclick="heroSlide(-1)"><i class="fas fa-chevron-left"></i></button>
  <button class="hero-next" onclick="heroSlide(1)"><i class="fas fa-chevron-right"></i></button>
  <div class="hero-dots" id="heroDots">
    <div class="hdot on" onclick="gotoSlide(0)"></div>
    <div class="hdot" onclick="gotoSlide(1)"></div>
    <div class="hdot" onclick="gotoSlide(2)"></div>
  </div>
</section>

{{-- QUICK STRIP --}}
<div class="qstrip">
  <a class="qitem" href="#profil-desa">
    <div class="qi-icon"><i class="fas fa-map-marker-alt"></i></div>
    <div class="qi-text"><div class="l1">Lokasi</div><div class="l2">Kec. Balige, Kab. Toba</div></div>
  </a>
  <a class="qitem" href="#layanan-desa">
    <div class="qi-icon"><i class="fas fa-clock"></i></div>
    <div class="qi-text"><div class="l1">Pelayanan</div><div class="l2">Senin–Jumat 08:00–16:00</div></div>
  </a>
  <a class="qitem" href="tel:{{ $profil->no_telepon ?? '063221000' }}">
    <div class="qi-icon"><i class="fas fa-phone"></i></div>
    <div class="qi-text"><div class="l1">Telepon Desa</div><div class="l2">{{ $profil->no_telepon ?? '(0632) 21000' }}</div></div>
  </a>
  <a class="qitem" href="mailto:{{ $profil->email_desa ?? 'desameat@gmail.com' }}">
    <div class="qi-icon"><i class="fas fa-envelope"></i></div>
    <div class="qi-text"><div class="l1">Email Desa</div><div class="l2">{{ $profil->email_desa ?? 'desameat@gmail.com' }}</div></div>
  </a>
</div>

{{-- PROFIL SINGKAT --}}
<section id="profil" class="section section-alt">
  <div class="container">
    <div class="profil-grid">
      <div class="profil-img-wrap" data-aos="fade-right">
        <div class="profil-main-img"></div>
        <div class="profil-float1">
          <span class="pf-num">2025</span>
          <span class="pf-txt">Desa Wisata</span>
        </div>
        <div class="profil-float2">
          <i class="fas fa-water"></i>
          <div>
            <span class="pf2-val">Toba</span>
            <span class="pf2-lbl">Tepi Danau Toba</span>
          </div>
        </div>
      </div>
      <div data-aos="fade-left" data-aos-delay="100">
        <div class="sec-pill"><i class="fas fa-landmark"></i> Profil Desa</div>
        <h2 style="font-family:'Playfair Display',serif;font-size:36px;font-weight:700;color:var(--navy);margin-bottom:16px;line-height:1.2">Mengenal Lebih Dekat<br><span style="color:var(--forest)">{{ $profil->nama_desa ?? 'Desa Meat' }}</span></h2>
        <p style="font-size:14px;color:var(--slate);line-height:1.85;margin-bottom:14px">{{ $profil->sejarah ? Str::limit($profil->sejarah, 300) : 'Desa Meat adalah desa wisata yang terletak di Kecamatan Balige, Kabupaten Toba, Provinsi Sumatera Utara. Berada di tepi Danau Toba — danau vulkanik terbesar di dunia — desa ini dikelilingi pemandangan alam yang spektakuler dan kaya budaya Batak Toba.' }}</p>
        <div class="profil-facts">
          <div class="pf-item"><div class="pfi-icon"><i class="fas fa-ruler-combined"></i></div><div><div class="pfi-lbl">Luas Wilayah</div><div class="pfi-val">{{ $profil->luas_wilayah ?? '325 Ha' }}</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--teal)"><i class="fas fa-users"></i></div><div><div class="pfi-lbl">Total Penduduk</div><div class="pfi-val">{{ number_format($profil->jumlah_penduduk ?? 1250) }} Jiwa</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--amber)"><i class="fas fa-home"></i></div><div><div class="pfi-lbl">Kepala Keluarga</div><div class="pfi-val">{{ number_format($profil->jumlah_kk ?? 312) }} KK</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--terracot)"><i class="fas fa-user-tie"></i></div><div><div class="pfi-lbl">Kepala Desa</div><div class="pfi-val">{{ $profil->nama_kepala_desa ?? 'Parlindungan Simbolon' }}</div></div></div>
        </div>
        <div style="margin-top:20px;display:flex;gap:12px;flex-wrap:wrap">
          <a href="#struktur-pemerintahan" class="btn-green"><i class="fas fa-info-circle"></i> Selengkapnya</a>
          <a href="#peta-desa" class="btn-outline"><i class="fas fa-map"></i> Lihat Peta</a>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- BERITA --}}
<section id="berita" class="section section-alt">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-newspaper"></i> Berita Desa</div>
      <h2 class="sec-title">Kabar Terkini <span>Desa Meat</span></h2>
      <p class="sec-desc">Informasi dan perkembangan terbaru seputar kegiatan Desa Meat</p>
    </div>
    @if($beritas->count())
    <div class="berita-featured" data-aos="fade-up">
      @php $utama = $beritas->first(); @endphp
      <a href="{{ route('berita.detail', $utama->slug) }}" class="bf-main">
        <div class="bf-img">
          @if($utama->gambar)
            <img loading="lazy" src="{{ Storage::url($utama->gambar) }}" alt="{{ $utama->judul }}">
          @else
            <img loading="lazy" src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80" alt="{{ $utama->judul }}">
          @endif
          <div class="bf-cat {{ $utama->kategori == 'wisata' ? 'amber' : ($utama->kategori == 'pengumuman' ? 'teal' : '') }}">{{ ucfirst($utama->kategori) }}</div>
        </div>
        <div class="bf-body">
          <div class="bf-meta">
            <span class="bf-date"><i class="fas fa-calendar"></i> {{ $utama->published_at ? $utama->published_at->format('d M Y') : $utama->created_at->format('d M Y') }}</span>
            <span class="bf-views"><i class="fas fa-eye"></i> {{ number_format($utama->views) }} views</span>
          </div>
          <div class="bf-title">{{ $utama->judul }}</div>
          <div class="bf-excerpt">{{ Str::limit(strip_tags($utama->isi), 200) }}</div>
          <div class="bf-footer">
            <div class="bf-author"><div class="bf-av">{{ strtoupper(substr($utama->penulis ?? 'A', 0, 1)) }}</div><span class="bf-an">{{ $utama->penulis ?? 'Admin' }}</span></div>
            <span class="readmore">Baca Selengkapnya <i class="fas fa-arrow-right"></i></span>
          </div>
        </div>
      </a>
      <div class="berita-side">
        @foreach($beritas->slice(1, 4) as $b)
        <a href="{{ route('berita.detail', $b->slug) }}" class="bside-item">
          <div class="bside-img">
            @if($b->gambar)
              <img loading="lazy" src="{{ Storage::url($b->gambar) }}" alt="">
            @else
              <img loading="lazy" src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=200&q=80" alt="">
            @endif
          </div>
          <div class="bside-body">
            <div class="bside-cat">{{ ucfirst($b->kategori) }}</div>
            <div class="bside-title">{{ Str::limit($b->judul, 65) }}</div>
            <div class="bside-date"><i class="fas fa-calendar fa-xs"></i> {{ $b->published_at ? $b->published_at->format('d M Y') : $b->created_at->format('d M Y') }}</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @if($beritas->count() > 5)
    <div class="berita-grid-sm" data-aos="fade-up">
      @foreach($beritas->slice(5, 3) as $b)
      <a href="{{ route('berita.detail', $b->slug) }}" class="bg-sm-card">
        <div class="bg-sm-img">
          @if($b->gambar)
            <img loading="lazy" src="{{ Storage::url($b->gambar) }}" alt="">
          @else
            <img loading="lazy" src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=600&q=80" alt="">
          @endif
          <div class="bf-cat {{ $b->kategori == 'wisata' ? 'amber' : 'teal' }}" style="position:absolute;top:12px;left:12px">{{ ucfirst($b->kategori) }}</div>
        </div>
        <div class="bg-sm-body">
          <div class="bg-sm-title">{{ Str::limit($b->judul, 70) }}</div>
          <div class="bg-sm-meta">
            <span class="bg-sm-date"><i class="fas fa-calendar"></i> {{ $b->published_at ? $b->published_at->format('d M Y') : $b->created_at->format('d M Y') }}</span>
            <span class="readmore" style="font-size:11px">Baca <i class="fas fa-arrow-right"></i></span>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    @endif
    @endif
    <div style="text-align:center;margin-top:36px" data-aos="fade-up"><a href="{{ route('berita.index') }}" class="btn-green"><i class="fas fa-newspaper"></i> Lihat Semua Berita</a></div>
  </div>
</section>

{{-- EVENT --}}
<section id="event" class="section section-navy">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill light"><i class="fas fa-calendar-alt"></i> Kalender Event</div>
      <h2 class="sec-title white">Event & Kegiatan <span class="amber">Desa Meat</span></h2>
      <p class="sec-desc light">Agenda kegiatan dan festival yang akan datang di Desa Meat</p>
    </div>
    <div class="event-grid" data-aos="fade-up">
      @forelse($events as $e)
      <div class="evcard">
        <div class="evcard-top evt-{{ $loop->iteration % 2 == 0 ? 'teal' : ($loop->iteration % 3 == 0 ? 'forest' : 'amber') }}">
          <div class="evcard-date">{{ $e->tanggal_mulai->format('d') }}</div>
          <div class="evcard-month">{{ $e->tanggal_mulai->format('F Y') }}</div>
          <div class="evcard-icon">📅</div>
        </div>
        <div class="evcard-body">
          <div class="evcard-title">{{ $e->nama_event }}</div>
          <div class="evcard-loc"><i class="fas fa-map-marker-alt"></i> {{ $e->lokasi ?? 'Desa Meat' }}</div>
          <div class="evcard-desc">{{ Str::limit($e->deskripsi ?? '', 100) }}</div>
        </div>
      </div>
      @empty
      <div style="color:rgba(255,255,255,0.6);text-align:center;grid-column:1/-1;padding:40px">Belum ada event terjadwal</div>
      @endforelse
    </div>
    <div style="text-align:center;margin-top:36px" data-aos="fade-up"><a href="{{ route('event.index') }}" class="btn-amber"><i class="fas fa-calendar-alt"></i> Lihat Semua Event</a></div>
  </div>
</section>

{{-- PENGUMUMAN --}}
<section id="pengumuman" class="section section-sand">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-bullhorn"></i> Pengumuman</div>
      <h2 class="sec-title">Pengumuman <span>Resmi Desa</span></h2>
      <p class="sec-desc">Informasi dan pengumuman resmi dari Pemerintah Desa Meat</p>
    </div>
    <div class="peng-layout" data-aos="fade-up">
      <div class="peng-list">
        @forelse($pengumumans as $p)
        @php
          $tipeClass = match($p->tipe) {
            'darurat' => 'urgent',
            'event'   => 'event',
            'layanan' => 'layanan',
            default   => 'info'
          };
          $tagClass = match($p->tipe) {
            'darurat' => 'pt-urgent',
            'event'   => 'pt-event',
            'layanan' => 'pt-layanan',
            default   => 'pt-info'
          };
          $tagLabel = match($p->tipe) {
            'darurat' => '🔴 Penting',
            'event'   => '🟢 Kegiatan',
            'layanan' => '🩵 Layanan',
            default   => '🔵 Informasi'
          };
        @endphp
        <div class="peng-item {{ $tipeClass }}">
          <div class="peng-datebox">
            <span class="peng-day">{{ $p->tanggal->format('d') }}</span>
            <span class="peng-mon">{{ $p->tanggal->format('M') }}</span>
          </div>
          <div>
            <span class="ptag {{ $tagClass }}">{{ $tagLabel }}</span>
            <div class="peng-title">{{ $p->judul }}</div>
            <div class="peng-text">{{ Str::limit($p->isi, 140) }}</div>
          </div>
        </div>
        @empty
        <div style="padding:30px;text-align:center;color:var(--slate)">Belum ada pengumuman</div>
        @endforelse
      </div>
      <div class="peng-sidebar">
        <div class="pside-card green">
          <h4 style="color:white"><i class="fas fa-calendar-alt"></i> Event Mendatang</h4>
          @forelse($events->take(4) as $e)
          <div class="event-li">
            <div class="el-dot" style="background:var(--amber)"></div>
            <div>
              <div class="el-name">{{ Str::limit($e->nama_event, 30) }}</div>
              <div class="el-date">{{ $e->tanggal_mulai->format('d M Y') }}</div>
            </div>
          </div>
          @empty
          <div style="font-size:13px;color:rgba(255,255,255,0.6)">Belum ada event</div>
          @endforelse
        </div>
        <div class="pside-card amber">
          <h4><i class="fas fa-envelope" style="color:var(--forest)"></i> Kontak Desa</h4>
          <p style="font-size:13px;margin-bottom:12px;opacity:0.8">Hubungi kantor desa untuk informasi lebih lanjut</p>
          @if($profil && $profil->no_telepon)
          <a href="tel:{{ $profil->no_telepon }}" style="display:flex;align-items:center;gap:8px;background:var(--forest);color:white;padding:10px 14px;border-radius:8px;text-decoration:none;font-weight:700;font-size:13px"><i class="fas fa-phone"></i> {{ $profil->no_telepon }}</a>
          @endif
        </div>
      </div>
    </div>
    <div style="text-align:center;margin-top:28px" data-aos="fade-up"><a href="{{ route('pengumuman.index') }}" class="btn-green"><i class="fas fa-bullhorn"></i> Lihat Semua Pengumuman</a></div>
  </div>
</section>

</div>{{-- /page-beranda --}}

{{-- ====== PROFIL DESA PAGE ====== --}}
<div id="page-profil-desa" class="site-page" style="display:none">
<section id="profil-full" class="section section-alt">
  <div class="container">
    <div class="profil-grid">
      <div class="profil-img-wrap" data-aos="fade-right">
        @if($profil && $profil->foto_kepala_desa)
          <div class="profil-main-img" style="background-image:url('{{ Storage::url($profil->foto_kepala_desa) }}')"></div>
        @else
          <div class="profil-main-img"></div>
        @endif
        <div class="profil-float1">
          <span class="pf-num">2025</span>
          <span class="pf-txt">Desa Wisata</span>
        </div>
        <div class="profil-float2">
          <i class="fas fa-water"></i>
          <div><span class="pf2-val">Toba</span><span class="pf2-lbl">Tepi Danau Toba</span></div>
        </div>
      </div>
      <div data-aos="fade-left">
        <div class="sec-pill"><i class="fas fa-landmark"></i> Profil Desa</div>
        <h2 style="font-family:'Playfair Display',serif;font-size:36px;font-weight:700;color:var(--navy);margin-bottom:16px;line-height:1.2">Mengenal Lebih Dekat<br><span style="color:var(--forest)">{{ $profil->nama_desa ?? 'Desa Meat' }}</span></h2>
        <p style="font-size:14px;color:var(--slate);line-height:1.85;margin-bottom:14px">{{ $profil->sejarah ?? 'Desa Meat adalah desa wisata yang terletak di Kecamatan Balige, Kabupaten Toba, Provinsi Sumatera Utara.' }}</p>
        <div class="profil-facts">
          <div class="pf-item"><div class="pfi-icon"><i class="fas fa-ruler-combined"></i></div><div><div class="pfi-lbl">Luas Wilayah</div><div class="pfi-val">{{ $profil->luas_wilayah ?? '325 Ha' }}</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--teal)"><i class="fas fa-users"></i></div><div><div class="pfi-lbl">Total Penduduk</div><div class="pfi-val">{{ number_format($profil->jumlah_penduduk ?? 1250) }} Jiwa</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--amber)"><i class="fas fa-home"></i></div><div><div class="pfi-lbl">Kepala Keluarga</div><div class="pfi-val">{{ number_format($profil->jumlah_kk ?? 312) }} KK</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--navy)"><i class="fas fa-user-tie"></i></div><div><div class="pfi-lbl">Kepala Desa</div><div class="pfi-val">{{ $profil->nama_kepala_desa ?? 'Parlindungan Simbolon' }}</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--green)"><i class="fas fa-phone"></i></div><div><div class="pfi-lbl">Telepon</div><div class="pfi-val">{{ $profil->no_telepon ?? '(0632) 21000' }}</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--slate)"><i class="fas fa-map-marker-alt"></i></div><div><div class="pfi-lbl">Alamat</div><div class="pfi-val">{{ Str::limit($profil->alamat ?? 'Kec. Balige, Kab. Toba', 30) }}</div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

{{-- ====== STRUKTUR PEMERINTAHAN ====== --}}
<div id="page-struktur-pemerintahan" class="site-page" style="display:none">
<section id="info-desa" class="section section-sand">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-info-circle"></i> Info Desa</div>
      <h2 class="sec-title">Informasi Lengkap <span>{{ $profil->nama_desa ?? 'Desa Meat' }}</span></h2>
    </div>
    <div class="info-tabs-wrap" data-aos="fade-up">
      <button class="itab on" onclick="switchITab('bagan',this)">🏛️ Struktur Pemerintahan</button>
      <button class="itab" onclick="switchITab('visi',this)">🎯 Visi & Misi</button>
      <button class="itab" onclick="switchITab('sejarah',this)">📜 Sejarah Desa</button>
    </div>
    <div id="itp-bagan" class="itp on" data-aos="fade-up">
      <div class="bagan-wrap">
        <div class="bagan-row">
          <div class="bagan-box top">
            <div class="bb-title">Kepala Desa</div>
            <div class="bb-name">{{ $profil->nama_kepala_desa ?? 'Parlindungan Simbolon' }}</div>
          </div>
        </div>
        <div style="display:flex;justify-content:center"><div style="width:2px;height:28px;background:var(--sand-d)"></div></div>
        <div class="bagan-row" style="margin-bottom:0">
          <div class="bagan-box teal">
            <div class="bb-title">Sekretaris Desa</div>
            <div class="bb-name">Hotman Sirait, A.Md.</div>
          </div>
        </div>
        <div style="display:flex;justify-content:center"><div style="width:2px;height:28px;background:var(--sand-d)"></div></div>
        <div class="bagan-line-group">
          <div class="bagan-box amber"><div class="bb-title">Kaur Keuangan</div><div class="bb-name">–</div></div>
          <div class="bagan-box"><div class="bb-title">Kaur Umum</div><div class="bb-name">–</div></div>
          <div class="bagan-box"><div class="bb-title">Kasi Pemerintahan</div><div class="bb-name">–</div></div>
          <div class="bagan-box"><div class="bb-title">Kasi Pembangunan</div><div class="bb-name">–</div></div>
        </div>
      </div>
    </div>
    <div id="itp-visi" class="itp" data-aos="fade-up">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px">
        <div style="background:white;border-radius:var(--radius);padding:32px;box-shadow:var(--sh);border-top:4px solid var(--forest)">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px"><div style="width:48px;height:48px;border-radius:12px;background:var(--forest);display:flex;align-items:center;justify-content:center;color:white;font-size:22px"><i class="fas fa-eye"></i></div><h3 style="font-family:'Playfair Display',serif;font-size:22px;color:var(--navy)">Visi</h3></div>
          <p style="font-size:15px;color:var(--navy);font-style:italic;line-height:1.75;font-family:'Playfair Display',serif">"{{ $profil->visi ?? 'Terwujudnya Desa Meat sebagai Desa Wisata yang Mandiri dan Berbudaya Berbasis Kearifan Lokal Batak Toba' }}"</p>
        </div>
        <div style="background:white;border-radius:var(--radius);padding:32px;box-shadow:var(--sh);border-top:4px solid var(--teal)">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px"><div style="width:48px;height:48px;border-radius:12px;background:var(--teal);display:flex;align-items:center;justify-content:center;color:white;font-size:22px"><i class="fas fa-bullseye"></i></div><h3 style="font-family:'Playfair Display',serif;font-size:22px;color:var(--navy)">Misi</h3></div>
          <div style="font-size:14px;color:var(--slate);line-height:1.85">{!! nl2br(e($profil->misi ?? "1. Mengembangkan potensi wisata alam dan budaya\n2. Memberdayakan UMKM lokal\n3. Meningkatkan kualitas SDM\n4. Menjaga kelestarian budaya Batak Toba")) !!}</div>
        </div>
      </div>
    </div>
    <div id="itp-sejarah" class="itp">
      <div style="background:white;border-radius:var(--radius);padding:36px;box-shadow:var(--sh);max-width:820px;margin:0 auto">
        <h3 style="font-family:'Playfair Display',serif;font-size:26px;color:var(--navy);margin-bottom:20px">Sejarah {{ $profil->nama_desa ?? 'Desa Meat' }}</h3>
        <p style="font-size:14px;color:var(--slate);line-height:1.85">{{ $profil->sejarah ?? 'Desa Meat telah berdiri sejak ratusan tahun silam sebagai pemukiman suku Batak Toba di tepi Danau Toba. Nama "Meat" berasal dari kata dalam bahasa Batak yang berarti tempat yang nyaman dan damai.' }}</p>
      </div>
    </div>
  </div>
</section>
</div>

{{-- ====== INFOGRAFIS ====== --}}
<div id="page-infografis-desa" class="site-page" style="display:none">
<section id="infografis" class="section section-teal">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill light"><i class="fas fa-chart-bar"></i> Data Statistik</div>
      <h2 class="sec-title white">Infografis <span class="amber">Desa Meat</span></h2>
      <p class="sec-desc light">Data kependudukan dan statistik desa yang diperbarui secara berkala</p>
    </div>
    <div class="infografis-grid" data-aos="fade-up">
      <div class="ig-card"><div class="ig-icon"><i class="fas fa-users"></i></div><div class="ig-num" id="ig1">{{ number_format($profil->jumlah_penduduk ?? 0) }}</div><div class="ig-lbl">Total Penduduk</div></div>
      <div class="ig-card"><div class="ig-icon"><i class="fas fa-male"></i></div><div class="ig-num" id="ig2">{{ number_format(intval(($profil->jumlah_penduduk ?? 0) * 0.51)) }}</div><div class="ig-lbl">Laki-laki</div></div>
      <div class="ig-card"><div class="ig-icon"><i class="fas fa-female"></i></div><div class="ig-num" id="ig3">{{ number_format(intval(($profil->jumlah_penduduk ?? 0) * 0.49)) }}</div><div class="ig-lbl">Perempuan</div></div>
      <div class="ig-card"><div class="ig-icon"><i class="fas fa-home"></i></div><div class="ig-num" id="ig4">{{ number_format($profil->jumlah_kk ?? 0) }}</div><div class="ig-lbl">Kepala Keluarga</div></div>
    </div>
    <div class="charts-grid" data-aos="fade-up">
      <div class="chart-card">
        <h4><i class="fas fa-briefcase"></i> Mata Pencaharian</h4>
        <div class="bar-row"><div class="bar-lbl">Petani</div><div class="bar-track"><div class="bar-fill green" style="width:0" data-w="72%"></div></div><div class="bar-val">72%</div></div>
        <div class="bar-row"><div class="bar-lbl">Nelayan</div><div class="bar-track"><div class="bar-fill teal" style="width:0" data-w="15%"></div></div><div class="bar-val">15%</div></div>
        <div class="bar-row"><div class="bar-lbl">PNS / TNI</div><div class="bar-track"><div class="bar-fill amber" style="width:0" data-w="8%"></div></div><div class="bar-val">8%</div></div>
        <div class="bar-row"><div class="bar-lbl">Pedagang</div><div class="bar-track"><div class="bar-fill terracot" style="width:0" data-w="5%"></div></div><div class="bar-val">5%</div></div>
      </div>
      <div class="chart-card">
        <h4><i class="fas fa-graduation-cap"></i> Tingkat Pendidikan</h4>
        <div class="bar-row"><div class="bar-lbl">SMA/SMK</div><div class="bar-track"><div class="bar-fill amber" style="width:0" data-w="45%"></div></div><div class="bar-val">45%</div></div>
        <div class="bar-row"><div class="bar-lbl">SMP</div><div class="bar-track"><div class="bar-fill green" style="width:0" data-w="28%"></div></div><div class="bar-val">28%</div></div>
        <div class="bar-row"><div class="bar-lbl">SD</div><div class="bar-track"><div class="bar-fill teal" style="width:0" data-w="18%"></div></div><div class="bar-val">18%</div></div>
        <div class="bar-row"><div class="bar-lbl">Sarjana+</div><div class="bar-track"><div class="bar-fill terracot" style="width:0" data-w="9%"></div></div><div class="bar-val">9%</div></div>
      </div>
      <div class="chart-card">
        <h4><i class="fas fa-venus-mars"></i> Rasio Gender</h4>
        <div class="donut-wrap">
          <svg width="90" height="90" viewBox="0 0 90 90">
            <circle cx="45" cy="45" r="34" fill="none" stroke="rgba(255,255,255,0.07)" stroke-width="14"/>
            <circle cx="45" cy="45" r="34" fill="none" stroke="#4CAF73" stroke-width="14" stroke-dasharray="108 106" stroke-dashoffset="22" stroke-linecap="round"/>
            <circle cx="45" cy="45" r="34" fill="none" stroke="#F4C262" stroke-width="14" stroke-dasharray="106 108" stroke-dashoffset="-86" stroke-linecap="round"/>
            <text x="45" y="50" text-anchor="middle" fill="white" font-size="13" font-weight="700" font-family="Playfair Display">51%</text>
          </svg>
          <div class="donut-legend">
            <div class="dleg"><div class="dleg-dot" style="background:#4CAF73"></div>Laki-laki 51%</div>
            <div class="dleg"><div class="dleg-dot" style="background:#F4C262"></div>Perempuan 49%</div>
          </div>
        </div>
        <div class="bar-row"><div class="bar-lbl">0–14 thn</div><div class="bar-track"><div class="bar-fill green" style="width:0" data-w="25%"></div></div><div class="bar-val">25%</div></div>
        <div class="bar-row"><div class="bar-lbl">15–64 thn</div><div class="bar-track"><div class="bar-fill amber" style="width:0" data-w="66%"></div></div><div class="bar-val">66%</div></div>
        <div class="bar-row"><div class="bar-lbl">65+ thn</div><div class="bar-track"><div class="bar-fill terracot" style="width:0" data-w="9%"></div></div><div class="bar-val">9%</div></div>
      </div>
    </div>
  </div>
</section>
</div>

{{-- ====== BERITA DESA PAGE ====== --}}
<div id="page-berita-desa" class="site-page" style="display:none">
<section id="berita-full" class="section section-alt">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-newspaper"></i> Berita Desa</div>
      <h2 class="sec-title">Kabar Terkini <span>Desa Meat</span></h2>
    </div>
    @if($beritas->count())
    <div class="berita-featured" data-aos="fade-up">
      @php $utama = $beritas->first(); @endphp
      <a href="{{ route('berita.detail', $utama->slug) }}" class="bf-main">
        <div class="bf-img">
          @if($utama->gambar)<img loading="lazy" src="{{ Storage::url($utama->gambar) }}" alt="{{ $utama->judul }}">
          @else<img loading="lazy" src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=80" alt="">@endif
          <div class="bf-cat">{{ ucfirst($utama->kategori) }}</div>
        </div>
        <div class="bf-body">
          <div class="bf-meta">
            <span class="bf-date"><i class="fas fa-calendar"></i> {{ optional($utama->published_at)->format('d M Y') ?? $utama->created_at->format('d M Y') }}</span>
            <span class="bf-views"><i class="fas fa-eye"></i> {{ number_format($utama->views) }}</span>
          </div>
          <div class="bf-title">{{ $utama->judul }}</div>
          <div class="bf-excerpt">{{ Str::limit(strip_tags($utama->isi), 200) }}</div>
          <div class="bf-footer">
            <div class="bf-author"><div class="bf-av">{{ strtoupper(substr($utama->penulis ?? 'A', 0, 1)) }}</div><span class="bf-an">{{ $utama->penulis ?? 'Admin' }}</span></div>
            <span class="readmore">Baca Selengkapnya <i class="fas fa-arrow-right"></i></span>
          </div>
        </div>
      </a>
      <div class="berita-side">
        @foreach($beritas->slice(1, 4) as $b)
        <a href="{{ route('berita.detail', $b->slug) }}" class="bside-item">
          <div class="bside-img">@if($b->gambar)<img loading="lazy" src="{{ Storage::url($b->gambar) }}" alt="">@else<img loading="lazy" src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=200&q=80" alt="">@endif</div>
          <div class="bside-body"><div class="bside-cat">{{ ucfirst($b->kategori) }}</div><div class="bside-title">{{ Str::limit($b->judul, 60) }}</div><div class="bside-date"><i class="fas fa-calendar fa-xs"></i> {{ optional($b->published_at)->format('d M Y') ?? $b->created_at->format('d M Y') }}</div></div>
        </a>
        @endforeach
      </div>
    </div>
    @endif
    <div style="text-align:center;margin-top:28px"><a href="{{ route('berita.index') }}" class="btn-green"><i class="fas fa-newspaper"></i> Lihat Semua Berita</a></div>
  </div>
</section>
</div>

{{-- ====== POTENSI WISATA ====== --}}
<div id="page-potensi-wisata" class="site-page" style="display:none">
<section id="potensi" class="section section-sand">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-mountain"></i> Potensi Desa</div>
      <h2 class="sec-title">Wisata & Potensi <span>Unggulan</span></h2>
      <p class="sec-desc">Jelajahi keindahan alam, kekayaan budaya, dan potensi ekonomi Desa Meat</p>
    </div>
    <div class="wisata-filter" data-aos="fade-up">
      <button class="wfbtn on" onclick="filterWisata('all',this)">Semua</button>
      <button class="wfbtn" onclick="filterWisata('wisata',this)">🏔️ Wisata Alam</button>
      <button class="wfbtn" onclick="filterWisata('budaya',this)">🥁 Wisata Budaya</button>
      <button class="wfbtn" onclick="filterWisata('kerajinan',this)">🛍️ Kerajinan</button>
      <button class="wfbtn" onclick="filterWisata('kuliner',this)">🍲 Kuliner</button>
      <button class="wfbtn" onclick="filterWisata('pertanian',this)">🌾 Pertanian</button>
    </div>
    <div class="wisata-grid" id="wisataGrid" data-aos="fade-up">
      @forelse($potensis as $p)
      <div class="wcard" data-cat="{{ $p->kategori }}">
        <div class="wcard-img">
          @if($p->gambar)
            <img loading="lazy" src="{{ Storage::url($p->gambar) }}" alt="{{ $p->nama }}">
          @else
            <img loading="lazy" src="https://images.unsplash.com/photo-1501785888041-af3ef285b470?w=600&q=80" alt="{{ $p->nama }}">
          @endif
          <div class="wcard-overlay"></div>
          <div class="wcard-rating"><i class="fas fa-star"></i> {{ $p->rating }}</div>
          <div class="wcard-badge">{{ ucfirst($p->kategori) }}</div>
          <div class="wcard-info">
            <div class="wcard-name">{{ $p->nama }}</div>
            @if($p->lokasi)<div class="wcard-loc"><i class="fas fa-map-marker-alt"></i> {{ $p->lokasi }}</div>@endif
          </div>
        </div>
        <div class="wcard-body">
          <div class="wcard-desc">{{ Str::limit($p->deskripsi, 100) }}</div>
          @if($p->tags)
          <div class="wcard-tags">
            @foreach(explode(',', $p->tags) as $tag)
              <span class="wtag">{{ trim($tag) }}</span>
            @endforeach
          </div>
          @endif
        </div>
      </div>
      @empty
      <div style="text-align:center;grid-column:1/-1;padding:40px;color:var(--slate)">Belum ada data potensi</div>
      @endforelse
    </div>
  </div>
</section>
</div>

{{-- ====== GALERI ====== --}}
<div id="page-galeri-desa" class="site-page" style="display:none">
<section id="galeri" class="section section-alt">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill" style="background:rgba(0,109,119,0.08);color:var(--teal)"><i class="fas fa-images"></i> Galeri</div>
      <h2 class="sec-title">Foto & Video <span style="color:var(--teal)">Desa Meat</span></h2>
      <p class="sec-desc">Dokumentasi keindahan alam, budaya, dan kegiatan Desa Meat</p>
    </div>
    <div class="galeri-filter-row" data-aos="fade-up">
      <button class="gfbtn on" onclick="filterGaleri('all',this)">Semua</button>
      <button class="gfbtn" onclick="filterGaleri('alam',this)">🏔️ Alam</button>
      <button class="gfbtn" onclick="filterGaleri('budaya',this)">🎭 Budaya</button>
      <button class="gfbtn" onclick="filterGaleri('event',this)">⭐ Event</button>
      <button class="gfbtn" onclick="filterGaleri('kuliner',this)">🍲 Kuliner</button>
      <button class="gfbtn" onclick="filterGaleri('infrastruktur',this)">🏗️ Infrastruktur</button>
    </div>
    <div class="galeri-masonry" id="galeriMasonry" data-aos="fade-up">
      @forelse($galeris as $i => $g)
      <div class="gitem {{ $i % 5 == 0 ? 'w2 h2' : ($i % 4 == 0 ? 'w2' : '') }}" data-gcat="{{ $g->kategori }}" onclick="openLbx(this,'{{ $g->judul }}','{{ Storage::url($g->gambar) }}')">
        <img loading="lazy" src="{{ Storage::url($g->gambar) }}" alt="{{ $g->judul }}">
        <div class="g-overlay"><i class="fas fa-expand-alt"></i><span>{{ $g->judul }}</span></div>
      </div>
      @empty
      <div style="text-align:center;grid-column:1/-1;padding:40px;color:var(--slate)">Belum ada foto galeri</div>
      @endforelse
    </div>
  </div>
</section>
</div>

{{-- ====== PENGUMUMAN PAGE ====== --}}
<div id="page-pengumuman-desa" class="site-page" style="display:none">
<section id="pengumuman-full" class="section section-sand">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-bullhorn"></i> Pengumuman</div>
      <h2 class="sec-title">Pengumuman <span>Resmi Desa</span></h2>
    </div>
    <div class="peng-layout" data-aos="fade-up">
      <div class="peng-list">
        @forelse($pengumumans as $p)
        @php
          $tc = match($p->tipe){'darurat'=>'urgent','event'=>'event','layanan'=>'layanan',default=>'info'};
          $tl = match($p->tipe){'darurat'=>'🔴 Penting','event'=>'🟢 Kegiatan','layanan'=>'🩵 Layanan',default=>'🔵 Informasi'};
          $tc2 = match($p->tipe){'darurat'=>'pt-urgent','event'=>'pt-event','layanan'=>'pt-layanan',default=>'pt-info'};
        @endphp
        <div class="peng-item {{ $tc }}">
          <div class="peng-datebox"><span class="peng-day">{{ $p->tanggal->format('d') }}</span><span class="peng-mon">{{ $p->tanggal->format('M') }}</span></div>
          <div><span class="ptag {{ $tc2 }}">{{ $tl }}</span><div class="peng-title">{{ $p->judul }}</div><div class="peng-text">{{ Str::limit($p->isi, 180) }}</div></div>
        </div>
        @empty
        <div style="padding:30px;text-align:center;color:var(--slate)">Belum ada pengumuman</div>
        @endforelse
      </div>
      <div class="peng-sidebar">
        <div class="pside-card green">
          <h4 style="color:white"><i class="fas fa-calendar-alt"></i> Event Mendatang</h4>
          @foreach($events->take(4) as $e)
          <div class="event-li"><div class="el-dot" style="background:var(--amber)"></div><div><div class="el-name">{{ Str::limit($e->nama_event, 28) }}</div><div class="el-date">{{ $e->tanggal_mulai->format('d M Y') }}</div></div></div>
          @endforeach
        </div>
      </div>
    </div>
    <div style="text-align:center;margin-top:24px"><a href="{{ route('pengumuman.index') }}" class="btn-green"><i class="fas fa-list"></i> Semua Pengumuman</a></div>
  </div>
</section>
</div>

{{-- ====== LAYANAN DESA ====== --}}
<div id="page-layanan-desa" class="site-page" style="display:none">
<section id="layanan" class="section section-alt">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-concierge-bell"></i> Layanan</div>
      <h2 class="sec-title">Layanan <span>Desa Meat</span></h2>
      <p class="sec-desc">Berbagai layanan administrasi dan kemasyarakatan yang tersedia</p>
    </div>
    <div class="layanan-grid" data-aos="fade-up">
      @forelse($layanans as $l)
      @php
        $colorMap = ['green'=>'l-green','teal'=>'l-teal','amber'=>'l-amber','slate'=>'l-slate'];
        $lclass = $colorMap[$l->warna_ikon] ?? 'l-green';
      @endphp
      <div class="lcard">
        <div class="lcard-icon {{ $lclass }}"><i class="{{ $l->ikon ?? 'fas fa-cog' }}"></i></div>
        <div class="lcard-title">{{ $l->nama }}</div>
        <div class="lcard-desc">{{ Str::limit($l->deskripsi ?? '', 70) }}</div>
        <a href="#" class="lcard-link">Info <i class="fas fa-arrow-right"></i></a>
      </div>
      @empty
      <div class="lcard"><div class="lcard-icon l-green"><i class="fas fa-id-card"></i></div><div class="lcard-title">Surat Keterangan</div><div class="lcard-desc">Domisili, usaha, dan keterangan lainnya</div></div>
      <div class="lcard"><div class="lcard-icon l-teal"><i class="fas fa-baby"></i></div><div class="lcard-title">Surat Kelahiran</div><div class="lcard-desc">Pengurusan akta dan surat keterangan lahir</div></div>
      <div class="lcard"><div class="lcard-icon l-amber"><i class="fas fa-users"></i></div><div class="lcard-title">Kartu Keluarga</div><div class="lcard-desc">Pengurusan KK baru dan perubahan data</div></div>
      <div class="lcard"><div class="lcard-icon l-navy"><i class="fas fa-store"></i></div><div class="lcard-title">Izin Usaha</div><div class="lcard-desc">Surat keterangan izin usaha tingkat desa</div></div>
      @endforelse
    </div>
  </div>
</section>
</div>

{{-- ====== EVENT PAGE ====== --}}
<div id="page-event-desa" class="site-page" style="display:none">
<section id="event-full" class="section section-navy">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill light"><i class="fas fa-calendar-alt"></i> Kalender Event</div>
      <h2 class="sec-title white">Event & Kegiatan <span class="amber">Desa Meat</span></h2>
    </div>
    <div class="event-grid" data-aos="fade-up">
      @forelse($events as $e)
      <div class="evcard">
        <div class="evcard-top evt-{{ ['amber','teal','forest','terracot','navy','slate'][$loop->index % 6] }}">
          <div class="evcard-date">{{ $e->tanggal_mulai->format('d') }}</div>
          <div class="evcard-month">{{ $e->tanggal_mulai->format('F Y') }}</div>
          <div class="evcard-icon">📅</div>
        </div>
        <div class="evcard-body">
          <div class="evcard-title">{{ $e->nama_event }}</div>
          <div class="evcard-loc"><i class="fas fa-map-marker-alt"></i> {{ $e->lokasi ?? 'Desa Meat' }}</div>
          <div class="evcard-desc">{{ Str::limit($e->deskripsi ?? '', 120) }}</div>
        </div>
      </div>
      @empty
      <div style="color:rgba(255,255,255,0.5);text-align:center;grid-column:1/-1;padding:40px">Belum ada event terjadwal</div>
      @endforelse
    </div>
    <div style="text-align:center;margin-top:28px"><a href="{{ route('event.index') }}" class="btn-amber"><i class="fas fa-calendar-alt"></i> Semua Event</a></div>
  </div>
</section>
</div>

{{-- ====== KONTAK DESA ====== --}}
<div id="page-kontak-desa" class="site-page" style="display:none">
<section id="kontak" class="section section-sand">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-phone-alt"></i> Kontak Penting</div>
      <h2 class="sec-title">Nomor & Kontak <span>Penting</span></h2>
      <p class="sec-desc">Hubungi layanan darurat dan instansi penting di sekitar Desa Meat</p>
    </div>
    <div class="kontak-grid" data-aos="fade-up">
      @php $kColors = ['red','blue','orange','teal','purple','amber']; @endphp
      @forelse($nomors as $n)
      @php $kc = $kColors[$loop->index % count($kColors)]; @endphp
      <div class="kcard {{ $kc }}">
        <div class="kcard-icon"><i class="{{ $n->ikon ?? 'fas fa-phone' }}"></i></div>
        <div>
          <div class="kcard-lbl">{{ ucfirst($n->kategori) }}</div>
          <div class="kcard-name">{{ $n->nama }}</div>
          <div class="kcard-num">📞 {{ $n->nomor_telepon }}</div>
        </div>
      </div>
      @empty
      <div class="kcard red"><div class="kcard-icon"><i class="fas fa-ambulance"></i></div><div><div class="kcard-lbl">Darurat Medis</div><div class="kcard-name">Ambulans RSUD Balige</div><div class="kcard-num">📞 (0632) 21095</div></div></div>
      <div class="kcard blue"><div class="kcard-icon"><i class="fas fa-shield-alt"></i></div><div><div class="kcard-lbl">Keamanan</div><div class="kcard-name">Polsek Balige</div><div class="kcard-num">📞 (0632) 21110</div></div></div>
      <div class="kcard teal"><div class="kcard-icon"><i class="fas fa-landmark"></i></div><div><div class="kcard-lbl">Pemerintahan</div><div class="kcard-name">Kantor Desa Meat</div><div class="kcard-num">📞 (0632) 21000</div></div></div>
      @endforelse
    </div>

    {{-- Kontak Perangkat Desa --}}
    @if($kontaks->count())
    <div style="margin-top:40px">
      <div class="sec-head" style="margin-bottom:28px"><div class="sec-pill"><i class="fas fa-address-card"></i> Perangkat Desa</div><h2 class="sec-title">Hubungi <span>Perangkat</span></h2></div>
      <div class="kontak-grid" data-aos="fade-up">
        @foreach($kontaks as $k)
        <div class="kcard teal">
          <div class="kcard-icon"><i class="{{ $k->ikon ?? 'fas fa-user' }}"></i></div>
          <div>
            <div class="kcard-lbl">{{ $k->jabatan ?? 'Perangkat Desa' }}</div>
            <div class="kcard-name">{{ $k->nama }}</div>
            @if($k->nomor)<div class="kcard-num">📞 {{ $k->nomor }}</div>@endif
            @if($k->email)<div style="font-size:12px;color:var(--slate);margin-top:2px">✉️ {{ $k->email }}</div>@endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</section>
</div>

{{-- ====== PETA DESA ====== --}}
<section id="peta" class="section section-sand">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-map-marked-alt"></i> Peta Lokasi</div>
      <h2 class="sec-title">Lokasi <span>Desa Meat</span></h2>
      <p class="sec-desc">Desa Meat, Kecamatan Tampahan, Kabupaten Toba, Sumatera Utara</p>
    </div>
      <!-- MAP ( KOSONG) -->
<div id="mapLeaflet"
     style="height:500px; width:100%; border-radius:16px; overflow:hidden;"
     data-lat="2.3106"
     data-lng="99.0046"
     data-nama="Desa Meat"
     data-alamat="Kec. Tampahan, Kab. Toba">
</div>

    </div>
  </section>
</div>

{{-- ====== FOOTER ====== --}}
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="fg-brand">
        <div class="fg-logo">
          <div class="fg-logo-icon">M</div>
          <div class="fg-logo-txt">
            <span class="lt1">{{ $profil->nama_desa ?? 'Desa Meat' }}</span>
            <span class="lt2">🌿 {{ $profil->alamat ? Str::limit($profil->alamat, 40) : 'Kabupaten Toba, Sumatera Utara' }}</span>
          </div>
        </div>
        <p class="fg-desc">Desa Meat adalah desa wisata yang kaya budaya Batak dan keindahan Danau Toba. Berkomitmen memberikan layanan terbaik bagi warga dan wisatawan.</p>
        <div class="fg-socials">
          <a href="#" class="fsc" title="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="fsc" title="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" class="fsc" title="YouTube"><i class="fab fa-youtube"></i></a>
          <a href="#" class="fsc" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>
      <div class="fg-col">
        <h5>Layanan Desa</h5>
        <ul class="fg-links">
          @forelse($layanans->take(5) as $l)
          <li><a href="#layanan-desa"><i class="fas fa-chevron-right"></i> {{ $l->nama }}</a></li>
          @empty
          <li><a href="#layanan-desa"><i class="fas fa-chevron-right"></i> Surat Keterangan</a></li>
          <li><a href="#layanan-desa"><i class="fas fa-chevron-right"></i> Kartu Keluarga</a></li>
          <li><a href="#layanan-desa"><i class="fas fa-chevron-right"></i> Izin Usaha</a></li>
          @endforelse
        </ul>
      </div>
      <div class="fg-col">
        <h5>Navigasi</h5>
        <ul class="fg-links">
          <li><a href="#potensi-wisata"><i class="fas fa-chevron-right"></i> Potensi Wisata</a></li>
          <li><a href="#berita-desa"><i class="fas fa-chevron-right"></i> Berita Desa</a></li>
          <li><a href="#galeri-desa"><i class="fas fa-chevron-right"></i> Galeri</a></li>
          <li><a href="#event-desa"><i class="fas fa-chevron-right"></i> Event</a></li>
          <li><a href="{{ route('login') }}"><i class="fas fa-lock"></i> Admin Login</a></li>
        </ul>
      </div>
      <div class="fg-col">
        <h5>Kontak Desa</h5>
        <ul class="fg-contacts">
          <li><i class="fas fa-map-marker-alt"></i> {{ $profil->alamat ?? 'Desa Meat, Kec. Balige, Kab. Toba, Sumatera Utara' }}</li>
          @if($profil && $profil->no_telepon)<li><i class="fas fa-phone"></i> {{ $profil->no_telepon }}</li>@endif
          @if($profil && $profil->email_desa)<li><i class="fas fa-envelope"></i> {{ $profil->email_desa }}</li>@endif
          <li><i class="fas fa-clock"></i> Senin–Jumat: 08.00–16.00 WIB</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <p>© {{ date('Y') }} {{ $profil->nama_desa ?? 'Desa Meat' }} — Hak Cipta Dilindungi · Dibuat dengan ❤️ untuk Desa Meat</p>
    <div class="fb-links">
      <a href="#">Kebijakan Privasi</a>
      <a href="#">Syarat & Ketentuan</a>
      <a href="{{ route('login') }}">Admin</a>
    </div>
  </div>
</footer>

{{-- ====== FLOATING ELEMENTS ====== --}}
<div class="visit-pill">
  <i class="fas fa-eye vp-icon"></i>
  <span class="vp-label">Kunjungan Hari Ini</span>
  <span class="vp-num" id="vpNum">0</span>
</div>

<div class="frc-panel hub-panel" id="frcPanelHub">
  <h4><i class="fas fa-headset"></i> Hubungi Kami</h4>
  @if($profil && $profil->no_telepon)
  <a class="panel-li" href="tel:{{ $profil->no_telepon }}"><i class="fas fa-phone"></i> Telepon Kantor Desa</a>
  @endif
  @if($profil && $profil->email_desa)
  <a class="panel-li" href="mailto:{{ $profil->email_desa }}"><i class="fas fa-envelope"></i> Email Kantor Desa</a>
  @endif
  <a class="panel-li" href="#kontak-desa"><i class="fas fa-list"></i> Semua Kontak Penting</a>
  <a class="panel-li" href="#peta-desa"><i class="fas fa-map-marker-alt"></i> Lokasi di Peta</a>
</div>
<div class="frc-panel ak-panel" id="frcPanelAk">
  <h4><i class="fas fa-universal-access"></i> Aksesibilitas</h4>
  <div class="font-ctrl">
    <span>Ukuran Font</span>
    <button class="fcsz-btn" onclick="fntSz(-1)">A−</button>
    <button class="fcsz-btn" onclick="fntSz(0)">A</button>
    <button class="fcsz-btn" onclick="fntSz(1)">A+</button>
  </div>
  <button class="akbtn" onclick="toggleHighContrast()"><i class="fas fa-adjust"></i> Kontras Tinggi</button>
  <button class="akbtn" onclick="toggleGrayscale()"><i class="fas fa-circle-half-stroke"></i> Mode Grayscale</button>
  <button class="akbtn" onclick="resetA11y()"><i class="fas fa-undo"></i> Reset Tampilan</button>
</div>
<div class="float-right-cluster" id="floatRightCluster">
  <button class="frc-btn" onclick="toggleFrcPanel('hub')" id="btnHub">
    <i class="fas fa-headset"></i>
    <span class="frc-tip">Hubungi Kami</span>
  </button>
  <button class="frc-btn ak" onclick="toggleFrcPanel('ak')" id="btnAk">
    <i class="fas fa-universal-access"></i>
    <span class="frc-tip">Aksesibilitas</span>
  </button>
</div>

{{-- SEARCH OVERLAY --}}
<div class="srch-overlay" id="srchOvl" onclick="closeSearch(event)">
  <div class="srch-box" onclick="event.stopPropagation()">
    <h3>🔍 Cari Informasi Desa</h3>
    <div class="srch-row">
      <input type="text" class="srch-input" id="srchIn" placeholder="Cari berita, pengumuman, wisata...">
      <button class="srch-go"><i class="fas fa-search"></i></button>
    </div>
    <div class="srch-tags">
      <span class="stag" onclick="srchTag('Berita Desa')">Berita Desa</span>
      <span class="stag" onclick="srchTag('Danau Toba')">Danau Toba</span>
      <span class="stag" onclick="srchTag('Layanan Desa')">Layanan Desa</span>
      <span class="stag" onclick="srchTag('Wisata Meat')">Wisata Meat</span>
    </div>
    <button class="srch-close" onclick="closeSearch()">✕ Tutup Pencarian</button>
  </div>
</div>

{{-- LIGHTBOX --}}
<div class="lbx" id="lbxEl" onclick="closeLbx()">
  <div class="lbx-img" id="lbxImg" onclick="event.stopPropagation()">
    <img loading="lazy" id="lbxImgSrc" src="" alt="">
  </div>
  <button class="lbx-close" onclick="closeLbx()"><i class="fas fa-times"></i></button>
</div>

@section('extra-scripts')

<script>
function initMap(){

  const el = document.getElementById("mapLeaflet");
  if(!el) return;

  if(el._leaflet_id) return;

  const lat = parseFloat(el.dataset.lat) || 2.6845;
  const lng = parseFloat(el.dataset.lng) || 98.9156;
  const nama = el.dataset.nama;
  const alamat = el.dataset.alamat;

  var map = L.map(el).setView([lat, lng], 13);

  L.tileLayer('https://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
  }).addTo(map);

  L.marker([lat, lng])
    .addTo(map)
    .bindPopup("<b>"+nama+"</b><br>"+alamat)
    .openPopup();

  setTimeout(() => {
    map.invalidateSize();
  }, 300);
}

// load awal
window.addEventListener("load", initMap);

// saat pindah menu SPA
window.addEventListener("hashchange", function(){
  setTimeout(initMap, 300);
});
</script>

@endsection


