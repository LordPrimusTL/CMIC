<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <?php $user = \App\User::find(\Illuminate\Support\Facades\Auth::user()->id);?>
            <div class="panel-body">
                @if($user->image <> null)
                    <img src="{{asset('images/'.$user->image)}}" class="img-rounded img-responsive"/>
                @else
                    <img src="{{asset('images/default.png')}}" class="img-rounded img-responsive"/>
                @endif
            </div>
            <div class="panel-footer">
                <form class="form-group form-inline">
                    <a href="{{url('/user/profile/'. \Illuminate\Support\Facades\Auth::user()->id)}}" class="btn btn-primary text-center"><span class="glyphicon glyphicon-edit"></span>&nbsp; Edit  </a>
                    <button type="submit" class="btn btn-danger text-center"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-12">

    </div>

</div>