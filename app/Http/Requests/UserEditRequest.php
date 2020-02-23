<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'last_name' => 'bail|required|alpha_dash|max:255',
            'first_name' => 'bail|required|alpha_dash|max:255',
            'middle_name' => 'bail|required|alpha_dash|max:255',
            'skype' => 'bail|required|string|max:255',
            'linkedin' => 'bail|required|string|max:255',
            'cv' => 'bail|required|string|max:255',
            'image' => 'bail|sometimes|image|max:10000',
//            'skills' => 'sometimes|array',
//            'skills.*' => 'bail|sometimes|exists:skills,id',
//            'projects' => 'sometimes|array',
//            'projects.*' => 'bail|required',
//            'educations' => 'sometimes|array',
//            'educations.*' => 'bail|required'

        ];
    }

    public function messages()
    {
        return [];

    }

    /**
     * Логика после валидации
     * @param $validator
     */
    public function withValidator($validator)
    {

    }
}
