<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateVehicleRequest extends FormRequest
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
            'customer_name'     =>  ['bail', 'sometimes', 'required', 'max:191'],
            'customer_id'       =>  ['bail', 'required'],
            'customer_phoneno'  =>  ['bail', 'sometimes', 'required', 'digits:10'],
            'rego'              =>  [
                'bail',
                'required',
                'max:10',
                //Rule::unique('vehicles')->ignore($this->vehicle)
            ],
            'make'              =>  ['bail', 'required', 'max:191'],
            'model'             =>  ['bail', 'required', 'max:191'],
            'colour'            =>  ['bail', 'max:191'],
            'vin_no'            =>  [
                'bail',
                'required',
                'max:17',
                //Rule::unique('vehicles')->ignore($this->vehicle)
            ],
            'transmission'      =>  ['bail', 'required', 'max:1'],
            'year'              =>  ['bail', 'required', 'digits:4'],
        ];
    }

    public function messages()
    {
        return [
            'customer_id.required'      =>  'The customer name field is required.',
            'rego.required'             =>  'The rego# field is required.',
            //'rego.unique'               =>  'The rego# has already been taken.',
            'customer_phoneno.required' =>  'The  customer phone# field is required.',
            'vin_no.required'           =>  'The vin# field is required.'
        ];
    }
}
