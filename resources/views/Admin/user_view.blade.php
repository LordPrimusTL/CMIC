@extends('master')
@section('content')

    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">User Details</h2>
                <br/>
                @include('Partials._message')
                <div class="row">
                    <div class="col-lg-4">
                        <form enctype="multipart/form-data" method="POST" action="{{route('admin_user_upgrade',['id' => $u->id * 8009 * 8009])}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <input type="text" disabled required class="form-control" value="{{$u->id}}"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="{{strtoupper($u->firstname . ' ' . $u->lastname)}}"/>
                            </div>
                            <div class=" form-group">
                                <input type="email"  disabled name="email" class="form-control" value="{{$u->email}}"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="{{$u->country}}"/>
                            </div>
                            <div class="form-group">
                                <input type="text"  disabled required class="form-control" value="{{$u->state}}"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="{{$u->city}}"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="{{$u->phone_number}}"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="{{$u->address}}"/>
                            </div>
                            <div class=" form-group">
                                <label class="col-lg-6">Upgrade To: </label>
                                <select name="level_id" class="form-control input-lg">
                                    @foreach($lvl as $lv)
                                        @if($u->level_id == $lv->id)
                                            <option value="{{$lv->id}}" selected>{{$lv->name}}</option>
                                        @else
                                            <option value="{{$lv->id}}">{{$lv->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4 form-group">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-file"></i> Save</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-2">
                        <div class="card-img">
                            <img src="{{route('file',['filename' => $u->image])}}" alt="profile Image" class=" img img-rounded img-responsive" height="200" width="200px" />
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Footer-->
    </div>
@endsection