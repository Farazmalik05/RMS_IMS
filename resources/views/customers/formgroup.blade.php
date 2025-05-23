<!-- Form group -->
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
    <select name="title" id="title" class="form-select">
        <option value="Mr." @if(isset($customer->title)) @if($customer->title == 'Mr.') selected @endif @endif>{{ __('Mr.') }}</option>
        <option value="Ms." @if(isset($customer->title)) @if($customer->title == 'Ms.') selected @endif @endif>{{ __('Ms.') }}</option>
        <option value="Mrs." @if(isset($customer->title)) @if($customer->title == 'Mrs.') selected @endif @endif>{{ __('Mrs.') }}</option>
    </select>
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $customer->name ?? old('name') }}" placeholder="{{ __('Enter customer name') }}">
    @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="phoneno">{{ __('Phone#') }} <span class="text-danger">*</span></label>
    <input type="tel" name="phoneno" id="phoneno" class="form-control @error('phoneno') is-invalid @enderror" value="{{ $customer->phoneno ?? old('phoneno') }}" maxlength="10" placeholder="{{ __('Enter customer phone#') }}">
    @error('phoneno')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="altphoneno">{{ __('Alternate Phone#') }}</label>
    <input type="tel" name="altphoneno" value="{{ $customer->altphoneno ?? old('altphoneno') }}" id="altphoneno" class="form-control" placeholder="{{ __('Enter alternate phone#') }}">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="email">{{ __('Email') }}</label>
    <input type="email" name="email" id="email" value="{{ $customer->email ?? old('email') }}" class="form-control" placeholder="{{ __('Enter customer email') }}">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="comments">{{ __('Company name') }}</label>
    <input type="text" name="company_name" id="company_name" value="{{ $customer->company_name ?? old('company_name') }}" class="form-control" placeholder="{{ __('Enter company name') }}">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="abn">{{ __('ABN#') }}</label>
    <input type="number" name="abn" id="abn" value="{{ $customer->abn ?? old('abn') }}" class="form-control" placeholder="{{ __('Enter ABN#') }}">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="address">{{ __('Address') }}</label>
    <input type="text" name="address" id="address" value="{{ $customer->address ?? old('address') }}" class="form-control" placeholder="{{ __('Enter address') }}">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="suburb">{{ __('Suburb') }}</label>
    <input type="text" name="suburb" id="suburb" class="form-control" value="{{ $customer->suburb ?? old('suburb') }}" placeholder="{{ __('Enter suburb') }}">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="state">{{ __('State') }}</label>
    <select name="state" id="state" class="form-select">
        <option value=""> Select state </option>
        <option value="ACT" @if(isset($customer->state)) @if($customer->state == 'ACT') selected @endif @endif> ACT </option>
        <option value="NSW" @if(isset($customer->state)) @if($customer->state == 'NSW') selected @endif @endif> NSW </option>
        <option value="NT" @if(isset($customer->state)) @if($customer->state == 'NT') selected @endif @endif> NT </option>
        <option value="QLD" @if(isset($customer->state)) @if($customer->state == 'QLD') selected @endif @endif> QLD </option>
        <option value="SA" @if(isset($customer->state)) @if($customer->state == 'SA') selected @endif @endif> SA </option>
        <option value="TAS" @if(isset($customer->state)) @if($customer->state == 'TAS') selected @endif @endif> TAS </option>
        <option value="VIC" @if(isset($customer->state)) @if($customer->state == 'VIC') selected @endif @else selected @endif> VIC </option>
        <option value="WA" @if(isset($customer->state)) @if($customer->state == 'WA') selected @endif @endif> WA </option>
    </select>
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="postcode">{{ __('Postcode') }}</label>
    <input type="number" name="postcode" id="postcode" value="{{ $customer->postcode ?? old('postcode') }}" class="form-control" placeholder="{{ __('Enter postcode') }}">
</div>
<div class="mb-3 col-md-4 col-4">
    <label class="form-label" for="warn">{{ __('Warning') }}</label>
    <input type="text" name="warn" id="warn" value="{{ $customer->warn ?? old('warn') }}" class="form-control" placeholder="{{ __('Enter any warning') }}">
</div>