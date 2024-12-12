@extends('admin.layouts.main')

@section('container')
    <div class="container-fluid">
        <h1>User Settings</h1>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
            Create New User
        </button>
        

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


        <!-- Modal -->
        <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Your create form goes here -->
                        <form action="{{ route('settings.store') }}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="text">Role:</label>
                            <select class="form-select" name="role" aria-label="Default select example">
                                <option selected>Select Role</option>
                                <option value=0>User</option>
                                <option value=1>Doctor</option>
                                <option value=2>Admin</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered mt-3">
                <thead class="thead-dark">
                <tr>
                <th class="table-danger">Name</th>
                <th class="table-danger">Email</th>
                <th class="table-danger">Role</th>
                <th class="table-danger">Actions</th>
                </tr>
                </thead>
                <tbody>
                     @foreach($users as $index => $item)
                        <tr>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                @if ($item->role == 0)
                                    User
                                @elseif ($item->role == 1)
                                    Dokter
                                @elseif ($item->role == 2)
                                    Admin
                                @else
                                    Unknown Role
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit{{$index}}">
                                <i class="bi bi-pencil-fill"></i> 
                                </a>

                                <div class="modal fade" id="edit{{$index}}" tabindex="-1" aria-labelledby="edit{{$index}}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createUserModalLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Your edit form goes here -->
                                                <form action="{{ route('settings.update', $item->id) }}" method="POST" >
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="name">Name:</label>
                                                        <input type="text" name="name" class="form-control" required   value="{{ $item->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="username">Username:</label>
                                                        <input type="text" name="username" class="form-control" required  value="{{ $item->username}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email:</label>
                                                        <input type="email" name="email" class="form-control" required  value="{{ $item->email }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password:</label>
                                                        <input type="password" name="password" class="form-control" required value="{{ $item->password }}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="text">Role:</label>
                                                        <select class="form-select" name="role" aria-label="Default select example">
                                                            <option selected>Select Role</option>
                                                            <option value=0 {{ $item->role == '0' ? 'selected' : '' }}>User</option>
                                                            <option value=1 {{ $item->role == '1' ? 'selected' : '' }}>Doctor</option>
                                                            <option value=2 {{ $item->role == '2' ? 'selected' : '' }}>Admin</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit"name="updateUser" class="btn btn-primary">Save Changes</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <form action="{{ route('settings.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="deleteUser" class="btn btn-danger"  onclick="return confirm('Are you sure?')">
                            <i class="bi bi-trash-fill"></i> 
                            </button>
                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
