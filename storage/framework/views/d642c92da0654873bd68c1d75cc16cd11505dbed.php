<?php $__env->startSection('content'); ?>
    <!--- products -->
    <div class="products">
        <?php echo $__env->make('Partials._message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-3">
            <a href="<?php echo e(route('market_add')); ?>" class="btn btn-primary" style="margin-left: 120px;"> <i class="fa fa-plus"></i> Add Goods to CIMC Market</a>
            <br/>
            <br/>
        </div>
        <div class="col-md-3">
        </div>
        <div class="col-md-3">
            <div class="">
                <form action="<?php echo e(route('market_search')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-inline row">
                        <input type="text" class="form-control col-lg-8" style="margin-right: 10px;" name="search" id="search" placeholder="Search for an Item" required/>&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-primary col-lg-3">
                            <i class="fa fa-search" aria-hidden="true"> </i>
                        </button>
                    </div>

                </form>
            </div>
        </div>


        <div class="container">
            <div class="col-md-12">
                <?php if(count($mar) > 0): ?>
                    <?php $__currentLoopData = $mar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-3 top_brand_left">
                            <div class="hover14 column">
                                <div class="agile_top_brand_left_grid">
                                    <div class="agile_top_brand_left_grid_pos">
                                    </div>
                                    <div class="agile_top_brand_left_grid1">
                                        <figure>
                                            <div class="snipcart-item block">
                                                <div class="snipcart-thumb">
                                                    <a href=""><img title="" alt=" " src="<?php echo e(route('file',['filename' => $m->image])); ?>" class="img img-rounded" width="200px" height="200px"></a>
                                                    <p><?php echo e($m->name); ?></p>
                                                </div>
                                                <div class="snipcart-details top_brand_home_details">
                                                    <form action="<?php echo e(route('market_view_post')); ?>" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                        <fieldset>
                                                            <input type="hidden" name="id" id="id" value="<?php echo e($m->id); ?>">
                                                            <input type="submit" name="submit" value="View More..." class="button">
                                                        </fieldset>
                                                    </form>
                                                </div>
                                            </div>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <div class="well-lg">
                        <p class="text-center">No Goods In Storage Yet.</p>
                    </div>
                <?php endif; ?>
            </div>

        </div>

        <nav class="numbering" style="margin-left: -40px;">
            <?php echo e($mar->links()); ?>

        </nav>
        <div class="clearfix"> </div>
    </div>
    </div>
    <!--- products --->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>