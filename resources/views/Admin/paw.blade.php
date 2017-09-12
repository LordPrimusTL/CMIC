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
            </div>
            <br/>
            @include('Partials._message')
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-4">
                    @if(count($paw) > 0)
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Testimony</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                @foreach($paw as $in)
                                    <?php $g = $in->ts_id;?>
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()}}</td>
                                        <td>{{$in->name}}</td>
                                        <td>{{$in->testm}}</td>
                                        <td>
                                            <a href="{{route('admin_award_wdel',['id' => $in->id * 8009 * 8009])}}" class="btn btn-cir btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete&nbsp;</a>
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
                    <form method="POST" action="{{route('admin_awards_wadd',['id' => $a_id])}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-lg-8">
                            <h5>Add Award Winner</h5>
                            <div class="form-group">
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Name of Winner" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="testm" id="testm" rows="3" placeholder="Testimony"></textarea>
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