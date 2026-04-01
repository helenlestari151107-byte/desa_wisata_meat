@extends('layouts.app')

@section('content')

<h2 class="mb-4">Pengumuman</h2>

<div class="row">
@foreach($data as $p)
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm h-100">

            <div class="card-body">
                <h5 class="fw-bold text-danger">
                    {{ $p->judul }}
                </h5>

                <p>{{ $p->isi }}</p>

                <span class="badge bg-warning text-dark">{{ $p->tipe }}</span>
            </div>

        </div>
    </div>
@endforeach
</div>

@endsection