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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User Profile</div>

                    <div class="card-body text-center">
                     
                        <img src="{{ asset('storage/' . $profile->photo) }}" alt="Profile Picture" class="rounded-circle mb-3" style="width: 150px; height: 150px;">

                    
                        <p><strong>Name: </strong> {{ Auth::user()->name }}</p>
                        <p><strong>Gender:</strong> {{ $profile ? $profile->gender : 'N/A' }}</p>
                        <p><strong>Date of Birth:</strong> {{ $profile ? $profile->birth : 'N/A' }}</p>
                       <p><strong>Membership status:</strong> {{ $profile ? ($profile->is_membership ? 'Membership account' : 'Not membership account') : 'N/A' }}</p>
              
                        <div class="mt-4">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfile">
                                Edit Profile
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->

    <div class="modal fade modal-lg" id="editProfile" tabindex="-1" aria-labelledby="editProfileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editProfileLabel">Edit Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">

                        <div class="mb-3 d-flex flex-column">
                            <label for="gender">Gender</label>
                            <select class="form-select" id="gender" name="gender" required>
                                <option value="Male" @if ($profile->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($profile->gender == 'Female') selected @endif>Female</option>
                            </select>
                        </div>

                        <div class="mb-3 d-flex flex-column">
                            <label for="birth">Birth</label>
                            <input type="date" class="form-control" id="birth" name="birth" value="{{ $profile->birth }}" required>
                        </div>

                        <div class="mb-3 d-flex flex-column">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 

@endsection
