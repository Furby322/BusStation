<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AuthorAddRequest extends FormRequest
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
                'FIO' => 'required|min:4|max:30',
                'dateB' => 'required|before:dateD',
                'dateD' => 'required'
            ];
    }

    public function messages()
    {
        return
            [
                'FIO.required' => 'Поле фамилия является обязательным',
                'FIO.min' => 'Поле фамилия должно содержать не менее 4-х символов',
                'FIO.max' => 'Поле фамилия должно содержать не более 30-и символов',
                'dateB.required' => 'Поле дата рождения является обязательным',
                'dateB.before' => 'Дата рождения должна быть меньше даты смерти',
                'dateD.required' => 'Поле дата рождения является обязательным',
            ];
    }
}
