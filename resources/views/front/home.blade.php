@extends('layouts.app')

@section('body')
<!-- ====== MARQUEE TOP ====== -->
<div class="marquee-bar">
  <div class="marquee-badge">📢 INFO</div>
  <div class="marquee-track" id="mtrack">
    @forelse($pengumumans as $p)
      <span><i class="fas fa-bullhorn"></i> {{ $p->judul }}</span>
    @empty
      <span><i class="fas fa-bullhorn"></i> Selamat datang di Website Desa Wisata Meat</span>
      <span><i class="fas fa-tree"></i> Gotong Royong massal setiap Sabtu pukul 07.00 WIB</span>
    @endforelse
    {{-- Duplikat untuk efek marquee seamless --}}
    @forelse($pengumumans as $p)
      <span><i class="fas fa-bullhorn"></i> {{ $p->judul }}</span>
    @empty
      <span><i class="fas fa-bullhorn"></i> Selamat datang di Website Desa Wisata Meat</span>
      <span><i class="fas fa-tree"></i> Gotong Royong massal setiap Sabtu pukul 07.00 WIB</span>
    @endforelse
  </div>
</div>

<!-- ====== NAVBAR ====== -->
<nav id="navbar">
  <div class="nav-inner">
    <a class="nav-brand" href="{{ route('home') }}">
      <div class="brand-icon">M</div>
      <div class="brand-text">
        <span class="t1">{{ $profil->nama_desa ?? 'Desa Wisata Meat' }}</span>
        <span class="t2">🌿 Kab. Toba, Sumatera Utara</span>
      </div>
    </a>
    <ul class="nav-menu">
      <li><a href="#hero"><i class="fas fa-home fa-xs"></i> Beranda</a></li>
      <li><a href="#profil"><i class="fas fa-landmark fa-xs"></i> Profil Desa</a></li>
      <li><a href="#berita"><i class="fas fa-newspaper fa-xs"></i> Berita</a></li>
      <li><a href="#event"><i class="fas fa-calendar-alt fa-xs"></i> Event</a></li>
      <li><a href="#pengumuman"><i class="fas fa-bullhorn fa-xs"></i> Pengumuman</a></li>
      <li>
        <a href="#">Layanan Desa <i class="fas fa-chevron-down" style="font-size:9px"></i></a>
        <div class="dd-menu">
          <a href="#layanan" onclick="showSection('layanan')"><i class="fas fa-concierge-bell"></i> Layanan Administrasi</a>
          <a href="#kontak" onclick="showSection('kontak')"><i class="fas fa-phone-alt"></i> Kontak Penting</a>
          <a href="#peta" onclick="showSection('peta')"><i class="fas fa-map-marked-alt"></i> Peta Desa</a>
        </div>
      </li>
      <li>
        <a href="#">Info Desa <i class="fas fa-chevron-down" style="font-size:9px"></i></a>
        <div class="dd-menu">
          <a href="#potensi" onclick="showSection('potensi')"><i class="fas fa-mountain"></i> Potensi & Wisata</a>
          <a href="#galeri" onclick="showSection('galeri')"><i class="fas fa-images"></i> Galeri Foto</a>
        </div>
      </li>
    </ul>
    <div class="nav-actions">
      <a href="{{ route('login') }}" class="btn-admin-nav"><i class="fas fa-lock"></i> Admin</a>
    </div>
    <button class="hamburger" id="hamburgerBtn" onclick="toggleDrawer()" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<!-- ====== MOBILE DRAWER ====== -->
