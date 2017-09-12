@extends('master')
@section('content')
    <!--- products -->
    <div class="products">
        @include('Partials._message')
        <div class="col-md-3">
            <a href="{{route('market_add')}}" class="btn btn-primary" style="margin-left: 120px;"> <i class="fa fa-plus"></i> Add Goods to CIMC Market</a>
            <br/>
            <br/>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
            <div class="">
                <form action="{{route('market_search')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-inline row">
                        <input type="text" class="form-control col-lg-8" style="margin-right: 10px;" name="search" id="search" placeholder="Search for an Item" required/>&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary col-lg-3">
                            <i class="fa fa-search" aria-hidden="true"> </i>
                        </button>
                    </div>

                </form>
            </div>
        </div>


        <div class="container">
            <div class="col-md-12">
                @if(count($mar) > 0)
                    @foreach($mar as $m)
                        <div class="col-md-3 top_brand_left">
                            <div class="hover14 column">
                                <div class="agile_top_brand_left_grid">
                                    <div class="agile_top_brand_left_grid_pos">
                                    </div>
                                    <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block">
                                                <div class="snipcart-thumb">
                                                    <a href=""><img title="" alt=" " src="{{route('file',['filename' => $m->image])}}" class="img img-rounded" width="200px" height="200px"></a>
                                                    <p>{{$m->name}}</p>
                                                </div>
                                                <div class="snipcart-details top_brand_home_details">
                                                    <form action="{{route('market_view_post')}}" method="post">
                                                        {{csrf_field()}}
                                                        <fieldset>
                                                            <input type="hidden" name="id" id="id" value="{{$m->id}}">
                                                            <input type="submit" name="submit" value="View More..." class="button">
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="well-lg">
                        <p class="text-center">No Goods In Storage Yet.</p>
                    </div>
                @endif
            </div>

        </div>

        <nav class="numbering" style="margin-left: -40px;">
            {{$mar->links()}}
        </nav>
        <div class="clearfix"> </div>
    </div>
    </div>
    <!--- products --->
@endsection