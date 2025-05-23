<?php $__env->startSection('content'); ?>
<!-- Heading -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 "><?php echo e(__('Create a job card')); ?></h3>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('jobcard.store')); ?>" method="Post" id="jobcard-form">
                <?php echo csrf_field(); ?>
                <div class="card">                
                    <div class="card-body">                        
                        <?php echo $__env->make('jobcard.formgroup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="row">
                            <div class="col-12" id="message">
                                <?php echo $__env->make('layouts.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2" id="quote-save"><?php echo e(__('Create job card')); ?></button>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function(){
            $("#jobcard-form").on('submit', function(e){
                e.preventDefault();
                var data = $(this).serialize();
                alert(data);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/jobcard/create.blade.php ENDPATH**/ ?>