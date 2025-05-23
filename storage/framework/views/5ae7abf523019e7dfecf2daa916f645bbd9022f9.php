

<?php $__env->startSection('styles'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Heading -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 "><?php echo e(__('Add Vehicle')); ?></h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <?php if(session('status')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo e(session('status')); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-12">
            <form action="<?php echo e(route('vehicles.store')); ?>" method="Post">
            <?php echo csrf_field(); ?>
                <div class="card">                
                    <div class="card-body">
                        <div class="row">
                            <?php echo $__env->make('vehicles.formgroup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(__('Save')); ?></button>
                    <a href="<?php echo e(route('customers.index')); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function(){
            $( "#customer_phoneno" ).autocomplete({
                source: function( request, response ) {
                    $.ajax( {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "<?php echo e(route('getcustomer')); ?>",
                        type: "POST",
                        dataType: "json",
                        data: {
                            term: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    } );
                },
                minLength: 4,
                select: function( event, ui ) {
                    $( "#customer_phoneno" ).val( ui.item.phoneno );
                    $( "#customer_name" ).val( ui.item.name );
                    $( "#customer_id" ).val( ui.item.id );
                    return false;
                }
            }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" ).append( "<div>" + item.phoneno  + " - " + item.name + "</div>" ).appendTo( ul );
            };
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/rmsauto5/public_html/IMS/resources/views/vehicles/create.blade.php ENDPATH**/ ?>