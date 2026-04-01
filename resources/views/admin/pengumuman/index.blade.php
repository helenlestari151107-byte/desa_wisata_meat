@extends('layouts.admin')
@section('page-title','Pengumuman')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-bullhorn"></i> Daftar Pengumuman</h2>
    <a href="{{ route('admin.pengumuman.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Judul</th><th>Tipe</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($pengumumans as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ Str::limit($p->judul,55) }}</td>
          <td><span class="badge badge-amber">{{ $p->tipe }}</span></td>
          <td>{{ $p->tanggal ? $p->tanggal->format('d M Y') : '-' }}</td>
          <td><span class="badge {{ $p->is_aktif ? 'badge-green' : 'badge-red' }}">{{ $p->is_aktif ? 'Aktif' : 'Nonaktif' }}</span></td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.pengumuman.edit',$p) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.pengumuman.destroy',$p) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;color:#aaa;padding:30px">Belum ada pengumuman</td></tr>
        @endforelse
      </tbody>
    </table>
    @if(method_exists($pengumumans,'links'))
    <div style="padding:14px 20px">{{ $pengumumans->links() }}</div>
    @endif
  </div>
</div>
@endsection