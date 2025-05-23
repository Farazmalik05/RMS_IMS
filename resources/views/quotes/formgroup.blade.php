<!-- Form group -->
<div class="row justify-content-between mb-md-10">
    <div class="col-xxl-12 col-lg-12 col-md-12 col-12 border-bottom mb-5">
        <div class="form-check form-switch ml-2 mb-5">
            <input type="hidden" name="taxable" value="0" id="taxable">
            <input class="form-check-input" type="checkbox" role="switch" id="taxable" name="taxable" value="1" checked>
            <label class="form-check-label" for="taxable">{{ __('Taxable') }}</label>
        </div>
    </div>
    
    <div class="col-xxl-2 col-lg-3 col-md-12 col-12">
        <label class="form-label" for="quoteyear">{{ __('Year') }} <span class="text-danger">*</span></label>
        <select name="quoteyear" id="quoteyear" class="form-select">
            @php    
                $last= date('Y')-30;
                $now = date('Y');
            @endphp
            @for($i = $now; $i >= $last; $i--)
                <option value="{{ $i }}">{{ $i }}</option>
            @endfor
        </select>
    </div>

    <div class="col-xxl-6 col-lg-6 col-md-12 col-12 mt-4">
        <div class="row align-items-center mb-2">
            <div class="col-md-5">
                <label class="form-label" for="quote_number">{{ __('Quote#') }} <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group has-validation">
                    <span id="quote_year" name="quote_year" class="input-group-text" id="inputGroupPrepend" style="border-bottom-right-radius:0px;border-top-right-radius:0px;">Quote/RMS/{{ date('Y') }}/</span>
                    <input type="text" name="quote_number"  aria-describedby="inputGroupPrepend" value="{{ $quote_number }}" id="quote_number" class="form-control" placeholder="{{ __('Enter quote#') }}">
                </div>
            </div>
        </div>
        <div class="row align-items-center mb-2">
            <div class="col-md-5">
                <label class="form-label" for="quote_date">{{ __('Quote Date') }} <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
                    <input id="quote_date" name="quote_date" class="form-control flatpickr flatpickr-input" placeholder="" type="text" placeholder="{{ __('Enter imvoice date') }}" aria-describedby="date">
                    <span class="input-group-text text-muted" id="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-5">
                <label class="form-label" for="quote_duedate">{{ __('Due Date') }} <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
                    <input id="quote_duedate" name="quote_duedate" class="form-control flatpickr flatpickr-input" placeholder="" type="text" placeholder="{{ __('Enter imvoice due date') }}" aria-describedby="date">
                    <span class="input-group-text text-muted" id="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-md-10">
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="customer_name">{{ __('Name') }} <span class="text-danger">*</span></label>
        @if(isset($vehicle['customer_name']) && !empty($vehicle['customer_name']))
            <input disabled="disabled" type="text" name="customer_name" id="customer_name" class="form-control" value="{{ $vehicle['customer_name'] }}" placeholder="{{ __('Enter customer name') }}" {{ isset($vehicle->customer->name) ? "disabled" : '' }}>
            <input type="hidden" id="customer_id" name="customer_id" value="{{ $vehicle['customer_id'] }}" readonly>
        @else
            <input type="text" disabled="disabled" name="customer_name" id="customer_name" class="form-control" value="" placeholder="{{ __('Enter customer name') }}" {{ isset($vehicle->customer->name) ? "disabled" : '' }}>
            <input type="hidden" id="customer_id" name="customer_id" value="" readonly>
        @endif
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="phoneno">{{ __('Phone#') }} <span class="text-danger">*</span></label>
        @if(isset($vehicle['customer_phoneno']) && !empty($vehicle['customer_phoneno']))
            <input type="text" name="phoneno" id="phoneno" class="form-control" value="{{ $vehicle['customer_phoneno'] }}" placeholder="{{ __('Enter customer phone#') }}">
        @else
            <input type="text" name="phoneno" id="phoneno" class="form-control" value="" placeholder="{{ __('Enter customer phone#') }}">
        @endif
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="rego">{{ __('Rego#') }} <span class="text-danger">*</span></label>
        @if(isset($vehicle['rego']) && !empty($vehicle['rego']))
            <input type="text" name="rego" id="rego" class="form-control" value="{{ $vehicle['rego'] }}" maxlength="10" placeholder="{{ __('Enter rego#') }}">
            <input type="hidden" id="vehicle_id" name="vehicle_id" value="{{ $vehicle['vehicleid'] }}" readonly>
        @else
            <input type="text" name="rego" id="rego" class="form-control" value="" maxlength="10" placeholder="{{ __('Enter rego#') }}">
            <input type="hidden" id="vehicle_id" name="vehicle_id" value="" readonly>
        @endif
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="make">{{ __('Make') }} <span class="text-danger">*</span></label>
        @if(isset($vehicle['make']) && !empty($vehicle['make']))
            <input type="text" name="make" disabled="disabled" value="{{ $vehicle['make'] }}" id="make" class="form-control" placeholder="{{ __('Enter make of the vehicle') }}" autocomplete>
        @else
            <input type="text" name="make" disabled="disabled" value="" id="make" class="form-control" placeholder="{{ __('Enter make of the vehicle') }}" autocomplete>
        @endif
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="model">{{ __('Model') }} <span class="text-danger">*</span></label>
        @if(isset($vehicle['model']) && !empty($vehicle['model']))
            <input type="text" name="model" disabled="disabled" id="model" value="{{ $vehicle['model'] }}" class="form-control" placeholder="{{ __('Enter model of the vehicle') }}" autocomplete>
        @else
            <input type="text" name="model" disabled="disabled" id="model" value="" class="form-control" placeholder="{{ __('Enter model of the vehicle') }}" autocomplete>
        @endif
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="transmission">{{ __('Transmission') }} <span class="text-danger">*</span></label>
        <select name="transmission" disabled="disabled" id="transmission" class="form-select">
            @if(isset($vehicle['model']) && !empty($vehicle['model']))
                <option value="A" @if($vehicle['transmission'] == 'A') selected @endif>{{ __('Automatic') }}</option>
                <option value="M" @if($vehicle['transmission'] == 'M') selected @endif>{{ __('Manual') }}</option>
            @else
                <option value="A">{{ __('Automatic') }}</option>
                <option value="M">{{ __('Manual') }}</option>
            @endif
        </select>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="vin_no">{{ __('Vin#') }} <span class="text-danger">*</span></label>
        @if(isset($vehicle['vin_no']) && !empty($vehicle['vin_no']))
            <input type="text" name="vin_no" disabled="disabled" id="vin_no" value="{{ $vehicle['vin_no'] }}" class="form-control" placeholder="{{ __('Enter vin#') }}">
        @else
            <input type="text" name="vin_no" disabled="disabled" id="vin_no" value="" class="form-control" placeholder="{{ __('Enter vin#') }}">
        @endif
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="year">{{ __('Year') }} <span class="text-danger">*</span></label>
        <select name="year" id="year" disabled="disabled" class="form-select">
            @php    
                $last= date('Y')-30;
                $now = date('Y');
            @endphp
            @for($i = $now; $i >= $last; $i--)
                @if(isset($vehicle['year']) && !empty($vehicle['year']))
                    <option value="{{ $i }}" @if( $vehicle['year'] == $i ) selected @endif>{{ $i }}</option>
                @else
                    <option value="{{ $i }}" @if(isset($vehicle->year)) @if($vehicle->year == $i) selected @endif @endif>{{ $i }}</option>
                @endif
            @endfor
        </select>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="odometer">{{ __('Odometer') }} <span class="text-danger">*</span></label>
        <input type="number" name="odometer" id="odometer" value="" class="form-control" placeholder="{{ __('Enter odometer kms') }}">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="nextservicekms">{{ __('Next Service Kms') }}</label>
        <input type="number" name="nextservicekms" id="nextservicekms" value="" class="form-control" placeholder="{{ __('Enter next service kms') }}">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="nextservicedate">{{ __('Next Service Date') }}</label>
        <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
            <input type="text" name="nextservicedate" id="nextservicedate" value="" class="form-control flatpickr flatpickr-input" readonly placeholder="{{ __('Enter odometer date') }}" aria-describedby="date">
            <span class="input-group-text text-muted" id="date">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="quote_table" class="table text-nowrap table-bordered">
                <thead class="table-light ">
                    <tr>
                        <th style="width:65%;">Job Description</th>
                        <th style="text-align:center;width:10%;">Quantity</th>
                        <th style="text-align:center;width:10%;">Unit Price ($)</th>
                        <th style="text-align:center;width:10%;">Amount ($)</th>
                        <th style="text-align:right;width:5%;">
                            <button type="button" class="btn btn-primary btn-sm addmore">+</button>
                        </th>
                    </tr>
                </thead>
                <tbody id="quote_body">
                    <tr id="TRow1">
                        <td>
                            <input type="text" name="job[]" class="form-control mb-2 input job" placeholder="{{ __('Job name') }}">
                            <input type="hidden" name="job_id[]" class="job_id input">
                            <!-- <textarea rows="2" name="description[]" class="form-control input mb-2 description" placeholder="{{ __('Job description') }}"></textarea> -->
                            <!-- <div><button type="button" class="btn btn-primary btn-sm adddescription">+</button></div> -->
                        </td>
                        <td>
                            <input style="width:90px;" type="text" min="1" value="1.00" name="quantity[]" class="quantity form-control input">
                        </td>
                        <td>
                            <input style="width:100px;" type="text" class="form-control mb-2 input price" name="price[]">
                        </td>
                        <td>
                            <input style="width:100px;" type="text" class="form-control mb-2 input amount" name="total[]" readonly>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm delete">-</button>
                        </td>
                    </tr>                 
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="border-bottom-0"></td>
                        <td>
                            <strong>Total (incl. 10% Tax)</strong>
                        </td>
                        <td colspan="2"><strong>$</strong><strong id="total">0.00</strong></td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border-bottom-0" style="text-align:right;">
                            <strong>Amount Paid ($):</strong>
                        </td>
                        <td colspan="2">
                            <input class="form-control input" value="0.00" name="amtpaid" id="amtpaid">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="border-bottom-0" style="text-align:right;">
                            <strong>Amount Due ($):</strong>
                        </td>
                        <td colspan="2">
                            <input class="form-control input" value="0.00" name="amtdue" id="amtdue" readonly>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <label class="form-label" for="remarks">{{ __('Concerns/Recommendation') }}</label>
        <textarea name="remarks" id="remarks" class="form-control" rows="3" placeholder="{{ __('Enter concerns/recommendation') }}"></textarea>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <label class="form-label" for="jobdetails">{{ __('Job details') }}</label>
        <textarea name="jobdetails" id="jobdetails" class="form-control" rows="3"  placeholder="{{ __('Enter job details') }}"></textarea>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <div class="row">
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_fl">{{ __('Tyre F/L (mm)') }}</label>
                <input type="text" name="tire_fl" id="tire_fl" class="form-control" value="" placeholder="{{ __('Enter front left tye mm') }}">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_fr">{{ __('Tyre F/R (mm)') }}</label>
                <input type="text" name="tire_fr" id="tire_fr" class="form-control" value="" placeholder="{{ __('Enter front right tye mm') }}">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_rl">{{ __('Tyre R/L (mm)') }}</label>
                <input type="text" name="tire_rl" id="tire_rl" class="form-control" value="" placeholder="{{ __('Enter rear left tye mm') }}">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_rr">{{ __('Tyre R/R (mm)') }}</label>
                <input type="text" name="tire_rr" value="" id="tire_rr" class="form-control" placeholder="{{ __('Enter rear right tye mm') }}">
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <div class="row">
            <div class="col-6 mb-3">
                <label class="form-label" for="frontbrakepads">{{ __('Front brake pads (mm)') }}</label>
                <input type="text" name="frontbrakepads" id="frontbrakepads" class="form-control" value="" placeholder="{{ __('Enter front brake pads mm') }}">
            </div>
            <div class="col-6 mb-3">
                <label class="form-label" for="rearbrakepads">{{ __('Rear brake pads (mm)') }}</label>
                <input type="text" name="rearbrakepads" value="" id="rearbrakepads" class="form-control" placeholder="{{ __('Enter rear brake pads mm') }}">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="frontbrakepads">{{ __('Note') }}</label>
                <textarea name="notes" id="notes" rows="3" class="form-control" placeholder="{{ __('Enter any note you want to mention') }}"></textarea>
            </div>
        </div>
    </div>
</div>