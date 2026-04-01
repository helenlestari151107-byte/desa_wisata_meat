@extends('layouts.admin')
@section('page-title','Edit Pengumuman')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Edit Pengumuman</h2>
    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.pengumuman.update',$pengumuman) }}">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Judul *</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul',$pengumuman->judul) }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tipe *</label>
          <select name="tipe" class="form-control" required>
            @foreach(['umum','penting','darurat'] as $t)
            <option value="{{ $t }}" {{ $pengumuman->tipe==$t?'selected':'' }}>{{ ucfirst($t) }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Tanggal *</label>
          <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal',$pengumuman->tanggal?->format('Y-m-d')) }}" required>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Berakhir Pada</label>
        <input type="date" name="berakhir_pada" class="form-control" value="{{ old('berakhir_pada',$pengumuman->berakhir_pada?->format('Y-m-d')) }}">
      </div>
      <div class="form-group">
        <label class="form-label">Isi Pengumuman *</label>
        <textarea name="isi" class="form-control" required>{{ old('isi',$pengumuman->isi) }}</textarea>
      </div>
      <div class="form-group">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer">
          <input type="checkbox" name="is_aktif" value="1" {{ $pengumuman->is_aktif ? 'checked' : '' }}> Aktifkan Pengumuman
        </label>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Update</button>
    </form>
  </div>
</div>
@endsection
