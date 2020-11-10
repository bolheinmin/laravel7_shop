@extends('layouts.backendtemplate')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-info-circle"></i> Detail Page</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset(route('category.index')) }}">Category Page</a></li>
                <li class="breadcrumb-item"><a href="#">Detail Page</a></li>
            </ul>
        </div>
        <div class="card">
            <h5 class="card-header">Category's detail</h5>
            <div class="card-body">
            <h5 class="card-title">name: <span class="text-info">{{$category->name}}</span></h5>
            <img src="{{asset($category->photo)}}" class="img-fluid rounded" width="200" height="200" style="object-fit: cover;"><br>
            <a href="{{route('category.index')}}" class="btn btn-primary mt-3">Go back</a>
            </div>
          </div>
    </main>
    
@endsection
