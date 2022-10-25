<?php $__env->startSection('content'); ?>
    <div class="content">
        <div class="container">
            
            <div class="col-md-12 ml-auto mr-auto">
                <div class="header bg-gradient-primary py-10 py-lg-2 pt-lg-12">
                    <div class="container">
                        <div class="header-body text-center mb-7">
                            <div class="row justify-content-center">
                                <div class="col-lg-12 col-md-9">
                                    <p class="text-lead text-light mt-3 mb-0">
                                        <?php echo $__env->make('alerts.migrations_check', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                        <?php if(\Session::has('message')): ?>
                                            <div class="alert alert-danger">
                                                <?php echo e(\Session::get('message')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </p>
                                </div>
                                <div class="col-lg-5 col-md-6">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

            
            <div class="col-md-5 ml-auto mr-auto">
                <div class="cards">
                    <form role="form" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="card card-login card-plain">
                            <div class="card-header">
                                <div class="logo-container">
                                    <img src="<?php echo e(asset('assets/img/tni-logo.png')); ?>" alt="">
                                </div>
                                <h4 class="text-login">TENTARA NASIONAL INDONESIA</h4>
                            </div>

                            <div class="card-body ">
                                <div class="input-group no-border mb-3  form-control-lg">
                                    <div class="input-group">
                                        <input type="email"name="email"
                                            class="form-control bg-input-login <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>"
                                            placeholder="<?php echo e(__('EMAIL')); ?>" value="<?php echo e(old('email', 'admin@nowui.com')); ?>"
                                            required autofocus>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>
                                <div class="input-group no-border form-control-lg">
                                    <div class="input-group">
                                        <input type="password" name="password"
                                            class="form-control bg-input-login <?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>"
                                            placeholder="<?php echo e(__('PASSWORD')); ?>" value="<?php echo e(old('password', 'secret')); ?>"
                                            required autofocus>

                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center">

                                    <button type="submit" class="btn btn-login btn-dark mb-3"><?php echo e(__('LOGIN')); ?></button>

                                </div>
                            </div>

                            
                        </div>
                    </form>
                </div>
            </div>
            

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', [
    'namePage' => 'Login page',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'login',
    'backgroundImage' => asset('assets') . '/img/wallpaper-air.jpg',
], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\fe-km-al-api\resources\views/auth/login.blade.php ENDPATH**/ ?>