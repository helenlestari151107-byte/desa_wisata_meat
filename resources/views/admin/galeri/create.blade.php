@extends('layouts.admin')
@section('page-title','Tambah Foto Galeri')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Foto Galeri</h2>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.galeri.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="form-label">Judul Foto *</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
      </div>
      <div class="form-group">
        <label class="form-label">Kategori *</label>
        <select name="kategori" class="form-control" required>
          <option value="alam">Alam</option>
          <option value="budaya">Budaya</option>
          <option value="kegiatan">Kegiatan</option>
          <option value="wisata">Wisata</option>
          <option value="lainnya">Lainnya</option>
        </select>
      </div>
      <div class="form-group">
        <label class="form-label">Foto *</label>
        <input type="file" name="gambar" class="form-control" accept="image/*" required onchange="preview(this)">
        <img id="imgPreview" class="img-preview" style="display:none">
      </div>
      <div class="form-group">
        <label class="form-label">Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ old('keterangan') }}</textarea>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan Foto</button>
    </form>
  </div>
</div>
<script>function preview(i){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPreview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}</script>
@endsection