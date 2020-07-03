<?php

namespace App\Http\Requests\AddRequests;

use Illuminate\Foundation\Http\FormRequest;

class RouteAddRequest extends FormRequest
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
                'number_rout' => 'required|numeric',
            ];
    }

    public function messages()
    {
        return
            [
                'number_rout.required' => 'Поле номер маршрута является обязательным',
                'number_rout.numeric' => 'Поле номер маршрута должно быть числовым',
            ];
    }
}
