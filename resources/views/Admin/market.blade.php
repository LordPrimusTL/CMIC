@extends('master')
@section('content')
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-4">
                @include('Partials._message')
                <div class=" table table-responsive">
                    <table id="table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Posted By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($prod as $pr)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{\Carbon\Carbon::parse($pr->created_at)->toFormattedDateString()}}</td>
                                <td>{{$pr->name}}</td>
                                <td><img src="{{route('file',['filename' => $pr->image])}}" width="115px" height="115px"/> </td>
                                <td><a href="{{route('admin_user_view',['id' => $pr->user_id * 8009 * 8009])}}" class="btn btn-default btn-sm"> {{$pr->user->firstname . ' ' . $pr->user->lastname}}</a> </td></td>
                                <td>
                                    <a href="{{route('admin_market_delete',['id' => $pr->id * 8009 * 8009])}}" onclick="return confirm('Are you sure you want to delete this product from the market??');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </header>
    </div>
@endsection