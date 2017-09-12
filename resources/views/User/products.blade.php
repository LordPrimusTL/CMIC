@extends('master')
@section('content')
    <!--- products -->
    <div class="products">
        <div class="container">
            <div class="col-md-3">
                <a href="{{route('market_add')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> Add Goods to CIMC Market</a>
            </div>
            <br/>
            <div class="col-md-12">
                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="/images/offer.png" alt=" " class="img-responsive">
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href=""><img title=" " alt=" " src="/images/cryptocurrency.png" width="200px" height="200px"></a>
                                            <p>Parryss-sugar</p>
                                            <h4>$30.99 <span>$45.00</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form action="{{route('market_view')}}" method="post">
                                                {{csrf_field()}}
                                                <fieldset>
                                                    <input type="hidden" name="id" id="id" value="ID HERE">
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
                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="/images/offer.png" alt=" " class="img-responsive">
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href=""><img title=" " alt=" " src="/images/cryptocurrency.png" width="200px" height="200px"></a>
                                            <p>Parryss-sugar</p>
                                            <h4>$30.99 <span>$45.00</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form action="{{route('market_view')}}" method="post">
                                                {{csrf_field()}}
                                                <fieldset>
                                                    <input type="hidden" name="id" id="id" value="ID HERE">
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
                <div class="col-md-3 top_brand_left">
                    <div class="hover14 column">
                        <div class="agile_top_brand_left_grid">
                            <div class="agile_top_brand_left_grid_pos">
                                <img src="/images/offer.png" alt=" " class="img-responsive">
                            </div>
                            <div class="agile_top_brand_left_grid1">
                                <figure>
                                    <div class="snipcart-item block">
                                        <div class="snipcart-thumb">
                                            <a href=""><img title=" " alt=" " src="/images/gbadegesin.jpg" width="200px" height="200px"></a>
                                            <p>Parryss-sugar</p>
                                            <h4>$30.99 <span>$45.00</span></h4>
                                        </div>
                                        <div class="snipcart-details top_brand_home_details">
                                            <form action="{{route('market_view')}}" method="post">
                                                {{csrf_field()}}
                                                <fieldset>
                                                    <input type="hidden" name="id" id="id" value="ID HERE">
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
            </div>
                <nav class="numbering">
                    <ul class="pagination paging">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!--- products --->
@endsection