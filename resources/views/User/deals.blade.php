@extends('master')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li>
                    <a href="@if(Auth::user()->role_id == 3){{route('user_dashboard')}}@elseif(Auth::user()->role_id < 3){{route('admin_dash')}}@else{{route('home')}}@endif">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li>
                    <a href="{{route('user_finance')}}">
                        <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>Finance</a></li>
                <li class="active">Deals</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--investment news-->
    <header class="text-center" style="color: #ff0a11; margin-bottom: 20px !important;"><h2 style="font-size:30px !important;">{{$title}}</h2></header>
    @include('Partials._message')
    @foreach($inv as $in)
        <section class="container-fluid jumbotron" style="margin-bottom: 0 !important;">
            <header class="text-center" style="color: #ff0a11; margin-bottom: 20px !important;"><h2 style="font-size:20px !important;">{{$in->name}}</h2></header>
            <div class="row container">
                <div class="col-lg-5 col-sm-5">
                    <a href="#" style="text-decoration:none;color:#ff0a11;">
                        <p>
                            <img style="width:300px !important;height:250px !important;" src="{{route('file',['filename' =>$in->image])}}"/>
                        </p>
                    </a>
                </div>
                <div class="col-lg-7 col-sm-7">
                    <p class="well-sm text-muted container" style="font-family: 'Arial Unicode MS'; font-size: 20px; color: #ff0a11;">
                        {{$in->descn}}
                    </p>
                    <a href="{{route('d_reg',['id' => $in->id * 8009 * 8009])}}" class="btn btn-default btn-lg input-lg" style="background-color:red;color:#ffffff;">Apply</a>
                </div>
            </div>
        </section>
    @endforeach
@endsection