@extends('master')
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <br/>
            @include('Partials._message')
            @if($t == 1)
                <div class="row">
                    <div class="col-lg-6 col-md-7 col-sm-4">
                        @if(count($cat) > 0)
                            <div class=" table table-responsive">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =1;?>
                                    @foreach($cat as $in)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$in->name}}</td>
                                            <td>
                                                <p><a href="{{route('admin_cat_delete',['id' => $in->id * 8009 * 8009])}}" onclick="return confirm('Are you sure you want to delete this category?');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Delete</a></p>
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
                    <div class="col-lg-4">
                        <h2 style="text-align: center;">Add Categgory</h2>
                        <form action="{{route('admin_cat_add')}}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Category Name"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </header>
    </div>
@endsection