<div class="mobile-drawer" id="mobileDrawer" onclick="closeDrawerIfOverlay(event)">
  <div class="drawer-panel">
    <div class="drawer-head">
      <div class="drawer-head-icon">M</div>
      <div>
        <h4>{{ $profil->nama_desa ?? 'Desa Wisata Meat' }}</h4>
        <p>🌿 Kab. Toba, Sumatera Utara</p>
      </div>
      <button class="drawer-close" onclick="toggleDrawer()"><i class="fas fa-times"></i></button>
    </div>
    <nav class="drawer-nav">
      <a href="#hero" onclick="toggleDrawer()"><i class="fas fa-home"></i> Beranda</a>
      <a href="#profil" onclick="toggleDrawer()"><i class="fas fa-landmark"></i> Profil Desa</a>
      <a href="#berita" onclick="toggleDrawer()"><i class="fas fa-newspaper"></i> Berita Desa</a>
      <a href="#event" onclick="toggleDrawer()"><i class="fas fa-calendar-alt"></i> Event & Kegiatan</a>
      <a href="#pengumuman" onclick="toggleDrawer()"><i class="fas fa-bullhorn"></i> Pengumuman</a>
      <div class="drawer-divider"></div>
      <div class="drawer-section">Layanan Desa</div>
      <a href="#layanan" onclick="showSection('layanan');toggleDrawer()"><i class="fas fa-concierge-bell"></i> Layanan Administrasi</a>
      <a href="#kontak" onclick="showSection('kontak');toggleDrawer()"><i class="fas fa-phone-alt"></i> Kontak Penting</a>
      <a href="#peta" onclick="showSection('peta');toggleDrawer()"><i class="fas fa-map-marked-alt"></i> Peta Desa</a>
      <div class="drawer-divider"></div>
      <div class="drawer-section">Info & Potensi Desa</div>
      <a href="#potensi" onclick="showSection('potensi');toggleDrawer()"><i class="fas fa-mountain"></i> Potensi & Wisata</a>
      <a href="#galeri" onclick="showSection('galeri');toggleDrawer()"><i class="fas fa-images"></i> Galeri Foto</a>
    </nav>
    <div class="drawer-footer">
      @if($profil && $profil->no_telepon)
      <a href="tel:{{ $profil->no_telepon }}" class="drawer-phone"><i class="fas fa-phone"></i> Telepon</a>
      @endif
    </div>
  </div>
</div>

<!-- ====== HERO ====== -->
<section id="hero">
  <div class="hero-slides">
    <div class="hero-slide hs1 active"></div>
    <div class="hero-slide hs2"></div>
    <div class="hero-slide hs3"></div>
  </div>
  <div class="hero-inner">
    <div class="hero-badge"><i class="fas fa-map-marker-alt"></i> Kecamatan Balige, Kabupaten Toba</div>
    <h1 class="hero-title">
      Desa Wisata<br><span class="accent">Meat</span>
    </h1>
    <p class="hero-sub">Pesona Danau Toba, Kearifan Lokal Batak, dan Keramahan Masyarakat yang Tak Terlupakan</p>
    <div class="hero-ctas">
      <a href="#potensi" class="cta-primary" onclick="showSection('potensi')"><i class="fas fa-compass"></i> Jelajahi Wisata</a>
      <a href="#profil" class="cta-ghost"><i class="fas fa-info-circle"></i> Profil Desa</a>
    </div>
  </div>
  <button class="hero-prev" onclick="heroSlide(-1)"><i class="fas fa-chevron-left"></i></button>
  <button class="hero-next" onclick="heroSlide(1)"><i class="fas fa-chevron-right"></i></button>
  <div class="hero-dots" id="heroDots">
    <div class="hdot on" onclick="gotoSlide(0)"></div>
    <div class="hdot" onclick="gotoSlide(1)"></div>
    <div class="hdot" onclick="gotoSlide(2)"></div>
  </div>
  <div class="scroll-hint"><div class="scroll-mouse"></div><span>Scroll</span></div>
</section>

<!-- QUICK STRIP -->
<div class="qstrip">
  <a class="qitem" href="#profil">
    <div class="qi-icon"><i class="fas fa-map-marker-alt"></i></div>
    <div class="qi-text"><div class="l1">Lokasi</div><div class="l2">Kec. Balige, Kab. Toba</div></div>
  </a>
  <a class="qitem" href="#layanan" onclick="showSection('layanan')">
    <div class="qi-icon"><i class="fas fa-clock"></i></div>
    <div class="qi-text"><div class="l1">Pelayanan</div><div class="l2">Senin–Jumat 08:00–16:00</div></div>
  </a>
  <a class="qitem" href="tel:{{ $profil->no_telepon ?? '#' }}">
    <div class="qi-icon"><i class="fas fa-phone"></i></div>
    <div class="qi-text"><div class="l1">Telepon Desa</div><div class="l2">{{ $profil->no_telepon ?? '(0632) 21000' }}</div></div>
  </a>
  <a class="qitem" href="mailto:{{ $profil->email_desa ?? '#' }}">
    <div class="qi-icon"><i class="fas fa-envelope"></i></div>
    <div class="qi-text"><div class="l1">Email Desa</div><div class="l2">{{ $profil->email_desa ?? 'info@desameat.id' }}</div></div>
  </a>
