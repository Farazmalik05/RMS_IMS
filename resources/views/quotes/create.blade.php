@extends('layouts.app')

@section('styles')
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
@endsection

@section('content')
<!-- Heading -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <!-- Page header -->
        <div class="mb-4">
            <h3 class="mb-0 ">{{ __('Add Quote') }}</h3>
        </div>
    </div>
</div>
<div>
    <!-- row -->
    <div class="row">
        <div class="col-12">
            <form action="{{ route('quotes.store') }}" method="Post" id="quote-form">
                @csrf
                <div class="card">                
                    <div class="card-body">                        
                        @include('quotes.formgroup')
                        <div class="row">
                            <div class="col-12" id="message">
                                @include('layouts.flash-message')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 d-flex justify-content-end">
                    <button type="button" class="btn btn-success me-2" data-id='' id="mark-paid" disabled="disabled" style="display:none;">{{ __('Mark as paid') }}</button>
                    <button type="submit" class="btn btn-primary me-2" id="quote-save">{{ __('Save quote') }}</button>
                    <a href="{{ route('quotes.index') }}" class="btn btn-dark">{{ __('Back') }}</a>
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
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Select a vehicle') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body" id="vehiclelist_modalbody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
                <button type="button" class="btn btn-primary">{{ __('Select') }}</button>
            </div>
        </div>
    </div>
</div>

