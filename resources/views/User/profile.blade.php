@extends('master')
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="@if(Auth::user()->role_id == 3){{route('user_dashboard')}}@elseif(Auth::user()->role_id < 3){{route('admin_dash')}}@else{{route('home')}}@endif"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li>Investment Registration page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <section>
        <div class="container">
            <div class="col-lg-offset-3 col-lg-6" style="margin-top:30px;">
                <div class="pull-right">
                    <img src="{{route('file',['filename' => $user->image])}}" alt="profile Image" class=" img img-rounded img-responsive" height="200" width="200px"/>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <hr />
    </section>
    <section>
        <div class="container">
            @include('Partials._message')
            <h4 class="text-center text-capitalize text-info">Update BIODATA</h4>
            <form method="POST" action="{{route('user_profile_edit')}}" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                    <div class="pull-left">First Name</div>
                    <div class=" col-lg-8 pull-right">
                        <input type="text" name="firstname" id="firstname" class="form-control input-group-sm" value="{{$user->firstname}}" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                    <div class="pull-left">Last Name</div>
                    <div class=" col-lg-8 pull-right">
                        <input type="text" name="lastname" id="lastname" class="form-control input-group-sm" value="{{$user->lastname}}" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                    <div class="pull-left">Upload Image(Optional)</div>
                    <div class=" col-lg-8 pull-right">
                        <input type="file" name="image" id="image" class="form-control input-group-sm"/>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                    <div class="pull-left">Phone Number</div>
                    <div class="col-lg-8 pull-right">
                        <input type="text" name="phone_number" id="phone_number" class="form-control input-group-sm" value="{{$user->phone_number}}" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                    <div class="pull-left">Address</div>
                    <div class="col-lg-8 pull-right" >
                        <textarea name="address" id="address" class="form-control input-group-sm" placeholder="Address">{{$user->address}}</textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                    <div class="pull-left">Email</div>
                    <div class="col-lg-8 pull-right">
                        <input type="text" name="email" id="email" class="form-control input-group-sm" value="{{$user->email}}" disabled />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                    <div class="pull-left">Upgrade Level</div>
                    <div class="col-lg-8 pull-right">
                        <input type="text" class="form-control input-group-sm" value="{{$user->level->name}}" disabled />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                    <div class="pull-left">Password</div>
                    <div class="col-lg-8 pull-right">
                        <input type="password" name="password" id="password" class="form-control input-group-sm"placeholder="Enter Your Password To Effect Changes" />
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-offset-3 col-lg-6" style="margin-top:10px;">
                       <button type="submit" class="btn btn-success btn-block"><i class="fa fa-send"></i> Submit</button>
                </div>

            </form>
        </div>
        <hr />
    </section>
@endsection