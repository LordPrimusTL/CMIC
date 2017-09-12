<?php $__env->startSection('content'); ?>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li>
                    <a href="<?php if(Auth::user()->role_id == 3): ?><?php echo e(route('user_dashboard')); ?><?php elseif(Auth::user()->role_id < 3): ?><?php echo e(route('admin_dash')); ?><?php else: ?><?php echo e(route('home')); ?><?php endif; ?>">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li>
                    <a href="<?php echo e(route('user_finance')); ?>">
                        <span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>Finance</a></li>
                <li class="active">Deals</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--investment news-->
    <header class="text-center" style="color: #ff0a11; margin-bottom: 20px !important;"><h2 style="font-size:30px !important;"><?php echo e($title); ?></h2></header>
    <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="container-fluid jumbotron" style="margin-bottom: 0 !important;">
            <header class="text-center" style="color: #ff0a11; margin-bottom: 20px !important;"><h2 style="font-size:20px !important;"><?php echo e($in->name); ?></h2></header>
            <div class="row container">
                <div class="col-lg-5 col-sm-5">
                    <a href="#" style="text-decoration:none;color:#ff0a11;">
                        <p>
                            <img style="width:300px !important;height:250px !important;" src="<?php echo e(route('file',['filename' =>$in->image])); ?>"/>
                        </p>
                    </a>
                </div>
                <div class="col-lg-7 col-sm-7">
                    <p class="well-sm text-muted container" style="font-family: 'Arial Unicode MS'; font-size: 20px; color: #ff0a11;">
                        <?php echo e($in->descn); ?>

                    </p>
                    <a href="<?php echo e(route('d_reg',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-default btn-lg input-lg" style="background-color:red;color:#ffffff;">Apply</a>
                </div>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>