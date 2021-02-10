<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
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
            'country' => 'required',
            'voivodeship' => 'required|regex:/^[\pL\s\-]+$/u',
            'county' => 'required|regex:/^[\pL\s\-]+$/u',
            'community' => 'required|regex:/^[\pL\s\-]+$/u',
            'street' => 'nullable|regex:/^[\pL\s\-]+$/u',
            'house_number' => 'required|numeric',
            'apartment_number' => 'nullable|numeric',
            'city' => 'required|regex:/^[\pL\s\-]+$/u',
            'postal_code' => 'required|string',
        ];
    }
}