</div>

<!-- ====== PROFIL DESA ====== -->
<section id="profil" class="section section-alt">
  <div class="container">
    <div class="profil-grid">
      <div class="profil-img-wrap">
        <div class="profil-main-img">
          @if($profil && $profil->foto_kepala_desa)
            <img src="{{ asset('storage/'.$profil->foto_kepala_desa) }}" alt="Foto Kepala Desa" style="width:100%;height:100%;object-fit:cover;border-radius:20px;">
          @endif
        </div>
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
      <div>
        <div class="sec-pill"><i class="fas fa-landmark"></i> Profil Desa</div>
        <h2 style="font-family:'Playfair Display',serif;font-size:36px;font-weight:700;color:var(--navy);margin-bottom:16px;line-height:1.2">
          Mengenal Lebih Dekat<br><span style="color:var(--forest)">{{ $profil->nama_desa ?? 'Desa Meat' }}</span>
        </h2>
        @if($profil && $profil->sejarah)
          <p style="font-size:14px;color:var(--slate);line-height:1.85;margin-bottom:14px">{{ Str::limit($profil->sejarah, 300) }}</p>
        @else
          <p style="font-size:14px;color:var(--slate);line-height:1.85;margin-bottom:14px">Desa Meat adalah desa wisata yang terletak di Kecamatan Balige, Kabupaten Toba, Provinsi Sumatera Utara. Berada di tepi Danau Toba — danau vulkanik terbesar di dunia — desa ini dikelilingi pemandangan alam yang spektakuler dan kaya budaya Batak Toba.</p>
          <p style="font-size:14px;color:var(--slate);line-height:1.85;margin-bottom:14px">Dengan keunikan adat istiadat, arsitektur Rumah Gorga, musik Gondang Sabangunan, dan Tari Tor-Tor yang memukau, Desa Meat menjadi destinasi wisata budaya unggulan di Kabupaten Toba.</p>
        @endif
        <div class="profil-facts">
          <div class="pf-item"><div class="pfi-icon"><i class="fas fa-ruler-combined"></i></div><div><div class="pfi-lbl">Luas Wilayah</div><div class="pfi-val">{{ $profil->luas_wilayah ?? '15,2 km²' }}</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--teal)"><i class="fas fa-users"></i></div><div><div class="pfi-lbl">Total Penduduk</div><div class="pfi-val">{{ $profil ? number_format($profil->jumlah_penduduk) : '2.856' }} Jiwa</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--amber)"><i class="fas fa-home"></i></div><div><div class="pfi-lbl">Kepala Keluarga</div><div class="pfi-val">{{ $profil ? number_format($profil->jumlah_kk) : '712' }} KK</div></div></div>
          <div class="pf-item"><div class="pfi-icon" style="background:var(--navy)"><i class="fas fa-mountain"></i></div><div><div class="pfi-lbl">Kepala Desa</div><div class="pfi-val">{{ $profil->nama_kepala_desa ?? 'Kepala Desa' }}</div></div></div>
        </div>
        <div style="margin-top:20px;display:flex;gap:12px;flex-wrap:wrap">
          <a href="#peta" class="btn-green" onclick="showSection('peta')"><i class="fas fa-map"></i> Lihat Peta</a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ====== BERITA ====== -->
