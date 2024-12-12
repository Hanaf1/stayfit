@extends('admin.layouts.main')

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
        <h2>Kelola Rekomendasi</h2>
    </div>
    <!-- Add Button -->
    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#createUserModal">
        Tambah Nutrisi
    </button>


    <div class="row">
        @foreach($nutrisi as $index => $item)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://source.unsplash.com/500x500?{{ $item->makanan }}" class="card-img-top" alt="{{ $item->makanan }}">
                    <div class="card-body">
                        <h5 class="card-title">Makanan: {{ $item->makanan }}</h5>
                        <p class="card-text">Minuman: {{ $item->minuman }}</p>
                        <p class="card-text">Hari: {{ $item->day }}</p>

                        <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$index}}">Edit</a>

                        <!-- Modal edit -->
                            <div class="modal fade" id="edit{{$index}}" tabindex="-1" aria-labelledby="edit{{$index}}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="createUserModalLabel">Edit Nutrisi</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{ route('nutrisi.update', ['nutrisi' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="makanan"> Makanan</label>
                                                <input type="text" name="makanan" class="form-control" required value="{{ $item->makanan }}"> 
                                            </div>
                                            <div class="form-group">
                                                <label for="minuman">Minuman :</label>
                                                <input type="text" name="minuman" class="form-control" required value="{{ $item->minuman }}">
                                            </div>
                                            <input type="hidden" name="activity_type" value="{{ $item->activity_type }}">
                                            <div class="form-group">
                                                <label for="text">Hari:</label>
                                                <select class="form-select" name="day">
                                                    <option selected disabled>Pilih Hari Untuk Nutrisi</option>
                                                    <option value="Monday" {{ $item->day == 'Monday' ? 'selected' : '' }}>Monday</option>
                                                    <option value="Tuesday" {{ $item->day == 'Tuesday' ? 'selected' : '' }}>Tuesday</option>
                                                    <option value="Wednesday" {{ $item->day == 'Wednesday' ? 'selected' : '' }}>Wednesday</option>
                                                    <option value="Thursday" {{ $item->day == 'Thursday' ? 'selected' : '' }}>Thursday</option>
                                                    <option value="Friday" {{ $item->day == 'Friday' ? 'selected' : '' }}>Friday</option>
                                                    <option value="Saturday" {{ $item->day == 'Saturday' ? 'selected' : '' }}>Saturday</option>
                                                    <option value="Sunday" {{ $item->day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning">Edit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                      
                        <!-- Delete Button -->
                        <form action="{{ route('nutrisi.destroy', ['nutrisi' => $item->id]) }}" method="post" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="deleteNutrisi" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal add -->
    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Add Nutrition</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('nutrisi.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="makanan"> Makanan</label>
                            <input type="text" name="makanan" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="minuman">Minuman :</label>
                            <input type="text" name="minuman" class="form-control" required>
                        </div>
                        <input type="hidden" name="activity_type" value="{{ $item->activity_type }}">
                        <div class="form-group">
                            <label for="text">Hari:</label>
                            <select class="form-select" name="day">
                                <option selected>Pilih Hari Untuk Nutrisi</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="addNutrisi" class="btn btn-primary">Add Nutrisi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
