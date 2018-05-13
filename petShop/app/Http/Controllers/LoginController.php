<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('tela_Inicial');
    }
   
    public function logar(Request $request)
    {
        if($request->cTexto == "caio" && $request->cSenha == "123")
       {
            session(['usuario' => $request->cTexto]);
            return redirect()->route('paginaPrincipal');
       }
       else
       {
            return redirect()->back()->with('invalido', true);
       }       
    }

    public function sair()
    {

        session()->flush();
        return redirect()->action('LoginController@login'); 
    }

    public function redirecionarPagina()
    {
        return view('tela_principal');
    }

}
