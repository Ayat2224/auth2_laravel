@extends('layouts.app_admin')
@section('title','Show Category Gallery')
@section('content')
 
        
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
          @if (session('sucessMSG'))
            <div class="alert alert-success">
                {{ session('sucessMSG') }}
            </div>
          @endif
 
           
 
          <form action="{{ url('admin/categorygallery') }}/{{ $objCategoryGallery->id }}" method="post">
                @method('patch')
                @csrf
                <div class="form-group">
                  <label for="name">Category Gallery Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  placeholder="Enter  Category Gallery Name" value="{{ $objCategoryGallery->name }}" readonly>
 
                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
 
                
             </form>
        </main>
@endsection