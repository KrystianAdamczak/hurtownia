<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required',
            'surname' => 'required|alpha',
            'phone_number' => 'required|numeric',
            'address_id' => 'required',
            'email' => 'nullable|email',
            'NIP' => 'nullable|numeric|unique:users|digits_between:10,10',
        ];
    }
}
