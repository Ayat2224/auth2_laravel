@extends('layouts.app_admin')
@section('title','Show Speakers')
@section('content')
 

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

        	@if (session('sucessMSG'))
	            <div class="alert alert-success">
	                {{ session('sucessMSG') }}
	            </div>
          	@endif

        	<a href="{{ url('admin/speakers/create') }}" class="btn btn-primary">Add Speaker +</a>
        	 
          	<h2>Speakers</h2>
          	<div class="table-responsive">
	            <table class="table table-striped table-sm">
	              <thead>
	                <tr>
	                  	<th>#</th>
	                  	<th>Name</th>
	                  	<th>Position</th>
	                   	<th>Events</th>
	                  	<th>Actions</th>
	                </tr>
	              </thead>
	              <tbody>
	                 
	                @foreach($arrspeakers as $objSpeaker)
	                <tr>
	                  	<td>{{ $objSpeaker->id }}</td>
	                  	<td>{{ $objSpeaker->name }}</td>
	                  	<td>{{ $objSpeaker->position }}</td>
						<td><a class="btn btn-primary" href="{{ url('admin/eventsspeakers') }}/{{ $objSpeaker->id }}"> Events </a></td>
	                  	<td>
	                  		<a class="btn btn-primary" href="{{ url('admin/speakers/') }}/{{ $objSpeaker->id }}/edit"> Edit </a>
	                  		<a class="btn btn-secondary" href="{{ url('admin/speakers/') }}/{{ $objSpeaker->id }}"> Show </a>
	                  		<form action="{{ url('admin/speakers') }}/{{ $objSpeaker->id }}" method="post" enctype="multipart/form-data">
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