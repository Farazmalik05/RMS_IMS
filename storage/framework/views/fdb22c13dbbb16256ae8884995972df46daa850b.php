<?php $__env->startSection('styles'); ?>
<link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
<style type="text/css" rel="stylesheet">
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
    <div class="col-12">
        <?php echo $__env->make('layouts.flash-message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
    <div class="col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 "><?php echo e(__('Jobs')); ?></h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-lg-flex justify-content-between ">
                    <div class="d-grid d-lg-block">
                        <a href="<?php echo e(route('jobs.create')); ?>" class="btn btn-primary" id="new-job">
                            <?php echo e(__('+ Create New Job')); ?>

                        </a >
                    </div>
                </div>
                <div class="card-body">
                    <?php if(count($jobs) > 0): ?>
                        <div class="table-responsive table-card">
                            <table id="jobs-list" class="table text-nowrap mb-0 fs-14 table-styling">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Job</th>
                                        <th>Has description</th>
                                        <th>Qty</th>
                                        <th>Rate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list contact-list-container">
                                    <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td scope="row" class="td"><?php echo e(++$key); ?></td>
                                            <td class="name td">
                                                <?php if(strlen($job->name) > 100): ?>
                                                    <?php echo e(substr($job->name, 0, 100)."..."); ?>

                                                <?php else: ?>
                                                    <?php echo e($job->name); ?>

                                                <?php endif; ?>
                                            </td>
                                            <td class="email_id td">
                                                <?php if($job->has_description): ?>
                                                    Yes
                                                <?php else: ?>
                                                    No
                                                <?php endif; ?>
                                            </td>
                                            <td class="phone td"><?php echo e($job->quantity); ?></td>
                                            <td class="address td"><?php echo e($job->rate); ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <a href="<?php echo e(route('jobs.edit', $job)); ?>" class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit icon-xs"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                        <div id="view" class="d-none">
                                                            <span><?php echo e(__('View/Edit')); ?></span>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:{}" onclick="event.preventDefault();document.getElementById('delete-job-<?php echo e($job->id); ?>').submit();" class="btn btn-ghost btn-icon btn-sm rounded-circle">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 icon-xs"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                        <div id="delete" class="d-none">
                                                            <span><?php echo e(__('Delete')); ?></span>
                                                        </div>
                                                    </a>
                                                    <form id="delete-job-<?php echo e($job->id); ?>" action="<?php echo e(route('jobs.destroy', $job)); ?>" method="post">
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
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#jobs-list').DataTable();
            $(".alert").delay(5200).fadeOut(300);
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmsautoa/public_html/IMS/resources/views/jobs/index.blade.php ENDPATH**/ ?>