<?php $__env->startSection('content'); ?>
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <div class="col-lg-8">
                &nbsp;&nbsp;&nbsp;<p style="font-size: xx-large"> Administrator</p>
            </div>
            <br/>
            <br/>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-4" style="margin-left: 3px;">
                    <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php if(count($adm) > 0): ?>
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Active</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1?>
                                <?php $__currentLoopData = $adm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($a->firstname . ' ' . $a->lastname); ?></td>
                                        <td><?php echo e($a->email); ?></td>
                                        <td><?php if($a->is_active): ?> Active <?php else: ?> False <?php endif; ?></td>
                                        <td> <?php if(Auth::user()->role_id == 1): ?> <a href="<?php echo e(route('admin_delete',['id' => $a->id * 8009 * 8009])); ?>" onclick="return confirm('Are you sure you want to delete this administrator? You can\'t Undo this Move');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                        <?php else: ?> N/A <?php endif; ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                    <?php endif; ?>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-4">
                    <h2 class="header" style="text-align: center;"> Add Administrator</h2>
                    <form action="<?php echo e(route('admin_admin')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input type="text" class="form-control" name="firstname" id="firstname" required placeholder="First Name" required/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="lastname" id="lastname" required placeholder="Last Name"/>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" required placeholder="Email Address"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" required placeholder="Password"/>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="conf_password" id="conf_password" required placeholder="Confirm Password"/>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>

        </header>
        <!-- Page Footer-->


    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>