@extends('layouts.admin')
@section('page-title','Layanan Desa')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-concierge-bell"></i> Daftar Layanan</h2>
    <a href="{{ route('admin.layanan.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Ikon</th><th>Nama Layanan</th><th>Deskripsi</th><th>Urutan</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($layanans as $l)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><i class="{{ $l->ikon ?? 'fas fa-file' }}" style="font-size:18px;color:var(--green)"></i></td>
          <td>{{ $l->nama }}</td>
          <td>{{ Str::limit($l->deskripsi,50) }}</td>
          <td>{{ $l->urutan }}</td>
          <td><span class="badge {{ $l->is_aktif ? 'badge-green' : 'badge-red' }}">{{ $l->is_aktif ? 'Aktif' : 'Nonaktif' }}</span></td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.layanan.edit',$l) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.layanan.destroy',$l) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;color:#aaa;padding:30px">Belum ada layanan</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection