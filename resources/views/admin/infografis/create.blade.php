@extends('layouts.admin')
@section('page-title','Tambah Infografis')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Tambah Data Infografis</h2>
    <a href="{{ route('admin.infografis.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.infografis.store') }}">
      @csrf
      <div class="form-group">
        <label class="form-label">Label *</label>
        <input type="text" name="label" class="form-control" value="{{ old('label') }}" required placeholder="Jumlah Penduduk">
      </div>
      <div class="form-group">
        <label class="form-label">Nilai *</label>
        <input type="text" name="nilai" class="form-control" value="{{ old('nilai') }}" required placeholder="2.856 Jiwa">
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Ikon Font Awesome</label>
          <input type="text" name="ikon" class="form-control" value="{{ old('ikon','fas fa-users') }}" placeholder="fas fa-users">
        </div>
        <div class="form-group">
          <label class="form-label">Warna</label>
          <select name="warna" class="form-control">
            <option value="green">Hijau</option>
            <option value="teal">Teal</option>
            <option value="amber">Amber</option>
            <option value="navy">Navy</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Urutan</label>
        <input type="number" name="urutan" class="form-control" value="{{ old('urutan',0) }}" min="0">
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Simpan</button>
    </form>
  </div>
</div>
@endsection