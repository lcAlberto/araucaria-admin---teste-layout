<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $fillable = [
        'id',
        'nome',
        'dt_nascimento',
        'sexo',
        'classificacao',
        'raca',
        'status',
        'profile',
        'mother',
        'father'
    ];

    public function bulls()
    {
        return $this->belongsToMany(Bull::class, "id_bulls");
    }

    public function cows()
    {
        return $this->belongsToMany(cow::class, "id_bulls");
    }

    public function search(Array $data)
    {
        $animals = $this->where(function ($query) use ($data) {
            if (isset($data['nome'])) ;
            $query->where('nome', 'like', '%' . $data['nome'] . '%');
        });
        return $animals->get();
    }
}
