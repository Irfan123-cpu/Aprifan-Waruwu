@extends('master')

@section('content')

  @if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div> 
    @endif
<form action="{{ route('destinations.store') }}" method="post">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInputName" placeholder="Alam Mayang" name="name" value="{{ $destination->name }}" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
         @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingInputName">Name Destinasi</label>
    </div>
    <div class="form-floating mb-3">
    <textarea name="description" id="" class="form-control" placeholder="Description">{{ $destination->description }}</textarea>
    <label for="description">Description</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingLocation" placeholder="Pekanbaru" name="location"value="{{ $destination->location }}" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
        <label for="floatingLocation">Lokasi</label>
           @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingPrice" placeholder="20000" name="ticket_price"value="{{ $destination->ticket_price }}" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
         @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingPrice">Harga Tiket</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingHours" placeholder="08.00 - 17.00" name="working_hours"value="{{ $destination->working_hours }}" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
         @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingHours">Jam Operasional</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingDays" placeholder="Setiap Hari" name="working_days"value="{{ $destination->working_days }}" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
            @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingDays">Hari Operasional</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
        