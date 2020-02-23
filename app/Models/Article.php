<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['content', 'user_id', 'name'];



    /**
     * @return string
     */
    public function getDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d.m.Y');
    }
}
