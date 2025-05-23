<?php if($message = Session::get('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong><?php echo e($message); ?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
  
<?php if($message = Session::get('error')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong><?php echo e($message); ?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
   
<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong><?php echo e($message); ?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
   
<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong><?php echo e($message); ?></strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>
  
<?php if($errors->any()): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <ul style="list-style-type: none; padding:0px; margin-bottom:0px">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><strong><?php echo e($error); ?></strong></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    <!-- Please check the form below for errors -->
</div>
<?php endif; ?><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/layouts/flash-message.blade.php ENDPATH**/ ?>