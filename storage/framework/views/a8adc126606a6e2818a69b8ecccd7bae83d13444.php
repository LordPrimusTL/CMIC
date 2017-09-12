<?php $__env->startSection('content'); ?>
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">

                <?php if($e == 1): ?>
                    <h2 class="no-margin-bottom">Add Investment</h2>
                    <br/>
                    <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form enctype="multipart/form-data" method="POST" action="<?php echo e(route('admin_inv_add')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-lg-4 form-group">
                            <input type="text" name="name" id="name" required placeholder="Name Of Investment" class="form-control"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <textarea id="text" name="text" required placeholder="Text on Investment" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="col-lg-4 form-group">
                            <input type="text" name="link" id="link" placeholder="Link(Optional)" class="form-control"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="col-lg-6">Upload Image:</label>
                            <input type="file" class="form-control col-lg-12" name="image" id="image" accept="image/jpeg"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-file"></i> Save</button>
                        </div>
                    </form>
                <?php endif; ?>
                <?php if($e == 2): ?>
                    <h2 class="no-margin-bottom">Edit Investment</h2>
                    <br/>
                    <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form enctype="multipart/form-data" method="POST" action="<?php echo e(route('admin_inv_edit',['id' => $inv->id * 8009 * 8009])); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-lg-4 form-group">
                            <input type="text" name="name" id="name" required placeholder="Name Of Investment" class="form-control" value="<?php echo e($inv->name); ?>"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <textarea id="text" name="text" placeholder="Text on Investment" rows="3" class="form-control"><?php echo e($inv->text); ?></textarea>
                        </div>
                        <div class="col-lg-4 form-group">
                            <input type="text" name="link" id="link" placeholder="Link(Optional)" class="form-control" value="<?php echo e($inv->link); ?>"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <label class="col-lg-6">Upload Image:</label>
                            <input type="file" class="form-control col-lg-12" name="image" id="image"/>
                        </div>
                        <div class="col-lg-4 form-group">
                            <button type="submit" class="btn btn-success btn-block"><i class="fa fa-file"></i> Save</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </header>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>