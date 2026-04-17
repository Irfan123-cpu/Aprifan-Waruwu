@extends('master')

@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
           <hr>
        </div>
    </div>

    <div class="row g-5">
    
        <div class="col-lg-7">
            <h2 class="fw-bold text-primary mb-3">{{ $destination->name }}</h2>
            <h5 class="fw-bold">Tentang Destinasi</h5>
            <p class="text-secondary lh-lg">
                {{ $destination->description }}
            </p>
        </div>

   
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-info-circle me-2"></i>Informasi Perjalanan
                    </h5>
                </div>

             
                @if($destination->image)
                    <img src="{{ asset('storage/images/' . $destination->image) }}" 
                         alt="{{ $destination->name }}" 
                         class="img-fluid"
                         style="max-height: 250px; object-fit: cover;">
                @else
                    <div class="text-center p-4 text-muted">
                        Tidak ada gambar
                    </div>
                @endif

                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tbody>
                            <tr>
                                <th class="bg-light ps-4" style="width: 40%;">ID</th>
                                <td class="ps-3">{{ $destination->id }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light ps-4">Lokasi</th>
                                <td class="ps-3 small">{{ $destination->location }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light ps-4">Jam Operasional</th>
                                <td class="ps-3">{{ $destination->working_hours }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light ps-4">Hari Operasional</th>
                                <td class="ps-3">
                                    <span class="badge bg-info text-dark">
                                        {{ $destination->working_days }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light ps-4">Harga Tiket</th>
                                <td class="ps-3 fw-bold text-success">
                                    Rp {{ number_format($destination->ticket_price, 0, ',', '.') }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer bg-white p-3">
                    <button class="btn btn-primary w-100 py-2 fw-bold">
                        Pesan Tiket Sekarang
                    </button>
                </div>
            </div>

         
            <div class="mt-4 p-3 bg-warning bg-opacity-10 border border-warning border-opacity-25 rounded-3">
                <small class="text-dark">
                    <strong>Catatan:</strong> Harga tiket dapat berubah sewaktu-waktu tergantung kebijakan pengelola setempat.
                </small>
            </div>
        </div>
    </div>
</div>
@endsection