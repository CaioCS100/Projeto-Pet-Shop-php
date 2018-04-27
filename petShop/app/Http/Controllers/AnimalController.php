<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function chamarTelaCadastroAnimal(){

        return view('tela_Cadastro_Animais');
    }
}
