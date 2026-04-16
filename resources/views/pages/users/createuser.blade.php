@extends('master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mb-4">LOGIN</h3>

           
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action={{ route('users.store') }} method="post">
                @csrf
                
                
                <div class="form-floating mb-3">
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="floatingInputName" 
                           placeholder="Nama Lengkap" 
                           name="name" 
                           value="{{ old('name') }}" 
                           required class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
                           @error('name')
                             <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                 <label for="floatingInputName">Name</label>
                    </div>

                
                <div class="form-floating mb-3">
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="floatingInputEmail" 
                           placeholder="Email" 
                           name="email" 
                           value="{{ old('email') }}" 
                           required class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
                           @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                         @enderror
             <label for="floatingInputEmail">Email</label>
                   
                </div>

           <div class="form-floating mb-3">
                    <input type="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           id="floatingPassword" 
                           placeholder="Password" 
                           name="password" 
                           required class="from-control @error('name') is-invalid @enderror"value="{{old('name')}}" required>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="floatingPassword">Password</label>
                   </div>

                
         
                <div class="form-floating mb-3">
                    <input type="password" 
                           class="form-control" 
                           id="floatingPasswordConfirmation" 
                           placeholder="Confirm Password" 
                           name="password_confirmation" 
                           required>
                    <label for="floatingPasswordConfirmation">Confirm Password</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="/users" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection