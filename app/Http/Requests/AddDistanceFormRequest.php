<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDistanceFormRequest extends FormRequest
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
            'value1' => 'required|numeric',
            'value2' => 'required|numeric',
            'unit1' => 'required|alpha_dash',
            'unit2' => 'required|alpha_dash',
            'return_unit' => 'required|alpha_dash'
        ];
    }
}
