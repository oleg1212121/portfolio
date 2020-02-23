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

    public function getStartYAttribute()
    {
        return Carbon::parse($this->attributes['start'])->format('Y');
    }

    public function getEndYAttribute()
    {
        return Carbon::parse($this->attributes['end'])->format('Y');
    }
}
