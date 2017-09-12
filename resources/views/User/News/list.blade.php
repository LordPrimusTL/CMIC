@extends('master')
@section('content')


    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li>
                    <a href="@if(Auth::user()->role_id == 3){{route('user_dashboard')}}@elseif(Auth::user()->role_id < 3){{route('admin_dash')}}@else{{route('home')}}@endif">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>

                <li class="active">News</li>
            </ol>
        </div>
    </div>
    <!--- products -->
    <div class="products">
        @include('Partials._message')
        <div class="">
            <div class="row">
                <h1 style="text-align: center">Latest News</h1>
                <br/>
                @foreach($news as $m)
                    <div class="col-lg-3" style="margin-left: 10px;">
                        <a href="{{route('user_news_view',['id' => $m->id * 8009 * 8009])}} " style="color: #0c0c0c;">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <header class="header" style="text-align: center;">
                                        <p><b>{{$m->title}}</b></p>
                                    </header>
                                </div>
                                <div class="panel-body">
                                    <article>{{\Illuminate\Support\Str::words($m->text,20,'...')}}</article>
                                </div>
                                <div class="panel-footer" style="margin-bottom: 15px;">
                                    <p class="pull-right">Posted on: {{\Carbon\Carbon::parse($m->created_at)}}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>

        <nav class="numbering" style="margin-left: -40px;">
            {{$news->links()}}
        </nav>
        <div class="clearfix"> </div>
    </div>
    <!--- products --->
@endsection