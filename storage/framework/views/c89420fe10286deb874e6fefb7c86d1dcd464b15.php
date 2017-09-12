<?php $__env->startSection('content'); ?>
    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
                <h2 class="no-margin-bottom"></h2>
            </div>
            <br/>
            <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <div class="row">
                <div class="col-lg-12" style="margin-left: 10px;">

                    <form class="form-" method="POST" action="<?php echo e(route('admin_news_search')); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="col-lg-3">
                            <p>Search Here...</p>
                            <div class="form-group-sm ">
                                <select class="form-control input-group-sm" name="filt" id="filt">
                                    <option value="0">ID</option>
                                    <option value="1">Title</option>
                                    <option value="2">Text</option>
                                </select>

                                <input type="search" class="form-control input-sm small" name="key" id="key" placeholder="Search Key"/>
                                <a href="<?php echo e(route('admin_news')); ?>" style="margin-top: 5px;" class="btn btn-outline-primary btn-sm">All News</a>
                                <button style="margin-top: 5px;" class="btn btn-outline-primary btn-sm pull-right"  type="submit"><i class="fa fa-search"></i> Search</button>
                            </div>
                        </div>
                    </form>
                    <br/>
                    <br/>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-4">
                    <?php if(count($news) > 0): ?>
                        <div class=" table table-responsive">
                            <table id="table" class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Text</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i =1;?>
                                <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $in): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($i++); ?></td>
                                        <td><?php echo e($in->title); ?></td>
                                        <td><?php echo e($in->text); ?></td>
                                        <td>
                                            <p><a href="<?php echo e(route('admin_news_delete',['id' => $in->id * 8009 * 8009])); ?>" onclick="return confirm('Are you sure you want to delete news?');" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i>&nbsp; Delete</a></p>
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
                <div class="col-lg-4">
                    <h2 style="text-align: center;">Add News</h2>
                    <form action="<?php echo e(route('admin_news_add')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="title" placeholder="News Title"/>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="text" id="text" placeholder="News Text"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-send"></i> Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </header>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>