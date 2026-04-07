@extends('layouts.admin')
@section('page-title','Kontak Desa')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-address-card"></i> Kontak Desa</h2>
    <a href="{{ route('admin.kontak.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah Kontak</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead>
        <tr><th>#</th><th>Ikon</th><th>Nama</th><th>Jabatan</th><th>Nomor</th><th>Email</th><th>Aksi</th></tr>
      </thead>
      <tbody>
        @forelse($kontaks as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><i class="{{ $k->ikon ?? 'fas fa-user' }}" style="font-size:18px;color:var(--green)"></i></td>
          <td><strong>{{ $k->nama }}</strong></td>
          <td>{{ $k->jabatan ?? '—' }}</td>
          <td>{{ $k->nomor ?? '—' }}</td>
          <td>{{ $k->email ?? '—' }}</td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.kontak.edit', $k) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.kontak.destroy', $k) }}" style="display:inline" onsubmit="return confirm('Hapus kontak ini?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
        <tr><td colspan="7" style="text-align:center;padding:30px;color:#aaa">Belum ada data kontak</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
