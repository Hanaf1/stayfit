<!-- resources/views/recommendations/show.blade.php -->

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
<strong>{{ session('error') }}</strong> 
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Rekomendasi Nutrisi</h2>
    </div>

    <div class="row">
        @foreach($nutrisi as $index => $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://source.unsplash.com/500x500?{{ $item->makanan }}" class="card-img-top" alt="{{ $item->makanan }}">
                    <div class="card-body">
                        <h5 class="card-title">Makanan: {{ $item->makanan }}</h5>
                        <p class="card-text">Minuman: {{ $item->minuman }}</p>
                        <p class="card-text">Hari: {{ $item->day }}</p>

                       
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
