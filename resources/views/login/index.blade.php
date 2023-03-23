@extends('layouts.main')

@section('container')
<style>
    .form-signin .checkbox {
    font-weight: 400;
  }
  
  .form-signin .form-floating:focus-within {
    z-index: 2;
  }
  
  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }
  
  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }

  .form-registration input{
    border-radius: 0;
    margin-bottom: -1px;
  }

</style>
<div class="row justify-content-center">
        <div class="col-md-4">
            <main class="form-signin">
                @if (session()->has('success'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success'); }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                @if (session()->has('loginError'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError'); }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif

                <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>              
                <form action="/login" method="post">
                  @csrf
                  <div class="form-floating">
                    <input type="email" value="{{ old('email') }}" autofocus required name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="form-floating">
                    <input type="password" name="password" required class="form-control" id="password" placeholder="Password">
                    <label for="password">Password</label>
                  </div>
                  
                  <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>                 
                </form>
                <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now</a></small>
              </main>
        </div>
    </div>
    
@endsection