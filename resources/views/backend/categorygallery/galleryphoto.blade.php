@extends('layouts.app_admin')
@section('title','Show Gallery')
@section('content')
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
            @endif
 
             
            <form action="{{ url('admin/gallery') }}/{{ $cat_id }}"  method="post" enctype="multipart/form-data">
                @csrf
            <input type="hidden" name="cat_id" value="{{$cat_id }}">
                <div class="form-group">
                    <label for="price">Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
 
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>


            <h2>Gallery</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($arrGalleryPhoto as $objGalleryPhoto)
                     <tr>
                        <td>{{ $objGalleryPhoto->id }}</td>
                        <td><img style="width: 100px;height: 100px;" src="{{ url('') }}/{{ $objGalleryPhoto->image }}"></td>
                        <td>
                            
                            <form action="{{ url('admin/gallery') }}/{{ $objGalleryPhoto->id }}" method="post" enctype="multipart/form-data">
                                <button type="submit" class="btn btn-danger">Delete</button>
                                @method('delete')
                                @csrf
                            </form>
                        </td>
                        
                     </tr>
                     @endforeach
                    
 
                  </tbody>
                </table>
            </div>
        </main>
@endsection