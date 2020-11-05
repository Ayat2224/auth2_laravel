
@extends('layouts.app_admin')
@section('title','Edit Feature')
@section('content')
 
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          @if (session('sucessMSG'))
            <div class="alert alert-success">
                {{ session('sucessMSG') }}
            </div>
          @endif

 


         {{--  @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif --}}

 


            <form action="{{ url('admin/features') }}/{{ $objFeatures->id }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  placeholder="Enter Feature Title" value="{{ $objFeatures->title }}">

 

                  @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

 

                <div class="form-group">
                  <label for="price">Description</label>
                  <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ $objFeatures->description }}</textarea>

 

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

 

 

                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon"  placeholder="Enter Icon Name" value="{{ $objFeatures->icon }}">

 

                  @error('icon')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

 

                </div>

 

             
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>
        </main>
@endsection