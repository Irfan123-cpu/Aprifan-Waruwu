@extends('master')

@section('content')
<style>
    /* Custom Styling untuk mempercantik */
    .hero-gradient {
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }
    .hero-gradient:hover {
        transform: scale(1.01);
    }
    .info-card {
        transition: all 0.2s ease-in-out;
        border: 1px solid rgba(0,0,0,0.05) !important;
    }
    .info-card:hover {
        background-color: #ffffff !important;
        box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        transform: translateY(-3px);
    }
    .badge-fasilitas {
        font-weight: 500;
        letter-spacing: 0.5px;
        transition: all 0.3s;
    }
    .badge-fasilitas:hover {
        filter: brightness(1.1);
    }
</style>

<div class="container py-5">
    <div class="hero-gradient mb-4 rounded-5 shadow-lg" 
         style="height: 450px; background: linear-gradient(to bottom, rgba(0,0,0,0) 50%, rgba(0,0,0,0.7) 100%), url('https://i.natgeofe.com/n/a86c35b9-f3cf-40ac-a70e-3c804c1a8188/GettyImages-109862623-Ubud.jpg') center/cover no-repeat;">
        <div class="d-flex align-items-end h-100 p-4 p-md-5">
            <div class="text-white">
                <span class="badge bg-warning text-dark mb-2 fw-bold">⭐ {{ $destinasi['rating'] }} / 5.0 Rating</span>
                <h1 class="display-4 fw-bold mb-0">{{ $destinasi['nama'] }}</h1>
                <p class="lead opacity-75 mb-0"><i class="bi bi-geo-alt-fill"></i> {{ $destinasi['lokasi'] }}</p>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm rounded-4 h-100">
                <div class="card-body p-4">
                    <h4 class="fw-bold mb-4">Informasi Perjalanan</h4>
                    
                    <div class="row g-3">
                        @php
                            $items = [
                                ['label' => 'Harga Tiket', 'val' => $destinasi['harga'], 'icon' => '💰', 'color' => 'text-success'],
                                ['label' => 'Durasi Tour', 'val' => $destinasi['durasi'], 'icon' => '⏳', 'color' => 'text-primary'],
                                ['label' => 'Transportasi', 'val' => $destinasi['transportasi'], 'icon' => '✈️', 'color' => 'text-info'],
                                ['label' => 'Penginapan', 'val' => $destinasi['hotel'], 'icon' => '🏨', 'color' => 'text-danger'],
                            ];
                        @endphp

                        @foreach($items as $item)
                        <div class="col-md-6">
                            <div class="info-card p-3 rounded-4 bg-light d-flex align-items-center">
                                <div class="fs-2 me-3">{{ $item['icon'] }}</div>
                                <div>
                                    <small class="text-muted d-block">{{ $item['label'] }}</small>
                                    <span class="fw-bold {{ $item['color'] }}">{{ $item['val'] }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <hr class="my-4 opacity-25">

                    <h5 class="fw-bold mb-3">Fasilitas Termasuk</h5>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($destinasi['fasilitas'] as $fasilitas)
                            <span class="badge-fasilitas badge rounded-pill bg-success-subtle text-success px-4 py-2 border border-success-subtle">
                                <i class="bi bi-check2-circle me-1"></i> {{ $fasilitas }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 bg-primary text-white p-4 h-100 d-flex flex-column justify-content-center">
                <h4 class="fw-bold">Siap Berangkat?</h4>
                <p>Dapatkan pengalaman tak terlupakan di {{ $destinasi['nama'] }} dengan layanan terbaik kami.</p>
                <div class="mt-3">
                    <button class="btn btn-light w-100 rounded-pill fw-bold py-3 mb-3">Pesan Sekarang</button>
                    <a href="{{ url('/') }}" class="btn btn-outline-light w-100 rounded-pill py-2">
                        ⬅ Kembali ke Beranda
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection