<!-- Form group -->
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="title"><?php echo e(__('Title')); ?> <span class="text-danger">*</span></label>
    <select name="title" id="title" class="form-select">
        <option value="Mr." <?php if(isset($customer->title)): ?> <?php if($customer->title == 'Mr.'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Mr.')); ?></option>
        <option value="Ms." <?php if(isset($customer->title)): ?> <?php if($customer->title == 'Ms.'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Ms.')); ?></option>
        <option value="Mrs." <?php if(isset($customer->title)): ?> <?php if($customer->title == 'Mrs.'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Mrs.')); ?></option>
    </select>
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="name"><?php echo e(__('Name')); ?> <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name" class="form-control" value="<?php echo e($customer->name ?? old('name')); ?>" placeholder="<?php echo e(__('Enter customer name')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="phoneno"><?php echo e(__('Phone#')); ?> <span class="text-danger">*</span></label>
    <input type="tel" name="phoneno" id="phoneno" class="form-control" value="<?php echo e($customer->phoneno ?? old('phoneno')); ?>" maxlength="10" placeholder="<?php echo e(__('Enter customer phone#')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="altphoneno"><?php echo e(__('Alternate Phone#')); ?></label>
    <input type="tel" name="altphoneno" value="<?php echo e($customer->altphoneno ?? old('altphoneno')); ?>" id="altphoneno" class="form-control" placeholder="<?php echo e(__('Enter alternate phone#')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="email"><?php echo e(__('Email')); ?></label>
    <input type="email" name="email" id="email" value="<?php echo e($customer->email ?? old('email')); ?>" class="form-control" placeholder="<?php echo e(__('Enter customer email')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="comments"><?php echo e(__('Company name')); ?></label>
    <input type="text" name="company_name" id="company_name" value="<?php echo e($customer->company_name ?? old('company_name')); ?>" class="form-control" placeholder="<?php echo e(__('Enter company name')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="abn"><?php echo e(__('ABN#')); ?></label>
    <input type="number" name="abn" id="abn" value="<?php echo e($customer->abn ?? old('abn')); ?>" class="form-control" placeholder="<?php echo e(__('Enter ABN#')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="address"><?php echo e(__('Address')); ?></label>
    <input type="text" name="address" id="address" value="<?php echo e($customer->address ?? old('address')); ?>" class="form-control" placeholder="<?php echo e(__('Enter address')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="suburb"><?php echo e(__('Suburb')); ?></label>
    <input type="text" name="suburb" id="suburb" class="form-control" value="<?php echo e($customer->suburb ?? old('suburb')); ?>" placeholder="<?php echo e(__('Enter suburb')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="state"><?php echo e(__('State')); ?></label>
    <select name="state" id="state" class="form-select">
        <option value=""> Select state </option>
        <option value="ACT" <?php if(isset($customer->state)): ?> <?php if($customer->state == 'ACT'): ?> selected <?php endif; ?> <?php endif; ?>> ACT </option>
        <option value="NSW" <?php if(isset($customer->state)): ?> <?php if($customer->state == 'NSW'): ?> selected <?php endif; ?> <?php endif; ?>> NSW </option>
        <option value="NT" <?php if(isset($customer->state)): ?> <?php if($customer->state == 'NT'): ?> selected <?php endif; ?> <?php endif; ?>> NT </option>
        <option value="QLD" <?php if(isset($customer->state)): ?> <?php if($customer->state == 'QLD'): ?> selected <?php endif; ?> <?php endif; ?>> QLD </option>
        <option value="SA" <?php if(isset($customer->state)): ?> <?php if($customer->state == 'SA'): ?> selected <?php endif; ?> <?php endif; ?>> SA </option>
        <option value="TAS" <?php if(isset($customer->state)): ?> <?php if($customer->state == 'TAS'): ?> selected <?php endif; ?> <?php endif; ?>> TAS </option>
        <option value="VIC" <?php if(isset($customer->state)): ?> <?php if($customer->state == 'VIC'): ?> selected <?php endif; ?> <?php else: ?> selected <?php endif; ?>> VIC </option>
        <option value="WA" <?php if(isset($customer->state)): ?> <?php if($customer->state == 'WA'): ?> selected <?php endif; ?> <?php endif; ?>> WA </option>
    </select>
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="postcode"><?php echo e(__('Postcode')); ?></label>
    <input type="number" name="postcode" id="postcode" value="<?php echo e($customer->postcode ?? old('postcode')); ?>" class="form-control" placeholder="<?php echo e(__('Enter postcode')); ?>">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="warn"><?php echo e(__('Warning')); ?></label>
    <input type="text" name="warn" id="warn" value="<?php echo e($customer->warn ?? old('warn')); ?>" class="form-control" placeholder="<?php echo e(__('Enter any warning')); ?>">
</div><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/customers/formgroup.blade.php ENDPATH**/ ?>