@extends('master')

@section('content')
<div class="container mt-4">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0 fw-bold">Daftar Review</h2>
        
        
        <form action="{{ route('review.index') }}" method="GET">
            <div class="input-group">
                <input type="text" 
                       class="form-control" 
                       placeholder="Cari nama reviewer..." 
                       name="search" 
                       value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <a href="{{ route('review.create') }}" 
           class="btn btn-primary d-inline-flex align-items-center gap-2">
            <i class="bi bi-plus-lg"></i> 
            <span>Tambah Review</span>
        </a>
    </div>

    <table class="table table-striped table-hover border">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Reviewer</th>
                <th>Atraksi</th>
                <th>Komentar</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reviews as $a)
                <tr>
                    <td>
                        {{ ($reviews->currentPage() - 1) * $reviews->perPage() + $loop->iteration }}
                    </td>

                    <td><strong>{{ $a->name }}</strong></td>

                    <td>
                        {{ $a->attraction->name ?? '-' }}
                    </td>

                    <td>
                        {{ \Illuminate\Support\Str::limit($a->comment, 70) }}
                    </td>

                    <td class="text-center">
                        <div class="btn-group">
                            <a href="{{ route('review.show', $a->id) }}" 
                               class="btn btn-info btn-sm text-white">Lihat</a>

                            <a href="{{ route('review.edit', $a->id) }}" 
                               class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="{{ route('review.destroy', $a->id) }}" 
                                  method="POST" 
                                  style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus review {{ $a->name }}?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">

                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    
    <div class="mt-3 d-flex justify-content-center">
        {{ $reviews->appends(request()->input())->links('pagination::bootstrap-5') }}
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