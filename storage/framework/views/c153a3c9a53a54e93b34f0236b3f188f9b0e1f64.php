<!-- Form group -->
<div class="row justify-content-between mb-md-10">
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12">
        <label class="form-label" for="invoiceyear"><?php echo e(__('Year')); ?> <span class="text-danger">*</span></label>
        <select name="invoiceyear" id="invoiceyear" class="form-select">
            <?php    
                $last= date('Y')-30;
                $now = date('Y');
            ?>
            <?php for($i = $now; $i >= $last; $i--): ?>
                <option value="<?php echo e($i); ?>" <?php if(isset($vehicle->year)): ?> <?php if($vehicle->year == $i): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="col-xxl-3 col-lg-6 col-md-6 col-12 mt-4 mt-md-0">
        <div class="row align-items-center mb-2">
            <div class="col-md-5">
                <label class="form-label" for="invoice_number"><?php echo e(__('Invoice#')); ?> <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group has-validation">
                    <span id="invoice_year" name="invoice_year" class="input-group-text" id="inputGroupPrepend" style="border-bottom-right-radius:0px;border-top-right-radius:0px;">Inv/RMS/2023/</span>
                    <input type="text" name="invoice_number"  aria-describedby="inputGroupPrepend" value="<?php echo e(old('invoice_number') ?? $invoice_number); ?>" id="invoice_number" class="form-control" placeholder="<?php echo e(__('Enter invoice#')); ?>">
                </div>
            </div>
        </div>
        <div class="row align-items-center mb-2">
            <div class="col-md-5">
                <label class="form-label" for="invoice_date"><?php echo e(__('Invoice Date')); ?> <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
                    <input id="invoice_date" name="invoice_date" class="form-control flatpickr flatpickr-input" placeholder="" type="text"  placeholder="<?php echo e(__('Enter imvoice date')); ?>" aria-describedby="date">
                    <span class="input-group-text text-muted" id="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-5">
                <label class="form-label" for="invoice_duedate"><?php echo e(__('Due Date')); ?> <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
                    <input id="invoice_duedate" name="invoice_duedate" class="form-control flatpickr flatpickr-input" placeholder="" type="text" readonly="readonly"  placeholder="<?php echo e(__('Enter imvoice due date')); ?>" aria-describedby="date">
                    <span class="input-group-text text-muted" id="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-md-10">
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="customer_name"><?php echo e(__('Name')); ?> <span class="text-danger">*</span></label>
        <input type="text" name="customer_name" id="customer_name" class="form-control" value="<?php echo e($vehicle->customer->name ?? old('customer_name')); ?>" placeholder="<?php echo e(__('Enter customer name')); ?>" <?php echo e(isset($vehicle->customer->name) ? "disabled" : ''); ?>>
        <input type="hidden" id="customer_id" name="customer_id" value="<?php echo e($vehicle->customer->id ?? '1'); ?>" readonly>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="phoneno"><?php echo e(__('Phone#')); ?> <span class="text-danger">*</span></label>
        <input type="text" name="phoneno" id="phoneno" class="form-control" value="<?php echo e($vehicle->customer->phoneno ?? old('phoneno')); ?>" placeholder="<?php echo e(__('Enter customer phone#')); ?>">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="rego"><?php echo e(__('Rego#')); ?> <span class="text-danger">*</span></label>
        <input type="text" name="rego" id="rego" class="form-control" value="<?php echo e($vehicle->rego ?? old('rego')); ?>" maxlength="10" placeholder="<?php echo e(__('Enter rego#')); ?>">
        <input type="hidden" id="vehicle_id" name="vehicle_id" value="<?php echo e($vehicle->customer->id ?? '1'); ?>" readonly>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="make"><?php echo e(__('Make')); ?></label>
        <input type="text" name="make" value="<?php echo e($vehicle->make ?? old('make')); ?>" id="make" class="form-control" placeholder="<?php echo e(__('Enter make of the vehicle')); ?>" autocomplete>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="model"><?php echo e(__('Model')); ?></label>
        <input type="text" name="model" id="model" value="<?php echo e($vehicle->model ?? old('model')); ?>" class="form-control" placeholder="<?php echo e(__('Enter model of the vehicle')); ?>" autocomplete>
    </div>
    <div class="mb-3 col-md-4 col-4">
        <label class="form-label" for="transmission"><?php echo e(__('Transmission')); ?> <span class="text-danger">*</span></label>
        <select name="transmission" id="transmission" class="form-select">
            <option value="A" <?php if(isset($vehicle->transmission)): ?> <?php if($vehicle->transmission == 'A'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Automatic')); ?></option>
            <option value="M" <?php if(isset($vehicle->transmission)): ?> <?php if($vehicle->transmission == 'M'): ?> selected <?php endif; ?> <?php endif; ?>><?php echo e(__('Manual')); ?></option>
        </select>
    </div>
    <div class="mb-3 col-md-4 col-4">
        <label class="form-label" for="vin_no"><?php echo e(__('Vin#')); ?></label>
        <input type="text" name="vin_no" id="vin_no" value="<?php echo e($vehicle->vin_no ?? old('vin_no')); ?>" class="form-control" placeholder="<?php echo e(__('Enter vin#')); ?>">
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
    </div>
    <div class="mb-3 col-md-4 col-4">
        <label class="form-label" for="odometer"><?php echo e(__('Odometer')); ?></label>
        <input type="number" name="odometer" id="odometer" value="<?php echo e($vehicle->vin_no ?? old('odometer')); ?>" class="form-control" placeholder="<?php echo e(__('Enter odometer kms')); ?>">
    </div>
    <div class="mb-3 col-md-4 col-4">
        <label class="form-label" for="next_service_km"><?php echo e(__('Next Service Kms')); ?></label>
        <input type="number" name="next_service_km" id="next_service_km" value="<?php echo e($vehicle->next_service_km ?? old('next_service_km')); ?>" class="form-control" placeholder="<?php echo e(__('Enter next service kms')); ?>">
    </div>
    <div class="mb-3 col-md-4 col-4">
        <label class="form-label" for="next_service_date"><?php echo e(__('Next Service Date')); ?></label>
        <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
            <input type="text" name="next_service_date" id="next_service_date" value="<?php echo e($vehicle->next_service_date ?? old('next_service_date')); ?>" class="form-control flatpickr flatpickr-input" readonly placeholder="<?php echo e(__('Enter odometer date')); ?>" aria-describedby="date">
            <span class="input-group-text text-muted" id="date">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="invoice_table" class="table text-nowrap table-bordered">
                <thead class="table-light ">
                    <tr>
                        <th scope="col" style="">Job Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price ($)</th>
                        <th scope="col">Amount ($)</th>
                        <th scope="col" style="text-align:right;">
                            <button type="button" class="btn btn-primary btn-sm addmore">+</button>
                        </th>
                    </tr>
                </thead>
                <tbody id="invoice_body">
                    <tr id="TRow1">
                        <td class="w-75">
                            <input type="text" name="job[]" class="form-control mb-2 input job" placeholder="<?php echo e(__('Job name')); ?>">
                            <!-- <textarea rows="2" name="description[]" class="form-control input mb-2 description" placeholder="<?php echo e(__('Job description')); ?>"></textarea> -->
                            <!-- <div><button type="button" class="btn btn-primary btn-sm adddescription">+</button></div> -->
                        </td>
                        <td>
                            <input type="number" step="1" min="1" value="1" name="quantity[]" class="quantity form-control input">
                        </td>
                        <td class="w-10">
                            <input type="number" class="form-control mb-2 input price" name="price[]">
                        </td>
                        <td class="w-15">
                            <input type="number" class="form-control mb-2 input amount" name="total[]" readonly>
                        </td>
                        <td class="w-15">
                            <button type="button" class="btn btn-danger btn-sm delete">-</button>
                        </td>
                    </tr>                   
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="border-bottom-0"></td>
                        <td><span class="text-dark">Sub Total</span></td>
                        <td colspan="2"><span class="text-dark">$0.00</span></td>
                    </tr> 
                    <tr>
                        <td colspan="2" class="border-bottom-0"></td>
                        <td><span class="text-dark">Net Amount</span></td>
                        <td colspan="2"><span class="text-dark">$0.00</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom-0"></td>
                        <td><span class="text-dark">Tax*</span></td>
                        <td colspan="2"><span class="text-dark">$0.00</span></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom-0"></td>
                        <td><span class="text-dark fw-bold">Total paid</span></td>
                        <td colspan="2"><span class="text-dark fw-bold">$0.00</span></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xxl-3 col-lg-6 col-md-6 col-12 mb-3">
        <label class="form-label" for="remarks"><?php echo e(__('Remarks')); ?> <span class="text-danger">*</span></label>
        <textarea name="remarks" id="remarks" class="form-control" rows="3" placeholder="<?php echo e(__('Enter remarks')); ?>"></textarea>
    </div>
    <div class="col-xxl-3 col-lg-6 col-md-6 col-12 mb-3">
        <label class="form-label" for="jobdetails"><?php echo e(__('Job details')); ?> <span class="text-danger">*</span></label>
        <textarea name="jobdetails" id="jobdetails" class="form-control" rows="3"  placeholder="<?php echo e(__('Enter job details')); ?>"></textarea>
    </div>
    <div class="col-xxl-3 col-lg-3 col-md-3 col-12 mb-3">
        <div class="row">
            <div class="col-xxl-3 col-lg-12 col-md-12 col-12 mb-3">
                <label class="form-label" for="tire_fl"><?php echo e(__('Tyre front left')); ?></label>
                <input type="text" name="tire_fl" id="tire_fl" class="form-control" value="<?php echo e($vehicle->customer->name ?? old('customer_name')); ?>" placeholder="<?php echo e(__('Enter front left tye mm')); ?>">
            </div>
            <div class="col-xxl-3 col-lg-12 col-md-12 col-12 mb-3">
                <label class="form-label" for="tire_fr"><?php echo e(__('Tyre front right')); ?></label>
                <input type="text" name="tire_fr" id="tire_fr" class="form-control" value="<?php echo e($vehicle->customer->phoneno ?? old('customer_phoneno')); ?>" placeholder="<?php echo e(__('Enter front right tye mm')); ?>">
            </div>
            <div class="col-xxl-3 col-lg-12 col-md-12 col-12 mb-3">
                <label class="form-label" for="tire_rl"><?php echo e(__('Tyre rear left')); ?></label>
                <input type="text" name="tire_rl" id="tire_rl" class="form-control" value="<?php echo e($vehicle->rego ?? old('rego')); ?>" placeholder="<?php echo e(__('Enter rear left tye mm')); ?>">
            </div>
            <div class="col-xxl-3 col-lg-12 col-md-12 col-12 mb-3">
                <label class="form-label" for="tire_rr"><?php echo e(__('Tyre rear right')); ?></label>
                <input type="text" name="tire_rr" value="<?php echo e($vehicle->make ?? old('make')); ?>" id="tire_rr" class="form-control" placeholder="<?php echo e(__('Enter rear right tye mm')); ?>">
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-lg-3 col-md-3 col-12 mb-3">
        <div class="row">
            <div class="col-xxl-3 col-lg-12 col-md-12 col-12 mb-3">
                <label class="form-label" for="frontbrakepads"><?php echo e(__('Front brake pads')); ?> <span class="text-danger">*</span></label>
                <input type="text" name="frontbrakepads" id="frontbrakepads" class="form-control" value="<?php echo e($vehicle->rego ?? old('rego')); ?>" placeholder="<?php echo e(__('Enter front brake pads mm')); ?>">
            </div>
            <div class="col-xxl-3 col-lg-12 col-md-12 col-12 mb-3">
                <label class="form-label" for="rearbrakepads"><?php echo e(__('Rear brake pads')); ?></label>
                <input type="text" name="rearbrakepads" value="<?php echo e($vehicle->make ?? old('make')); ?>" id="rearbrakepads" class="form-control" placeholder="<?php echo e(__('Enter rear brake pads mm')); ?>">
            </div>
        </div>
    </div>
</div>

<?php /**PATH D:\wamp\www\RMS_IMS\resources\views/invoices/formgroup.blade.php ENDPATH**/ ?>