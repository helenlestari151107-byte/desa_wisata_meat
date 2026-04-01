@extends('layouts.admin')
@section('page-title','Tambah Event')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Event Baru</h2>
    <a href="{{ route('admin.event.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.event.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="form-label">Nama Event *</label>
        <input type="text" name="nama_event" class="form-control" value="{{ old('nama_event') }}" required>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi') }}</textarea>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tanggal Mulai *</label>
          <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai') }}" required>
        </div>
        <div class="form-group">
          <label class="form-label">Tanggal Selesai *</label>
          <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai') }}" required>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Lokasi *</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}" required>
      </div>
      <div class="form-group">
        <label class="form-label">Gambar (opsional)</label>
        <input type="file" name="gambar" class="form-control" accept="image/*" onchange="preview(this)">
        <img id="imgPreview" class="img-preview" style="display:none">
      </div>
      <div class="form-group">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer">
          <input type="checkbox" name="is_aktif" value="1" {{ old('is_aktif',1) ? 'checked' : '' }}> Aktifkan Event
        </label>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan Event</button>
    </form>
  </div>
</div>
<script>function preview(i){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPreview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}</script>
@endsection