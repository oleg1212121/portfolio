<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
     * Подготовка данных перед валидацией
     */
    protected function prepareForValidation()
    {

    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|string|max:9999',
            'name' => 'required|string|max:255',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'content.*' => 'Текст заметки не должен превышать 9999 символов',
        ];
    }

    /**
     * Логика после валидации
     * @param $validator
     */
    public function withValidator($validator)
    {

    }

}
