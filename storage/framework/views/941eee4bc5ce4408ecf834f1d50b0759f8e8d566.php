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
            <h3 class="mb-0 "><?php echo e(__('Create a job card')); ?></h3>
        </div>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('jobcards.store')); ?>" method="Post" id="jobcard-form">
                <?php echo csrf_field(); ?>
                <div class="card">                
                    <div class="card-body">                        
                        <?php echo $__env->make('jobcards.formgroup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary me-2" id="generate-jobcard"><?php echo e(__('Create job card')); ?></button>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
                </div>
            </form>
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
                    <!-- <span aria-hidden="true">&times;</span> -->
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

<!-- Customer Warning Model -->
<div class="modal fade gd-example-modal-lg" id="customerwarningModal" tabindex="-1" role="dialog" aria-labelledby="customerwarningModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerwarningModalLabel"><?php echo e(__('Customer warning')); ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body" id="customerwarning_modalbody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            function config_details(check_val) {
                if($(check_val).val() == 'groupon') {
                    $('#voucher_code').attr('disabled', false);
                    $('#is_logbook').attr('disabled', false);
                    $('#service_details').css('display','block');
                } else if($(check_val).val() == 'minor_service') {
                    $('#voucher_code').attr('disabled', true);
                    $('#is_logbook').attr('disabled', false);
                    $('#service_details').css('display','block');
                } else {
                    $('#voucher_code').attr('disabled', true);
                    $('#is_logbook').attr('disabled', true);
                    $('#service_details').css('display','none');
                }
            }
            $(".flatpickr").flatpickr({
                dateFormat: "d-m-Y",
                defaultDate: "today",
            });
            var jobcard_type = $('input[name=jobcard_type]:checked');
            jobcard_type.each(function(){
                config_details(this);
            });

            $(document).on('click', 'input:radio[name="jobcard_type"]', function(){
                config_details(this);
            });

            //autocomplete phone input
            $( "#phoneno" ).autocomplete({
                source: function( request, response ) {
                    $.ajax( {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "<?php echo e(route('getcustomerwithvehicle')); ?>",
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
                minLength: 2,
                select: function( event, ui ) {
                    $( "#phoneno" ).val( ui.item.phoneno );
                    $( "#customer_name" ).val( ui.item.name );
                    $( "#customer_id" ).val( ui.item.id );
                    var address = '';
                    if(ui.item.address != '' &&  ui.item.address !== null) {
                        address += ui.item.address;
                    }
                    if(ui.item.suburb != '' &&  ui.item.suburb !== null) {
                        address += ' '+ui.item.suburb;
                    }
                    if(address == '') {
                        address += ui.item.state;
                    } else {
                        address += ' '+ui.item.state;
                    }
                    if(ui.item.postcode != '' &&  ui.item.postcode !== null) {
                        address += ' '+ui.item.postcode;
                    }
                    $( "#address" ).val( address );
                    $( "#email" ).val( ui.item.email );
                    
                    var table = "<table class='table' id='vehicleslist'>";
                    table += "<thead><tr>";
                    table += "<th scope='col'>Rego#</th>";
                    table += "<th scope='col'>Vehicle</th>";
                    table += "<th scope='col'>Transmission</th>";
                    table += "<th scope='col'>Year</th>";
                    table += "<th scope='col'>Vin#</th>"
                    table += "</tr></thead><tbody>";
                    
                    if(ui.item.vehicles.length > 0)
                    {
                        $.each( ui.item.vehicles, function( key, vehicle ) {
                            var transmission = vehicle.transmission;
                            if(vehicle.transmission == 'A')
                                transmission = 'Automatic';
                            else
                                transmission = 'Manual';
                            table += "<tr class='vehiclelist' data-select=''>";
                            table += "<td>"+vehicle.rego+"<input type='hidden' id='modal_vehicleid' value='"+vehicle.id+"'><input type='hidden' id='modal_vehiclerego' value='"+vehicle.rego+"'></td>";
                            table += "<td>"+vehicle.make+" "+vehicle.model+"<input type='hidden' id='modal_vehiclemake' value='"+vehicle.make+"'><input type='hidden' id='modal_vehiclemodel' value='"+vehicle.model+"'></td>";
                            table += "<td>"+transmission+"<input type='hidden' id='modal_vehicletransmission' value='"+vehicle.transmission+"'></td>";
                            table += "<td>"+vehicle.year+"<input type='hidden' id='modal_vehicleyear' value='"+vehicle.year+"'></td>";
                            table += "<td>"+vehicle.vin_no+"<input type='hidden' id='modal_vehiclevin' value='"+vehicle.vin_no+"'><input type='hidden' id='modal_vehiclecolour' value='"+vehicle.colour+"'></td>";
                            table += "</tr>";
                        });
                        table += "</tbody></table>";
                    } 
                    else
                    {
                        var route = "<?php echo e(route('vehicles.create')); ?>";
                        table = "<div>No vehicle found  <a class='btn btn-primary'  href='";
                        table += route;
                        table += "'><?php echo e(__('+ Add New Vehicle')); ?></a></div>";
                    }
                    $("#vehiclelist_modalbody").html(table)
                    $("#vehicleModal").modal('toggle');

                    //Customer Warning popping box
                    var message = '';
                    if(ui.item.warn == null) {
                    message = '<p>N/A</p>'
                    } else {
                    message = '<p>' + ui.item.warn + '</p>'
                    }
                    $("#customerwarning_modalbody").html(message);
                    $("#customerwarningModal").modal('toggle');
                    return false;
                }
            }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" ).append( "<div>" + item.phoneno + "</div>" ).appendTo( ul );
            };

            //autocomplete rego input
            $( "#rego" ).autocomplete({
                source: function( request, response ) {
                    $.ajax( {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "<?php echo e(route('getvehiclewithcustomer')); ?>",
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
                minLength: 2,
                select: function( event, ui ) {
                    $( "#phoneno" ).val( ui.item.customer.phoneno );
                    $( "#customer_name" ).val( ui.item.customer.name );
                    $( "#customer_id" ).val( ui.item.customer.id );
                    var address = '';
                    if(ui.item.customer.address != '' &&  ui.item.customer.address != null) {
                        address += ui.item.customer.address;
                    }
                    if(ui.item.customer.suburb != '' &&  ui.item.customer.suburb != null) {
                        address += ' '+ui.item.customer.suburb;
                    }
                    if(address == '') {
                        address += ui.item.customer.state;
                    } else {
                        address += ' '+ui.item.customer.state;
                    }
                    if(ui.item.customer.postcode != '' &&  ui.item.customer.postcode != null) {
                        address += ' '+ui.item.customer.postcode;
                    }
                    $( "#address" ).val( address );
                    $( "#email" ).val( ui.item.customer.email );
                    $( "#rego" ).val( ui.item.rego );
                    $( "#vehicle_id" ).val( ui.item.id );
                    $( "#make" ).val( ui.item.make );
                    $( "#model" ).val( ui.item.model );
                    $( "#colour" ).val( ui.item.colour );
                    $('#transmission option[value="'+ui.item.transmission+'"]').prop("selected", true);                    
                    $( "#vin_no" ).val( ui.item.vin_no );
                    $('#year option[value="'+ui.item.year+'"]').prop("selected", true);

                    //Customer Warning popping box
                    var message = '';
                    if(ui.item.customer.warn == null) {
                    message = '<p>N/A</p>'
                    } else {
                    message = '<p>' + ui.item.customer.warn + '</p>'
                    }
                    $("#customerwarning_modalbody").html(message);
                    $("#customerwarningModal").modal('toggle');

                    return false;
                }
            }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" ).append( "<div>" + item.rego + "</div>" ).appendTo( ul );
            };
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home3/rmsauto5/public_html/IMS/resources/views/jobcards/create.blade.php ENDPATH**/ ?>