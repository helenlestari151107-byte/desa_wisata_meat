@extends('layouts.admin')
@section('page-title','Tambah Layanan')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Layanan Desa</h2>
    <a href="{{ route('admin.layanan.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.layanan.store') }}">
      @csrf
      <div class="form-group">
        <label class="form-label">Nama Layanan *</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Ikon Font Awesome *</label>
          <input type="text" name="ikon" class="form-control" value="{{ old('ikon','fas fa-file-alt') }}" placeholder="fas fa-file-alt" required>
        </div>
        <div class="form-group">
          <label class="form-label">Warna Ikon</label>
          <select name="warna_ikon" class="form-control">
            <option value="green">Hijau</option>
            <option value="teal">Teal</option>
            <option value="amber">Amber</option>
            <option value="slate">Abu-abu</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi *</label>
        <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="urutan" class="form-control" value="{{ old('urutan',0) }}" min="0">
      </div>
      <div class="form-group">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer">
          <input type="checkbox" name="is_aktif" value="1" {{ old('is_aktif',1) ? 'checked' : '' }}> Aktifkan Layanan
        </label>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan</button>
    </form>
  </div>
</div>
@endsection