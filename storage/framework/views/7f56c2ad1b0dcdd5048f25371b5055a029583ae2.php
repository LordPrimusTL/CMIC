<div class="agileits_header">
    <div class="container">
        <div class="w3l_offers">
            <?php if(Auth::check()): ?>
                <p st>CHOICE MEGA INVESTORS CLUB <a href="#">ENJOY!!!</a></p>
            <?php else: ?>
                <p>CHOICE MEGA INVESTORS CLUB <a href="<?php echo e(route('register')); ?>">JOIN NOW</a></p>
            <?php endif; ?>
        </div>
        <div class="agile-login">
            <ul>
                <?php if(Auth::check()): ?>
                    <?php if(\App\Helper\AuthCheck::AuthUserCheck()): ?>
                        <li><a href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                    <?php elseif(\App\Helper\AuthCheck::AuthAdminCheck()): ?>
                        <li><a href="<?php echo e(url('/logout')); ?>">Logout</a></li>
                    <?php endif; ?>
                <?php else: ?>
                    <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                    <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
<br/>
<div class="logo_nproducts">
    <div class="cotainer">
        <div class="col-lg-4" style="margin-top: 50px;">
            <p><i class="fa fa-phone" aria-hidden="true" ></i> Call Us : (+234) 8033740309</p>
        </div>
        <div class="w3ls_logo_products_left">
            <a href="<?php echo e(route('home')); ?>">
                <img src="images/logo.jpg" class="img img-responsive img-thumbnail"/>
            </a>
        </div>
        <div class="w3l_search col-lg-4" style="margin-top: 50px;">
            <form action="<?php echo e(route('inv_search')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <input type="search" name="Search" placeholder="Search for an Investment" required>
                <button type="submit" class="btn btn-default search" aria-label="Left Align">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
                <div class="clearfix"></div>
            </form>
        </div>

        <div class="clearfix"> </div>
    </div>
</div>
<!-- //header -->
<!-- navigation -->
<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="
                        <?php if(Auth::check()): ?>
                            <?php if(Auth::user()->role_id == 3): ?>
                                <?php echo e(route('user_dashboard')); ?>

                            <?php elseif(Auth::user()->role_id < 3): ?>
                                <?php echo e(route('admin_dash')); ?>

                            <?php endif; ?>
                        <?php else: ?><?php echo e(route('home')); ?><?php endif; ?>" class="act">Home</a></li>
                    <!-- Mega Menu -->
                    <li><a href="<?php echo e(route('about')); ?>" class="act">About Us</a></li>
                    <li><a href="#">T&Cs</a></li>
                    <li><a href="<?php echo e(route('contact')); ?>">Contact</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>