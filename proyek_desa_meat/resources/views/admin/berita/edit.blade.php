@extends('layouts.admin')
@section('page-title','Edit Berita')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Edit Berita</h2>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.berita.update',$berita) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Judul Berita *</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul',$berita->judul) }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Kategori *</label>
          <select name="kategori" class="form-control">
            @foreach(['berita','pengumuman','agenda','wisata'] as $k)
              <option value="{{ $k }}" {{ $berita->kategori==$k?'selected':'' }}>{{ ucfirst($k) }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Penulis</label>
          <input type="text" name="penulis" class="form-control" value="{{ old('penulis',$berita->penulis) }}">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Isi Berita *</label>
        <textarea name="isi" class="form-control" rows="10" required>{{ old('isi',$berita->isi) }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Gambar</label>
        @if($berita->gambar)
          <img src="{{ Storage::url($berita->gambar) }}" class="img-preview">
        @endif
        <input type="file" name="gambar" class="form-control" accept="image/*" onchange="preview(this)">
        <img id="imgPreview" class="img-preview" style="display:none">
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Update Berita</button>
    </form>
  </div>
</div>
<script>function preview(i){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPreview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}</script>
@endsection