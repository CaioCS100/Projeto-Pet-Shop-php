<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function chamarTelaCadastroAnimal(){

        return view('tela_Cadastro_Animais');
    }

    public function addNovoAnimal(Request $request)
    {
        $request -> validate([
            'nomeDono' => 'required',
            'nomeAnimal' => 'required',
            'sexo' => 'required',
            'data' => 'required',
            'peso' => 'required|numeric',
            'especie' => 'required',
            'raca' => 'required',
            'cor' => 'required',
            'imagem' => 'image'
            ]);

            $extesao = $request->imagem->extension();
            $nomeDaImagem = $request->cpf;

            $request->imagem->storeas('public', "$nomeDaImagem."."$extesao");
    }
}
