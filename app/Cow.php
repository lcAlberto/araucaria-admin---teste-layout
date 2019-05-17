<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cow extends Model
{
    protected $fillable = ['id_animals', 'status'];

    public function animals()
    {
        return $this->belongsTo(Animal::class, "id_animals");
    }
}
