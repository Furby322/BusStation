<?php

namespace App\Http\Requests\AddRequests;

use Illuminate\Foundation\Http\FormRequest;

class TransportationAddRequest extends FormRequest
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
                'type' => 'required',
            ];
    }

    public function messages()
    {
        return
            [
                'type.required' => 'Поле типа перевозки является обязательным'
            ];
    }
}
