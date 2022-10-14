<?php

namespace App\Http\Requests\FoodRequests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'picturePath' => ['image'],
            'description' => [''],
            'ingredients' => [''],
            'price' => ['required', 'integer'],
            'rate' => ['required', 'numeric'],
            'types' => ['']
        ];
    }
}
