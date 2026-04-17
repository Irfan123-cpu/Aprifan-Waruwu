@extends('master')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
          
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h3 class="mb-4 text-center">TAMBAH REVIEW</h3>

                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('review.store') }}" method="POST">
                        @csrf
                        
              
                        <div class="mb-3">
                            <label for="attraction_id" class="form-label fw-bold">Pilih Atraksi</label>
                            <select id="attraction_id" 
                                    name="attraction_id" 
                                    class="form-select @error('attraction_id') is-invalid @enderror" 
                                    required>
                                <option value="" disabled {{ old('attraction_id') ? '' : 'selected' }}>
                                    -- Pilih Atraksi --
                                </option>
                                @foreach($attractions as $attraction)
                                    <option value="{{ $attraction->id }}" 
                                        {{ old('attraction_id') == $attraction->id ? 'selected' : '' }}>
                                        {{ $attraction->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('attraction_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    
      
                        <div class="form-floating mb-3">
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="floatingInputName" 
                                   placeholder="Nama Anda" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required>
                            <label for="floatingInputName">Nama Review</label>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                
                        <div class="form-floating mb-3">
                            <textarea class="form-control @error('comment') is-invalid @enderror" 
                                      id="floatingComment" 
                                      placeholder="Tulis komentar Anda di sini" 
                                      name="comment" 
                                      style="height: 150px" 
                                      required>{{ old('comment') }}</textarea>
                            <label for="floatingComment">Isi Komentar</label>
                            @error('comment')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('review.index') }}" class="btn btn-light border">Batal</a>
                            <button type="submit" class="btn btn-primary px-4">Simpan Review</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection