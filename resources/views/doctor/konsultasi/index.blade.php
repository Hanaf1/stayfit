@extends('doctor.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Sesi Konsultasi</h2>
    </div>

    <div class="card">
        <div class="card-header bg-primary text-white">
            pasien
        </div>

        <ul class="list-group list-group-flush">
            @foreach($pasien->unique('sender_id') as $patient)
                <li class="list-group-item doctor-item" data-doctor-name="{{ $patient->sender->name }}" data-doctor-id="{{ $patient->sender_id }}">
                    <?php session(['pasienId' => $patient->sender_id]); ?>
                    <strong>{{ $patient->sender->name }}</strong>
                    <br>
                    <a href="{{ url('doctor/konsultasi/chat/'.$patient->sender_id) }}">Chat</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
