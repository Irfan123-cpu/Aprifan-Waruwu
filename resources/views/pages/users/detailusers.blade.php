@extends('master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
           
                <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Detail Profil User</h5>
                    
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-light"> Kembali</a>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-sm-3 fw-bold">ID User</label>
                        <div class="col-sm-9">
                            <span class="badge bg-secondary">#{{ $user->id }}</span>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 fw-bold">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $user->name }}</p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-3 fw-bold">Alamat Email</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext">{{ $user->email }}</p>
                        </div>
                    </div>

                  
                    <div class="row mb-3">
                        <label class="col-sm-3 fw-bold">Status Akun</label>
                        <div class="col-sm-9">
                            <p class="form-control-plaintext text-success">
                                <i class="bi bi-check-circle-fill"></i> Terverifikasi
                            </p>
                        </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end gap-2">
                        
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                             Edit Data
                        </a>
                        
                     
                        <form action="{{ route('users.destroy', $user->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus Akun</button>
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
</style>
@endsection