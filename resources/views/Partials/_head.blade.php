<head>
    <title>{{$title}} | CMIC</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    @if(\App\Helper\AuthCheck::AuthAdminCheck())
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{asset('css/custom.css')}}">
        <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    @else
        <script type="application/x-javascript">
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
        <!-- font-awesome icons -->
        <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
        <!-- //font-awesome icons -->
        <!-- js -->
        <script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/easing.js')}}"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
    @endif
</head>