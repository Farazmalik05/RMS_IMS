<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'title'         =>  ['bail', 'required', 'max:191'],
            'name'          =>  ['bail', 'required', 'max:191'],
            'phoneno'       =>  ['bail', 'required', 'digits:10', 'unique:customers'],
            'altphoneno'    =>  ['bail', 'nullable', 'digits:10', 'unique:customers'],
            'abn'           =>  ['bail', 'nullable', 'digits:11', 'unique:customers'],
            'address'       =>  ['nullable', 'max:191'],
            'suburb'        =>  ['nullable', 'max:191'],
            'state'         =>  ['nullable', 'max:50'],
            'postcode'      =>  ['nullable', 'digits:4'],
            'email'         =>  ['bail', 'nullable', 'email', 'max:191', 'unique:customers'],
            'company_name'  =>  ['nullable', 'max:191'],
            'warn'          =>  ['nullable', 'max:191'],
        ];
    }

    public function messages()
    {
        return [
            'phoneno.required'  =>  'The phone# field is required.',
        ];
    }
}
