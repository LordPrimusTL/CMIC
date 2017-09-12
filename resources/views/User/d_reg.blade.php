@extends('master')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="@if(Auth::user()->role_id == 3){{route('user_dashboard')}}@elseif(Auth::user()->role_id < 3){{route('admin_dash')}}@else{{route('home')}}@endif"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li>Investment Registration page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- register -->
    <div class="register">
        <div class="container">
            <h2 style="color:#ff0a11;">Register For an Investment Here</h2>
            <div class="login-form-grids" style="border:1px solid red;">
                <h5 style="color:#ffffff;font-family:sans-serif;">This informations would be used to register you for the investment.&nbsp; Be sincere... </h5>
                    <form action="{{route('d_reg_post',['id' => $inv->id * 8009 * 8009])}}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group">
                            <input disabled name="iv-ty" name="iv-ty"  type="text" value="{{$inv->name}}" required/>
                        </div>
                        <div class="form-group">
                            <input id="firstname" name="firstname" placeholder="First Name..." type="text" required/>
                        </div>
                        <div class="form-group">
                            <input id="lastname" name="lastname" placeholder="Last Name..." type="text" required/>
                        </div>

                        <div class="form-group" style="margin-top: 10px;">
                            <select class="form-control p-input"  id="gender" name="gender" style="border-radius:0!important;">
                                <option value="">Gender</option>
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input  id="dob" name="dob" placeholder=" Format...12/12/2012" type="text" value="" required/>
                        </div>
                        <div class="form-group">
                            <input  id="country" name="country" placeholder="Country" type="text" value="" />
                        </div>
                        <div class="form-group">
                            <input  id="state" name="state" placeholder="State" type="text" value="" />
                        </div>
                        <div class="form-group">
                            <input  id="city" name="city" placeholder="City" type="text" value="" />
                        </div>
                        <div class="form-group">
                            <input  id="phone_number" name="phone_number" placeholder="Phone Number" type="text" value="" required/>
                        </div>
                        <div class="form-group">
                            <input id="email" name="email" placeholder="Email" type="text" value="" required/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control input-lg p-input" cols="40" id="address" name="address" placeholder="Contact Address" rows="2" style="border-radius:0!important;"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value=" Submit"/>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection