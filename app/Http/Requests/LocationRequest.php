<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => 'required|string|max:100,unique:location_users,username,'.$this->id,
            'email' => 'required|email|max:100,unique:location_users,email,'.$this->id,
            'bio' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'date_of_birth' => 'required|date|date_format:Y-m-d',
        ];
    }
}
