<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class ContactRequest extends FormRequest
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
            'name' => 'required|min:4|max:30',
            'email' => 'required|email',
            'age' => 'required|numeric|min:18|max:100',
            'date' => 'required|before:'.Carbon::now(),
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return
        [
            'name.required' => 'Поле имя является обязательным',
            'name.min' => 'Поле имя должно содержать не менее 4-х символов',
            'name.max' => 'Поле имя должно содержать не более 30-и символов',
            'email.required' => 'Поле email является обязательным',
            'email.email' => 'Поле email должно соответсвовать email-формату',
            'age.required' => 'Введите ваш возраст',
            'age.numeric' => 'Введите числом',
            'age.min' => 'Для составления отзыва вы должны быть старше 18 лет',
            'age.max' => 'Для составления отзыва вы должны быть младше 101 года',
            'date.required' => 'Дата посещения не выбрана',
            'date.before' => 'Вы не можете поставить дату, позже сегодняшней('.Carbon::now().')',
            'message.required' => 'Вы забыли оставить отзыв'
        ];
    }

}
