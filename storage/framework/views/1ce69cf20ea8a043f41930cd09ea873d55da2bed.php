<?php $__env->startSection('content'); ?>
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="col-lg-6">
                &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large"> Stack Error </p>
            </div>
            <br/>
            <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="col-lg-12 col-md-12 col-sm-4">
                <?php if(count($err) > 0): ?>
                    <pre>
                    </pre>
                    <div class=" table table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Error ID</th>
                                <th>Solved</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1;?>
                            <?php $__currentLoopData = $err; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($in->solved): ?>
                                    <tr class="alert-success">
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($in->error_id); ?></td>
                                        <td>True</td>
                                        <td>Solved</td>
                                    </tr>
                                <?php endif; ?>
                                <?php if(!$in->solved): ?>
                                    <tr class="alert-danger">
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($in->error_id); ?></td>
                                        <td>False</td>
                                        <td>
                                            <a href="<?php echo e(route('admin_error_edit',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-success"><i class="fa fa-check-square"></i>&nbsp; Solved</a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="pane panel-default">
                        <div class="panel-body">
                            <p style="text-align: center; font-family: 'Comic Sans MS';font-size: xx-large;">No Data</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </header>
        <!-- Page Footer-->


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>