<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<?php echo $__env->make('Partials._head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<body class="myBody">
<?php if(\App\Helper\AuthCheck::AuthAdminCheck()): ?>
    <div class="page charts-page">
        <?php echo $__env->make('Partials._adminNavbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="page-content d-flex align-items-stretch">
            <?php echo $__env->make('Partials._adminSideBar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('Partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
<?php else: ?>
    <?php echo $__env->make('Partials._navbar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->yieldContent('content'); ?>
    <?php echo $__env->make('Partials._footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php endif; ?>
</body>
</html>
