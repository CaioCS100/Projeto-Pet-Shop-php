<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especie extends Model
{
    use SoftDeletes;

    protected $table = "especies";

    public function racas()
    {
        //return $this->hasMany('App\Model\Raca');
        return $this->hasMany(Raca::class);
    }
}
