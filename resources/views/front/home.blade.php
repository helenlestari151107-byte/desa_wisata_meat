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
      <li class="has-dd">
        <a href="#" class="dd-toggle" onclick="toggleDD(event,this)">Info Desa <i class="fas fa-chevron-down" style="font-size:9px"></i></a>
        <div class="dd-menu">
          <a href="#profil-desa"><i class="fas fa-landmark"></i> Profil Desa</a>
          <a href="#struktur-pemerintahan"><i class="fas fa-sitemap"></i> Struktur Pemerintahan</a>
          <a href="#infografis-desa"><i class="fas fa-chart-bar"></i> Infografis Data</a>
          <div class="dd-divider"></div>
          <a href="#galeri-desa"><i class="fas fa-images"></i> Galeri & Video</a>
          <a href="#peta-desa"><i class="fas fa-map-marked-alt"></i> Peta Desa</a>
        </div>
      </li>
      <li class="has-dd">
        <a href="#" class="dd-toggle" onclick="toggleDD(event,this)">Potensi <i class="fas fa-chevron-down" style="font-size:9px"></i></a>
        <div class="dd-menu">
          <a href="#wisata-alam"><i class="fas fa-mountain"></i> Wisata Alam</a>
          <a href="#umkm-desa"><i class="fas fa-store"></i> UMKM Desa</a>
          <a href="#produk-unggulan"><i class="fas fa-box-open"></i> Produk Unggulan</a>
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
      <div class="drawer-section">Potensi</div>
      <a href="#wisata-alam" onclick="toggleDrawer()"><i class="fas fa-mountain"></i> Wisata Alam</a>
      <a href="#umkm-desa" onclick="toggleDrawer()"><i class="fas fa-store"></i> UMKM Desa</a>
      <a href="#produk-unggulan" onclick="toggleDrawer()"><i class="fas fa-box-open"></i> Produk Unggulan</a>
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
  <a class="qitem" href="#peta-desa">
    <div class="qi-icon"><i class="fas fa-map-marker-alt"></i></div>
    <div class="qi-text"><div class="l1">Lokasi</div><div class="l2">Kec. Balige, Kab. Toba</div></div>
  </a>
  <a class="qitem" href="#layanan-desa">
    <div class="qi-icon"><i class="fas fa-clock"></i></div>
    <div class="qi-text"><div class="l1">Pelayanan</div><div class="l2">Senin–Jumat 08:00–16:00</div></div>
  </a>
  <a class="qitem" href="tel:{{ $profil->no_telepon ?? '063221000' }}" onclick="event.stopPropagation()">
    <div class="qi-icon"><i class="fas fa-phone"></i></div>
    <div class="qi-text"><div class="l1">Telepon Desa</div><div class="l2">{{ $profil->no_telepon ?? '(0632) 21000' }}</div></div>
  </a>
  <a class="qitem" href="mailto:{{ $profil->email_desa ?? 'desameat@gmail.com' }}" onclick="event.stopPropagation()">
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
      </div>
      <div data-aos="fade-left" data-aos-delay="100">
        <div class="sec-pill"><i class="fas fa-landmark"></i> Profil Desa</div>
        <h2 style="font-family:'Playfair Display',serif;font-size:22px;font-weight:700;color:var(--navy);margin-bottom:16px;line-height:1.2">Mengenal Lebih Dekat<br><span style="color:var(--forest)">{{ $profil->nama_desa ?? 'Desa Meat' }}</span></h2>
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
            'darurat' => 'Penting',
            'event'   => 'Kegiatan',
            'layanan' => 'Layanan',
            default   => 'Informasi'
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
          <span class="pf-txt">Desa Meat</span>
        </div>
        <div class="profil-float2">
          <i class="fas fa-water"></i>
          <div><span class="pf2-val">Toba</span><span class="pf2-lbl">Tepi Danau Toba</span></div>
        </div>
      </div>
      <div data-aos="fade-left">
        <div class="sec-pill"><i class="fas fa-landmark"></i> Profil Desa</div>
        <h2 style="font-family:'Playfair Display',serif;font-size:28px;font-weight:700;color:var(--navy);margin-bottom:16px;line-height:1.2">Mengenal Lebih Dekat<br><span style="color:var(--forest)">{{ $profil->nama_desa ?? 'Desa Meat' }}</span></h2>
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

