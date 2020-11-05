@extends('layouts.app_admin')
@section('title','Show Category Gallery')
@section('content')
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
            @endif
 
            <a href="{{ url('admin/categorygallery/create') }}" class="btn btn-primary">Add Category Gallery +</a>
             
            <h2>Main Category</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Gallery</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    @foreach($arrCategoryGallery as $objCategoryGallery)
                    <tr>
                        <td>{{ $objCategoryGallery->id }}</td>
                        <td>{{ $objCategoryGallery->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url('admin/gallery/') }}/{{ $objCategoryGallery->id }}"> Gallery </a> </td>
                       
                        <td>
                            <a class="btn btn-primary" href="{{ url('admin/categorygallery/') }}/{{ $objCategoryGallery->id }}/edit"> Edit </a>
                            <a class="btn btn-secondary" href="{{ url('admin/categorygallery/') }}/{{ $objCategoryGallery->id }}"> Show </a>
                            <form action="{{ url('admin/categorygallery') }}/{{ $objCategoryGallery->id }}" method="post" enctype="multipart/form-data">
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