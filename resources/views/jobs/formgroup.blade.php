<!-- Form group -->
<div class="mb-3 col-md-12 col-12">
    <label class="form-label" for="name">{{ __('Name') }} <span class="text-danger">*</span></label>
    <input type="text" name="name" id="name" class="form-control" value="{{ $job->name ?? old('name') }}" placeholder="{{ __('Enter job name') }}">
</div>
<div class="mb-3 col-md-6 col-6">
    <label class="form-label" for="quantity">{{ __('Default quantity') }} <span class="text-danger">*</span></label>
    <input type="text" name="quantity" id="quantity" class="form-control" value="{{ $job->quantity ?? old('quantity') }}" placeholder="{{ __('Enter default quantity') }}">
</div>
<div class="mb-3 col-md-6 col-6">
    <label class="form-label" for="rate">{{ __('Default rate') }} <span class="text-danger">*</span></label>
    <div class="input-group has-validation">
        <span class="input-group-text" id="inputGroupPrepend" style="border-bottom-right-radius:0px;border-top-right-radius:0px;">$</span>
        <input type="text" name="rate"  aria-describedby="inputGroupPrepend" value="{{ $job->rate ?? old('rate') }}" id="rate" class="form-control" placeholder="{{ __('Enter default rate') }}">
    </div>
</div>
<div class="form-check form-switch ml-2 mb-2">
    <input type="hidden" name="has_description" value="0" id="has_description">
    <input class="form-check-input" type="checkbox" role="switch" id="has_description" name="has_description" value="1" @if(isset($job->has_description)) @if(!empty($job->has_description)) checked @endif @endif>
    <label class="form-check-label" for="has_description">{{ __('Description') }}</label>
</div>