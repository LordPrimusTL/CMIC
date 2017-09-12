@extends('master')
@section('content')
    <!-- //breadcrumbs -->
    <!--investment news-->
    @include('Partials._message')
    @foreach($inv as $in)
        <section class="container-fluid jumbotron" style="margin-bottom: 0 !important;">
            <header class="text-center" style="text-align: center; size: 25px; color: #777;"><h2 style="font-size:20px !important;">{{$in->name}}</h2></header>
            <div class="row container">
                <div class="col-lg-5 col-sm-5">
                    <a href="#" style="text-decoration:none;color:#ff0a11;">
                        <p>
                            <img style="width:300px !important;height:250px !important;" src="{{route('file',['filename' => $in->image])}}"/>
                        </p>
                    </a>
                </div>
                <div class="col-lg-7 col-sm-7">
                    <p class="well-sm text-muted container" style="font-family: 'Arial Unicode MS'; font-size: 20px; color: black; ">
                        {{$in->text}}
                    </p>
                    <a href="@if($in->link == null){{route('register')}}@else {{$in->link}}@endif" class="btn btn-primary" target="_blank"> Register <i class="fa fa-send"></i></a>
                </div>
            </div>
        </section>
    @endforeach
@endsection