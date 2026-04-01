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

<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-newspaper" style="color:var(--green)"></i> Berita Terbaru</h2>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-green btn-sm"><i class="fas fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>Judul</th><th>Kategori</th><th>Tanggal</th><th>Aksi</th></tr></thead>
      <tbody>
        @foreach(\App\Models\Berita::orderBy('created_at','desc')->take(5)->get() as $b)
        <tr>
          <td>{{ Str::limit($b->judul, 50) }}</td>
          <td><span class="badge badge-green">{{ $b->kategori }}</span></td>
          <td>{{ $b->created_at->format('d M Y') }}</td>
          <td><a href="{{ route('admin.berita.edit', $b) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection