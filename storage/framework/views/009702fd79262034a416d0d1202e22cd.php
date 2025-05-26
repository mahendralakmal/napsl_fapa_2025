<!doctype html >
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-layout="horizontal" data-topbar="dark"
    data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable" data-bs-theme="dark" data-layout-width="fluid">

<head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://www.napsl.com/storage/images/logos/favico.png">
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('layouts.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content" style="margin-top: 0px !important;margin-bottom: 10px !important;">
                <div class="container-fluid">

                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger error-seg">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

   

    <!-- JAVASCRIPT -->
    <?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
    setTimeout(function() {
        $('.error-seg').fadeOut('fast');
    }, 15000);
</script>
</body>

</html>
<?php /**PATH /var/www/napsl_ex/resources/views/layouts/master.blade.php ENDPATH**/ ?>