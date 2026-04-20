@extends('master')

@section('content')

<div class="container mt-4">

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div> 
    @endif

    <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

      
        <div class="form-floating mb-3">
            <input type="file" 
                   name="image" 
                   class="form-control @error('image') is-invalid @enderror"
                   accept=".jpg,.jpeg,.png">
            
            <label>Gambar Destinasi</label>

            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-floating mb-3">
            <input type="text" 
                   name="name" 
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Nama Destinasi"
                   value="{{ old('name') }}" 
                   required>

            <label>Nama Destinasi</label>

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    
        <div class="form-floating mb-3">
            <textarea name="description" 
                      class="form-control @error('description') is-invalid @enderror"
                      style="height: 120px"
                      required>{{ old('description') }}</textarea>

            <label>Deskripsi</label>

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

     
        <div class="form-floating mb-3">
            <input type="text" 
                   name="location" 
                   class="form-control @error('location') is-invalid @enderror"
                   value="{{ old('location') }}"
                   required>

            <label>Lokasi</label>

            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <div class="form-floating mb-3">
            <input type="number" 
                   name="ticket_price" 
                   class="form-control @error('ticket_price') is-invalid @enderror"
                   value="{{ old('ticket_price') }}"
                   required>

            <label>Harga Tiket</label>

            @error('ticket_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

   
        <div class="form-floating mb-3">
            <input type="text" 
                   name="working_hours" 
                   class="form-control @error('working_hours') is-invalid @enderror"
                   value="{{ old('working_hours') }}"
                   required>

            <label>Jam Operasional</label>

            @error('working_hours')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    
        <div class="form-floating mb-3">
            <input type="text" 
                   name="working_days" 
                   class="form-control @error('working_days') is-invalid @enderror"
                   value="{{ old('working_days') }}"
                   required>

            <label>Hari Operasional</label>

            @error('working_days')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@endsection