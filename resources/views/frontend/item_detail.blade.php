@extends('layouts.frontendtemplate')
@section('title', 'item detail')
@section('content')

    <main class="app-content container mt-5">
        <div class="app-title">
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ asset(url('/')) }}">Home Page</a></li>
                <li class="breadcrumb-item"><a href="#">Detail Page</a></li>
            </ul>
        </div>
        <div class="card">
            <h6 class="card-header text-muted">{{ $item->codeno }}'s detail</h6>
            <div class="row">
                <div class="col-md-4">
                    <img class="img-fluid img_hover p-3 m-3" src="{{ asset($item->photo) }}" width="400" height="400"
                        style="object-fit: cover;">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h6 class="text-muted">codeno- {{ $item->codeno }}</h6>
                        <h3 class="card-title"><span class="text-dark">{{ $item->name }}</span></h3>
                        @if ($item->discount == 0)
                            <h3 class="card-title">Price: <span class="text-success">{{ $item->price }} mmk</span></h3>
                        @else
                            <h3 class="card-title">Price: <span class="text-success">{{ $item->discount }} mmk | <del
                                        class="text-muted"><small>{{ $item->price }} mmk</small></del></span></h3>
                        @endif
                        <h6 class="card-title">Description: <span class="text-primary">{{ $item->description }}</span></h6>

                        {{-- brand --}}
                        <h6 class="card-title">Brand:
                            <span class="text-primary">
                                @foreach ($brands as $brand)
                                    @if ($brand->id == $item->brand_id)
                                        {{ $brand->name }}
                                    @endif
                                @endforeach
                            </span>
                        </h6>

                        {{-- subcategory --}}
                        <h6 class="card-title">SubCategory:
                            <span class="text-primary">
                                @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->id == $item->subcategory_id)
                                        {{ $subcategory->name }}
                                    @endif
                                @endforeach
                            </span>
                        </h6>

                        <div class="row">
                            <div class="form-group col-md-2">
                                <input type="number" class="form-control" min="1" value="1">
                            </div>
                            <div class="form-group ml-3 col-md-6">
                                <button class="btn btn-outline-info addtocartBtn"
                                    data-id="{{$item->id}}"
                                    data-name="{{$item->name}}"
                                    data-codeno="{{$item->codeno}}"
                                    data-photo="{{asset($item->photo)}}"
                                    data-price="{{$item->price}}"
                                    data-discount="{{$item->discount}}"
                                >
                                    <i class="fas fa-shopping-cart mr-2"></i> Add to cart
                            </button>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('homepage') }}" class="btn btn-primary mt-3">Go back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


@endsection
@section('script')
<script src="{{ asset('my_asset/js/custom.js') }}"></script>
@endsection
