

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .table th {
            line-height: 28px;
        }
        #quote_table > tfoot > tr > td {
            border: none!important;
        }
        .vehiclelist {
            background-color: var(--dashui-table-bg);
            color: var(--dashui-body-color);
            cursor:pointer;
        }
        .vehiclelist:hover {
            background-color: #624bff;
            color: #fff;
        }
        .vehiclelist-active {
            background-color: #624bff;
            color: #fff;
        }
        .vehiclelist-active:hover {
            cursor:pointer;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Heading -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 "><?php echo e(__('View Invoice')); ?></h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">                
                <div class="card-body">
                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('invoices.editformgroup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="row">
                        <div class="col-12" id="message">
                            <?php echo $__env->make('layouts.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4 d-flex justify-content-end">
                <button type="button" class="btn btn-danger me-2" data-id='<?php echo e($invoice->id); ?>' id="mark-unpaid"><?php echo e(__('Mark as unpaid')); ?></button>
                <a href="<?php echo e(route('invoices.generate', $invoice->id)); ?>" target="_blank" class="btn btn-warning me-2"><?php echo e(__('Print')); ?></a>
                <a href="#" class="btn btn-primary me-2"><?php echo e(__('Email')); ?></a>
                <a href="<?php echo e(route('invoices.index')); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
            </div>
        </div>
    </div>
</div>

<!-- Vehicle Model -->
<div class="modal fade gd-example-modal-xl" id="vehicleModal" tabindex="-1" role="dialog" aria-labelledby="vehicleModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Select a vehicle')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="vehiclelist_modalbody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <button type="button" class="btn btn-primary"><?php echo e(__('Select')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script src="<?php echo e(asset('js/increment.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            //activate datepicker
            $("#invoice_date").flatpickr({
                dateFormat: "d-m-Y",
                defaultDate: "<?php echo e(date('d-m-Y', strtotime($invoice->quote_date))); ?>",
            });

            $("#invoice_duedate").flatpickr({
                dateFormat: "d-m-Y",
                defaultDate: "<?php echo e(date('d-m-Y', strtotime($invoice->quote_duedate))); ?>",
            });

            $("#nextservicedate").flatpickr({
                dateFormat: "d-m-Y",
                defaultDate: "<?php echo e(date('d-m-Y', strtotime($invoice->nextservicedate))); ?>",
            });

            //Update a quote to invoice on create invoice
            $(document).on('click', '#mark-unpaid', function(e){
                var quote_id = $('#mark-unpaid').attr('data-id');
                $.ajax({
                    type: 'post',
                    url: "<?php echo e(route('updatetype')); ?>",
                    data: {
                        id: quote_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(){
                        $('#mark-unpaid').attr("disabled", true);
                    },
                    error: function(errors){
                        alert('An error has occured! Refresh the page and try again.');
                    },
                    success: function(response){
                        if(response.status == 200) {
                            if(response.type == 'I') {
                                $('#mark-unpaid').removeClass('btn-success').addClass('btn-danger');
                                $('#mark-unpaid').text("<?php echo e(__('Mark as unpaid')); ?>");
                                var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                message += '<strong>This invoice has been marked as paid</strong>';
                                message += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                message += '</div>';
                                $('#message').html(message);
                            } else {
                                $('#mark-unpaid').removeClass('btn-danger').addClass('btn-success');
                                $('#mark-unpaid').text("<?php echo e(__('Mark as paid')); ?>");
                                var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                message += '<strong>This invoice has been marked as unpaid</strong>';
                                message += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                message += '</div>';
                                $('#message').html(message);
                            }
                        }
                    },
                    complete: function(response){
                        $('#mark-unpaid').attr("disabled", false);
                    }
                });
            });

            $(".card-body :input").prop("disabled", true);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\RMS_IMS\resources\views/invoices/show.blade.php ENDPATH**/ ?>