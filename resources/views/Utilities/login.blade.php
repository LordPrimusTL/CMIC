@extends('master')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="{{url('/')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li>Login Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h2 style="color:#ff0a11">Login Form</h2>
            @include('Partials._message')
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form action="{{url('/login')}}" method="post">
                    {{csrf_field()}}
                    <input   id="email" name="email" placeholder="Email Address" type="text" value="" required />
                    <input   id="password" name="password" placeholder="Password" type="password" required/>
                    <div class="forgot">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" value="Login">
                </form>        </div>
            <h4>For New People</h4>
            <p><a href="{{url('/register')}}">Register Here</a> (Or) go back to <a href="{{url('/')}}">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
        </div>

    </div>
@endsection