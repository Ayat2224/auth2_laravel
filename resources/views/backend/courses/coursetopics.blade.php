@extends('layouts.app_admin')
@section('title','Show CourseTopics')
@section('content')
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
            @endif
 
             
            <form action="{{ url('admin/coursetopics') }}/{{ $course_id }}" method="post">
                @csrf


                <div class="form-group">
                    <label for="topic_name">Topic Name</label>
                    <input type="text" class="form-control @error('topic_name') is-invalid @enderror" id="topic_name" name="topic_name">
                    @error('topic_name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="duration">Duration</label>
                    <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration">
                    @error('duration')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div> 
                <input type="hidden" name="course_id" value="{{ $course_id }}">
 
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>


            <h2>Course Topics</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Topic Name</th>
                        <th>Duration</th> 
                    </tr>
                  </thead>
                  <tbody>
                     @foreach($arrCourseTopics as $objCourseTopic)
                     <tr>
                        <td>{{ $objCourseTopic->id }}</td>
                        <td>{{ $objCourseTopic->topic_name}}</td>
                        <td>{{ $objCourseTopic->duration}}</td>
                        <td>
                            
                            <form action="{{ url('admin/subcategories') }}/{{ $objCourseTopic->id }}" method="post" enctype="multipart/form-data">
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