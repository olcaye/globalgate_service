<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAgencyRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'name_abbrev' => ['required', 'string', 'min:3', 'max:5'],
            'phone' => ['required'],
            'address' => ['required', 'min:10', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:agencies'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}