{{-- Sejarah Desa di bawah Profil --}}
<section class="section section-alt" style="padding-top:0">
  <div class="container">
    <div style="background:white;border-radius:var(--radius);padding:36px 40px;box-shadow:var(--sh);margin-bottom:32px" data-aos="fade-up">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:20px">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--forest);display:flex;align-items:center;justify-content:center;color:white;font-size:20px"><i class="fas fa-scroll"></i></div>
        <h3 style="font-family:'Playfair Display',serif;font-size:24px;color:var(--navy);margin:0">Sejarah Desa Meat</h3>
      </div>
      <p style="font-size:14px;color:var(--slate);line-height:1.9;margin-bottom:16px">Sekitar 300–350 tahun yang lalu (13–15 generasi) keturunan Sibagot Nipohan mulai turun dari Kecamatan Balige untuk martoba (menangkap ikan) dan di sela-sela waktu martoba digunakan untuk membuka lahan pertanian. Pada awalnya keturunan Sibagot Nipohan tidak menetap di Meat, namun karena perjalanan keluar masuk Meat sangat melelahkan karena naik turun gunung sehingga keturunan Sibagot Nipohan mulai menetap di Meat.</p>
      <p style="font-size:14px;color:var(--slate);line-height:1.9;margin-bottom:16px">Sibagot Nipohan memiliki empat anak yakni: Tuan Sihubil (Tampubolon), Tuan Somanimbil (Siahaan, Simanjuntak, Hutagaol), Tuan Dibangama (Panjaitan, Silitonga, Siagian, Sianipar), dan Sonak Malela (Simangunsong, Marpaung, Napitupulu, Pardede).</p>
      <p style="font-size:14px;color:var(--slate);line-height:1.9;margin-bottom:16px">Keturunan Sibagot Nipohan merupakan penduduk asli desa Meat, namun seiring perkembangan jaman, kini sudah ada marga-marga lain yang tinggal di desa Meat dan mereka rata-rata sonduk hela (menikah dengan keturunan Sibagot Nipohan). Dalam tatanan adat di desa Meat, Horja Sibagot Nipohan yang berhak menetapkan keputusan melalui Tonggo Raja (Rapat tetua adat yang harus terwakili dari ke-4 keturunan Sibagot Nipohan).</p>
      <p style="font-size:14px;color:var(--slate);line-height:1.9;margin-bottom:16px">Pada awalnya desa Meat terdiri dari 3 Kampung yang dipimpin oleh Hampung/Kepala Kampung. Kepala Kampung yang terakhir adalah: Hampung Meat 1 (Conrad Siahaan, Huntal Siahaan, Maja Siahaan), Hampung Meat 2 (Marga Sianipar, Simeon Tampubolon, Oberlin Tampubolon), dan Hampung Meat 3 (Josia Siahaan, Dolok Siahaan, Marincan Siahaan).</p>
      <p style="font-size:14px;color:var(--slate);line-height:1.9">Pada tahun 1988 ketiga kampung tersebut dibentuk menjadi 1 desa yaitu desa Meat yang terdiri dari 3 dusun, dipimpin oleh carteker/pejabat kepala desa Marincan Siahaan hingga tahun 1990. Pada tahun 1990 dilakukan pemilihan kepala desa untuk pertama kalinya.</p>
    </div>

    {{-- Daftar Kepala Desa dari masa ke masa --}}
    <div style="background:white;border-radius:var(--radius);padding:36px 40px;box-shadow:var(--sh)" data-aos="fade-up">
      <div style="display:flex;align-items:center;gap:12px;margin-bottom:24px">
        <div style="width:48px;height:48px;border-radius:12px;background:var(--teal);display:flex;align-items:center;justify-content:center;color:white;font-size:20px"><i class="fas fa-user-tie"></i></div>
        <h3 style="font-family:'Playfair Display',serif;font-size:24px;color:var(--navy);margin:0">Kepala Desa dari Masa ke Masa</h3>
      </div>
      <p style="font-size:13px;color:var(--slate);margin-bottom:20px">Berikut nama-nama Kepala Desa Meat sejak berdiri hingga sekarang:</p>
      <div style="overflow-x:auto">
        <table style="width:100%;border-collapse:collapse;font-size:13px">
          <thead>
            <tr style="background:var(--forest);color:white">
              <th style="padding:12px 16px;text-align:left;border-radius:8px 0 0 0">No</th>
              <th style="padding:12px 16px;text-align:left">Nama</th>
              <th style="padding:12px 16px;text-align:left">Masa Jabatan</th>
              <th style="padding:12px 16px;text-align:left;border-radius:0 8px 0 0">Keterangan</th>
            </tr>
          </thead>
          <tbody>
            <tr style="background:var(--sand)"><td style="padding:11px 16px">1</td><td style="padding:11px 16px;font-weight:600">Marincan Siahaan</td><td style="padding:11px 16px">1988 – 1990</td><td style="padding:11px 16px">Pejabat/Carteker Kepala Desa</td></tr>
            <tr><td style="padding:11px 16px">2</td><td style="padding:11px 16px;font-weight:600">Oberlin Tampubolon</td><td style="padding:11px 16px">1990 – 2003</td><td style="padding:11px 16px">Kepala Desa Meat</td></tr>
            <tr style="background:var(--sand)"><td style="padding:11px 16px">3</td><td style="padding:11px 16px;font-weight:600">Pantur Marpaung</td><td style="padding:11px 16px">2003 – 2013</td><td style="padding:11px 16px">Kepala Desa Meat</td></tr>
            <tr><td style="padding:11px 16px">4</td><td style="padding:11px 16px;font-weight:600">Janri Simanjuntak</td><td style="padding:11px 16px">2013 – Sekarang</td><td style="padding:11px 16px">Kepala Desa Meat</td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
