<?php

namespace App\Http\Requests\AddRequests;

use Illuminate\Foundation\Http\FormRequest;

class MileageAddRequest extends FormRequest
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
                'mileage' => 'required|numeric',
            ];
    }

    public function messages()
    {
        return
            [
                'mileage.required' => 'Поле пробег является обязательным',
                'mileage.numeric' => 'Поле пробег должно быть числовым',
            ];
    }
}
