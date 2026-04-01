@extends('layouts.admin')
@section('page-title','Tambah Potensi')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Potensi Desa</h2>
    <a href="{{ route('admin.potensi.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.potensi.store') }}" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label class="form-label">Nama Potensi *</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Kategori *</label>
          <select name="kategori" class="form-control" required>
            <option value="wisata_alam">Wisata Alam</option>
            <option value="wisata_budaya">Wisata Budaya</option>
            <option value="kuliner">Kuliner</option>
            <option value="kerajinan">Kerajinan</option>
            <option value="pertanian">Pertanian</option>
            <option value="lainnya">Lainnya</option>
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Rating (1-5)</label>
          <input type="number" name="rating" class="form-control" min="1" max="5" step="0.1" value="{{ old('rating',4.5) }}">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi *</label>
        <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi') }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi') }}">
      </div>
      <div class="form-group">
        <label class="form-label">Tags (pisahkan koma)</label>
        <input type="text" name="tags" class="form-control" value="{{ old('tags') }}" placeholder="danau,alam,toba">
      </div>
      <div class="form-group">
        <label class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control" accept="image/*" onchange="preview(this)">
        <img id="imgPreview" class="img-preview" style="display:none">
      </div>
      <div class="form-group">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer">
          <input type="checkbox" name="is_aktif" value="1" {{ old('is_aktif',1) ? 'checked' : '' }}> Tampilkan di Website
        </label>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan</button>
    </form>
  </div>
</div>
<script>function preview(i){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPreview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}</script>
@endsection
