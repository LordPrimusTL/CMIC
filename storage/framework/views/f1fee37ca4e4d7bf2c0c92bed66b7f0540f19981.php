<head>
    <title><?php echo e($title); ?> | CMIC</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <?php if(\App\Helper\AuthCheck::AuthAdminCheck()): ?>
        <link rel="stylesheet" href="<?php echo e(asset('css/bootstrap.min.css')); ?>">
        <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="<?php echo e(asset('css/style.default.css')); ?>" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
        <script src="<?php echo e(asset('js/jquery-1.11.1.min.js')); ?>"></script>
    <?php else: ?>
        <script type="application/x-javascript">
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
            function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- //for-mobile-apps -->
        <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet" type="text/css" media="all" />
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet" type="text/css" media="all" />
        <!-- font-awesome icons -->
        <link href="<?php echo e(asset('css/font-awesome.css')); ?>" rel="stylesheet">
        <!-- //font-awesome icons -->
        <!-- js -->
        <script src="<?php echo e(asset('js/jquery-1.11.1.min.js')); ?>"></script>
        <!-- start-smoth-scrolling -->
        <script type="text/javascript" src="<?php echo e(asset('js/move-top.js')); ?>"></script>
        <script type="text/javascript" src="<?php echo e(asset('js/easing.js')); ?>"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({ scrollTop: $(this.hash).offset().top }, 1000);
                });
            });
        </script>
        <!-- start-smoth-scrolling -->
    <?php endif; ?>
</head>