@extends('layouts.app_admin')
@section('title','Create Feature')
@section('content')
 
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          @if (session('sucessMSG'))
            <div class="alert alert-success">
                {{ session('sucessMSG') }}
            </div>
          @endif

 

          <form action="{{ url('admin/features') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  placeholder="Enter Feature Title" value="{{ old('title') }}">

 

                  @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

 


                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter Feature Description">{{ old('description') }}</textarea>

 

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

 

                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon"  placeholder="Enter icon Name" value="{{ old('icon') }}">

 

                  @error('icon')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

 

                </div>
             
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </main>
@endsection