@extends('master')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li>
                    <a href="@if(Auth::user()->role_id == 3){{route('user_dashboard')}}@elseif(Auth::user()->role_id < 3){{route('admin_dash')}}@else{{route('home')}}@endif">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Finance</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->

    <div class="container row">
        <div class="container" style="margin-top:30px;">
            <div class="row">
                <div class="col-lg-3">
                    <a href="{{route('user_loans')}}" style="text-decoration:none;color:white;">
                        <div class="panel" style="background-color:#ff0a11;">
                            <br /><br />
                            <div class="panel-body">
                                <h3 class="panel-title text-center"><i class="fa fa-money" style="font-size:40px;"></i></h3>
                                <p class="well-sm text-center">
                                    Loans
                                    <br /><br /><br />
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{route('user_trans')}}" style="text-decoration:none;color:white;">
                        <div class="panel" style="background-color:#ff0a11;">
                            <br /><br />
                            <div class="panel-body">
                                <h3 class="panel-title text-center"><i class="fa fa-briefcase" style="font-size:40px;"></i></h3>
                                <p class="well-sm text-center">
                                    Transactions
                                    <br /><br /><br />
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3">
                    <a href="{{route('user_earn')}}" style="text-decoration:none;color:white;">
                        <div class="panel" style="background-color:#ff0a11;">
                            <br /><br />
                            <div class="panel-body">
                                <h3 class="panel-title text-center"><i class="fa fa-credit-card" style="font-size:40px;"></i></h3>
                                <p class="well-sm text-center">
                                    Earnings
                                    <br /><br /><br />
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
    </div>
@endsection