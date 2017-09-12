@extends('master')
@section('content')


    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li>
                    <a href="   @if(Auth::check())
                                    @if(Auth::user()->role_id == 3)
                                        {{route('user_dashboard')}}
                                    @elseif(Auth::user()->role_id < 3)
                                        {{route('admin_dash')}}
                                    @endif
                                @else
                                    {{route('home')}}
                                @endif">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>

                <li>
                    <a href="{{route('user_news')}}">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>News</a></li>
                <li class="active">{{$m->title}}</li>
            </ol>
        </div>
    </div>
    <!--- products -->
    <div class="">
        @include('Partials._message')
        <div class="container">
            <div class="row">
                <h1 style="text-align: center">{{$m->title}}</h1>
                <br/>
                <div class="col-lg-12" style="margin-left: 10px; text-justify: auto;">
                    <div class="panel-body">
                        <article>{{$m->text}}</article>
                    </div>

                    <div class="pull-right">
                        <p class="pull-right">Posted on: {{\Carbon\Carbon::parse($m->created_at)->toFormattedDateString()}}</p>
                    </div>
                </div>
            </div>

        </div>

        <div class="clearfix"> </div>
    </div>
    <!--- products --->
@endsection