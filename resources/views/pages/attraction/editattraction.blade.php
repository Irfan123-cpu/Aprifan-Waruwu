@extends('master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold">Edit Atraksi</h2>

    <form action="{{ route('attraction.update', $attraction->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Pilih Destinasi --}}
        <div class="mb-3">
            <label for="destination_id" class="form-label fw-bold">Pilih Destinasi</label>
            <select id="destination_id" 
                    name="destination_id" 
                    class="form-select @error('destination_id') is-invalid @enderror" 
                    required>
                    
                <option value="" disabled {{ old('destination_id', $attraction->destination_id) ? '' : 'selected' }}>
                    -- Pilih Destinasi --
                </option>

                @foreach($destinations as $destination)
                    <option value="{{ $destination->id }}" 
                        {{ old('destination_id', $attraction->destination_id) == $destination->id ? 'selected' : '' }}>
                        {{ $destination->name }}
                    </option>
                @endforeach
            </select>

            @error('destination_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

     
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

        {{-- Tombol --}}
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Atraksi</button>
            <a href="{{ route('attraction.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection