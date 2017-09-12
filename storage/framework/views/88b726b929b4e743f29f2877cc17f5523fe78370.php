<?php $__env->startSection('content'); ?>

    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom">User Details</h2>
                <br/>
                <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="row">
                    <div class="col-lg-4">
                        <form enctype="multipart/form-data" method="POST" action="<?php echo e(route('admin_user_upgrade',['id' => $u->id * 8009 * 8009])); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group">
                                <input type="text" disabled required class="form-control" value="<?php echo e($u->id); ?>"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="<?php echo e(strtoupper($u->firstname . ' ' . $u->lastname)); ?>"/>
                            </div>
                            <div class=" form-group">
                                <input type="email"  disabled name="email" class="form-control" value="<?php echo e($u->email); ?>"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="<?php echo e($u->country); ?>"/>
                            </div>
                            <div class="form-group">
                                <input type="text"  disabled required class="form-control" value="<?php echo e($u->state); ?>"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="<?php echo e($u->city); ?>"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="<?php echo e($u->phone_number); ?>"/>
                            </div>
                            <div class=" form-group">
                                <input type="text"  disabled required class="form-control" value="<?php echo e($u->address); ?>"/>
                            </div>
                            <div class=" form-group">
                                <label class="col-lg-6">Upgrade To: </label>
                                <select name="level_id" class="form-control input-lg">
                                    <?php $__currentLoopData = $lvl; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($u->level_id == $lv->id): ?>
                                            <option value="<?php echo e($lv->id); ?>" selected><?php echo e($lv->name); ?></option>
                                        <?php else: ?>
                                            <option value="<?php echo e($lv->id); ?>"><?php echo e($lv->name); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="col-lg-4 form-group">
                                <button type="submit" class="btn btn-success btn-block"><i class="fa fa-file"></i> Save</button>
                            </div>

                        </form>
                    </div>
                    <div class="col-lg-2">
                        <div class="card-img">
                            <img src="<?php echo e(route('file',['filename' => $u->image])); ?>" alt="profile Image" class=" img img-rounded img-responsive" height="200" width="200px" />
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Page Footer-->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>