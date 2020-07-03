<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksAddRequest extends FormRequest
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
        return
            [
                'NameBook' => 'required',
                'yearW' => 'required|numeric|between:1901,2020'
            ];
    }

    public function messages()
    {
        return
            [
                'NameBook.required' => 'Поле название книги является обязательным',
                'yearW.required' => 'Поле год написания является обязательным',
                'yearW.between' => 'Год написания должен быть в диапазоне 1901-2020'
            ];
    }
}
