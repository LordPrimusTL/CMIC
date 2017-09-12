@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <br/>
            <br/>
            <header><h3>Add Goods to Market</h3></header>
            <br/>
            <br/>
            <div class="row">
                <div class="form-group" style="    margin-left: 700px;">

                </div>

                @include('Partials._message')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <header><h3>{{strtoupper($m->name)}}</h3></header>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <p style="text-align: center;"><img src="/images/products/{{$m->image}}" class="img img-rounded"/></p>
                        </div>
                        <br/><br/>
                        <div class="row">
                            <p style="margin-left: 10px; text-justify: auto;">{{$m->description}}</p>
                        </div>
                    </div>
                    <div class="panel-footer ">
                        @if(Auth::id() == $m->user_id)
                            <div class="form-group row" style="    margin-left: 700px;">
                                <a href="{{route('market_edit',['id' => $m->id * 8009 * 8009])}}" class="btn btn-primary"> <i class="fa fa-edit"></i> Edit</a>
                                <a href="{{route('market_delete',['id' => $m->id * 8009 * 8009])}}" style="background: red;" onclick="return confirm('Are you sure you want to delete this User?'); class="btn btn-danger" > <i class="fa fa-trash"></i> Delete</a>
                            </div>
                        @else
                            <div class="form-group row" style="    margin-left: 700px;">
                                    <a href="{{route('market_contact',['id' => $m->user_id * 8009 * 8009])}}" class="btn btn-primary"> <i class="fa fa-buysellads"></i> Contact Seller</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection