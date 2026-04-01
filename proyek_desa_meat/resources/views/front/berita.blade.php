@extends('layouts.app')
@php use Illuminate\Support\Str; @endphp
@section('content')

<h2 class="mb-4">Semua Berita</h2>

<div class="row">
@foreach($data as $b)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">

            {{-- GAMBAR --}}
            @if($b->gambar)
                <img src="{{ asset('storage/'.$b->gambar) }}" class="card-img-top" style="height:200px; object-fit:cover;">
            @endif

            <div class="card-body">
                <h5 class="fw-bold">
                    <a href="{{ route('berita.detail', $b->id) }}" class="text-decoration-none">
                        {{ $b->judul }}
                    </a>
                </h5>

                <p class="text-muted">
                    {{ Str::limit($b->isi, 100) }}
                </p>

                <a href="{{ route('berita.detail', $b->id) }}" class="btn btn-success btn-sm">
                    Baca Selengkapnya
                </a>
            </div>

        </div>
    </div>
@endforeach
</div>

@endsection