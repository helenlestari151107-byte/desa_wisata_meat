@extends('layouts.admin')
@section('page-title','Tambah Kontak')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Kontak Desa</h2>
    <a href="{{ route('admin.kontak.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.kontak.store') }}">
      @csrf
      <div class="form-group">
        <label class="form-label">Nama *</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
      </div>
      <div class="form-group">
        <label class="form-label">Jabatan *</label>
        <input type="text" name="jabatan" class="form-control" value="{{ old('jabatan') }}" required placeholder="Kepala Desa">
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nomor Telepon *</label>
          <input type="text" name="nomor" class="form-control" value="{{ old('nomor') }}" required>
        </div>
        <div class="form-group">
          <label class="form-label">Email</label>
          <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Ikon Font Awesome</label>
        <input type="text" name="ikon" class="form-control" value="{{ old('ikon','fas fa-user-tie') }}" placeholder="fas fa-user-tie">
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan</button>
    </form>
  </div>
</div>
@endsection