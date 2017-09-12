<?php $__env->startSection('content'); ?>
    <!-- breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <div class="pull-left">
                    <li><a href="<?php echo e(route('user_dashboard')); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a>/Dashboard</li>

                </div>
                <div class="pull-right">
                    <li class="pull-right">
                        Welcome </li>
                </div>
                <div class="clearfix"></div>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--// brief information about us-->
    <div class="container-fluid jumbotron" style="color:#ff0a11;">
        <p class="well-sm lead">
        <h3 class="text-center">Welcome Club Member</h3>
        </p>
        <p class="well-sm container">
            Welcome to a world of awesome business and investment opportunities where you are enlightened in true areas to invest with no fear of being duped. Here, you are encouraged to invest, get trained in the areas of different company investments. With CMIC, you will be financially supported if you have no funds and you get best business and investment advice.
        </p>
    </div>
    <!--Dashboard clicks-->
    <div class="container" style="margin-top:30px;">
        <div class="row">
            <div class="col-lg-3">
                <a href="<?php echo e(route('user_news')); ?>" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:#ff0a11;">
                        <br /><br />
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-info" style="font-size:40px;"></i></h3>
                            <p class="well-sm text-center">
                                Latest News
                                <br /><br /><br />
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo e(route('invest')); ?>" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:#ff0a11;">
                        <br />
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-briefcase" style="font-size:40px;"></i></h3>
                            <p class="well-sm text-center">
                                CLUB INVESTMENT
                                <br/>
                                <br /><br /><br />
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo e(route('user_profile')); ?>" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:#ff0a11;">
                        <br /><br />
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-eye" style="font-size:40px;"></i></h3>
                            <p class="well-sm text-center">
                                MEMBER PROFILE
                                <br /><br /><br />
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo e(route('user_finance')); ?>" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:#ff0a11;">
                        <br /><br />
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-money" style="font-size:40px;"></i></h3>
                            <p class="well-sm text-center">
                                FINANCE
                                <br /><br /><br />
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo e(route('user_deals')); ?>" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:#ff0a11;">
                        <br /><br />
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-hand-grab-o" style="font-size:40px;"></i></h3>
                            <p class="well-sm text-center">
                                DEALS
                                <br /><br /><br />
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo e(route('user_awards')); ?>" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:#ff0a11;">
                        <br /><br />
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-angellist" style="font-size:40px;"></i></h3>
                            <p class="well-sm text-center">
                                AWARDS
                                <br /><br /><br />
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo e(route('user_icj')); ?>" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:#ff0a11;">
                        <br /><br />
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-briefcase" style="font-size:40px;"></i></h3>
                            <p class="well-sm text-center">
                                INTERNATIONAL CONTRACT JOBS
                                <br /><br />
                            </p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3">
                <a href="<?php echo e(route('user_market')); ?>" style="text-decoration:none;color:white;">
                    <div class="panel" style="background-color:#ff0a11;">
                        <br/>
                        <div class="panel-body">
                            <h3 class="panel-title text-center"><i class="fa fa-shopping-basket" style="font-size:40px;"></i></h3>
                            <p class="well-sm text-center">
                                SHOPPING AND DISCOUNT<br />(SHOP MORE,QUICK SELL)
                                <br /><br /><br />
                            </p>
                        </div>
                    </div>
                </a>
            </div>
    </div>
    <!--//Dashboard clicks-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>