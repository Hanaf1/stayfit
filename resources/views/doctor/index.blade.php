@extends('doctor.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class="h2">Welcome back, Dr {{ auth()->user()->name }}</h2>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    Today's Appointments
                </div>
                <div class="card-body">
                    <p class="card-text">You have some appointments scheduled for today. Stay updated!</p>
                    <ul>
                        <li>Patient: John Doe</li>
                        <li>Time: 10:00 AM</li>
                        <li>Reason: Follow-up checkup</li>
                    </ul>
                    {{-- <a href="#" class="btn btn-primary">View Appointments</a> --}}
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">
                    Recent Consultations
                </div>
                <div class="card-body">
                    <p class="card-text">Catch up on your recent consultations and follow-ups.</p>
                    <ul>
                        <li>Patient: Jane Smith</li>
                        <li>Date: 2023-12-08</li>
                        <li>Diagnosis: Flu, prescribed medication</li>
                    </ul>
                    {{-- <a href="#" class="btn btn-primary">View Consultations</a> --}}
                </div>
            </div>
        </div>
    </div>
    
@endsection
