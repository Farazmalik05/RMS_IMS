<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="images/favicon.png" rel="icon" />
        <title>INV/RMS/<?php echo e(date('Y', strtotime($invoice->quote_date))); ?>/<?php echo e(sprintf('%02d', $invoice->quote_number)); ?> </title>
        <meta name="author" content="harnishdesign.net">

        <!-- Web Fonts
        ======================= -->
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

        <!-- Stylesheet
        ======================= -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/stylesheet.css')); ?>"/>
    </head>
    <body>
        <!-- Container -->
        <div class="container-fluid">
            <!-- Header -->
            <header>
                <div class="row align-items-center gy-3">
                    <div class="col-sm-7 text-center text-sm-start">
                        <img id="logo" src="<?php echo e(asset('images/logo/logo.jpg')); ?>" style="height:70px;" title="RMS Auto Repairs" alt="RMS Auto Repairs" />
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
                        <p><?php echo e($invoice->vehicle->customer->name); ?></p>
                    </div>
                    <div class="col-sm-3">
                        <strong><?php echo e(__('Phone #')); ?>:</strong>
                        <p><?php echo e($invoice->vehicle->customer->phoneno); ?></p>
                    </div>
                    <div class="col-sm-3">
                        <strong><?php echo e(__('Registration #')); ?>:</strong>
                        <p><?php echo e($invoice->vehicle->rego); ?></p>
                    </div>
                    <div class="col-sm-3">
                        <strong><?php echo e(__('Make & Model')); ?>:</strong>
                        <p><?php echo e($invoice->vehicle->make); ?> <?php echo e($invoice->vehicle->model); ?></p>
                    </div>
                </div>
                <hr>
                <div class="row gy-3">
                    <div class="col-sm-3">
                        <span class="text-black-50 text-uppercase"><?php echo e(__('Vin #')); ?>:</span><br>
                        <span class="fw-500 text-3"><?php echo e($invoice->vehicle->vin_no); ?></span>
                    </div>
                    <div class="col-sm-3">
                        <span class="text-black-50 text-uppercase"><?php echo e(__('Transmission')); ?>:</span><br>
                        <?php if($invoice->vehicle->transmission == 'A'): ?>
                        <span class="fw-500 text-3">Automatic</span>
                        <?php else: ?>
                            <span class="fw-500 text-3">Manual</span>
                        <?php endif; ?>
                    </div>
                    <div class="col-sm-3">
                        <span class="text-black-50 text-uppercase"><?php echo e(__('Year')); ?>:</span><br>
                        <span class="fw-500 text-3"><?php echo e($invoice->vehicle->year); ?></span>
                    </div>
                    <div class="col-sm-3">
                        <span class="text-black-50 text-uppercase"><?php echo e(__('Odometer')); ?>:</span><br>
                        <span class="fw-500 text-3"><?php echo e($invoice->odometer); ?></span>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table border mb-0">
                        <thead>
                            <tr class="bg-light">
                                <td class="col-8 fw-600"><?php echo e(__('Description')); ?></td>
                                <td class="col-1 text-end fw-600"><?php echo e(__('Qty')); ?></td>
                                <td class="col-1 text-end fw-600"><?php echo e(__('Rate')); ?></td>
                                <td class="col-1 text-end fw-600"><?php echo e(__('Rate')); ?></td>
                                <td class="col-1 text-end fw-600"><?php echo e(__('Amt')); ?></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $sub_total = 0;
                            ?>
                            <?php $__currentLoopData = $invoice->jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="col-8">
                                    <?php echo e($job->name); ?><br>
                                    <?php if($job['has_description']): ?>
                                        <?php $__currentLoopData = $job->descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $desc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="text-1" style="padding-left: 25px;"><?php echo e($desc['description']. ' - $'.$desc['description_rate']); ?></span><br>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </td>
                                <td class="col-1 text-end"><?php echo e($job->pivot->quantity); ?></td>
                                <td class="col-1 text-end"><?php echo e($job->pivot->quantity); ?></td>
                                <td class="col-1 text-end">
                                    $<?php echo e(number_format((float)$job->pivot->rate, 2, '.', '')); ?>

                                    <?php
                                        $sub_total += $job->pivot->rate;
                                    ?>
                                </td>
                                <td class="col-1 text-end">
                                    $<?php echo e(number_format((float)$job->pivot->quantity * $job->pivot->rate, 2, '.', '')); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table border border-top-0 mb-0">
                        <tr class="bg-light">
                            <td colspan="2" class="text-end"><strong>Sub Total:</strong></td>
                            <td class="col-sm-3 text-end">
                                $<?php echo e(number_format((float)$sub_total, 2, '.', '')); ?>

                            </td>
                        </tr>
                        <tr class="bg-light">
                            <td colspan="2" class="text-end"><strong>Tax:</strong></td>
                            <td class="col-sm-3 text-end">
                                <?php if($invoice->taxable): ?>
                                    <span class="text-dark" id="tax">10</span>%
                                <?php else: ?>
                                    <span class="text-dark" id="tax">0</span>%
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="bg-light">
                            <td colspan="2" class="text-end border-bottom-0"><strong>Total:</strong></td>
                            <td class="col-sm-3 text-end border-bottom-0">$
                                <?php if($invoice->taxable): ?>
                                    <?php echo e(number_format((float)($sub_total*1.1), 2, '.', '')); ?>

                                <?php else: ?>
                                    <?php echo e(number_format((float)$sub_total, 2, '.', '')); ?>

                                <?php endif; ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <br>
                <div class="row gy-3">
                    <?php if($invoice->remarks != null): ?>
                    <div class="col-sm-6">
                        <strong>Remarks:</strong>
                        <p><?php echo e($invoice->remarks); ?></p>
                    </div>
                    <?php endif; ?>
                    <?php if($invoice->jobdetails != null): ?>
                    <div class="col-sm-6">
                        <strong>Job details:</strong>
                        <p><?php echo e($invoice->jobdetails); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="row gy-3">
                    <div class="col-sm-6">
                        <div class="row">
                            <?php if($invoice->tire_fl != null): ?>
                            <div class="col-sm-12 mb-1">
                                <strong><?php echo e(__('Tyre front left')); ?>:</strong>
                                <span><?php echo e($invoice->tire_fl); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if($invoice->tire_fr != null): ?>
                            <div class="col-sm-12 mb-1">
                                <strong><?php echo e(__('Tyre front right')); ?>:</strong>
                                <span><?php echo e($invoice->tire_fr); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if($invoice->tire_rl != null): ?>
                            <div class="col-sm-12 mb-1">
                                <strong><?php echo e(__('Tyre rear left')); ?>:</strong>
                                <span><?php echo e($invoice->tire_rl); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if($invoice->tire_rr != null): ?>
                            <div class="col-sm-12 mb-1">
                                <strong><?php echo e(__('Tyre rear right')); ?>:</strong>
                                <span><?php echo e($invoice->tire_rr); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <?php if($invoice->frontbrakepads != null): ?>
                            <div class="col-sm-12 mb-1">
                                <strong><?php echo e(__('Front brake pads')); ?>:</strong>
                                <span><?php echo e($invoice->frontbrakepads); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if($invoice->rearbrakepads != null): ?>
                            <div class="col-sm-12 mb-1">
                                <strong><?php echo e(__('Rear brake pads')); ?>:</strong>
                                <span><?php echo e($invoice->rearbrakepads); ?></span>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <br>
                <p class="text-1 text-muted"><strong>Please Note:</strong> **We will not be liable or provide any warranty on parts or repairs if the customer supplied parts or chooses used parts to repair or service their vehicle.</p>
            </main>
            <hr>
            <!-- Footer -->
            <footer class="text-center mt-4">
                <p class="lh-base">
                    <strong>For internet transfers:</strong><br>
                    Bank of Melbourne<br>
                    Account Name: Tuan I Sheriff<br>
                    BSB: 193-879 Account No.: 489 823 343
                </p>
                <hr>
                <!-- Note -->
                <p class="text-1">This is computer generated receipt and does not require physical signature.</p>
                <!-- Button -->
                <div class="btn-group btn-group-sm d-print-none"> 
                    <a href="javascript:window.print()" class="btn btn-light border text-black-50 shadow-none">
                        <i class="fa fa-print"></i> Print & Download
                    </a>
                </div>
            </footer>
        </div>
    </body>
</html><?php /**PATH D:\wamp\www\RMS_IMS\resources\views/invoices/temp-invoice.blade.php ENDPATH**/ ?>