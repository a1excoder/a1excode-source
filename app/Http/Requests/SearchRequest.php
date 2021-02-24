<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'search_query' => 'required|min:3|max:30'
        ];
    }

    public function messages()
    {
        return [
            'search_query.required' => 'Введите поисковой запрос',
            'search_query.min' => 'Минимальное количество строк в запросе: 3',
            'search_query.max' => 'Максимальное количество строк в запросе: 30'
        ];
    }
}
