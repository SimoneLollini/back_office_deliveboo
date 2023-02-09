<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRestaurantRequest extends FormRequest
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
            'name' => 'required|max:100',
            'type_id' => 'required',
            'phone' => 'required|min:10|max:12',
            'piva' => 'required|unique:restaurants,piva|digits:11',
            'address' => 'required',
            'user_id' => 'unique:restaurant',
            'restaurant_image' => 'required|image|max:512'
        ];
    }
}