<section id="berita" class="section section-alt">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-newspaper"></i> Berita Desa</div>
      <h2 class="sec-title">Kabar Terkini <span>Desa Meat</span></h2>
      <p class="sec-desc">Informasi dan perkembangan terbaru dari Desa Wisata Meat</p>
    </div>
    @if($beritas->count())
    <div class="berita-featured">
      <a href="{{ route('berita.detail', $beritas[0]->slug) }}" class="bf-main" style="text-decoration:none">
        <div class="bf-img">
          @if($beritas[0]->gambar)
            <img src="{{ asset('storage/'.$beritas[0]->gambar) }}" alt="{{ $beritas[0]->judul }}">
          @else
            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&q=80" alt="{{ $beritas[0]->judul }}">
          @endif
          <div class="bf-cat">{{ strtoupper($beritas[0]->kategori) }}</div>
        </div>
        <div class="bf-body">
          <h3 class="bf-title">{{ $beritas[0]->judul }}</h3>
          <p class="bf-excerpt">{{ Str::limit(strip_tags($beritas[0]->isi), 150) }}</p>
          <div style="margin-top:12px;font-size:12px;color:var(--slate);display:flex;gap:14px;align-items:center">
            <span><i class="fas fa-user"></i> {{ $beritas[0]->penulis }}</span>
            <span><i class="fas fa-clock"></i> {{ $beritas[0]->published_at ? $beritas[0]->published_at->format('d M Y') : $beritas[0]->created_at->format('d M Y') }}</span>
            <span><i class="fas fa-eye"></i> {{ number_format($beritas[0]->views) }}</span>
          </div>
        </div>
      </a>
      <div class="berita-side">
        @foreach($beritas->skip(1)->take(4) as $b)
        <a href="{{ route('berita.detail', $b->slug) }}" class="bside-item" style="text-decoration:none">
          <div class="bside-img">
            @if($b->gambar)
              <img src="{{ asset('storage/'.$b->gambar) }}" alt="{{ $b->judul }}">
            @else
              <img src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?w=300&q=60" alt="{{ $b->judul }}">
            @endif
          </div>
          <div class="bside-body">
            <div class="bside-title">{{ Str::limit($b->judul, 65) }}</div>
            <div class="bside-date"><i class="fas fa-clock"></i> {{ $b->published_at ? $b->published_at->format('d M Y') : $b->created_at->format('d M Y') }}</div>
          </div>
        </a>
        @endforeach
      </div>
    </div>
    @else
    <p style="text-align:center;color:var(--slate);padding:40px">Belum ada berita yang dipublikasikan.</p>
    @endif
  </div>
</section>

<!-- ====== POTENSI DESA ====== -->
<section id="potensi" class="section" style="background:var(--smoke)">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-mountain"></i> Potensi & Wisata</div>
      <h2 class="sec-title">Pesona <span>Desa Meat</span></h2>
      <p class="sec-desc">Temukan keindahan alam, budaya, dan potensi unggulan Desa Wisata Meat</p>
    </div>
    @if($potensis->count())
    <div class="potensi-grid">
      @foreach($potensis as $p)
      <div class="wcard">
        <div class="wcard-img">
          @if($p->gambar)
            <img src="{{ asset('storage/'.$p->gambar) }}" alt="{{ $p->nama }}">
          @else
            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&q=70" alt="{{ $p->nama }}">
          @endif
          <div class="wcard-overlay"></div>
          @if($p->rating)
          <div class="wcard-rating">⭐ {{ number_format($p->rating,1) }}</div>
          @endif
          <div class="wcard-info">
            <div class="wcard-name">{{ $p->nama }}</div>
          </div>
        </div>
        <div class="wcard-body">
          <p class="wcard-desc">{{ Str::limit($p->deskripsi, 100) }}</p>
          @if($p->lokasi)
          <div style="font-size:12px;color:var(--slate)"><i class="fas fa-map-marker-alt"></i> {{ $p->lokasi }}</div>
          @endif
        </div>
      </div>
      @endforeach
    </div>
    @else
    <p style="text-align:center;color:var(--slate);padding:40px">Belum ada data potensi desa.</p>
    @endif
  </div>
</section>

