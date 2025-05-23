<!-- Form group -->
<div class="mb-4 col-md-4 col-4">
    <label class="form-label" for="customer_name"><?php echo e(__('Customer Name')); ?> <span class="text-danger">*</span></label>
    <?php if(isset($vehicle['name']) && !empty($vehicle['name'])): ?>
        <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php if(isset($vehicle['name']) && !empty($vehicle['name'])): ?> <?php echo e($vehicle['name']); ?> <?php endif; ?>" placeholder="<?php echo e(__('Enter customer name')); ?>">
        <input type="hidden" id="customer_id" name="customer_id" value="<?php if(isset($vehicle['name']) && !empty($vehicle['id'])): ?> <?php echo e($vehicle['id']); ?> <?php endif; ?>">
    <?php else: ?>
        <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo e($vehicle->customer->name ?? old('customer_name')); ?>" placeholder="<?php echo e(__('Enter customer name')); ?>">
        <input type="hidden" id="customer_id" name="customer_id" value="<?php echo e($vehicle->customer->id ?? old('customer_id')); ?>">
    <?php endif; ?>
</div>
<div class="mb-4 col-md-4 col-4">
    <label class="form-label" for="customer_phoneno"><?php echo e(__('Customer Phone#')); ?> <span class="text-danger">*</span></label>
    <?php if(isset($vehicle['name']) && !empty($vehicle['name'])): ?>
        <input type="text" name="customer_phoneno" id="customer_phoneno" class="form-control" value="<?php if(isset($vehicle['phoneno']) && !empty($vehicle['phoneno'])): ?> <?php echo e($vehicle['phoneno']); ?> <?php endif; ?> <?php echo e($vehicle->customer->phoneno ?? old('customer_phoneno')); ?>" placeholder="<?php echo e(__('Enter customer phone#')); ?>">    
    <?php else: ?>
        <input type="text" name="customer_phoneno" id="customer_phoneno" class="form-control" value="<?php echo e($vehicle->customer->phoneno ?? old('customer_phoneno')); ?>" placeholder="<?php echo e(__('Enter customer phone#')); ?>">
    <?php endif; ?>
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="rego"><?php echo e(__('Rego#')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="rego" id="rego" class="form-control" value="<?php echo e($vehicle->rego ?? old('rego')); ?>" maxlength="10" placeholder="<?php echo e(__('Enter rego#')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="make"><?php echo e(__('Make')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="make" value="<?php echo e($vehicle->make ?? old('make')); ?>" id="make" class="form-control" placeholder="<?php echo e(__('Enter make of the vehicle')); ?>" autocomplete>
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="model"><?php echo e(__('Model')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="model" id="model" value="<?php echo e($vehicle->model ?? old('model')); ?>" class="form-control" placeholder="<?php echo e(__('Enter model of the vehicle')); ?>" autocomplete>
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="colour"><?php echo e(__('Colour')); ?></label>
    <input type="text" name="colour" id="colour" value="<?php echo e($vehicle->colour ?? old('colour')); ?>" class="form-control" placeholder="<?php echo e(__('Enter colour of the vehicle')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="vin_no"><?php echo e(__('Vin#')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="vin_no" id="vin_no" value="<?php echo e($vehicle->vin_no ?? old('vin_no')); ?>" class="form-control" placeholder="<?php echo e(__('Enter vin#')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="transmission"><?php echo e(__('Transmission')); ?> <span class="text-danger">*</span></label>
    <select name="transmission" id="transmission" class="form-select">
        <option value="A" <?php if(isset($vehicle->transmission)): ?> <?php if($vehicle->transmission == 'A'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Automatic')); ?></option>
        <option value="M" <?php if(isset($vehicle->transmission)): ?> <?php if($vehicle->transmission == 'M'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Manual')); ?></option>
    </select>
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="year"><?php echo e(__('Year')); ?> <span class="text-danger">*</span></label>
    <select name="year" id="year" class="form-select">
        <?php    
            $last= date('Y')-30;
            $now = date('Y');
        ?>
        <?php for($i = $now; $i >= $last; $i--): ?>
            <option value="<?php echo e($i); ?>" <?php if(isset($vehicle->year)): ?> <?php if($vehicle->year == $i): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($i); ?></option>
        <?php endfor; ?>
    </select>
</div><?php /**PATH D:\wamp\www\RMS_IMS\resources\views/vehicles/formgroup.blade.php ENDPATH**/ ?>