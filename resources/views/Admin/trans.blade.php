@extends('master')
@section('content')
    <div class="content-inner" style="font-family: Arial Unicode MS">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>

            @if($t == 1)
                @include('Partials._message')
                <div class="row" style="margin-left: 10px;">
                    <div class="col-lg-4">
                        &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large; font-family:  Helvetica Neue, Helvetica, Arial, sans-serif;"> {{$title}}</p>
                    </div>
                    <div class="col-lg-offset-4">
                        <div class="row">
                            <div class="col-lg-12" style="margin-left: 10px;">

                                <form class="form-" method="POST" action="{{route('admin_trans_search')}}">
                                    {{csrf_field()}}
                                    <div class="col-lg-12">
                                        <p>Search Here...</p>
                                        <div class="form-group-sm ">
                                            <select class="form-control input-group-sm" name="filt" id="filt">
                                                <option value="0">Transaction Id</option>
                                                <option value="1">User Id</option>
                                                <option value="2">Investment Id</option>
                                            </select>

                                            <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                            <a href="{{route('admin_invs')}}" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All Transactions</a>
                                            <button style="margin-top: 5px;" class="btn btn-outline-primary btn-sm pull-right"  type="submit"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </form>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-4">
                        @if(count($trans) > 0)
                            {{}}
                            <div class=" table table-responsive">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Date</th>
                                        <th>Transaction ID</th>
                                        <th>INV. Name</th>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Desc.</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =1;?>
                                    @foreach($trans as $in)
                                        <?php $g = $in->ts_id;?>
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()}}</td>
                                            <td>{{$in->t_id}}</td>
                                            <td>{{$in->aff->name}}</td>
                                            <td><a href="{{route('admin_user_view',['id' => $in->user_id * 8009 * 8009])}}" class="btn btn-default btn-sm"> {{$in->user->firstname . ' ' .$in->user->lastname}}</a> </td>
                                            <td>{{$in->amount}}</td>
                                            <td>{{$in->descn}}</td>
                                            <td>{{'OUT'}}</td>
                                            <td>@if($in->t_type == 1) <a href="{{route('admin_earn_id',['id' => $in->t_id])}}" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View Earnings</a> @else No Action @endif</td>
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

                </div>
            @endif

            @if($t == 2)
                <div class="row" style="margin-left: 10px;">
                    <div class="col-lg-4">
                        &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large; font-family:  Helvetica Neue, Helvetica, Arial, sans-serif;"> {{$title}}</p>
                    </div>
                    <div class="col-lg-offset-4">
                        <div class="row">
                            <div class="col-lg-12" style="margin-left: 10px;">

                                <form class="form-" method="POST" action="{{route('admin_earn_search')}}">
                                    {{csrf_field()}}
                                    <div class="col-lg-12">
                                        <p>Search Here...</p>
                                        <div class="form-group-sm ">
                                            <select class="form-control input-group-sm" name="filt" id="filt">
                                                <option value="0">Transaction Id</option>
                                                <option value="1">Ernings Id</option>
                                                <option value="2">User Id</option>
                                                <option value="3">Investment Id</option>
                                            </select>
                                            <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                            <a href="{{route('admin_invs')}}" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All Earnings</a>
                                            <button style="margin-top: 5px;" class="btn btn-outline-primary btn-sm pull-right"  type="submit"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </div>
                                </form>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                @include('Partials._message')
                <div class="row">
                    <div class="col-lg-8 col-md-6 col-sm-4">
                        @if(count($earn) > 0)
                            <div class=" table table-responsive">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Date</th>
                                        <th>E. ID</th>
                                        <th>T. ID</th>
                                        <th>User</th>
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
                                            <td><a href="{{route('admin_user_view',['id' => $in->user_id * 8009 * 8009])}}" class="btn btn-default btn-sm"> {{$in->user->id .'. ' . $in->user->firstname . ' ' .$in->user->lastname}}</a> </td>
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
                    <div class="col-lg-4 col-md-6 col-sm-4">
                        <form method="POST" action="{{route('admin_earn_add')}}">
                            {{csrf_field()}}
                            <div class="col-lg-8">
                                <h5>Add Earnings</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" @if($e != null) disabled @else name="t_id" id="t_id" @endif  placeholder="Transaction ID" value="@if($e != null) {{$e->t_id}}@endif"/>
                                    @if($e != null) <input type="hidden"  name="t_id" id="t_id"   value="{{$e->t_id}}"/> @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" @if($e != null) disabled @else name="user_id" id="user_id" @endif  placeholder="User ID" value="@if($e != null) {{$e->user->id . '.' . ' ' .$e->user->firstname . ' ' .$e->user->lastname }}@endif"/>
                                    @if($e != null) <input type="hidden" name="user_id" id="user_id" placeholder="User ID" value="{{$e->user->id}}"/> @endif
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Remark/Description"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-send"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            @endif
        </header>
        <!-- Page Footer-->


    </div>
@endsection