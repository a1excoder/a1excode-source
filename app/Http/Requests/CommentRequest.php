<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|min:5|max:60',
            'message' => 'required|min:8|max:200'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Введите имя!',
            'email.required' => 'Введите email!',
            'message.required' => 'Введите комментарий!',

            'name.min' => 'Минимальное количество строк в поле имя: 3',
            'email.min' => 'Минимальное количество строк в поле email: 5',
            'message.min' => 'Минимальное количество строк в поле сообщение: 8',

            'name.max' => 'Максимальное количество строк в поле имя: 20',
            'email.max' => 'Максимальное количество строк в поле email: 60',
            'message.max' => 'Максимальное количество строк в поле сообщение: 200',
        ];
    }
}
