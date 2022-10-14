<?php

namespace App\Http\Requests\FoodRequests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFoodRequest extends FormRequest
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
            'name' => ['nullable', 'max:255'],
            'picturePath' => ['image'],
            'description' => [''],
            'ingredients' => [''],
            'price' => ['nullable', 'integer'],
            'rate' => ['nullable', 'numeric'],
            'types' => ['']
        ];
    }
}
