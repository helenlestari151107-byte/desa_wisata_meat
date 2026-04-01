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

<div style="padding-top:96px;padding-bottom:60px;background:var(--sand);min-height:100vh">
  <div class="container" style="max-width:800px">
    <div style="text-align:center;margin-bottom:40px">
      <div class="sec-pill"><i class="fas fa-bullhorn"></i> Pengumuman</div>
      <h1 class="sec-title">Pengumuman <span>Resmi</span></h1>
    </div>
    @forelse($pengumumans as $p)
    <div class="peng-item">
      <div class="peng-datebox">
        <div class="pd-day">{{ $p->tanggal ? $p->tanggal->format('d') : $p->created_at->format('d') }}</div>
        <div class="pd-mon">{{ $p->tanggal ? $p->tanggal->format('M Y') : $p->created_at->format('M Y') }}</div>
      </div>
      <div style="flex:1">
        <div class="peng-title">{{ $p->judul }}</div>
        <div class="peng-exc">{{ $p->isi }}</div>
        <div style="margin-top:8px">
          <span style="display:inline-block;padding:2px 10px;border-radius:100px;font-size:10px;font-weight:700;background:rgba(27,94,47,0.1);color:var(--forest)">{{ strtoupper($p->tipe) }}</span>
        </div>
      </div>
    </div>
    @empty
    <p style="text-align:center;color:var(--slate);padding:60px">Belum ada pengumuman aktif.</p>
    @endforelse
    <div style="margin-top:20px">{{ $pengumumans->links() }}</div>
  </div>
</div>
@endsection