<!-- ====== GALERI ====== -->
<section id="galeri" class="section section-alt">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-images"></i> Galeri Foto</div>
      <h2 class="sec-title">Momen <span>Desa Meat</span></h2>
      <p class="sec-desc">Koleksi foto keindahan dan aktivitas Desa Wisata Meat</p>
    </div>
    @if($galeris->count())
    <div class="galeri-masonry">
      @foreach($galeris->take(8) as $i => $g)
      <div class="gal-item {{ $i % 5 === 0 ? 'tall' : '' }}">
        <img src="{{ asset('storage/'.$g->gambar) }}" alt="{{ $g->judul }}">
        <div class="gal-item-overlay"><i class="fas fa-search-plus"></i></div>
      </div>
      @endforeach
    </div>
    @else
    <p style="text-align:center;color:var(--slate);padding:40px">Belum ada foto di galeri.</p>
    @endif
  </div>
</section>

<!-- ====== PENGUMUMAN ====== -->
<section id="pengumuman" class="section section-sand">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-bullhorn"></i> Pengumuman</div>
      <h2 class="sec-title">Info <span>Terkini</span></h2>
      <p class="sec-desc">Pengumuman resmi dari Pemerintah Desa Meat</p>
    </div>
    <div style="max-width:760px;margin:0 auto">
      @forelse($pengumumans as $p)
      <div class="peng-item">
        <div class="peng-datebox">
          <div class="pd-day">{{ $p->tanggal ? $p->tanggal->format('d') : $p->created_at->format('d') }}</div>
          <div class="pd-mon">{{ $p->tanggal ? $p->tanggal->format('M Y') : $p->created_at->format('M Y') }}</div>
        </div>
        <div style="flex:1">
          <div class="peng-title">{{ $p->judul }}</div>
          <div class="peng-exc">{{ Str::limit($p->isi, 120) }}</div>
          <div style="margin-top:6px">
            <span style="display:inline-block;padding:2px 10px;border-radius:100px;font-size:10px;font-weight:700;background:rgba(27,94,47,0.1);color:var(--forest)">{{ strtoupper($p->tipe) }}</span>
          </div>
        </div>
      </div>
      @empty
      <p style="text-align:center;color:var(--slate);padding:40px">Belum ada pengumuman aktif.</p>
      @endforelse
    </div>
  </div>
</section>

<!-- ====== LAYANAN ====== -->
<section id="layanan" class="section section-alt">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-concierge-bell"></i> Layanan Desa</div>
      <h2 class="sec-title">Layanan <span>Administrasi</span></h2>
      <p class="sec-desc">Layanan administrasi yang tersedia di Kantor Desa Meat</p>
    </div>
    @if($layanans->count())
    <div class="layanan-grid">
      @foreach($layanans as $l)
      <div class="lay-card">
        <div class="lay-icon {{ $l->warna_ikon ?? 'green' }}">
          <i class="{{ $l->ikon ?? 'fas fa-file-alt' }}"></i>
        </div>
        <div class="lay-body">
          <h4>{{ $l->nama }}</h4>
          <p>{{ Str::limit($l->deskripsi, 80) }}</p>
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="layanan-grid">
      <div class="lay-card"><div class="lay-icon green"><i class="fas fa-id-card"></i></div><div class="lay-body"><h4>KTP & KK</h4><p>Pengurusan KTP elektronik dan Kartu Keluarga</p></div></div>
      <div class="lay-card"><div class="lay-icon teal"><i class="fas fa-file-alt"></i></div><div class="lay-body"><h4>Surat Pengantar</h4><p>Surat keterangan domisili dan pengantar</p></div></div>
      <div class="lay-card"><div class="lay-icon amber"><i class="fas fa-baby"></i></div><div class="lay-body"><h4>Akta Kelahiran</h4><p>Pengurusan akta kelahiran anak</p></div></div>
      <div class="lay-card"><div class="lay-icon slate"><i class="fas fa-landmark"></i></div><div class="lay-body"><h4>Surat Tanah</h4><p>Keterangan kepemilikan lahan dan tanah</p></div></div>
    </div>
    @endif
  </div>
</section>

