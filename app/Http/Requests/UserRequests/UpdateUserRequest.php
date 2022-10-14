<?php

namespace App\Http\Requests\UserRequests;

use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    use PasswordValidationRules;
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
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'password' => ['nullable', 'confirmed'],
            'profile_photo_path' => ['image', 'max:2048'],
            'address' => ['nullable', 'string'],
            'roles' => ['string', 'max:255', 'in:USER,ADMIN'],
            'houseNumber' => ['nullable', 'string', 'max:255'],
            'phoneNumber' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
        ];
    }
}
