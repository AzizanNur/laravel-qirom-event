@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
  </div> 

  <div class="col-lg-8">
      <form method="POST" action="/dashboard/events/{{ $post->id }}" class="mb-5" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}">                  
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>
                 
        <div class="mb-3"> 
          <label for="image" class="form-label @error('image') is-invalid @enderror">Post Image</label>
          @if ($post->image)
            <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage') .'/'.  $post->image}}" />  
          @else
            <img class="img-preview img-fluid mb-3 col-sm-5" />
          @endif
          <input class="form-control" type="hidden" id="image_old" name="image_old" value="{{ $post->image }}">
          <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
          
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div> 
        
        <div class="mb-3">
          <label for="text_button" class="form-label">Text Button</label>
          <input type="text" class="form-control @error('text_button') is-invalid @enderror" id="text_button" name="text_button" required autofocus value="{{ old('title', $post->text_button) }}">                  
          @error('text_button')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>

  <script>
      function previewImage(){
        const image = document.querySelector("#image");
        const imgPreview = document.querySelector('.img-preview');
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
        console.log(image);
      }
  </script>
@endsection