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

<form action="{{ route('destinations.store') }}" method="POST">
    @csrf
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInputName" placeholder="Alam Mayang" name="name" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingInputName">Name Destinasi</label>
    </div>
    <div class="form-floating mb-3">
        <textarea name="description" id="floatingDescription" class="form-control" placeholder="Description"></textarea>
        <label for="floatingDescription">Description</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingLocation" placeholder="Pekanbaru" name="location" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
         @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingLocation">Lokasi</label>
    </div>
    <div class="form-floating mb-3">
        <input type="number" class="form-control" id="floatingPrice" placeholder="20000" name="ticket_price" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
         @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingPrice">Harga Tiket</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingHours" placeholder="08.00 - 17.00" name="working_hours" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
         @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingHours">Jam Operasional</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingDays" placeholder="Setiap Hari" name="working_days" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
         @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
        <label for="floatingDays">Hari Operasional</label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
        