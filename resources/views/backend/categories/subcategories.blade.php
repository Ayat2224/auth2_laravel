@extends('layouts.app_admin')
@section('title','Show SubCategory')
@section('content')
 
 
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
 
            @if (session('sucessMSG'))
                <div class="alert alert-success">
                    {{ session('sucessMSG') }}
                </div>
            @endif
 
             
            <form action="{{ url('admin/subcategories') }}/{{ $categorie_id }}" method="post">
                @csrf


                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    @error('name')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                 <input type="hidden" name="categorie_id" value="{{ $categorie_id }}">
 
                <button type="submit" class="btn btn-primary">Submit</button>
             </form>


            <h2>SubCategories</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>

                    </tr>
                  </thead>
                  <tbody>
                     @foreach($arrSubCategories as $objSubCategory)
                     <tr>
                        <td>{{ $objSubCategory->id }}</td>
                        <td>{{ $objSubCategory->name}}</td>
                        <td>
                            
                            <form action="{{ url('admin/subcategories') }}/{{ $objSubCategory->id }}" method="post" enctype="multipart/form-data">
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