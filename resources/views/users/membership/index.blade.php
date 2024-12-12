@extends('users.layouts.main')

@section('container')


    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    <caption>{{ session('success') }}<caption> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <caption>{{ session('error') }}</caption> 
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="container mt-5">
      <h2>cek</h2>
        
    </div>

@endsection
