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
                <div class="col-lg-offset-4">
                    <div class="row">
                        <div class="col-lg-12" style="margin-left: 10px;">

                            <form class="form-" method="POST" action="<?php echo e(route('admin_award_search')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="col-lg-12">
                                    <p>Search Here...</p>
                                    <div class="form-group-sm ">
                                        <select class="form-control input-group-sm" name="filt" id="filt">
                                            <option value="0">Award ID</option>
                                            <option value="1">Name</option>
                                            <option value="2">how To Win</option>
                                        </select>
                                        <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                        <a href="<?php echo e(route('admin_awards')); ?>" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All Awards</a>
                                        <button style="margin-top: 5px;" class="btn btn-outline-primary btn-sm pull-right"  type="submit"><i class="fa fa-search"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                            <br/>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-4">
                    <?php if(count($awa) > 0): ?>
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>H-T-W</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                <?php $__currentLoopData = $awa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $g = $in->ts_id;?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()); ?></td>
                                        <td><?php echo e($in->name); ?></td>
                                        <td><?php echo e($in->HTW); ?></td>
                                        <td><img src="<?php echo e(route('file',['filename' => $in->image])); ?>" width="116px" height="116px"/> </td>
                                        <td>
                                            <a href="<?php echo e(route('admin_award_sus',['id' => $in->id * 8009 * 8009,'val' => $in->sus])); ?>" class="btn <?php if($in->sus): ?>btn-danger <?php else: ?> btn-success <?php endif; ?> btn-sm"><?php if($in->sus): ?><i class="fa fa-toggle-off"></i> Inactive <?php else: ?> <i class="fa fa-toggle-on"></i> Active <?php endif; ?></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo e(route('admin_award_add_winnner',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-outline-success btn-sm"><i class="fa fa-eye"></i> View Winners</a>
                                            <a href="<?php echo e(route('admin_award_del',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-cir btn-outline-danger btn-sm" style="margin-top: 5px;"><i class="fa fa-trash"></i> Delete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
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
                    <form method="POST" action="<?php echo e(route('admin_awards_add')); ?>" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-lg-8">
                            <h5>Add Awards</h5>
                            <div class="form-group">
                                <input type="text" class="form-control"  name="name" id="name" placeholder="Award Name" />
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="htw" id="htw" rows="3" placeholder="How TO Win"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Image:</label>
                                <input type="file" class="form-control" name="image" id="image" accept="image/jpeg"/>
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