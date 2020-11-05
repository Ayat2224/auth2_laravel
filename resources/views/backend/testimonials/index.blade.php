@extends('layouts.app_admin')
@section('title','Show Testimonial')
@section('content')
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	@if (session('sucessMSG'))
	            <div class="alert alert-success">
	                {{ session('sucessMSG') }}
	            </div>
          	@endif

        	<a href="{{ url('admin/testimonials/create') }}" class="btn btn-primary">Add Testimonial +</a>
        	 
          	<h2>Testimonials</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Name</th>
	                  	<th>Description</th>
	                  	<th>Position</th>
	                  	<th>Photo</th>
	                    <th>Actions</th>

	                </tr>
	              </thead>
	              <tbody>
	                 
	                @foreach($arrTestimonials as $objTestimonial)
	                <tr>
	                  	<td>{{ $objTestimonial->id }}</td>
	                  	<td>{{ $objTestimonial->name }}</td>
	                  	<td>{{ $objTestimonial->description }}</td>
	                  	<td>{{ $objTestimonial->position }}</td>
	                  	<td><img style="width: 100px;height: 100px;" src="{{ url('') }}/{{ $objTestimonial->photo }}"></td>	           
	                  	<td>
	                  	<td>
	                  		<a class="btn btn-primary" href="{{ url('admin/testimonials/') }}/{{ $objTestimonial->id }}/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="{{ url('admin/testimonials/') }}/{{ $objTestimonial->id }}"> Show </a>
	                  		<form action="{{ url('admin/testimonials') }}/{{ $objTestimonial->id }}" method="post" enctype="multipart/form-data">
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