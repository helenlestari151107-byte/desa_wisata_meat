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
    <ul class="nav-menu" style="display:flex">
      <li><a href="{{ route('home') }}"><i class="fas fa-home fa-xs"></i> Beranda</a></li>
      <li><a href="{{ route('berita.index') }}"><i class="fas fa-newspaper fa-xs"></i> Berita</a></li>
      <li><a href="{{ route('event.index') }}" class="nav-active"><i class="fas fa-calendar-alt fa-xs"></i> Event</a></li>
      <li><a href="{{ route('pengumuman.index') }}"><i class="fas fa-bullhorn fa-xs"></i> Pengumuman</a></li>
    </ul>
    <a href="{{ route('home') }}" class="btn-admin-nav"><i class="fas fa-arrow-left"></i> Beranda</a>
  </div>
</nav>

<div class="page-breadcrumb">
  <div class="container">
    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a>
    <span class="bc-sep">/</span>
    <span class="bc-current">Event & Kegiatan</span>
  </div>
</div>

<section class="section section-navy" style="padding-top:40px">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill light"><i class="fas fa-calendar-alt"></i> Kalender Event</div>
      <h1 class="sec-title white">Event & Kegiatan <span class="amber">Desa Meat</span></h1>
      <p class="sec-desc light">Agenda kegiatan dan festival yang akan datang di Desa Meat</p>
    </div>

    @if($events->count())
    <div class="event-grid">
      @php $evColors = ['amber','teal','forest','terracot','navy','slate']; @endphp
      @foreach($events as $e)
      <div class="evcard">
        <div class="evcard-top evt-{{ $evColors[$loop->index % count($evColors)] }}">
          <div class="evcard-date">{{ $e->tanggal_mulai->format('d') }}</div>
          <div class="evcard-month">{{ $e->tanggal_mulai->format('F Y') }}</div>
          <div class="evcard-icon">📅</div>
        </div>
        <div class="evcard-body">
          <div class="evcard-title">{{ $e->nama_event }}</div>
          <div class="evcard-loc"><i class="fas fa-map-marker-alt"></i> {{ $e->lokasi ?? 'Desa Meat' }}</div>
          @if($e->tanggal_selesai && $e->tanggal_selesai != $e->tanggal_mulai)
          <div class="evcard-loc" style="margin-bottom:8px"><i class="fas fa-calendar-check"></i> s/d {{ $e->tanggal_selesai->format('d M Y') }}</div>
          @endif
          <div class="evcard-desc">{{ Str::limit($e->deskripsi ?? '', 120) }}</div>
        </div>
      </div>
      @endforeach
    </div>
    <div style="margin-top:32px;display:flex;justify-content:center">{{ $events->links() }}</div>
    @else
    <div style="text-align:center;padding:80px 0;color:rgba(255,255,255,0.5)">
      <i class="fas fa-calendar-alt" style="font-size:48px;opacity:0.2;display:block;margin-bottom:16px"></i>
      <p>Belum ada event yang dijadwalkan.</p>
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
