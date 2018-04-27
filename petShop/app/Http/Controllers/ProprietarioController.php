<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    public function chamarTelaCadastroCliente(){
        $dados['ufs'] = $this->UF();
        return view('tela_Cadastro_Dono', $dados);
    }

    public function chamarTelaProcurarClientes()
    {
        return view('tela_Procurar_Cliente');
    }

    public function addNovoCliente(Request $resquest){

        $resquest -> validate([
            'nome' => 'required',
            'cpf' => 'required|numeric',
            'data' => 'required',
            'cep' => 'required|numeric',
            'telefone' => 'required|numeric',
            'email' => 'required|email'
            ]);

        echo "<h1> Aqui eu irei salvar os dados do cliente no Banco de Dados";
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