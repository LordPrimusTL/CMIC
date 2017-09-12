<?php $__env->startSection('content'); ?>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="<?php echo e(url('/')); ?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li>Login Page</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h2 style="color:#ff0a11">Login Form</h2>
            <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                <form action="<?php echo e(url('/login')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <input   id="email" name="email" placeholder="Email Address" type="text" value="" required />
                    <input   id="password" name="password" placeholder="Password" type="password" required/>
                    <div class="forgot">
                        <a href="#">Forgot Password?</a>
                    </div>
                    <input type="submit" value="Login">
                </form>        </div>
            <h4>For New People</h4>
            <p><a href="<?php echo e(url('/register')); ?>">Register Here</a> (Or) go back to <a href="<?php echo e(url('/')); ?>">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>