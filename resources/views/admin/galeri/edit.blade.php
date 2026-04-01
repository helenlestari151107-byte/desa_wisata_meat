@extends('layouts.admin')
@section('page-title','Edit Galeri')
@section('content')
<div class="card">
  <div class="card-head">
    <h2>Edit Foto Galeri</h2>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-ghost"><i class="fas fa-arrow-left"></i> Kembali</a>
  </div>
  <div class="card-body">
    <p style="color:var(--slate)">Edit galeri tidak tersedia. Hapus dan tambah foto baru.</p>
  </div>
</div>
@endsection