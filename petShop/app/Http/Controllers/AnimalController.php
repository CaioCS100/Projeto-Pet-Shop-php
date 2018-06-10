<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Proprietario;
use App\Model\Animal;
use App\Model\Especie;
use App\Model\Raca;
use Illuminate\Support\Facades\DB;

class AnimalController extends Controller
{
    public function chamarTelaCadastroAnimal(){
        $exibirPorPagina = 10;
        $cliente = Proprietario::paginate($exibirPorPagina);
        $especies = Especie::where('id','>','1')->paginate($exibirPorPagina);

       return view('tela_Cadastro_Animais',['cliente'=>$cliente],['especie'=>$especies]);
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
        $idNomeDono = Proprietario::where('nome',$request->nomeDono)->first();
            
        $nomeDaImagem = "";
        $infoPet = "";    
        if($request->imagem!=null)
        {
            $extesao = $request->imagem->extension();
            $nomeDaImagem = "".$request->nomeDono ."".$request->nomeAnimal ."".$request->data;
            $request->imagem->storeas('public', "$nomeDaImagem."."$extesao");
            $nomeDaImagem = "".$request->nomeDono ."".$request->nomeAnimal ."".$request->data.".".$extesao;
        }

        if($request->checkInfoPet != "")
        {
            $infoPet = $request->infoPet;
        }

        $animais = new Animal; 

        $animais->nome_dono_id = $idNomeDono->id;
        $animais->nome_pet = $request->nomeAnimal;
        $animais->data_de_nascimento_pet = $request->data;
        $animais->peso = $request->peso;
        $animais->sexo = $request->sexo;
        $animais->cor = $request->cor;
        $animais->info_pet_cadastro = $infoPet;
        $animais->observacao_sobre_pet = $request->obs;
        $animais->nome_da_imagem = $nomeDaImagem;
        $animais->especie_id = $idEspecie->id;
        $animais->raca_id = $idRaca->id;
        $animais->save();
        return redirect()->route('cadastrarAnimal')->with('cadastrado', true);
    }

    public function mostrarTodosAnimais()
    {   
        $animais = DB::table('animais')
            ->select('animais.id', 'clientes.nome', 'animais.nome_pet', 'especies.nome_especie', 'racas.nome_raca', 'animais.data_de_nascimento_pet', 'animais.peso', 'animais.sexo', 'animais.cor')
            ->join('racas', 'racas.id', '=', 'animais.raca_id')
            ->join('clientes', 'clientes.id', '=', 'animais.nome_dono_id')
            ->join('especies', 'especies.id', '=', 'animais.especie_id')
            ->get();

        return view('tela_Procurar_Animais',['animais'=>$animais]);
    }

    public function mostrarAnimal(Request $request,$id)
    {
        $animais = DB::table('animais')
        ->select('animais.id', 'clientes.nome', 'animais.nome_pet', 'especies.nome_especie', 'racas.nome_raca', 'animais.data_de_nascimento_pet', 'animais.peso', 'animais.sexo', 'animais.cor','animais.info_pet_cadastro','animais.nome_da_imagem','animais.observacao_sobre_pet')
        ->join('racas', 'racas.id', '=', 'animais.raca_id')
        ->join('clientes', 'clientes.id', '=', 'animais.nome_dono_id')
        ->join('especies', 'especies.id', '=', 'animais.especie_id')
        ->where('animais.id',$id)
        ->first();

        $exibirPorPagina = 10;
        $cliente = Proprietario::paginate($exibirPorPagina);
        $especies = Especie::where('id','>','1')->paginate($exibirPorPagina);

        return view('tela_Mostrar_Editar_Animais',['animal'=>$animais,
                                                   'especie'=>$especies,
                                                   'cliente'=>$cliente]);
    }

    public function editarAnimal(Request $request,$id)
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

        $nomeDaImagem = "";
        $infoPet = "";    
        if($request->imagem!=null)
        {
            $extesao = $request->imagem->extension();
            $nomeDaImagem = "".$request->nomeDono ."".$request->nomeAnimal ."".$request->data;
            $request->imagem->storeas('public', "$nomeDaImagem."."$extesao");
            $nomeDaImagem = "".$request->nomeDono ."".$request->nomeAnimal ."".$request->data.".".$extesao;
        }

        echo $request->checkInfoPet;
        echo "<br/>";

        if($request->checkInfoPet != "N")
        {
            $infoPet = $request->infoPet;
        }

        $dadosAtualizadosAnimal = Animal::find($id);
        $idEspecie = Especie::where('nome_especie',$request->especie)->first();
        $idRaca = Raca::where('nome_raca',$request->raca)->first();
        $idNomeDono = Proprietario::where('nome',$request->nomeDono)->first();

        echo $idNomeDono->id;
        echo "<br/>";
        echo $request->nomeAnimal;
        echo "<br/>";
        echo $request->data;
        echo "<br/>";
        echo $request->peso;
        echo "<br/>";
        echo $request->cor;
        echo "<br/>";
        echo $info_pet_cadastro = $infoPet;
        echo "<br/>";
        echo $request->obs;
        echo "<br/>";
        echo $nomeDaImagem;
        echo "<br/>";
        echo $idEspecie->id;
        echo "<br/>";
        echo $idRaca->id;
        echo "<br/>";

        // $dadosAtualizadosAnimal->nome_dono_id = $idNomeDono->id;
        // $dadosAtualizadosAnimal->nome_pet = $request->nomeAnimal;
        // $dadosAtualizadosAnimal->data_de_nascimento_pet = $request->data;
        // $dadosAtualizadosAnimal->peso = $request->peso;
        // $dadosAtualizadosAnimal->sexo = $request->sexo;
        // $dadosAtualizadosAnimal->cor = $request->cor;
        // $dadosAtualizadosAnimal->info_pet_cadastro = $infoPet;
        // $dadosAtualizadosAnimal->observacao_sobre_pet = $request->obs;
        // $dadosAtualizadosAnimal->nome_da_imagem = $nomeDaImagem;
        // $dadosAtualizadosAnimal->especie_id = $idEspecie->id;
        // $dadosAtualizadosAnimal->raca_id = $idRaca->id;
        // $dadosAtualizadosAnimal->save();
        // return redirect()->route('procurarAnimais')->with('editado', true);
    }

    public function deletarAnimal(Request $request,$id)
    {
        Animal::destroy($id);
        return redirect()->route('procurarAnimais')->with('excluido', true);
    }
}
