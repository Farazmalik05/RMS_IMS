<!-- Form group -->
<div class="mb-4 col-md-4 col-4">
    <label class="form-label" for="customer_name">{{ __('Customer Name') }} <span class="text-danger">*</span></label>
    @if(isset($vehicle['name']) && !empty($vehicle['name']))
        <input type="text" name="customer_name" id="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="@if(isset($vehicle['name']) && !empty($vehicle['name'])) {{ $vehicle['name'] }} @endif" placeholder="{{ __('Enter customer name') }}">
        <input type="hidden" id="customer_id" name="customer_id" value="@if(isset($vehicle['name']) && !empty($vehicle['id'])) {{ $vehicle['id'] }} @endif">
    @else
        <input type="text" name="customer_name" id="customer_name" class="form-control @error('customer_name') is-invalid @enderror" value="{{ $vehicle->customer->name ?? old('customer_name') }}" placeholder="{{ __('Enter customer name') }}">
        <input type="hidden" id="customer_id" name="customer_id" value="{{ $vehicle->customer->id ?? old('customer_id') }}">
    @endif
    @error('customer_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-4 col-md-4 col-4">
    <label class="form-label" for="customer_phoneno">{{ __('Customer Phone#') }} <span class="text-danger">*</span></label>
    @if(isset($vehicle['name']) && !empty($vehicle['name']))
        <input type="text" name="customer_phoneno" id="customer_phoneno" class="form-control @error('customer_phoneno') is-invalid @enderror" value="@if(isset($vehicle['phoneno']) && !empty($vehicle['phoneno'])) {{ $vehicle['phoneno'] }} @endif {{ $vehicle->customer->phoneno ?? old('customer_phoneno') }}" placeholder="{{ __('Enter customer phone#') }}">    
    @else
        <input type="text" name="customer_phoneno" id="customer_phoneno" class="form-control @error('customer_phoneno') is-invalid @enderror" value="{{ $vehicle->customer->phoneno ?? old('customer_phoneno') }}" placeholder="{{ __('Enter customer phone#') }}">
    @endif
    @error('customer_phoneno')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="rego">{{ __('Rego#') }} <span class="text-danger">*</span></label>
    <input type="text" name="rego" id="rego" class="form-control @error('rego') is-invalid @enderror" value="{{ $vehicle->rego ?? old('rego') }}" maxlength="10" placeholder="{{ __('Enter rego#') }}">
    @error('rego')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="make">{{ __('Make') }} <span class="text-danger">*</span></label>
    <input type="text" name="make" value="{{ $vehicle->make ?? old('make') }}" id="make" class="form-control @error('make') is-invalid @enderror" placeholder="{{ __('Enter make of the vehicle') }}" autocomplete>
    @error('make')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="model">{{ __('Model') }} <span class="text-danger">*</span></label>
    <input type="text" name="model" id="model" value="{{ $vehicle->model ?? old('model') }}" class="form-control @error('model') is-invalid @enderror" placeholder="{{ __('Enter model of the vehicle') }}" autocomplete>
    @error('model')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="colour">{{ __('Colour') }}</label>
    <input type="text" name="colour" id="colour" value="{{ $vehicle->colour ?? old('colour') }}" class="form-control" placeholder="{{ __('Enter colour of the vehicle') }}">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="vin_no">{{ __('Vin#') }} <span class="text-danger">*</span></label>
    <input type="text" name="vin_no" id="vin_no" value="{{ $vehicle->vin_no ?? old('vin_no') }}" class="form-control @error('vin_no') is-invalid @enderror" placeholder="{{ __('Enter vin#') }}">
    @error('vin_no')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="transmission">{{ __('Transmission') }} <span class="text-danger">*</span></label>
    <select name="transmission" id="transmission" class="form-select @error('transmission') is-invalid @enderror">
        <option value="A" @if(isset($vehicle->transmission)) @if($vehicle->transmission == 'A') selected @endif @endif>{{ __('Automatic') }}</option>
        <option value="M" @if(isset($vehicle->transmission)) @if($vehicle->transmission == 'M') selected @endif @endif>{{ __('Manual') }}</option>
    </select>
    @error('transmission')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="year">{{ __('Year') }} <span class="text-danger">*</span></label>
    <select name="year" id="year" class="form-select @error('year') is-invalid @enderror">
        @php    
            $last= date('Y')-50;
            $now = date('Y');
        @endphp
        @for($i = $now; $i >= $last; $i--)
            <option value="{{ $i }}" @if(isset($vehicle->year)) @if($vehicle->year == $i) selected @endif @endif>{{ $i }}</option>
        @endfor
    </select>
    @error('year')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>