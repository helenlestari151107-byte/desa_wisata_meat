@extends('layouts.admin')
@section('page-title','Infografis')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-chart-bar"></i> Infografis Data Desa</h2>
    <a href="{{ route('admin.infografis.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Ikon</th><th>Label</th><th>Nilai</th><th>Urutan</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($infografis as $i)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><i class="{{ $i->ikon ?? 'fas fa-chart-bar' }}" style="font-size:18px;color:var(--teal)"></i></td>
          <td>{{ $i->label }}</td>
          <td style="font-weight:700;color:var(--navy)">{{ $i->nilai }}</td>
          <td>{{ $i->urutan }}</td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.infografis.edit',$i) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.infografis.destroy',$i) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;color:#aaa;padding:30px">Belum ada data infografis</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
