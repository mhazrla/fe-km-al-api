<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(asset('assets')); ?>/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?php echo e(asset('assets/img/tni-logo.png')); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- Extra details for Live View on GitHub Pages -->
    <title>
        TNI API
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- CSS Files -->

    <link href="<?php echo e(asset('assets')); ?>/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo e(asset('assets')); ?>/css/now-ui-dashboard.css?v=1.3.0" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/login.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/app.css')); ?>">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="<?php echo e(asset('assets')); ?>/demo/demo.css" rel="stylesheet" />

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>

</head>

<body class="<?php echo e($class ?? ''); ?>">
    <div class="wrapper">
        <?php if(auth()->guard()->check()): ?>
            <?php echo $__env->make('layouts.page_template.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <?php if(auth()->guard()->guest()): ?>
            <?php echo $__env->make('layouts.Login.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('assets')); ?>/js/core/jquery.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/core/popper.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/core/bootstrap.min.js"></script>
    <script src="<?php echo e(asset('assets')); ?>/js/plugins/perfect-scrollbar.jquery.min.js"></script>

    <script src="<?php echo e(asset('assets')); ?>/demo/demo.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <?php echo $__env->yieldPushContent('js'); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\fe-km-al-api\resources\views/layouts/app.blade.php ENDPATH**/ ?>