<!-- Customer Warning Model -->
<div class="modal fade gd-example-modal-lg" id="customerwarningModal" tabindex="-1" role="dialog" aria-labelledby="customerwarningModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="customerwarningModalLabel">{{ __('Customer warning') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <!-- <span aria-hidden="true">&times;</span> -->
                </button>
            </div>
            <div class="modal-body" id="customerwarning_modalbody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Close') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/increment.js') }}"></script>
    <script>
        $(document).ready(function(){
            //activate datepicker
            $(".flatpickr").flatpickr({
                dateFormat: "d-m-Y",
                defaultDate: "today",
            });

            //Below function to change quote# when the year dropdown is changed
            $('#quoteyear').on('change', function() {
                $.ajax( {
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('getquotenumber') }}",
                    type: "POST",
                    dataType: "json",
                    data: {
                        term: $('#quoteyear').val()
                    },
                    success: function( number ) {
                        $('#quote_number').val(number);
                        var prefix = "Quote/RMS/"+$('#quoteyear').val()+"/";
                        $('#quote_year').text(prefix);
                    }
                } );
                
            });

            //autocomplete phone input
            $( "#phoneno" ).autocomplete({
                source: function( request, response ) {
                    $.ajax( {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ route('getcustomerwithvehicle') }}",
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
                        var route = "{{ route('vehicles.create') }}";
                        table = "<div>No vehicle found  <a class='btn btn-primary'  href='";
                        table += route;
                        table += "'>{{ __('+ Add New Vehicle') }}</a></div>";
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
                return $( "<li>" ).append( "<div>" + item.phoneno + " - " + item.name + "</div>" ).appendTo( ul );
            };

            //autocomplete rego input
            $( "#rego" ).autocomplete({
                source: function( request, response ) {
                    $.ajax( {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ route('getvehiclewithcustomer') }}",
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
                    $( "#vehicle_id" ).val( ui.item.id );
                    $( "#make" ).val( ui.item.make );
                    $( "#model" ).val( ui.item.model );                    
                    $('#transmission option[value="'+ui.item.transmission+'"]').prop("selected", true);                    
                    $( "#vin_no" ).val( ui.item.vin_no );
                    $('#year option[value="'+ui.item.year+'"]').prop("selected", true);

                    //Customer Warning popping box
                    var message = '';
                    if(ui.item.customer.warn == null) {
                        message = '<p>N/A</p>';
                    } else {
                        message = '<p>' + ui.item.customer.warn + '</p>';
                    }
                    $("#customerwarning_modalbody").html(message);
                    $("#customerwarningModal").modal('toggle');
                    return false;
                }
            }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" ).append( "<div>" + item.rego + " - " + item.customer.name + "</div>" ).appendTo( ul );
            };

            //autocomplete job input in quote table
            $(document).on('keydown.autocomplete', 'input.job', function() {
                $(this).autocomplete({
                source: function( request, response ) {
                    $.ajax( {
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        url: "{{ route('getjob') }}",
                        type: "POST",
                        dataType: "json",
                        data: { term: request.term },
                        success: function( data ) { response( data ); }
                    });
                },
                minLength: 2,
                select: function( event, ui ) {
                    //console.log(ui.item);
                    $(this).val(ui.item.name);
                    var job_id = $(this).parent().parent().find('.job_id');
                    $(job_id).val(ui.item.id);
                    var quantity = $(this).parent().parent().find('.quantity');
                    $(this).parent().find(".description").remove();
                    if(ui.item.has_description) {
                        $(this).parent().find('textarea').remove();
                        ui.item.descriptions.forEach(job_description);
                        $(this).closest("td").append($('<textarea id="description'+ui.item.id+'" name="description'+ui.item.id+'" class="form-control description" rows="10">'+ui.item.descriptions.join('\r\n')+'</textarea>'));
                    }
                    $(quantity).val(ui.item.quantity);
                    var price = $(this).parent().parent().find('.price');
                    $(price).val(ui.item.rate);
                    quantity = parseFloat(ui.item.quantity);
                    price = parseFloat(ui.item.rate);
                    var amount = $(this).parent().parent().find('.amount');
                    $(amount).val(parseFloat(quantity*price).toFixed(2));

                    getTotal();
                    return false;
                }
            }).autocomplete( "instance" )._renderItem = function( ul, item ) {
                return $( "<li>" ).append( "<div>" + item.name + "</div>" ).appendTo( ul );
            }
            });

            //Save quote form
            $("#quote-form").on('submit', function(e){
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    type: 'post',
                    url: this.action,
                    data: data,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(){
                        $('#message').html('');
                        $('#quote-save').attr("disabled", true);
                        $('#quote-save').text("{{ __('Saving...') }}");
                    },
                    error: function(errors){
                        var error_list = '';
                        var lastmessage = '';
                        error_list = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                        error_list += '<ul style="list-style-type: none; padding:0px; margin-bottom:0px">';
                        for (let key in errors.responseJSON.errors)
                        {
                            if(lastmessage != errors.responseJSON.errors[key][0])
                            {
                                error_list += '<li><strong>'+errors.responseJSON.errors[key][0]+'</strong></li>';
                            }
                            lastmessage = errors.responseJSON.errors[key][0];
                        }                          
                        error_list += '</ul>';
                        error_list += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                        error_list += '</div>';
                        
                        $('#message').html(error_list);
                        // console.log(error_list);
                        $('#quote-save').attr("disabled", false);
                    },
                    success: function(response){
                        if(response.status == 400) {
                            var error_list = '';
                            error_list = '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
                            error_list += '<ul style="list-style-type: none; padding:0px; margin-bottom:0px">';
                            error_list += '<li><strong>'+response.error+'</strong></li>';
                            error_list += '</ul>';
                            error_list += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            error_list += '</div>';
                            $('#quote-save').attr("disabled", false);
                            
                            $('#message').html(error_list);
                        } else {
                            var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                            message += '<strong>'+response.success+'</strong>';
                            message += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                            message += '</div>';
                            $('#message').html(message);
                            $("#mark-paid").css("display", "block");
                            $('#mark-paid').attr("disabled", false);

                            $('#mark-paid').attr('data-id', response.quote_id);
                        }
                    },
                    complete: function(response){
                        // $('#quote-save').attr("disabled", false);
                        $('#quote-save').text("{{ __('Save quote') }}");
                    }
                });
            });

            //Update a quote to invoice on create invoice
            $(document).on('click', '#mark-paid', function(e){
                var quote_id = $('#mark-paid').attr('data-id');
                $.ajax({
                    type: 'post',
                    url: "{{ route('updatetype') }}",
                    data: {
                        id: quote_id,
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    beforeSend: function(){
                        $('#mark-paid').attr("disabled", true);
                    },
                    error: function(errors){
                        alert('An error has occured! Refresh the page and try again.');
                    },
                    success: function(response){
                        if(response.status == 200) {
                            if(response.type == 'I') {
                                $('#mark-paid').removeClass('btn-success').addClass('btn-danger');
                                $('#mark-paid').text("{{ __('Mark as unpaid') }}");
                                var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                message += '<strong>This quote has been marked as paid</strong>';
                                message += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                message += '</div>';
                                $('#message').html(message);
                            } else {
                                $('#mark-paid').removeClass('btn-danger').addClass('btn-success');
                                $('#mark-paid').text("{{ __('Mark as paid') }}");
                                var message = '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                                message += '<strong>This quote has been marked as unpaid</strong>';
                                message += '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
                                message += '</div>';
                                $('#message').html(message);
                            }
                        }
                    },
                    complete: function(response){
                        $('#mark-paid').attr("disabled", false);
                    }
                });
            });
        });        
    </script>
@endsection