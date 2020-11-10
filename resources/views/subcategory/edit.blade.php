@extends('layouts.backendtemplate')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-large"></i> SubCategory Edit Page</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('subcategory.index')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="#">SubCategory Edit Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h2>SubCategory Edit Form</h2>
                <form method="post" action="{{route('subcategory.update',$subCategory->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ $subCategory->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                       <div class="form-group">
                           <label for="category">Category :</label>
                           
                        <select class="form-control" name="category" id="category">
                            @foreach($categories as $category)
                           <option value="{{$category->id}}" 
                            @if($subCategory->category_id == $category->id)
                                {{ "selected='selected'" }}
                            @endif
                            >{{$category->name}}</option>
                            @endforeach
                           </select>
                       </div>
                        <div class="form-group">
                            <input type="submit" name="btnsubmit" value="Update" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
