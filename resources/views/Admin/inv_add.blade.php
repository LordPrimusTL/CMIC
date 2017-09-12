@extends('master')
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">

                @if($e == 1)
                    <h2 class="no-margin-bottom">Add Investment</h2>
                    <br/>
                    @include('Partials._message')
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin_inv_add')}}">
                        {{csrf_field()}}
                        <div class="col-lg-4 form-group">
                            <input type="text" name="name" id="name" required placeholder="Name Of Investment" class="form-control"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <textarea id="text" name="text" required placeholder="Text on Investment" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-lg-4 form-group">
                            <input type="text" name="link" id="link" placeholder="Link(Optional)" class="form-control"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="col-lg-6">Upload Image:</label>
                            <input type="file" class="form-control col-lg-12" name="image" id="image" accept="image/jpeg"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-file"></i> Save</button>
                        </div>
                    </form>
                @endif
                @if($e == 2)
                    <h2 class="no-margin-bottom">Edit Investment</h2>
                    <br/>
                    @include('Partials._message')
                    <form enctype="multipart/form-data" method="POST" action="{{route('admin_inv_edit',['id' => $inv->id * 8009 * 8009])}}">
                        {{csrf_field()}}
                        <div class="col-lg-4 form-group">
                            <input type="text" name="name" id="name" required placeholder="Name Of Investment" class="form-control" value="{{$inv->name}}"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <textarea id="text" name="text" placeholder="Text on Investment" rows="3" class="form-control">{{$inv->text}}</textarea>
                        </div>
                        <div class="col-lg-4 form-group">
                            <input type="text" name="link" id="link" placeholder="Link(Optional)" class="form-control" value="{{$inv->link}}"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="col-lg-6">Upload Image:</label>
                            <input type="file" class="form-control col-lg-12" name="image" id="image"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-file"></i> Save</button>
                        </div>
                    </form>
                @endif
            </div>
        </header>
    </div>
@endsection