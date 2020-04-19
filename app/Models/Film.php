<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';

    protected $fillable = ['title', 'file'];

    public function words()
    {
        return $this->belongsToMany(Word::class, 'film_word', 'film_id', 'word_id');
    }
}
