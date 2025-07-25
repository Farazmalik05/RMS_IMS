<?php $__env->startSection('styles'); ?>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
    .ml-2 {
        margin-left: 10px!important;
    }
    .td {
        line-height: 32px!important;
    }
    .fs-14 {
        font-size: 14px;
    }
    .table-styling {
        border-bottom: 1px solid var(--dashui-table-border-color)!important;
    }
</style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Heading -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 "><?php echo e(__('Edit Job')); ?></h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">

        <!-- Edit Job -->
        <div class="col-12">
            <form action="<?php echo e(route('jobs.update', $job)); ?>" method="Post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
                <div class="card">                
                    <div class="card-body">
                        <?php if(session('status')): ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo e(session('status')); ?>

                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <?php echo $__env->make('jobs.formgroup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <input type="hidden" name="description_total" id="description_total" value="<?php echo e(sprintf('%.2f', $description_total)); ?>">
                        </div>
                        <div>
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(__('Save job')); ?></button>
                    <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
                </div>
            </form>
        </div>
        <br>

        <!-- List of Descriptions -->
        <div class="col-12 mt-5">
            <h3 class="mb-0 "><?php echo e(__('List of Descriptions')); ?></h3>
        </div>

        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <?php if(count($job->descriptions) > 0): ?>
                        <div class="table-responsive table-card">
                            <table id="descriptions-list" class="table text-nowrap mb-0 fs-14 table-styling">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Description</th>
                                        <th>Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list contact-list-container">
                                    <?php $count = 0; ?>
                                    <?php $__currentLoopData = $job->descriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$description): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td scope="row" class="td"><?php echo e(++$count); ?></td>
                                        <td class="phone td" title="<?php echo e($description->description); ?>">
                                            <?php if(strlen($description->description) > 100): ?>
                                                <?php echo e(substr($description->description, 0, 100)."..."); ?>

                                            <?php else: ?>
                                                <?php echo e($description->description); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($description->description_rate); ?></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="<?php echo e(route('jobs.descriptions.edit', [$job, $description])); ?>" class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                    <div id="view" class="d-none">
                                                        <span><?php echo e(__('View/Edit')); ?></span>
                                                    </div>
                                                </a>
                                                <a href="javascript:{}" onclick="event.preventDefault();document.getElementById('delete-description-<?php echo e($description->id); ?>').submit();" class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                    <div id="delete" class="d-none">
                                                        <span><?php echo e(__('Delete')); ?></span>
                                                    </div>
                                                </a>
                                                <form id="delete-description-<?php echo e($description->id); ?>" action="<?php echo e(route('jobs.descriptions.destroy', [$job, $description])); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('delete'); ?>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <p class="text-muted mt-2 mb-2"><?php echo e(__('No records found!')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <!-- Create description form -->
        <div class="col-12 mt-5">
            <h3 class="mb-0 "><?php echo e(__('Add Description')); ?></h3>
        </div>
        <div class="col-12 mt-5">
            <form action="<?php echo e(route('jobs.descriptions.store', $job)); ?>" method="Post">
                <?php echo csrf_field(); ?>
                <div class="card">                
                    <div class="card-body">
                        <div class="row">
                            <?php echo $__env->make('descriptions.formgroup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div>
                            <?php if($errors->storedescription->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->storedescription->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <?php echo $__env->make('layouts.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(__('Save description')); ?></button>
                    <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#descriptions-list').DataTable();
            $(".alert").delay(5200).fadeOut(300);

            job_total = parseFloat($('#rate').val());
            description_total = parseFloat($('#description_total').val());
            console.log(description_total);
            if(description_total !== 0)
            {
                if(description_total != job_total)
                {
                    $.ajax({
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "<?php echo e(route('updatejobrate')); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            id: "<?php echo e($job->id); ?>",
                            rate: description_total
                        },
                        success: function(data, textStatus, jqXHR) {
                            alert("Default job rate has been updated!");
                            $('#rate').val(parseFloat(description_total).toFixed(2));
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            alert('Error occurred! Try again');
                        }
                    });
                }
            }
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/jobs/edit.blade.php ENDPATH**/ ?>