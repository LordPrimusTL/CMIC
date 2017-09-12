@extends('master')
@section('content')
    <div class="products">
        @include('Partials._message')
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <p><h3>Seller's Contact:</h3> </p>
                <table class="table table-responsive">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$u->firstname. ' ' . $u->lastname}}</td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->phone_number}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection