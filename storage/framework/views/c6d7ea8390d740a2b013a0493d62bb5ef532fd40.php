<?php $__env->startSection('content'); ?>
    <!-- //breadcrumbs -->
    <!--investment news-->
    <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="container-fluid jumbotron" style="margin-bottom: 0 !important;">
            <header class="text-center" style="text-align: center; size: 25px; color: #777;"><h2 style="font-size:20px !important;"><?php echo e($in->name); ?></h2></header>
            <div class="row container">
                <div class="col-lg-5 col-sm-5">
                    <a href="#" style="text-decoration:none;color:#ff0a11;">
                        <p>
                            <img style="width:300px !important;height:250px !important;" src="<?php echo e(route('file',['filename' => $in->image])); ?>"/>
                        </p>
                    </a>
                </div>
                <div class="col-lg-7 col-sm-7">
                    <p class="well-sm text-muted container" style="font-family: 'Arial Unicode MS'; font-size: 20px; color: black; ">
                        <?php echo e($in->text); ?>

                    </p>
                    <a href="<?php if($in->link == null): ?><?php echo e(route('register')); ?><?php else: ?> <?php echo e($in->link); ?><?php endif; ?>" class="btn btn-primary"> Register <i class="fa fa-send"></i></a>
                </div>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>