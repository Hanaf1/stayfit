@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2 class=""> Welcome back, admin: {{ auth()->user()->name }}</h2>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Users</h5>
                    <p class="card-text">{{ $totalUsers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Doctors</h5>
                    <p class="card-text">{{ $totalDoctors }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
