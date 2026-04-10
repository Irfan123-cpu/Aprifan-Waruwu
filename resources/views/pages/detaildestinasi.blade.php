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
            <h2 class="fw-bold text-primary mb-3">{{$destinations->name}}</h2>
            <h5 class="fw-bold">Tentang Destinasi</h5>
            <p class="text-secondary lh-lg">
                {{$destinations->description}}
            </p>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="card-title mb-0"><i class="bi bi-info-circle me-2"></i>Informasi Perjalanan</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <tbody>
                            <tr>
                                <th class="bg-light ps-4" style="width: 40%;">ID Destinasi</th>
                                <td class="ps-3">{{$destinations->id}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light ps-4">Location</th>
                                <td class="ps-3 small">{{$destinations->location}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light ps-4">Working Hours</th>
                                <td class="ps-3">{{$destinations->working_hours}}</td>
                            </tr>
                            <tr>
                                <th class="bg-light ps-4">Working Days</th>
                                <td class="ps-3"><span class="badge bg-info text-dark">{{$destinations->working_days}}</span></td>
                            </tr>
                            <tr>
                                <th class="bg-light ps-4">Ticket Price</th>
                                <td class="ps-3 fw-bold text-success">{{$destinations->ticket_price}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white p-3">
                    <button class="btn btn-primary w-100 py-2 fw-bold">Pesan Tiket Sekarang</button>
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

<style>
    /* Menjaga tampilan agar mirip dengan vibe "Pariwisata By Aprifan" */
    body {
        background-color: #f8f9fa;
        font-family: 'Inter', sans-serif;
    }
    .table th {
        font-weight: 600;
        color: #495057;
    }
    .breadcrumb-item a {
        color: #0d6efd;
        text-decoration: none;
    }
</style>
@endsection