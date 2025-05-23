<html lang="en">

    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/x-icon" href="">


    <!-- Libs CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.4/simplebar.min.css" rel="stylesheet">



    <!-- Theme CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('css/theme.min.css')); ?>">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?></title>
    </head>
    <body>
        <!-- container -->
        <main class="container d-flex flex-column">
            <div class="row align-items-center justify-content-center g-0 min-vh-100">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        </main>
        
         <!-- Scripts -->
         <!-- Libs JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/simplebar/6.2.4/simplebar.min.js"></script>

        <!-- Theme JS -->
        <script src="<?php echo e(asset('js/theme.min.js')); ?>"></script>
    </body>
</html>
<?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/layouts/auth.blade.php ENDPATH**/ ?>