<?php $__env->startSection('content'); ?>
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>


           <div class="row">
               <div class="col-lg-2" style="margin-left: 10px;">
                   &nbsp;&nbsp;&nbsp;<a href="<?php echo e(route('admin_inv_add')); ?>"  class="btn btn-info btn-sm"><i class="fa fa-plus"></i> Add New Investment</a>
               </div>
               <div class="col-lg-offset-4">
                   <div class="row">
                       <div class="col-lg-12" style="margin-left: 10px;">

                           <form class="form-" method="POST" action="<?php echo e(route('admin_inv_search')); ?>">
                               <?php echo e(csrf_field()); ?>

                               <div class="col-lg-12">
                                   <p>Search Here...</p>
                                   <div class="form-group-sm ">
                                       <select class="form-control input-group-sm" name="filt" id="filt">
                                           <option value="0">Id</option>
                                           <option value="1">Name</option>
                                           <option value="2">Text</option>
                                       </select>
                                       <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                       <a href="<?php echo e(route('admin_inv')); ?>" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All Investment</a>
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
            <div class="col-lg-12 col-md-12 col-sm-4">
                <?php if(count($inv) > 0): ?>
                    <div class=" table table-responsive">
                        <table id="table" class="table table-bordered">
                            <thead>
                            <tr style="text-align: center;">
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Text</th>
                                <th>Link</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i =1;?>
                            <?php $__currentLoopData = $inv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td><?php echo e($in->name); ?></td>
                                    <td><?php echo e($in->text); ?></td>
                                    <th><?php if($in->link == null): ?> N/A <?php else: ?>
                                            <a href="<?php echo e($in->link); ?>" target="_blank"><?php echo e($in->link); ?></a>
                                        <?php endif; ?></th>
                                    <td><img src="<?php echo e(route('file',['filename' => $in->image])); ?>" width="150px" height="116px"/></td>
                                    <td>
                                        <p><a href="<?php echo e(route('admin_inv_edit',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-edit"></i>&nbsp; Edit&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
                                        <p style="margin-top: -10px;"><a href="<?php echo e(route('admin_inv_tut',['id' => $in->id * 8009 * 8009])); ?>" class="btn btn-outline-primary btn-sm"><i class="fa fa-eye"></i>&nbsp; View Tutorials&nbsp;&nbsp;</a></p>
                                        <p style="margin-top: -10px;"><?php if($in->link == null): ?> <a href="<?php echo e(route('admin_inv_cr',['id' => $in->id * 8009 * 8009])); ?>"  class="btn btn-outline-success btn-sm"><i class="fa fa-arrow-circle-right"></i>&nbsp;View Application</a><?php endif; ?></p>
                                        <p style="margin-top: -10px;"><a href="<?php echo e(route('admin_inv_delete',['id' => $in->id * 8009 * 8009])); ?>" onclick="return confirm('Are you sure you want to delete investment?');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Delete&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></p>
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
        </header>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>