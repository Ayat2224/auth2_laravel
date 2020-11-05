@extends('layouts.app_admin')
@section('title','Show Category')
@section('content')
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	@if (session('sucessMSG'))
	            <div class="alert alert-success">
	                {{ session('sucessMSG') }}
	            </div>
          	@endif

        	<a href="{{ url('admin/categories/create') }}" class="btn btn-primary">Add Category +</a>
        	 
          	<h2>Categories</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Name</th>
	                   	<th>SubCategory</th>
	                    <th>Actions</th>

	                </tr>
	              </thead>
	              <tbody>
	                 
	                @foreach($arrCategories as $objCategory)
	                <tr>
	                  	<td>{{ $objCategory->id }}</td>
	                  	<td>{{ $objCategory->name }}</td>
	                  	<td><a class="btn btn-primary" href="{{ url('admin/subcategories') }}/{{ $objCategory->id }}"> SubCategories </a></td>
	                  	<td>
	                  		<a class="btn btn-primary" href="{{ url('admin/categories/') }}/{{ $objCategory->id }}/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="{{ url('admin/categories/') }}/{{ $objCategory->id }}"> Show </a>
	                  		<form action="{{ url('admin/categories') }}/{{ $objCategory->id }}" method="post" enctype="multipart/form-data">
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