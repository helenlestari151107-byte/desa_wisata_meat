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
      <li><a href="{{ route('home') }}#beranda"><i class="fas fa-home fa-xs"></i> Beranda</a></li>
      <li><a href="{{ route('home') }}#profil-desa">Info Desa</a></li>
      <li><a href="{{ route('home') }}#potensi-wisata">Potensi</a></li>
      <li><a href="{{ route('berita.index') }}"><i class="fas fa-newspaper fa-xs"></i> Berita</a></li>
      <li><a href="{{ route('pengumuman.index') }}" class="nav-active"><i class="fas fa-bullhorn fa-xs"></i> Pengumuman</a></li>
      <li><a href="{{ route('home') }}#layanan-desa"><i class="fas fa-concierge-bell fa-xs"></i> Layanan</a></li>
      <li><a href="{{ route('event.index') }}"><i class="fas fa-calendar-alt fa-xs"></i> Event</a></li>
    </ul>
    <a href="{{ route('home') }}" class="btn-admin-nav"><i class="fas fa-arrow-left"></i> Beranda</a>
  </div>
</nav>

<div class="page-breadcrumb">
  <div class="container">
    <a href="{{ route('home') }}"><i class="fas fa-home"></i> Beranda</a>
    <span class="bc-sep">/</span>
    <span class="bc-current">Pengumuman Resmi</span>
  </div>
</div>

<section class="section section-sand" style="padding-top:40px">
  <div class="container">
    <div class="sec-head">
      <div class="sec-pill"><i class="fas fa-bullhorn"></i> Pengumuman</div>
      <h1 class="sec-title">Pengumuman <span>Resmi Desa</span></h1>
      <p class="sec-desc">Informasi dan pengumuman resmi dari Pemerintah Desa Meat</p>
    </div>

    <div style="max-width:760px;margin:0 auto">
      @forelse($pengumumans as $p)
      @php
        $tc  = match($p->tipe){'darurat'=>'urgent','event'=>'event','layanan'=>'layanan',default=>'info'};
        $tc2 = match($p->tipe){'darurat'=>'pt-urgent','event'=>'pt-event','layanan'=>'pt-layanan',default=>'pt-info'};
        $tl  = match($p->tipe){'darurat'=>'🔴 Penting','event'=>'🟢 Kegiatan','layanan'=>'🩵 Layanan',default=>'🔵 Informasi'};
      @endphp
      <div class="peng-item {{ $tc }}" style="margin-bottom:14px">
        <div class="peng-datebox">
          <span class="peng-day">{{ $p->tanggal->format('d') }}</span>
          <span class="peng-mon">{{ $p->tanggal->format('M') }}</span>
        </div>
        <div style="flex:1">
          <span class="ptag {{ $tc2 }}">{{ $tl }}</span>
          <div class="peng-title" style="font-size:16px;margin-top:4px">{{ $p->judul }}</div>
          <div class="peng-text" style="margin-top:6px;line-height:1.65">{{ $p->isi }}</div>
          @if($p->berakhir_pada)
          <div style="margin-top:8px;font-size:11px;color:var(--slate)"><i class="fas fa-calendar-check"></i> Berlaku hingga: {{ $p->berakhir_pada->format('d M Y') }}</div>
          @endif
        </div>
      </div>
      @empty
      <div style="text-align:center;padding:80px 0;color:var(--slate)">
        <i class="fas fa-bullhorn" style="font-size:48px;opacity:0.2;display:block;margin-bottom:16px"></i>
        <p>Belum ada pengumuman aktif saat ini.</p>
      </div>
      @endforelse

      <div style="margin-top:24px;display:flex;justify-content:center">{{ $pengumumans->links() }}</div>
    </div>
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
