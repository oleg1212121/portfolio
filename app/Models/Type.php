<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];

    /**
     * @var int Константы типов
     */
    const WEATHER_TYPE = 1;
    const MAIN_TYPE = 2;
    const COMMON_TYPE = 3;
    const RESULT_TYPE = 4;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
