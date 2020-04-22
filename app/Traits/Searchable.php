<?php

namespace App\Traits;

trait Searchable
{

    /**
     * Поиск совпадений строки по полям в БД ($this->getSearchableColumn)
     *
     * @param $query
     * @param string $word
     * @return mixed
     */
    public function scopeSearch($query, string $word = '')
    {
        return $query->where(function ($q) use ($word) {
            foreach ($this->getSearchableColumn() as $key => $item) {
                if ($key === 0) {
                    $q->where($item, 'like', $word . '%');
                } else {
                    $q->orWhere($item, 'like', $word . '%');
                }
            }
        });
    }

    /**
     * Возвращает массив полей модели для поиска
     *
     * @return array
     */
    protected function getSearchableColumn() :array
    {
        return $this->searchable ?? [];
    }
}