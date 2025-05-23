<?php $__env->startSection('styles'); ?>
<style>
    .ml-2 {
        margin-left: 10px!important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Heading -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 "><?php echo e(__('Edit Description')); ?></h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('jobs.descriptions.update', [$job, $description])); ?>" method="Post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
                <div class="card">                
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <?php echo $__env->make('descriptions.updateformgroup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div>
                            <?php if($errors->storedescription->any()): ?>
                                <div class="alert alert-danger">
                                    <ul style="list-style-type: none; padding:0px; margin-bottom:0px">
                                        <?php $__currentLoopData = $errors->storedescription->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(__('Save description')); ?></button>
                    <a href="<?php echo e(route('jobs.edit', $job)); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/rmsauto5/public_html/IMS/resources/views/descriptions/edit.blade.php ENDPATH**/ ?>