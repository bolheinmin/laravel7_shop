@extends('layouts.backendtemplate')

@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-large"></i> SubCategory Create Page</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('subcategory.index') }}"><i class="fa fa-home fa-lg"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="#">SubCategory Create Page</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h2>SubCategory Create Form</h2>
                    <form method="POST" action="{{ route('subcategory.store') }}">
                        @csrf
                        <div class="form-group">
                            <label>Name :</label>
                            <input type="text" name="name" class="form-control" class="@error('name') is-invalid @enderror">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category :</label>
                            <select class="form-control" name="category" id="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn-outline-info" name="btnsubmit" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
