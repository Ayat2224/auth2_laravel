@extends('layouts.app_admin')
@section('title','Edit Speakers')
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


          <form action="{{ url('admin/speakers') }}/{{ $objSpeaker->id }}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                  <div class="form-group">
                  <label for="name">Speaker Name</label>
                  <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"  placeholder="Enter Course Name" value="{{ $objSpeaker->name }}" readonly>

                  @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <div class="form-group">
                  <label for="position">Position</label>
                  <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position"  placeholder="Enter Course Position" value="{{ $objSpeaker->position }} "readonly>

                  @error('position')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                
             
             </form>
        </main>
@endsection