<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLicenseRequest extends FormRequest
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
            'drivers_license_photo' => ['required'],
            'driving_license_number' => ['required'],
            'driving_license_valid_from' => ['required'],
            'driving_license_valid_to' => ['required'],
            //
        ];
    }
}
