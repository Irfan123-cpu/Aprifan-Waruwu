@extends('master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mb-4">TAMBAH ATRAKSI</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('attraction.store') }}" method="post">
                @csrf
                
                <div class="mb-3">
                    <label for="destination_id" class="form-label">Destination</label>
                    <select id="destination_id" 
                            name="destination_id" 
                            class="form-control @error('destination_id') is-invalid @enderror" 
                            required>
                        <option value="">Select Destination</option>
                        @foreach($destinations as $destination)
                            <option value="{{ $destination->id }}" 
                                {{ old('destination_id') == $destination->id ? 'selected' : '' }}>
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
                           value="{{ old('name') }}" 
                           required>
                    <label for="floatingInputName">Nama Atraksi</label>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="floatingDescription" 
                              placeholder="Deskripsi Atraksi" 
                              name="description" 
                              style="height: 120px" 
                              required>{{ old('description') }}</textarea>
                    <label for="floatingDescription">Deskripsi</label>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <a href="/users" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan Atraksi</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection