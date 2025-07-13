<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuoteRequest extends FormRequest
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
            'quote_number'      => ['bail', 'required', 'sometimes'],
            'quoteyear'         => ['bail'],
            'quote_date'        => ['bail', 'required', 'sometimes'],
            'quote_duedate'     => ['bail', 'required', 'sometimes'],
            'taxable'           => ['bail', 'required'],
            'customer_id'       => ['bail', 'required'],
            'phoneno'           => ['bail', 'required'],
            'rego'              => ['bail', 'required'],
            'vehicle_id'        => ['bail', 'required'],
            'odometer'          => ['bail', 'required'],
            'nextservicekms'    => ['bail'],
            'nextservicedate'   => ['bail'],
            'job.*'             => ['bail', 'required'],
            'job_id.*'          => ['bail'],
            'jobtype.*'         => ['bail', 'required'],
            'quantity.*'        => ['bail', 'required', 'numeric', 'min:0', 'not_in:0'],
            'total.*'           => ['bail', 'required', 'numeric'],
            'price.*'           => ['bail', 'required', 'numeric'],
            'remarks'           => ['bail'],
            'jobdetails'        => ['bail'],
            'notes'             => ['bail'],
            'tire_fl'           => ['bail'],
            'tire_fr'           => ['bail'],
            'tire_rl'           => ['bail'],
            'tire_rr'           => ['bail'],
            'frontbrakepads'    => ['bail'],
            'rearbrakepads'     => ['bail'],
            'amtdue'            => ['bail']
        ];
    }

    public function messages()
    {
        return[
            'customer_id.required'  =>  'The customer name field is required.',
            'phoneno.required'      =>  'The phone number field is required.',
            'job.*.required'        =>  'The job name is required.',
            'quantity.*.required'   =>  'The job quantity is required.',
            'price.*.required'      =>  'The job unit price is required.',
            'total.*.required'      =>  'The job amount is required.',
        ];
    }
}
