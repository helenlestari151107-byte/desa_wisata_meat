@extends('layouts.admin')
@section('page-title','Kontak Desa')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-address-card"></i> Kontak Desa</h2>
    <a href="{{ route('admin.kontak.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Nama</th><th>Jabatan</th><th>Nomor</th><th>Email</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($kontaks as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->nama }}</td>
          <td>{{ $k->jabatan }}</td>
          <td><a href="tel:{{ $k->nomor }}" style="color:var(--teal);font-weight:600">{{ $k->nomor }}</a></td>
          <td>{{ $k->email ?? '-' }}</td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.kontak.edit',$k) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.kontak.destroy',$k) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;color:#aaa;padding:30px">Belum ada data kontak</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
