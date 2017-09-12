@extends('master')
@section('content')
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
                <li class="active">Transactions</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--investment news-->
    <header class="text-center" style="color: #ff0a11; margin-bottom: 20px !important;"><h2 style="font-size:30px !important;">{{$title}}</h2></header>
    @include('Partials._message')

    <div class="container">
        @if(count($earn) > 0)
            <div class=" table table-responsive">
                <table id="table" class="table table-bordered">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Date</th>
                        <th>E. ID</th>
                        <th>T. ID</th>
                        <th>Amount</th>
                        <th>Desc.</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i =1;?>
                    @foreach($earn as $in)
                        <?php $g = $in->ts_id;?>
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()}}</td>
                            <td>{{$in->e_id}}</td>
                            <td>{{$in->t_id}}</td>
                            <td>{{$in->amount}}</td>
                            <td>{{$in->descn}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="pane panel-default">
                <div class="panel-body">
                    <p style="text-align: center; font-family: 'Comic Sans MS';font-size: xx-large;">No Data</p>
                </div>
            </div>
        @endif
    </div>
@endsection

