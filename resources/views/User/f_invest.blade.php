@extends('master')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li>
                    <a href="@if(Auth::user()->role_id == 3){{route('user_dashboard')}}@elseif(Auth::user()->role_id < 3){{route('admin_dash')}}@else{{route('home')}}@endif">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Investment</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--investment news-->
        <header class="text-center" style="color: #777; margin-bottom: 20px !important;"><h2 style="font-size:30px !important;">CLUB INVESTMENT</h2></header>
        <br/>
    @include('Partials._message')
    @foreach($inv as $in)
        <section class="container-fluid" style="margin-bottom: 0 !important;">
            <div class="row container">
                <div class="col-lg-5 col-sm-5">
                    <a href="@if($in->link == null) {{route('f_invest_reg',['id' => $in->id])}} @else {{$in->link}} @endif" style="text-decoration:none;color:#ff0a11;">
                        <p>
                            <img style="width:300px !important;height:250px !important;" src="{{route('file',['filename' =>$in->image])}}"/>
                        </p>
                    </a>
                </div>
                <div class="col-lg-7 col-sm-7">
                    <header class="text-center" style="color: #ff0a11; margin-bottom: 20px !important;"><h2 class="sm_header">{{$in->name}}</h2></header>
                    <p class="well-sm text-muted container" style="font-family: 'Arial Unicode MS'; font-size: 20px; color: black;">
                        {{$in->text}}
                    </p>
                    <?php $tut = \App\inv_aff::find($in->id)->tut()->where(['is_active' => true])->orderBy('id','DESC')->get();?>
                    @if(count($tut) > 0)
                        <h3 class="text-center" style="color:purple;margin-bottom:8px;">Files</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr style="color:red;">
                                    <th>FileName</th>
                                    <th>DownloadLink</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tut as $e)
                                    <tr>
                                        <td>{{$e->name}}</td>
                                        <td><a href="{{route('file',['filename' => $e->name])}}" class="btn btn-primary"><i class="fa fa-download"></i> Download</a> </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h3 class="text-center" style="margin-bottom:8px;">No Tutorials Yet.</h3>
                    @endif
                        <a href="@if($in->link == null) {{route('f_invest_reg',['id' => $in->id * 8009 * 8009])}} @else {{$in->link}} @endif" class="btn btn-primary"> Register <i class="fa fa-send"></i></a>
                </div>
            </div>
        </section>
    @endforeach
@endsection