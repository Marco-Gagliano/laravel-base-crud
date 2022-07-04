<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title' => 'required|min:4|max:75',
            'image' => 'required|min:10|max:255',
            'type' => 'required|min:4|max:30',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo "Titolo" è obbligatorio. Inserire i dati.',
            'title.min' => 'Il campo "Titolo" deve contenere come minino :min caratteri',
            'title.max' => 'Il campo "Titolo" deve contenere al massimo :max caratteri',

            'image.required' => 'Il campo "Immagine Copertina" è obbligatorio. Inserire i dati.',
            'image.min' => 'Il campo "Immagine Copertina" deve contenere come minino :min caratteri',
            'image.max' => 'Il campo "Immagine Copertina" deve contenere al massimo :max caratteri',

            'type.required' => 'Il campo "Tipo" è obbligatorio. Inserire i dati.',
            'type.min' => 'Il campo "Tipo" deve contenere come minino :min caratteri',
            'type.max' => 'Il campo "Tipo" deve contenere al massimo :max caratteri',
        ];
    }
}
