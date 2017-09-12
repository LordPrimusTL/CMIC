<?php $__env->startSection('content'); ?>
    <div class="content-inner" style="font-family: Arial Unicode MS">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>

            <?php if($t == 1): ?>
                <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="row" style="margin-left: 10px;">
                    <div class="col-lg-4">
                        &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large; font-family:  Helvetica Neue, Helvetica, Arial, sans-serif;"> <?php echo e($title); ?></p>
                    </div>
                    <div class="col-lg-offset-4">
                        <div class="row">
                            <div class="col-lg-12" style="margin-left: 10px;">

                                <form class="form-" method="POST" action="<?php echo e(route('admin_trans_search')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="col-lg-12">
                                        <p>Search Here...</p>
                                        <div class="form-group-sm ">
                                            <select class="form-control input-group-sm" name="filt" id="filt">
                                                <option value="0">Transaction Id</option>
                                                <option value="1">User Id</option>
                                                <option value="2">Investment Id</option>
                                            </select>

                                            <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                            <a href="<?php echo e(route('admin_invs')); ?>" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All Transactions</a>
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
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-4">
                        <?php if(count($trans) > 0): ?>
                            {{}}
                            <div class=" table table-responsive">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Date</th>
                                        <th>Transaction ID</th>
                                        <th>INV. Name</th>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Desc.</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =1;?>
                                    <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $g = $in->ts_id;?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()); ?></td>
                                            <td><?php echo e($in->t_id); ?></td>
                                            <td><?php echo e($in->aff->name); ?></td>
                                            <td><a href="<?php echo e(route('admin_user_view',['id' => $in->user_id * 8009 * 8009])); ?>" class="btn btn-default btn-sm"> <?php echo e($in->user->firstname . ' ' .$in->user->lastname); ?></a> </td>
                                            <td><?php echo e($in->amount); ?></td>
                                            <td><?php echo e($in->descn); ?></td>
                                            <td><?php echo e('OUT'); ?></td>
                                            <td><?php if($in->t_type == 1): ?> <a href="<?php echo e(route('admin_earn_id',['id' => $in->t_id])); ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> View Earnings</a> <?php else: ?> No Action <?php endif; ?></td>
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
            <?php endif; ?>

            <?php if($t == 2): ?>
                <div class="row" style="margin-left: 10px;">
                    <div class="col-lg-4">
                        &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large; font-family:  Helvetica Neue, Helvetica, Arial, sans-serif;"> <?php echo e($title); ?></p>
                    </div>
                    <div class="col-lg-offset-4">
                        <div class="row">
                            <div class="col-lg-12" style="margin-left: 10px;">

                                <form class="form-" method="POST" action="<?php echo e(route('admin_earn_search')); ?>">
                                    <?php echo e(csrf_field()); ?>

                                    <div class="col-lg-12">
                                        <p>Search Here...</p>
                                        <div class="form-group-sm ">
                                            <select class="form-control input-group-sm" name="filt" id="filt">
                                                <option value="0">Transaction Id</option>
                                                <option value="1">Ernings Id</option>
                                                <option value="2">User Id</option>
                                                <option value="3">Investment Id</option>
                                            </select>
                                            <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                            <a href="<?php echo e(route('admin_invs')); ?>" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All Earnings</a>
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
                        <?php if(count($earn) > 0): ?>
                            <div class=" table table-responsive">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Date</th>
                                        <th>E. ID</th>
                                        <th>T. ID</th>
                                        <th>User</th>
                                        <th>Amount</th>
                                        <th>Desc.</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i =1;?>
                                    <?php $__currentLoopData = $earn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php $g = $in->ts_id;?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e(\Carbon\Carbon::parse($in->created_at)->toFormattedDateString()); ?></td>
                                            <td><?php echo e($in->e_id); ?></td>
                                            <td><?php echo e($in->t_id); ?></td>
                                            <td><a href="<?php echo e(route('admin_user_view',['id' => $in->user_id * 8009 * 8009])); ?>" class="btn btn-default btn-sm"> <?php echo e($in->user->id .'. ' . $in->user->firstname . ' ' .$in->user->lastname); ?></a> </td>
                                            <td><?php echo e($in->amount); ?></td>
                                            <td><?php echo e($in->descn); ?></td>
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
                        <form method="POST" action="<?php echo e(route('admin_earn_add')); ?>">
                            <?php echo e(csrf_field()); ?>

                            <div class="col-lg-8">
                                <h5>Add Earnings</h5>
                                <div class="form-group">
                                    <input type="text" class="form-control" <?php if($e != null): ?> disabled <?php else: ?> name="t_id" id="t_id" <?php endif; ?>  placeholder="Transaction ID" value="<?php if($e != null): ?> <?php echo e($e->t_id); ?><?php endif; ?>"/>
                                    <?php if($e != null): ?> <input type="hidden"  name="t_id" id="t_id"   value="<?php echo e($e->t_id); ?>"/> <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" <?php if($e != null): ?> disabled <?php else: ?> name="user_id" id="user_id" <?php endif; ?>  placeholder="User ID" value="<?php if($e != null): ?> <?php echo e($e->user->id . '.' . ' ' .$e->user->firstname . ' ' .$e->user->lastname); ?><?php endif; ?>"/>
                                    <?php if($e != null): ?> <input type="hidden" name="user_id" id="user_id" placeholder="User ID" value="<?php echo e($e->user->id); ?>"/> <?php endif; ?>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="amount" id="amount" placeholder="Amount"/>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="desc" id="desc" placeholder="Remark/Description"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-send"></i> Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            <?php endif; ?>
        </header>
        <!-- Page Footer-->


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>