<!-- ====== EVENT ====== -->
<section id="event" class="section section-teal">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill light"><i class="fas fa-calendar-alt"></i> Event & Kegiatan</div>
      <h2 class="sec-title white">Jadwal <span class="amber">Event</span></h2>
      <p class="sec-desc light">Event dan kegiatan yang akan berlangsung di Desa Meat</p>
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
          <div class="ev-date"><i class="fas fa-calendar"></i> {{ $e->tanggal_mulai ? $e->tanggal_mulai->format('d M Y') : '-' }}</div>
          <div class="ev-name">{{ $e->nama_event }}</div>
          @if($e->lokasi)
          <div class="ev-loc"><i class="fas fa-map-marker-alt"></i> {{ $e->lokasi }}</div>
          @endif
        </div>
      </div>
      @endforeach
    </div>
    @else
    <p style="text-align:center;color:rgba(255,255,255,0.6);padding:40px">Belum ada event yang dijadwalkan.</p>
    @endif
  </div>
</section>

<!-- ====== KONTAK ====== -->
<section id="kontak" class="section section-alt">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-phone-alt"></i> Kontak</div>
      <h2 class="sec-title">Hubungi <span>Kami</span></h2>
      <p class="sec-desc">Kontak perangkat desa yang dapat dihubungi</p>
    </div>
    @if($kontaks->count())
    <div class="kontak-grid">
      @foreach($kontaks as $k)
      <div class="kontak-card">
        <div class="kontak-av"><i class="{{ $k->ikon ?? 'fas fa-user' }}"></i></div>
        <div class="kontak-info">
          <h4>{{ $k->nama }}</h4>
          <p>{{ $k->jabatan }}</p>
          @if($k->nomor)<p><i class="fas fa-phone"></i> {{ $k->nomor }}</p>@endif
        </div>
      </div>
      @endforeach
    </div>
    @else
    <div class="kontak-grid">
      <div class="kontak-card"><div class="kontak-av"><i class="fas fa-user-tie"></i></div><div class="kontak-info"><h4>Kepala Desa</h4><p>{{ $profil->nama_kepala_desa ?? 'Maruli Simanjuntak' }}</p><p><i class="fas fa-phone"></i> {{ $profil->no_telepon ?? '(0632) 21000' }}</p></div></div>
    </div>
    @endif

    <!-- Nomor Penting -->
    @if($nomors->count())
    <div style="margin-top:48px">
      <div class="sec-head" style="margin-bottom:28px">
        <div class="sec-pill"><i class="fas fa-exclamation-circle"></i> Darurat</div>
        <h2 class="sec-title">Nomor <span>Penting</span></h2>
      </div>
      <div class="nomor-grid" style="background:var(--navy);border-radius:20px;padding:28px">
        @foreach($nomors as $n)
        <div class="nomor-card">
          <div class="nomor-icon {{ $n->warna ?? 'teal' }}">
            <i class="{{ $n->ikon ?? 'fas fa-phone' }}"></i>
          </div>
          <div class="nomor-body">
            <h4>{{ $n->nama }}</h4>
            <p>{{ $n->nomor_telepon }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    @endif
  </div>
</section>

<!-- ====== PETA ====== -->
<section id="peta" class="section section-sand">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-map-marked-alt"></i> Peta Lokasi</div>
      <h2 class="sec-title">Lokasi <span>Desa Meat</span></h2>
      <p class="sec-desc">Desa Wisata Meat, Kecamatan Balige, Kabupaten Toba, Sumatera Utara</p>
    </div>
    <div id="map" style="height:420px;border-radius:20px;overflow:hidden;box-shadow:var(--sh-lg)"></div>
  </div>
</section>

<!-- ====== FOOTER ====== -->
<footer>
  <div class="container">
    <div class="footer-grid">
      <div class="footer-brand">
        <h3>{{ $profil->nama_desa ?? 'Desa Wisata Meat' }}</h3>
        <p>Desa wisata yang terletak di tepi Danau Toba, Kecamatan Balige, Kabupaten Toba, Sumatera Utara.</p>
        <div style="margin-top:16px;display:flex;gap:10px">
          <a href="#" style="width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,0.08);color:rgba(255,255,255,0.6);display:flex;align-items:center;justify-content:center;text-decoration:none;transition:all 0.2s"><i class="fab fa-facebook-f" style="font-size:12px"></i></a>
          <a href="#" style="width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,0.08);color:rgba(255,255,255,0.6);display:flex;align-items:center;justify-content:center;text-decoration:none"><i class="fab fa-instagram" style="font-size:12px"></i></a>
          <a href="#" style="width:34px;height:34px;border-radius:50%;background:rgba(255,255,255,0.08);color:rgba(255,255,255,0.6);display:flex;align-items:center;justify-content:center;text-decoration:none"><i class="fab fa-youtube" style="font-size:12px"></i></a>
        </div>
      </div>
      <div>
        <h4>Navigasi</h4>
        <ul>
          <li><a href="#hero">Beranda</a></li>
          <li><a href="#profil">Profil Desa</a></li>
          <li><a href="#berita">Berita</a></li>
          <li><a href="#event">Event</a></li>
          <li><a href="#pengumuman">Pengumuman</a></li>
        </ul>
      </div>
      <div>
        <h4>Layanan</h4>
        <ul>
          <li><a href="#layanan" onclick="showSection('layanan')">Layanan Administrasi</a></li>
          <li><a href="#kontak" onclick="showSection('kontak')">Kontak Penting</a></li>
          <li><a href="#potensi" onclick="showSection('potensi')">Potensi & Wisata</a></li>
          <li><a href="#galeri" onclick="showSection('galeri')">Galeri Foto</a></li>
          <li><a href="{{ route('login') }}">Admin Panel</a></li>
        </ul>
      </div>
      <div>
        <h4>Kontak</h4>
        <ul>
          @if($profil && $profil->alamat)
          <li><a href="#"><i class="fas fa-map-marker-alt"></i> {{ $profil->alamat }}</a></li>
          @else
          <li><a href="#"><i class="fas fa-map-marker-alt"></i> Kec. Balige, Kab. Toba, Sumatera Utara</a></li>
          @endif
          @if($profil && $profil->no_telepon)
          <li><a href="tel:{{ $profil->no_telepon }}"><i class="fas fa-phone"></i> {{ $profil->no_telepon }}</a></li>
          @endif
          @if($profil && $profil->email_desa)
          <li><a href="mailto:{{ $profil->email_desa }}"><i class="fas fa-envelope"></i> {{ $profil->email_desa }}</a></li>
          @endif
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      © {{ date('Y') }} {{ $profil->nama_desa ?? 'Desa Wisata Meat' }} — Semua Hak Dilindungi. Website Resmi Pemerintah Desa Meat.
    </div>
  </div>
</footer>

@endsection

@section('extra-scripts')
<script>
// Hero slideshow
let curSlide = 0;
const slides = document.querySelectorAll('.hero-slide');
const dots = document.querySelectorAll('.hdot');
function gotoSlide(n) {
  slides[curSlide].classList.remove('active');
  dots[curSlide]?.classList.remove('on');
  curSlide = (n + slides.length) % slides.length;
  slides[curSlide].classList.add('active');
  dots[curSlide]?.classList.add('on');
}
function heroSlide(dir) { gotoSlide(curSlide + dir); }
setInterval(() => gotoSlide(curSlide + 1), 5000);

// Section toggle (for hidden sections)
function showSection(id) {
  const el = document.getElementById(id);
  if (el) { el.style.display = ''; setTimeout(() => el.scrollIntoView({behavior:'smooth'}), 50); }
}

// Mobile drawer
function toggleDrawer() {
  document.getElementById('mobileDrawer').classList.toggle('open');
}
function closeDrawerIfOverlay(e) {
  if (e.target === document.getElementById('mobileDrawer')) toggleDrawer();
}

// Navbar scroll
window.addEventListener('scroll', () => {
  document.getElementById('navbar')?.classList.toggle('scrolled', window.scrollY > 60);
});

// Peta Leaflet
const lat  = {{ $profil->lat ?? 2.3356 }};
const lng  = {{ $profil->lng ?? 99.0649 }};
const map  = L.map('map').setView([lat, lng], 13);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap'
}).addTo(map);
L.marker([lat, lng]).addTo(map)
  .bindPopup('<b>{{ $profil->nama_desa ?? "Desa Wisata Meat" }}</b><br>Kec. Balige, Kab. Toba')
  .openPopup();
</script>
@endsection