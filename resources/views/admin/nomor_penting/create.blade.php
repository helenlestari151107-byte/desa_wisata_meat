@extends('layouts.admin')
@section('page-title','Tambah Nomor Penting')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Nomor Penting</h2>
    <a href="{{ route('admin.nomor-penting.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.nomor-penting.store') }}">
      @csrf
      <div class="form-group">
        <label class="form-label">Nama *</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required placeholder="Polsek Balige">
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Kategori *</label>
          <select name="kategori" class="form-control" required>
            <option value="darurat">Darurat</option>
            <option value="kesehatan">Kesehatan</option>
            <option value="keamanan">Keamanan</option>
            <option value="pemerintah">Pemerintah</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Nomor Telepon *</label>
          <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon') }}" required placeholder="110">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Ikon Font Awesome</label>
          <input type="text" name="ikon" class="form-control" value="{{ old('ikon','fas fa-phone') }}" placeholder="fas fa-shield-alt">
        </div>
        <div class="form-group">
          <label class="form-label">Warna Ikon</label>
          <select name="warna" class="form-control">
            <option value="red">Merah</option>
            <option value="blue">Biru</option>
            <option value="teal">Teal</option>
            <option value="amber">Amber</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan</button>
    </form>
  </div>
</div>
@endsection