</div>
<div id="page-struktur-pemerintahan" class="site-page" style="display:none">
<section id="info-desa" class="section section-sand">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-info-circle"></i> Info Desa</div>
      <h2 class="sec-title">Informasi Lengkap <span>{{ $profil->nama_desa ?? 'Desa Meat' }}</span></h2>
    </div>
    <div class="info-tabs-wrap" data-aos="fade-up">
      <button class="itab on" onclick="switchITab('bagan',this)"> Struktur Pemerintahan</button>
      <button class="itab" onclick="switchITab('visi',this)">Visi & Misi</button>
    </div>
    <div id="itp-bagan" class="itp on" data-aos="fade-up">
      <div class="bagan-wrap">
        <div class="bagan-row">
          <div class="bagan-box top">
            <div class="bb-title">Kepala Desa</div>
            <div class="bb-name">Janri Simanjuntak</div>
          </div>
        </div>
        <div style="display:flex;justify-content:center"><div style="width:2px;height:28px;background:var(--sand-d)"></div></div>
        <div class="bagan-row" style="margin-bottom:0">
          <div class="bagan-box teal">
            <div class="bb-title">Sekretaris Desa</div>
            <div class="bb-name">Doharni Marpaung</div>
          </div>
        </div>
        <div style="display:flex;justify-content:center"><div style="width:2px;height:28px;background:var(--sand-d)"></div></div>
        <div class="bagan-line-group">
          <div class="bagan-box amber"><div class="bb-title">Kasi Pemerintahan</div><div class="bb-name">Donald Siahaan</div></div>
          <div class="bagan-box"><div class="bb-title">Kasi Kesejahteraan</div><div class="bb-name">Rita Simanjuntak</div></div>
          <div class="bagan-box"><div class="bb-title">Kasi Pelayanan</div><div class="bb-name">Golda Simamora</div></div>
          <div class="bagan-box"><div class="bb-title">Kaur Tata Usaha & Umum</div><div class="bb-name">Masrina Sianturi</div></div>
          <div class="bagan-box amber"><div class="bb-title">Kaur Keuangan</div><div class="bb-name">Tonni Tampubolon</div></div>
          <div class="bagan-box"><div class="bb-title">Kaur Perencanaan</div><div class="bb-name">Jarar Siahaan</div></div>
        </div>
        <div style="display:flex;justify-content:center"><div style="width:2px;height:28px;background:var(--sand-d)"></div></div>
        <div class="bagan-line-group">
          <div class="bagan-box" style="background:var(--green);color:white"><div class="bb-title" style="color:rgba(255,255,255,0.7)">Kepala Dusun 1</div><div class="bb-name" style="color:white">Desi P. Simanjuntak</div></div>
          <div class="bagan-box" style="background:var(--green);color:white"><div class="bb-title" style="color:rgba(255,255,255,0.7)">Kepala Dusun 2</div><div class="bb-name" style="color:white">Hellen Simanjuntak</div></div>
          <div class="bagan-box" style="background:var(--green);color:white"><div class="bb-title" style="color:rgba(255,255,255,0.7)">Kepala Dusun 3</div><div class="bb-name" style="color:white">Haposan Siahaan</div></div>
        </div>
      </div>
    </div>
    <div id="itp-visi" class="itp" data-aos="fade-up">
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:28px">
        <div style="background:white;border-radius:var(--radius);padding:32px;box-shadow:var(--sh);border-top:4px solid var(--forest)">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px"><div style="width:48px;height:48px;border-radius:12px;background:var(--forest);display:flex;align-items:center;justify-content:center;color:white;font-size:22px"><i class="fas fa-eye"></i></div><h3 style="font-family:'Playfair Display',serif;font-size:22px;color:var(--navy)">Visi</h3></div>
          <p style="font-size:15px;color:var(--navy);font-style:italic;line-height:1.75;font-family:'Playfair Display',serif">"Mewujudkan Desa Meat Maju Ekonomi, Aman, Tenteram, Mandiri dan Bermartabat"</p>
        </div>
        <div style="background:white;border-radius:var(--radius);padding:32px;box-shadow:var(--sh);border-top:4px solid var(--teal)">
          <div style="display:flex;align-items:center;gap:12px;margin-bottom:18px"><div style="width:48px;height:48px;border-radius:12px;background:var(--teal);display:flex;align-items:center;justify-content:center;color:white;font-size:22px"><i class="fas fa-bullseye"></i></div><h3 style="font-family:'Playfair Display',serif;font-size:22px;color:var(--navy)">Misi</h3></div>
          <div style="font-size:14px;color:var(--slate);line-height:1.85">
            <div style="margin-bottom:8px"><i class="fas fa-check-circle" style="color:var(--forest);margin-right:6px"></i>Meningkatkan Kinerja Pemerintah Desa</div>
            <div style="margin-bottom:8px"><i class="fas fa-check-circle" style="color:var(--forest);margin-right:6px"></i>Mempertahankan Batas Wilayah</div>
            <div style="margin-bottom:8px"><i class="fas fa-check-circle" style="color:var(--forest);margin-right:6px"></i>Mewujudkan Desa Wisata berbasis Potensi Desa</div>
            <div style="margin-bottom:8px"><i class="fas fa-check-circle" style="color:var(--forest);margin-right:6px"></i>Meningkatkan SDM</div>
            <div><i class="fas fa-check-circle" style="color:var(--forest);margin-right:6px"></i>Meningkatkan Potensi Pertanian</div>
          </div>
        </div>
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
      <div class="ig-card"><div class="ig-icon"><i class="fas fa-users"></i></div><div class="ig-num" id="ig1">799</div><div class="ig-lbl">Total Penduduk</div></div>
      <div class="ig-card"><div class="ig-icon"><i class="fas fa-male"></i></div><div class="ig-num" id="ig2">408</div><div class="ig-lbl">Laki-laki</div></div>
      <div class="ig-card"><div class="ig-icon"><i class="fas fa-female"></i></div><div class="ig-num" id="ig3">391</div><div class="ig-lbl">Perempuan</div></div>
      <div class="ig-card"><div class="ig-icon"><i class="fas fa-home"></i></div><div class="ig-num" id="ig4">232</div><div class="ig-lbl">Kepala Keluarga</div></div>
    </div>
    <div class="charts-grid" data-aos="fade-up">
      <div class="chart-card">
        <h4><i class="fas fa-map-marker-alt"></i> Penduduk per Dusun</h4>
        <div class="bar-row"><div class="bar-lbl">Dusun 1</div><div class="bar-track"><div class="bar-fill green" style="width:0" data-w="{{ round(333/799*100) }}%"></div></div><div class="bar-val">333 Jiwa</div></div>
        <div class="bar-row"><div class="bar-lbl">Dusun 2</div><div class="bar-track"><div class="bar-fill teal" style="width:0" data-w="{{ round(190/799*100) }}%"></div></div><div class="bar-val">190 Jiwa</div></div>
        <div class="bar-row"><div class="bar-lbl">Dusun 3</div><div class="bar-track"><div class="bar-fill amber" style="width:0" data-w="{{ round(276/799*100) }}%"></div></div><div class="bar-val">276 Jiwa</div></div>
      </div>
      <div class="chart-card">
        <h4><i class="fas fa-users"></i> Kepala Keluarga per Dusun</h4>
        <div class="bar-row"><div class="bar-lbl">Dusun 1</div><div class="bar-track"><div class="bar-fill green" style="width:0" data-w="{{ round(100/232*100) }}%"></div></div><div class="bar-val">100 KK</div></div>
        <div class="bar-row"><div class="bar-lbl">Dusun 2</div><div class="bar-track"><div class="bar-fill teal" style="width:0" data-w="{{ round(53/232*100) }}%"></div></div><div class="bar-val">53 KK</div></div>
        <div class="bar-row"><div class="bar-lbl">Dusun 3</div><div class="bar-track"><div class="bar-fill amber" style="width:0" data-w="{{ round(79/232*100) }}%"></div></div><div class="bar-val">79 KK</div></div>
      </div>
      <div class="chart-card">
        <h4><i class="fas fa-venus-mars"></i> Rasio Gender</h4>
        <div class="donut-wrap">
          <svg width="90" height="90" viewBox="0 0 90 90">
            <circle cx="45" cy="45" r="34" fill="none" stroke="rgba(255,255,255,0.07)" stroke-width="14"/>
            <circle cx="45" cy="45" r="34" fill="none" stroke="#4CAF73" stroke-width="14" stroke-dasharray="{{ round(408/799*214) }} {{ round(391/799*214) }}" stroke-dashoffset="22" stroke-linecap="round"/>
            <circle cx="45" cy="45" r="34" fill="none" stroke="#F4C262" stroke-width="14" stroke-dasharray="{{ round(391/799*214) }} {{ round(408/799*214) }}" stroke-dashoffset="-{{ round(408/799*214)-22 }}" stroke-linecap="round"/>
            <text x="45" y="50" text-anchor="middle" fill="white" font-size="13" font-weight="700" font-family="Playfair Display">51%</text>
          </svg>
          <div class="donut-legend">
            <div class="dleg"><div class="dleg-dot" style="background:#4CAF73"></div>Laki-laki 51% (408)</div>
            <div class="dleg"><div class="dleg-dot" style="background:#F4C262"></div>Perempuan 49% (391)</div>
          </div>
        </div>
        <div class="bar-row"><div class="bar-lbl">0–5 thn</div><div class="bar-track"><div class="bar-fill green" style="width:0" data-w="{{ round(52/799*100) }}%"></div></div><div class="bar-val">52 Jiwa</div></div>
        <div class="bar-row"><div class="bar-lbl">6–12 thn</div><div class="bar-track"><div class="bar-fill amber" style="width:0" data-w="{{ round(91/799*100) }}%"></div></div><div class="bar-val">91 Jiwa</div></div>
        <div class="bar-row"><div class="bar-lbl">13–16 thn</div><div class="bar-track"><div class="bar-fill teal" style="width:0" data-w="{{ round(80/799*100) }}%"></div></div><div class="bar-val">80 Jiwa</div></div>
        <div class="bar-row"><div class="bar-lbl">17+ thn</div><div class="bar-track"><div class="bar-fill terracot" style="width:0" data-w="{{ round(576/799*100) }}%"></div></div><div class="bar-val">576 Jiwa</div></div>
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
      <button class="wfbtn" onclick="filterWisata('wisata',this)">Wisata Alam</button>
      <button class="wfbtn" onclick="filterWisata('budaya',this)">Wisata Budaya</button>
      <button class="wfbtn" onclick="filterWisata('kerajinan',this)">Kerajinan</button>
      <button class="wfbtn" onclick="filterWisata('kuliner',this)">Kuliner</button>
      <button class="wfbtn" onclick="filterWisata('pertanian',this)">Pertanian</button>
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

