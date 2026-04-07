@extends('layouts.admin')
@section('page-title','Dashboard')
@section('content')

<div class="stat-grid">
  <div class="stat-card green">
    <div class="sc-icon"><i class="fas fa-newspaper"></i></div>
    <div class="sc-num">{{ $stats['berita'] }}</div>
    <div class="sc-lbl">Total Berita</div>
  </div>
  <div class="stat-card teal">
    <div class="sc-icon"><i class="fas fa-mountain"></i></div>
    <div class="sc-num">{{ $stats['potensi'] }}</div>
    <div class="sc-lbl">Potensi Desa</div>
  </div>
  <div class="stat-card amber">
    <div class="sc-icon"><i class="fas fa-images"></i></div>
    <div class="sc-num">{{ $stats['galeri'] }}</div>
    <div class="sc-lbl">Foto Galeri</div>
  </div>
  <div class="stat-card red">
    <div class="sc-icon"><i class="fas fa-calendar-alt"></i></div>
    <div class="sc-num">{{ $stats['event'] }}</div>
    <div class="sc-lbl">Event</div>
  </div>
</div>

{{-- Row 2 extra stats --}}
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px">
  <div class="card" style="margin:0;padding:16px 20px;display:flex;align-items:center;gap:14px">
    <div style="width:44px;height:44px;background:#dcfce7;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;color:var(--green);flex-shrink:0"><i class="fas fa-bullhorn"></i></div>
    <div><div style="font-size:24px;font-weight:800;color:var(--green)">{{ $stats['pengumuman'] }}</div><div style="font-size:12px;color:var(--slate)">Pengumuman</div></div>
  </div>
  <div class="card" style="margin:0;padding:16px 20px;display:flex;align-items:center;gap:14px">
    <div style="width:44px;height:44px;background:#ccfbf1;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;color:var(--teal);flex-shrink:0"><i class="fas fa-concierge-bell"></i></div>
    <div><div style="font-size:24px;font-weight:800;color:var(--teal)">{{ $stats['layanan'] }}</div><div style="font-size:12px;color:var(--slate)">Layanan Desa</div></div>
  </div>
  <div class="card" style="margin:0;padding:16px 20px;display:flex;align-items:center;gap:14px">
    <div style="width:44px;height:44px;background:#fef9c3;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:20px;color:var(--amber);flex-shrink:0"><i class="fas fa-eye"></i></div>
    <div><div style="font-size:24px;font-weight:800;color:var(--amber)">{{ number_format(\App\Models\Berita::sum('views')) }}</div><div style="font-size:12px;color:var(--slate)">Total Views Berita</div></div>
  </div>
</div>

{{-- Quick Actions --}}
<div class="card" style="margin-bottom:20px">
  <div class="card-head"><h2><i class="fas fa-bolt" style="color:var(--amber)"></i> Aksi Cepat</h2></div>
  <div class="card-body" style="display:flex;gap:10px;flex-wrap:wrap">
    <a href="{{ route('admin.berita.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah Berita</a>
    <a href="{{ route('admin.potensi.create') }}" class="btn btn-teal"><i class="fas fa-plus"></i> Tambah Potensi</a>
    <a href="{{ route('admin.event.create') }}" class="btn btn-amber"><i class="fas fa-plus"></i> Tambah Event</a>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-ghost"><i class="fas fa-upload"></i> Upload Galeri</a>
    <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-ghost"><i class="fas fa-bullhorn"></i> Buat Pengumuman</a>
    <a href="{{ route('home') }}" target="_blank" class="btn btn-ghost"><i class="fas fa-external-link-alt"></i> Lihat Website</a>
  </div>
</div>

{{-- Berita Terbaru --}}
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-newspaper" style="color:var(--green)"></i> Berita Terbaru</h2>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-green btn-sm"><i class="fas fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>Judul</th><th>Kategori</th><th>Views</th><th>Tanggal</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($beritaTerbaru as $b)
        <tr>
          <td>{{ Str::limit($b->judul, 52) }}</td>
          <td><span class="badge badge-green">{{ $b->kategori }}</span></td>
          <td>{{ number_format($b->views) }}</td>
          <td>{{ $b->created_at->format('d M Y') }}</td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.berita.edit', $b) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.berita.destroy', $b) }}" style="display:inline" onsubmit="return confirm('Hapus berita ini?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="5" style="text-align:center;padding:30px;color:#aaa">Belum ada berita</td></tr>
        @endforelse
      </tbody>
    </table>
    <div style="padding:12px 20px;border-top:1px solid #f0f0f0">
      <a href="{{ route('admin.berita.index') }}" style="font-size:13px;color:var(--teal);font-weight:600;text-decoration:none"><i class="fas fa-list"></i> Lihat Semua Berita →</a>
    </div>
  </div>
</div>
@endsection
