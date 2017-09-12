<?php $__env->startSection('content'); ?>


    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li>
                    <a href="   <?php if(Auth::check()): ?>
                                    <?php if(Auth::user()->role_id == 3): ?>
                                        <?php echo e(route('user_dashboard')); ?>

                                    <?php elseif(Auth::user()->role_id < 3): ?>
                                        <?php echo e(route('admin_dash')); ?>

                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php echo e(route('home')); ?>

                                <?php endif; ?>">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>

                <li>
                    <a href="<?php echo e(route('user_news')); ?>">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>News</a></li>
                <li class="active"><?php echo e($m->title); ?></li>
            </ol>
        </div>
    </div>
    <!--- products -->
    <div class="">
        <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container">
            <div class="row">
                <h1 style="text-align: center"><?php echo e($m->title); ?></h1>
                <br/>
                <div class="col-lg-12" style="margin-left: 10px; text-justify: auto;">
                    <div class="panel-body">
                        <article><?php echo e($m->text); ?></article>
                    </div>

                    <div class="pull-right">
                        <p class="pull-right">Posted on: <?php echo e(\Carbon\Carbon::parse($m->created_at)->toFormattedDateString()); ?></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="clearfix"> </div>
    </div>
    <!--- products --->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>