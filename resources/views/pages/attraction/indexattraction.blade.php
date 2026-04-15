@extends('master')

@section('content')
<div class="container mt-4">

    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 fw-bold">Daftar Atraksi</h2>
        
       
        <form action="{{ route('attraction.index') }}" method="GET">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Cari nama atraksi..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

 
        <a href="{{ route('attraction.create') }}" class="btn btn-primary d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> 
            <span>Tambah Atraksi</span>
        </a>
    </div>

    <table class="table table-striped table-hover border">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Atraksi</th>
                <th>Deskripsi</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($attraction as $a)
                <tr>
            
                 <td>{{ ($attraction->currentPage() - 1) * $attraction->perPage() + $loop->iteration }}</td>
                  <td><strong>{{ $a->name }}</strong></td>
                   <td>{{ Str::limit($a->description, 70) }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="{{ route('attraction.show', $a->id) }}" class="btn btn-info btn-sm text-white">Lihat</a>
                            <a href="{{ route('attraction.edit', $a->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                    
                            <form action="{{ route('attraction.destroy', $a->id) }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus atraksi {{ $a->name }}?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Data atraksi tidak ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    <div class="mt-3 d-flex justify-content-center">
        {{ $attraction->appends(request()->input())->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let alertElement = document.querySelector('.alert');
        if (alertElement) {
            setTimeout(() => {
                alertElement.style.transition = "opacity 1s ease-out";
                alertElement.style.opacity = "0";
                setTimeout(() => {
                    alertElement.remove();
                }, 1000);
            }, 2000); 
        }
    });
</script>
@endpush