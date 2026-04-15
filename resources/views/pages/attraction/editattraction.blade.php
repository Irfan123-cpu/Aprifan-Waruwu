@extends('master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold">Edit Atraksi</h2>


    <form action="{{ route('attraction.update', $attraction->id) }}" method="POST">
        @csrf
        @method('PUT')

        
        <div class="form-floating mb-3">
            <input type="text" 
                   class="form-control @error('name') is-invalid @enderror" 
                   id="floatingInputName" 
                   placeholder="Nama Atraksi" 
                   name="name" 
                   value="{{ old('name', $attraction->name) }}" 
                   required>
            <label for="floatingInputName">Nama Atraksi</label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

      
        <div class="form-floating mb-3">
            <textarea class="form-control @error('description') is-invalid @enderror" 
                      id="floatingDescription" 
                      placeholder="Deskripsi" 
                      name="description" 
                      style="height: 150px" 
                      required>{{ old('description', $attraction->description) }}</textarea>
            <label for="floatingDescription">Deskripsi</label>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Atraksi</button>
            
            <a href="{{ route('attractions.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection