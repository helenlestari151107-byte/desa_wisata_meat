@extends('layouts.admin')
@section('page-title','Berita')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-newspaper"></i> Daftar Berita</h2>
    <a href="{{ route('admin.berita.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah Berita</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Gambar</th><th>Judul</th><th>Kategori</th><th>Views</th><th>Tanggal</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($beritas as $b)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>@if($b->gambar)<img src="{{ Storage::url($b->gambar) }}" style="width:60px;height:44px;object-fit:cover;border-radius:6px">@else<span style="color:#ccc">—</span>@endif</td>
          <td>{{ Str::limit($b->judul,55) }}</td>
          <td><span class="badge badge-green">{{ $b->kategori }}</span></td>
          <td>{{ number_format($b->views) }}</td>
          <td>{{ $b->created_at->format('d M Y') }}</td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.berita.edit',$b) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.berita.destroy',$b) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;color:#aaa;padding:30px">Belum ada berita</td></tr>
        @endforelse
      </tbody>
    </table>
    <div style="padding:14px 20px">{{ $beritas->links() }}</div>
  </div>
</div>
@endsection