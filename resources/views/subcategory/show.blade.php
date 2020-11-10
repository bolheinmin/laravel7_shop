@extends('layouts.backendtemplate')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-info-circle"></i> Detail Page</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset(route('subcategory.index')) }}">Category Page</a></li>
                <li class="breadcrumb-item"><a href="#">Detail Page</a></li>
            </ul>
        </div>
        <div class="card">
            <h5 class="card-header">SubCategory's detail</h5>
            <div class="card-body">
                <h5 class="card-title">name: <span class="text-info">{{ $subCategory->name }}</span></h5>
                @foreach ($categories as $category)
                    @if ($category->id == $subCategory->category_id)
                        <h5 class="card-title">category: <span class="text-info">{{ $category->name }}</span></h5>
                    @endif
                @endforeach
                <a href="{{ route('subcategory.index') }}" class="btn btn-primary mt-3">Go back</a>
            </div>
        </div>
    </main>

@endsection
