@extends('master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
           
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h6 class="mb-0">Detail Review</h6>
                    <p class="mb-1">
                        Attraction: {{ $review->attraction->name ?? 'Tidak ada atraksi' }}
                    </p>
                    <a href="{{ route('review.index') }}" class="btn btn-sm btn-light">Kembali</a>
                </div>

                <div class="card-body">
             
                    <div class="row mb-4">
                        <label class="col-sm-3 fw-bold">ID Review</label>
                        <div class="col-sm-9">
                            <span class="badge bg-secondary">#{{ $review->id }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 fw-bold">Nama Reviewer</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $review->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 fw-bold">Komentar</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext text-muted">
                                {{ $review->comment }}
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('review.edit', $review->id) }}" class="btn btn-warning">
                            Edit Review
                        </a>
                        
                        <form action="{{ route('review.destroy', $review->id) }}" method="post" 
                              onsubmit="return confirm('Yakin ingin menghapus review ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Inter', sans-serif;
    }
    .card {
        border-radius: 12px;
        border: none;
    }
    .card-header {
        border-radius: 12px 12px 0 0 !important;
    }
    .form-control-plaintext {
        line-height: 1.6;
    }
</style>
@endsection