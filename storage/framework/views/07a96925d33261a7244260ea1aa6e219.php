<?php $__env->startSection('title'); ?>
    Rules & Regulations
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <style>
        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            font-weight: bold;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border-radius: 0.25rem;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-6">
            <embed src="<?php echo e(asset('pdf/Conditions of Entry-English.pdf')); ?>" type="application/pdf" width="100%"
                   height="800px"/>
        </div>
        <div class="col-md-6">
            <embed src="<?php echo e(asset('pdf/Conditions of Entry-Sinhala.pdf')); ?>" type="application/pdf" width="100%"
                   height="800px"/>
        </div>
        <div>
            <div class="flex justify-center">
                <a href="/login" class="btn btn-primary">Next -&gt;</a>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="<?php echo e(URL::asset('build/libs/apexcharts/apexcharts.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jsvectormap/js/jsvectormap.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/jsvectormap/maps/world-merc.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/libs/swiper/swiper-bundle.min.js')); ?>"></script>
    <!-- dashboard init -->
    <script src="<?php echo e(URL::asset('build/js/pages/dashboard-ecommerce.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/napsl_exhibitions/resources/views/index.blade.php ENDPATH**/ ?>