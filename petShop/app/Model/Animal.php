<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends Model
{
    use SoftDeletes;

    protected $table = 'animais';

    public function especies()
    {
        //return $this->hasMany('App\Model\Raca');
        return $this->hasMany(Especie::class);
    }

    public function racas()
    {
        return $this->hasMany('App\Model\Raca');
        //return $this->hasMany(Raca::class);
    }

    public function cliente()
    {
      //return $this->belongsTo('App\Model\Especie');
        return $this->hasOne(Proprietario::class);
    }
}
