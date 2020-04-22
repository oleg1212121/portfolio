<?php

namespace App\Models;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use Searchable;
    protected $table = 'words';
    protected $fillable = ['word','translate', 'status', 'rating'];
    protected $searchable = ['word'];
}
