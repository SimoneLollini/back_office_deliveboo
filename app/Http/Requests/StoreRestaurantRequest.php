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
            'name' => 'required|name|max:100',
            'phone' => 'required|phone|max:12',
            'piva' => 'required|piva|max:12',
            'address' => 'required',
            'user_id' => 'required|unique:restaurant',
        ];
    }
}
