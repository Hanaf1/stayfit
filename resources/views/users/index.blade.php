@extends('users.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class=""> Welcome back, {{ auth()->user()->name }}</h2>
    </div>

    <div class="container">
      <h5>Health Tips Today</h5>
        <div class="row">
            @for ($i = 0; $i < 6; $i++)
                <div class="col-md-4 mb-4">
                    <div class="card text-bg-light" style="max-width: 18rem;">
                        <img src="https://source.unsplash.com/1200x1200?health&{{ generateRandomString() }}" class="card-img-top" alt="Random Health Image">
                        <div class="card-body">
                            <p class="card-text">{{ generateRandomHealthTip() }}</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection

@php
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

function generateRandomHealthTip() {
    $tips = [
        "Taking short breaks to stretch and move around during your workday can help improve circulation, reduce muscle tension, and boost overall productivity.",
        "Eating a balanced diet with plenty of fruits, vegetables, and whole grains is essential for maintaining good health.",
        "Getting enough quality sleep is crucial for both physical and mental well-being. Aim for 7-9 hours of sleep per night.",
        "Staying hydrated is key to supporting various bodily functions. Aim to drink at least 8 glasses of water each day.",
        "Regular exercise is not only good for your body but also for your mind. Find an activity you enjoy and make it a part of your routine.",
    ];

    // Choose a random tip from the array
    $randomTip = $tips[array_rand($tips)];

    return $randomTip;
}
@endphp
