<!-- Form group -->
<div class="mb-4 col-md-4 col-4">
    <label class="form-label" for="customer_name"><?php echo e(__('Customer Name')); ?> <span class="text-danger">*</span></label>
    <?php if(isset($vehicle['name']) && !empty($vehicle['name'])): ?>
        <input type="text" name="customer_name" id="customer_name" class="form-control <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php if(isset($vehicle['name']) && !empty($vehicle['name'])): ?> <?php echo e($vehicle['name']); ?> <?php endif; ?>" placeholder="<?php echo e(__('Enter customer name')); ?>">
        <input type="hidden" id="customer_id" name="customer_id" value="<?php if(isset($vehicle['name']) && !empty($vehicle['id'])): ?> <?php echo e($vehicle['id']); ?> <?php endif; ?>">
    <?php else: ?>
        <input type="text" name="customer_name" id="customer_name" class="form-control <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($vehicle->customer->name ?? old('customer_name')); ?>" placeholder="<?php echo e(__('Enter customer name')); ?>">
        <input type="hidden" id="customer_id" name="customer_id" value="<?php echo e($vehicle->customer->id ?? old('customer_id')); ?>">
    <?php endif; ?>
    <?php $__errorArgs = ['customer_name'];
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
<div class="mb-4 col-md-4 col-4">
    <label class="form-label" for="customer_phoneno"><?php echo e(__('Customer Phone#')); ?> <span class="text-danger">*</span></label>
    <?php if(isset($vehicle['name']) && !empty($vehicle['name'])): ?>
        <input type="text" name="customer_phoneno" id="customer_phoneno" class="form-control <?php $__errorArgs = ['customer_phoneno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php if(isset($vehicle['phoneno']) && !empty($vehicle['phoneno'])): ?> <?php echo e($vehicle['phoneno']); ?> <?php endif; ?> <?php echo e($vehicle->customer->phoneno ?? old('customer_phoneno')); ?>" placeholder="<?php echo e(__('Enter customer phone#')); ?>">    
    <?php else: ?>
        <input type="text" name="customer_phoneno" id="customer_phoneno" class="form-control <?php $__errorArgs = ['customer_phoneno'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($vehicle->customer->phoneno ?? old('customer_phoneno')); ?>" placeholder="<?php echo e(__('Enter customer phone#')); ?>">
    <?php endif; ?>
    <?php $__errorArgs = ['customer_phoneno'];
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
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="rego"><?php echo e(__('Rego#')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="rego" id="rego" class="form-control <?php $__errorArgs = ['rego'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($vehicle->rego ?? old('rego')); ?>" maxlength="10" placeholder="<?php echo e(__('Enter rego#')); ?>">
    <?php $__errorArgs = ['rego'];
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
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="make"><?php echo e(__('Make')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="make" value="<?php echo e($vehicle->make ?? old('make')); ?>" id="make" class="form-control <?php $__errorArgs = ['make'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter make of the vehicle')); ?>" autocomplete>
    <?php $__errorArgs = ['make'];
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
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="model"><?php echo e(__('Model')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="model" id="model" value="<?php echo e($vehicle->model ?? old('model')); ?>" class="form-control <?php $__errorArgs = ['model'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter model of the vehicle')); ?>" autocomplete>
    <?php $__errorArgs = ['model'];
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
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="colour"><?php echo e(__('Colour')); ?></label>
    <input type="text" name="colour" id="colour" value="<?php echo e($vehicle->colour ?? old('colour')); ?>" class="form-control" placeholder="<?php echo e(__('Enter colour of the vehicle')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="vin_no"><?php echo e(__('Vin#')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="vin_no" id="vin_no" value="<?php echo e($vehicle->vin_no ?? old('vin_no')); ?>" class="form-control <?php $__errorArgs = ['vin_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="<?php echo e(__('Enter vin#')); ?>">
    <?php $__errorArgs = ['vin_no'];
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
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="transmission"><?php echo e(__('Transmission')); ?> <span class="text-danger">*</span></label>
    <select name="transmission" id="transmission" class="form-select <?php $__errorArgs = ['transmission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        <option value="A" <?php if(isset($vehicle->transmission)): ?> <?php if($vehicle->transmission == 'A'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Automatic')); ?></option>
        <option value="M" <?php if(isset($vehicle->transmission)): ?> <?php if($vehicle->transmission == 'M'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Manual')); ?></option>
    </select>
    <?php $__errorArgs = ['transmission'];
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
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="year"><?php echo e(__('Year')); ?> <span class="text-danger">*</span></label>
    <select name="year" id="year" class="form-select <?php $__errorArgs = ['year'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
        <?php    
            $last= date('Y')-50;
            $now = date('Y');
        ?>
        <?php for($i = $now; $i >= $last; $i--): ?>
            <option value="<?php echo e($i); ?>" <?php if(isset($vehicle->year)): ?> <?php if($vehicle->year == $i): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($i); ?></option>
        <?php endfor; ?>
    </select>
    <?php $__errorArgs = ['year'];
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
</div><?php /**PATH /home3/rmsauto5/public_html/IMS/resources/views/vehicles/formgroup.blade.php ENDPATH**/ ?>