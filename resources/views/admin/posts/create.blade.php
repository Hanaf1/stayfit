@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h2 class=""> Create New Post</h2>
  </div>
<div class="col-lg-8">
<form method="post" action="/admin/posts" class="mb-5" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Title</label>
    <input type="text" class="form-control @error('title') is-invalid  @enderror" id="title" name="title" required  autofocus value="{{ old('title') }}">
  @error('title')
<div class="invalid-feedback">
  {{ $message }}
</div>
  @enderror
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid  @enderror" id="slug" name="slug" required value="{{ old('slug') }}">
     @error('slug')
<div class="invalid-feedback">
  {{ $message }}
</div>
  @enderror
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Category</label>
<select class="form-select" name="category_id">
  @foreach ($categories as $category)
  @if(old('category_id') == $category->id)
  <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
  @else
  <option value="{{ $category->id }}">{{ $category->name }}</option>
  @endif
  @endforeach
</select>
  </div>

  <div class="mb-3">
  <label for="image" class="form-label">Post image</label>
  <img class="img-preview img-fluid mb-3 col-sm-5">
  <input class="form-control @error('image') is-invalid  @enderror" " type="file" id="image" name="image" onchange="previewImage()">
    @error('image')
<div class="invalid-feedback">
  {{ $message }}
</div>
  @enderror
  </div>
  
  <div class="mb-3">
    <label for="body" class="form-label">Body</label>
    @error('body')
    <p  class="text-danger">{{ $message }}</p>
    @enderror
    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
    <trix-editor input="body"></trix-editor>
  </div>

  <button type="submit" class="btn btn-primary">Create post</button>
</form>

</div>



<script>
  const title = document.querySelector('#title');
  const slug = document.querySelector('#slug');

  title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  })

    document.addEventListener('trix-initialize', function (event) {
        // Find the toolbar and set its data-trix-button-group attribute
        var toolbar = event.target.toolbarElement;
        toolbar.setAttribute('data-trix-button-group', 'text-tools');
    });

  function previewImage(){
  const image = document.querySelector('#image'); // Add quotes around #image
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';

  const fileReader = new FileReader(); // Change 'ofReader' to 'fileReader'
  fileReader.readAsDataURL(image.files[0]);

  fileReader.onload =  function(oFREvent){
    imgPreview.src = oFREvent.target.result;
  }
}


</script>





@endsection
