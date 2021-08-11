<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WordRequest extends FormRequest
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
            'tj_word'=> 'required|unique:App\Models\Words,tajik',
            'en_word'=> 'required|unique:App\Models\Words,english',
        ];
    }
    public function messages()
    {   
        return[
            'tj_word.unique'=> 'Уже есть такое таджикское слово в базе',
            'en_word.unique'=> 'Уже есть такое английское слово в базе',
            'tj_word.required'=> 'Поле не должен быть пустым',
            'en_word.required'=> 'Поле не должен быть пустым',
        ];
    }
}
