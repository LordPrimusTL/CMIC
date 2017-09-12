@extends('master')
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>


            <div class="col-lg-6">
                &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large"> Investment Name: {{\App\inv_aff::find($inn_id)->name}}</p>
            </div>
            <br/>
            @include('Partials._message')
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-4">
                    @if(count($inv) > 0)
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                @foreach($inv as $in)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$in->name}}</td>
                                        <td><a href="{{route('file',['filename' => $in->name])}}" class="btn btn-primary"><i class="fa fa-download"></i> Download</a> </td>
                                        <td>
                                            <p><a href="{{route('admin_tut_delete',['id' => $in->id * 8009 * 8009])}}" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp; Delete</a></p>
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
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <h2 style="text-align: center;">Add Tutorial</h2>
                    <form action="{{route('admin_inv_tut',['id' => $inn_id * 8009 * 8009])}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Upload Tutorial: </label>
                            <input type="file" class="form-control" name="tut" id="tut" required placeholder="Upload Tutorial"/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </header>
        <!-- Page Footer-->


    </div>
@endsection