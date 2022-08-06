<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RideRequest extends FormRequest
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
            'car_id' => ['required', 'integer'],
            'travel_start_time' => ['required'],
            'origin_address' => ['required', 'string'],
            'destination_address' => ['required', 'string'],
            'seats_available' => ['required', 'integer'],
            'price_total' => ['required', 'numeric'],
        ];
    }
}
