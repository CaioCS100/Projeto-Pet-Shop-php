<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProprietarioController extends Controller
{
    public function chamarTelaCadastroLogin(){

        return view('tela_Cadastro_Dono');
    }

    public function chamarTelaProcurarClientes()
    {
        return view('tela_Procurar_Cliente');
    }

    public function UF()
    {
        $uf = array(
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