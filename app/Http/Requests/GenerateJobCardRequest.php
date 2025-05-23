<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateJobCardRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'date'          =>  ['bail', 'required'],
            'customer_name' =>  ['bail', 'required', 'max:191'],
            'phoneno'       =>  ['bail', 'required', 'digits:10'],
            'rego'          =>  ['bail', 'required'],
            'address'       =>  ['bail', 'required'],
            'email'         =>  ['bail'],
            'make'          =>  ['bail', 'required'],
            'model'         =>  ['bail', 'required'],
            'transmission'  =>  ['bail', 'required'],
            'vin_no'        =>  ['bail', 'required'],
            'year'          =>  ['bail', 'required'],
            'colour'        =>  ['bail', 'required'],
            'odometer'      =>  ['bail'],
            'voucher_code'  =>  ['bail'],
            'jobcard_type'  =>  ['bail', 'required'],
            'is_logbook'    =>  ['bail'],
            'details'       =>  ['bail'],
        ];
    }

    public function messages()
    {
        return[
            'vehicle_id.required'   =>  'The rego field is required.',
            'phoneno.required'      =>  'The phone# field is required.',
            'phoneno.digits'        =>  'The phone# must be 10 digits.'
        ];
    }
}
