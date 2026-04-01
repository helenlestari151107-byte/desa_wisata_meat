@extends('layouts.admin')
@section('page-title','Nomor Penting')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-phone-alt"></i> Nomor Penting</h2>
    <a href="{{ route('admin.nomor-penting.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Nama</th><th>Kategori</th><th>Nomor Telepon</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($nomors as $n)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $n->nama }}</td>
          <td><span class="badge badge-amber">{{ $n->kategori }}</span></td>
          <td><a href="tel:{{ $n->nomor_telepon }}" style="color:var(--teal);font-weight:600">{{ $n->nomor_telepon }}</a></td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.nomor-penting.edit',$n) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.nomor-penting.destroy',$n) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="5" style="text-align:center;color:#aaa;padding:30px">Belum ada nomor penting</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
