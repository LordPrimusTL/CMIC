<?php $__env->startSection('content'); ?>
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li>
                    <a href="<?php if(Auth::user()->role_id == 3): ?><?php echo e(route('user_dashboard')); ?><?php elseif(Auth::user()->role_id < 3): ?><?php echo e(route('admin_dash')); ?><?php else: ?><?php echo e(route('home')); ?><?php endif; ?>">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li class="active">Investment</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!--investment news-->
        <header class="text-center" style="color: #777; margin-bottom: 20px !important;"><h2 style="font-size:30px !important;">CLUB INVESTMENT</h2></header>
        <br/>
    <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <section class="container-fluid" style="margin-bottom: 0 !important;">
            <div class="row container">
                <div class="col-lg-5 col-sm-5">
                    <a href="<?php if($in->link == null): ?> <?php echo e(route('f_invest_reg',['id' => $in->id])); ?> <?php else: ?> <?php echo e($in->link); ?> <?php endif; ?>" style="text-decoration:none;color:#ff0a11;">
                        <p>
                            <img style="width:300px !important;height:250px !important;" src="<?php echo e(route('file',['filename' =>$in->image])); ?>"/>
                        </p>
                    </a>
                </div>
                <div class="col-lg-7 col-sm-7">
                    <header class="text-center" style="color: #ff0a11; margin-bottom: 20px !important;"><h2 class="sm_header"><?php echo e($in->name); ?></h2></header>
                    <p class="well-sm text-muted container" style="font-family: 'Arial Unicode MS'; font-size: 20px; color: black;">
                        <?php echo e($in->text); ?>

                    </p>
                    <?php $tut = \App\inv_aff::find($in->id)->tut()->where(['is_active' => true])->orderBy('id','DESC')->get();?>
                    <?php if(count($tut) > 0): ?>
                        <h3 class="text-center" style="color:purple;margin-bottom:8px;">Files</h3>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr style="color:red;">
                                    <th>FileName</th>
                                    <th>DownloadLink</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $tut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($e->name); ?></td>
                                        <td><a href="<?php echo e(route('file',['filename' => $e->name])); ?>" class="btn btn-primary"><i class="fa fa-download"></i> Download</a> </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <h3 class="text-center" style="margin-bottom:8px;">No Tutorials Yet.</h3>
                    <?php endif; ?>
                        <a href="<?php if($in->link == null): ?> <?php echo e(route('f_invest_reg',['id' => $in->id * 8009 * 8009])); ?> <?php else: ?> <?php echo e($in->link); ?> <?php endif; ?>" class="btn btn-primary"> Register <i class="fa fa-send"></i></a>
                </div>
            </div>
        </section>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>