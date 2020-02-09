<?php

namespace App\Http\Requests;

use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

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
            'type_id' => 'required|integer|exists:types,id',
            'category_id' => 'required|integer|exists:categories,id',
            'content' => 'required|string|max:9999'
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'type_id.*' => 'Выберите корректный тип новости',
            'category_id.*' => 'Выберите корректную категорию новости',
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
