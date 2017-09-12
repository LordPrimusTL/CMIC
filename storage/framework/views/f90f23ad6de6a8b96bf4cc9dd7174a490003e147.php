<?php $__env->startSection('content'); ?>
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>


            <div class="row">
                <div class="col-lg-12" style="margin-left: 10px;">
                    <p>Search Here...</p>
                    <form class="form-" method="POST" action="<?php echo e(route('admin_user_search')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-lg-3">
                            <div class="form-group-sm ">
                                <select class="form-control input-group-sm" name="filt" id="filt">
                                    <option value="0">ID</option>
                                    <option value="1">Name</option>
                                    <option value="2">Email</option>
                                    <option value="3">Country</option>
                                    <option value="4">State</option>
                                    <option value="5">City</option>
                                    <option value="6">Level ID(Numbers)</option>
                                    <option value="7">Active(1 or 0)</option>
                                </select>

                                <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                <a href="<?php echo e(route('admin_dash')); ?>" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All User</a>
                                <button style="margin-top: 5px;" class="btn btn-outline-primary btn-sm pull-right"  type="submit"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </form>
                    <br/>
                    <br/>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-4">
                <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class=" table table-responsive">
                    <table id="table" class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($i++); ?></td>
                                <td><?php echo e($user->firstname); ?></td>
                                <td><?php echo e($user->lastname); ?></td>
                                <td><?php echo e($user->email); ?></td>
                                <td><?php echo e(\App\level::find($user->level_id)->name); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin_user_view', ['id' => $user->id * 8009 * 8009])); ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-eye"></i> View</a>
                                    <a href="<?php echo e(route('admin_user_delete',['id' => $user->id * 8009 * 8009])); ?>" onclick="return confirm('Are you sure you want to delete this User?');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
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