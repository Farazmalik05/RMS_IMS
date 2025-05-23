<!-- Form group -->
<div class="row justify-content-between mb-md-10">
    <div class="col-xxl-12 col-lg-12 col-md-12 col-12 border-bottom mb-5">
        <div class="form-check form-switch ml-2 mb-5">
            <input type="hidden" name="taxable" value="0" id="taxable">
            <input class="form-check-input" type="checkbox" role="switch" id="taxable" name="taxable" value="1" @if($invoice->taxable) checked @endif>
            <label class="form-check-label" for="taxable">{{ __('Taxable') }}</label>
        </div>
    </div>
    
    <div class="col-xxl-2 col-lg-3 col-md-12 col-12">
        <label class="form-label" for="invoiceyear">{{ __('Year') }} <span class="text-danger">*</span></label>
        <select name="invoiceyear" id="invoiceyear" class="form-select" disabled>
            @php    
                $last= date('Y')-30;
                $now = date('Y');
            @endphp
            @for($i = $now; $i >= $last; $i--)
                <option value="{{ $i }}" @if(date("Y", strtotime($invoice->quote_date)) == $i) selected @endif>{{ $i }}</option>
            @endfor
        </select>
    </div>

    <div class="col-xxl-6 col-lg-6 col-md-12 col-12 mt-4">
        <div class="row align-items-center mb-2">
            <div class="col-md-5">
                <label class="form-label" for="invoice_number">{{ __('Invoice#') }} <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group has-validation">
                    <span id="invoice_year" name="invoice_year" class="input-group-text" id="inputGroupPrepend" style="border-bottom-right-radius:0px;border-top-right-radius:0px;">Invoice/RMS/{{ date('Y', strtotime($invoice->quote_date)) }}/</span>
                    <input type="text" disabled name="invoice_number"  aria-describedby="inputGroupPrepend" value="{{ sprintf('%02d', $invoice->quote_number) }}" id="invoice_number" class="form-control" placeholder="{{ __('Enter invoice#') }}">
                </div>
            </div>
        </div>
        <div class="row align-items-center mb-2">
            <div class="col-md-5">
                <label class="form-label" for="invoice_date">{{ __('Invoice Date') }} <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
                    <input id="invoice_date" disabled name="invoice_date" class="form-control flatpickr flatpickr-input" placeholder="" type="text" placeholder="{{ __('Enter imvoice date') }}" aria-describedby="date">
                    <span class="input-group-text text-muted" id="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                    </span>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-5">
                <label class="form-label" for="invoice_duedate">{{ __('Due Date') }} <span class="text-danger">*</span></label>
            </div>
            <div class="col-md-7">
                <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
                    <input id="invoice_duedate" disabled name="invoice_duedate" class="form-control flatpickr flatpickr-input" placeholder="" type="text" placeholder="{{ __('Enter imvoice due date') }}" aria-describedby="date">
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
            <input type="text" disabled="disabled" name="customer_name" id="customer_name" class="form-control" value="{{ $invoice->vehicle->customer->name }}" placeholder="{{ __('Enter customer name') }}" {{ isset($vehicle->customer->name) ? "disabled" : '' }}>
            <input type="hidden" id="customer_id" name="customer_id" value="{{ $invoice->vehicle->customer->id }}" readonly>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="phoneno">{{ __('Phone#') }} <span class="text-danger">*</span></label>
            <input type="text" name="phoneno" id="phoneno" class="form-control" value="{{ $invoice->vehicle->customer->phoneno }}" placeholder="{{ __('Enter customer phone#') }}">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="rego">{{ __('Rego#') }} <span class="text-danger">*</span></label>
            <input type="text" name="rego" id="rego" class="form-control" value="{{ $invoice->vehicle->rego }}" maxlength="10" placeholder="{{ __('Enter rego#') }}">
            <input type="hidden" id="vehicle_id" name="vehicle_id" value="{{ $invoice->vehicle->id }}" readonly>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="make">{{ __('Make') }} <span class="text-danger">*</span></label>
            <input type="text" name="make" disabled="disabled" value="{{ $invoice->vehicle->make }}" id="make" class="form-control" placeholder="{{ __('Enter make of the vehicle') }}" autocomplete>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="model">{{ __('Model') }} <span class="text-danger">*</span></label>
        <input type="text" name="model" disabled="disabled" id="model" value="{{ $invoice->vehicle->model }}" class="form-control" placeholder="{{ __('Enter model of the vehicle') }}" autocomplete>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="transmission">{{ __('Transmission') }} <span class="text-danger">*</span></label>
        <select name="transmission" disabled="disabled" id="transmission" class="form-select">
            <option value="A" @if($invoice->vehicle->transmission == 'A') selected @endif>{{ __('Automatic') }}</option>
            <option value="M" @if($invoice->vehicle->transmission == 'M') selected @endif>{{ __('Manual') }}</option>
        </select>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="vin_no">{{ __('Vin#') }} <span class="text-danger">*</span></label>
            <input type="text" name="vin_no" disabled="disabled" id="vin_no" value="{{ $invoice->vehicle->vin_no }}" class="form-control" placeholder="{{ __('Enter vin#') }}">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="year">{{ __('Year') }} <span class="text-danger">*</span></label>
        <select name="year" id="year" disabled="disabled" class="form-select">
            @php    
                $last= date('Y')-30;
                $now = date('Y');
            @endphp
            @for($i = $now; $i >= $last; $i--)
                <option value="{{ $i }}" @if($invoice->vehicle->year == $i) selected @endif>{{ $i }}</option>
            @endfor
        </select>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="odometer">{{ __('Odometer') }} <span class="text-danger">*</span></label>
        <input type="number" name="odometer" id="odometer" value="{{ $invoice->odometer }}" class="form-control" placeholder="{{ __('Enter odometer kms') }}">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="nextservicekms">{{ __('Next Service Kms') }}</label>
        <input type="number" name="nextservicekms" id="nextservicekms" value="{{ $invoice->nextservicekms }}" class="form-control" placeholder="{{ __('Enter next service kms') }}">
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="nextservicedate">{{ __('Next Service Date') }}</label>
        <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
            <input type="text" name="nextservicedate" id="nextservicedate" value="{{ $invoice->nextservicedate }}" class="form-control flatpickr flatpickr-input" readonly placeholder="{{ __('Enter odometer date') }}" aria-describedby="date">
            <span class="input-group-text text-muted" id="date">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="table-responsive">
            <table id="invoice_table" class="table text-nowrap table-bordered">
                <thead class="table-light ">
                    <tr>
                        <th scope="col" style="">Job Description</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Unit Price ($)</th>
                        <th scope="col">Amount ($)</th>
                    </tr>
                </thead>
                <tbody id="invoice_body">
                    @php
                        $sub_total = 0;
                    @endphp
                    @foreach($invoice->jobs as $job)
                    <tr id="TRow1">
                        <td class="w-75">
                            <input type="text" name="job[]" class="form-control mb-2 input job" value="{{ $job->name }}">
                            <input type="hidden" name="job_id[]" class="job_id input" value="{{ $job->id }}">
                            @if($job['has_description'])
                                @php 
                                    $description = '';
                                @endphp
                                @foreach($job->descriptions as $desc)
                                    @php $description .= $desc['description']."\n"; @endphp
                                @endforeach                                    
                                <textarea rows="10" name="description[]" class="form-control input mb-2 description">{{ $description }}</textarea>
                            @endif
                        </td>
                        <td>
                            <input type="number" step="1" min="1" name="quantity[]" class="quantity form-control input" value="{{ $job->pivot->quantity }}">
                        </td>
                        <td class="w-10">
                            <input type="number" class="form-control mb-2 input price" name="price[]" value="{{ number_format((float)$job->pivot->rate, 2, '.', '') }}">
                            @php
                                $sub_total += ($job->pivot->quantity * $job->pivot->rate);
                            @endphp
                        </td>
                        <td class="w-15">
                            <input type="number" class="form-control mb-2 input amount" name="total[]" readonly value="{{ number_format((float)$job->pivot->quantity * $job->pivot->rate, 2, '.', '') }}">
                        </td>
                    </tr>
                    @endforeach              
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="border-bottom-0"></td>
                        <td>
                            <strong>
                                @if($invoice->taxable)
                                    Total (incl. 10% Tax)
                                @else
                                    Total (excl. 10% Tax)
                                @endif
                            </strong>
                        </td>
                        <td>
                            <span class="text-dark" id="total">
                                <strong>${{ number_format((float)$sub_total, 2, '.', '') }}</strong>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="border-bottom-0"></td>
                        <td><strong>Amount Due:</strong></td>
                        <td>
                            <strong>${{ number_format((float)$invoice->amtdue, 2, '.', '') }}</strong>
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
        <textarea name="remarks" id="remarks" class="form-control" rows="3" placeholder="{{ __('Enter concerns/recommendation') }}">{{ $invoice->remarks }}</textarea>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <label class="form-label" for="jobdetails">{{ __('Job details') }}</label>
        <textarea name="jobdetails" id="jobdetails" class="form-control" rows="3"  placeholder="{{ __('Enter job details') }}">{{ $invoice->jobdetails }}</textarea>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <div class="row">
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_fl">{{ __('Tyre F/L (mm)') }}</label>
                <input type="text" name="tire_fl" id="tire_fl" class="form-control" value="{{ $invoice->tire_fl }}" placeholder="{{ __('Enter front left tye mm') }}">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_fr">{{ __('Tyre F/R (mm)') }}</label>
                <input type="text" name="tire_fr" id="tire_fr" class="form-control" value="{{ $invoice->tire_fr }}" placeholder="{{ __('Enter front right tye mm') }}">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_rl">{{ __('Tyre R/L (mm)') }}</label>
                <input type="text" name="tire_rl" id="tire_rl" class="form-control" value="{{ $invoice->tire_rl }}" placeholder="{{ __('Enter rear left tye mm') }}">
            </div>
            <div class="col-xxl-3 col-6 mb-3">
                <label class="form-label" for="tire_rr">{{ __('Tyre R/R (mm)') }}</label>
                <input type="text" name="tire_rr" value="{{ $invoice->tire_rr }}" id="tire_rr" class="form-control" placeholder="{{ __('Enter rear right tye mm') }}">
            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-lg-6 col-md-6 col-12 mb-3">
        <div class="row">
            <div class="col-6 mb-3">
                <label class="form-label" for="frontbrakepads">{{ __('Front brake pads (mm)') }}</label>
                <input type="text" name="frontbrakepads" id="frontbrakepads" class="form-control" value="{{ $invoice->frontbrakepads }}" placeholder="{{ __('Enter front brake pads mm') }}">
            </div>
            <div class="col-6 mb-3">
                <label class="form-label" for="rearbrakepads">{{ __('Rear brake pads (mm)') }}</label>
                <input type="text" name="rearbrakepads" value="{{ $invoice->rearbrakepads }}" id="rearbrakepads" class="form-control" placeholder="{{ __('Enter rear brake pads mm') }}">
            </div>
            <div class="col-12 mb-3">
                <label class="form-label" for="frontbrakepads">{{ __('Note') }}</label>
                <textarea name="notes" id="notes" rows="3" class="form-control" placeholder="{{ __('Enter any note you want to mention') }}">{{ $invoice->notes }}</textarea>
            </div>
        </div>
    </div>
</div>