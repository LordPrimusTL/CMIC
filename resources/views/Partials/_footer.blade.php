
@if(\App\Helper\AuthCheck::AuthAdminCheck())
    <script src="/js/tether.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.cookie.js"> </script>
    <script src="/js/jquery.validate.min.js"></script>
    <script src="/js/front.js"></script>
    <script src="/js/app.js"></script>
@else
    <div class="footer">
        <div class="container">
            <div class="w3_footer_grids container-fluid">
                <div class="col-md-4 w3_footer_grid">
                    <h3>Contact</h3>

                    <ul class="address">
                        <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Suite D119, New Orisunmbare Shopping <span> Complex, MDS, Osogbo, Osun state.</span></li>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:support@cmiclub.com">support@cmiclub.com</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>08033740309, 07061231896,<span>09066952730, 08062568264</span></li>
                        <li><i class="glyphicon glyphicon-user" aria-hidden="true"></i><a href="#twakto_toggle">CHAT WITH US NOW</a></li>

                    </ul>
                </div>
                <div class="col-md-4 w3_footer_grid">
                    <h3>Information</h3>
                    <ul class="info">
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{route('about')}}">About Us</a></li>
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{route('contact')}}">Contact Us</a></li>
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="">Terms <b>&</b> Conditions</a></li>
                    </ul>
                </div>
                <div class="col-md-4 w3_footer_grid">
                    <h3>JOIN TODAY</h3>
                    <ul class="info">
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{route('login')}}">Login</a></li>
                        <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="{{route('register')}}">Create Account</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copy">
            <div class="container" style="margin-top: -50px;">
                <p style="color:red;">2017 CMIC. All rights reserved</p>
            </div>
        </div>
    </div>
    <div class="footer-botm">
        <div class="container">
            <div class="w3layouts-foot">
                <ul>
                    <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                    <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                </ul>
            </div>
            <div class="payment-w3ls">
                <img src="/images/card.png" alt=" " class="img-responsive">
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
    <!-- //footer -->
    <!-- Bootstrap Core JavaScript -->

    <script src="js/bootstrap.min.js"></script>

    <!-- top-header and slider -->
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <!-- //here ends scrolling icon -->
    <script src="/js/minicart.min.js"></script>
    <script>
        // Mini Cart
        paypal.minicart.render({
            action: '#'
        });

        if (~window.location.search.indexOf('reset=true')) {
            paypal.minicart.reset();
        }
    </script>
    <!-- main slider-banner -->
    <script src="js/skdslider.min.js"></script>
    <link href="css/skdslider.css" rel="stylesheet">
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#demo1').skdslider({ 'delay': 5000, 'animationSpeed': 2000, 'showNextPrev': true, 'showPlayButton': true, 'autoSlide': true, 'animationType': 'fading' });

            jQuery('#responsive').change(function () {
                $('#responsive_wrapper').width(jQuery(this).val());
            });

        });
    </script>
    <!-- //main slider-banner -->
@endif