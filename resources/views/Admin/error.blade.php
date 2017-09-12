@extends('master')
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="col-lg-6">
                &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large"> Stack Error </p>
            </div>
            <br/>
            @include('Partials._message')
            <div class="col-lg-12 col-md-12 col-sm-4">
                @if(count($err) > 0)
                    <pre>
                    </pre>
                    <div class=" table table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Error ID</th>
                                <th>Solved</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1;?>
                            @foreach($err as $in)
                                @if($in->solved)
                                    <tr class="alert-success">
                                        <td>{{$i++}}</td>
                                        <td>{{$in->error_id}}</td>
                                        <td>True</td>
                                        <td>Solved</td>
                                    </tr>
                                @endif
                                @if(!$in->solved)
                                    <tr class="alert-danger">
                                        <td>{{$i++}}</td>
                                        <td>{{$in->error_id}}</td>
                                        <td>False</td>
                                        <td>
                                            <a href="{{route('admin_error_edit',['id' => $in->id * 8009 * 8009])}}" class="btn btn-success"><i class="fa fa-check-square"></i>&nbsp; Solved</a>
                                        </td>
                                    </tr>
                                @endif
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
        </header>
        <!-- Page Footer-->


    </div>
@endsection