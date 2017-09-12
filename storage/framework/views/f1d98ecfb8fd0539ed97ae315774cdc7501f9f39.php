<?php $__env->startSection('content'); ?>
    <div class="content-inner" style="font-family: Arial Unicode MS">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="row" style="margin-left: 10px;">
                <div class="col-lg-4">
                    &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large; font-family:  Helvetica Neue, Helvetica, Arial, sans-serif;"> <?php echo e($title); ?></p>
                </div>
            </div>
            <br/>
            <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <?php if(count($paw) > 0): ?>
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Testimony</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                <?php $__currentLoopData = $paw; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $g = $in->ts_id;?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()); ?></td>
                                        <td><?php echo e($in->name); ?></td>
                                        <td><?php echo e($in->testm); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('admin_award_wdel',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-cir btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete&nbsp;</a>
                                        </td>
                                    </tr>
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
                <div class="col-lg-4 col-md-6 col-sm-4">
                    <form method="POST" action="<?php echo e(route('admin_awards_wadd',['id' => $a_id])); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-lg-8">
                            <h5>Add Award Winner</h5>
                            <div class="form-group">
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Name of Winner" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="testm" id="testm" rows="3" placeholder="Testimony"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-send"></i> Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </header>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>