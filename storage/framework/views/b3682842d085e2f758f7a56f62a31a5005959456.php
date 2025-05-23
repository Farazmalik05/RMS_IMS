<?php $__env->startSection('content'); ?>
<div class="col-12 col-md-8 col-lg-6 col-xxl-4 py-8 py-xl-0">
    <div class="mb-4" style="text-align:center;">
        <a href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('images/logo/logo.jpg')); ?>" class="mb-2 text-inverse" alt="Image" style="max-width:100%;max-height:100px;">
        </a>
        <!-- <p class="mb-6">Please enter your user information.</p> -->
    </div>
    <!-- Card -->
    <div class="card smooth-shadow-md">
        <!-- Card body -->
        <div class="card-body p-5">
            <div class="mb-4">
                <p class="mb-6">Don't worry, we'll send you an email to reset your password.</p>
            </div>
            <?php if(session('status')): ?>
                <div class="alert alert-success" role="alert">
                    <?php echo e(session('status')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('password.email')); ?>">
                <?php echo csrf_field(); ?>
                <!-- Email input -->
                <div class="mb-3">
                    <label for="email" class="form-label"><?php echo e(__('Email Address')); ?></label>
                    <input type="email" id="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" placeholder="Enter Your Email" autocomplete="email" autofocus required="" value="<?php echo e(old('email')); ?>">
                    <?php $__errorArgs = ['email'];
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

                <!-- Submit button -->
                <div class="mb-3 d-grid">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Send Password Reset Link')); ?></button>
                </div>
                <span>Don't have an account? <a href="<?php echo e(route('register')); ?>">sign in</a></span>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\RMS_IMS\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>