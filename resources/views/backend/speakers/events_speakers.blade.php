@extends('layouts.app_admin')
@section('title','Show Events')
@section('content')
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
            @endif
 
                
             <form action="{{ url('admin/eventsspeakers') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Topics</label>
                   

                  <select name="event_id"  class="form-control @error('event_id') is-invalid @enderror">
                      <option value="">Select Event</option>
                      @foreach($arrevents as $objevent)
                        <option value="{{ $objevent->id }}">{{ $objevent->topics }}</option>
                      @endforeach
                  </select>

 

                  @error('event_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                   
                </div>

                <input type="hidden" name="speaker_id" value="{{ $speaker_id }}">
 
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>   




            <h2>Speakers</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Topics</th>
                        <th>Description</th>
                        <th>source_title</th>
                        <th>source_title_writer</th>
                        <th>host</th>
                        <th>location</th>
                        <th>website</th>
                        <th>start_date</th>
                        <th>end_date</th>
                        <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                     
                    @foreach($arrEventsSpeakers as $objEventSpeaker)
                    <tr>
                        <td>{{ $objEventSpeaker->id }}</td>
                        <td>{{ $objEventSpeaker->topics }}</td>
                        <td>{{ $objEventSpeaker->description }}</td>
                        <td>{{ $objEventSpeaker->source_title }}</td>
                        <td>{{ $objEventSpeaker->source_title_writer }}</td>
                        <td>{{ $objEventSpeaker->host }}</td>
                        <td>{{ $objEventSpeaker->location }}</td>
                        <td>{{ $objEventSpeaker->website }}</td>
                        <td>{{ $objEventSpeaker->start_date }}</td>
                        <td>{{ $objEventSpeaker->end_date }}</td>
                        <td>
                            
                            <form action="{{ url('admin/eventsspeakers') }}/{{ $objEventSpeaker->id }}/{{ $speaker_id }}" method="post" enctype="multipart/form-data">
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