function getTotal() {
    var total = 0;
    $('.amount').each(function() {
        total += parseFloat($(this).val());
        //console.log(total);
    });
    if(isNaN(total)) {
        total = 0;
        $('#total').text(total.toFixed(2));
        $('#amtpaid').val(total.toFixed(2));
    } else {
        $('#total').text(total.toFixed(2));
        $('#amtpaid').val(total.toFixed(2));
    }
}

function job_description(item, index, arr) {
    arr[index] = item['description'] + ' - $'+item['description_rate'];
}

$(document).ready(function(){
    $(document).on('change', '.quantity, .price', function(){
        // var index = $(this).parent().parent().index();
        var qty = parseFloat($(this).closest('tr').find('.quantity').val());
        var unit_price = parseFloat($(this).closest('tr').find('.price').val());
        var amt = $(this).closest('tr').find('.amount');
        var sub_total = unit_price * qty;
        amt.val(sub_total.toFixed(2));

        getTotal();
    });

    $(document).on('change', '#amtpaid', function(){
        var total = $('#total').text();
        var amtpaid = parseFloat($('#amtpaid').val());
        $('#amtpaid').val(amtpaid.toFixed(2));
        var amtdue = total - amtpaid;
        $('#amtdue').val(amtdue.toFixed(2));
    });
    
    //Reset vehicle id
    $('#rego').on('change', function() {
        var rego = $('#rego').val();
        if(rego == '') {
            $('#vehicle_id').val('');
        }
    });

    //Reset customer id
    $('#customer_name').on('change', function() {
        var name = $('#customer_name').val();
        if(name == '') {
            $('#customer_id').val('');
        }
    });

    //select a vehicle from the list in modal box
    $(document).on('click', '.vehiclelist', function() {
        $('#vehicleslist tr').removeClass('vehiclelist-active').addClass('vehiclelist');
        $('#vehicleslist tr').attr('data-select', '');

        $(this).removeClass( "vehiclelist" ).addClass('vehiclelist-active');
        $(this).attr('data-select', 'selected');
    });

    //unselect a vehicle from the list in modal box
    $(document).on('click', '.vehiclelist-active', function() {
        $(this).removeClass( "vehiclelist-active" ).addClass('vehiclelist');
        $(this).attr('data-select', '');
    });

    //select a vehicle from the list in modal box and display in respective input tag on clicking select btn
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
                if($('#colour').length > 0) {
                    $('#colour').val($(this).find('#modal_vehiclecolour').val());
                }
                
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

    //add rows to the quote table
    $('#quote_table thead').on('click', '.addmore', function() {
        var rowCount = $('#quote_table tbody tr').length;

        var job_row = $('#quote_body tr:first');
        job_row = job_row.clone().appendTo('#quote_body')
        rowCount++;
        job_row.attr("id", "TRow"+rowCount);                
        // $(job_row).find("td:last").html('<button type="button" class="btn btn-danger btn-sm delete">-</button>');
        $(job_row).find(".input").val('');
        $(job_row).find(".description").remove();
        $(job_row).find(".quantity").val('1');
    });

    //delete the rows in the quote table
    $('#quote_body').on('click', '.delete', function() {
        var rowCount = $('#quote_table tbody tr').length;

        if(rowCount>1)
        {
            $(this).closest("tr").remove();
        }
        getTotal();
    });
});