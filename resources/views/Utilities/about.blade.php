@extends('master')
@section('content')
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">About</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- about -->
    <div class="about">
        <div class="container">
            <h3 class="w3_agile_header">About Us</h3>
            <div class="about-agileinfo w3layouts">
                <div class="col-md-8 about-wthree-grids grid-top">
                    <h4>Choice Mega Investors Club (CMIC) </h4>
                    <p class="top">
                        is registered under a corporate name of CM&A Ltd since 2010 and the club is registered with the ministry of commerce, industry, cooperative and empowerment. The club was created as a result of the increasing need for knowledge and information in the business/ investment world. Today many are struggling financially and many are enjoying financially. What differentiates those enjoying from those struggling financially depends on the level of information they are exposed to. The club is the gathering point of information and we welcome everyone that has cogent and real information on investments that change lives.
                    </p>
                    <p>
                        With us, there are no lies and there are no fake investments to be done. The management does thorough research on investments making sure that the introduced investments to members are investments that have real registration, real owners, and real plans and are standing the test of time. We do not want anyone to lose money.
                    </p>
                    <p>
                        The initiator of the club and powering company in person of Investor Joshua with other powerful club champions have began the war against struggle and lack. Join us today. It’s easy and free. Call our support phone numbers to get registered. Many good things await members.
                    </p>
                    <p>
                        In CMIC we fear God, we pray for all our members we obey rules and regulations, we believe that not everyone can become a president or governor or Police AIG or Principal of a school but everyone can become rich when they invest rightly. Join us today
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item">CMIC Finance ( Loans, contributions ) affiliates</li>
                        <li class="list-group-item">CMIC Foreign investment affiliate (Questra holdings, Swissgolden, Winthrills, Monspace, Pay Diamond)</li>
                        <li class="list-group-item">CMIC Local investment affiliates ( Export trade, Farming)</li>
                        <li class="list-group-item">CMIC International contract jobs </li>
                        <li class="list-group-item">CMIC Crypto-currency Trades</li>
                        <li class="list-group-item">CMIC Awards</li>
                        <li class="list-group-item">CMIC Quick sell</li>
                        <li class="list-group-item"><p>CMIC Deals:   These are steps taken on behalf of members to arrange discounts anywhere like hotels, stores etc. also to get fund opportunities, scholarship, health plans, business and job contacts etc for members.</p></li>
                    </ul>
                    <div class="about-w3agilerow">
                        <div class="col-md-4 about-w3imgs">
                            <img src="images/p3.jpg" alt="" class="img-responsive zoom-img"/>
                        </div>
                        <div class="col-md-4 about-w3imgs">
                            <img src="images/p4.jpg" alt=""  class="img-responsive zoom-img"/>
                        </div>
                        <div class="col-md-4 about-w3imgs">
                            <img src="images/p3.jpg" alt=""  class="img-responsive zoom-img"/>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-4 about-wthree-grids">
                    <div class="offic-time">
                        <div class="time-top">
                            <h4>Praesentium :</h4>
                        </div>
                        <div class="time-bottom">
                            <h5>At vero eos </h5>
                            <h5>Accusamus et</h5>
                            <p>Dignissimos at vero eos et accusamus et iusto odio ducimus qui accusamus et. </p>
                        </div>
                    </div>
                    <div class="testi">
                        <h3 class="w3_agile_header">Testimonial</h3>
                        <!--//End-slider-script -->
                        <script src="js/responsiveslides.min.js"></script>
                        <script>
                            // You can also use "$(window).load(function() {"
                            $(function () {
                                // Slideshow 5
                                $("#slider5").responsiveSlides({
                                    auto: true,
                                    pager: false,
                                    nav: true,
                                    speed: 500,
                                    namespace: "callbacks",
                                    before: function () {
                                        $('.events').append("<li>before event fired.</li>");
                                    },
                                    after: function () {
                                        $('.events').append("<li>after event fired.</li>");
                                    }
                                });

                            });
                        </script>
                        <div  id="top" class="callbacks_container">
                            <ul class="rslides" id="slider5">
                                <li>
                                    <div class="testi-slider">
                                        <h4>" I AM VERY PLEASED.</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu magna dolor, quisque semper.</p>
                                        <div class="testi-subscript">
                                            <p><a href="#">John Doe,</a>Adipiscing</p>
                                            <span class="w3-agilesub"> </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="testi-slider">
                                        <h4>" I AM LOREM IPSUM.</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu magna dolor, quisque semper.</p>
                                        <div class="testi-subscript">
                                            <p><a href="#">elit semper,</a>Dolor Elit</p>
                                            <span class="w3-agilesub"> </span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="testi-slider">
                                        <h4>" CONSECTETUR PIMAGNA.</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse eu magna dolor, quisque semper.</p>
                                        <div class="testi-subscript">
                                            <p><a href="#">Amet Doe,</a>Suspendisse</p>
                                            <span class="w3-agilesub"> </span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //about -->
    <!-- about-slid -->
    <div class="about-slid agileits-w3layouts">
        <div class="container">
            <div class="about-slid-info">
                <h2>Lorem Ipsum is that it has a moreless normal</h2>
                <p>Lorem Ipsum generators on the Internet tend to repeat predefined chunks on the Internet tend as necessary, making this the first true generator on the Internet embarrassing hidden in the middle of text Lorem Ipsum generators on the Internet tend to repeat predefinedchunks as necessary, making this the first true generator on the.</p>
            </div>
        </div>
    </div>
    <!-- //about-slid -->
    <!-- about-team -->
    <div class="about-team">
        <div class="container">
            <h3 class="w3_agile_header">Meet Our Team</h3>
            <div class="team-agileitsinfo">
                <div class="col-md-3 about-team-grids">
                    <img src="images/t4.jpg" alt=""/>
                    <div class="team-w3lstext">
                        <h4><span>ANDERSON,</span> Manager</h4>
                        <p>Odio dignissimos vero eos voluptatem accusantium doloremque laudantium reader will be distracted.</p>
                    </div>
                    <div class="social-icons caption">
                        <ul>
                            <li><a href="#" class="fa fa-facebook facebook"> </a></li>
                            <li><a href="#" class="fa fa-twitter twitter"> </a></li>
                            <li><a href="#" class="fa fa-google-plus googleplus"> </a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class=" col-md-3 about-team-grids">
                    <img src="images/t2.jpg" alt=""/>
                    <div class="team-w3lstext">
                        <h4><span>ELIFS,</span> Director</h4>
                        <p>Odio dignissimos vero eos voluptatem accusantium doloremque laudantium reader will be distracted.</p>
                    </div>
                    <div class="social-icons caption">
                        <ul>
                            <li><a href="#" class="fa fa-facebook facebook"> </a></li>
                            <li><a href="#" class="fa fa-twitter twitter"> </a></li>
                            <li><a href="#" class="fa fa-google-plus googleplus"> </a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 about-team-grids">
                    <img src="images/t1.jpg" alt=""/>
                    <div class="team-w3lstext">
                        <h4><span>JESSICA,</span> Supervisior</h4>
                        <p>Odio dignissimos vero eos voluptatem accusantium doloremque laudantium reader will be distracted.</p>
                    </div>
                    <div class="social-icons caption">
                        <ul>
                            <li><a href="#" class="fa fa-facebook facebook"> </a></li>
                            <li><a href="#" class="fa fa-twitter twitter"> </a></li>
                            <li><a href="#" class="fa fa-google-plus googleplus"> </a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="col-md-3 about-team-grids">
                    <img src="images/t3.jpg" alt=""/>
                    <div class="team-w3lstext">
                        <h4><span>RACKHAM,</span> Staff</h4>
                        <p>Odio dignissimos vero eos voluptatem accusantium doloremque laudantium reader will be distracted.</p>
                    </div>
                    <div class="social-icons caption">
                        <ul>
                            <li><a href="#" class="fa fa-facebook facebook"> </a></li>
                            <li><a href="#" class="fa fa-twitter twitter"> </a></li>
                            <li><a href="#" class="fa fa-google-plus googleplus"> </a></li>
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>
    <!-- //about-team -->
@endsection