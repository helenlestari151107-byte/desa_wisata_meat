@extends('layouts.app')

@section('content')

<div style="
    position: relative;
    height: 100vh;
    background: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4') center/cover;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
">

    <div style="
        position:absolute;
        inset:0;
        background: rgba(0,0,0,0.5);
    "></div>

    <div style="position:relative; color:white;">
        <h1 style="font-size:60px; font-weight:bold; text-shadow:2px 2px 10px rgba(0,0,0,0.7);">
            Desa Wisata
        </h1>

        <p style="font-size:18px; margin-top:10px;">
            Jelajahi keindahan desa dan informasi terbaru
        </p>

        <a href="/berita" class="btn btn-warning mt-3">
            Lihat Berita
        </a>
    </div>

</div>

<div class="container mt-5">
    <div class="row text-center">

        <div class="col-md-3 mb-4">
            <a href="/berita" class="text-decoration-none">
                <div class="card shadow-sm p-4">
                    <h4>📰</h4>
                    <p class="mt-2">Berita</p>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/event" class="text-decoration-none">
                <div class="card shadow-sm p-4">
                    <h4>🎉</h4>
                    <p class="mt-2">Event</p>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/pengumuman" class="text-decoration-none">
                <div class="card shadow-sm p-4">
                    <h4>📢</h4>
                    <p class="mt-2">Pengumuman</p>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="/admin" class="text-decoration-none">
                <div class="card shadow-sm p-4">
                    <h4>⚙️</h4>
                    <p class="mt-2">Admin</p>
                </div>
            </a>
        </div>

    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Berita Terbaru</h2>

    <div class="row">

        <div class="col-md-8">
            @if($beritas->count())
                <div class="card shadow-sm mb-4">

                    @if($beritas[0]->gambar)
                        <img src="{{ asset('storage/'.$berita[0]->gambar) }}"
                             class="card-img-top"
                             style="height:300px; object-fit:cover;">
                    @endif

                    <div class="card-body">
                        <h3 class="fw-bold">
                            <a href="{{ route('berita.detail', $beritas[0]->id) }}" class="text-decoration-none">
                                {{ $beritas[0]->judul }}
                            </a>
                        </h3>

                        <p>{{ $beritas[0]->isi }}</p>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-4">
            @foreach($beritas->skip(1)->take(4) as $b)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold">
                            <a href="{{ route('berita.detail', $b->id) }}" class="text-decoration-none">
                                {{ $b->judul }}
                            </a>
                        </h6>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

<div class="container mt-5">
    <h2 class="mb-4">Event Desa</h2>

    <div class="row">
        @foreach($events as $e)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">

                <div class="card-body">
                    <h5 class="fw-bold text-success">
                        {{ $e->judul }}
                    </h5>

                    <p class="mb-1">
                        📍 {{ $e->lokasi }}
                    </p>

                    <p class="mb-2">
                        📅 {{ $e->tanggal_mulai }}
                    </p>

                    <span class="badge bg-primary">
                        {{ $e->status }}
                    </span>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="container mt-5 mb-5">
    <h2 class="mb-4">Pengumuman</h2>

    <div class="row">
        @foreach($pengumumans as $p)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">

                <div class="card-body">
                    <h5 class="fw-bold text-danger">
                        {{ $p->judul }}
                    </h5>

                    <p>{{ $p->isi }}</p>

                    <span class="badge bg-warning text-dark">
                        {{ $p->tipe }}
                    </span>
                </div>

            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection