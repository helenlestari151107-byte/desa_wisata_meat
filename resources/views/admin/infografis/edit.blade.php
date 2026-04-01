@extends('layouts.admin')
@section('page-title','Edit Infografis')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Edit Data Infografis</h2>
    <a href="{{ route('admin.infografis.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.infografis.update',$infografis) }}">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Label *</label>
        <input type="text" name="label" class="form-control" value="{{ old('label',$infografis->label) }}" required>
      </div>
      <div class="form-group">
        <label class="form-label">Nilai *</label>
        <input type="text" name="nilai" class="form-control" value="{{ old('nilai',$infografis->nilai) }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Ikon Font Awesome</label>
          <input type="text" name="ikon" class="form-control" value="{{ old('ikon',$infografis->ikon) }}">
        </div>
        <div class="form-group">
          <label class="form-label">Warna</label>
          <select name="warna" class="form-control">
            @foreach(['green','teal','amber','navy'] as $w)
            <option value="{{ $w }}" {{ $infografis->warna==$w?'selected':'' }}>{{ ucfirst($w) }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Urutan</label>
        <input type="number" name="urutan" class="form-control" value="{{ old('urutan',$infografis->urutan) }}" min="0">
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Update</button>
    </form>
  </div>
</div>
@endsection