<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobRequest extends FormRequest
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
            'name'              => ['bail', 'required'],
            'quantity'          => ['bail', 'required'],
            'rate'              => ['bail', 'required', 'numeric', 'min:0'],
            'has_description'   => ['nullable']
        ];
    }
}
