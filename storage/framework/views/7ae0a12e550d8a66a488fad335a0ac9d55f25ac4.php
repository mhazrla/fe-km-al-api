<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
  <div class="container-fluid">
    <div class="navbar-wrapper">
    <a class="navbar-brand" href="#pablo"><?php echo e($namePage); ?></a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
      <span class="navbar-toggler-bar navbar-kebab"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a href="<?php echo e(route('login')); ?>" class="nav-link">
            <i class="now-ui-icons design_app"></i> <?php echo e(__("Dashboard")); ?>

          </a>
        </li>
        <li class="nav-item <?php if($activePage == 'register'): ?> active <?php endif; ?>">
          <a href="<?php echo e(route('register')); ?>" class="nav-link">
            <i class="now-ui-icons tech_mobile"></i> <?php echo e(__("Register")); ?>

          </a>
        </li>
        <li class="nav-item <?php if($activePage == 'login'): ?> active <?php endif; ?> ">
          <a href="<?php echo e(route('login')); ?>" class="nav-link">
            <i class="now-ui-icons users_circle-08"></i> <?php echo e(__("Login")); ?>

          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar --><?php /**PATH C:\xampp\htdocs\fe-km-al-api\resources\views/layouts/navbars/navs/guest.blade.php ENDPATH**/ ?>