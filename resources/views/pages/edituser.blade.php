@extends('master')

@section('content')

<form action="/users/{{ $user->id }}/update" method="post">
    @csrf
    @method('PUT')
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInputName" placeholder="Nama Lengkap" name="name" value="{{ $user->name }}" required>
        <label for="floatingInputName">Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInputEmail" placeholder="email@example.com" name="email" value="{{ $user->email }}" required>
        <label for="floatingInputEmail">Email</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPassword" placeholder="Leave blank to keep current password" name="password">
        <label for="floatingPassword">New Password (optional)</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingPasswordConfirmation" placeholder="Confirm new password" name="password_confirmation">
        <label for="floatingPasswordConfirmation">Confirm New Password</label>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection