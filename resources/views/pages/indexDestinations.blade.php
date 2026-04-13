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
    <h2 class="mb-0 fw-bold">Daftar Destinasi</h2>
     <form action="/destinations" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." name="search" value="{{request('search')}}">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>


            </form>
    <a href="/destination/create" class="btn btn-primary d-inline-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i> 
        <span>Tambah Destinasi</span>
    </a>
    </div>
   

  <div class="mt-3 d-flex justify-content-center">
        {{ $destinations->appends(request()->input())->links('pagination::bootstrap-5') }}
    </div>
</div>
    </div>
        <table class="table table-striped table-hover border">

            <thead class="table-dark">
                <tr>
                    <th>no</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Location</th>
                    <th>Working Hours</th>
                    <th>Working Days</th>
                    <th>Ticket Price</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($destinations as $d)
                <tr>
                    <td><a href="/destinations/{{ $d->id }}">{{ $loop->iteration }}</a></td>
                    <td><strong>{{ $d->name }}</strong></td>
                    <td>{{ Str::limit($d->description, 50) }}</td> 
                    <td>{{ $d->location }}</td>
                    <td>{{ $d->working_hours }}</td>
                    <td>{{ $d->working_days }}</td>
                    <td>Rp{{ number_format($d->ticket_price, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="/destinations/{{$d->id}}" class="btn btn-info btn-sm text-white">View</a>
                            <a href="/destinations/{{$d->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                            
                            <form action="/destinations/{{ $d->id }}" method="post" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure delete ({{ $d->name }})?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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