<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-size: 10px;
            font-family: 'Poppins' , sans-serif;
            font-style: normal;
            color:#404040;
            line-height: 11px;
        }   
        .inv-container { 
            in:0px auto; 
            ing: 70px;
            width: 100%;
            background-color: #fff; 
            er: none; 
            -border-radius: 0px;
            webkit-border-radius: 0px;
            -o-border-radius: 0px;
            border-radius: 0px;
        }
        table {
            border-collapse: collapse;
        }
        table tr td {
            padding: 3px 0px!important; }
        p {
            margin-bottom: 0px; margin: 0.3rem 0; 
        } 
        .tyre_details tr, .brake_details tr {
            line-height: 12px; 
        }
        .brake_details, .tyre_details {
            width: 120px;
        }
        table, th, td {
            /* border: 1px solid black; */
            vertical-align: top;
        }
        .table tr td {
            padding: 5px !important;
        }
        </style>
    </head>
    <body>
        <table style="width:100%;margin-bottom:5px;">
            <tr>
                <td style="width:25%;">
                    <img id="logo" src="<?php echo e(asset('images/logo/logo_2.JPG')); ?>" style="height:55px;" title="RMS Auto Repairs" alt="RMS Auto Repairs" />
                </td>
                <td style="width:25%;"></td>
                <td style="width:25%;"></td>
                <td style="width:25%;text-align:right;vertical-align:bottom;">
                    <h4 style="font-size:1.5rem;font-weight:400;margin:0px;margin-bottom:2px;padding:0px;">Invoice</h4>
                    <p style="margin:0px;padding:0px;">Invoice # - INV/RMS/<?php echo e(date('Y', strtotime($invoice->quote_date))); ?>/<?php echo e(sprintf('%02d', $invoice->quote_number)); ?></p>
                </td>    
            <tr>
            <tr style="border-bottom:1px solid #ddd;border-top:1px solid #ddd;">
                <td>
                    <strong style="font-weight: bolder;margin-bottom:2px;margin-top:10px;">RMS AUTO REPAIRS</strong>
                    <address style="margin-bottom:0px;font-style: normal;line-height:10px;">
                        31 Nevin Drive<br>
                        Thomastown, Vic - 3074<br>
                        M.: 0410384019 | P.:0394246843
                    </address>
                </td>
                <td></td>
                <td></td>
                <td style="text-align:right;line-height:10px;">
                    <strong style="margin-top:10px;"><?php echo e(__('Invoice Date')); ?>:</strong> <span><?php echo e(date('d-m-Y', strtotime($invoice->quote_date))); ?></span><br>
                    <strong><?php echo e(__('Due Date')); ?>:</strong> <span><?php echo e(date('d-m-Y', strtotime($invoice->quote_duedate))); ?></span>
                </td>
            </tr>
            <tr style="border-bottom:1px solid #ddd;">
                <td>
                    <strong><?php echo e(__('Customer name')); ?>:</strong>
                    <p style="margin-top:0px;margin-bottom:0px;"><?php echo e(ucfirst($invoice->vehicle->customer->name)); ?></p>
                    <?php if(!empty($invoice->vehicle->customer->company_name)): ?>
                        <p style="margin-top:0px;"><?php echo e(ucfirst($invoice->vehicle->customer->company_name)); ?></p>
                    <?php endif; ?>
                </td>
                <td>
                    <strong><?php echo e(__('Phone #')); ?>:</strong>
                    <p style="margin-top:0px;"><?php echo e($invoice->vehicle->customer->phoneno); ?></p>
                </td>
                <td>
                    <strong><?php echo e(__('Registration #')); ?>:</strong>
                    <p style="margin-top:0px;"><?php echo e(strtoupper($invoice->vehicle->rego)); ?></p>
                </td>
                <td>
                    <strong><?php echo e(__('Make & Model')); ?>:</strong>
                    <p style="margin-top:0px;"><?php echo e(ucfirst($invoice->vehicle->make)); ?> <?php echo e(ucfirst($invoice->vehicle->model)); ?></p>
                </td>
            </tr>
            <tr>
                <td>
                    <strong><?php echo e(__('Vin #')); ?>:</strong>
                    <p style="margin-top:0px;"><?php echo e(strtoupper($invoice->vehicle->vin_no)); ?></p>
                </td>
                <td>
                    <strong><?php echo e(__('Transmission')); ?>:</strong>
                    <?php if($invoice->vehicle->transmission == 'A'): ?>
                    <p style="margin-top:0px;">Automatic</p>
                    <?php else: ?>
                    <p style="margin-top:0px;">Manual</p>
                    <?php endif; ?>
                </td>
                <td>
                    <strong><?php echo e(__('Year')); ?>:</strong>
                    <p style="margin-top:0px;"><?php echo e($invoice->vehicle->year); ?></p>

                </td>
                <td>
                    <?php if(!$invoice->odometer == null): ?>
                    <strong><?php echo e(__('Odometer')); ?>:</strong>
                    <p style="margin-top:0px;"><?php echo e($invoice->odometer); ?> km(s)</p>
                    <?php endif; ?>
                </td>
            </tr>
        </table>
        <table class="table" style="margin-bottom:0px;border:1px solid #ddd;color:#404040;width:100%;border-collapse:collapse;">
            <thead style="">
                <tr style="border:1px solid #ddd;">
                    <td style="background-color:#F8F9FA;font-weight:600!important;width:70%;padding:3px;"><?php echo e(__('Description')); ?></td>
                    <td
                        style="background-color:#F8F9FA;font-weight:600!important;width:10%;text-align:right;padding:3px;">
                        <?php echo e(__('Qty')); ?></td>
                    <td
                        style="background-color:#F8F9FA;font-weight:600!important;width:10%;text-align:right;padding:3px;">
                        <?php echo e(__('Rate')); ?></td>
                    <td
                        style="background-color:#F8F9FA;font-weight:600!important;width:10%;text-align:right;padding:3px;">
                        <?php echo e(__('Amt')); ?></td>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                ?>
                <?php $__currentLoopData = $invoice->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td style="padding:3px;vertical-align:top;">
                        <?php echo e(ucfirst($job->name)); ?><br>
                        <?php if($job['has_description']): ?>
                        <table style="width:100%;">
                            <tbody>
                                <?php $__currentLoopData = $job->descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td style="border-style:none;vertical-align:top;">
                                        <label style="padding-left: 5px;"><?php echo e(ucfirst($desc['description'])); ?></label><br>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:right;padding:3px;vertical-align:top;"><?php echo e($job->pivot->quantity); ?></td>
                    <td style="text-align:right;padding:3px;vertical-align:top;">
                        $<?php echo e(number_format((float)$job->pivot->rate, 2, '.', '')); ?>

                        <?php
                        $total += ($job->pivot->quantity * $job->pivot->rate);
                        ?>
                    </td>
                    <td style="text-align:right;padding:3px;vertical-align:top;">
                        $<?php echo e(number_format((float)$job->pivot->quantity * $job->pivot->rate, 2, '.', '')); ?>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            <tfoot>
                <tr style="background-color:#F8F9FA;border-top:1px solid #ddd;">
                    <td colspan="3" style="text-align:right;padding:3px;vertical-align:top;">
                        <?php if($invoice->taxable): ?>
                        <strong>Total (incl. 10% Tax):</strong>
                        <?php else: ?>
                        <strong>Total (excl. 10% Tax):</strong>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:right;width:15%;padding:3px;vertical-align:top;">
                        $<?php echo e(number_format((float)$total, 2, '.', '')); ?>

                    </td>
                </tr>
                <tr style="background-color:#F8F9FA;border-top:1px solid #ddd;">
                    <td colspan="3" style="text-align:right;padding:3px;vertical-align:top;"><strong>Amount Due:</strong>
                    </td>
                    <td style="text-align:right;padding:3px;vertical-align:top;">
                        $<?php echo e(number_format((float)$invoice->amtdue, 2, '.', '')); ?>

                    </td>
                </tr>
            </tfoot>
        </table>
        <table class="table" style="margin-top:5px;border:1px solid #ddd;color:#404040;width:100%;border-collapse:collapse;">
            <tr style="border-bottom:1px solid #ddd;">
                <td style="width:50%;padding:3px;vertical-align:top;">
                    <strong>Tyres (mm):</strong>
                </td>
                <td style="width:50%;padding:3px;vertical-align:top;">
                    <strong>Concerns/Recommendation:</strong>
                </td>
            </tr>
            <tr style="">
                <td style="width:50%;vertical-align:top;">
                    <table class="tyre_details" style="width:100%;">
                        <tr>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                <?php if($invoice->tire_fl != null): ?>
                                <strong><?php echo e(__('F/L')); ?>:</strong>
                                <span><?php echo e($invoice->tire_fl); ?></span>
                                <?php endif; ?>
                            </td>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                <?php if($invoice->tire_fr != null): ?>
                                <strong><?php echo e(__('F/R')); ?>:</strong>
                                <span><?php echo e($invoice->tire_fr); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                <?php if($invoice->tire_rl != null): ?>
                                <strong><?php echo e(__('R/L')); ?>:</strong>
                                <span><?php echo e($invoice->tire_rl); ?></span>
                                <?php endif; ?>
                            </td>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                <?php if($invoice->tire_rr != null): ?>
                                <strong><?php echo e(__('R/R')); ?>:</strong>
                                <span><?php echo e($invoice->tire_rr); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="width:50%;vertical-align:top;padding:3px;">
                    <p><?php if(!is_null($invoice->remarks)): ?> <?php echo e(ucfirst($invoice->remarks)); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?> </p>
                </td>
            </tr>
            <tr style="border-top:1px solid #ddd;border-bottom:1px solid #ddd;">
                <td style="width:50%;padding:3px;vertical-align:top;">
                    <strong>Brakes (mm):</strong>
                </td>
                <td style="width:50%;padding:3px;vertical-align:top;">
                    <strong>Job details:</strong>
                </td>
            </tr>
            <tr>
                <td style="width:50%;">
                    <table class="brake_details" style="width:100%;">
                        <tr>
                            <td style="width:20%;padding:3px;vertical-align:top;">

                                <?php if($invoice->frontbrakepads != null): ?>
                                <strong><?php echo e(__('Front')); ?>:</strong>
                                <span><?php echo e($invoice->frontbrakepads); ?></span>
                                <?php endif; ?>
                            </td>
                            <td style="width:20%;padding:3px;vertical-align:top;">
                                <?php if($invoice->rearbrakepads != null): ?>
                                <strong><?php echo e(__('Rear')); ?>:</strong>
                                <span><?php echo e($invoice->rearbrakepads); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>


                </td>
                <td style="width:50%;vertical-align:top;padding:3px;">
                    <p><?php if(!is_null($invoice->jobdetails)): ?> <?php echo e(ucfirst($invoice->jobdetails)); ?> <?php else: ?> <?php echo e('N/A'); ?> <?php endif; ?>
                    </p>
                </td>
            </tr>
        </table>
        <p style="margin-top:2px;"><strong>Please Note:</strong> **We will not be liable or provide any warranty on
            parts or
            repairs if the customer supplied parts or chooses used parts to repair or service their vehicle.</p>
        <hr>
        <!-- Footer -->
        <footer style="text-align:center;margin-top:0px;">
            <p style="margin-top:0px;">
                <strong>For internet transfers:</strong><br>
                Bank of Melbourne<br>
                Account Name: Tuan I Sheriff<br>
                BSB: 193-879 Account No.: 489 823 343
            </p>
        </footer>
        <hr>
        <!-- Note -->
        <p style="margin-top:0px;text-align:center;">This is computer generated receipt and does not require physical
            signature.</p>
    </body>

</html><?php /**PATH /home3/rmsauto5/public_html/IMS/resources/views/invoices/invoicetemplate.blade.php ENDPATH**/ ?>