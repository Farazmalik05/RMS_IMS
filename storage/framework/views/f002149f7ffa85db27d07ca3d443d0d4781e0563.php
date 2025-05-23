<!-- Form group -->
<div class="mb-3 col-md-12 col-12">
    <label class="form-label" for="name"><?php echo e(__('Name')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name" class="form-control" value="<?php echo e($job->name ?? old('name')); ?>" placeholder="<?php echo e(__('Enter job name')); ?>">
</div>
<div class="mb-3 col-md-6 col-6">
    <label class="form-label" for="quantity"><?php echo e(__('Default quantity')); ?> <span class="text-danger">*</span></label>
    <input type="number" name="quantity" id="quantity" class="form-control" value="<?php echo e($job->quantity ?? old('quantity')); ?>" placeholder="<?php echo e(__('Enter default quantity')); ?>">
</div>
<div class="mb-3 col-md-6 col-6">
    <label class="form-label" for="rate"><?php echo e(__('Default rate')); ?> <span class="text-danger">*</span></label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend" style="border-bottom-right-radius:0px;border-top-right-radius:0px;">$</span>
        <input type="number" name="rate"  aria-describedby="inputGroupPrepend" value="<?php echo e($job->rate ?? old('rate')); ?>" id="rate" class="form-control" placeholder="<?php echo e(__('Enter default rate')); ?>">
    </div>
</div>
<div class="form-check form-switch ml-2 mb-2">
    <input type="hidden" name="has_description" value="0" id="has_description">
    <input class="form-check-input" type="checkbox" role="switch" id="has_description" name="has_description" value="1" <?php if(isset($job->has_description)): ?> <?php if(!empty($job->has_description)): ?> checked <?php endif; ?> <?php endif; ?>>
    <label class="form-check-label" for="has_description"><?php echo e(__('Description')); ?></label>
</div><?php /**PATH D:\wamp\www\RMS_IMS\resources\views/jobs/formgroup.blade.php ENDPATH**/ ?>