{{-- ====== WISATA BUDAYA ====== --}}
<div id="page-wisata-budaya" class="site-page" style="display:none">
<section id="wisata-budaya" class="section section-sand">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill"><i class="fas fa-drum"></i> Wisata Budaya</div>
      <h2 class="sec-title">Wisata Budaya <span>Desa Meat</span></h2>
      <p class="sec-desc">Kekayaan budaya Batak Toba yang terjaga dan menjadi daya tarik wisata Desa Meat</p>
    </div>
    <div class="wisata-grid" data-aos="fade-up">
      @forelse($potensis->where('kategori','budaya') as $p)
      <div class="wcard">
        <div class="wcard-img">
          @if($p->gambar)
            <img loading="lazy" src="{{ Storage::url($p->gambar) }}" alt="{{ $p->nama }}">
          @else
            <img loading="lazy" src="https://images.unsplash.com/photo-1593642632559-0c6d3fc62b89?w=600&q=80" alt="{{ $p->nama }}">
          @endif
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Budaya</div>
          <div class="wcard-info">
            <div class="wcard-name">{{ $p->nama }}</div>
            @if($p->lokasi)<div class="wcard-loc"><i class="fas fa-map-marker-alt"></i> {{ $p->lokasi }}</div>@endif
          </div>
        </div>
        <div class="wcard-body">
          <div class="wcard-desc">{{ Str::limit($p->deskripsi, 120) }}</div>
        </div>
      </div>
      @empty
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1601925228008-52ee5e6e0949?w=600&q=80" alt="Gondang Batak">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Budaya</div>
          <div class="wcard-info"><div class="wcard-name">Gondang Batak</div><div class="wcard-loc"><i class="fas fa-map-marker-alt"></i> Desa Meat</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Pertunjukan musik tradisional Gondang Batak yang memukau dengan alat musik khas Batak Toba</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="Ulos Batak">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Budaya</div>
          <div class="wcard-info"><div class="wcard-name">Tenun Ulos Batak</div><div class="wcard-loc"><i class="fas fa-map-marker-alt"></i> Desa Meat</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Tradisi menenun kain Ulos yang diwariskan turun-temurun sebagai simbol budaya Batak Toba</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=600&q=80" alt="Tor Tor">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Budaya</div>
          <div class="wcard-info"><div class="wcard-name">Tari Tor-Tor</div><div class="wcard-loc"><i class="fas fa-map-marker-alt"></i> Desa Meat</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Tarian adat Batak yang penuh makna filosofis dan biasa dipertunjukkan pada upacara adat</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&q=80" alt="Rumah Adat">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Budaya</div>
          <div class="wcard-info"><div class="wcard-name">Rumah Adat Batak</div><div class="wcard-loc"><i class="fas fa-map-marker-alt"></i> Desa Meat</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Rumah tradisional Batak Toba dengan arsitektur khas yang masih terpelihara di Desa Meat</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1551632811-561732d1e306?w=600&q=80" alt="Upacara Adat">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Budaya</div>
          <div class="wcard-info"><div class="wcard-name">Upacara Adat Batak</div><div class="wcard-loc"><i class="fas fa-map-marker-alt"></i> Desa Meat</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Berbagai upacara adat yang masih dilaksanakan oleh masyarakat Desa Meat sebagai warisan leluhur</div></div>
      </div>
      @endforelse
    </div>
  </div>
