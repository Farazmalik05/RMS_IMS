<!-- Form group -->
<div class="row"> @php //justify-content-end @endphp
    <div class="col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="date">{{ __('Date') }} <span class="text-danger">*</span></label>
        <div class="input-group me-3 flatpickr rounded flatpickr-input active" readonly="readonly">
            <input id="date" name="date" class="form-control flatpickr flatpickr-input" placeholder="" type="text" placeholder="{{ __('Enter imvoice date') }}" aria-describedby="date">
            <span class="input-group-text text-muted" id="date">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar icon-xxs"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            </span>
        </div>
        @error('date')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="customer_name">{{ __('Customer Name') }} <span class="text-danger">*</span></label>
        <input type="text" readonly="readonly" name="customer_name" id="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ old('customer_name') }}" placeholder="{{ __('Enter customer name') }}">
        @error('customer_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="hidden" id="customer_id" name="customer_id" value="{{ old('customer_id') }}" readonly>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="phoneno">{{ __('Phone#') }} <span class="text-danger">*</span></label>
        <input type="text" name="phoneno" id="phoneno" class="form-control @error('phoneno') is-invalid @enderror" value="{{ old('phoneno') }}" placeholder="{{ __('Enter customer phone#') }}" autocomplete="off">
        @error('phoneno')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="rego">{{ __('Rego#') }} <span class="text-danger">*</span></label>
        <input type="text" name="rego" id="rego" class="form-control @error('rego') is-invalid @enderror" value="{{ old('rego') }}" maxlength="10" placeholder="{{ __('Enter rego#') }}">
        @error('rego')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="hidden" id="vehicle_id" name="vehicle_id" value="" readonly>
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="address">{{ __('Address') }} <span class="text-danger">*</span></label>
        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="{{ __('Enter customer address') }}" readonly>
        @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="email">{{ __('Email') }}</label>
        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="{{ __('Enter customer email') }}" readonly>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="make">{{ __('Make') }} <span class="text-danger">*</span></label>
        <input type="text" name="make" readonly="readonly" value="{{ old('make') }}" id="make" class="form-control @error('make') is-invalid @enderror" placeholder="{{ __('Enter make of the vehicle') }}" autocomplete>
        @error('make')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="model">{{ __('Model') }} <span class="text-danger">*</span></label>
        <input type="text" name="model" readonly="readonly" id="model" value="{{ old('model') }}" class="form-control @error('model') is-invalid @enderror" placeholder="{{ __('Enter model of the vehicle') }}" autocomplete>
        @error('model')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="transmission">{{ __('Transmission') }} <span class="text-danger">*</span></label>
        <select name="transmission" readonly="readonly" id="transmission" class="form-select @error('transmission') is-invalid @enderror">
            <option value="A" @if(old('transmission') == 'A') selected @endif>{{ __('Automatic') }}</option>
            <option value="M" @if(old('transmission') == 'M') selected @endif>{{ __('Manual') }}</option>
        </select>
        @error('transmission')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="vin_no">{{ __('Vin#') }} <span class="text-danger">*</span></label>
        <input type="text" name="vin_no" readonly="readonly" id="vin_no" value="{{ old('vin_no') }}" class="form-control @error('vin_no') is-invalid @enderror" placeholder="{{ __('Enter vin#') }}">
        @error('vin_no')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="year">{{ __('Year') }} <span class="text-danger">*</span></label>
        <select name="year" id="year" readonly="readonly" class="form-select @error('year') is-invalid @enderror">
            @php    
                $last= date('Y')-30;
                $now = date('Y');
            @endphp
            @for($i = $now; $i >= $last; $i--)
                <option value="{{ $i }}" @if(old('year') == $i) selected @endif>{{ $i }}</option>
            @endfor
        </select>
        @error('year')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="colour">{{ __('Colour') }} <span class="text-danger">*</span></label>
        <input type="text" name="colour" id="colour" value="{{ old('colour') }}" class="form-control @error('colour') is-invalid @enderror" placeholder="{{ __('Enter colour') }}" readonly>
        @error('colour')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="odometer">{{ __('Odometer') }}</label>
        <input type="number" name="odometer" id="odometer" value="{{ old('odometer') }}" class="form-control @error('odometer') is-invalid @enderror" placeholder="{{ __('Enter odometer kms') }}">
        @error('odometer')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-xxl-3 col-lg-4 col-md-6 col-12 mb-3">
        <label class="form-label" for="voucher_code">{{ __('Voucher code') }}</label>
        <input type="text" name="voucher_code" id="voucher_code" value="{{ old('voucher_code') }}" class="form-control @error('voucher_code') is-invalid @enderror" placeholder="{{ __('Enter voucher code') }}">
        @error('voucher_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12 mb-3">
        <label class="form-label">{{ __('Jobcard type') }}</label>
    </div>
    <div class="col-12 mb-3">
        <div class="btn-group w-100" role="group" aria-label="Jobcard type">
            <input type="radio" class="btn-check" name="jobcard_type" id="groupon" value="groupon" autocomplete="off" @if(old('jobcard_type') == 'groupon') checked @endif checked>
            <label class="btn btn-outline-primary w-33" for="groupon" style="border-top-left-radius:0!important;border-bottom-left-radius:0!important;">Groupon</label>

            <input type="radio" class="btn-check" name="jobcard_type" id="minor_service" value="minor_service" autocomplete="off" @if(old('jobcard_type') == 'minor_service') checked @endif>
            <label class="btn btn-outline-primary w-33" for="minor_service">Minor service</label>

            <input type="radio" class="btn-check" name="jobcard_type" id="repairs" value="repairs" autocomplete="off" @if(old('jobcard_type') == 'repairs') checked @endif>
            <label class="btn btn-outline-primary w-33" for="repairs" style="border-top-right-radius:0!important;border-bottom-right-radius:0!important;">Repairs</label>
        </div>
    </div>
    <div class="col-12 mb-3">
        <label class="form-label" for="details">{{ __('Repair details') }}</label>
        <textarea name="details" id="details" class="form-control @error('details') is-invalid @enderror" placeholder="{{ __('Enter repair details') }}"></textarea>
        @error('details')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col-12" id="service_details">
        <div class="form-check form-switch  mb-2">
            <input type="hidden" name="is_logbook" value="0" id="is_logbook">
            <input class="form-check-input" type="checkbox" role="switch" name="is_logbook" id="is_logbook" value="1">
            <label class="form-check-label" for="is_logbook">Is it a logbook service</label>
        </div>
    </div>
</div>