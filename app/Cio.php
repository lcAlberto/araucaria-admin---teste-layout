<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cio extends Model
{
    protected $fillable = [
        'id',
        'id_animals',
        'dt_cio',
        'dt_cobertura',
        'dt_parto_previsto',
        'dt_parto',
        'tipo',
        'status',
    ];
}
