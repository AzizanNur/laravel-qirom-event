@extends('dashboard.layouts.main')

@section('container')
   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Event</h1>
  </div> 

  <div class="col-lg-8">
      <form method="POST" action="/dashboard/events" class="mb-5" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title') }}">                  
          @error('title')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>

        <div class="mb-3">
          <label for="image" class="form-label @error('image') is-invalid @enderror">Image</label>
          <img class="img-preview img-fluid mb-3 col-sm-5 d-block" />
          <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
          @error('image')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>     
                 
        <div class="mb-3">
          <label for="text_button" class="form-label">Text Button</label>
          <input type="text" class="form-control @error('text_button') is-invalid @enderror" id="text_button" name="text_button" required autofocus value="{{ old('text_button') }}">                  
          @error('text_button')
            <div class="invalid-feedback">
              {{ $message }}
            </div>  
          @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
  </div>

  <script>
      const title = document.querySelector('#title');
      const slug  = document.querySelector('#slug');

      title.addEventListener('change', function(){
          fetch('/dashboard/events/checkSlug?title='+title.value)
          .then(response => response.json())
          .then(data => {
            document.querySelector('#slug').value = data.slug;
          })
      });

      document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
      })

      function previewImage(){
        const image = document.querySelector("#image");
        const imgPreview = document.querySelector('.img-preview');
        const blob = URL.createObjectURL(image.files[0]);
        imgPreview.src = blob;
        console.log(image);
      }
  </script>
@endsection