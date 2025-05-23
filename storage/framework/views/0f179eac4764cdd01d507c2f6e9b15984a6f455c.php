<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>

        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Favicon icon-->
        <link rel="shortcut icon" href="<?php echo e(asset('images/favicon/icons8-invoice-pastel-32.png')); ?>">


        <!-- Libs CSS -->
        
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet"> -->
        <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" rel="stylesheet"> -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.4/simplebar.min.css" rel="stylesheet">



        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo e(asset('css/theme.min.css')); ?>">

        <?php echo $__env->yieldContent('styles'); ?>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name')); ?></title>
    </head>
    <body>
        <main id="main-wrapper" class="main-wrapper">
            <?php echo $__env->make('layouts.partials.top_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            
            <?php echo $__env->make('layouts.partials.side_navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page Content -->
            <div id="app-content">
                <!-- Container fluid -->
                <div class="app-content-area">
                    <div class="container-fluid">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>
            </div>
            <!-- Page Content End -->

        </main>
        
        <!-- Scripts -->
        <!-- Libs JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.4/simplebar.min.js"></script>

        <!-- Theme JS -->
        <script src="<?php echo e(asset('js/theme.min.js')); ?>"></script>
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html><?php /**PATH /home3/rmsauto5/public_html/IMS/resources/views/layouts/app.blade.php ENDPATH**/ ?>