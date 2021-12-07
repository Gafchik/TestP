<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNoteRequest extends FormRequest
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
    /*валидируем поля формы*/
    public function rules()
    {
        return [
            'theme'=>'required|min:2|max:30',
            'text'=>'required|min:10|max:300'
        ];
    }
    public  function  messages()
    {
        return [
            'theme.required'=>'Тема обязательно поле',
            'text.required'=>'Текаст обязательно поле',
            'theme.min'=>'Для Темы минимальное количество символов 2',
            'text.min'=>'Для Текста минимальное количество символов 10',
            'theme.max'=>'Для Темы максимальное количество символов 30',
            'text.max'=>'Для Текста максимальное количество символов 300'
        ];
    }
}
