@extends('master')
@section('content')
    <ul id="demo1" style="margin-bottom:0!important;padding-bottom:0!important;">
        <li>
            <img src="/images/cryptocurrency-101.png" alt="1st Image" />
            <!--Slider Description example-->
            <div class="slide-desc">
                <h3 style="color:white">Get lucrative profit/dividend by investing in World Class businesses</h3>
            </div>
        </li>
    </ul>
    <!-- //main-slider -->
    <!--News Slider-->
    <br/>
    <br/>
    <h2 style="text-align: center; size: 25px; color: #777;">CLUB NEWS</h2>
    <div class="carousel slide" data-interval="3000" data-ride="carousel" style="margin-bottom:20px;margin-top:70px;">
        <div class="carousel-inner">
            <?php $i = 1;?>
            @foreach($news as $n)
                <div class="item @if($i == 1) active @endif">
                    <a href="{{route('user_news_view',['id' => $n->id *8009 * 8009])}}">
                        <header class="text-center" style=""><h2 style="font-size:20px !important; color:black;">{{strtoupper($n->title)}}</h2></header>
                        <p class="well-sm  container" style="color:black; font-weight: normal;!important;">
                            {{\Illuminate\Support\Str::words($n->text,'30','...Read More.')}}
                        </p>
                    </a>
                </div>
                <?php $i++?>
            @endforeach
        </div>
    </div>
    <!--//News Slider ends here-->
    <!--// brief information about us-->
    <div class="container-fluid">
        <p class="well-sm lead">
        <h3 class="text-center" style="color:#777;" >Before you get started,  hear this;</h3>
        </p>
        <p class="well-sm container"style="color:black;" >
            Any investment we do here or adopt is for a purpose. Our goal is to research and bring up programs that would sustain you for life and can hand over to your kids . you must have 20 sources of unfailing income and we know them. Start today. By joining these programs through our club all you need to do is sleep and enjoy. We do everything collectively. Just pay and receive your profits monthly. You might have joined before but this time contribute with us and see the massive difference. Expecting you.        </p>
    </div>
    <!--//Our Activities-->
    <!--//Our Activities div ends here-->
    <!---Latest news section-->

    <div class="container" style="margin-top:30px;">
        @if(count($fv) > 0)
            <div class="row">
                <p class="panel-success panel-title text-center" style="font-size: 25px;color:#777;"><b>Club Investments</b> <i class="fa fa-handshake-o" aria-hidden="true"></i></p>
                @foreach($fv as $f)
                    <div class="col-lg-3">
                        <a href="@if($f->link == null) {{route('listings')}} @else {{$f->link}} @endif" target="_blank" style="text-decoration:none;color:#0c63ff;">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <p>
                                        <img src="{{route('file',['filename' => $f->image])}}" class="img img-rounded img-responsive" style="width:250px !important;height:200px !important;" />
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <a href="{{route('listings')}}" class="text-center col-lg-12" style="font-size:20px;color:white; background-color: #c52d2f;border-radius: 10px; margin-top: 30px !important;"><i class="fa fa-phone"></i> Call To Join Our Team</a>
            <br/><br/><br/>
        @endif

        <div class="row">
            <!--what we do-->
            <p class="text-center" style="font-size:25px;color:#777; border-radius: 10px; margin-top: 100px !important;"><b>WHAT WE OFFER</b></p>
            <div class="container" style="margin-top:30px;">
                <div class="row">
                    <div class="col-lg-3">
                        <a href="{{route('register')}}" style="text-decoration:none;color:#000;">
                            <div class="panel panel-default" style="border:none !important;">
                                <div class="panel-body">
                                    <p>
                                        <img src="images/Seminars.jpg" class="img img-rounded img-responsive" style="width:250px !important;height:200px !important;" />
                                    </p>
                                </div>
                                <header class="text-center"><h2 style="font-size:20px !important; border-style: solid; border-radius: 10px; border-color: #777; color:#777;">INVESTMENT TRAININGS</h2></header>
                                <p class="well-sm">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        We offer professional training of all kinds to our prospective members.
                                        Such trainings include;Crytocurrency training,investment trainings e.t.c
                                    </li>
                                </ul>

                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{route('user_market')}}" style="text-decoration:none;color:#000;">
                            <div class="panel panel-default" style="border:none; !important;">
                                <div class="panel-body">
                                    <p>
                                        <img src="images/sell3.jpg" class="img img-rounded img-responsive text-center" style="width:250px !important;height:200px !important;" />
                                    </p>
                                </div>
                                <h2 class="ll-headers">QUICK SELL</h2>
                                <p class="well-sm">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            This is member to member transactions.Members that wish to sell anything can advertise on the Quick sell Corner on the site
                                            so that other members can see it and purchase
                                        </li>
                                    </ul>

                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{route('register')}}" style="text-decoration:none;color:#000;">
                            <div class="panel panel-default" style="border:none !important;">
                                <div class="panel-body">
                                    <p>
                                        <img src="images/invest5.jpg" class="img img-rounded img-responsive" style="width:250px !important;height:200px !important;" />
                                    </p>
                                </div>
                                <h2 class="ll-headers">CLUB INVESTMENTS</h2>
                                <p class="well-sm">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            Our club local investments for now are FARMING AND EXPORT and other ones would come in later.
                                            Members who decides to invest in FARMING and/or EXPORT would be paid a certain percentage possible
                                            which would be set by the Admin.
                                        </li>
                                    </ul>
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{route('register')}}" style="text-decoration:none;color:#000">
                            <div class="panel panel-default"  style="border:none !important;">
                                <div class="panel-body">
                                    <p>
                                        <img src="images/Team-support.png" class="img img-rounded img-responsive" style="width:250px !important;height:200px !important;" />
                                    </p>
                                </div>
                                <h3 class="ll-headers">MEMBER SUPPORT</h3>
                                <p class="well-sm"  style="word-wrap: break-word;padding:2px;">
                                   <ul class="list-group"  style="word-wrap: break-word;padding:2px;">
                                    <li class="list-group-item">
                                        We support our members in all forms of investment. At Choice Mega Club,we help you to
                                        invest with your money and pay you dividends at a certain period according to our investors protocol
                                    </li>
                                </ul>
                                </p>
                            </div>
                        </a>
                    </div>
                    <a href="{{route('register')}}" class="text-center col-lg-12" style="font-size:20px;color:white; background-color: #c52d2f;border-radius: 10px; margin-top: 30px !important;">Join Now</a>
                </div>
            </div>

        </div>
        <!--//Our Activities-->
        <div class="container" style="margin-top:10px!important;margin-bottom:20px!important;">
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-body">
                        <p>
                            <img src="images/member2.jpg" class="img img-rounded img-responsive" style="width:250px !important;height:200px !important;" />
                        </p>
                        <h3 class="panel-title text-center sm_header" >MEMBERSHIP</h3>
                        <p class=" well-sm">
                        <ul class="list-group" style="word-wrap: break-word;padding:2px;">
                            <li class="list-group-item">Free membership:No fee attached and you can partake in all investments</li>
                            <li class="list-group-item">Premium Membership:This cost NGN5000.00 only paid to Firstbank of Nigeria(FBN) cooperate account.This enables you to get dividends</li>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-body">
                        <p>
                            <img src="images/news2.jpg" class="img img-rounded img-responsive" style="width:250px !important;height:200px !important;" />
                        </p>
                        <h3 class="panel-title text-center sm_header">NEWS AND SEMINARS</h3>
                        <p class=" well-sm"  style="word-wrap: break-word;padding:2px;">
                        <ul class="list-group" style="word-wrap: break-word;padding:2px;">
                            <li class="list-group-item">
                                We give you true information on foreign companies and exports,
                                news of investors, testimonies and success,
                                updates on latest investments.
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-body">
                        <p>
                            <img src="images/earn2.jpg" class="img img-rounded img-responsive" style="width:250px !important;height:200px !important;" />
                        </p>
                        <h3 class="panel-title text-center sm_header">MEMBERS DIVIDENDS</h3>
                        <p class=" well-sm" style="word-wrap: break-word;padding:2px;">
                        <ul class="list-group" style="word-wrap:break-word;padding:2px;">
                            <li class="list-group-item">
                                As an upgraded member,you would be given club dividends at certain times
                                depending on when the club makes profit because the club invests too in these
                                foreign companies.
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-body">
                        <p>
                            <img src="images/invest7.jpg" class="img img-rounded img-responsive" style="width:250px !important;height:200px !important;" />
                        </p>
                        <h3 class="panel-title text-center sm_header"> FOREIGN INVESTMENTS</h3>
                        <p class=" well-sm">
                        <ul class="list-group" style="word-wrap:break-word;padding:2px;">
                            <li class="list-group-item">
                                You and your family need to invest in foreign companies that have stood test of time
                                for a decade and made many people millionaires each year.
                                <b>Note</b>:Make sure you <a href="{{route('register')}}" style="margin-bottom:20px!important;" ><i>Join Now</i></a> through us<br /><br />
                            </li>
                        </ul>
                        </p>
                    </div>
                </div>
                <a href="{{route('register')}}" class="text-center col-lg-12" style="font-size:20px;color:white; background-color: #c52d2f;border-radius: 10px; margin-top: 30px !important;">Join Now</a>

            </div>
        </div>
        <!--//Our Activities div ends here-->
    </div>

@endsection