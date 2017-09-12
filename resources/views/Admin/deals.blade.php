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
                    &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large; font-family:  Helvetica Neue, Helvetica, Arial, sans-serif;"> {{$title}}</p>
                </div>
                <div class="col-lg-offset-4">
                    <div class="row">
                        <div class="col-lg-12" style="margin-left: 10px;">
                            <form class="form-" method="POST" action="{{route('admin_deal_search')}}">
                                {{csrf_field()}}
                                <div class="col-lg-12">
                                    <p>Search Here...</p>
                                    <div class="form-group-sm ">
                                        <select class="form-control input-group-sm" name="filt" id="filt">
                                            <option value="0">Deals ID</option>
                                            <option value="1">Name</option>
                                            <option value="2">Description</option>
                                        </select>
                                        <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                        <a href="{{route('admin_deals')}}" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All Deals</a>
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
                    @if(count($dea) > 0)
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Text</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                @foreach($dea as $in)
                                    <?php $g = $in->ts_id;?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()}}</td>
                                        <td>{{$in->name}}</td>
                                        <td>{{$in->descn}}</td>
                                        <td><img src="{{route('file',['filename' => $in->image])}}" width="116px" height="116px"/></td>
                                        <td>
                                            <a href="{{route('admin_d_cr',['id' => $in->id * 8009 * 8009])}}"  class="btn btn-outline-success btn-sm"><i class="fa fa-arrow-circle-right"></i>&nbsp;View Application</a>
                                            <a href="{{route('admin_deals_del',['id' => $in->id * 8009 * 8009])}}" style="margin-top: 10px;" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
                <div class="col-lg-4 col-md-6 col-sm-4">
                    <form method="POST" action="{{route('admin_deals_add')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-lg-8">
                            <h5>Add Deals</h5>
                            <div class="form-group">
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Deal Name" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="descn" id="descn" rows="3" placeholder="Description"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/jpeg"/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-send"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </header>
    </div>
@endsection