@extends('layouts.app')

@section('content')

<h2>{{ $berita->judul }}</h2>

@if($berita->gambar)
    <img src="{{ asset('storage/'.$berita->gambar) }}" width="100%" class="mb-3">
@endif

<p>{{ $berita->isi }}</p>

<a href="/" class="btn btn-secondary mt-3">Kembali</a>

@endsection