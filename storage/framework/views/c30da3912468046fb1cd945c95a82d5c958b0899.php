
<!-- Form group -->
<div class="mb-3 col-md-12 col-12">
    <label class="form-label" for="description"><?php echo e(__('Description')); ?> <span class="text-danger">*</span></label>
    <textarea row="10" name="description" id="description" rows="5" class="form-control"><?php echo e(old('description')); ?></textarea>
</div>
<div class="mb-3 col-md-12 col-12">
    <label class="form-label" for="rate"><?php echo e(__('Default rate')); ?></label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend" style="border-bottom-right-radius:0px;border-top-right-radius:0px;">$</span>
        <input type="number" name="description_rate" step="0.01" min=0 aria-describedby="inputGroupPrepend" value="<?php echo e(old('description_rate')); ?>" id="rate" class="form-control" placeholder="<?php echo e(__('Enter default rate')); ?>">
    </div>
</div><?php /**PATH /home3/rmsauto5/public_html/IMS/resources/views/descriptions/formgroup.blade.php ENDPATH**/ ?>