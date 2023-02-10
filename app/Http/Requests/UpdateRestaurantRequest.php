<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRestaurantRequest extends FormRequest
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
            'types' => 'required|exists:types,id',
            'phone' => 'required|min:10|max:12',
            'piva' => ['required', Rule::unique('restaurants')->ignore($this->restaurant->id), 'digits:11'],
            'address' => 'required',
            'user_id' => 'unique:restaurant',
            'restaurant_image' => 'image|max:512'
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
            'name.required' => 'Attenzione! Inserisci un nome per il tuo ristorante.',
            'name.max' => 'Hai superato il numero massimo di caratteri (100).',
            'types.required' => 'Attenzione! Inserisci la tipologia del tuo ristorante.',
            'phone.required' => 'Attenzione! Inserisci il numero di telefono del tuo ristorante.',
            'phone.min' => 'Il numero inserito deve avere almeno 10 cifre.',
            'phone.max' => 'Il numero inserito non deve avere più di 12 cifre.',
            'piva.required' => 'Attenzione! Inserisci la partita IVA.',
            'piva.unique' => 'Attenzione! Questa partita IVA è già stata utilizzata.',
            'piva.digits' => 'Attenzione! La partita IVA deve essere formata da 11 cifre.',
            'address.required' => 'Attenzione! Inserisci un indirizzo per il tuo ristorante.',
            'restaurant_image.max' => 'L\'immagine è troppo pesante, utilizzane una al di sotto dei 512KB.',
            'restaurant_image.required' => 'Attenzione! Inserisci un\'immagine.'
        ];
    }

}
