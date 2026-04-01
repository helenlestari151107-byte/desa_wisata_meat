@extends('layouts.admin')
@section('page-title','Event')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-calendar-alt"></i> Daftar Event</h2>
    <a href="{{ route('admin.event.create') }}" class="btn btn-green"><i class="fas fa-plus"></i> Tambah Event</a>
  </div>
  <div class="card-body" style="padding:0">
    <table class="table">
      <thead><tr><th>#</th><th>Gambar</th><th>Nama Event</th><th>Tanggal Mulai</th><th>Lokasi</th><th>Status</th><th>Aksi</th></tr></thead>
      <tbody>
        @forelse($events as $e)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>@if($e->gambar)<img src="{{ Storage::url($e->gambar) }}" style="width:60px;height:44px;object-fit:cover;border-radius:6px">@else<span style="color:#ccc">—</span>@endif</td>
          <td>{{ Str::limit($e->nama_event,50) }}</td>
          <td>{{ $e->tanggal_mulai ? $e->tanggal_mulai->format('d M Y') : '-' }}</td>
          <td>{{ Str::limit($e->lokasi,40) }}</td>
          <td><span class="badge {{ $e->is_aktif ? 'badge-green' : 'badge-red' }}">{{ $e->is_aktif ? 'Aktif' : 'Nonaktif' }}</span></td>
          <td style="white-space:nowrap">
            <a href="{{ route('admin.event.edit',$e) }}" class="btn btn-teal btn-sm"><i class="fas fa-edit"></i></a>
            <form method="POST" action="{{ route('admin.event.destroy',$e) }}" style="display:inline" onsubmit="return confirm('Yakin hapus?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn btn-red btn-sm"><i class="fas fa-trash"></i></button>
            </form>
          </td>
        </tr>
        @empty
          <tr><td colspan="7" style="text-align:center;color:#aaa;padding:30px">Belum ada event</td></tr>
        @endforelse
      </tbody>
    </table>
    @if(method_exists($events,'links'))
    <div style="padding:14px 20px">{{ $events->links() }}</div>
    @endif
  </div>
</div>
@endsection