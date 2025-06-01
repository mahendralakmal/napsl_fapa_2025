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
    <div class="container bg-white p-5 rounded shadow">
        <h2 class="mb-3">FAPA Awards 2025</h2>
        <p>
            In view of the 28th FAPA International Congress held in Sri Lanka, this photographic competition is organized by the National Association of Photographers-Sri Lanka (NAPSL) and the Federation of Asian Photographic Art (FAPA).
        </p>
        <h4>Sections:</h4>
        <ol>
            <li>Open Monochrome</li>
            <li>Open Color</li>
        </ol>
        <h4>Awards:</h4>
        <p>
            FAPA, NAPSL and PIPC Gold, Silver and Bronze Medals and Five Honorable Mentions will be awarded to the winners of each section. Exhibition of the awarded and accepted images will be held in Sri Lanka during the FAPA 28th Congress period.
        </p>
        <h4>Conditions of Entry:</h4>
        <ul>
            <li>Competition is open to all photographers in the FAPA member countries.</li>
            <li>Entries in digital format will be accepted for the competition.</li>
            <li>Each entrant can submit only 04 images for each section.</li>
            <li>The images in sRGB color space and <strong>jpeg</strong> file format can be uploaded directly to the following link or emailed to <a href="mailto:napslexhibition@napsl.com">napslexhibition@napsl.com</a>.</li>
            <li>Dimension: Maximum horizontal length <strong>1920</strong> pixels, vertical <strong>1080</strong> pixels.</li>
            <li>File size: should not exceed <strong>2 MB</strong> per image.</li>
            <li>AI generated images will not be accepted.</li>
            <li>Entrants should be prepared to submit high quality image files if their images are accepted for the exhibition.</li>
            <li>Copyright of the images will remain with the authors but the organizers have the right to use the images submitted for the competition for promotional activities of the FAPA for which the authors will not be paid but the photo credits will be given wherever possible.</li>
        </ul>
        <h4>Entry Fee:</h4>
        <ul>
            <li>USD 5.00 for one section</li>
            <li>USD 8.00 for both sections</li>
            <li><strong>Local (Sri Lankan) Entrants:</strong> LKR 1500 for one section &amp; LKR 2500 for both sections</li>
        </ul>
        <p><strong>Closing Date:</strong> <span style="color: rgb(255 0 0) !important; font-size: large; font-weight: bold;">30th of June 2025</span></p>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/napsl_ex/resources/views/rules.blade.php ENDPATH**/ ?>