<?php $__env->startSection('title'); ?>
    Home
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

        /* .carousel-item {
            width: 50% !important;
            height: auto;
        } */
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7"></button>
            
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="<?php echo e(asset('images/carusel/FAPA Web 1.jpg')); ?>" class="d-block w-100" alt="Image 1">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/carusel/FAPA Web 2.jpg')); ?>" class="d-block w-100" alt="Image 2">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/carusel/FAPA Web 3.jpg')); ?>" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/carusel/FAPA Web 4.jpg')); ?>" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/carusel/FAPA Web 5.jpg')); ?>" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/carusel/FAPA Web 6.jpg')); ?>" class="d-block w-100" alt="Image 3">
            </div>
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/carusel/FAPA Web 7.jpg')); ?>" class="d-block w-100" alt="Image 3">
            </div>
            
            <div class="carousel-item">
                <img src="<?php echo e(asset('images/carusel/FAPA Web 9.jpg')); ?>" class="d-block w-100" alt="Image 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/napsl_ex/resources/views/index.blade.php ENDPATH**/ ?>