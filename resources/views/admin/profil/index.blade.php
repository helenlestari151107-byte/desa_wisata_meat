@extends('layouts.admin')
@section('page-title','Profil Desa')
@section('content')
<div class="card">
  <div class="card-head">
    <h2><i class="fas fa-village"></i> Pengaturan Profil Desa</h2>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.profil.update',$profil) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Nama Desa *</label>
          <input type="text" name="nama_desa" class="form-control" value="{{ old('nama_desa',$profil->nama_desa) }}" required>
        </div>
        <div class="form-group">
          <label class="form-label">Nama Kepala Desa</label>
          <input type="text" name="nama_kepala_desa" class="form-control" value="{{ old('nama_kepala_desa',$profil->nama_kepala_desa) }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Luas Wilayah</label>
          <input type="text" name="luas_wilayah" class="form-control" value="{{ old('luas_wilayah',$profil->luas_wilayah) }}" placeholder="15,2 km²">
        </div>
        <div class="form-group">
          <label class="form-label">Jumlah Penduduk</label>
          <input type="number" name="jumlah_penduduk" class="form-control" value="{{ old('jumlah_penduduk',$profil->jumlah_penduduk) }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Jumlah KK</label>
          <input type="number" name="jumlah_kk" class="form-control" value="{{ old('jumlah_kk',$profil->jumlah_kk) }}">
        </div>
        <div class="form-group">
          <label class="form-label">No. Telepon</label>
          <input type="text" name="no_telepon" class="form-control" value="{{ old('no_telepon',$profil->no_telepon) }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Email Desa</label>
          <input type="email" name="email_desa" class="form-control" value="{{ old('email_desa',$profil->email_desa) }}">
        </div>
        <div class="form-group">
          <label class="form-label">Alamat</label>
          <input type="text" name="alamat" class="form-control" value="{{ old('alamat',$profil->alamat) }}">
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Latitude (Peta)</label>
          <input type="text" name="lat" class="form-control" value="{{ old('lat',$profil->lat) }}" placeholder="2.3356">
        </div>
        <div class="form-group">
          <label class="form-label">Longitude (Peta)</label>
          <input type="text" name="lng" class="form-control" value="{{ old('lng',$profil->lng) }}" placeholder="99.0649">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Sejarah Desa</label>
        <textarea name="sejarah" class="form-control" rows="5">{{ old('sejarah',$profil->sejarah) }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Visi</label>
        <textarea name="visi" class="form-control" rows="3">{{ old('visi',$profil->visi) }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Misi</label>
        <textarea name="misi" class="form-control" rows="4">{{ old('misi',$profil->misi) }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Foto Kepala Desa</label>
        @if($profil->foto_kepala_desa)
          <img src="{{ Storage::url($profil->foto_kepala_desa) }}" class="img-preview">
        @endif
        <input type="file" name="foto_kepala_desa" class="form-control" accept="image/*" onchange="preview(this)">
        <img id="imgPreview" class="img-preview" style="display:none">
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan Perubahan</button>
    </form>
  </div>
</div>
<script>function preview(i){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPreview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}</script>
@endsection