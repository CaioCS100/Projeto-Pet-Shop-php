<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Raca extends Model
{
    use SoftDeletes;

    protected $table = "racas";

    public function especie()
    {
      //return $this->belongsTo('App\Model\Especie');
        return $this->belongsTO(Especie::class);
    }
}
