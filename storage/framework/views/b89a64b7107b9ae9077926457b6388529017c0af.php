<div class="wrapper wrapper-full-page ">
    
    <div class="full-page register-page section-image" filter-color="black">
        <?php echo $__env->yieldContent('content'); ?>
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\fe-km-al-api\resources\views/layouts/Login/guest.blade.php ENDPATH**/ ?>