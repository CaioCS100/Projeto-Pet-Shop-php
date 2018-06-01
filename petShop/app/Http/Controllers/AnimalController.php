<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Proprietario;
use App\Model\Especie;
use App\Model\Raca;

class AnimalController extends Controller
{
    public function chamarTelaCadastroAnimal(){

        $cliente = Proprietario::all();
        $especies = Especie::where('id','>','1')->get();

       return view('tela_Cadastro_Animais',['cliente'=>$cliente],['especie'=>$especies]);

    //    foreach ($especies as $especie)
    //    {
    //     foreach ($especie->racas as $raca)
    //     {
    //         echo "$raca->nome_raca";
    //         echo "<br/>";
    //     }
    //    }

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
