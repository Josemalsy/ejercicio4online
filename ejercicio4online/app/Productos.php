<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
        protected $fillable = [
        'Isan',
        'titulo',
        'director',
		'guionista',
		'productor',
		'anyo'
    ];
}