</section>
</div>

{{-- ====== UMKM DESA ====== --}}
<div id="page-umkm-desa" class="site-page" style="display:none">
<section id="umkm-desa" class="section section-alt">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill" style="background:rgba(200,150,62,0.1);color:var(--amber)"><i class="fas fa-store"></i> UMKM Desa</div>
      <h2 class="sec-title">UMKM <span>Desa Meat</span></h2>
      <p class="sec-desc">Usaha Mikro Kecil Menengah yang berkembang dan menjadi tulang punggung perekonomian Desa Meat</p>
    </div>
    <div class="layanan-grid" data-aos="fade-up">
      @forelse($potensis->where('kategori','umkm') as $p)
      <div class="lcard">
        <div class="lcard-icon l-amber"><i class="{{ $p->ikon ?? 'fas fa-store' }}"></i></div>
        <div class="lcard-title">{{ $p->nama }}</div>
        <div class="lcard-desc">{{ Str::limit($p->deskripsi, 100) }}</div>
      </div>
      @empty
      <div class="lcard"><div class="lcard-icon l-amber"><i class="fas fa-fish"></i></div><div class="lcard-title">Pengolahan Ikan Danau</div><div class="lcard-desc">Usaha pengolahan ikan dari Danau Toba menjadi produk olahan bernilai tinggi</div></div>
      <div class="lcard"><div class="lcard-icon l-green"><i class="fas fa-leaf"></i></div><div class="lcard-title">Pertanian Organik</div><div class="lcard-desc">Pertanian organik yang memanfaatkan lahan subur di sekitar Danau Toba</div></div>
      <div class="lcard"><div class="lcard-icon l-teal"><i class="fas fa-cut"></i></div><div class="lcard-title">Kerajinan Tenun Ulos</div><div class="lcard-desc">Usaha pembuatan kain Ulos tradisional Batak yang dipasarkan ke berbagai daerah</div></div>
      <div class="lcard"><div class="lcard-icon l-navy"><i class="fas fa-utensils"></i></div><div class="lcard-title">Kuliner Tradisional</div><div class="lcard-desc">Usaha kuliner makanan khas Batak Toba yang menjadi daya tarik wisatawan</div></div>
      <div class="lcard"><div class="lcard-icon l-amber"><i class="fas fa-ship"></i></div><div class="lcard-title">Wisata Perahu</div><div class="lcard-desc">Jasa wisata perahu di Danau Toba yang dikelola masyarakat setempat</div></div>
      <div class="lcard"><div class="lcard-icon l-green"><i class="fas fa-home"></i></div><div class="lcard-title">Homestay Desa</div><div class="lcard-desc">Penginapan rumah warga yang menawarkan pengalaman menginap autentik di desa wisata</div></div>
      <div class="lcard"><div class="lcard-icon l-teal"><i class="fas fa-shopping-bag"></i></div><div class="lcard-title">Souvenir & Kerajinan</div><div class="lcard-desc">Toko oleh-oleh khas Desa Meat yang menjual souvenir dan kerajinan tangan lokal</div></div>
      <div class="lcard"><div class="lcard-icon l-navy"><i class="fas fa-seedling"></i></div><div class="lcard-title">Budidaya Ikan</div><div class="lcard-desc">Keramba ikan di Danau Toba yang dikelola kelompok tani nelayan Desa Meat</div></div>
      @endforelse
    </div>
  </div>
