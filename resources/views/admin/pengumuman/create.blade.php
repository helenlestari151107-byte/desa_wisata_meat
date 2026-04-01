@extends('layouts.admin')
@section('page-title','Tambah Pengumuman')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Pengumuman</h2>
    <a href="{{ route('admin.pengumuman.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.pengumuman.store') }}">
      @csrf
      <div class="form-group">
        <label class="form-label">Judul *</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tipe *</label>
          <select name="tipe" class="form-control" required>
            <option value="umum">Umum</option>
            <option value="penting">Penting</option>
            <option value="darurat">Darurat</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Tanggal *</label>
          <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Berakhir Pada</label>
        <input type="date" name="berakhir_pada" class="form-control" value="{{ old('berakhir_pada') }}">
      </div>
      <div class="form-group">
        <label class="form-label">Isi Pengumuman *</label>
        <textarea name="isi" class="form-control" required>{{ old('isi') }}</textarea>
      </div>
      <div class="form-group">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer">
          <input type="checkbox" name="is_aktif" value="1" {{ old('is_aktif',1) ? 'checked' : '' }}> Aktifkan Pengumuman
        </label>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan</button>
    </form>
  </div>
</div>
@endsection