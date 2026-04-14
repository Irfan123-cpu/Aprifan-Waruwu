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
    <h2 class="mb-0 fw-bold">Daftar User</h2>
     <form action="/users" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{request('search')}}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>


            </form>
    <a href="/users/create" class="btn btn-primary d-inline-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i> 
        <span>Daftar Users</span>
    </a>
    </div>
   

        <div class="mt-3 d-flex justify-content-center">
            {{ $users->appends(request()->input())->links('pagination::bootstrap-5') }}
        </div>

    <table class="table table-striped table-hover border">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th class="text-center">Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td><a href="/users/{{ $user->id }}">{{ $loop->iteration }}</a></td>
                    <td><strong>{{ $user->name }}</strong></td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="/user/{{ $user->id }}" class="btn btn-info btn-sm text-white">Lihat</a>
                            <a href="/user/{{ $user->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/user/{{ $user->id }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus user {{ $user->name }}?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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