</section>
</div>

{{-- ====== PRODUK UNGGULAN ====== --}}
<div id="page-produk-unggulan" class="site-page" style="display:none">
<section id="produk-unggulan" class="section section-sand">
  <div class="container">
    <div class="sec-head" data-aos="fade-up">
      <div class="sec-pill" style="background:rgba(0,109,119,0.1);color:var(--teal)"><i class="fas fa-box-open"></i> Produk Unggulan</div>
      <h2 class="sec-title">Produk Unggulan <span>Desa Meat</span></h2>
      <p class="sec-desc">Produk-produk unggulan khas Desa Meat yang telah dikenal dan diminati pasar</p>
    </div>
    <div class="wisata-grid" data-aos="fade-up">
      @forelse($potensis->where('kategori','produk') as $p)
      <div class="wcard">
        <div class="wcard-img">
          @if($p->gambar)
            <img loading="lazy" src="{{ Storage::url($p->gambar) }}" alt="{{ $p->nama }}">
          @else
            <img loading="lazy" src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=600&q=80" alt="{{ $p->nama }}">
          @endif
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Produk</div>
          <div class="wcard-info"><div class="wcard-name">{{ $p->nama }}</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">{{ Str::limit($p->deskripsi, 120) }}</div></div>
      </div>
      @empty
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1519708227418-c8fd9a32b7a2?w=600&q=80" alt="Ikan Bakar">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Kuliner</div>
          <div class="wcard-info"><div class="wcard-name">Ikan Bakar Danau Toba</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Ikan segar dari Danau Toba yang diolah dengan bumbu khas Batak, menjadi kuliner favorit wisatawan</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt="Kain Ulos">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Kerajinan</div>
          <div class="wcard-info"><div class="wcard-name">Kain Ulos Batak</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Kain tenun tradisional Batak yang dibuat dengan teknik turun-temurun, memiliki nilai seni dan budaya tinggi</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1497534446932-c925b458314e?w=600&q=80" alt="Kopi Batak">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Pertanian</div>
          <div class="wcard-info"><div class="wcard-name">Kopi Arabika Batak</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Kopi arabika berkualitas tinggi yang ditanam di dataran tinggi sekitar Danau Toba dengan cita rasa khas</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?w=600&q=80" alt="Kerajinan Kayu">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Kerajinan</div>
          <div class="wcard-info"><div class="wcard-name">Ukiran Kayu Batak</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Hasil ukiran kayu khas Batak yang menggambarkan motif tradisional, dijual sebagai souvenir khas desa</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1567306301408-9b74779a11af?w=600&q=80" alt="Sayuran Segar">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Pertanian</div>
          <div class="wcard-info"><div class="wcard-name">Sayuran Organik Segar</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Sayuran organik segar yang ditanam di lahan subur Desa Meat dan dipasarkan ke pasar lokal</div></div>
      </div>
      <div class="wcard">
        <div class="wcard-img">
          <img loading="lazy" src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=600&q=80" alt="Naniura">
          <div class="wcard-overlay"></div>
          <div class="wcard-badge">Kuliner</div>
          <div class="wcard-info"><div class="wcard-name">Naniura & Arsik</div></div>
        </div>
        <div class="wcard-body"><div class="wcard-desc">Masakan khas Batak Toba berbahan ikan Danau Toba yang diolah dengan bumbu khas rempah lokal</div></div>
      </div>
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
      <button class="gfbtn" onclick="filterGaleri('alam',this)">Alam</button>
      <button class="gfbtn" onclick="filterGaleri('budaya',this)">Budaya</button>
      <button class="gfbtn" onclick="filterGaleri('event',this)">Event</button>
      <button class="gfbtn" onclick="filterGaleri('kuliner',this)">Kuliner</button>
      <button class="gfbtn" onclick="filterGaleri('infrastruktur',this)">Infrastruktur</button>
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
<div id="page-peta-desa" class="site-page" style="display:none">

