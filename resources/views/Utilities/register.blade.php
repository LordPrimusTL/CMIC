@extends('master')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{route('home')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li>Register Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- register -->
    <!-- register -->
    <div class="register">
        <div class="container">
            <h2 style="color: #ff0a11">Register Here</h2>
            @include('Partials._message')
            <div class="login-form-grids"  style="background-color:red;">
                <h5 style="color:#fff">profile information</h5>

                    {{Form::open(['files' => true])}}
                    {{csrf_field()}}
                    <input type="text" name="firstname" id="firtname" placeholder="First Name..." required>
                    <input type="text" name="lastname" id="lastname" placeholder="Last Name..." required>
                    <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number..." required>
                    <div class="form-group">
                        <textarea id="address" name="address" class="form-control input-lg" style="border-radius:0 !important;" placeholder="Contact Address" required></textarea>
                    </div>
                    <h6 style="color:#fff">Login information</h6>
                    <input type="email" name="email" id="email" placeholder="Email Address" required=" " >
                    <input type="password" name="password" id="password" placeholder="Password" required=" " >
                    <input type="password" name="conf_password" id="conf_password" placeholder="Password Confirmation" required=" " >
                    <input type="submit" value="Register">
                    {{Form::close()}}
                <div class="register-home">
                    <a href="{{route('home')}}">Home</a>
                </div>
            </div>
        </div>
    </div>
@endsection