

@extends('layouts.app_admin')
@section('title','Show Features')
@section('content')
 

 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

 

            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
              @endif

 

            <a href="{{ url('admin/features/create') }}" class="btn btn-primary">Add Feature</a>
             
              <h2>Features</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Icon</th>
                          <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    @foreach($arrFeatures as $objFeatures)
                    <tr>
                          <td>{{ $objFeatures->id }}</td>
                          <td>{{ $objFeatures->title }}</td>
                          <td>{{ $objFeatures->description }}</td>
                          <td>{{ $objFeatures->Icon }}</td>
                          
                          
                          <td>
                              <a class="btn btn-primary" href="{{ url('admin/features/') }}/{{ $objFeatures->id }}/edit"> Edit </a><br>
                              <a class="btn btn-secondary" href="{{ url('admin/features/') }}/{{ $objFeatures->id }}"> Show </a><br>
                              <form action="{{ url('admin/features') }}/{{ $objFeatures->id }}" method="post" enctype="multipart/form-data">
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