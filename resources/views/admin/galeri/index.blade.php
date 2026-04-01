@extends('layouts.admin')
@section('page-title','Galeri')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-images"></i> Daftar Galeri</h2>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah Foto</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Foto</th><th>Judul</th><th>Kategori</th><th>Tanggal</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($galeris as $g)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td><img src="{{ Storage::url($g->gambar) }}" style="width:80px;height:55px;object-fit:cover;border-radius:6px"></td>
          <td>{{ Str::limit($g->judul,50) }}</td>
          <td><span class="badge badge-teal">{{ $g->kategori }}</span></td>
          <td>{{ $g->created_at->format('d M Y') }}</td>
          <td style="white-space:nowrap">
            <form method="POST" action="{{ route('admin.galeri.destroy',$g) }}" style="display:inline" onsubmit="return confirm('Yakin hapus foto ini?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="6" style="text-align:center;color:#aaa;padding:30px">Belum ada foto di galeri</td></tr>
        @endforelse
      </tbody>
    </table>
    @if(method_exists($galeris,'links'))
    <div style="padding:14px 20px">{{ $galeris->links() }}</div>
    @endif
  </div>
</div>
@endsection