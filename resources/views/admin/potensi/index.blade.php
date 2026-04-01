@extends('layouts.admin')
@section('page-title','Potensi Desa')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-mountain"></i> Daftar Potensi Desa</h2>
    <a href="{{ route('admin.potensi.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Foto</th><th>Nama</th><th>Kategori</th><th>Rating</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($potensis as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>@if($p->gambar)<img src="{{ Storage::url($p->gambar) }}" style="width:60px;height:44px;object-fit:cover;border-radius:6px">@else<span style="color:#ccc">—</span>@endif</td>
          <td>{{ Str::limit($p->nama,45) }}</td>
          <td><span class="badge badge-teal">{{ $p->kategori }}</span></td>
          <td>{{ $p->rating ? '⭐ '.$p->rating : '-' }}</td>
          <td><span class="badge {{ $p->is_aktif ? 'badge-green' : 'badge-red' }}">{{ $p->is_aktif ? 'Aktif' : 'Nonaktif' }}</span></td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.potensi.edit',$p) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.potensi.destroy',$p) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;color:#aaa;padding:30px">Belum ada data potensi</td></tr>
        @endforelse
      </tbody>
    </table>
    @if(method_exists($potensis,'links'))
    <div style="padding:14px 20px">{{ $potensis->links() }}</div>
    @endif
  </div>
</div>
@endsection