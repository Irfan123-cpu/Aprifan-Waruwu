@extends('master')

@section('content')

<div class="container mt-4">

    {{-- Error --}}
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

        {{-- Gambar --}}
        <div class="mb-3">
            <label class="form-label">Gambar Destinasi</label>
            <input type="file" 
                   name="image" 
                   class="form-control @error('image') is-invalid @enderror" 
                   accept="image/*">
            
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nama --}}
        <div class="form-floating mb-3">
            <input type="text" 
                   name="name" 
                   class="form-control @error('name') is-invalid @enderror"
                   id="floatingName"
                   placeholder="Nama Destinasi"
                   value="{{ old('name') }}" 
                   required>
            <label for="floatingName">Nama Destinasi</label>

            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Deskripsi --}}
        <div class="form-floating mb-3">
            <textarea name="description" 
                      class="form-control @error('description') is-invalid @enderror"
                      id="floatingDescription"
                      placeholder="Deskripsi"
                      style="height: 150px"
                      required>{{ old('description') }}</textarea>
            <label for="floatingDescription">Deskripsi</label>

            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Lokasi --}}
        <div class="form-floating mb-3">
            <input type="text" 
                   name="location" 
                   class="form-control @error('location') is-invalid @enderror"
                   id="floatingLocation"
                   placeholder="Lokasi"
                   value="{{ old('location') }}" 
                   required>
            <label for="floatingLocation">Lokasi</label>

            @error('location')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Harga --}}
        <div class="form-floating mb-3">
            <input type="number" 
                   name="ticket_price" 
                   class="form-control @error('ticket_price') is-invalid @enderror"
                   id="floatingPrice"
                   placeholder="Harga"
                   value="{{ old('ticket_price') }}" 
                   required>
            <label for="floatingPrice">Harga Tiket</label>

            @error('ticket_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jam --}}
        <div class="form-floating mb-3">
            <input type="text" 
                   name="working_hours" 
                   class="form-control @error('working_hours') is-invalid @enderror"
                   id="floatingHours"
                   placeholder="Jam Operasional"
                   value="{{ old('working_hours') }}" 
                   required>
            <label for="floatingHours">Jam Operasional</label>

            @error('working_hours')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Hari --}}
        <div class="form-floating mb-3">
            <input type="text" 
                   name="working_days" 
                   class="form-control @error('working_days') is-invalid @enderror"
                   id="floatingDays"
                   placeholder="Hari Operasional"
                   value="{{ old('working_days') }}" 
                   required>
            <label for="floatingDays">Hari Operasional</label>

            @error('working_days')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>

</div>
@endsection