<section id="peta" class="section section-sand">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-map-marked-alt"></i> Peta Lokasi</div>
      <h2 class="sec-title">Lokasi <span>Desa Meat</span></h2>
      <p class="sec-desc">Desa Meat, Kecamatan Tampahan, Kabupaten Toba, Sumatera Utara</p>
    </div>
    
    <!-- PETA GOOGLE MAPS SATELIT DESA MEAT -->
<div style="position:relative;border-radius:16px;overflow:hidden;box-shadow:var(--sh-lg)">
  <a href="https://maps.app.goo.gl/g4i8tqBBm4qRm5Ug9" target="_blank" rel="noopener" title="Buka di Google Maps" style="display:block;position:absolute;inset:0;z-index:10;cursor:pointer"></a>
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d999.4133!2d99.00364116428517!3d2.3255356548046326!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMsKwMTknMzIuMCJOIDk5wrAwMCcxMy4xIkU!5e1!3m2!1sid!2sid!4v1699999999999!5m2!1sid!2sid"
    width="100%"
    height="500"
    style="border:0;display:block;filter:brightness(0.97)"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
  <!-- Overlay info card -->
  <div style="position:absolute;bottom:20px;left:20px;z-index:20;background:white;border-radius:12px;padding:14px 18px;box-shadow:0 4px 24px rgba(0,0,0,0.2);display:flex;align-items:center;gap:12px;pointer-events:none">
    <div style="width:40px;height:40px;border-radius:50%;background:var(--forest);display:flex;align-items:center;justify-content:center;flex-shrink:0">
      <i class="fas fa-map-marker-alt" style="color:white;font-size:18px"></i>
    </div>
    <div>
      <div style="font-weight:700;font-size:13px;color:var(--navy)">Desa Meat</div>
      <div style="font-size:11px;color:var(--slate)">Kec. Balige, Kab. Toba, Sumatera Utara</div>
    </div>
  </div>
  <!-- Open in Maps button -->
  <a href="https://maps.app.goo.gl/g4i8tqBBm4qRm5Ug9" target="_blank" rel="noopener"
     style="position:absolute;top:16px;right:16px;z-index:20;background:var(--forest);color:white;padding:8px 16px;border-radius:50px;font-size:12px;font-weight:700;text-decoration:none;display:flex;align-items:center;gap:6px;box-shadow:0 2px 10px rgba(0,0,0,0.3)">
    <i class="fas fa-external-link-alt"></i> Buka Google Maps
  </a>
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

<div class="frc-panel hub-panel" id="frcPanelHub">
  <h4><i class="fas fa-headset"></i> Hubungi Kami</h4>
  @if($profil && $profil->no_telepon)
  <a class="panel-li" href="tel:{{ $profil->no_telepon }}"><i class="fas fa-phone"></i> Telepon Kantor Desa</a>
  @endif
  @if($profil && $profil->email_desa)
  <a class="panel-li" href="mailto:{{ $profil->email_desa }}"><i class="fas fa-envelope"></i> Email Kantor Desa</a>
  @endif
  <a class="panel-li" href="#kontak-desa"><i class="fas fa-list"></i> Semua Kontak Penting</a>
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


