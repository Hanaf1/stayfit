@extends('layouts.main')


@section('container')
<div class="container-fluid mt-5">
  <div class="row justify-content-center">
  <!-- Left side with logo -->
    <div class="col-md-6 d-flex align-items-center justify-content-center">
      <img src="img/aboutLogo.png" alt="logo" class="img-fluid" style="width: 250px">
    </div>

       <!-- Right side with login form -->
    <div class="col-md-6">
@if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('success') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
{{ session('loginError') }}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <main class="form-signin">
      <h1 class="h3 mt-5 mb-3 fw-normal text-center">Sign In</h1>
  <form action="/login" method="POST">
    @csrf
    <div class="form-floating">
      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
      <label for="email">Email address</label>
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>

    <button class="btn btn-primary w-100 py-2" type="submit">Login</button>

  </form>
  <small class="d-block text-center mt-3">
    Not Registered <a href="/register">Register Now!</a>
  </small>
    </main>
  </div>
</div>
</div>

@endsection