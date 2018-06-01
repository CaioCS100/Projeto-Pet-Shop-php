<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Especie;

class EspecieController extends Controller
{
    public function showAllEspecies()
    {
        $especie = Especie::all();
        
    }
}
