

@extends('layouts.app_admin')
@section('title','Show Teachers')
@section('content')
 

 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

 

            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
              @endif

 

            <a href="{{ url('admin/teachers/create') }}" class="btn btn-primary">Add Teacher</a>
             
              <h2>Teachers</h2>
              <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Position</th>
                          <th>Address</th>
                          <th>Image</th>
                          <th>Facebook</th>
                          <th>Twitter</th>
                          <th>Linkedin</th>
                          <th>Skype</th>
                          <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    @foreach($arrTeachers as $objTeacher)
                    <tr>
                          <td>{{ $objTeacher->id }}</td>
                          <td>{{ $objTeacher->name }}</td>
                          <td>{{ $objTeacher->position }}</td>
                          <td>{{ $objTeacher->address }}</td>
                          <td><img style="width: 100px;height: 100px;" src="{{ url('') }}/{{ $objTeacher->image }}"></td>                     
                          <td>{{ $objTeacher->facebook }}</td>
                          <td>{{ $objTeacher->twitter }}</td>
                          <td>{{ $objTeacher->linkedin }}</td>
                          <td>{{ $objTeacher->skype }}</td>

                          <td>
                              <a class="btn btn-primary" href="{{ url('admin/teachers/') }}/{{ $objTeacher->id }}/edit"> Edit </a><br>
                              <a class="btn btn-secondary" href="{{ url('admin/teachers/') }}/{{ $objTeacher->id }}"> Show </a><br>
                              <form action="{{ url('admin/teachers') }}/{{ $objTeacher->id }}" method="post" enctype="multipart/form-data">
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