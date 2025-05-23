<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="images/favicon.png" rel="icon" />
    <title>INV/RMS/<?php echo e(date('Y', strtotime($invoice->quote_date))); ?>/<?php echo e(sprintf('%02d', $invoice->quote_number)); ?>

    </title>

    <!-- Web Fonts
        ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900'
        type='text/css'>

    <!-- Stylesheet
        ======================= -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/stylesheet.css')); ?>" />
    <style>
        body {
            font-size: 10px;
            line-height: 15px !important;
        }

        .table tr td {
            padding: 5px !important;
        }

        p {
            margin-bottom: 0px;
        }

        hr {
            margin: 0.3rem 0;
        }

        .tyre_details tr {
            line-height: 12px;
        }

        .brake_details tr {
            line-height: 12px;
        }

        .brake_details,
        .tyre_details {
            width: 120px;
        }
    </style>
</head>

<body>
    <!-- Container -->
    <div class="container-fluid invoice-container">
        <!-- Header -->
        <header>
            <div class="row align-items-center gy-3">
                <div class="col-sm-7 text-center text-sm-start">
                    <img id="logo" src="<?php echo e(asset('images/logo/logo_2.JPG')); ?>" style="height:55px;"
                        title="RMS Auto Repairs" alt="RMS Auto Repairs" />
                </div>
                <div class="col-sm-5 text-center text-sm-end">
                    <h4 class="mb-0">Invoice</h4>
                    <p class="mb-0">Invoice # - INV/RMS/<?php echo e(date('Y', strtotime($invoice->quote_date))); ?>/<?php echo e(sprintf('%02d', $invoice->quote_number)); ?></p>
                </div>
            </div>
            <hr>
        </header>

        <!-- Main Content -->
        <main>
            <div class="row">
                <div class="col-sm-6">
                    <strong>RMS AUTO REPAIRS</strong>
                    <address class="mb-0">
                        31 Nevin Drive<br>
                        Thomastown, Vic - 3074<br>
                        M.: 0410384019 | P.:0394246843
                    </address>
                </div>
                <div class="col-sm-6 mb-3 text-sm-end">
                    <strong><?php echo e(__('Invoice Date')); ?>:</strong> <span><?php echo e(date('d-m-Y', strtotime($invoice->quote_date))); ?></span><br>
                    <strong><?php echo e(__('Due Date')); ?>:</strong> <span><?php echo e(date('d-m-Y', strtotime($invoice->quote_duedate))); ?></span>
                </div>
            </div>
            <hr>
            <div class="row gy-3">
                <div class="col-sm-3">
                    <strong><?php echo e(__('Customer name')); ?>:</strong>
                    <p><?php echo e(ucfirst($invoice->vehicle->customer->name)); ?></p>
                </div>
                <div class="col-sm-3">
                    <strong><?php echo e(__('Phone #')); ?>:</strong>
                    <p><?php echo e($invoice->vehicle->customer->phoneno); ?></p>
                </div>
                <div class="col-sm-3">
                    <strong><?php echo e(__('Registration #')); ?>:</strong>
                    <p><?php echo e(strtoupper($invoice->vehicle->rego)); ?></p>
                </div>
                <div class="col-sm-3">
                    <strong><?php echo e(__('Make & Model')); ?>:</strong>
                    <p><?php echo e(ucfirst($invoice->vehicle->make)); ?> <?php echo e(ucfirst($invoice->vehicle->model)); ?></p>
                </div>
            </div>
            <hr>
            <div class="row gy-3">
                <div class="col-sm-3">
                    <strong><?php echo e(__('Vin #')); ?>:</strong>
                    <p><?php echo e(strtoupper($invoice->vehicle->vin_no)); ?></p>
                </div>
                <div class="col-sm-3">
                    <strong><?php echo e(__('Transmission')); ?>:</strong>
                    <?php if($invoice->vehicle->transmission == 'A'): ?>
                    <p>Automatic</p>
                    <?php else: ?>
                    <p>Manual</p>
                    <?php endif; ?>
                </div>
                <div class="col-sm-3">
                    <strong><?php echo e(__('Year')); ?>:</strong>
                    <p><?php echo e($invoice->vehicle->year); ?></p>
                </div>
                <div class="col-sm-3">
                    <?php if(!$invoice->odometer == null): ?>
                    <strong><?php echo e(__('Odometer')); ?>:</strong>
                    <p><?php echo e($invoice->odometer); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <!-- <br> -->
            <div class="table-responsive mt-1">
                <table class="table border mb-0">
                    <thead>
                        <tr class="bg-light">
                            <td class="col-8 fw-600"><?php echo e(__('Description')); ?></td>
                            <td class="col-1 text-end fw-600"><?php echo e(__('Qty')); ?></td>
                            <td class="col-1 text-end fw-600"><?php echo e(__('Rate')); ?></td>
                            <td class="col-1 text-end fw-600"><?php echo e(__('Amt')); ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        ?>
                        <?php $__currentLoopData = $invoice->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="col-9 align-top">
                                <?php echo e(ucfirst($job->name)); ?><br>
                                <?php if($job['has_description']): ?>
                                <table class="table mb-0">
                                    <tbody>
                                        <?php $__currentLoopData = $job->descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="align-top" style="border-style:none;">
                                                <label style="padding-left: 5px;"><?php echo e(ucfirst($desc['description'])); ?></label><br>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </td>
                            <td class="col-1 text-end align-top"><?php echo e($job->pivot->quantity); ?></td>
                            <td class="col-1 text-end align-top">
                                $<?php echo e(number_format((float)$job->pivot->rate, 2, '.', '')); ?>

                                <?php
                                $total += ($job->pivot->quantity * $job->pivot->rate);
                                ?>
                            </td>
                            <td class="col-1 text-end align-top">
                                $<?php echo e(number_format((float)$job->pivot->quantity * $job->pivot->rate, 2, '.', '')); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-light">
                            <td colspan="3" class="text-end align-top">
                                <strong>
                                    <?php if($invoice->taxable): ?>
                                    <?php echo e(__('Total (incl. 10% Tax)')); ?>

                                    <?php else: ?>
                                    <?php echo e(__('Total (excl. 10% Tax)')); ?>

                                    <?php endif; ?>
                                    :</strong>
                            </td>
                            <td class="col-sm-3 text-end align-top">
                                <strong>$<?php echo e(number_format((float)$total, 2, '.', '')); ?></strong>
                            </td>
                        </tr>
                        <tr class="bg-light">
                            <td colspan="3" class="text-end border-bottom-0 align-top"><strong>Amount Due:</strong></td>
                            <td class="col-sm-3 text-end border-bottom-0 align-top">
                                <strong>$<?php echo e(number_format((float)$invoice->amtdue, 2, '.', '')); ?></strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="table-responsive mt-1">
                <table class="table border mb-0">
                    <tr>
                        <td class="align-top" colspan="3">
                            <strong><?php echo e(__('Job details')); ?>:</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-top" colspan="3">
                            <p><?php if(!is_null($invoice->jobdetails)): ?> <?php echo e(ucfirst($invoice->jobdetails)); ?> <?php else: ?> <?php echo e('N/A'); ?>

                                <?php endif; ?></p>
                        </td>
                    </tr>
                    <?php if($invoice->tire_fl): ?>
                    <tr>
                        <td class="align-top" style="width:25%;">
                            <strong>Tyres (mm):</strong>
                        </td>
                        <td class="align-top" style="width:25%;">
                            <strong>Brakes (mm):</strong>
                        </td>
                        <td class="align-top" style="width:50%;">
                            <strong><?php echo e(__('Concerns/Recommendation')); ?>:</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="tyre_details table table-borderless mb-0">
                                <tr>
                                    <td>
                                        <?php if($invoice->tire_fl != null): ?>
                                        <strong><?php echo e(__('F/L')); ?>:</strong>
                                        <span><?php echo e($invoice->tire_fl); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($invoice->tire_fr != null): ?>
                                        <strong><?php echo e(__('F/R')); ?>:</strong>
                                        <span><?php echo e($invoice->tire_fr); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <?php if($invoice->tire_rl != null): ?>
                                        <strong><?php echo e(__('R/L')); ?>:</strong>
                                        <span><?php echo e($invoice->tire_rl); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if($invoice->tire_rr != null): ?>
                                        <strong><?php echo e(__('R/R')); ?>:</strong>
                                        <span><?php echo e($invoice->tire_rr); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="align-top">
                            <table class="brake_details table table-borderless mb-0">
                                <tr>
                                    <td class="align-top" style="width:20%;">
                                        <?php if($invoice->frontbrakepads != null): ?>
                                        <strong><?php echo e(__('Front')); ?>:</strong>
                                        <span><?php echo e($invoice->frontbrakepads); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="align-top" style="width:20%;">
                                        <?php if($invoice->rearbrakepads != null): ?>
                                        <strong><?php echo e(__('Rear')); ?>:</strong>
                                        <span><?php echo e($invoice->rearbrakepads); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="align-top">
                            <p><?php if(!is_null($invoice->remarks)): ?> <?php echo e(ucfirst($invoice->remarks)); ?> <?php else: ?> <?php echo e('N/A'); ?>

                                <?php endif; ?></p>
                        </td>
                    </tr>
                    <?php else: ?>
                    <tr>
                        <td class="align-top">
                            <strong><?php echo e(__('Concerns/Recommendation')); ?>:</strong>
                        </td>
                    </tr>
                    <tr>
                        <td class="align-top">
                            <p><?php if(!is_null($invoice->remarks)): ?> <?php echo e(ucfirst($invoice->remarks)); ?> <?php else: ?> <?php echo e('N/A'); ?>

                                <?php endif; ?></p>
                        </td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
            <!-- <br> -->
            <p class="text-muted mt-1"><strong>Please Note:</strong> **We will not be liable or provide any warranty on
                parts or repairs if the customer supplied parts or chooses used parts to repair or service their
                vehicle.</p>
        </main>
        <hr>
        <!-- Footer -->
        <footer class="text-center">
            <p class="lh-base">
                <strong>For internet transfers:</strong><br>
                Bank of Melbourne<br>
                Account Name: Tuan I Sheriff<br>
                BSB: 193-879 Account No.: 489 823 343
            </p>
            <hr>
            <!-- Note -->
            <p style="font-size:10px;">This is computer generated receipt and does not require physical signature.</p>
            <!-- Button -->
            <div class="btn-group btn-group-sm d-print-none mt-2">
                <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none">
                    <i class="fa fa-print"></i> Print & Download
                </a>
            </div>
        </footer>
    </div>
</body>

</html><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/invoices/generate-invoice.blade.php ENDPATH**/ ?>