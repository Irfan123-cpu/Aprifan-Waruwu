@extends('master')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 fw-bold">Edit Review</h2>

    <form action="{{ route('review.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

    
        <div class="mb-3">
            <label for="attraction_id" class="form-label fw-bold">Pilih Atraksi</label>
            <select id="attraction_id" 
                    name="attraction_id" 
                    class="form-select @error('attraction_id') is-invalid @enderror" 
                    required>
                <option value="">-- Pilih Atraksi --</option>
                @foreach($attractions as $attraction)
                    <option value="{{ $attraction->id }}" 
                        {{ old('attraction_id', $review->attraction_id) == $attraction->id ? 'selected' : '' }}>
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
                   placeholder="Nama Review" 
                   name="name" 
                   value="{{ old('name', $review->name) }}" 
                   required>
            <label for="floatingInputName">Nama Review</label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

      
        <div class="form-floating mb-3">
            <textarea class="form-control @error('comment') is-invalid @enderror" 
                      id="floatingComment" 
                      placeholder="Isi Komentar" 
                      name="comment" 
                      style="height: 150px" 
                      required>{{ old('comment', $review->comment) }}</textarea>
            <label for="floatingComment">Isi Komentar</label>
            @error('comment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

   
        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Review</button>
            <a href="{{ route('review.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection