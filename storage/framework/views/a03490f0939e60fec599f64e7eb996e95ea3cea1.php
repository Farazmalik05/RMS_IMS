

<?php $__env->startSection('styles'); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<style>
    .table th {
        line-height: 28px;
    }
    #invoice_table > tfoot > tr > td {
        border: none!important;
    }
    .vehiclelist {
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
            <h3 class="mb-0 "><?php echo e(__('Add Invoice')); ?></h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <form action="<?php echo e(route('invoices.store')); ?>" method="Post">
                <?php echo csrf_field(); ?>
                <div class="card">                
                    <div class="card-body">
                        
                            <?php echo $__env->make('invoices.formgroup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                        <div class="row">
                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <button type="submit" class="btn btn-primary me-2"><?php echo e(__('Save invoice')); ?></button>
                    <a href="<?php echo e(route('invoices.index')); ?>" class="btn btn-dark"><?php echo e(__('Back')); ?></a>
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
                  <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Select the vehicle')); ?></h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body" id="vehiclelist_modalbody">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Select</button>
              </div>
          </div>
      </div>
  </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="<?php echo e(asset('js/increment.js')); ?>"></script>
    <script>
        $(document).ready(function(){
            //activate datepicker
            $(".flatpickr").flatpickr({
                dateFormat: "d-m-Y",
                defaultDate: "today",
                //minDate: "today"
            });

            //Below function to change Invoice# when the year is changed in the dropdown
            $('#invoiceyear').on('change', function() {
                $.ajax( {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "<?php echo e(route('getinvoicenumber')); ?>",
                    type: "POST",
                    dataType: "json",
                    data: {
                        term: $('#invoiceyear').val()
                    },
                    success: function( number ) {
                        $('#invoice_number').val(number);
                        var prefix = "Inv/RMS/"+$('#invoiceyear').val()+"/";
                        $('#invoice_year').text(prefix);
                    }
                } );
                
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
                            table += "<td>"+vehicle.vin_no+"<input type='hidden' id='modal_vehiclevin' value='"+vehicle.vin_no+"'></td>";
                            table += "</tr>";
                        });
                        table += "</tbody></table>";
                    } 
                    else
                    {
                        var route = "<?php echo e(route("vehicles.create")); ?>";
                        table = "<div>No vehicle found  <a class='btn btn-primary'  href='";
                        table += route;
                        table += "'><?php echo e(__('+ Add New Vehicle')); ?></a></div>";
                    }
                    $("#vehiclelist_modalbody").html(table)
                    $("#vehicleModal").modal('toggle');
                    return false;
                }
            }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" ).append( "<div>" + item.phoneno + "</div>" ).appendTo( ul );
            };

            //select a vehicle from the list in modal box
            $(document).on('click', '.vehiclelist', function() {
                $(this).removeClass( "vehiclelist" ).addClass('vehiclelist-active');
                $(this).attr('data-select', 'selected');
            });

            //unselect a vehicle from the list in modal box
            $(document).on('click', '.vehiclelist-active', function() {
                $(this).removeClass( "vehiclelist-active" ).addClass('vehiclelist');
                $(this).attr('data-select', '');
            });

            //select a vehicle from the list in modal box and display in respective input tag
            $("#vehicleModal").on("click",".btn-primary", function(){
                var vehicle_selected = false;
                var count = $('#vehicleslist tbody tr').length;
                $('#vehicleslist tbody tr').each(function() {
                    if($(this).attr('data-select') == 'selected') {
                        vehicle_selected = true;
                        $("#vehicleModal").modal('toggle');
                        $('#vehicle_id').val($(this).find('#modal_vehicleid').val());
                        $('#rego').val($(this).find('#modal_vehiclerego').val());

                        $('#make').val($(this).find('#modal_vehiclemake').val());
                        $('#model').val($(this).find('#modal_vehiclemodel').val());
                        $('#transmission').val($(this).find('#modal_vehicletransmission').val()).change();
                        $('#vin_no').val($(this).find('#modal_vehiclevin').val());
                        $('#year').val($(this).find('#modal_vehicleyear').val()).change();
                        return false;
                    }
                });

                if(count > 0)
                {
                    if(!vehicle_selected)
                    {
                        alert('Vehicle not selected');                    
                    }
                }
                else
                {
                    $("#vehicleModal").modal('toggle');
                }
            });

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
                    $( "#rego" ).val( ui.item.rego );
                    $( "#make" ).val( ui.item.make );
                    $( "#model" ).val( ui.item.model );                    
                    $('#transmission option[value="'+ui.item.transmission+'"]').prop("selected", true);                    
                    $( "#vin_no" ).val( ui.item.vin_no );
                    $('#year option[value="'+ui.item.year+'"]').prop("selected", true);
                    return false;
                }
            }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" ).append( "<div>" + item.rego + "</div>" ).appendTo( ul );
            };

            //autocomplete job input in invoice table
            $(document).on('keydown.autocomplete', 'input.job', function() {
                $(this).autocomplete({
                source: function( request, response ) {
                    $.ajax( {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "<?php echo e(route('getjob')); ?>",
                        type: "POST",
                        dataType: "json",
                        data: { term: request.term },
                        success: function( data ) { response( data ); }
                    });
                },
                minLength: 2,
                select: function( event, ui ) {
                    $(this).val(ui.item.name);
                    var quantity = $(this).parent().parent().find('.quantity');
                    var price = $(this).parent().parent().find('.price');
                    var amount = $(this).parent().parent().find('.amount');
                    $(this).val(ui.item.name);
                    $(quantity).val(ui.item.quantity);
                    $(price).val(ui.item.rate);
                    quantity = parseFloat(ui.item.quantity);
                    price = parseFloat(ui.item.rate);
                    $(amount).val(parseFloat(quantity*price).toFixed(2));
                    return false;
                }
            }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" ).append( "<div>" + item.name + "</div>" ).appendTo( ul );
            }
            });

            //add rows to the invoice table
            $('#invoice_table thead').on('click', '.addmore', function() {
                var rowCount = $('#invoice_table tbody tr').length;

                var job_row = $('#invoice_body tr:first');
                job_row = job_row.clone().appendTo('#invoice_body')
                rowCount++;
                job_row.attr("id", "TRow"+rowCount);                
                // $(job_row).find("td:last").html('<button type="button" class="btn btn-danger btn-sm delete">-</button>');
                $(job_row).find(".input").val('');
                $(job_row).find(".description").remove();
                $(job_row).find(".quantity").val('1');
            });

            //delete the rows in the invoice table
            $('#invoice_body').on('click', '.delete', function() {
                var rowCount = $('#invoice_table tbody tr').length;

                if(rowCount>1)
                {
                    $(this).closest("tr").remove();
                }                
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\wamp\www\RMS_IMS\resources\views/invoices/create.blade.php ENDPATH**/ ?>