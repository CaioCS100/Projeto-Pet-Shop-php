<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    public function chamarTelaCadastroLogin(){

        return view('tela_Cadastro_Dono');
    }
}