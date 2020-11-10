@extends('layouts.backendtemplate')

@section('content')

  <main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-th-large"></i> SubCategory Page</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">SubCategory Page</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="tile">
          <h2>SubCategory List</h2>
          <a href="{{route('subcategory.create')}}" class="btn btn-outline-info my-3"><i class="fa fa-plus"></i> Add New</a>
          <table class="table">
            <thead>
              <tr>
                <th><h4>#</h4></th>
                <th><h4>Name</h4></th>
                <th><h4>Actions</h4></th>
              </tr>
            </thead>
            <tbody>
              @php 
                $i=1;
              @endphp
              @foreach($subcategories as $subcategory)
              <tr>
                <td><h4 class="d-inline-block">{{$i++}}</h4></td>
                <td>
                  <h4 class="text-dark d-inline-block">{{$subcategory->name}}</h4>
                </td>
                <td>
                  <a href="{{route('subcategory.edit',$subcategory->id)}}" class="btn btn-outline-info">Edit</a>
                  <a href="{{route('subcategory.show',$subcategory->id)}}" class="btn btn-outline-success">Show</a>
                  <form method="post" action="{{route('subcategory.destroy',$subcategory->id)}}" class="d-inline-block" onsubmit="return confirm('Are you Sure to Delete?')">
                    @csrf
                    @method('DELETE')
                    <input type="submit" name="btnsubmit" value="Delete" class="btn btn-outline-danger">
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
@endsection