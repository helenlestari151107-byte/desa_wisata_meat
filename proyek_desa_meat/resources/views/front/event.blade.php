@extends('layouts.app')

@section('content')

<h2 class="mb-4">Event Desa</h2>

<div class="row">
@foreach($data as $e)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">

            <div class="card-body">
                <h5 class="fw-bold text-success">
                    {{ $e->judul }}
                </h5>

                <p class="mb-1"><strong>Lokasi:</strong> {{ $e->lokasi }}</p>
                <p class="mb-1"><strong>Tanggal:</strong> {{ $e->tanggal_mulai }}</p>

                <span class="badge bg-primary">{{ $e->status }}</span>
            </div>

        </div>
    </div>
@endforeach
</div>

@endsection