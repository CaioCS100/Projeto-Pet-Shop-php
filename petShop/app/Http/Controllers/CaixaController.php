<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public function abrirCaixa()
    {

        return view('tela_Caixa');
    }
}
