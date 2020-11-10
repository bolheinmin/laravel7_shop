<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('my_asset/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('my_asset/css/shop-homepage.css') }}" rel="stylesheet">

     <!-- Custom CSS -->
     <link rel="stylesheet" href="{{ asset('my_asset/css/custom.css') }}">

     <!-- Fontawesome CSS -->
     <link rel="stylesheet" href="{{ asset('my_asset/css/all.min.css') }}">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg mainColor fixed-top">
        <div class="container">
            <a class="navbar-brand text-light myFont" href="#">Laravel 7 Shopules</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto myFont">
                    <li class="nav-item active">
                    <a class="nav-link text-light" href="{{url('/')}}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">Contact</a>
                    </li>

                    {{-- Auth --}}
                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-light" href="{{ url('user_login') }}">{{ __('Login') }}</a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-light dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            
                            @if(Auth::user()->getRoleNames()[0] == "admin")
                            <a class="dropdown-item" href="{{ url('/item') }}">Admin Panel</a>
                            @else
                            @endif

                            <a class="dropdown-item" href="{{ route('logout') }}" 
                               onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                    <li class="nav-item">
                    <a class="nav-link text-light" href="{{route('cartpage')}}">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="cartNoti badge badge-light badge-pill">0</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    @yield('content')
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 mainColor myFont text-muted mt-5">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; shopules laravel 7 created by 2amCoders</p>
        </div>
    </footer> 

    <!-- Bootstmy_my_asset/vendor/bootstrap/js/bootstrap.bundle.min.jsasset/vendor/bootstrap/js/bootstrap.bundle.min.jsrap core JavaScript -->
    <script src="{{ asset('my_asset/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('my_asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @yield('script')

</body>

</html>
