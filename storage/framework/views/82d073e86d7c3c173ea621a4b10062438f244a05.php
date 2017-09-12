<?php $__env->startSection('content'); ?>
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-4">
                <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class=" table table-responsive">
                    <table id="table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Date</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Posted By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        <?php $__currentLoopData = $prod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e(\Carbon\Carbon::parse($pr->created_at)->toFormattedDateString()); ?></td>
                                <td><?php echo e($pr->name); ?></td>
                                <td><img src="<?php echo e(route('file',['filename' => $pr->image])); ?>" width="115px" height="115px"/> </td>
                                <td><a href="<?php echo e(route('admin_user_view',['id' => $pr->user_id * 8009 * 8009])); ?>" class="btn btn-default btn-sm"> <?php echo e($pr->user->firstname . ' ' . $pr->user->lastname); ?></a> </td></td>
                                <td>
                                    <a href="<?php echo e(route('admin_market_delete',['id' => $pr->id * 8009 * 8009])); ?>" onclick="return confirm('Are you sure you want to delete this product from the market??');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </header>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>