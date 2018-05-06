<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function fazerLogin()
    {
        return view('tela_Inicial');
    }
   
    public function verificarLogin(Request $request)
    {
       if($request->cTexto == "caio" && $request->cSenha == "123")
       {
            return view('tela_principal');  
       }
       else
       {
            return redirect('/')->with('invalido', true);
       }       
    }

    public function sair()
    {

        return redirect()->action('LoginController@fazerLogin');   
    }

}
