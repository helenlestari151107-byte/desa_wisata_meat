@extends('layouts.admin')
@section('page-title','Edit Potensi')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Edit Potensi Desa</h2>
    <a href="{{ route('admin.potensi.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.potensi.update',$potensi) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Nama Potensi *</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama',$potensi->nama) }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Kategori *</label>
          <select name="kategori" class="form-control" required>
            @foreach(['wisata_alam','wisata_budaya','kuliner','kerajinan','pertanian','lainnya'] as $k)
            <option value="{{ $k }}" {{ $potensi->kategori==$k?'selected':'' }}>{{ ucfirst(str_replace('_',' ',$k)) }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Rating (1-5)</label>
          <input type="number" name="rating" class="form-control" min="1" max="5" step="0.1" value="{{ old('rating',$potensi->rating) }}">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi *</label>
        <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi',$potensi->deskripsi) }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi',$potensi->lokasi) }}">
      </div>
      <div class="form-group">
        <label class="form-label">Tags</label>
        <input type="text" name="tags" class="form-control" value="{{ old('tags',$potensi->tags) }}">
      </div>
      <div class="form-group">
        <label class="form-label">Gambar</label>
        @if($potensi->gambar)<img src="{{ Storage::url($potensi->gambar) }}" class="img-preview">@endif
        <input type="file" name="gambar" class="form-control" accept="image/*" onchange="preview(this)">
        <img id="imgPreview" class="img-preview" style="display:none">
      </div>
      <div class="form-group">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer">
          <input type="checkbox" name="is_aktif" value="1" {{ $potensi->is_aktif ? 'checked' : '' }}> Tampilkan di Website
        </label>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Update</button>
    </form>
  </div>
</div>
<script>function preview(i){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPreview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}</script>
@endsection