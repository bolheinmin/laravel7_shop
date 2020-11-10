@extends('layouts.frontendtemplate')
@section('title', 'home')
@section('content')

<div class="container register">
    <div class="row">
        <div class="col-md-3 register-left">
            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
            <h3 class="text-info">Welcome</h3>
            <p class="text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Blanditiis, ex!</p>
        <a href="{{url('user_login')}}">Already member ? login here.</a>
        </div>
        <div class="col-md-9 register-right mt-5">
            <h3 class="register-heading">Register and explore new things</h3>
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="row register-form">
                <div class="col-md-6 mt-5">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name *" name="name" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password *" name="password" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control"  placeholder="Confirm Password *" name="cpassword" />
                    </div>
                    <div class="form-group">
                        <div class="maxl">
                            <label class="radio inline"> 
                                <input type="radio" name="gender" value="male" checked>
                                <span> Male </span> 
                            </label>
                            <label class="radio inline"> 
                                <input type="radio" name="gender" value="female">
                                <span>Female </span> 
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-5">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email *" name="email" />
                    </div>
                    <div class="form-group">
                        <input type="text" minlength="10" maxlength="10" name="txtEmpPhone" class="form-control" placeholder="Your Phone *" name="phone" />
                    </div>
                    <input type="submit" class="btn btn-success btn-block"  value="Register"/>
                </div>
            </div>
           </form>
        </div>
    </div>

</div>

@endsection
