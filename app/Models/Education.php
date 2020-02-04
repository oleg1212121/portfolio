<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','desc','institute', 'start','end', 'user_id'
    ];

    protected $table = 'educations';

    public function getStartAttribute($value)
    {
        return Carbon::parse($value)->format('Y');
    }

    public function getEndAttribute($value)
    {
        return Carbon::parse($value)->format('Y');
    }
}
