<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Proprietario;
use App\Model\Animal;
use App\Model\Especie;
use App\Model\Raca;

class AnimalController extends Controller
{
    public function chamarTelaCadastroAnimal(){
        $exibirPorPagina = 10;
        $cliente = Proprietario::paginate($exibirPorPagina);
        $especies = Especie::where('id','>','1')->paginate($exibirPorPagina);
        //$racas = Raca::where('id','>','1')->get();

       return view('tela_Cadastro_Animais',['cliente'=>$cliente],['especie'=>$especies]);

    //    foreach ($racas as $raca)
    //    {   
    //         echo $raca->especie->id;  
    //         echo "<br/>";  
    //    }

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
            
        $idEspecie = Especie::where('nome_especie',$request->especie)->first();
        $idRaca = Raca::where('nome_raca',$request->raca)->first();
            
        $nomeDaImagem = "";
        if($request->imagem!=null)
        {
            $extesao = $request->imagem->extension();
            $nomeDaImagem = "".$request->nomeDono ."".$request->nomeAnimal ."".$request->data;
            $request->imagem->storeas('public', "$nomeDaImagem."."$extesao");
            $nomeDaImagem = "".$request->nomeDono ."".$request->nomeAnimal ."".$request->data;
        }

        $animais = new Animal; 

        $animais->nome_dono = $request->nomeDono;
        $animais->nome_pet = $request->nomeAnimal;
        $animais->data_de_nascimento_pet = $request->data;
        $animais->peso = $request->peso;
        $animais->sexo = $request->sexo;
        $animais->cor = $request->cor;
        $animais->info_pet_cadastro = $request->infoPet;
        $animais->observacao_sobre_pet = $request->obs;
        $animais->nome_da_imagem = $nomeDaImagem;
        $animais->id_especie = $idEspecie->id;
        $animais->id_raca = $idRaca->id;
        $animais->save();
        return redirect()->route('cadastrarAnimal')->with('cadastrado', true);
    }

    public function mostrarTodosAnimais()
    {
        $animais = Animal::all();
        return view('tela_Procurar_Animais',['animais'=>$animais]);
        // fazer a relação de 1 para muitos de animal com especie e raça
        // foreach ($animais as $animal)
        // {
        //     echo $animal->id_especie;
        // }
        // $nomeEspecie = Especie::where('id_especie',$animais->id_especie)->first();
        // echo $nomeEspecie;
    }
}
