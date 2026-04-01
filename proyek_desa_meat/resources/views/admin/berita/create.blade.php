@extends('layouts.admin')
@section('page-title','Tambah Berita')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Berita Baru</h2>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.berita.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="form-label">Judul Berita *</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Kategori *</label>
          <select name="kategori" class="form-control" required>
            <option value="berita">Berita</option>
            <option value="pengumuman">Pengumuman</option>
            <option value="agenda">Agenda</option>
            <option value="wisata">Wisata</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Penulis</label>
          <input type="text" name="penulis" class="form-control" value="{{ old('penulis','Admin') }}">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Isi Berita *</label>
        <textarea name="isi" class="form-control" rows="10" required>{{ old('isi') }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Gambar (opsional)</label>
        <input type="file" name="gambar" class="form-control" accept="image/*" onchange="preview(this)">
        <img id="imgPreview" class="img-preview" style="display:none">
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan Berita</button>
    </form>
  </div>
</div>
<script>function preview(i){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPreview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}</script>
@endsection