@extends('users.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Konsultasi</h2>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            Available Doctors
        </div>

        <ul class="list-group list-group-flush">
            @foreach($doctors as $doctor)
                <li class="list-group-item doctor-item" data-doctor-name="{{ $doctor->name }}" data-doctor-id="{{ $doctor->id }}">
                    <strong>{{ $doctor->name }}</strong>
                    <br>
                    <span class="text-muted">Specialization: {{ $doctor->specialization }}</span>
                    <br>
               <?php session(['doctor_id' => $doctor->id]); ?>
                    <a href="{{ url('users/konsulDoc/chat/'.$doctor->id) }}">Chat with {{ $doctor->name }}</a>
                </li>
            @endforeach
        </ul>
    </div>


    
@endsection
