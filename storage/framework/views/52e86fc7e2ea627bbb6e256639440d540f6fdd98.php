<!-- Form group -->
<div class="row justify-content-between mb-md-10">
    <div class="col-xxl-12 col-lg-12 col-md-12 col-12 border-bottom mb-5">
        <div class="form-check form-switch ml-2 mb-5">
            <input type="hidden" name="taxable" value="0" id="taxable">
            <input class="form-check-input" type="checkbox" role="switch" id="taxable" name="taxable" value="1" <?php if($quote->taxable): ?> checked <?php endif; ?>>
            <label class="form-check-label" for="taxable"><?php echo e(__('Taxable')); ?></label>
        </div>
    </div>
    
    <div class="col-xxl-2 col-lg-3 col-md-12 col-12">
        <label class="form-label" for="quoteyear"><?php echo e(__('Year')); ?> <span class="text-danger">*</span></label>
        <select name="quoteyear" id="quoteyear" class="form-select">
            <?php    
                $last= date('Y')-30;
                $now = date('Y');
            ?>
            <?php for($i = $now; $i >= $last; $i--): ?>
                <option value="<?php echo e($i); ?>" <?php if(date("Y", strtotime($quote->quote_date)) == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
        </select>
    </div>

    <div class="col-xxl-6 col-lg-6 col-md-12 col-12 mt-4">
        <div class="row align-items-center mb-2">
            <div class="col-md-5">
                <label class="form-label" for="quote_number"><?php echo e(__('Quote#')); ?> <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group has-validation">
                    <span id="quote_year" name="quote_year" class="input-group-text" id="inputGroupPrepend" style="border-bottom-right-radius:0px;border-top-right-radius:0px;">Quote/RMS/<?php echo e(date('Y', strtotime($quote->quote_date))); ?>/</span>
                    <input type="text" name="quote_number"  aria-describedby="inputGroupPrepend" value="<?php echo e(sprintf('%02d', $quote->quote_number)); ?>" id="quote_number" class="form-control" placeholder="<?php echo e(__('Enter quote#')); ?>">
                </div>
            </div>
        </div>
        <div class="row align-items-center mb-2">
            <div class="col-md-5">
                <label class="form-label" for="quote_date"><?php echo e(__('Quote Date')); ?> <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
                    <input id="quote_date" name="quote_date" class="form-control flatpickr flatpickr-input" placeholder="" type="text" placeholder="<?php echo e(__('Enter imvoice date')); ?>" aria-describedby="date">
                    <span class="input-group-text text-muted" id="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-5">
                <label class="form-label" for="quote_duedate"><?php echo e(__('Due Date')); ?> <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
                    <input id="quote_duedate" name="quote_duedate" class="form-control flatpickr flatpickr-input" placeholder="" type="text" placeholder="<?php echo e(__('Enter imvoice due date')); ?>" aria-describedby="date">
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
            <input type="text" disabled="disabled" name="customer_name" id="customer_name" class="form-control" value="<?php echo e($quote->vehicle->customer->name); ?>" placeholder="<?php echo e(__('Enter customer name')); ?>">
            <input type="hidden" id="customer_id" name="customer_id" value="<?php echo e($quote->vehicle->customer->id); ?>" readonly>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="phoneno"><?php echo e(__('Phone#')); ?> <span class="text-danger">*</span></label>
            <input type="text" name="phoneno" id="phoneno" class="form-control" value="<?php echo e($quote->vehicle->customer->phoneno); ?>" placeholder="<?php echo e(__('Enter customer phone#')); ?>">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="rego"><?php echo e(__('Rego#')); ?> <span class="text-danger">*</span></label>
            <input type="text" name="rego" id="rego" class="form-control" value="<?php echo e($quote->vehicle->rego); ?>" maxlength="10" placeholder="<?php echo e(__('Enter rego#')); ?>">
            <input type="hidden" id="vehicle_id" name="vehicle_id" value="<?php echo e($quote->vehicle->id); ?>" readonly>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="make"><?php echo e(__('Make')); ?> <span class="text-danger">*</span></label>
            <input type="text" name="make" disabled="disabled" value="<?php echo e($quote->vehicle->make); ?>" id="make" class="form-control" placeholder="<?php echo e(__('Enter make of the vehicle')); ?>" autocomplete>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="model"><?php echo e(__('Model')); ?> <span class="text-danger">*</span></label>
        <input type="text" name="model" disabled="disabled" id="model" value="<?php echo e($quote->vehicle->model); ?>" class="form-control" placeholder="<?php echo e(__('Enter model of the vehicle')); ?>" autocomplete>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="transmission"><?php echo e(__('Transmission')); ?> <span class="text-danger">*</span></label>
        <select name="transmission" disabled="disabled" id="transmission" class="form-select">
            <option value="A" <?php if($quote->vehicle->transmission == 'A'): ?> selected <?php endif; ?>><?php echo e(__('Automatic')); ?></option>
            <option value="M" <?php if($quote->vehicle->transmission == 'M'): ?> selected <?php endif; ?>><?php echo e(__('Manual')); ?></option>
        </select>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="vin_no"><?php echo e(__('Vin#')); ?> <span class="text-danger">*</span></label>
            <input type="text" name="vin_no" disabled="disabled" id="vin_no" value="<?php echo e($quote->vehicle->vin_no); ?>" class="form-control" placeholder="<?php echo e(__('Enter vin#')); ?>">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="year"><?php echo e(__('Year')); ?> <span class="text-danger">*</span></label>
        <select name="year" id="year" disabled="disabled" class="form-select">
            <?php    
                $last= date('Y')-30;
                $now = date('Y');
            ?>
            <?php for($i = $now; $i >= $last; $i--): ?>
                <option value="<?php echo e($i); ?>" <?php if($quote->vehicle->year == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
            <?php endfor; ?>
        </select>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="odometer"><?php echo e(__('Odometer')); ?> <span class="text-danger">*</span></label>
        <input type="number" name="odometer" id="odometer" value="<?php echo e($quote->odometer); ?>" class="form-control" placeholder="<?php echo e(__('Enter odometer kms')); ?>">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="nextservicekms"><?php echo e(__('Next Service Kms')); ?></label>
        <input type="number" name="nextservicekms" id="nextservicekms" value="<?php echo e($quote->nextservicekms); ?>" class="form-control" placeholder="<?php echo e(__('Enter next service kms')); ?>">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="nextservicedate"><?php echo e(__('Next Service Date')); ?></label>
        <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
            <input type="text" name="nextservicedate" id="nextservicedate" value="<?php echo e($quote->nextservicedate); ?>" class="form-control flatpickr flatpickr-input" readonly placeholder="<?php echo e(__('Enter odometer date')); ?>" aria-describedby="date">
            <span class="input-group-text text-muted" id="date">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="quote_table" class="table text-nowrap table-bordered">
                <thead class="table-light ">
                    <tr>
                        <th scope="col" style="width:65%;">Job Description</th>
                        <th scope="col" style="text-align:center;">Quantity</th>
                        <th scope="col" style="text-align:center;">Unit Price ($)</th>
                        <th scope="col" style="text-align:center;">Amount ($)</th>
                        <th scope="col" style="text-align:right;">
                            <button type="button" class="btn btn-primary btn-sm addmore">+</button>
                        </th>
                    </tr>
                </thead>
                <tbody id="quote_body">
                    <?php
                        $total = 0;
                    ?>
                    <?php $__currentLoopData = $quote->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr id="TRow1">
                        <td>
                            <input type="text" name="job[]" class="form-control mb-2 input job" value="<?php echo e($job->name); ?>">
                            <input type="hidden" name="job_id[]" class="job_id input" value="<?php echo e($job->id); ?>">
                            <?php if($job['has_description']): ?>
                                <?php 
                                    $description = '';
                                ?>
                                <?php $__currentLoopData = $job->descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php $description .= $desc['description'].' - $'.$desc['description_rate']."\n"; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                    
                                <textarea rows="10" name="description[]" class="form-control input mb-2 description"><?php echo e($description); ?></textarea>
                            <?php endif; ?>
                        </td>
                        <td>
                            <input style="width:90px;" type="text" step="1" min="1" name="quantity[]" class="quantity form-control input" value="<?php echo e($job->pivot->quantity); ?>">
                        </td>
                        <td>
                            <input type="text" style="width:100px;" class="form-control mb-2 input price" name="price[]" value="<?php echo e(number_format((float)$job->pivot->rate, 2, '.', '')); ?>">
                            <?php
                                $total += ($job->pivot->quantity * $job->pivot->rate);
                            ?>
                        </td>
                        <td>
                            <input type="text" class="form-control mb-2 input amount" name="total[]" readonly value="<?php echo e(number_format((float)$job->pivot->quantity * $job->pivot->rate, 2, '.', '')); ?>">
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm delete">-</button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>              
                </tbody>
                <tfoot>
                    <tr>                        
                        <td colspan="3" class="border-bottom-0" style="text-align:right;">
                            <strong>
                                <?php if($quote->taxable): ?>
                                    Total (incl. 10% Tax)
                                <?php else: ?>
                                    Total (excl. 10% Tax)
                                <?php endif; ?>
                            </strong>
                        </td>
                        <td colspan="2" class="text-left">
                            <strong>$</strong><strong id="total"><?php echo e(number_format((float)$total, 2, '.', '')); ?></strong>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border-bottom-0" style="text-align:right;">
                            <strong>Amount Due ($):</strong>
                        </td>
                        <td colspan="2" class="text-left">
                            <input class="form-control input" value="<?php echo e(number_format((float)$quote->amtdue, 2, '.', '')); ?>" name="amtdue" id="amtdue">
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <label class="form-label" for="remarks"><?php echo e(__('Concerns/Recommendation')); ?></label>
        <textarea name="remarks" id="remarks" class="form-control" rows="3" placeholder="<?php echo e(__('Enter concerns/recommendation')); ?>"><?php echo e($quote->remarks); ?></textarea>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <label class="form-label" for="jobdetails"><?php echo e(__('Job details')); ?></label>
        <textarea name="jobdetails" id="jobdetails" class="form-control" rows="3"  placeholder="<?php echo e(__('Enter job details')); ?>"><?php echo e($quote->jobdetails); ?></textarea>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <div class="row">
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_fl"><?php echo e(__('Tyre F/L (mm)')); ?></label>
                <input type="text" name="tire_fl" id="tire_fl" class="form-control" value="<?php echo e($quote->tire_fl); ?>" placeholder="<?php echo e(__('Enter front left tye mm')); ?>">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_fr"><?php echo e(__('Tyre F/R (mm)')); ?></label>
                <input type="text" name="tire_fr" id="tire_fr" class="form-control" value="<?php echo e($quote->tire_fr); ?>" placeholder="<?php echo e(__('Enter front right tye mm')); ?>">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_rl"><?php echo e(__('Tyre R/L (mm)')); ?></label>
                <input type="text" name="tire_rl" id="tire_rl" class="form-control" value="<?php echo e($quote->tire_rl); ?>" placeholder="<?php echo e(__('Enter rear left tye mm')); ?>">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_rr"><?php echo e(__('Tyre R/R (mm)')); ?></label>
                <input type="text" name="tire_rr" value="<?php echo e($quote->tire_rr); ?>" id="tire_rr" class="form-control" placeholder="<?php echo e(__('Enter rear right tye mm')); ?>">
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <div class="row">
            <div class="col-6 mb-3">
                <label class="form-label" for="frontbrakepads"><?php echo e(__('Front brake pads (mm)')); ?></label>
                <input type="text" name="frontbrakepads" id="frontbrakepads" class="form-control" value="<?php echo e($quote->frontbrakepads); ?>" placeholder="<?php echo e(__('Enter front brake pads mm')); ?>">
            </div>
            <div class="col-6 mb-3">
                <label class="form-label" for="rearbrakepads"><?php echo e(__('Rear brake pads (mm)')); ?></label>
                <input type="text" name="rearbrakepads" value="<?php echo e($quote->rearbrakepads); ?>" id="rearbrakepads" class="form-control" placeholder="<?php echo e(__('Enter rear brake pads mm')); ?>">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="frontbrakepads"><?php echo e(__('Note')); ?></label>
                <textarea name="notes" id="notes" rows="3" class="form-control" placeholder="<?php echo e(__('Enter any note you want to mention')); ?>"><?php echo e($quote->notes); ?></textarea>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/quotes/editformgroup.blade.php ENDPATH**/ ?>