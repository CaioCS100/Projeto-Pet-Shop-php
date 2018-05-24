<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Proprietario;

class ProprietarioController extends Controller
{
    public function chamarTelaCadastroCliente(){
        $dados['ufs'] = $this->UF();
        return view('tela_Cadastro_Dono', $dados);
    }

    public function chamarTelaProcurarClientes()
    {
        //fazer um select e enviar para a outra pagina
        $cliente = Proprietario::all();
        return view('tela_Procurar_Cliente',['cliente'=>$cliente]);
    }

    public function addNovoCliente(Request $request){

        $request -> validate([
            'nome' => 'required',
            'cpf' => 'required',
            'data' => 'required',
            'cep' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'imagem' => 'image'
            ]);

        $ddd = $request->telefone;
        $ddd = str_replace("(","",$ddd);
        $ddd = str_replace(")","",$ddd);
        $ddd = explode(" ",$ddd);
        $telefoneSemDDD = $ddd[1];
        $ddd = $ddd[0];
        $telefoneSemDDD = str_replace("-","",$telefoneSemDDD);
        $cpfSemCaracterEspecial = $request->cpf;
        $cpfSemCaracterEspecial = str_replace(".","",$cpfSemCaracterEspecial);
        $cpfSemCaracterEspecial = str_replace("-","",$cpfSemCaracterEspecial);
        $cepSemCaracterEspecial = $request->cep;
        $cepSemCaracterEspecial = str_replace("-","",$cepSemCaracterEspecial);
        $nomeDaImagem = "";
       
        if($request->imagem!=null)
        {
            $extesao = $request->imagem->extension();
            $nomeDaImagem = $request->cpf;
            $request->imagem->storeas('public', "$nomeDaImagem."."$extesao");
        }

        $nomeDono = new Proprietario;

        $nomeDono->nome = $request->nome;
        $nomeDono->cpf = $cpfSemCaracterEspecial;
        $nomeDono->data_de_nascimento = $request->data;
        $nomeDono->cep = $cepSemCaracterEspecial;
        $nomeDono->telefone = $telefoneSemDDD;
        $nomeDono->ddd = $ddd;
        $nomeDono->email = $request->email;
        $nomeDono->endereco = $request->endereco;
        $nomeDono->bairro = $request->bairro;
        $nomeDono->cidade = $request->cidade;
        $nomeDono->uf = $request->uf;
        $nomeDono->observacao_cliente = $request->obs;
        $nomeDono->complemento = $request->complemento;
        $nomeDono->nome_da_imagem = $nomeDaImagem;
        $nomeDono->save(); 
        return redirect()->route('cadastrarDono')->with('cadastrado', true);
    }

    public function UF()
    {
        return array(
            "AC",
            "AL",
            "AM",
            "AP",
            "BA",
            "CE",
            "DF",
            "ES",
            "GO",
            "MA",
            "MG",
            "MS",
            "MT",
            "PA",
            "PB",
            "PE",
            "PI",
            "PR",
            "RJ",
            "RN",
            "RO",
            "RR",
            "RS",
            "SC",
            "SE",
            "SP",
            "TO"
        );
    }

}