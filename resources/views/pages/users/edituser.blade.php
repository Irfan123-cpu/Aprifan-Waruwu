@extends('master')

@section('content')

      @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
<div class="container mt-4">
    <h2 class="mb-4 fw-bold">Edit User</h2>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInputName" placeholder="Nama Lengkap" name="name" value="{{ $user->name }}" required class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
            @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            <label for="floatingInputName">Name</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInputEmail" placeholder="email@example.com" name="email" value="{{ $user->email }}" required class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
             @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            <label for="floatingInputEmail">Email</label>
        </div>

        <hr class="my-4">
        <p class="text-muted small">*Kosongkan password jika tidak ingin mengubahnya.</p>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPassword" placeholder="New Password" name="password" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
             @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            <label for="floatingPassword">New Password (optional)</label>
        </div>

        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingPasswordConfirmation" placeholder="Confirm new password" name="password_confirmation" class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
             @error('name')
             <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            <label for="floatingPasswordConfirmation">Confirm New Password</label>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Update Data</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>
@endsection