<?php

namespace App\Http\Requests;

use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ArticleRequest extends FormRequest
{
    /**
     * @var array Массив правил валидации (в зависимости от типа создаваемой/редактируемой новости)
     */
    protected $rulesForType = [];

    /**
     * @var array Массив сообщений ошибок валидации (в зависимости от типа создаваемой/редактируемой новости)
     */
    protected $messagesForType = [];

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
     * В зависимости от типа новости, добавляются свои правила валидации
     */
    protected function prepareForValidation()
    {
        $type = $this->request->get('type_id');
        if($type == Type::MAIN_TYPE){
            $main = new MainArticleRequest;
            $this->rulesForType = $main->rules();
            $this->messagesForType = $main->messages();
        }elseif($type == Type::COMMON_TYPE){
            $common = new CommonArticleRequest;
            $this->rulesForType = $common->rules();
            $this->messagesForType = $common->messages();
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge([
            'type_id' => 'required|integer|exists:types,id',
            'category_id' => 'required|integer|exists:categories,id',
        ], $this->rulesForType);
    }

    /**
     * @return array
     */
    public function messages()
    {
        return array_merge([
            'type_id.*' => 'Выберите корректный тип новости',
            'category_id.*' => 'Выберите корректную категорию новости',
        ],$this->messagesForType);
    }

    /**
     * Запись в лог ошибок валидации
     * @param $validator
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $errors = $validator->errors()->all();
            if (!empty($errors)) {
                foreach ($errors as $item) {
                    Log::channel('article_validation')->info('Ошибка: '.$item);
                }
            }
        });
    }

}
