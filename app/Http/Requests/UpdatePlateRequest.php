<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlateRequest extends FormRequest
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
            'name' => 'required|min:5|max:150',
            'plate_image' => 'nullable|image|max:300',
            'restaurant_id' => 'nullable',
            'description' => 'nullable',
            'ingredients' => 'nullable',
            'price' => 'nullable',
            'visibility' => 'nullable',
            'type' => 'nullable'
        ];
    }
}