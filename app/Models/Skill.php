<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skill', 'skill_id', 'user_id');
    }
}
