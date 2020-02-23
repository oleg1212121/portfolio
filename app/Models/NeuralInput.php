<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NeuralInput extends Model
{
    protected $table = 'neural_inputs';

    public $fillable = ['weight', 'name'];
}
