@extends('master')
@section('content')
    @if($t == 1)
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <br/>
                <br/>
                <header><h3>Add Goods to Market</h3></header>
                <br/>
                <br/>
                <div class="row">
                    @include('Partials._message')
                    <form class="form-horizontal" method="POST" action="{{route('market_add_post')}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group" style="margin-left: 2px; margin-right: 2px;">
                            <input type="text" class="form-control" placeholder="Name of Goods" name="name" id="name"/>
                        </div>

                        <div class="form-group" style="margin-left: 2px; margin-right: 2px;">
                            <textarea type="text" class="form-control" rows="3" placeholder="Description" name="desc" id="desc"></textarea>
                        </div>

                        <div class="form-group" style="margin-left: 2px; margin-right: 2px;">
                            <label>Upload Picture: </label>
                            <input type="file" class="form-control" placeholder="Upload Picture" name="image" id="image"/>
                        </div>

                        <div class="form-group" style="margin-left: 2px; margin-right: 2px;">
                            <button class="btn btn-primary btn-block" type="submit">
                                <i class="fa fa-send-o"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if($t == 2)
        <div class="row">
            <div class="col-lg-4 col-lg-offset-4">
                <br/>
                <br/>
                <header><h3>Add Goods to Market</h3></header>
                <br/>
                <br/>
                <div class="row">
                    @include('Partials._message')
                    <form class="form-horizontal" method="POST" action="{{route('market_edit',['id' => $m->id * 8009 * 8009])}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group" style="margin-left: 2px; margin-right: 2px;">
                            <input type="text" class="form-control input-lg" placeholder="Name of Goods" name="name" id="name" value="{{$m->name}}"/>
                        </div>

                        <div class="form-group" style="margin-left: 2px; margin-right: 2px;">
                            <textarea type="text" class="form-control input-lg" rows="3" placeholder="Description" name="desc" id="desc">{{$m->description}}</textarea>
                        </div>

                        <div class="form-group" style="margin-left: 2px; margin-right: 2px;">
                            <label>Upload Picture: </label>
                            <input type="file" value="{{$m->image}}" class="form-control input-lg" placeholder="Upload Picture" name="image" id="image"/>
                        </div>

                        <div class="form-group" style="margin-left: 2px; margin-right: 2px;">
                            <button class="btn btn-primary btn-block" type="submit">
                                <i class="fa fa-send-o"></i> Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection