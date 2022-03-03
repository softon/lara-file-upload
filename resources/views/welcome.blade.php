@extends('template')

@section('content')
<div class="container">
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{ asset('assets/images/logo.png') }}" alt="" width="100" height="100">
        <h2>Upload Your File</h2>
        <p class="lead">Select an image to upload.</p>
      </div>
  
      <div class="row g-5">
        {{-- show laravel error messages --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- show success message --}}
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="col-lg-8">
          <form class="needs-validation" method="POST" action="{{ route('upload-file') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
              <div class="col-sm-12">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Select an Image</label>
                    <input class="form-control" type="file" name="file" id="formFile" accept="image/*">
                </div>
                <div class="invalid-feedback">
                  Invalid Image
                </div>
              </div>
  
              
            </div>
  
            <button class="w-100 btn btn-primary btn-lg" type="submit">Upload</button>
          </form>
        </div>
      </div>
    </main>
  
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">CCLab Prof. Shiburaj</p>
    </footer>
  </div>
@endsection