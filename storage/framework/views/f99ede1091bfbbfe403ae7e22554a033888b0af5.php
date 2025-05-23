<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css"
    integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="<?php echo e(asset('css/materialdesignicons.min.css')); ?>" rel="stylesheet">

<style>
    .table th {
        line-height: 28px;
    }

    #quote_table>tfoot>tr>td {
        border: none !important;
    }

    .vehiclelist {
        background-color: var(--dashui-table-bg);
        color: var(--dashui-body-color);
        cursor: pointer;
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
        cursor: pointer;
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
                <input type="button" id="email" class="btn btn-primary me-2" value="<?php echo e(__('Email')); ?>">
                <a href="<?php echo e(route('invoices.index')); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
            </div>
        </div>
    </div>
</div>

<!-- Email customer Model -->
<div class="modal fade gd-example-modal-lg" id="emailModal" tabindex="-1" role="dialog"
    aria-labelledby="customerwarningModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel"><?php echo e(__('Email customer invoice')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('invoices.sendemail')); ?>" method="POST" id="send_email_form">
                <?php echo csrf_field(); ?>
                <div class="modal-body" id="email_modalbody">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="email_id"><?php echo e(__('Email')); ?> <span
                                    class="text-danger">*</span></label>
                            <input type="text" name="email_id" id="email_id" class="form-control"
                                value="<?php echo e($invoice->vehicle->customer->email); ?>"
                                placeholder="<?php echo e(__('Enter customer email')); ?>">
                            <div id="message_email_id" class="invalid-feedback"></div>
                            <input type="hidden" id="customer_id" name="customer_id"
                                value="<?php echo e($invoice->vehicle->customer->id); ?>" readonly>
                            <input type="hidden" id="id" name="id" value="<?php echo e($invoice->id); ?>" readonly>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="email_body"><?php echo e(__('Email body')); ?></label>
                            <textarea name="email_body" id="email_body" class="form-control" rows="10"
                                placeholder="<?php echo e(__('Enter email body')); ?>">
                                <p>Dear <?php echo e(ucwords($invoice->vehicle->customer->name)); ?>,</p>
                                <p>We hope this email finds you well. Attached is the invoice for the recent auto repair services provided to your vehicle <?php echo e(ucwords($invoice->vehicle->make)); ?> <?php echo e(ucwords($invoice->vehicle->model)); ?> [Rego # - <?php echo e(strtoupper($invoice->vehicle->rego)); ?>] at RMS Auto Repairs.</p>
                                <p>Should you have any questions or require further clarification regarding the invoice, please do not hesitate to contact us at 0410384019 or service@rmsauto.com.au. We value your business and are committed to providing you with the best service possible.</p>
                                <p>Thank you for choosing RMS Auto Repairs. We look forward to serving you again in the future.</p>
                                <p>Warm regards,
                                <br>RMS Auto Repairs
                                <br>P.: 03942446843 | 0410384019
                                <br>E.: service@rmsauto.com.au</p>
                            </textarea>
                            <div id="message_email_body" class="invalid-feedback"></div>
                        </div>
                        <div class="border-top py-4 mt-6">
                            <p>
                                <i class="mdi mdi-attachment me-2 align-middle"></i>
                                1 Attachment
                            </p>
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <div class="icon-shape icon-md bg-danger text-white rounded">
                                        <small>PDF</small>
                                    </div>
                                    <div class="ms-2">
                                        <p class="mb-0 fs-6">Invoice/RMS/<?php echo e(date('Y', strtotime($invoice->quote_date))); ?>/<?php echo e(sprintf('%02d', $invoice->quote_number)); ?>.pdf</p>
                                        <!-- <p class="fs-6 mb-0">243.45 KB</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="send_email"><?php echo e(__('Send
                        email')); ?></button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
    integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>
<script src="<?php echo e(asset('js/main.js')); ?>"></script>
<script src="<?php echo e(asset('js/increment.js')); ?>"></script>
<script>
    $(document).ready(function () {
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

        ClassicEditor.create(document.querySelector('#email_body')).catch(error => {
            console.error(error);
        });

        //Update a quote to invoice on create invoice
        $(document).on('click', '#mark-unpaid', function (e) {
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
                beforeSend: function () {
                    $('#mark-unpaid').attr("disabled", true);
                },
                error: function (errors) {
                    alert('An error has occured! Refresh the page and try again.');
                },
                success: function (response) {
                    if (response.status == 200) {
                        if (response.type == 'I') {
                            $('#mark-unpaid').removeClass('btn-success').addClass('btn-danger');
                            $('#mark-unpaid').text("<?php echo e(__('Mark as unpaid')); ?>");
                            var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                            message += '<strong>This invoice has been marked as paid</strong>';
                            message += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            message += '</div>';
                            $('#message').html(message);
                            $("#email").attr("disabled", false);
                        } else {
                            $('#mark-unpaid').removeClass('btn-danger').addClass('btn-success');
                            $('#mark-unpaid').text("<?php echo e(__('Mark as paid')); ?>");
                            var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                            message += '<strong>This invoice has been marked as unpaid</strong>';
                            message += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            message += '</div>';
                            $('#message').html(message);
                            $("#email").attr("disabled", true);
                        }
                    }
                },
                complete: function (response) {
                    $('#mark-unpaid').attr("disabled", false);
                }
            });
        });

        $(".card-body :input").prop("disabled", true);

        $(document).on('click', '#email', function (e) {
            $("#emailModal").modal('toggle');
        });

        $("#emailModal #email").click(function (event) {
            event.stopPropagation();
        });

        $("#emailModal #email_body").click(function (event) {
            event.stopPropagation();
        });

        $(document).on('submit', '#send_email_form', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'post',
                url: this.action,
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                beforeSend: function () {
                    $('#send_email').attr("disabled", true);
                    $('#email').attr("disabled", true);

                    $('#message').html('');
                    $('#email').prop('value', "<?php echo e(__('Sending email...')); ?>");
                    $('#message_email_id').html('');
                    $('#message_email_id').css('display', 'none');
                    $('#email_id').removeClass('is-invalid');
                    $('#message_email_body').html('');
                    $('#message_email_body').css('display', 'none');
                    $('#email_body').removeClass('is-invalid');
                },
                error: function (errors) {
                    for (let key in errors.responseJSON.errors) {
                        $('#message_' + key).html(errors.responseJSON.errors[key][0]);
                        $('#message_' + key).css('display', 'block');
                        $('#' + key).addClass('is-invalid');
                    }
                    $("#emailModal").modal('show');
                },
                success: function (response) {
                    if (response.status == 200) {
                        var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                        message += '<strong>' + response.message + '</strong>';
                        message += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        message += '</div>';
                        $('#message').html(message);
                    }
                    $('#email_message').html('');
                },
                complete: function (response) {
                    $('#email').prop('value', "<?php echo e(__('Email')); ?>");
                    $('#send_email').attr("disabled", false);
                    $('#email').attr("disabled", false);
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/invoices/show.blade.php ENDPATH**/ ?>