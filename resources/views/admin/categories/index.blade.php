@extends('admin.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h2 class="">Post Categories</h2>
    </div>

    @if(session()->has('success'))
     <div class="alert alert-success col-lg-6" role="alert">
{{ session('success') }}
</div>
    @endif

    <a href="/admin/categories/create" class="btn btn-primary mb-3">Create new category</a>
     <div class="table-responsive col-lg-6">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->name }}</td>
              <td>
                <a href="/admin/categories/{{ $category->slug }}" class="badge bg-info"><i class="bi bi-eye"></i></a>
                <a href="/admin/categories/{{ $category->slug }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"></i></a>
                <form action="/admin/categories/{{ $category->slug }}"  method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0 " onclick="return confirm('are u sure delete this ?')"><i class="bi bi-x-circle"></i></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection


