@extends('master')
@section('content')
    <div class="content-inner" style="font-family: Arial Unicode MS">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>


            <div class="row" style="margin-left: 10px;">
                <div class="col-lg-4">
                    &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large; font-family:  Helvetica Neue, Helvetica, Arial, sans-serif;"> Investors</p>
                </div>
                <div class="col-lg-offset-4">
                    <div class="row">
                        <div class="col-lg-12" style="margin-left: 10px;">

                            <form class="form-" method="POST" action="{{route('admin_invs_search')}}">
                                {{csrf_field()}}
                                <div class="col-lg-12">
                                    <p>Search Here...</p>
                                    <div class="form-group-sm ">
                                        <select class="form-control input-group-sm" name="filt" id="filt">
                                            <option value="0">Id</option>
                                            <option value="1">User Id</option>
                                            <option value="2">Investment Id</option>
                                        </select>

                                        <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                        <a href="{{route('admin_invs')}}" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All Investors</a>
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
                <div class="col-lg-12 col-md-12 col-sm-4">
                    @if(count($reg) > 0)
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Investment Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                @foreach($reg as $in)
                                    <?php $g = $in->s_id;?>
                                    <tr class="@if($g == 1) alert-success @elseif($g == 2 || $g == 4) alert-warning @elseif($g == 3) alert-danger @endif">
                                        <td>{{$i++}}</td>
                                        <td>{{\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()}}</td>
                                        <td>{{\App\inv_aff::find($in->inv_id)->name}}</td>
                                        <td><a href="{{route('admin_user_view',['id' => $in->user_id * 8009 * 8009])}}" class="btn btn-default btn-sm"> {{$in->firstname . ' ' .$in->lastname}}</a> </td>
                                        <td>{{$in->email}} </td>
                                        <td>{{$in->stat->name}}</td>
                                        <td>
                                            @if($g == 1)
                                                N/A
                                            @elseif($g ==2)
                                                <a href="{{route('admin_invs_auth',['id' => $in->id * 8009 * 8009])}}" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i> Authorize</a>
                                                <a href="{{route('reg_delete',['id' => $in->id * 8009 * 8009])}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-close"></i> Decline</a>
                                            @elseif($g == 3)
                                                No Action
                                            @elseif($g == 4)
                                                <a href="{{route('reg_delete',['id' => $in->id * 8009 * 8009])}}" class="btn btn-outline-danger btn-sm"><i class="fa fa-close"></i> Interrupt</a>
                                            @endif
                                        </td>
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
        </header>
        <!-- Page Footer-->


    </div>
@endsection