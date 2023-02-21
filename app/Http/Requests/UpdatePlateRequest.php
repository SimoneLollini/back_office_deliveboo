<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'price' => 'nullable|numeric|min:0|not_in:0',
            'visibility' => 'nullable',
            'type' => 'nullable'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Attenzione! Inserisci un nome per il tuo piatto.',
            'name.min' => 'Il nome deve essere lungo almeno 5 caratteri',
            'name.max' => 'Hai superato il numero massimo di caratteri (150)',
            'price.min' => 'Inserisci un numero maggiore di 0 $',
            'plate_image.max' => 'L\'immagine è troppo pesante, utilizzane una al di sotto dei 300KB',
            'type.required' => 'Inserisci una portata dall\' elenco'
        ];
    }
}
