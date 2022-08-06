<?php

namespace App\Http\Requests;

use App\Enums\ChitChatPreference;
use App\Enums\EmailPreference;
use App\Enums\IdentificationType;
use App\Enums\MusicPreference;
use App\Enums\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'password' => ['nullable' ,'min:6'],
            'first_name' => ['required'],
            'last_name' => ['required'],
//            'email' => ['required', 'email', Rule::unique('users')],
            'phone' => ['required', Rule::unique('users')],
            'address' => ['required'],
            'identification_type' => ['required', Rule::in(IdentificationType::getValues())],
            'identification_id' => ['required', 'min:6'],
            'identification_valid_from' => ['required'],
            'identification_valid_to' => ['required'],
            'email_preference' => ['nullable', Rule::in(EmailPreference::getValues())],
            'is_smoking_allowed' => ['nullable', 'boolean'],
            'is_pet_allowed' => ['nullable', 'boolean'],
            'music_preference' => ['nullable', Rule::in(MusicPreference::getValues())],
            'chitchat_preference' => ['nullable', Rule::in(ChitChatPreference::getValues())],

        ];
    }
}
