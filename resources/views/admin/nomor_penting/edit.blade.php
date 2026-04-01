@extends('layouts.admin')
@section('page-title','Edit Nomor Penting')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Edit Nomor Penting</h2>
    <a href="{{ route('admin.nomor-penting.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <form method="POST" action="{{ route('admin.nomor-penting.update',$nomorPenting) }}">
      @csrf @method('PUT')
      <div class="form-group">
        <label class="form-label">Nama *</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama',$nomorPenting->nama) }}" required>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Kategori *</label>
          <select name="kategori" class="form-control" required>
            @foreach(['darurat','kesehatan','keamanan','pemerintah','lainnya'] as $k)
            <option value="{{ $k }}" {{ $nomorPenting->kategori==$k?'selected':'' }}>{{ ucfirst($k) }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label class="form-label">Nomor Telepon *</label>
          <input type="text" name="nomor_telepon" class="form-control" value="{{ old('nomor_telepon',$nomorPenting->nomor_telepon) }}" required>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group">
          <label class="form-label">Ikon Font Awesome</label>
          <input type="text" name="ikon" class="form-control" value="{{ old('ikon',$nomorPenting->ikon) }}">
        </div>
        <div class="form-group">
          <label class="form-label">Warna Ikon</label>
          <select name="warna" class="form-control">
            @foreach(['red','blue','teal','amber'] as $w)
            <option value="{{ $w }}" {{ $nomorPenting->warna==$w?'selected':'' }}>{{ ucfirst($w) }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-green"><i class="fas fa-save"></i> Update</button>
    </form>
  </div>
</div>
@endsection