<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommonArticleRequest extends FormRequest
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
            'content' => 'required|string|max:19|min:1'
        ];
    }

    public function messages()
    {
        return [
            'content.*' => 'Для обычных новостей длина контента должна быть в пределах 1-19 символов'
        ];
    }
}
