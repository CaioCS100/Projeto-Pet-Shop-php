<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proprietario extends Model
{
    use SoftDeletes;
    
    protected $table = 'clientes';

    public function animais()
    {
        //return $this->hasMany('App\Model\Raca');
        return $this->hasMany(Animal::class);
    }
}
