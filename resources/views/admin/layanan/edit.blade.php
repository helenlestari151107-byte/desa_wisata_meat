@extends('layouts.admin')
@section('page-title','Edit Layanan')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Edit Layanan Desa</h2>
    <a href="{{ route('admin.layanan.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.layanan.update',$layanan) }}">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Nama Layanan *</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama',$layanan->nama) }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Ikon Font Awesome *</label>
          <input type="text" name="ikon" class="form-control" value="{{ old('ikon',$layanan->ikon) }}" required>
        </div>
        <div class="form-group">
          <label class="form-label">Warna Ikon</label>
          <select name="warna_ikon" class="form-control">
            @foreach(['green','teal','amber','slate'] as $w)
            <option value="{{ $w }}" {{ $layanan->warna_ikon==$w?'selected':'' }}>{{ ucfirst($w) }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Deskripsi *</label>
        <textarea name="deskripsi" class="form-control" required>{{ old('deskripsi',$layanan->deskripsi) }}</textarea>
      </div>
      <div class="form-group">
        <label class="form-label">Urutan Tampil</label>
        <input type="number" name="urutan" class="form-control" value="{{ old('urutan',$layanan->urutan) }}" min="0">
      </div>
      <div class="form-group">
        <label style="display:flex;align-items:center;gap:8px;cursor:pointer">
          <input type="checkbox" name="is_aktif" value="1" {{ $layanan->is_aktif ? 'checked' : '' }}> Aktifkan Layanan
        </label>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Update</button>
    </form>
  </div>
</div>
@endsection