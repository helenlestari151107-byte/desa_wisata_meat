@extends('layouts.admin')
@section('page-title','Edit Event')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Edit Event</h2>
    <a href="{{ route('admin.event.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.event.update',$event) }}" enctype="multipart/form-data">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Nama Event *</label>
        <input type="text" name="nama_event" class="form-control" value="{{ old('nama_event',$event->nama_event) }}" required>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control">{{ old('deskripsi',$event->deskripsi) }}</textarea>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Tanggal Mulai *</label>
          <input type="date" name="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai',$event->tanggal_mulai?->format('Y-m-d')) }}" required>
        </div>
        <div class="form-group">
          <label class="form-label">Tanggal Selesai *</label>
          <input type="date" name="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai',$event->tanggal_selesai?->format('Y-m-d')) }}" required>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Lokasi *</label>
        <input type="text" name="lokasi" class="form-control" value="{{ old('lokasi',$event->lokasi) }}" required>
      </div>
      <div class="form-group">
        <label class="form-label">Gambar</label>
        @if($event->gambar)<img src="{{ Storage::url($event->gambar) }}" class="img-preview">@endif
        <input type="file" name="gambar" class="form-control" accept="image/*" onchange="preview(this)">
        <img id="imgPreview" class="img-preview" style="display:none">
      </div>
      <div class="form-group">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer">
          <input type="checkbox" name="is_aktif" value="1" {{ $event->is_aktif ? 'checked' : '' }}> Aktifkan Event
        </label>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Update Event</button>
    </form>
  </div>
</div>
<script>function preview(i){var r=new FileReader();r.onload=function(e){var p=document.getElementById('imgPreview');p.src=e.target.result;p.style.display='block'};r.readAsDataURL(i.files[0])}</script>
@endsection
