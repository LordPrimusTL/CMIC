<?php $__env->startSection('content'); ?>
    <div class="content-inner" style="font-family: Arial Unicode MS">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>


            <div class="row" style="margin-left: 10px;">
                <div class="col-lg-4">
                    &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large; font-family:  Helvetica Neue, Helvetica, Arial, sans-serif;"> Deal Applicant</p>
                </div>
                <div class="col-lg-offset-4">
                    <div class="row">
                        <div class="col-lg-12" style="margin-left: 10px;">

                            <form class="form-" method="POST" action="<?php echo e(route('admin_invs_search')); ?>">
                                <?php echo e(csrf_field()); ?>

                                <div class="col-lg-12">
                                    <p>Search Here...</p>
                                    <div class="form-group-sm ">
                                        <select class="form-control input-group-sm" name="filt" id="filt">
                                            <option value="0">Id</option>
                                            <option value="1">User Id</option>
                                            <option value="2">Deal Id</option>
                                        </select>

                                        <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                        <a href="<?php echo e(route('admin_deals_app')); ?>" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All</a>
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
                <div class="col-lg-12 col-md-12 col-sm-4">
                    <?php if(count($deal) > 0): ?>
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Deal Name</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                <?php $__currentLoopData = $deal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $g = $in->s_id;?>
                                    <tr class="<?php if($g == 1): ?> alert-success <?php elseif($g == 2 || $g == 4): ?> alert-warning <?php elseif($g == 3): ?> alert-danger <?php endif; ?>">
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e(\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()); ?></td>
                                        <td><?php echo e($in->deal->name); ?></td>
                                        <td><a href="<?php echo e(route('admin_user_view',['id' => $in->user_id * 8009 * 8009])); ?>" class="btn btn-default btn-sm"> <?php echo e($in->firstname . ' ' .$in->lastname); ?></a> </td>
                                        <td><?php echo e($in->email); ?> </td>
                                        <td><?php echo e($in->stat->name); ?></td>
                                        <td>
                                            <?php if($g == 1): ?>
                                                N/A
                                            <?php elseif($g ==2): ?>
                                                <a href="<?php echo e(route('admin_deal_auth',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i> Authorize</a>
                                                <a href="<?php echo e(route('deal_decline',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-outline-danger btn-sm"><i class="fa fa-close"></i> Decline</a>
                                            <?php elseif($g == 3): ?>
                                                No Action
                                            <?php elseif($g == 4): ?>
                                                <a href="<?php echo e(route('deal_comp',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-outline-success btn-sm"><i class="fa fa-check"></i> Completed</a>
                                            <?php endif; ?>
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

            </div>
        </header>
        <!-- Page Footer-->


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>