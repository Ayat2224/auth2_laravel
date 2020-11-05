
@extends('layouts.app_admin')
@section('title','Show Features')
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
                  <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"  placeholder="Enter Feature Title" value="{{ $objFeatures->title }}" readonly>

 

                  @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>
                 <div class="form-group">
                  <label for="description">Description</label>
                  <textarea  readonly class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter Feature Description">{{ $objFeatures->description }}</textarea>

 

                  @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>

 

                <div class="form-group">
                  <label for="icon">Icon</label>
                  <input type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" name="icon"  placeholder="Enter Icon Name" value="{{ $objFeatures->icon }}" readonly>

 

                  @error('icon')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror

 

                </div>            
             
                
             </form>
        </main>
@endsection 