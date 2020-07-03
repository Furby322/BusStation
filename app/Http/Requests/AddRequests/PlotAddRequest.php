<?php

namespace App\Http\Requests\AddRequests;

use Illuminate\Foundation\Http\FormRequest;

class PlotAddRequest extends FormRequest
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
                'name' => 'required',
                'name_manager' => 'required',
            ];
    }

    public function messages()
    {
        return
            [
                'name.required' => 'Поле название участка является обязательным',
                'name_manager.required' => 'Поле ФИО начальника участка является обязательным',
            ];
    }
}
